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

    public function createPrivToken()
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

        $reqData = ["returnurl" => "https://matchfy.net/mo/agree", "sitecode" => $siteCode, "popupyn" => "Y", "receivedata" => "xxxxdddeee"];

        // AES 암호화
        $secureKey = $key;
        $cipher = "AES-128-CBC";

        $trimmedData = array_map('trim', $reqData);
        $jsonData = json_encode($trimmedData);
        $encrypted = openssl_encrypt($jsonData, $cipher, $secureKey, OPENSSL_RAW_DATA, $iv);
        $enc_data = base64_encode($encrypted);


        $hmacSha256 = $this->hmac256($hmac_key, $enc_data);
        $integrityValue = base64_encode($hmacSha256);

        return $this->response->setJSON(['status' => 'success', 'enc_data' => $enc_data, 'intergrity_val' => $integrityValue, 'token_version_id' => $tokenVerId], ResponseInterface::HTTP_OK);
    }

    private function hmac256($secretKey, $message)
    {
        return hash_hmac('sha256', $message, $secretKey, true);
    }
}
