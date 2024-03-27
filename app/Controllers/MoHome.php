<?php

namespace App\Controllers;

use App\Models\BoardModel;
use App\Models\BoardFileModel;
use App\Models\MemberModel;
use App\Models\MemberFileModel;
use App\Models\MemberFeedModel;
use App\Models\MemberFeedFileModel;
use App\Models\MatchPartnerModel;
use App\Models\MatchFactorModel;
use App\Models\PointModel;
use App\Models\PointExchangeModel;
use App\Models\MeetingModel;
use App\Models\MeetingFileModel;
use App\Models\MeetingMembersModel;
use App\Helpers\MoHelper;
use App\Models\MeetModel;
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
        $postData = $this->request->getPost();
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
        $session = session();
        $ci = $session->get('ci');

        $MemberModel = new MemberModel();
        $user = $MemberModel->where('ci', $ci)->first();

        $MemberFileModel = new MemberFileModel();
        $imageInfo = $MemberFileModel
            ->where('member_ci', $ci)
            ->where('board_type', 'main_photo')
            ->where('delete_yn', 'n')
            ->first();

        $data = [
            'nickname' => $user['nickname'],
            'name' => $user['name'],
            'birthday' => substr($user['birthday'], 0, 4),
            'city' => $user['city'],
            'mbti' => $user['mbti'],
            'image' => $imageInfo
        ];

        return view('mo_mypage', $data);
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

    public function walletTypeList()
    {
        $session = session();
        $ci = $session->get('ci');
        $type = $this->request->getPost('walletType');
        $date = $this->request->getPost('date');
        $value = $this->request->getPost('value');
        $page = intval($this->request->getPost('page'));
        $perPage = intval($this->request->getPost('perPage'));
        $pointModel = new PointModel();

        $points = $pointModel->where('member_ci', $ci);

        if ($type == 'add')
        {
            $points->where('point_type', 'A');
        } else
        {
            $points->where('point_type', 'U');
        }

        if ($date == '1week')
        {
            $points->where('create_at >', date('Y-m-d H:i:s', strtotime('-1 week')));
        } else if ($date == '1month')
        {
            $points->where('create_at >', date('Y-m-d H:i:s', strtotime('-1 month')));
        } else if ($date == '3month')
        {
            $points->where('create_at >', date('Y-m-d H:i:s', strtotime('-3 month')));
        }

        if ($value == 'latest')
        {
            $points->orderBy('create_at', 'DESC');
        } else if ($value == 'oldest')
        {
            $points->orderBy('create_at', 'ASC');
        } else if ($value == 'highest_amount')
        {
            if ($type == 'add')
            {
                $points->orderBy('add_point', 'DESC');
            } else
            {
                $points->orderBy('use_point', 'DESC');
            }
        } else if ($value == 'lowest_amount')
        {
            if ($type == 'add')
            {
                $points->orderBy('add_point', 'ASC');
            } else
            {
                $points->orderBy('use_point', 'ASC');
            }
        } else
        {
            $points->orderBy('create_at', 'DESC');
        }

        $points = $points->findAll($perPage * $page, 0);

        if ($points)
        {
            return $this->response->setJSON(['success' => true, 'points' => $points]);
        } else
        {
            return $this->response->setJSON(['success' => false]);
        }
    }

    public function mypageWallet()
    {
        $session = session();
        $ci = $session->get('ci');
        $page = 1;
        $perPage = 6;

        $pointModel = new PointModel();

        $points = $pointModel->where('member_ci', $ci);
        $points->where('point_type', 'A');
        $points->where('create_at >', date('Y-m-d H:i:s', strtotime('-1 week')));
        $points->orderBy('create_at', 'DESC');
        $points = $points->findAll($perPage * $page, 0);

        return view('mo_mypage_wallet', ['points' => $points]);
    }

    public function pageClac($pointType)
    {
        $session = session();
        $ci = $session->get('ci');
        $pointModel = new PointModel();

        $count = $pointModel->where('member_ci', $ci)
            ->where('point_type', $pointType)
            ->countAllResults();
        return $count;
    }

    public function mypageWalletCharge()
    {
        $my_point_value = $this->mypageGetPoint();
        return view('mo_mypage_wallet_charge', ['my_point' => $my_point_value]);
    }

    public function mypageGetPoint()
    {
        $session = session();
        $ci = $session->get('ci');
        $pointModel = new PointModel();

        $my_point = $pointModel->select('my_point')
            ->where('member_ci', $ci)
            ->orderBy('create_at', 'DESC')
            ->first();

        $my_point_value = isset ($my_point['my_point']) ? $my_point['my_point'] : 0;
        return $my_point_value;
    }

    public function mypageAddPoint($pointValue, $quantityNum)
    {
        $session = session();
        $ci = $session->get('ci');
        $authResultCode = $this->request->getPost('authResultCode');

        if ($authResultCode == '0000')
        { //인증성공
            $amount = $this->request->getPost('amount');
            $clientId = $this->request->getPost('clientId');
            $orderId = $this->request->getPost('orderId');
            $pointModel = new PointModel();

            $my_point = $pointModel->select('my_point')
                ->where('member_ci', $ci)
                ->orderBy('create_at', 'DESC')
                ->first();

            $my_point_value = isset ($my_point['my_point']) ? $my_point['my_point'] : 0;

            if ($pointValue == '5000')
            {
                $amount = 5000 * $quantityNum;
            } else
            {
                $amount;
            }
            $data = [
                'member_ci' => $ci,
                'my_point' => $my_point_value + $amount,
                'add_point' => $pointValue == '5000' ? 5000 * $quantityNum : $amount,
                'point_details' => '포인트 충전',
                'create_at' => date('Y-m-d H:i:s'),
                'point_type' => 'A',
                'extra1' => $clientId,
            ];

            $result = $pointModel->insert($data);

            if ($result)
            {
                return view('mo_mypage_charge_success', ['msg' => '포인트 충전이 되었습니다.']);
            } else
            {
                return view('mo_mypage_charge_fail', ['msg' => '포인트 충전을 다시 해주세요.']);
            }

        } else
        { // 카드에 돈이 없어서 돈이 입금 되지않았을 경우
            return view('mo_mypage_charge_fail', ['msg' => '다시 시도 해주세요.']);
        }
    }

    public function mypageGroupList(): string
    {
        $MeetingModel = new MeetingModel();
        $MeetingFileModel = new MeetingFileModel();

        $Meeting['meetings'] = $MeetingModel->orderBy('create_at', 'DESC')->findAll();

        return view('mo_mypage_group_list', $Meeting);
    }
    public function mypageGroupSearchList(): string
    {
        return view('mo_mypage_group_search_list');
    }
    public function mypageGroupDetail(): string
    {
        $session = session();
        $ci = $session->get('ci');
        $name = $session->get('name');
        //$meetingIdx = $this->request->getPost('idx');


        $MeetingModel = new MeetingModel();
        $MeetingFileModel = new MeetingFileModel();

        $Meeting = $MeetingModel->where('idx', $idx)->first();

        $data = [
            'category' => $Meeting['category'],
            'recruitment_start_date' => $Meeting['recruitment_start_date'],
            'recruitment_end_date' => $Meeting['recruitment_end_date'],
            'meeting_start_date' => $Meeting['meeting_start_date'],
            'meeting_end_date' => $Meeting['meeting_end_date'],
            'number_of_people' => $Meeting['number_of_people'], //현재 모집된 인원 수 필요
            'matching_rate' => $Meeting['matching_rate'],
            'title' => $Meeting['title'],
            'content' => $Meeting['content'],
            'meeting_place' => $Meeting['meeting_place'],
            'membership_fee' => $Meeting['membership_fee']
        ];

        // if(!empty($userFile)) {
        //     $data = array_merge($data, $userFile);
        // } else {
        //     $data = array_merge($data, ['file_path' => 'static/images/', 'file_name' => 'profile_noimg.png']);
        // }
        return view('mo_mypage_group_detail', $data);
    }
    public function mypageGroupPartcntPopup()
    {
        $session = session();
        $ci = $session->get('ci');
        $meeting_idx = $this->request->getPost('meetingIdx');

        $meeting_members = new MeetingMembersModel();
        $query = $meeting_members->distinct()
            ->select('
                                    a.idx as idx,
                                    a.meeting_idx as meeting_idx,
                                    a.delete_yn as delete_yn,
                                    a.meeting_master as meeting_master,
                                    d.file_path as file_path,
                                    d.file_name as file_name,
                                    c.name as name,
                                    c.city as city,
                                    c.birthday as birthday,
                                    c.mbti as mbti'
            )
            ->from('wh_meeting_members a')
            ->join('wh_meetings b', 'a.meeting_idx = b.idx', 'left')
            ->join('members c', 'a.member_ci = c.ci', 'left')
            ->join('member_files d', 'c.ci = d.member_ci', 'left')
            ->where('b.idx', $meeting_idx)
            ->where('a.delete_yn', 'N')
            ->orderBy('a.meeting_master')
            ->orderBy('a.create_at')
            ->get();

        $result = $query->getResult();

        if ($result)
        {
            return $this->response->setJSON(['success' => true, 'data' => $result]);
        } else
        {
            return $this->response->setJSON(['success' => false,]);
        }
    }

    public function getMemberCount($meeting_idx)
    {

        $MeetingMembersModel = new MeetingMembersModel();
        $memCount = $MeetingMembersModel
            ->where('meeting_idx', $meeting_idx)
            ->countAllResults();

        $meetModel = new MeetModel();
        $peapleCountQuery = $meetModel
            ->select('m.number_of_people as number_of_people')
            ->from('wh_meetings m')
            ->where('m.idx', $meeting_idx);

        $peapleCountResult = $peapleCountQuery->get()->getRow();
        $number_of_people = $peapleCountResult->number_of_people;

        // 값 비교
        if ($number_of_people - $memCount > 0)
        {
            return 1; // 조건 충족
        } else
        {
            return -1; // 조건 미충족
        }

    }

    /*결재 시 모임에 이미 등록되어있는지 판단 */
    public function getMemberConfirm($ci)
    {
        $MeetingMembersModel = new MeetingMembersModel();
        $total = $MeetingMembersModel
            ->where('member_ci', $ci)
            ->countAllResults();
        // echo $total;
        if ($total > 0)
        {
            return -1; // 이미 등록되어 있음
        } else
        {
            return 1; // 등록되어 있지 않음
        }
    }

    /* 모임 결재 */
    public function usePoint()
    {
        $session = session();
        $ci = $session->get('ci');
        $point = intval($this->request->getPost('point'));
        $meeting_idx = intval($this->request->getPost('meetingIdx'));
        $mypoint = intval($this->request->getPost('mypoint'));
        $pointModel = new PointModel();

        $getMemberCount = $this->getMemberCount($meeting_idx);
        $getMemberConfirm = $this->getMemberConfirm($ci);

        if ($getMemberCount == 1)
        {
            if ($mypoint < $point)
            {//보유포인트가 모자랄 경우
                return $this->response->setJSON(['success' => true, 'msg' => '충전후 사용해주세요.']);
            } else
            {
                if ($getMemberConfirm == 1)
                { //통과!
                    //마스터 유저                  
                    $masterMember = new MemberModel();
                    $meetingMaster = $masterMember
                        ->distinct()
                        ->select('m.name as name, m.ci as ci, wp.my_point as k_point')
                        ->from('members m')
                        ->join('wh_points wp', 'wp.member_ci = m.ci', 'left')
                        ->join('wh_meeting_members wmm', 'm.ci = wmm.member_ci', 'left')
                        ->where('wmm.meeting_idx', $meeting_idx)
                        ->where('wmm.meeting_master', 'K')
                        ->orderBy('wp.create_at', 'desc')
                        ->get()
                        ->getRow();

                    //참석한 멤버 포인트 사용
                    $mydata = [
                        'member_ci' => $ci,
                        'my_point' => $mypoint - $point,
                        'use_point' => $point,
                        'point_details' => $meetingMaster->name . "(모임회비)",
                        'create_at' => date('Y-m-d H:i:s'),
                        'point_type' => 'U',
                    ];
                    $result = $pointModel->insert($mydata);

                    //참석 멤버 추가
                    $meetMemdata = [
                        'meeting_idx' => $meeting_idx,
                        'member_ci' => $ci,
                        'meeting_master' => 'M',
                        'create_at' => date('Y-m-d H:i:s'),
                    ];
                    $meeting_members = new MeetingMembersModel();
                    $meeting_members->insert($meetMemdata);

                    //나의 유저
                    $memberName = new MemberModel();
                    $meetingUser = $memberName
                        ->distinct()
                        ->select('m.name as name')
                        ->from('members m')
                        ->where('m.ci', $ci)
                        ->get()
                        ->getRow();

                    //방장한테 포인트 가도록
                    $masterdata = [
                        'member_ci' => $meetingMaster->ci,
                        'my_point' => $meetingMaster->k_point + $point,
                        'add_point' => $point,
                        'point_details' => $meetingUser->name . "(모임회비)",
                        'create_at' => date('Y-m-d H:i:s'),
                        'point_type' => 'A',
                    ];

                    $pointModel->insert($masterdata);

                    if ($result)
                    {
                        return $this->response->setJSON(['success' => true, 'msg' => '포인트 결재 완료 되었습니다.']);
                    } else
                    {
                        return $this->response->setJSON(['success' => false, 'msg' => '포인트 결재가 실패 하였습니다.']);
                    }

                } else
                {//이미 참석된 멤버 일 경우
                    return $this->response->setJSON(['success' => true, 'msg' => '이미 참석된 멤버 입니다.']);
                }
            }
        } else
        {//참석멤버수가 다 찼을 경우
            return $this->response->setJSON(['success' => true, 'msg' => '참석멤버수가 다 찼습니다.']);
        }


    }

    public function mypageGroupApplyPopup()
    {
        $session = session();
        $ci = $session->get('ci');
        $meeting_idx = $this->request->getPost('meetingIdx');

        $meeting_members = new MeetingMembersModel();
        $query = $meeting_members->distinct()
            ->select('a.idx, 
                                a.category, 
                                a.meeting_start_date, 
                                a.meeting_end_date, 
                                a.number_of_people, 
                                (select count(*) from wh_meeting_members c where c.meeting_idx = ' . $meeting_idx . ') as meet_members, 
                                a.meeting_place, 
                                a.membership_fee, 
                                b.file_path, 
                                b.file_name')
            ->from('wh_meetings a')
            ->join('wh_meetings_files b', 'a.idx = b.meeting_idx', 'left')
            ->where('a.idx', $meeting_idx)
            ->get();

        $result = $query->getResult();

        $my_point_value = $this->mypageGetPoint();

        if ($result)
        {
            return $this->response->setJSON(['success' => true, 'data' => $result, 'my_point' => $my_point_value]);
        } else
        {
            return $this->response->setJSON(['success' => false,]);
        }
        // return view('mo_mypage_group_apply_popup');
    }
    public function mypageGroupCreate(): string
    {
        // $file = $this->request->getFile('userfile');

        // if ($file->isValid()) {
        //     $upload= new Upload();
        //     $fileData = $upload->Boardupload($file,'wh_board_notice','notice',$title,$content);

        //     if ($fileData) {
        //         return redirect()->to("/ad/notice/noticeList")->with('msg', '등록이 완료되었습니다.');    
        //     } else {
        //         return redirect()->to("/ad/notice/noticeList")->with('msg', '등록이 실패 되었습니다.');
        //     }
        // } else {

        //사진 추가
        $category = $this->request->getPost('category');
        $recruitment_start_date = $this->request->getPost('recruitment_start_date');
        $recruitment_end_date = $this->request->getPost('recruitment_end_date');
        $meeting_start_date = $this->request->getPost('meeting_start_date');
        $meeting_end_date = $this->request->getPost('meeting_end_date');
        $number_of_people = $this->request->getPost('number_of_people');
        $matching_rate = $this->request->getPost('matching_rate');
        $title = $this->request->getPost('title');
        $content = $this->request->getPost('content');
        $town = $this->request->getPost('reservation_previous');
        $meeting_place = $this->request->getPost('meeting_place');
        $membership_fee = $this->request->getPost('membership_fee');

        // $town = $encrypter->decrypt(base64_decode($ci), ['key' => 'nonamedm', 'blockSize' => 32]);

        $MeetingModel = new MeetingModel();

        $data = [
            'category' => $category,
            'recruitment_start_date' => $recruitment_start_date,
            'recruitment_end_date' => $recruitment_end_date,
            'meeting_start_date' => $meeting_start_date,
            'meeting_end_date' => $meeting_end_date,
            'number_of_people' => $number_of_people,
            'matching_rate' => $matching_rate,
            'title' => $title,
            'content' => $content,
            'reservation_previous' => $reservation_previous,
            'meeting_place' => $meeting_place,
            'membership_fee' => $membership_fee,
        ];

        // 데이터 저장
        $inserted = $MeetingModel->insert($data);


        return view('mo_mypage_group_create');
        // }
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
    public function myfeed($id)
    {
        $session = session();
        $ci = $session->get('ci');
        $name = $session->get('name');

        $MemberModel = new MemberModel();
        $MemberFileModel = new MemberFileModel();
        $MemberFeedModel = new MemberFeedModel();
        // $MemberFeedFileModel = new MemberFeedFileModel();

        $user = $MemberModel->where('nickname', $id)->first();
        $selectFeed = [
            'wh_member_feed.member_ci' => $user['ci'],
            'wh_member_feed.delete_yn' => 'n',
        ];
        $feedList = $MemberFeedModel->where($selectFeed)->join('wh_member_feed_files', 'wh_member_feed_files.feed_idx = wh_member_feed.idx')->orderBy('wh_member_feed.created_at', 'DESC')->findAll();
        // $feedFile = $MemberFeedFileModel->where('member_ci', $ci)->findAll();
        $condition = ['board_type' => 'main_photo', 'member_ci' => $user['ci'], 'delete_yn' => 'n'];
        $userFile = $MemberFileModel->where($condition)->first();
        $data = [
            'ci' => $user['ci'],
            'name' => $name,
            'user' => $user,
            'feed_list' => $feedList,
        ];
        if (!empty ($userFile))
        {
            $data = array_merge($data, $userFile);
        } else
        {
            $data = array_merge($data, ['file_path' => 'static/images/', 'file_name' => 'profile_noimg.png']);
        }
        return view('mo_myfeed', $data);
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
        $session = session();
        $ci = $session->get('ci');

        $MemberFeedModel = new MemberFeedModel();
        $MatchPartnerModel = new MatchPartnerModel();
        $MatchFactorModel = new MatchFactorModel();

        $factorList = $MatchFactorModel->where('member_ci', $ci)->first();
        $query = "SELECT 	mb.*,wmf.idx,
                        wmf.feed_cont,
                        wmff.file_path as feed_filepath,
                        wmff.file_name as feed_filename,
                        wmff.ext,
                        
                        SUBSTRING(mb.birthday, 1, 4) as birthyear,
                        
                        mf.file_path,
                        mf.file_name
                FROM    wh_member_feed wmf
                LEFT JOIN members mb on wmf.member_ci = mb.ci
                LEFT JOIN member_files mf on mb.ci = mf.member_ci
                LEFT JOIN wh_member_feed_files wmff on wmf.idx = wmff.feed_idx";
        if (!empty ($factorList['except1'])) //배제항목 있을 시 조건에서 배제하기
        {
            $query .= " WHERE (mb." . $factorList['except1'] . " != '" . $factorList['except1_detail'] . "'  OR mb." . $factorList['except1'] . " IS NULL)";
        }
        if (!empty ($factorList['except1']) && !empty ($factorList['except2'])) //배제항목 있을 시 조건에서 배제하기
        {
            $query .= " AND (mb." . $factorList['except2'] . " != '" . $factorList['except2_detail'] . "'  OR mb." . $factorList['except2'] . " IS NULL)";
        }
        $datas = $MemberFeedModel
            ->query($query)->getResultArray();

        $data['feeds'] = $datas;
        $data['factors'] = $factorList;
        $data['sql'] = $query;
        return view('mo_match_feed', $data);
    }
    public function myfeedView(): string
    {
        return view('mo_myfeed_view');
    }
    public function myfeedViewProfile($id)
    {
        $session = session();
        $ci = $session->get('ci');

        $MemberModel = new MemberModel();
        $user = $MemberModel->where('nickname', $id)->first();

        $MemberFileModel = new MemberFileModel();
        $imageInfo = $MemberFileModel
            ->where('member_ci', $user['ci'])
            ->where('board_type', 'main_photo')
            ->where('delete_yn', 'n')
            ->first();

        $data = [
            'nickname' => $user['nickname'],
            'name' => $user['name'],
            'birthday' => $user['birthday'],
            'gender' => $user['gender'],
            'city' => $user['city'],
            'town' => $user['town'],
            'mobile_no' => $user['mobile_no'],
            'grade' => $user['grade'],
            'image' => $imageInfo
        ];

        if ($user['grade'] == 'grade02' || $user['grade'] == 'grade03')
        {
            $data = array_merge($data, [
                'married' => $user['married'],
                'smoker' => $user['smoker'],
                'drinking' => $user['drinking'],
                'religion' => $user['religion'],
                'mbti' => $user['mbti'],
                'height' => $user['height'],
                'stylish' => $user['stylish'],
                'education' => $user['education'],
                'school' => $user['school'],
                'major' => $user['major'],
                'job' => $user['job'],
                'asset_range' => $user['asset_range'],
                'income_range' => $user['income_range']
            ]);
        }
        ;

        if ($user['grade'] == 'grade03')
        {
            $data = array_merge($data, [
                'father_birth_year' => $user['father_birth_year'],
                'father_job' => $user['father_job'],
                'mother_birth_year' => $user['mother_birth_year'],
                'mother_job' => $user['mother_job'],
                'siblings' => $user['siblings'],
                'residence1' => $user['residence1'],
                'residence2' => $user['residence2'],
                'residence3' => $user['residence3']
            ]);
        }
        ;
        return view('mo_myfeed_view_profile', $data);
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
        $my_point_value = $this->mypageGetPoint();
        return view('mo_alliance_exchange', ['my_point' => $my_point_value]);
    }

    public function allianceExchangePoint()
    {
        $session = session();
        $ci = $session->get('ci');

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

        $my_point_value = isset ($my_point['my_point']) ? $my_point['my_point'] : 0;

        $data = [
            'member_ci' => $ci,
            'my_point' => $my_point_value - $amount,
            'use_point' => $amount,
            'point_details' => '환전신청',
            'create_at' => date('Y-m-d H:i:s'),
            'point_type' => 'U',
        ];

        $result2 = $point->insert($data);

        if ($result)
        {
            return $this->response->setJSON(['success' => true]);
        } else
        {
            return $this->response->setJSON(['success' => false]);
        }
    }

    public function exchangePoint_success(): string
    {
        return view('mo_mypage_excharge_success');
    }

    public function exchangePoint_fail(): string
    {
        return view('mo_mypage_excharge_fail');
    }
    public function partner(): string
    {
        $session = session();
        $ci = $session->get('ci');

        $MemberModel = new MemberModel();
        $user = $MemberModel->where('ci', $ci)->first();

        $data = [
            'name' => $user['name'],
            'grade' => $user['grade'],
        ];

        $MatchPartnerModel = new MatchPartnerModel();
        $partnerInfo = $MatchPartnerModel->where('member_ci', $ci)->first();
        if ($partnerInfo)
        {
            $data = array_merge($data, $partnerInfo);
        }

        return view('mo_partner', $data);
    }
    public function factorBasic(): string
    {
        $session = session();
        $ci = $session->get('ci');

        $MemberModel = new MemberModel();
        $user = $MemberModel->where('ci', $ci)->first();

        $data = [
            'name' => $user['name'],
            'grade' => $user['grade'],
        ];

        $MatchFactorModel = new MatchFactorModel();
        $factorInfo = $MatchFactorModel->where('member_ci', $ci)->first();
        if ($factorInfo)
        {
            $data = array_merge($data, $factorInfo);
        }

        return view('mo_factor_basic', $data);
    }
    public function factorInfo(): string
    {
        $session = session();
        $ci = $session->get('ci');

        $MemberModel = new MemberModel();
        $user = $MemberModel->where('ci', $ci)->first();

        $data = [
            'name' => $user['name'],
            'grade' => $user['grade'],
        ];

        $MatchFactorModel = new MatchFactorModel();
        $factorInfo = $MatchFactorModel->where('member_ci', $ci)->first();
        if ($factorInfo)
        {
            $data = array_merge($data, $factorInfo);
        }

        return view('mo_factor_info', $data);
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
