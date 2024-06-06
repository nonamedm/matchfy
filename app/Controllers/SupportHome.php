<?php

namespace App\Controllers;

use App\Models\BoardModel;
use App\Models\BoardFileModel;
use App\Models\SupportBoardModel;
use App\Models\SupportMemberModel;

class SupportHome extends BaseController
{


































    // public function index()
    // {
    //     // $session = session();
    //     // $ci = $session->get('ci');

    //     // if ($ci) {
    //     //     return redirect()->to("/support");
    //     // } else {
    //     //     return view('sp_index');
    //     // }

    //     return view('sp_index');
    // }
    public function menu(): string
    {
        return view('sp_menu');
    }
    public function noticeList()
    {
        $value = $this->request->getGet('value');
        $fileData = new BoardFileModel();
        $query = $fileData->select('bo.id AS notice_id,
                                    bo.title AS title,
                                    bo.content AS content,
                                    bo.author AS author,
                                    bo.update_author AS update_author,
                                    bo.created_at AS created_at,
                                    bo.updated_at AS updated_at,
                                    bo.hit AS hit,
                                    bo.board_type AS board_type,
                                    bf.id AS file_id,
                                    bf.board_idx AS board_idx,
                                    bf.board_type AS file_board_type,
                                    bf.file_name AS file_name,
                                    bf.file_path AS file_path,
                                    bf.org_name AS org_name,
                                    (SELECT CONCAT(DATE_FORMAT(MIN(created_at), "%y.%m.%d"), " ~ ", DATE_FORMAT(MAX(created_at), "%y.%m.%d")) FROM wh_support_board_notice) AS created_at_range')
            ->from('wh_support_board_notice bo')
            ->join('wh_board_files bf', 'bo.id = bf.board_idx', 'left')
            ->groupBy('bo.id');
        if ($value == 'recent') {
            $query->orderBy('bo.id', 'DESC');
        } else if ($value == 'popular') {
            $query->orderBy('bo.hit', 'DESC');
        } else {
            $query->orderBy('bo.id', 'DESC');
        }

        $data['datas'] = $query->get()->getResultArray();

        $BoardModel = new BoardModel();
        $BoardModel->setTableName('wh_support_board_notice');

        $min_date_query = $BoardModel->query('SELECT MIN(created_at) AS min_date FROM wh_support_board_notice');
        $max_date_query = $BoardModel->query('SELECT MAX(created_at) AS max_date FROM wh_support_board_notice');

        $min_date_row = $min_date_query->getRow();
        $max_date_row = $max_date_query->getRow();

        $min_date = date('y.m.d', strtotime($min_date_row->min_date));
        $max_date = date('y.m.d', strtotime($max_date_row->max_date));

        $data['min_date'] = $min_date;
        $data['max_date'] = $max_date;

        if ($this->request->isAJAX()) {
            return $this->response->setJSON($data);
        } else {
             return view('sp_notice',$data);
        }
    }

    public function noticeView($id)
    {
        $BoardModel = new BoardModel();
        $BoardModel->setTableName('wh_support_board_notice');
        $data['notice'] = $BoardModel->find($id);

        $BoardModel->increaseHit($id);

        $fileData = new BoardFileModel();
        $data['file'] = $fileData->where('board_idx', $id)->first();


        return view('sp_notice_view', $data);

    }

    public function faq(): string
    {
        $BoardModel = new BoardModel();
        $BoardModel->setTableName('wh_support_board_faq');
        $data['faqs'] = $BoardModel->orderBy('created_at', 'DESC')->findAll();

        return view('sp_faq', $data);
    }
    public function terms(): string
    {
        $BoardModel = new BoardModel();
        $BoardModel->setTableName('wh_board_terms');
        $terms = $BoardModel->orderBy('created_at', 'DESC')->first();

        return view('sp_terms', ['terms' => $terms]);
    }
    public function privacy(): string
    {
        $BoardModel = new BoardModel();
        $BoardModel->setTableName('wh_board_privacy');
        $privacy = $BoardModel->orderBy('created_at', 'DESC')->first();

        return view('sp_privacy', ['privacy' => $privacy]);
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
