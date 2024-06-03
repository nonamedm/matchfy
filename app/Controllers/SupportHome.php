<?php

namespace App\Controllers;

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
}
