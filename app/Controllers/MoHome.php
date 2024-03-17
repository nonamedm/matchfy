<?php

namespace App\Controllers;

use App\Models\BoardModel;
use App\Models\BoardFileModel;
use App\Models\MemberModel;
use App\Models\PointModel;
use App\Helpers\MoHelper;
use CodeIgniter\Session\Session;

class MoHome extends BaseController
{
    public function index(): string
    {
        return view('mo_index');
    }
    public function pass(): string
    {
        $data['params'] = '';
        return view('mo_pass', $data);
    }
    public function agree(): string
    {

        $BoardModel = new BoardModel();
        $BoardModel->setTableName('wh_board_terms');
        $postData['terms'] = $BoardModel->orderBy('created_at', 'DESC')->first();

        $BoardModel2 = new BoardModel();
        $BoardModel2->setTableName('wh_board_privacy');
        $postData['privacy'] = $BoardModel2->orderBy('created_at', 'DESC')->first();

        return view('mo_agree', $postData);
    }
    public function signin(): string
    {
        $postData = $this->request->getPost();
        return view('mo_signin', $postData);
    }
    public function signinPhoto(): string
    {
        $postData = $this->request->getPost();

        // 모든 POST 데이터를 하나의 배열에 담기
        $data['postData'] = $postData;

        return view('mo_signin_photo', $data);
    }
    public function signinType(): string
    {
        // POST로 전달된 데이터 받아오기
        $postData = $this->request->getPost();

        // 모든 POST 데이터를 하나의 배열에 담기
        $data['postData'] = $postData;

        // view에 데이터 전달
        return view('mo_signin_type', $data);
    }
    public function signinSuccess(): string
    {
        return view('mo_signin_success');
    }
    public function signinRegular()
    {
        $postData = $this->request->getPost();
        $moAjax = new \App\Controllers\MoAjax();

        $ci = $this->request->getPost('ci');
        $grade = $this->request->getPost('grade');

        // 등급부터 업그레이드 후 페이지 뷰
        $result = $moAjax->gradeUpdate($ci, $grade);
        if ($result === '0')
        {
            $postData['result'] = $result;
        } else
        {
            // 오류일 때 이전 페이지로 리디렉션.
        }

        return view('mo_signin_regular', $postData);
    }
    public function signinPremium(): string
    {
        $postData = $this->request->getPost();
        $moAjax = new \App\Controllers\MoAjax();

        $ci = $this->request->getPost('ci');
        $grade = $this->request->getPost('grade');

        // 등급부터 업그레이드 후 페이지 뷰
        $result = $moAjax->gradeUpdate($ci, $grade);
        if ($result === '0')
        {
            $postData['result'] = $result;
        } else
        {
            // 오류일 때 이전 페이지로 리디렉션.
        }

        return view('mo_signin_premium', $postData);
    }
    public function signinPopup(): string
    {
        return view('mo_signin_popup');
    }
    public function menu(): string
    {
        return view('mo_menu');
    }
    public function notice()
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
                                    (SELECT CONCAT(DATE_FORMAT(MIN(created_at), "%y.%m.%d"), " ~ ", DATE_FORMAT(MAX(created_at), "%y.%m.%d")) FROM wh_board_notice) AS created_at_range')
            ->from('wh_board_notice bo')
            ->join('wh_board_files bf', 'bo.id = bf.board_idx', 'left')
            ->groupBy('bo.id');
        if ($value == 'recent')
        {
            $query->orderBy('bo.id', 'DESC');
        } else if ($value == 'popular')
        {
            $query->orderBy('bo.hit', 'DESC');
        } else
        {
            $query->orderBy('bo.id', 'DESC');
        }

        $data['datas'] = $query->get()->getResultArray();

        $BoardModel = new BoardModel();
        $BoardModel->setTableName('wh_board_notice');

        $min_date_query = $BoardModel->query('SELECT MIN(created_at) AS min_date FROM wh_board_notice');
        $max_date_query = $BoardModel->query('SELECT MAX(created_at) AS max_date FROM wh_board_notice');

        $min_date_row = $min_date_query->getRow();
        $max_date_row = $max_date_query->getRow();

        $min_date = date('y.m.d', strtotime($min_date_row->min_date));
        $max_date = date('y.m.d', strtotime($max_date_row->max_date));

        $data['min_date'] = $min_date;
        $data['max_date'] = $max_date;

        if ($this->request->isAJAX())
        {
            return $this->response->setJSON($data);
        } else
        {
            return view('mo_notice', $data);
        }
    }


    public function noticeView($id)
    {
        $BoardModel = new BoardModel();
        $BoardModel->setTableName('wh_board_notice');
        $data['notice'] = $BoardModel->find($id);

        $BoardModel->increaseHit($id);

        $fileData = new BoardFileModel();
        $data['file'] = $fileData->where('board_idx', $id)->first();


        return view('mo_notice_view', $data);
    }

    public function faq(): string
    {
        $BoardModel = new BoardModel();
        $BoardModel->setTableName('wh_board_faq');
        $data['faqs'] = $BoardModel->orderBy('created_at', 'DESC')->findAll();

        return view('mo_faq', $data);
    }
    public function terms(): string
    {
        $BoardModel = new BoardModel();
        $BoardModel->setTableName('wh_board_terms');
        $terms = $BoardModel->orderBy('created_at', 'DESC')->first();

        return view('mo_terms', ['terms' => $terms]);
    }
    public function privacy(): string
    {
        $BoardModel = new BoardModel();
        $BoardModel->setTableName('wh_board_privacy');
        $privacy = $BoardModel->orderBy('created_at', 'DESC')->first();

        return view('mo_privacy', ['privacy' => $privacy]);
    }
    public function mypage(): string
    {
        return view('mo_mypage');
    }
    public function mymsg(): string
    {
        return view('mo_mymsg');
    }
    public function mymsgList(): string
    {
        return view('mo_mymsg_list');
    }
    public function mymsgMenu(): string
    {
        return view('mo_mymsg_menu');
    }
    public function mymsgAi(): string
    {
        return view('mo_mymsg_ai');
    }
    public function mymsgAiProfilePopup(): string
    {
        return view('mo_mymsg_ai_profile_popup');
    }
    public function mymsgMatchReviewPopup(): string
    {
        return view('mo_mymsg_match_review_popup');
    }
    public function mymsgMemberPopup(): string
    {
        return view('mo_mymsg_member_popup');
    }
    public function reportPopup(): string
    {
        return view('mo_report_popup');
    }
    public function schedulePopup(): string
    {
        return view('mo_schedule_popup');
    }
    public function schDepositPopup(): string
    {
        return view('mo_sch_deposit_popup');
    }
    public function invite(): string
    {
        return view('mo_invite');
    }
    public function invitePopup(): string
    {
        return view('mo_invite_popup');
    }

    public function usePoint(){
        $session = session();
        // $ci = $session->get('ci');
        $ci = '8BSLoU9LjHKfmhCn1Ex707JlDfqta/AGnQEZfTb3HyZEfJgol/0tKsxvd7VJsCljrByN6ct/+9v7xDUhaG/Rk2322EJu3+gSXDgZ75BZNLc=';
        $point = $this->request->getPost('point');
        $pointModel = new PointModel();

        $my_point = $pointModel ->select('my_point')
                                ->where('member_ci', $ci)
                                ->orderBy('create_at', 'DESC')
                                ->first();
        
        $my_point_value = isset($my_point['my_point']) ? $my_point['my_point'] : 0;
        
        if($my_point_value < $point){
            return $this->response->setJSON(['success' => false , 'msg' => '충전후 사용해주세요.']);
        }

        $data = [
            'member_ci' => $ci,
            'my_point' => $my_point_value - $point,
            'use_point' => $point,
            'point_details' => '사용한 포인트 내역',
            'create_at' => date('Y-m-d H:i:s'),
            'point_type' => 'U',
        ];
    
        $result = $pointModel->insert($data);

        if ($result) {
            return $this->response->setJSON(['success' => true, 'msg' => '결제 완료 되었습니다.']);
        } else {
            return $this->response->setJSON(['success' => false, 'msg' => '결제가 되지 않았습니다.']);
        }
    }

    public function mypageSelectPoint(){
        $session = session();
        // $ci = $session->get('ci');
        $ci = '8BSLoU9LjHKfmhCn1Ex707JlDfqta/AGnQEZfTb3HyZEfJgol/0tKsxvd7VJsCljrByN6ct/+9v7xDUhaG/Rk2322EJu3+gSXDgZ75BZNLc=';
        $type = $this->request->getPost('type');
        $date = $this->request->getPost('date');
        $value = $this->request->getPost('value');
        $pointModel = new PointModel();
        
        $points = $pointModel->where('member_ci', $ci);
        
        if($type =='add'){
            $points->where('point_type', 'A');
        }else{
            $points->where('point_type', 'U');
        }
        
        if($date == '1week'){
            $points->where('create_at >', date('Y-m-d H:i:s', strtotime('-1 week')));
        } else if($date == '1month'){
            $points->where('create_at >', date('Y-m-d H:i:s', strtotime('-1 month')));
        } else if($date == '3month'){
            $points->where('create_at >', date('Y-m-d H:i:s', strtotime('-3 month')));
        }

        if ($value == 'latest') {
            $points->orderBy('create_at', 'DESC');
        } else if ($value == 'oldest') {
            $points->orderBy('create_at', 'ASC');
        } else if ($value == 'highest_amount') {
            $points->orderBy('add_point', 'DESC');
        } else if ($value == 'lowest_amount') {
            $points->orderBy('add_point', 'ASC');
        } else {
            $points->orderBy('create_at', 'DESC');
        }
        
        $points = $points->findAll();
        
        if ($points) {
            return $this->response->setJSON(['success' => true, 'points' => $points]);
        } else {
            return $this->response->setJSON(['success' => false]);
        }
    }

    public function mypageWallet()
    {
        $session = session();
        // $ci = $session->get('ci');
        $ci = '8BSLoU9LjHKfmhCn1Ex707JlDfqta/AGnQEZfTb3HyZEfJgol/0tKsxvd7VJsCljrByN6ct/+9v7xDUhaG/Rk2322EJu3+gSXDgZ75BZNLc=';
        $pointModel = new PointModel();
        
        $points = $pointModel->where('member_ci', $ci)
                            ->where('point_type', 'A')
                            ->orderBy('create_at', 'DESC')
                            ->findAll();

        return view('mo_mypage_wallet', ['points' => $points]);
    }

    public function mypageWallet2(): string
    {
        $session = session();
        // $ci = $session->get('ci');
        $ci = '8BSLoU9LjHKfmhCn1Ex707JlDfqta/AGnQEZfTb3HyZEfJgol/0tKsxvd7VJsCljrByN6ct/+9v7xDUhaG/Rk2322EJu3+gSXDgZ75BZNLc=';
        $pointModel = new PointModel();
        
        $points = $pointModel->where('member_ci', $ci)
                            ->where('point_type', 'U')
                            ->orderBy('create_at', 'DESC')
                            ->findAll();

        return view('mo_mypage_wallet2', ['points' => $points]);
    }

    public function mypageWalletCharge()
    {
        $my_point_value = $this->mypageGetPoint();
        return view('mo_mypage_wallet_charge', ['my_point' => $my_point_value]);
    }

    public function mypageGetPoint(){
        $session = session();
        // $ci = $session->get('ci');
        $ci = '8BSLoU9LjHKfmhCn1Ex707JlDfqta/AGnQEZfTb3HyZEfJgol/0tKsxvd7VJsCljrByN6ct/+9v7xDUhaG/Rk2322EJu3+gSXDgZ75BZNLc=';
        $pointModel = new PointModel();
        
        $my_point = $pointModel ->select('my_point')
                                ->where('member_ci', $ci)
                                ->orderBy('create_at', 'DESC')
                                ->first();
        
        $my_point_value = isset($my_point['my_point']) ? $my_point['my_point'] : 0;
        return $my_point_value;
    }

    public function mypageAddPoint($pointValue,$quantityNum){
        $session = session();
        // $ci = $session->get('ci');
        $ci = '8BSLoU9LjHKfmhCn1Ex707JlDfqta/AGnQEZfTb3HyZEfJgol/0tKsxvd7VJsCljrByN6ct/+9v7xDUhaG/Rk2322EJu3+gSXDgZ75BZNLc=';
        $authResultCode = $this->request->getPost('authResultCode');

        if($authResultCode=='0000'){ //인증성공
            $amount = $this->request->getPost('amount');
            $clientId = $this->request->getPost('clientId');
            $orderId = $this->request->getPost('orderId');
            $pointModel = new PointModel();
    
            $my_point = $pointModel ->select('my_point')
                                    ->where('member_ci', $ci)
                                    ->orderBy('create_at', 'DESC')
                                    ->first();
            
            $my_point_value = isset($my_point['my_point']) ? $my_point['my_point'] : 0;
            
            $data = [
                'member_ci' => $ci,
                'my_point' => $my_point_value + $amount,
                'add_point' => $pointValue == '5000'?5000*$quantityNum:$amount,
                'point_details' => '포인트 충전',
                'create_at' => date('Y-m-d H:i:s'),
                'point_type' => 'A',
                'extra1' => $clientId,
                'extra1' => $$orderId,
            ];
        
            $result = $pointModel->insert($data);
    
            if ($result) {
                return view('mo_mypage_charge_success',['msg' => '포인트 충전이 되었습니다.']);
            } else {
                return view('mo_mypage_charge_fail',['msg' => '포인트 충전을 다시 해주세요.']);
            }

        }else{ // 카드에 돈이 없어서 돈이 입금 되지않았을 경우
            return view('mo_mypage_charge_fail',['msg' => '다시 시도 해주세요.']);
        }
    }

    public function mypageGroupList(): string
    {
        return view('mo_mypage_group_list');
    }
    public function mypageGroupSearchList(): string
    {
        return view('mo_mypage_group_search_list');
    }
    public function mypageGroupDetail(): string
    {
        return view('mo_mypage_group_detail');
    }
    public function mypageGroupPartcntPopup(): string
    {
        return view('mo_mypage_group_partcnt_popup');
    }
    public function mypageGroupApplyPopup(): string
    {
        return view('mo_mypage_group_apply_popup');
    }
    public function mypageGroupCreate(): string
    {
        return view('mo_mypage_group_create');
    }
    public function mypageMygroupList(): string
    {
        return view('mo_mypage_mygroup_list');
    }
    public function mypageMygroupListEdit(): string
    {
        return view('mo_mypage_mygroup_list_edit');
    }
    public function mypageGroupSearchPopup(): string
    {
        return view('mo_mypage_group_search_popup');
    }
    public function mymsgAiQna(): string
    {
        return view('mo_mymsg_ai_qna');
    }
    public function myfeed(): string
    {
        return view('mo_myfeed');
    }
    public function myfeedDetail(): string
    {
        return view('mo_myfeed_detail');
    }
    public function myfeedEdit(): string
    {
        return view('mo_myfeed_edit');
    }
    public function matchFeed(): string
    {
        return view('mo_match_feed');
    }
    public function myfeedView(): string
    {
        return view('mo_myfeed_view');
    }
    public function myfeedViewProfile(): string
    {
        return view('mo_myfeed_view_profile');
    }
    public function alertPopup(): string
    {
        return view('mo_alert_popup');
    }
    public function allianceList(): string
    {
        return view('mo_alliance_list');
    }
    public function allianceRegionPopup(): string
    {
        return view('mo_alliance_region_popup');
    }
    public function allianceDetail(): string
    {
        return view('mo_alliance_detail');
    }
    public function allianceDetail2(): string
    {
        return view('mo_alliance_detail2');
    }
    public function alliancePayment(): string
    {
        return view('mo_alliance_payment');
    }
    public function allianceSchedule(): string
    {
        return view('mo_alliance_schedule');
    }
    public function allianceReservePopup(): string
    {
        return view('mo_alliance_reserve_popup');
    }
    public function allianceApply(): string
    {
        return view('mo_alliance_apply');
    }
    public function allianceExchange(): string
    {
        return view('mo_alliance_exchange');
    }
    public function partner(): string
    {
        return view('mo_partner');
    }
    public function partnerRegular(): string
    {
        return view('mo_partner_regular');
    }
    public function partnerPremium(): string
    {
        return view('mo_partner_premium');
    }
}
