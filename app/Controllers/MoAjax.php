<?php

namespace App\Controllers;

use App\Models\MemberModel;
use App\Models\MEmberFileModel;

class MoAjax extends BaseController
{
    public function delCmt()
    {

        $postData = $this->request->getPost();

        // 특정 키의 POST 값만 받아오기
        $cmt_idx = $this->request->getPost('cmt_idx');
        $trgt_id = $this->request->getPost('trgt_id');
        $trgt_idx = $this->request->getPost('trgt_idx');

        if ($cmt_idx && $trgt_id && $trgt_idx)
        {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Data processed successfully', 'result' => $postData]);
        }
    }

    public function joinMatchfy()
    {

        $postData = $this->request->getPost();

        //특정 키의 POST 값 받아오기
        $mobile_no = $this->request->getPost('mobile_no');
        $ci = $this->request->getPost('ci');
        $agree1 = $this->request->getPost('agree1');
        $agree2 = $this->request->getPost('agree2');
        $agree3 = $this->request->getPost('agree3');
        $name = $this->request->getPost('name');
        $birthday = $this->request->getPost('birthday');
        $gender = $this->request->getPost('gender');
        $city = $this->request->getPost('city');
        $town = $this->request->getPost('town');

        $memberModel = new MemberModel();

        // 데이터베이스에 저장할 데이터 배열 생성
        $data = [
            'mobile_no' => $mobile_no,
            'ci' => $ci,
            'agree1' => $agree1,
            'agree2' => $agree2,
            'agree3' => $agree3,
            'name' => $name,
            'birthday' => $birthday,
            'gender' => $gender,
            'city' => $city,
            'town' => $town,
        ];

        // 데이터 저장
        $inserted = $memberModel->insert($data);
        
        if($inserted) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Join matchfy successfully', 'data' => $data]);
        } else
        {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to join matchfy']);
        }
    }

    /* 사용자 파일 저장 */
    public function memberUploadFiles() {
        $member_idx = $this->request->getPost('member_idx');
        $file_name = $this->request->getPost('file_name');
        $org_name = $this->request->getPost('org_name');
        $ext = $this->request->getPost('ext');
        $extra1 = $this->request->getPost('extra1');
        $extra2 = $this->request->getPost('extra2');
        $extra3 = $this->request->getPost('extra3');

        $MemberFileModel = new MemberFileModel();

        $data = [
            'member_idx' => $member_idx,
            'file_name' => $file_name,
            'org_name' => $org_name,
            'ext' => $ext,
            'extra1' => $extra1,
            'extra2' => $extra2,
            'extra3' => $extra3,
        ];

        $inserted = $MemberFileModel->insert($data);

        if($inserted) {
            $response = [
                'status' => 'success',
                'message' => '파일이 성공적으로 저장되었습니다.',
                'inserted_id' => $inserted
            ];

            return $this->response->setJSON($response);

        } else {
            $error = $MemberFileModel->getError();
            $response = [
                'status' => 'fail',
                'message' => "파일 저장에 실패했습니다. $error"
            ];

            return $this->response->setJSON($response);
        }
    }
}
