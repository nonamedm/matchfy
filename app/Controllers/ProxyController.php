<?php

namespace App\Controllers;


use CodeIgniter\HTTP\CURLRequest;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use App\Models\BoardModel;
use App\Models\MemberModel;

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

        $nickname = base64_encode($this->request->getPost('nickname') . "");
        $sns_type = $this->request->getPost('sns_type');
        $oauth_id = $this->request->getPost('oauth_id');

        $enc_result_val = base64_encode($resultVal);
        $reqData = ["returnurl" => "https://matchfy.net/proxy/getResultValue?nickname=" . $nickname . "&sns_type=" . $sns_type . "&oauth_id=" . $oauth_id . "&ci1=" . $enc_result_val, "sitecode" => $siteCode, "popupyn" => "Y", "mobilceco" => "S", 'methodtype' => 'get'];


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
        $resultVal = base64_decode($this->request->getGet('ci1') . "");

        $key = substr($resultVal, 0, 16);
        $iv = substr($resultVal, -16);

        $nickname = base64_decode($this->request->getGet('nickname') . "");
        $sns_type = $this->request->getGet('sns_type');
        $oauth_id = $this->request->getGet('oauth_id');

        $token_version_id = $this->request->getGet('token_version_id');
        $enc_data = base64_decode($this->request->getGet('enc_data') . "");
        // echo "소실단계 확인1" . $enc_data . "<br/>";
        $resData = openssl_decrypt($enc_data, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $iv);
        // echo "소실단계 확인2" . $resData . "<br/>";
        // $resData = iconv("euc-kr", "utf-8", $enc_data);
        // echo "소실단계 확인3" . $resData . "<br/>";
        $jsonData = $resData . "";
        $jsonString = stripslashes($jsonData);
        $encoding = mb_detect_encoding($jsonString, mb_detect_order(), true);
        if ($encoding !== 'UTF-8') {
            // UTF-8로 변환
            if ($encoding) {
                $jsonString = mb_convert_encoding($jsonString, 'UTF-8', $encoding);
            } else {
                $jsonString = mb_convert_encoding($jsonString, 'UTF-8', 'ISO-8859-1');
            }
        }

        $resData = json_decode($jsonString, true);


        // echo $enc_data . "<br/>";
        $integrity_value = $this->request->getGet('integrity_value');


        $hmacKey = substr($resultVal, 0, 32);


        $hmacSha256 = $this->hmac256($hmacKey, $enc_data);
        $integrityValue = base64_encode($hmacSha256);

        // if ($integrity_value != base64_encode($hmacSha256)) {
        //     echo "no" . "<br/>";
        // }


        $postData['nickname'] = $nickname;
        $postData['sns_type'] = $sns_type;
        $postData['oauth_id'] = $oauth_id;
        $postData['decrypted'] = $resData;

        $BoardModel = new BoardModel();
        $BoardModel->setTableName('wh_board_terms');
        $postData['terms'] = $BoardModel->orderBy('created_at', 'DESC')->first();

        $BoardModel2 = new BoardModel();
        $BoardModel2->setTableName('wh_board_privacy');
        $postData['privacy'] = $BoardModel2->orderBy('created_at', 'DESC')->first();

        //휴대폰 중복체크
        $mobile_no = $resData['mobileno'];

        $MemberModel = new MemberModel();
        $selected = $MemberModel->where('mobile_no', $mobile_no)->first();

        if ($selected) {
            // 중복 시 알림 후 메인 이동
            $postData['mobile_dup_chk'] = '0';
            return view('mo_pass', $postData);
        } else {
            // 중복 번호 없을 때 이동
            return view('mo_agree', $postData);
        }
        return view('mo_agree', $postData);
    }

    private function hmac256($secretKey, $message)
    {
        return hash_hmac('sha256', $message, $secretKey, true);
    }
}
