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

    public function login() {
        $mobile_no = $this->request->getPost('mobile_no');

        $MemberModel = new MemberModel();

        $user = $MemberModel->where('mobile_no', $mobile_no)->first();

        if($user) {
            $session = session();
            $session->set(['name' => $user['name']]);

            return $this->response->setJSON(['status' => 'success', 'message' => "로그인 성공"]);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => '일치하는 회원 정보가 없습니다.']);
        }
    }

    public function signUp()
    {

        // $postData = $this->request->getPost();

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

        $MemberModel = new MemberModel();

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
        $inserted = $MemberModel->insert($data);

        if ($inserted)
        {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Join matchfy successfully', 'data' => $data]);
        } else
        {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to join matchfy']);
        }
    }

    public function signUpdate()
    {

        // $postData = $this->request->getPost();

        $married = $this->request->getPost('married');
        $smoker = $this->request->getPost('smoker');
        $drinking = $this->request->getPost('drinking');
        $religion = $this->request->getPost('religion');
        $mbti = $this->request->getPost('mbti');
        $height = $this->request->getPost('height');
        $stylish = $this->request->getPost('stylish');
        $education = $this->request->getPost('education');
        $major = $this->request->getPost('major');
        $school = $this->request->getPost('school');
        $job = $this->request->getPost('job');
        $asset_range = $this->request->getPost('asset_range');
        $income_range = $this->request->getPost('income_range');

        $MemberModel = new MemberModel();

        $data = [
            'married' => $married ,
            'smoker' => $smoker ,
            'drinking' => $drinking ,
            'religion' => $religion ,
            'mbti' => $mbti ,
            'height' => $height ,
            'stylish' => $stylish ,
            'education' => $education ,
            'major' => $major ,
            'school' => $school ,
            'job' => $job ,
            'asset_range' => $asset_range ,
            'income_range' => $income_range 
        ];

        // 데이터 저장
        $inserted = $MemberModel->update($id, $data);

        if ($inserted)
        {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Join matchfy successfully', 'data' => $data]);
        } else
        {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to join matchfy']);
        }
    }

    /* 사용자 파일 저장 */
    public function memberUploadFiles()
    {
        $member_idx = $this->request->getPost('member_idx');
        $file_path = $this->request->getPost('file_path');
        $file_name = $this->request->getPost('file_name');
        $org_name = $this->request->getPost('org_name');
        $ext = $this->request->getPost('ext');
        $extra1 = $this->request->getPost('extra1');
        $extra2 = $this->request->getPost('extra2');
        $extra3 = $this->request->getPost('extra3');

        $MemberFileModel = new MemberFileModel();

        $data = [
            'member_idx' => $member_idx,
            'file_path' => $file_path,
            'file_name' => $file_name,
            'org_name' => $org_name,
            'ext' => $ext,
            'extra1' => $extra1,
            'extra2' => $extra2,
            'extra3' => $extra3,
        ];

        $inserted = $MemberFileModel->insert($data);

        if($inserted) {
            return $this->response->setJSON(['status' => 'success', 'message' => "파일이 성공적으로 저장되었습니다.", 'inserted_id' => $inserted]);
        } else {
            $error = $MemberFileModel->getError();
            return $this->response->setJSON(['status' => 'fail', 'message' => "파일 저장에 실패했습니다. $error"]);
        }
    }
    

    /* 회원 등급 업데이트 */
    public function gradeUpdate()
    {
        $member_idx = $this->request->getPost('member_idx');
        $grade = $this->request->getPost('grade');

        $MemberModel = new MemberModel();

        $updated = $MemberModel->update($member_idx, [
            'grade' => $grade
        ]);

        if($updated) {
            return $this->response->setJSON(['status' => 'success', 'message' => "회원 등급 업데이트 완료", 'updated_id' => $updated]);
        } else {
            $error = $MemberModel->getError();
            return $this->response->setJSON(['status' => 'fail', 'message' => "회원 등급 업데이트 실패. $error"]);
        }
    }

    /* 정회원 및 프리미엄 등급 업데이트*/
    public function updateMemberInfo($isPremium = false)
    {
        $postData = [
            'married' => $this->request->getPost('married'),
            'smoker' => $this->request->getPost('smoker'),
            'drinking' => $this->request->getPost('drinking'),
            'religion' => $this->request->getPost('religion'),
            'mbti' => $this->request->getPost('mbti'),
            'height' => $this->request->getPost('height'),
            'stylish' => $this->request->getPost('stylish'),
            'education' => $this->request->getPost('education'),
            'school' => $this->request->getPost('school'),
            'major' => $this->request->getPost('major'),
            'job' => $this->request->getPost('job'),
            'asset_range' => $this->request->getPost('asset_range'),
            'income_range' => $this->request->getPost('income_range'),
        ];

        if ($isPremium)
        {
            // 프리미엄 회원에만 해당하는 추가 정보
            $premiumData = [
                'father_birth_year' => $this->request->getPost('father_birth_year'),
                'father_job' => $this->request->getPost('father_job'),
                'mother_birth_year' => $this->request->getPost('mother_birth_year'),
                'mother_job' => $this->request->getPost('mother_job'),
                'siblings' => $this->request->getPost('siblings'),
                'residence1' => $this->request->getPost('residence1'),
                'residence2' => $this->request->getPost('residence2'),
                'residence3' => $this->request->getPost('residence3'),
            ];

            // 배열 병합
            $postData = array_merge($postData, $premiumData);
        }

        $member_idx = $this->request->getPost('member_idx');
        $MemberModel = new MemberModel();

        $updated = $MemberModel->update($member_idx, $postData);

        if($updated) {
            return $this->response->setJSON(['status' => 'success', 'message' => $isPremium ? '프리미엄 회원 정보 업데이트 완료' : '정회원 정보 업데이트 완료', 'updated_id' => $updated]);
        } else {
            $error = $MemberModel->getError();
            return $this->response->setJSON(['status' => 'fail', 'message' => $isPremium ? "프리미엄 정보 업데이트 실패. $error" : "정회원 정보 업데이트 실패. $error"]);
        }
    }

    // 정회원 업데이트를 위한 호출
    public function StandardInfoUpdate()
    {
        $this->updateMemberInfo(false);
    }

    // 프리미엄 회원 업데이트를 위한 호출
    public function PremiumMemberInfoUpdate()
    {
        $this->updateMemberInfo(true);
    }
}
