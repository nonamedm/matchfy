<?php

namespace App\Controllers;

use App\Models\SupportBoardModel;
use App\Models\SupportMemberModel;

class SupportHome extends BaseController
{




































    public function noticeList()
    {
        return view('/support/sp_notice');
    }

    public function noticeView()
    {
        return view('/support/sp_notice_view');
    }



    public function index()
    {
        $session = session();
        $ci = $session->get('ci');

        if ($ci) {
            return redirect()->to("/");
        } else {
            return view('/support/mo_index');
        }
    }
    
    public function pass(): string
    {
        $data['params'] = '';
        return view('/support/mo_pass', $data);
    } 

    public function agree(): string
    {
        $postData = $this->request->getPost();
        $SupportBoardModel = new SupportBoardModel();
        $SupportBoardModel->setTableName('wh_board_terms');
        $postData['terms'] = $SupportBoardModel->orderBy('created_at', 'DESC')->first();

        $SupportBoardModel2 = new SupportBoardModel();
        $SupportBoardModel2->setTableName('wh_board_privacy');
        $postData['privacy'] = $SupportBoardModel2->orderBy('created_at', 'DESC')->first();

        return view('/support/mo_agree', $postData);
    }

    public function signin(): string
    {
        $postData = $this->request->getPost();
        return view('/support/mo_signin', $postData);
    }

    public function signinSuccess(): string
    {
        return view('/support/mo_signin_success');
    }

    public function invite(): string
    {
        $session = session();
        $ci = $session->get('ci');

        $SupportMemberModel = new SupportMemberModel();

        $uniqueCode = $SupportMemberModel
            ->select('unique_code')
            ->where('ci', $ci)
            ->first();

        return view('/support/mo_invite', $uniqueCode);
    }

    public function referral()
    {
        return view('/support/mo_referral');
    }

    public function referralSuccess(): string
    {
        return view('/support/mo_referral_success');
    }

}
