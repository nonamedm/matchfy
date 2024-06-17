<?php

namespace App\Controllers;

use App\Models\BoardModel;
use App\Models\BoardFileModel;
use App\Models\SupportBoardModel;
use App\Models\SupportMemberModel;
use App\Models\PointModel;
use App\Models\PointExchangeModel;
use App\Models\MemberModel;
use App\Models\SupportRewardModel;

class SupportHome extends BaseController
{

    //로그인페이지
    public function index()
    {
        $session = session();
        $ci = $session->get('ci_support');

        if ($ci) {
            return redirect()->to("/support");
        } else {
            return view('/support/mo_index');
        }
    }

    public function spindex()
    {
        $session = session();
        $ci = $session->get('ci_support');

        if($ci){
            /* 보유포인트 */
            $my_point_value = $this->mypageGetPoint();
    
            /* 포인트 적립내역 */
            $page = 1;
            $perPage = 3;
    
            $pointModel = new PointModel();
    
            $points = $pointModel->where('member_ci', $ci)
                                ->where('point_type', 'A')
                                ->where('create_at >', date('Y-m-d H:i:s', strtotime('-1 week')))
                                ->orderBy('create_at', 'DESC')
                                ->findAll($perPage * $page, 0);
    
            /* 서포터즈 공지사항 */
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
                                        MAX(bf.id) AS file_id,
                                        MAX(bf.board_idx) AS board_idx,
                                        MAX(bf.board_type) AS file_board_type,
                                        MAX(bf.file_name) AS file_name,
                                        MAX(bf.file_path) AS file_path,
                                        MAX(bf.org_name) AS org_name,
                                        (SELECT CONCAT(DATE_FORMAT(MIN(created_at), "%y.%m.%d"), " ~ ", DATE_FORMAT(MAX(created_at), "%y.%m.%d")) 
                                        FROM wh_support_board_notice) AS created_at_range')
                        ->from('wh_support_board_notice bo')
                        ->join('wh_board_files bf', 'bo.id = bf.board_idx', 'left')
                        ->groupBy('bo.id, bo.title, bo.content, bo.author, bo.update_author, bo.created_at, bo.updated_at, bo.hit, bo.board_type');
    
            if ($value == 'recent') {
                $query->orderBy('bo.id', 'DESC');
            } else if ($value == 'popular') {
                $query->orderBy('bo.hit', 'DESC');
            } else {
                $query->orderBy('bo.id', 'DESC');
            }
    
            // Limit to 3 results
            $query->limit(3);
    
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
    
            return view('/support/sp_index', [
                'my_point' => $my_point_value,
                'points' => $points,
                'data' => $data
            ]);

        }else{
            return redirect()->to("/support/mo_index");
        }

    }

    public function idpwFindPass(): string
    {
        $data['params'] = '';
        return view('/support/sp_idpw_find_pass', $data);
    }
    public function passworldReset(): string
    {
        // $postData['email']='inbv4311@naver.com';
        $postData = $this->request->getPost();
        return view('/support/sp_password_reset', $postData);
    }

    public function spmenu()
    {
        return view('/support/sp_menu');
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
                                    MAX(bf.id) AS file_id,
                                    bf.board_idx AS board_idx,
                                    bf.board_type AS file_board_type,
                                    bf.file_name AS file_name,
                                    bf.file_path AS file_path,
                                    bf.org_name AS org_name,
                                    (SELECT CONCAT(DATE_FORMAT(MIN(created_at), "%y.%m.%d"), " ~ ", DATE_FORMAT(MAX(created_at), "%y.%m.%d")) FROM wh_support_board_notice) AS created_at_range')
                            ->from('wh_support_board_notice bo')
                            ->join('wh_board_files bf', 'bo.id = bf.board_idx', 'left')
                            ->groupBy('bo.id, bo.title, bo.content, bo.author, bo.update_author, bo.created_at, bo.updated_at, bo.hit, bo.board_type, bf.board_idx, bf.board_type, bf.file_name, bf.file_path, bf.org_name');

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
             return view('/support/sp_notice',$data);
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


        return view('/support/sp_notice_view', $data);

    }

    public function faq(): string
    {
        $BoardModel = new BoardModel();
        $BoardModel->setTableName('wh_support_board_faq');
        $data['faqs'] = $BoardModel->orderBy('created_at', 'DESC')->findAll();

        return view('/support/sp_faq', $data);
    }
    public function terms(): string
    {
        $BoardModel = new BoardModel();
        $BoardModel->setTableName('wh_board_terms');
        $terms = $BoardModel->orderBy('created_at', 'DESC')->first();

        return view('/support/sp_terms', ['terms' => $terms]);
    }
    public function privacy(): string
    {
        $BoardModel = new BoardModel();
        $BoardModel->setTableName('wh_board_privacy');
        $privacy = $BoardModel->orderBy('created_at', 'DESC')->first();

        return view('/support/sp_privacy', ['privacy' => $privacy]);
    }

    public function mypageWallet()
    {
        $session = session();
        $ci = $session->get('ci_support');
        $page = 1;
        $perPage = 6;

        $pointModel = new PointModel();

        $points = $pointModel->where('member_ci', $ci);
        $points->where('point_type', 'A');
        $points->where('create_at >', date('Y-m-d H:i:s', strtotime('-1 week')));
        $points->orderBy('create_at', 'DESC');
        $points = $points->findAll($perPage * $page, 0);

        return view('/support/sp_mypage_wallet', ['points' => $points]);
    }

    public function walletTypeList()
    {
        $session = session();
        $ci = $session->get('ci_support');
        $type = $this->request->getPost('walletType');
        $date = $this->request->getPost('date');
        $value = $this->request->getPost('value');
        $page = intval($this->request->getPost('page'));
        $perPage = intval($this->request->getPost('perPage'));
        $pointModel = new PointModel();

        $points = $pointModel->where('member_ci', $ci);

        if ($type == 'add' || $type == 'spadd') {
            $points->where('point_type', 'A');
        } else if($type == 'use'){
            $points->where('point_type', 'U');
        } else if($type == 'spexchange'){
            $points->where('point_type', 'E');
        } 

        if ($date == '1week') {
            $points->where('create_at >', date('Y-m-d H:i:s', strtotime('-1 week')));
        } else if ($date == '1month') {
            $points->where('create_at >', date('Y-m-d H:i:s', strtotime('-1 month')));
        } else if ($date == '3month') {
            $points->where('create_at >', date('Y-m-d H:i:s', strtotime('-3 month')));
        }

        if ($value == 'latest') {
            $points->orderBy('create_at', 'DESC');
        } else if ($value == 'oldest') {
            $points->orderBy('create_at', 'ASC');
        } else if ($value == 'highest_amount') {
            if ($type == 'add') {
                $points->orderBy('add_point', 'DESC');
            } else {
                $points->orderBy('use_point', 'DESC');
            }
        } else if ($value == 'lowest_amount') {
            if ($type == 'add') {
                $points->orderBy('add_point', 'ASC');
            } else {
                $points->orderBy('use_point', 'ASC');
            }
        } else {
            $points->orderBy('create_at', 'DESC');
        }

        $points = $points->findAll($perPage * $page, 0);

        if ($points) {
            return $this->response->setJSON(['success' => true, 'points' => $points]);
        } else {
            return $this->response->setJSON(['success' => false]);
        }
    }
    /*나의 보유 포인트*/
    public function mypageGetPoint()
    {
        $session = session();
        $ci = $session->get('ci_support');
        $pointModel = new PointModel();

        $my_point = $pointModel->select('my_point')
            ->where('member_ci', $ci)
            ->orderBy('create_at', 'DESC')
            ->first();

        $my_point_value = isset($my_point['my_point']) ? $my_point['my_point'] : 0;
        return $my_point_value;
    }
    /*환전 페이지 */
    public function allianceExchange(): string
    {
        $my_point_value = $this->mypageGetPoint();
        return view('/support/sp_alliance_exchange', ['my_point' => $my_point_value]);
    }
    /*환전 프로세스 */
    public function allianceExchangePoint()
    {
        $session = session();
        $ci = $session->get('ci_support');

        $amount = $this->request->getPost('amount');
        $bank = $this->request->getPost('bank');
        $acount_number = $this->request->getPost('acount_number');

        $pointExchange = new PointExchangeModel();
        $data = [
            'member_ci' => $ci,
            'point_exchange' => $amount,
            'bank' => $bank,
            'bank_number' => $acount_number,
            'create_at' => date('Y-m-d H:i:s'),
            'exchange_level' => '0',
            'exchange_type' => 'E',
        ];

        $result = $pointExchange->insert($data);

        $point = new PointModel();
        $my_point = $point->select('my_point')
            ->where('member_ci', $ci)
            ->orderBy('create_at', 'DESC')
            ->first();

        $my_point_value = isset($my_point['my_point']) ? $my_point['my_point'] : 0;

        $data = [
            'member_ci' => $ci,
            'my_point' => $my_point_value - $amount,
            'use_point' => $amount,
            'point_details' => '환전신청',
            'create_at' => date('Y-m-d H:i:s'),
            'point_type' => 'U',
        ];

        $result2 = $point->insert($data);

        if ($result) {
            return $this->response->setJSON(['success' => true]);
        } else {
            return $this->response->setJSON(['success' => false]);
        }
    }
    /*환전 성공페이지 */
    public function exchangePoint_success(): string
    {
        return view('/support/sp_mypage_excharge_success');
    }

    /*환전 실패페이지 */
    public function exchangePoint_fail(): string
    {
        return view('/support/sp_mypage_excharge_fail');
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
        $ci = $session->get('ci_support');

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
    
    // public function reward(): string
    // {
    //     return view('/support/sp_reward');
    // }

    public function reward()
    {
        $db = db_connect();

        $session = session();
        $ci = $session->get('ci_support');
        $MemberModel = new MemberModel();
        $query = "SELECT
                    wsr.idx,
                    m.name,
                    m.nickname,
                    wsr.ci,
                    wsr.reward_type,
                    wsr.recommender_gender,
                    wsr.recommender_ci,
                    m.email,
                    wsr.reward_title,
                    wsr.reward_date,
                    wsr.reward_meeting_idx,
                    wsr.reward_meeting_members,
                    wsr.reward_meeting_percent,
                    wsr.check
                FROM
                    wh_support_reward wsr
                LEFT JOIN members m on
                    wsr.ci = m.ci
                WHERE 
                    wsr.ci = '".$ci."'
                ORDER BY wsr.idx desc, wsr.check ASC";

        $data['datas'] = $MemberModel->query($query)->getResultArray();
        $data['query'] = $MemberModel->getLastQuery()->getQuery();

        return view('support/sp_reward', $data);
    }
    
}
