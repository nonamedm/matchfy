<?php

namespace App\Controllers;


use CodeIgniter\HTTP\CURLRequest;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class ProxyController extends BaseController
{
    public function createToken()
    {
        // API URL
        $url = 'https://svc.niceapi.co.kr:22001/digital/niceid/oauth/oauth/token';

        // Basic Authentication
        $clientId = '53d724a7-876d-4e22-9d75-e4824f197f10';
        $clientSecret = '1d256ed04a35b29b3828c09b9e37cf0c';
        $authHeader = 'Basic ' . base64_encode("$clientId:$clientSecret");

        // POST Data
        $postData = [
            'grant_type' => 'client_credentials',
            'scope' => 'default',
        ];

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/x-www-form-urlencoded;charset=utf-8',
            'Authorization: ' . $authHeader,
        ]);

        // Execute cURL
        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            $error_msg = curl_error($ch);
            curl_close($ch);
            return $this->response->setJSON(['status' => 'error', 'message' => $error_msg], ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        }

        curl_close($ch);

        // Decode the response
        $responseData = json_decode($response, true);

        return $this->response->setJSON(['status' => 'success', 'data' => $responseData], ResponseInterface::HTTP_OK);
    }

    public function createPassWeb()
    {
        // API URL
        $url = 'https://svc.niceapi.co.kr:22001/digital/niceid/api/v1.0/common/crypto/token';
        $currentTimestamp = time();
        // Basic Authentication
        $accToken = '7479b9bb-35f7-4a5e-90da-a636a4330d8d';
        $clientId = '53d724a7-876d-4e22-9d75-e4824f197f10';
        $requestDateTime = date('YmdHis');
        $authHeader = 'bearer ' . base64_encode("$accToken:$currentTimestamp:$clientId");
        $prodID = '2101979031';
        // POST Data
        $postData = [
            'dataHeader' => ['CNTY_CD' => 'ko'],
            'dataBody' => ['req_dtim' => $requestDateTime, 'req_no' => '9', 'enc_mode' => '1']
        ];

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: ' . $authHeader,
            'ProductID: ' . $prodID,
        ]);

        // Execute cURL
        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            $error_msg = curl_error($ch);
            curl_close($ch);
            return $this->response->setJSON(['status' => 'error', 'message' => $error_msg], ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        }

        curl_close($ch);

        // Decode the response
        $responseData = json_decode($response, true);

        if ($responseData) {
            $rspCd = $responseData['dataBody']['rsp_cd'];
            $tokenVal = $responseData['dataBody']['token_val'];
            $tokenVerId = $responseData['dataBody']['token_version_id'];
            $siteCode = $responseData['dataBody']['site_code'];
        }

        $value = trim($requestDateTime) . trim('9') . trim($tokenVal);
        $hashValue = hash('sha256', $value, true);
        $resultVal = base64_encode($hashValue);

        $key = substr($resultVal, 0, 16);
        $iv = substr($resultVal, -16);
        $hmac_key = substr($resultVal, 0, 32);

        $nickname = $this->request->getPost('nickname');
        $sns_type = $this->request->getPost('sns_type');
        $oauth_id = $this->request->getPost('oauth_id');
        $reqData = ["returnurl" => "https://matchfy.net/proxy/getResultValue?add_data=" . $nickname . "&sns_type=" . $sns_type . "&oauth_id=" . $oauth_id . "&ci1=" . $resultVal, "sitecode" => $siteCode, "popupyn" => "Y", "mobilceco" => "S"];


        // $trimmedData = array_map('trim', $reqData);
        $jsonData = json_encode($reqData, JSON_UNESCAPED_SLASHES);
        $encrypted = openssl_encrypt($jsonData, "AES-128-CBC", $key, OPENSSL_RAW_DATA, $iv);
        $enc_data = base64_encode($encrypted);


        $hmacSha256 = $this->hmac256($hmac_key, $enc_data);
        $integrityValue = base64_encode($hmacSha256);

        return $this->response->setJSON(['status' => 'success', 'enc_data' => $enc_data, 'intergrity_val' => $integrityValue, 'token_version_id' => $tokenVerId], ResponseInterface::HTTP_OK);
    }
    public function getResultValue()
    {
        $resultVal = $this->request->getGet('ci1') . "";

        $key = substr($resultVal, 0, 16);
        $key = substr($key, 0, 16);

        $nickname = $this->request->getGet('nickname');
        $sns_type = $this->request->getGet('sns_type');
        $oauth_id = $this->request->getGet('oauth_id');

        $token_version_id = $this->request->getGet('token_version_id');
        $enc_data = $this->request->getGet('enc_data');
        $enc_data = base64_decode($enc_data);
        $resData = openssl_decrypt($enc_data, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $iv);
        $resData = iconv("euc-kr", "utf-8", $enc_data);
        $resData = json_decode($resData, true);


        // echo $enc_data . "<br/>";
        $integrity_value = $this->request->getGet('integrity_value');


        $hmacKey = substr($resultVal, 0, 32);


        $hmacSha256 = $this->hmac256($hmacKey, $enc_data);
        $integrityValue = base64_encode($hmacSha256);

        // if ($integrity_value != base64_encode($hmacSha256)) {
        //     echo "no" . "<br/>";
        // }


        $data['nickname'] = $nickname;
        $data['sns_type'] = $sns_type;
        $data['oauth_id'] = $oauth_id;
        $data['decrypted'] = $resData;
        echo $resData['birthdate'] . "호<br/>";
        echo $resData . "랑<br/>";
        echo print_r($resData) . "이";

        return $resData['birthdate'];
    }

    private function hmac256($secretKey, $message)
    {
        return hash_hmac('sha256', $message, $secretKey, true);
    }
}
