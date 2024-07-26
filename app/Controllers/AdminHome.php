<?php

namespace App\Controllers;

use App\Controllers\Upload;
use App\Models\BoardModel;
use App\Models\BoardFileModel;
use App\Models\PointModel;
use App\Models\PointExchangeModel;
use App\Models\AllianceModel;
use App\Models\MemberModel;
use App\Models\MemberFileModel;
use App\Models\ReportMemberModel;
use App\Models\SupportRewardModel;


class AdminHome extends BaseController
{
    /*관리자 header*/
    public function header()
    {
        $session = session();
        $ci = $session->get('ci');
        $MemberModel = new MemberModel();
        $query = "SELECT * FROM members WHERE ci='" . $ci . "'";

        $adminVerify = $MemberModel->query($query)->getResultArray();
        if ($adminVerify) {
            $adminId = $adminVerify[0]['email'];
            if ($adminId === 'admin' || $adminId === 'develop') {
                return view('admin/header');
            } else {
                return redirect()->to("/");
            }
        }
    }

    /*공지사항*/
    public function noticeEdit(): string
    {
        return view('admin/ad_notice_edit');
    }

    public function noticeList()
    {
        $fileData = new BoardFileModel();
        $query = $fileData->select(
            'bo.id AS notice_id,
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
                    bf.board_type AS board_type,
                    bf.file_name AS file_name,
                    bf.file_path AS file_path,
                    bf.org_name AS org_name'
        )
            ->from('wh_board_notice bo')
            ->join('wh_board_files bf', 'bo.id = bf.board_idx', 'left')
            ->groupBy('bo.id, bo.title, bo.content, bo.author, bo.update_author, bo.created_at, bo.updated_at, bo.hit, bo.board_type, bf.id')
            ->orderBy('bo.id', 'DESC')
            // ->limit(3) // 필요한 경우 limit 추가
            ->get();

        $data['datas'] = $query->getResultArray();
        $session = session();
        $ci = $session->get('ci');
        $MemberModel = new MemberModel();
        $query = "SELECT * FROM members WHERE ci='" . $ci . "'";

        $adminVerify = $MemberModel->query($query)->getResultArray();
        if ($adminVerify) {
            $adminId = $adminVerify[0]['email'];
            if ($adminId === 'admin' || $adminId === 'develop') {
                return view('admin/ad_notice_list', $data);
            } else {
                return redirect()->to("/");
            }
        }
    }

    public function noticeUpload()
    {
        $title = $this->request->getPost('title');
        $content = $this->request->getPost('content');
        $file = $this->request->getFile('userfile');

        if ($file->isValid()) {
            $upload = new Upload();
            $fileData = $upload->Boardupload($file, 'wh_board_notice', 'notice', $title, $content);

            if ($fileData) {
                return redirect()->to("/ad/notice/noticeList")->with('msg', '등록이 완료되었습니다.');
            } else {
                return redirect()->to("/ad/notice/noticeList")->with('msg', '등록이 실패 되었습니다.');
            }
        } else {

            $BoardModel = new BoardModel();
            $BoardModel->setTableName('wh_board_notice');
            $data = [
                'title' => $title,
                'content' => $content,
                'author' => 'admin',
                'board_type' => 'notice',
                'used' => 1
            ];

            $inserted = $BoardModel->insert($data);

            if ($inserted) {
                $insertedId = $BoardModel->insertID();
                return redirect()->to("/ad/notice/noticeView/{$insertedId}")->with('msg', '등록이 완료되었습니다.');
            } else {
                return redirect()->to('/ad/notice/noticeEdit')->with('msg', '입력을 처리하는 도중 오류가 발생했습니다.');
            }
        }
    }

    public function noticeView($id)
    {
        $BoardModel = new BoardModel();
        $BoardModel->setTableName('wh_board_notice');
        $data['notice'] = $BoardModel->find($id);

        $fileData = new BoardFileModel();
        $data['file'] = $fileData->where('board_idx', $id)->first();
        // echo $fileData->getLastQuery();

        $session = session();
        $ci = $session->get('ci');
        $MemberModel = new MemberModel();
        $query = "SELECT * FROM members WHERE ci='" . $ci . "'";

        $adminVerify = $MemberModel->query($query)->getResultArray();
        if ($adminVerify) {
            $adminId = $adminVerify[0]['email'];
            if ($adminId === 'admin' || $adminId === 'develop') {
                return view('admin/ad_notice_view', $data);
            } else {
                return redirect()->to("/");
            }
        }
    }

    public function noticeModify($id)
    {
        $BoardModel = new BoardModel();
        $BoardModel->setTableName('wh_board_notice');
        $data['notice'] = $BoardModel->find($id);

        $fileData = new BoardFileModel();
        $data['file'] = $fileData->where('board_idx', $id)->first();

        if ($data['notice'] === null) {
            return redirect()->to('/ad/notice/noticeList')->with('msg', '해당 데이터를 찾을 수 없습니다.');
        }
        return view('admin/ad_notice_modify', $data);
    }

    public function noticeUpdate()
    {
        $boardId = $this->request->getPost('notice_id');
        $fileId = $this->request->getPost('file_id');
        $boardType = $this->request->getPost('board_type');
        $title = $this->request->getPost('title');
        $content = $this->request->getPost('content');
        $newFile = $this->request->getFile('userfile');

        if ($newFile->isValid()) {
            $upload = new Upload();
            if ($fileId) { //있던 파일 수정
                $fileType = 'udtFile';
            } else if (!$fileId) { //없던 파일 등록
                $fileType = 'newFile';
            }

            $fileData = $upload->BoardUpdate($newFile, 'wh_board_notice', $boardType, $title, $content, $boardId, $fileId, $fileType);

            if ($fileData) {
                return redirect()->to("/ad/notice/noticeList")->with('msg', '등록이 완료되었습니다.');
            } else {
                return redirect()->to("/ad/notice/noticeList")->with('msg', '등록이 실패 되었습니다.');
            }
        } else {
            $BoardModel = new BoardModel();
            $BoardModel->setTableName('wh_board_notice');

            $updated = $BoardModel->update($boardId, [
                'title' => $title,
                'content' => $content,
                'updated_at' => 'admin'
            ]);

            if ($updated) {
                return redirect()->to("/ad/notice/noticeView/{$boardId}")->with('msg', '수정이 완료되었습니다.');
            } else {
                return redirect()->to("/ad/notice/noticeEdit/{$boardId}")->with('msg', '입력을 처리하는 도중 오류가 발생했습니다.');
            }
        }
    }

    public function noticeDelete()
    {
        $BoardId = $this->request->getPost('BoardId');
        $fileId = $this->request->getPost('fileId');

        $BoardModel = new BoardModel();
        $BoardModel->setTableName('wh_board_notice');
        $deleted = $BoardModel->delete($BoardId);

        if ($fileId) {
            $BoardFileModel = new BoardFileModel();
            $BoardFileModel->delete($fileId);
        }

        if ($deleted) {
            return $this->response->setJSON(['success' => true]);
        } else {
            return $this->response->setJSON(['success' => false]);
        }
    }

    public function fileDelete()
    {
        $fileId = $this->request->getPost('fileId');

        $BoardFileModel = new BoardFileModel();

        $deleted = $BoardFileModel->delete($fileId);

        if ($deleted) {
            return $this->response->setJSON(['success' => true]);
        } else {
            return $this->response->setJSON(['success' => false]);
        }
    }

    /*개인정보처리방침*/
    public function privacyEdit(): string
    {
        return view('admin/ad_privacy_edit');
    }

    public function privacyList()
    {
        $BoardModel = new BoardModel();
        $BoardModel->setTableName('wh_board_privacy');

        $data['privacys'] = $BoardModel->orderBy('created_at', 'DESC')->findAll();

        $session = session();
        $ci = $session->get('ci');
        $MemberModel = new MemberModel();
        $query = "SELECT * FROM members WHERE ci='" . $ci . "'";

        $adminVerify = $MemberModel->query($query)->getResultArray();
        if ($adminVerify) {
            $adminId = $adminVerify[0]['email'];
            if ($adminId === 'admin' || $adminId === 'develop') {
                return view('admin/ad_privacy_list', $data);
            } else {
                return redirect()->to("/");
            }
        }
    }

    public function privacyMenuSelect()
    {

        $BoardModel = new BoardModel();
        $BoardModel->setTableName('wh_board_privacy');
        $privacy = $BoardModel->orderBy('created_at', 'DESC')->first();

        if ($privacy) {
            $insertedId = $privacy['id'];
            return redirect()->to("/ad/privacy/privacyView/{$insertedId}");
        } else {
            return redirect()->to('/ad/privacy/privacyEdit');
        }
    }

    public function privacyUpload()
    {
        $title = $this->request->getPost('title');
        $content = $this->request->getPost('content');

        $BoardModel = new BoardModel();
        $BoardModel->setTableName('wh_board_privacy');
        $data = [
            'title' => $title,
            'content' => $content,
            'author' => 'admin',
            'board_type' => 'privacy',
            'used' => 1
        ];

        $inserted = $BoardModel->insert($data);

        if ($inserted) {
            $insertedId = $BoardModel->insertID();
            return redirect()->to("/ad/privacy/privacyView/{$insertedId}")->with('msg', '등록이 완료되었습니다.');
        } else {
            return redirect()->to('/ad/privacy/privacyEdit')->with('msg', '입력을 처리하는 도중 오류가 발생했습니다.');
        }
    }

    public function privacyView($id)
    {
        $BoardModel = new BoardModel();
        $BoardModel->setTableName('wh_board_privacy');
        $data['privacy'] = $BoardModel->find($id);

        return view('admin/ad_privacy_view', $data);
    }

    public function privacyModify($id)
    {
        $BoardModel = new BoardModel();
        $BoardModel->setTableName('wh_board_privacy');
        $data['privacy'] = $BoardModel->find($id);


        if ($data['privacy'] === null) {
            return redirect()->to('/ad/privacy/privacyList')->with('msg', '해당 데이터를 찾을 수 없습니다.');
        }

        return view('admin/ad_privacy_modify', $data);
    }

    public function privacyUpdate()
    {
        $id = $this->request->getPost('privacy_id');
        $title = $this->request->getPost('title');
        $content = $this->request->getPost('content');

        $BoardModel = new BoardModel();
        $BoardModel->setTableName('wh_board_privacy');

        $updated = $BoardModel->update($id, [
            'title' => $title,
            'content' => $content,
            'updated_at' => 'admin'
        ]);

        if ($updated) {

            return redirect()->to("/ad/privacy/privacyView/{$id}")->with('msg', '수정이 완료되었습니다.');
        } else {
            return redirect()->to("/ad/privacy/privacyEdit/{$id}")->with('msg', '입력을 처리하는 도중 오류가 발생했습니다.');
        }
    }

    /*terms 확인*/
    public function termsEdit(): string
    {
        return view('admin/ad_terms_edit');
    }

    public function termsList()
    {
        $BoardModel = new BoardModel();
        $BoardModel->setTableName('wh_board_terms');

        $data['termss'] = $BoardModel->orderBy('created_at', 'DESC')->findAll();

        $session = session();
        $ci = $session->get('ci');
        $MemberModel = new MemberModel();
        $query = "SELECT * FROM members WHERE ci='" . $ci . "'";

        $adminVerify = $MemberModel->query($query)->getResultArray();
        if ($adminVerify) {
            $adminId = $adminVerify[0]['email'];
            if ($adminId === 'admin' || $adminId === 'develop') {
                return view('admin/ad_terms_list', $data);
            } else {
                return redirect()->to("/");
            }
        }
    }

    public function termsMenuSelect()
    {

        $BoardModel = new BoardModel();
        $BoardModel->setTableName('wh_board_terms');
        $terms = $BoardModel->orderBy('created_at', 'DESC')->first();

        if ($terms) {

            $insertedId = $terms['id'];
            return redirect()->to("/ad/terms/termsView/{$insertedId}");
        } else {

            return redirect()->to('/ad/terms/termsEdit');
        }
    }

    public function termsUpload()
    {
        $title = $this->request->getPost('title');
        $content = $this->request->getPost('content');

        $BoardModel = new BoardModel();
        $BoardModel->setTableName('wh_board_terms');
        $data = [
            'title' => $title,
            'content' => $content,
            'author' => 'admin',
            'board_type' => 'terms',
            'used' => 1
        ];

        $inserted = $BoardModel->insert($data);

        if ($inserted) {
            $insertedId = $BoardModel->insertID();
            return redirect()->to("/ad/terms/termsView/{$insertedId}")->with('msg', '등록이 완료되었습니다.');
        } else {
            return redirect()->to('/ad/terms/termsEdit')->with('msg', '입력을 처리하는 도중 오류가 발생했습니다.');
        }
    }

    public function termsView($id)
    {
        $BoardModel = new BoardModel();
        $BoardModel->setTableName('wh_board_terms');
        $data['terms'] = $BoardModel->find($id);

        return view('admin/ad_terms_view', $data);
    }

    public function termsModify($id)
    {
        $BoardModel = new BoardModel();
        $BoardModel->setTableName('wh_board_terms');
        $data['terms'] = $BoardModel->find($id);


        if ($data['terms'] === null) {
            return redirect()->to('/ad/terms/termsList')->with('msg', '해당 데이터를 찾을 수 없습니다.');
        }

        return view('admin/ad_terms_modify', $data);
    }

    public function termsUpdate()
    {
        $id = $this->request->getPost('terms_id');
        $title = $this->request->getPost('title');
        $content = $this->request->getPost('content');

        if (!$id || !is_numeric($id)) {
            return redirect()->to('/ad/terms/termsList')->with('msg', '잘못된 요청입니다.');
        }

        $BoardModel = new BoardModel();
        $BoardModel->setTableName('wh_board_terms');

        $updated = $BoardModel->update($id, [
            'title' => $title,
            'content' => $content,
            'updated_at' => 'admin'
        ]);

        if ($updated) {

            return redirect()->to("/ad/terms/termsView/{$id}")->with('msg', '수정이 완료되었습니다.');
        } else {
            return redirect()->to("/ad/terms/termsEdit/{$id}")->with('msg', '입력을 처리하는 도중 오류가 발생했습니다.');
        }
    }

    /*faq 확인*/
    public function faqEdit(): string
    {
        return view('admin/ad_faq_edit');
    }

    public function faqUpload()
    {
        $title = $this->request->getPost('title');
        $content = $this->request->getPost('content');

        $BoardModel = new BoardModel();
        $BoardModel->setTableName('wh_board_faq');
        $data = [
            'title' => $title,
            'content' => $content,
            'board_type' => 'faq',
            'author' => 'admin',

        ];

        $inserted = $BoardModel->insert($data);

        if ($inserted) {
            return redirect()->to('/ad/faq/faqList')->with('msg', '등록이 완료 되었습니다.');
        } else {
            return redirect()->to('/ad/faq/faqEdit')->with('msg', '입력을 처리하는 도중 오류가 발생했습니다.');
        }
    }

    public function faqList()
    {
        $BoardModel = new BoardModel();
        $BoardModel->setTableName('wh_board_faq');

        $data['faqs'] = $BoardModel->orderBy('created_at', 'DESC')->findAll();


        $session = session();
        $ci = $session->get('ci');
        $MemberModel = new MemberModel();
        $query = "SELECT * FROM members WHERE ci='" . $ci . "'";

        $adminVerify = $MemberModel->query($query)->getResultArray();
        if ($adminVerify) {
            $adminId = $adminVerify[0]['email'];
            if ($adminId === 'admin' || $adminId === 'develop') {
                return view('admin/ad_faq_list', $data);
            } else {
                return redirect()->to("/");
            }
        }
    }

    public function faqModify($id)
    {
        $BoardModel = new BoardModel();
        $BoardModel->setTableName('wh_board_faq');
        $data['faq'] = $BoardModel->find($id);


        if ($data['faq'] === null) {
            return redirect()->to('/ad/faq/faqList')->with('msg', '해당 데이터를 찾을 수 없습니다.');
        }

        return view('admin/ad_faq_modify', $data);
    }

    public function faqUpdate()
    {
        $id = $this->request->getPost('faq_id');
        $title = $this->request->getPost('title');
        $content = $this->request->getPost('content');

        if (!$id || !is_numeric($id)) {
            return redirect()->to('/ad/faq/faqList')->with('msg', '잘못된 요청입니다.');
        }

        $BoardModel = new BoardModel();
        $BoardModel->setTableName('wh_board_faq');

        $updated = $BoardModel->update($id, [
            'title' => $title,
            'content' => $content,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_at' => 'admin'
        ]);

        if ($updated) {
            return redirect()->to('/ad/faq/faqList')->with('msg', 'FAQ가 업데이트 되었습니다.');
        } else {
            return redirect()->back()->withInput()->with('msg', 'FAQ 업데이트에 실패했습니다.');
        }
    }

    public function faqView($id)
    {
        $BoardModel = new BoardModel();
        $BoardModel->setTableName('wh_board_faq');
        $data['faq'] = $BoardModel->find($id);

        return view('admin/ad_faq_view', $data);
    }

    public function boardDelete()
    {
        $id = $this->request->getPost('id');
        $board_name = $this->request->getPost('boardName');

        $BoardModel = new BoardModel();
        if ($board_name == 'faq') {
            $BoardModel->setTableName('wh_board_faq');
        } else if ($board_name == 'privacy') {
            $BoardModel->setTableName('wh_board_privacy');
        } else if ($board_name == 'terms') {
            $BoardModel->setTableName('wh_board_terms');
        } else if ($board_name == 'news') {
            $BoardModel->setTableName('wh_board_news');
        } else if ($board_name == 'spfaq') {
            $BoardModel->setTableName('wh_support_board_faq');
        }

        $deleted = $BoardModel->delete($id);

        if ($deleted) {
            if ($board_name == 'faq') {
                return redirect()->to('/ad/faq/faqList')->with('msg', '삭제되었습니다.');
            } else if ($board_name == 'privacy') {
                return redirect()->to('/ad/privacy/privacyList')->with('msg', '삭제되었습니다.');
            } else if ($board_name == 'terms') {
                return redirect()->to('/ad/terms/termsList')->with('msg', '삭제되었습니다.');
            } else if ($board_name == 'news') {
                return redirect()->to('/ad/intro/newsList')->with('msg', '삭제되었습니다.');
            } else if ($board_name == 'spfaq') {
                return redirect()->to('/ad/support/faqList')->with('msg', '삭제되었습니다.');
            }
        } else {
            return redirect()->back()->with('msg', '삭제에 실패하였습니다.');
        }
    }

    public function exchangeList()
    {
        $exchangePoint = new PointExchangeModel();
        $query = $exchangePoint
            ->select('e.idx as idx,
                        e.member_ci as member_ci,
                        m.name as name,
                        m.mobile_no as mobile_no,
                        e.point_exchange as point_exchange,
                        e.bank as bank,
                        e.bank_number as bank_number,
                        e.exchange_type as exchange_type,
                        e.exchange_level as exchange_level,
                        e.create_at as create_at')
            ->from('wh_points_exchange e')
            ->join('members m', 'e.member_ci = m.ci', 'left')
            ->orderBy('e.exchange_level', 'asc')
            ->orderBy('e.create_at', 'DESC')
            ->get();
        $results = $query->getResultArray();
        // 중복된 데이터 제거
        $uniqueResults = [];
        $uniqueIdxs = [];
        foreach ($results as $result) {
            if (!in_array($result['idx'], $uniqueIdxs)) {
                $uniqueResults[] = $result;
                $uniqueIdxs[] = $result['idx'];
            }
        }

        $data['datas'] = $uniqueResults;


        $session = session();
        $ci = $session->get('ci');
        $MemberModel = new MemberModel();
        $query = "SELECT * FROM members WHERE ci='" . $ci . "'";

        $adminVerify = $MemberModel->query($query)->getResultArray();
        if ($adminVerify) {
            $adminId = $adminVerify[0]['email'];
            if ($adminId === 'admin' || $adminId === 'develop') {
                return view('admin/ad_exchange_list', $data);
            } else {
                return redirect()->to("/");
            }
        }
    }

    public function exchangeCheck()
    {
        $exchange_level = $this->request->getPost('exchange_level');
        $idx = $this->request->getPost('idx');

        $exchangePoint = new PointExchangeModel();

        $updated = $exchangePoint->update($idx, [
            'exchange_type' => 'E',
            'exchange_level' => $exchange_level,
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        if ($updated) {
            if ($exchange_level == '1') {
                return $this->response->setJSON(['success' => true, 'msg' => '환전 승인 되었습니다.']);
            } else if ($exchange_level == '2') {
                return $this->response->setJSON(['success' => true, 'msg' => '환전 완료 되었습니다.']);
            }
        } else {
            return $this->response->setJSON(['error' => true, 'msg' => '환전 실패 되었습니다.']);
        }
    }

    public function allianceList()
    {
        $AllianceModel = new AllianceModel();
        $query = $AllianceModel
            ->distinct()
            ->select('a.idx as idx,
                    a.alliance_ci as alliance_ci,
                    a.member_ci as member_ci,
                    a.alliance_ceo_num as alliance_ceo_num,
                    a.alliance_type as alliance_type,
                    a.company_contact as company_contact,
                    a.email as email,
                    a.company_name as company_name,
                    a.representative_name as representative_name,
                    a.address as address,
                    a.detailed_address as detailed_address,
                    a.representative_contact as representative_contact,
                    a.business_day as business_day,
                    a.business_hour_start as business_hour_start,
                    a.business_hour_end as business_hour_end,
                    a.detailed_content as detailed_content,
                    a.alliance_application as alliance_application,
                    a.delete_yn as delete_yn,
                    a.create_at as create_at,
                    b.idx as file_idx,
                    b.board_type as board_type,
                    b.file_path as file_path,
                    b.file_name as file_name,
                    b.org_name as org_name,
                    b.ext as ext
                    ')
            ->from('wh_alliance a')
            ->join('wh_alliance_files b', 'a.idx = b.alliance_idx AND b.board_type = "ceonum"', 'left')
            ->whereIn('a.alliance_application', ['1', '2'])
            ->orderBy('a.alliance_application', 'asc')
            ->orderBy('a.create_at', 'desc');

        $data['datas'] = $query->get()->getResultArray();
        $data['query'] = $query->getLastQuery();


        $session = session();
        $ci = $session->get('ci');
        $MemberModel = new MemberModel();
        $query = "SELECT * FROM members WHERE ci='" . $ci . "'";

        $adminVerify = $MemberModel->query($query)->getResultArray();
        if ($adminVerify) {
            $adminId = $adminVerify[0]['email'];
            if ($adminId === 'admin' || $adminId === 'develop') {
                return view('admin/ad_alliance_list', $data);
            } else {
                return redirect()->to("/");
            }
        }
    }

    public function allianceCheck()
    {
        $level = $this->request->getPost('level');
        $idx = $this->request->getPost('idx');

        $AllianceModel = new AllianceModel();

        $updated = $AllianceModel->update($idx, [
            'alliance_application' => $level,
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        if ($updated) {
            if ($level == '2') {
                return $this->response->setJSON(['success' => true, 'msg' => '제휴 승인 되었습니다.']);
            }
        } else {
            return $this->response->setJSON(['error' => true, 'msg' => '제휴승인 실패 되었습니다.']);
        }
    }

    /*회원 인증 정보 승인*/
    public function memberApproveList($page = null)
    {

        // 페이지가 없으면 기본값으로 1을 사용
        if ($page === null || !is_numeric($page)) {
            $page = 1;
        } else {
            $page = 2;
        }

        $perPage = 20;
        $MemberModel = new MemberModel();

        $total = $MemberModel->query("SELECT COUNT(*) as total FROM members m LEFT JOIN member_files mf ON m.ci = mf.member_ci")->getRow()->total;

        $offset = ($page - 1) * $perPage; // 현재 페이지의 첫 번째 데이터 인덱스
        $query = "SELECT mf.id, 
                m.name, 
                CASE 
                     WHEN m.gender = 1 THEN '남' 
                     WHEN m.gender = 0 THEN '여' 
                END AS gender,
                m.nickname, 
                m.email, 
                m.grade, 
                mf.file_path, 
                mf.file_name, 
                mf.org_name,
                CASE 
                     WHEN mf.board_type = 'marital' THEN '혼인관계증명' 
                     WHEN mf.board_type = 'school' THEN '졸업증명' 
                     WHEN mf.board_type = 'job' THEN '직업증명' 
                     WHEN mf.board_type = 'asset_range' THEN '자산구간증명' 
                     WHEN mf.board_type = 'income_range' THEN '소득금액증명' 
                 END AS board_type, 
                mf.extra1
             FROM members as m 
             LEFT JOIN member_files mf on m.ci = mf.member_ci
             WHERE mf.board_type != 'main_photo'
             AND mf.delete_yn = 'n'
             ORDER BY m.email, mf.extra1 DESC
             LIMIT $perPage OFFSET $offset";

        $data['datas'] = $MemberModel->query($query)->getResultArray();
        $data['query'] = $MemberModel->getLastQuery()->getQuery();

        $pager = service('pager');
        $data['pager'] = $pager->makeLinks($page, $perPage, $total);


        $session = session();
        $ci = $session->get('ci');
        $MemberModel = new MemberModel();
        $query = "SELECT * FROM members WHERE ci='" . $ci . "'";

        $adminVerify = $MemberModel->query($query)->getResultArray();
        if ($adminVerify) {
            $adminId = $adminVerify[0]['email'];
            if ($adminId === 'admin' || $adminId === 'develop') {
                return view('admin/ad_member_list', $data);
            } else {
                return redirect()->to("/");
            }
        }
    }

    public function memberMngment($page = null)
    {

        // 페이지가 없으면 기본값으로 1을 사용
        if ($page === null || !is_numeric($page)) {
            $page = 1;
        } else {
            $page = 2;
        }

        $perPage = 20;
        $MemberModel = new MemberModel();

        $total = $MemberModel->query("SELECT COUNT(*) as total FROM members m LEFT JOIN member_files mf ON m.ci = mf.member_ci")->getRow()->total;

        $pager = service('pager');
        $page = (int) ($this->request->getGet('page') ?? 1);
        $perPage = 20;
        $total = '9999999';

        $pager_links = $pager->makeLinks($page, $perPage, $total, 'default_now');
        $offset = ($page - 1) * $perPage; // 현재 페이지의 첫 번째 데이터 인덱스
        $query = "SELECT name, mb.nickname, 
                               mb.ci, 
                               mb.birthday, 
                               mb.gender, 
                               mb.email,
                               mb.mobile_no, 
                               mb.grade, 
                               mb.temp_grade, 
                               mb.sns_type, 
                               mb.last_access_dt,
                               mf.file_path,
                               mf.file_name,
                               mf.org_name
                    FROM members mb, member_files mf WHERE mb.ci = mf.member_ci AND mb.delete_yn='N' AND mf.delete_yn='n' AND mf.board_type='main_photo' ORDER BY created_at DESC";

        //$data['datas'] = $MemberModel->query($query)->getResultArray();

        $data = [
            'datas' => $MemberModel->paginate(),
            'pager_links' => $pager_links,
        ];

        $session = session();
        $ci = $session->get('ci');
        $MemberModel = new MemberModel();
        $query = "SELECT * FROM members WHERE ci='" . $ci . "'";

        $adminVerify = $MemberModel->query($query)->getResultArray();
        if ($adminVerify) {
            $adminId = $adminVerify[0]['email'];
            if ($adminId === 'admin' || $adminId === 'develop') {
                return view('admin/ad_member_mngment', $data);
            } else {
                return redirect()->to("/");
            }
        }
    }
    public function forkMngment($page = null)
    {

        // 페이지가 없으면 기본값으로 1을 사용
        if ($page === null || !is_numeric($page)) {
            $page = 1;
        } else {
            $page = 2;
        }

        $perPage = 20;
        $MemberModel = new MemberModel();

        $total = $MemberModel->query("SELECT COUNT(*) as total FROM members m LEFT JOIN member_files mf ON m.ci = mf.member_ci")->getRow()->total;

        $offset = ($page - 1) * $perPage; // 현재 페이지의 첫 번째 데이터 인덱스
        $query = "SELECT wm.idx, wm.title as title, wmf.onoff as onoff FROM wh_meetings wm LEFT OUTER JOIN wh_chat_room_member_forked_onoff wmf ON wm.chat_room_ci = wmf.room_ci ORDER BY wm.idx DESC;";

        $data['datas'] = $MemberModel->query($query)->getResultArray();

        $session = session();
        $ci = $session->get('ci');
        $MemberModel = new MemberModel();
        $query = "SELECT * FROM members WHERE ci='" . $ci . "'";

        $adminVerify = $MemberModel->query($query)->getResultArray();
        if ($adminVerify) {
            $adminId = $adminVerify[0]['email'];
            if ($adminId === 'admin' || $adminId === 'develop') {
                return view('admin/ad_fork_mngment', $data);
            } else {
                return redirect()->to("/");
            }
        }
    }

    public function partyManualMatch($page = null)
    {

        // 페이지가 없으면 기본값으로 1을 사용
        if ($page === null || !is_numeric($page)) {
            $page = 1;
        } else {
            $page = 2;
        }
        $word_file_path = APPPATH . 'Data/MemberCode.php';
        require($word_file_path);

        $my_nickname = $this->request->getPost('my_nickname');
        $your_nickname = $this->request->getPost('your_nickname');

        $MemberModel = new MemberModel();

        $query = "SELECT mb.ci, mb.name, SUBSTR(mb.birthday, 1, 4)AS birthday, mb.city, mb.town, mb.nickname, mb.mbti, mf.file_path, mf.file_name
        FROM members mb, member_files mf WHERE mb.ci = mf.member_ci AND mf.board_type='main_photo' AND mf.delete_yn='n' AND mb.nickname = '" . trim($my_nickname . "") . "'";
        $myProfile = $MemberModel->query($query)->getResultArray();

        $mbtiTxt = '';
        $cityTxt = '';
        $townTxt = '';

        foreach ($mbtiCode as $item) {
            if ($item['id'] === $myProfile[0]['mbti']) $mbtiTxt = $item['name'];
        }
        foreach ($sidoCode as $item) {
            if ($item['id'] === $myProfile[0]['city']) $cityTxt = $item['name'];
        }
        foreach ($gunguCode as $item) {
            if ($item['p_id'] === $myProfile[0]['city'] && $item['id'] === $myProfile[0]['town']) $townTxt = $item['name'];
        }

        $query = "SELECT mb.ci, mb.name, SUBSTR(mb.birthday, 1, 4)AS birthday, mb.city, mb.town, mb.nickname, mb.mbti, mf.file_path, mf.file_name
        FROM members mb, member_files mf WHERE mb.ci = mf.member_ci AND mf.board_type='main_photo' AND mf.delete_yn='n' AND mb.nickname = '" . trim($your_nickname . "") . "'";
        $yourProfile = $MemberModel->query($query)->getResultArray();
        $mbtiTxt = '';
        $cityTxt = '';
        $townTxt = '';

        foreach ($mbtiCode as $item) {
            if ($item['id'] === $yourProfile[0]['mbti']) $mbtiTxt = $item['name'];
        }
        foreach ($sidoCode as $item) {
            if ($item['id'] === $yourProfile[0]['city']) $cityTxt = $item['name'];
        }
        foreach ($gunguCode as $item) {
            if ($item['p_id'] === $yourProfile[0]['city'] && $item['id'] === $yourProfile[0]['town']) $townTxt = $item['name'];
        }


        // 서로 포크 시 AI 메세지 전송
        $aiMsgSend1 = '<div class="recieve_profile">';
        $aiMsgSend1 .= '<img style="width:50px; height:50px; border-radius: 50%;" src="/' . $yourProfile[0]['file_path'] . $yourProfile[0]['file_name'] . '">';
        $aiMsgSend1 .= '<div class="content_mypage_info">';
        $aiMsgSend1 .= '<div class="profile">';
        $aiMsgSend1 .= '<h2>' . $yourProfile[0]['name'] . '</h2>';
        // $aiMsgSend1 .= `<button class="match_percent">99%</button>`;
        $aiMsgSend1 .= '</div>';
        $aiMsgSend1 .= '<p>' . $yourProfile[0]['birthday'] . ' · ' . $cityTxt . ' ' . $townTxt . ' · ' . $mbtiTxt . '</p>';
        $aiMsgSend1 .= '</div>';
        $aiMsgSend1 .= '</div>';
        $aiMsgSend1 .= '<p class="receive_match_msg">띵동 AI 소개팅이 도착했어요<br> 정보를 확인하실래요?</p>';
        $aiMsgSend1 .= '<button style="width: 200px;" class="receive_profile_view" onclick="moveToUrl(`/mo/viewProfile/' . $yourProfile[0]['nickname'] . '`)">정보보기</button>';

        $query2 = "INSERT INTO wh_chat_room_msg_ai
            (room_ci, member_ci, entry_num, msg_type, msg_cont, chk_num, chk_entry_num)
            VALUES('" . $myProfile[0]['ci'] . "','AImanager','1','0','" . $aiMsgSend1 . "','9','9');";


        // 상대방정보 나에게 전송
        $sendMsg = $MemberModel->query($query2);

        if ($sendMsg) {
            return $this->response->setJSON(['success' => true, 'msg' => 'AI 소개팅 메시지가 발송되었습니다.', 'data' => ['nickname' => $your_nickname]]);
        } else {
            return $this->response->setJSON(['success' => false, 'msg' => 'AI 소개팅 메시지 발송실패.', 'data' => ['nickname']]);
        }
    }

    public function partyMngment($page = null)
    {

        $MemberModel = new MemberModel();



        // 참여자 전원 돌면서 해당방 안의 매칭률 있는지 확인하기
        $query = "SELECT mb.name, mb.nickname, mb.ci,mb.gender,mb.birthday FROM wh_meeting_members wmm, members mb WHERE wmm.member_ci = mb.ci AND wmm.meeting_idx='169' AND wmm.delete_yn='N'";
        $memberData = $MemberModel->query($query)->getResultArray();

        $partyMember = []; //파티 멤버의 ci값 적재
        foreach ($memberData as $row) {
            $partyMember[] = $row['ci'];
        }


        $partyMemberDataMen = [];
        $partyMemberDataMen2 = [];
        $partyMemberDataMen3 = [];
        $partyMemberDataMen4 = [];

        // 1차매칭 시작
        foreach ($partyMember as &$row) {
            $query = "SELECT *, (SELECT gender FROM members WHERE ci='" . $row . "') as gender FROM wh_match_rate WHERE member_ci='" . $row . "' AND delete_yn='n' ORDER BY match_rate DESC";
            $matchData = $MemberModel->query($query)->getResultArray();
            $matchRank = [];
            if ($matchData) {
                foreach ($matchData as $matchRow) {
                    if (in_array($matchRow['your_ci'], $partyMember)) {
                        // 남자 데이터만 저장
                        if ($matchRow['gender'] === '1') {
                            $matchRank[] = ['gender' => $matchRow['gender'], 'my_ci' => $row, 'my_nickname' => $matchRow['my_nickname'], 'your_ci' => $matchRow['your_ci'], 'your_nickname' => $matchRow['your_nickname'], 'match_score' => $matchRow['match_score'], 'match_score_max' => $matchRow['match_score_max'], 'match_rate' => $matchRow['match_rate']];
                        }
                    }
                }
            }
            if ($matchRank) {
                $partyMemberDataMen[$row] = $matchRank;
            }
        }
        unset($row); // 참조 해제

        $uniqueNicknames = []; // 중복을 피하기 위해 이미 사용된 닉네임을 저장할 배열

        foreach ($partyMemberDataMen as $ci => &$matches) {

            usort($matches, function ($a, $b) {
                return $b['match_rate'] - $a['match_rate']; // 내림차순 정렬 -> 본인 배열 내에서 먼저하기
            });
        }
        foreach ($partyMemberDataMen as $ci => &$matches) {

            // 중복되지 않는 첫 번째 요소 찾기
            foreach ($matches as $key => &$match) {
                if (!in_array($match['your_ci'], array_column($uniqueNicknames, 'your_ci'))) {
                    // 남자의 1순위 매칭상대를 먼저 넣는다
                    $uniqueNicknames[] = ['your_ci' => $match['your_ci'], 'my_ci' => $ci];
                    $matches = [$match]; // 해당 요소만 남김
                    break;
                }
            }
        }
        unset($matches); // 참조 해제


        // partyMemberDataMen 한번 더 돌면서, 상대방도 매칭에 응해주기
        foreach ($partyMemberDataMen as $ci => $row) {
            foreach ($row as $rrow) {
                $query = "SELECT *, (SELECT gender FROM members WHERE ci='" . $rrow['your_ci'] . "') as gender FROM wh_match_rate WHERE member_ci='" .  $rrow['your_ci'] . "' AND delete_yn='n' ORDER BY match_rate DESC";
                $matchData = $MemberModel->query($query)->getResultArray();
                $matchRank = [];
                foreach ($matchData as $matchRow) {
                    if ($matchRow['member_ci'] === $rrow['your_ci'] && $matchRow['your_ci'] === $rrow['my_ci']) {
                        $matchRank[] = ['gender' => $matchRow['gender'], 'my_nickname' => $matchRow['my_nickname'], 'my_ci' => $rrow['your_ci'], 'your_ci' => $matchRow['your_ci'], 'your_nickname' => $matchRow['your_nickname'], 'match_score' => $matchRow['match_score'], 'match_score_max' => $matchRow['match_score_max'], 'match_rate' => $matchRow['match_rate']];
                    }
                }
                if ($matchRank) {
                    $partyMemberDataMen[$rrow['your_ci']] = $matchRank;
                    $uniqueNicknames[] = ['your_ci' => $matchRank[0]['your_ci'], 'my_ci' => $rrow['your_ci']];
                }
            }
        }


        // 2차매칭 시작
        $partyMember = array_reverse($partyMember);
        foreach ($partyMember as &$row) {
            $query = "SELECT *, (SELECT gender FROM members WHERE ci='" . $row . "') as gender FROM wh_match_rate 
                        WHERE member_ci='" . $row . "' AND delete_yn='n' 
                        ORDER BY match_rate DESC";
            $matchData = $MemberModel->query($query)->getResultArray();
            $matchRank = [];
            if ($matchData) {
                foreach ($matchData as $matchRow) {

                    $yourCi = $matchRow['your_ci'];
                    $beforeMatch = array_filter($uniqueNicknames, function ($person) use ($yourCi) {
                        return $person['your_ci'] === $yourCi;
                    });

                    $flattenedArray = [];

                    foreach ($beforeMatch as $innerArray) {
                        foreach ($innerArray as $key => $value) {
                            $flattenedArray[$key] = $value;
                        }
                    }
                    if ($flattenedArray && $flattenedArray['my_ci'] === $row) {
                        // 지난번 매칭에 포함됐던 커플에 대한 매칭률은 저장 안함
                    } else {

                        if (in_array($matchRow['your_ci'], $partyMember)) {
                            // 남자 데이터만 저장
                            if ($matchRow['gender'] === '1') {
                                $matchRank[] = ['gender' => $matchRow['gender'], 'my_ci' => $row, 'my_nickname' => $matchRow['my_nickname'], 'your_ci' => $matchRow['your_ci'], 'your_nickname' => $matchRow['your_nickname'], 'match_score' => $matchRow['match_score'], 'match_score_max' => $matchRow['match_score_max'], 'match_rate' => $matchRow['match_rate']];
                            }
                        }
                    }
                }
            }
            if ($matchRank) {
                // usort($matchRank, function ($a, $b) {
                //     return $b['match_rate'] - $a['match_rate'];
                // }); //ORDER BY 했으니까..
                // $matchRank = array_slice($matchRank, 0, 5);
                $partyMemberDataMen2[$row] = $matchRank;
            }
            unset($row); // 참조 해제
        }
        $uniqueNicknames2 = []; // 중복을 피하기 위해 이미 사용된 닉네임을 저장할 배열

        foreach ($partyMemberDataMen2 as $ci => &$matches) {
            usort($matches, function ($a, $b) {
                return $b['match_rate'] <=> $a['match_rate']; // 내림차순 정렬
            });
        }

        foreach ($partyMemberDataMen2 as $ci => &$matches) {
            // 중복되지 않는 첫 번째 요소 찾기
            foreach ($matches as $key => &$match) {
                if (!in_array($match['your_ci'], array_column($uniqueNicknames2, 'your_ci'))) {
                    // 남자의 1순위 매칭상대를 먼저 넣는다
                    $uniqueNicknames2[] = ['your_ci' => $match['your_ci'], 'my_ci' => $ci];
                    $matches = [$match]; // 해당 요소만 남김
                    break;
                } else {
                    // 매칭 가능한 상대방이 안남은 경우, 배열오류를 방지하기 위해 비워준다
                    // $matches = [];
                }
            }
        }
        unset($matches); // 참조 해제


        // partyMemberDataMen 한번 더 돌면서, 상대방도 매칭에 응해주기
        foreach ($partyMemberDataMen2 as $ci => $row) {
            foreach ($row as $rrow) {
                $query = "SELECT *, (SELECT gender FROM members WHERE ci='" . $rrow['your_ci'] . "') as gender FROM wh_match_rate 
                            WHERE member_ci='" .  $rrow['your_ci'] . "'
                                     AND delete_yn='n' 
                                     ORDER BY match_rate DESC";
                $matchData = $MemberModel->query($query)->getResultArray();

                $matchRank = [];
                foreach ($matchData as $matchRow) {
                    if ($matchRow['member_ci'] === $rrow['your_ci'] && $matchRow['your_ci'] === $rrow['my_ci']) {
                        $matchRank[] = ['gender' => $matchRow['gender'], 'my_ci' => $rrow['your_ci'], 'my_nickname' => $matchRow['my_nickname'], 'your_ci' => $matchRow['your_ci'], 'your_nickname' => $matchRow['your_nickname'], 'match_score' => $matchRow['match_score'], 'match_score_max' => $matchRow['match_score_max'], 'match_rate' => $matchRow['match_rate']];
                    }
                }
                if ($matchRank) {
                    $partyMemberDataMen2[$rrow['your_ci']] = $matchRank;
                    $uniqueNicknames2[] = ['your_ci' => $matchRank[0]['your_ci'], 'my_ci' => $rrow['your_ci']];
                }
            }
        }

        // 3차매칭 시작
        $partyMember = array_reverse($partyMember);
        foreach ($partyMember as &$row) {
            $query = "SELECT *, (SELECT gender FROM members WHERE ci='" . $row . "') as gender FROM wh_match_rate 
                        WHERE member_ci='" . $row . "' AND delete_yn='n' 
                        ORDER BY match_rate DESC";
            $matchData = $MemberModel->query($query)->getResultArray();
            $matchRank = [];
            if ($matchData) {
                foreach ($matchData as $matchRow) {

                    $yourCi = $matchRow['your_ci'];
                    $beforeMatch = array_filter($uniqueNicknames, function ($person) use ($yourCi) {
                        return $person['your_ci'] === $yourCi;
                    });

                    $flattenedArray = [];

                    foreach ($beforeMatch as $innerArray) {
                        foreach ($innerArray as $key => $value) {
                            $flattenedArray[$key] = $value;
                        }
                    }
                    if ($flattenedArray && $flattenedArray['my_ci'] === $row) {
                        // 지난번 매칭에 포함됐던 커플에 대한 매칭률은 저장 안함
                    } else {
                        $beforeMatch = array_filter($uniqueNicknames2, function ($person) use ($yourCi) {
                            return $person['your_ci'] === $yourCi;
                        });

                        $flattenedArray = [];

                        foreach ($beforeMatch as $innerArray) {
                            foreach ($innerArray as $key => $value) {
                                $flattenedArray[$key] = $value;
                            }
                        }
                        if ($flattenedArray && $flattenedArray['my_ci'] === $row) {
                            // 지난번 매칭에 포함됐던 커플에 대한 매칭률은 저장 안함
                        } else {
                            if (in_array($matchRow['your_ci'], $partyMember)) {
                                // 남자 데이터만 저장
                                if ($matchRow['gender'] === '1') {
                                    $matchRank[] = ['gender' => $matchRow['gender'], 'my_ci' => $row, 'my_nickname' => $matchRow['my_nickname'], 'your_ci' => $matchRow['your_ci'], 'your_nickname' => $matchRow['your_nickname'], 'match_score' => $matchRow['match_score'], 'match_score_max' => $matchRow['match_score_max'], 'match_rate' => $matchRow['match_rate']];
                                }
                            }
                        }
                    }
                }
            }
            if ($matchRank) {
                // usort($matchRank, function ($a, $b) {
                //     return $b['match_rate'] - $a['match_rate'];
                // }); //ORDER BY 했으니까..
                // $matchRank = array_slice($matchRank, 0, 5);
                $partyMemberDataMen3[$row] = $matchRank;
            }
            unset($row); // 참조 해제
        }

        $uniqueNicknames3 = []; // 중복을 피하기 위해 이미 사용된 닉네임을 저장할 배열

        foreach ($partyMemberDataMen3 as $ci => &$matches) {
            usort($matches, function ($a, $b) {
                return $b['match_rate'] <=> $a['match_rate']; // 내림차순 정렬
            });
        }

        foreach ($partyMemberDataMen3 as $ci => &$matches) {
            // 중복되지 않는 첫 번째 요소 찾기
            foreach ($matches as $key => $match) {
                if (!in_array($match['your_ci'], array_column($uniqueNicknames3, 'your_ci'))) {
                    // 남자의 1순위 매칭상대를 먼저 넣는다
                    $uniqueNicknames3[] = ['your_ci' => $match['your_ci'], 'my_ci' => $ci];
                    $matches = [$match]; // 해당 요소만 남김
                    break;
                } else {
                    // 매칭 가능한 상대방이 안남은 경우, 배열오류를 방지하기 위해 비워준다
                    $matches = [];
                }
            }
            unset($matches); // 참조 해제
        }


        // partyMemberDataMen 한번 더 돌면서, 상대방도 매칭에 응해주기
        foreach ($partyMemberDataMen3 as $row) {
            foreach ($row as $rrow) {
                $query = "SELECT *, (SELECT gender FROM members WHERE ci='" . $rrow['your_ci'] . "') as gender FROM wh_match_rate 
                            WHERE member_ci='" .  $rrow['your_ci'] . "'
                                     AND delete_yn='n' 
                                     ORDER BY match_rate DESC";
                $matchData = $MemberModel->query($query)->getResultArray();

                $matchRank = [];
                foreach ($matchData as $matchRow) {
                    if ($matchRow['member_ci'] === $rrow['your_ci'] && $matchRow['your_ci'] === $rrow['my_ci']) {
                        $matchRank[] = ['gender' => $matchRow['gender'], 'my_ci' => $rrow['your_ci'], 'my_nickname' => $matchRow['my_nickname'], 'your_ci' => $matchRow['your_ci'], 'your_nickname' => $matchRow['your_nickname'], 'match_score' => $matchRow['match_score'], 'match_score_max' => $matchRow['match_score_max'], 'match_rate' => $matchRow['match_rate']];
                    }
                }
                if ($matchRank) {
                    $partyMemberDataMen3[$rrow['your_ci']] = $matchRank;
                    $uniqueNicknames3[] = ['your_ci' => $matchRank[0]['your_ci'], 'my_ci' => $rrow['your_ci']];
                }
            }
        }

        // 4차매칭 시작
        $partyMember = array_reverse($partyMember);
        foreach ($partyMember as &$row) {
            $query = "SELECT *, (SELECT gender FROM members WHERE ci='" . $row . "') as gender FROM wh_match_rate 
                        WHERE member_ci='" . $row . "' AND delete_yn='n' 
                        ORDER BY match_rate DESC";
            $matchData = $MemberModel->query($query)->getResultArray();
            $matchRank = [];
            if ($matchData) {
                foreach ($matchData as $matchRow) {
                    $yourCi = $matchRow['your_ci'];
                    $beforeMatch = array_filter($uniqueNicknames, function ($person) use ($yourCi) {
                        return $person['your_ci'] === $yourCi;
                    });

                    $flattenedArray = [];

                    foreach ($beforeMatch as $innerArray) {
                        foreach ($innerArray as $key => $value) {
                            $flattenedArray[$key] = $value;
                        }
                    }
                    if ($flattenedArray && $flattenedArray['my_ci'] === $row) {
                        // 지난번 매칭에 포함됐던 커플에 대한 매칭률은 저장 안함
                    } else {
                        $beforeMatch = array_filter($uniqueNicknames2, function ($person) use ($yourCi) {
                            return $person['your_ci'] === $yourCi;
                        });

                        $flattenedArray = [];

                        foreach ($beforeMatch as $innerArray) {
                            foreach ($innerArray as $key => $value) {
                                $flattenedArray[$key] = $value;
                            }
                        }
                        if ($flattenedArray && $flattenedArray['my_ci'] === $row) {
                            // 지난번 매칭에 포함됐던 커플에 대한 매칭률은 저장 안함
                        } else {
                            $beforeMatch = array_filter($uniqueNicknames3, function ($person) use ($yourCi) {
                                return $person['your_ci'] === $yourCi;
                            });

                            $flattenedArray = [];

                            foreach ($beforeMatch as $innerArray) {
                                foreach ($innerArray as $key => $value) {
                                    $flattenedArray[$key] = $value;
                                }
                            }
                            if ($flattenedArray && $flattenedArray['my_ci'] === $row) {
                                // 지난번 매칭에 포함됐던 커플에 대한 매칭률은 저장 안함
                            } else {
                                if (in_array($matchRow['your_ci'], $partyMember)) {
                                    // 남자 데이터만 저장
                                    if ($matchRow['gender'] === '1') {
                                        $matchRank[] = ['gender' => $matchRow['gender'], 'my_ci' => $row, 'my_nickname' => $matchRow['my_nickname'], 'your_ci' => $matchRow['your_ci'], 'your_nickname' => $matchRow['your_nickname'], 'match_score' => $matchRow['match_score'], 'match_score_max' => $matchRow['match_score_max'], 'match_rate' => $matchRow['match_rate']];
                                    }
                                }
                            }
                        }
                    }
                }
            }
            if ($matchRank) {
                // usort($matchRank, function ($a, $b) {
                //     return $b['match_rate'] - $a['match_rate'];
                // }); //ORDER BY 했으니까..
                // $matchRank = array_slice($matchRank, 0, 5);
                $partyMemberDataMen4[$row] = $matchRank;
            }
            unset($row); // 참조 해제
        }

        $uniqueNicknames4 = []; // 중복을 피하기 위해 이미 사용된 닉네임을 저장할 배열

        foreach ($partyMemberDataMen4 as $ci => &$matches) {
            usort($matches, function ($a, $b) {
                return $b['match_rate'] <=> $a['match_rate']; // 내림차순 정렬
            });
        }

        foreach ($partyMemberDataMen4 as $ci => &$matches) {
            // 중복되지 않는 첫 번째 요소 찾기
            foreach ($matches as $key => $match) {
                // print_r($match);
                if (!in_array($match['your_ci'], array_column($uniqueNicknames4, 'your_ci'))) {
                    // 남자의 1순위 매칭상대를 먼저 넣는다
                    $uniqueNicknames4[] = ['your_ci' => $match['your_ci'], 'my_ci' => $ci];
                    $matches = [$match]; // 해당 요소만 남김
                    break;
                } else {
                    // 매칭 가능한 상대방이 안남은 경우, 배열오류를 방지하기 위해 비워준다
                    $matches = [];
                }
            }
            unset($matches); // 참조 해제
        }

        // partyMemberDataMen 한번 더 돌면서, 상대방도 매칭에 응해주기
        foreach ($partyMemberDataMen4 as $ci => $row) {
            foreach ($row as $rrow) {
                $query = "SELECT *, (SELECT gender FROM members WHERE ci='" . $rrow['your_ci'] . "') as gender FROM wh_match_rate 
                            WHERE member_ci='" .  $rrow['your_ci'] . "'
                                     AND delete_yn='n' 
                                     ORDER BY match_rate DESC";
                $matchData = $MemberModel->query($query)->getResultArray();

                $matchRank = [];
                foreach ($matchData as $matchRow) {
                    if ($matchRow['member_ci'] === $rrow['your_ci'] && $matchRow['your_ci'] === $rrow['my_ci']) {
                        $matchRank[] = ['gender' => $matchRow['gender'], 'my_ci' => $rrow['your_ci'], 'my_nickname' => $matchRow['my_nickname'], 'your_ci' => $matchRow['your_ci'], 'your_nickname' => $matchRow['your_nickname'], 'match_score' => $matchRow['match_score'], 'match_score_max' => $matchRow['match_score_max'], 'match_rate' => $matchRow['match_rate']];
                    }
                }
                if ($matchRank) {
                    $partyMemberDataMen4[$rrow['your_ci']] = $matchRank;
                    $uniqueNicknames4[] = ['your_ci' => $matchRank[0]['your_ci'], 'my_ci' => $rrow['your_ci']];
                }
            }
        }



        // print_r($partyMemberData);
        $data['partyMemberData1'] = $partyMemberDataMen;
        $data['partyMemberData2'] = $partyMemberDataMen2;
        $data['partyMemberData3'] = $partyMemberDataMen3;
        $data['partyMemberData4'] = $partyMemberDataMen4;
        $data['uniqueNicknames'] = $uniqueNicknames;
        $data['uniqueNicknames2'] = $uniqueNicknames2;
        $data['uniqueNicknames3'] = $uniqueNicknames3;
        $data['uniqueNicknames4'] = $uniqueNicknames4;
        $data['memberData'] = $memberData;



        // echo '<pre>';
        // print_r($uniqueNicknames2);
        // echo '</pre>';

        $session = session();
        $ci = $session->get('ci');
        $query = "SELECT * FROM members WHERE ci='" . $ci . "'";
        $adminVerify = $MemberModel->query($query)->getResultArray();
        if ($adminVerify) {
            $adminId = $adminVerify[0]['email'];
            if ($adminId === 'admin' || $adminId === 'develop') {
                return view('admin/ad_party_mngment', $data);
            } else {
                return redirect()->to("/");
            }
        }
    }

    public function partyMngment1()
    {
        $MemberModel = new MemberModel();
        $matchNum = $this->request->getPost('num');


        // 참여자 전원 돌면서 해당방 안의 매칭률 있는지 확인하기
        $query = "SELECT mb.name, mb.nickname, mb.ci FROM wh_meeting_members wmm, members mb WHERE wmm.member_ci = mb.ci AND wmm.meeting_idx='169' AND wmm.delete_yn='N'";
        $memberData = $MemberModel->query($query)->getResultArray();

        $partyMember = []; //파티 멤버의 ci값 적재
        foreach ($memberData as $row) {
            $partyMember[] = $row['ci'];
        }


        $partyMemberDataMen = [];
        $partyMemberDataMen2 = [];
        $partyMemberDataMen3 = [];
        $partyMemberDataMen4 = [];

        // 1차매칭 시작
        foreach ($partyMember as &$row) {
            $query = "SELECT *, (SELECT gender FROM members WHERE ci='" . $row . "') as gender FROM wh_match_rate WHERE member_ci='" . $row . "' AND delete_yn='n' ORDER BY match_rate DESC";
            $matchData = $MemberModel->query($query)->getResultArray();
            $matchRank = [];
            if ($matchData) {
                foreach ($matchData as $matchRow) {
                    if (in_array($matchRow['your_ci'], $partyMember)) {
                        // 남자 데이터만 저장
                        if ($matchRow['gender'] === '1') {
                            $matchRank[] = ['gender' => $matchRow['gender'], 'my_ci' => $row, 'my_nickname' => $matchRow['my_nickname'], 'your_ci' => $matchRow['your_ci'], 'your_nickname' => $matchRow['your_nickname'], 'match_score' => $matchRow['match_score'], 'match_score_max' => $matchRow['match_score_max'], 'match_rate' => $matchRow['match_rate']];
                        }
                    }
                }
            }
            if ($matchRank) {
                $partyMemberDataMen[$row] = $matchRank;
            }
        }
        unset($row); // 참조 해제

        $uniqueNicknames = []; // 중복을 피하기 위해 이미 사용된 닉네임을 저장할 배열

        foreach ($partyMemberDataMen as $ci => &$matches) {

            usort($matches, function ($a, $b) {
                return $b['match_rate'] - $a['match_rate']; // 내림차순 정렬 -> 본인 배열 내에서 먼저하기
            });
        }
        foreach ($partyMemberDataMen as $ci => &$matches) {

            // 중복되지 않는 첫 번째 요소 찾기
            foreach ($matches as $key => &$match) {
                if (!in_array($match['your_ci'], array_column($uniqueNicknames, 'your_ci'))) {
                    // 남자의 1순위 매칭상대를 먼저 넣는다
                    $uniqueNicknames[] = ['your_ci' => $match['your_ci'], 'my_ci' => $ci];
                    $matches = [$match]; // 해당 요소만 남김
                    break;
                }
            }
        }
        unset($matches); // 참조 해제


        // partyMemberDataMen 한번 더 돌면서, 상대방도 매칭에 응해주기
        foreach ($partyMemberDataMen as $ci => $row) {
            foreach ($row as $rrow) {
                $query = "SELECT *, (SELECT gender FROM members WHERE ci='" . $rrow['your_ci'] . "') as gender FROM wh_match_rate WHERE member_ci='" .  $rrow['your_ci'] . "' AND delete_yn='n' ORDER BY match_rate DESC";
                $matchData = $MemberModel->query($query)->getResultArray();
                $matchRank = [];
                foreach ($matchData as $matchRow) {
                    if ($matchRow['member_ci'] === $rrow['your_ci'] && $matchRow['your_ci'] === $rrow['my_ci']) {
                        $matchRank[] = ['gender' => $matchRow['gender'], 'my_nickname' => $matchRow['my_nickname'], 'my_ci' => $rrow['your_ci'], 'your_ci' => $matchRow['your_ci'], 'your_nickname' => $matchRow['your_nickname'], 'match_score' => $matchRow['match_score'], 'match_score_max' => $matchRow['match_score_max'], 'match_rate' => $matchRow['match_rate']];
                    }
                }
                if ($matchRank) {
                    $partyMemberDataMen[$rrow['your_ci']] = $matchRank;
                    $uniqueNicknames[] = ['your_ci' => $matchRank[0]['your_ci'], 'my_ci' => $rrow['your_ci']];
                }
            }
        }


        // 2차매칭 시작
        $partyMember = array_reverse($partyMember);
        foreach ($partyMember as &$row) {
            $query = "SELECT *, (SELECT gender FROM members WHERE ci='" . $row . "') as gender FROM wh_match_rate 
                        WHERE member_ci='" . $row . "' AND delete_yn='n' 
                        ORDER BY match_rate DESC";
            $matchData = $MemberModel->query($query)->getResultArray();
            $matchRank = [];
            if ($matchData) {
                foreach ($matchData as $matchRow) {
                    $yourCi = $matchRow['your_ci'];
                    $beforeMatch = array_filter($uniqueNicknames, function ($person) use ($yourCi) {
                        return $person['your_ci'] === $yourCi;
                    });
                    $flattenedArray = [];

                    foreach ($beforeMatch as $innerArray) {
                        foreach ($innerArray as $key => $value) {
                            $flattenedArray[$key] = $value;
                        }
                    }
                    if ($flattenedArray && $flattenedArray['my_ci'] === $row) {
                        // 지난번 매칭에 포함됐던 커플에 대한 매칭률은 저장 안함
                    } else {
                        if (in_array($matchRow['your_ci'], $partyMember)) {
                            // 남자 데이터만 저장
                            if ($matchRow['gender'] === '1') {
                                $matchRank[] = ['gender' => $matchRow['gender'], 'my_ci' => $row, 'my_nickname' => $matchRow['my_nickname'], 'your_ci' => $matchRow['your_ci'], 'your_nickname' => $matchRow['your_nickname'], 'match_score' => $matchRow['match_score'], 'match_score_max' => $matchRow['match_score_max'], 'match_rate' => $matchRow['match_rate']];
                            }
                        }
                    }
                }
            }
            if ($matchRank) {
                // usort($matchRank, function ($a, $b) {
                //     return $b['match_rate'] - $a['match_rate'];
                // }); //ORDER BY 했으니까..
                // $matchRank = array_slice($matchRank, 0, 5);
                $partyMemberDataMen2[$row] = $matchRank;
            }
            unset($row); // 참조 해제
        }
        $uniqueNicknames2 = []; // 중복을 피하기 위해 이미 사용된 닉네임을 저장할 배열

        foreach ($partyMemberDataMen2 as $ci => &$matches) {
            usort($matches, function ($a, $b) {
                return $b['match_rate'] <=> $a['match_rate']; // 내림차순 정렬
            });
        }

        foreach ($partyMemberDataMen2 as $ci => &$matches) {
            // 중복되지 않는 첫 번째 요소 찾기
            foreach ($matches as $key => &$match) {
                if (!in_array($match['your_ci'], array_column($uniqueNicknames2, 'your_ci'))) {
                    // 남자의 1순위 매칭상대를 먼저 넣는다
                    $uniqueNicknames2[] = ['your_ci' => $match['your_ci'], 'my_ci' => $ci];
                    $matches = [$match]; // 해당 요소만 남김
                    break;
                } else {
                    // 매칭 가능한 상대방이 안남은 경우, 배열오류를 방지하기 위해 비워준다
                    $matches = [];
                }
            }
        }
        unset($matches); // 참조 해제


        // partyMemberDataMen 한번 더 돌면서, 상대방도 매칭에 응해주기
        foreach ($partyMemberDataMen2 as $ci => $row) {
            foreach ($row as $rrow) {
                $query = "SELECT *, (SELECT gender FROM members WHERE ci='" . $rrow['your_ci'] . "') as gender FROM wh_match_rate 
                            WHERE member_ci='" .  $rrow['your_ci'] . "'
                                     AND delete_yn='n' 
                                     ORDER BY match_rate DESC";
                $matchData = $MemberModel->query($query)->getResultArray();

                $matchRank = [];
                foreach ($matchData as $matchRow) {
                    if ($matchRow['member_ci'] === $rrow['your_ci'] && $matchRow['your_ci'] === $rrow['my_ci']) {
                        $matchRank[] = ['gender' => $matchRow['gender'], 'my_ci' => $rrow['your_ci'], 'my_nickname' => $matchRow['my_nickname'], 'your_ci' => $matchRow['your_ci'], 'your_nickname' => $matchRow['your_nickname'], 'match_score' => $matchRow['match_score'], 'match_score_max' => $matchRow['match_score_max'], 'match_rate' => $matchRow['match_rate']];
                    }
                }
                if ($matchRank) {
                    $partyMemberDataMen2[$rrow['your_ci']] = $matchRank;
                    $uniqueNicknames2[] = ['your_ci' => $matchRank[0]['your_ci'], 'my_ci' => $rrow['your_ci']];
                }
            }
        }

        // 3차매칭 시작
        $partyMember = array_reverse($partyMember);
        foreach ($partyMember as &$row) {
            $query = "SELECT *, (SELECT gender FROM members WHERE ci='" . $row . "') as gender FROM wh_match_rate 
                        WHERE member_ci='" . $row . "' AND delete_yn='n' 
                        ORDER BY match_rate DESC";
            $matchData = $MemberModel->query($query)->getResultArray();
            $matchRank = [];
            if ($matchData) {
                foreach ($matchData as $matchRow) {

                    $yourCi = $matchRow['your_ci'];
                    $beforeMatch = array_filter($uniqueNicknames, function ($person) use ($yourCi) {
                        return $person['your_ci'] === $yourCi;
                    });

                    $flattenedArray = [];

                    foreach ($beforeMatch as $innerArray) {
                        foreach ($innerArray as $key => $value) {
                            $flattenedArray[$key] = $value;
                        }
                    }
                    if ($flattenedArray && $flattenedArray['my_ci'] === $row) {
                        // 지난번 매칭에 포함됐던 커플에 대한 매칭률은 저장 안함
                    } else {
                        $beforeMatch = array_filter($uniqueNicknames2, function ($person) use ($yourCi) {
                            return $person['your_ci'] === $yourCi;
                        });

                        $flattenedArray = [];

                        foreach ($beforeMatch as $innerArray) {
                            foreach ($innerArray as $key => $value) {
                                $flattenedArray[$key] = $value;
                            }
                        }
                        if ($flattenedArray && $flattenedArray['my_ci'] === $row) {
                            // 지난번 매칭에 포함됐던 커플에 대한 매칭률은 저장 안함
                        } else {
                            if (in_array($matchRow['your_ci'], $partyMember)) {
                                // 남자 데이터만 저장
                                if ($matchRow['gender'] === '1') {
                                    $matchRank[] = ['gender' => $matchRow['gender'], 'my_ci' => $row, 'my_nickname' => $matchRow['my_nickname'], 'your_ci' => $matchRow['your_ci'], 'your_nickname' => $matchRow['your_nickname'], 'match_score' => $matchRow['match_score'], 'match_score_max' => $matchRow['match_score_max'], 'match_rate' => $matchRow['match_rate']];
                                }
                            }
                        }
                    }
                }
            }
            if ($matchRank) {
                // usort($matchRank, function ($a, $b) {
                //     return $b['match_rate'] - $a['match_rate'];
                // }); //ORDER BY 했으니까..
                // $matchRank = array_slice($matchRank, 0, 5);
                $partyMemberDataMen3[$row] = $matchRank;
            }
            unset($row); // 참조 해제
        }

        $uniqueNicknames3 = []; // 중복을 피하기 위해 이미 사용된 닉네임을 저장할 배열

        foreach ($partyMemberDataMen3 as $ci => &$matches) {
            usort($matches, function ($a, $b) {
                return $b['match_rate'] <=> $a['match_rate']; // 내림차순 정렬
            });
        }

        foreach ($partyMemberDataMen3 as $ci => &$matches) {
            // 중복되지 않는 첫 번째 요소 찾기
            foreach ($matches as $key => $match) {
                if (!in_array($match['your_ci'], array_column($uniqueNicknames3, 'your_ci'))) {
                    // 남자의 1순위 매칭상대를 먼저 넣는다
                    $uniqueNicknames3[] = ['your_ci' => $match['your_ci'], 'my_ci' => $ci];
                    $matches = [$match]; // 해당 요소만 남김
                    break;
                } else {
                    // 매칭 가능한 상대방이 안남은 경우, 배열오류를 방지하기 위해 비워준다
                    $matches = [];
                }
            }
            unset($matches); // 참조 해제
        }


        // partyMemberDataMen 한번 더 돌면서, 상대방도 매칭에 응해주기
        foreach ($partyMemberDataMen3 as $row) {
            foreach ($row as $rrow) {
                $query = "SELECT *, (SELECT gender FROM members WHERE ci='" . $rrow['your_ci'] . "') as gender FROM wh_match_rate 
                            WHERE member_ci='" .  $rrow['your_ci'] . "'
                                     AND delete_yn='n' 
                                     ORDER BY match_rate DESC";
                $matchData = $MemberModel->query($query)->getResultArray();

                $matchRank = [];
                foreach ($matchData as $matchRow) {
                    if ($matchRow['member_ci'] === $rrow['your_ci'] && $matchRow['your_ci'] === $rrow['my_ci']) {
                        $matchRank[] = ['gender' => $matchRow['gender'], 'my_ci' => $rrow['your_ci'], 'my_nickname' => $matchRow['my_nickname'], 'your_ci' => $matchRow['your_ci'], 'your_nickname' => $matchRow['your_nickname'], 'match_score' => $matchRow['match_score'], 'match_score_max' => $matchRow['match_score_max'], 'match_rate' => $matchRow['match_rate']];
                    }
                }
                if ($matchRank) {
                    $partyMemberDataMen3[$rrow['your_ci']] = $matchRank;
                    $uniqueNicknames3[] = ['your_ci' => $matchRank[0]['your_ci'], 'my_ci' => $rrow['your_ci']];
                }
            }
        }

        // 4차매칭 시작
        $partyMember = array_reverse($partyMember);
        foreach ($partyMember as &$row) {
            $query = "SELECT *, (SELECT gender FROM members WHERE ci='" . $row . "') as gender FROM wh_match_rate 
                        WHERE member_ci='" . $row . "' AND delete_yn='n' 
                        ORDER BY match_rate DESC";
            $matchData = $MemberModel->query($query)->getResultArray();
            $matchRank = [];
            if ($matchData) {
                foreach ($matchData as $matchRow) {
                    $yourCi = $matchRow['your_ci'];
                    $beforeMatch = array_filter($uniqueNicknames, function ($person) use ($yourCi) {
                        return $person['your_ci'] === $yourCi;
                    });

                    $flattenedArray = [];

                    foreach ($beforeMatch as $innerArray) {
                        foreach ($innerArray as $key => $value) {
                            $flattenedArray[$key] = $value;
                        }
                    }
                    if ($flattenedArray && $flattenedArray['my_ci'] === $row) {
                        // 지난번 매칭에 포함됐던 커플에 대한 매칭률은 저장 안함
                    } else {
                        $beforeMatch = array_filter($uniqueNicknames2, function ($person) use ($yourCi) {
                            return $person['your_ci'] === $yourCi;
                        });

                        $flattenedArray = [];

                        foreach ($beforeMatch as $innerArray) {
                            foreach ($innerArray as $key => $value) {
                                $flattenedArray[$key] = $value;
                            }
                        }
                        if ($flattenedArray && $flattenedArray['my_ci'] === $row) {
                            // 지난번 매칭에 포함됐던 커플에 대한 매칭률은 저장 안함
                        } else {
                            $beforeMatch = array_filter($uniqueNicknames3, function ($person) use ($yourCi) {
                                return $person['your_ci'] === $yourCi;
                            });

                            $flattenedArray = [];

                            foreach ($beforeMatch as $innerArray) {
                                foreach ($innerArray as $key => $value) {
                                    $flattenedArray[$key] = $value;
                                }
                            }
                            if ($flattenedArray && $flattenedArray['my_ci'] === $row) {
                                // 지난번 매칭에 포함됐던 커플에 대한 매칭률은 저장 안함
                            } else {
                                if (in_array($matchRow['your_ci'], $partyMember)) {
                                    // 남자 데이터만 저장
                                    if ($matchRow['gender'] === '1') {
                                        $matchRank[] = ['gender' => $matchRow['gender'], 'my_ci' => $row, 'my_nickname' => $matchRow['my_nickname'], 'your_ci' => $matchRow['your_ci'], 'your_nickname' => $matchRow['your_nickname'], 'match_score' => $matchRow['match_score'], 'match_score_max' => $matchRow['match_score_max'], 'match_rate' => $matchRow['match_rate']];
                                    }
                                }
                            }
                        }
                    }
                }
            }
            if ($matchRank) {
                // usort($matchRank, function ($a, $b) {
                //     return $b['match_rate'] - $a['match_rate'];
                // }); //ORDER BY 했으니까..
                // $matchRank = array_slice($matchRank, 0, 5);
                $partyMemberDataMen4[$row] = $matchRank;
            }
            unset($row); // 참조 해제
        }

        $uniqueNicknames4 = []; // 중복을 피하기 위해 이미 사용된 닉네임을 저장할 배열

        foreach ($partyMemberDataMen4 as $ci => &$matches) {
            usort($matches, function ($a, $b) {
                return $b['match_rate'] <=> $a['match_rate']; // 내림차순 정렬
            });
        }

        foreach ($partyMemberDataMen4 as $ci => &$matches) {
            // 중복되지 않는 첫 번째 요소 찾기
            foreach ($matches as $key => $match) {
                // print_r($match);
                if (!in_array($match['your_ci'], array_column($uniqueNicknames4, 'your_ci'))) {
                    // 남자의 1순위 매칭상대를 먼저 넣는다
                    $uniqueNicknames4[] = ['your_ci' => $match['your_ci'], 'my_ci' => $ci];
                    $matches = [$match]; // 해당 요소만 남김
                    break;
                } else {
                    // 매칭 가능한 상대방이 안남은 경우, 배열오류를 방지하기 위해 비워준다
                    $matches = [];
                }
            }
            unset($matches); // 참조 해제
        }

        // partyMemberDataMen 한번 더 돌면서, 상대방도 매칭에 응해주기
        foreach ($partyMemberDataMen4 as $ci => $row) {
            foreach ($row as $rrow) {
                $query = "SELECT *, (SELECT gender FROM members WHERE ci='" . $rrow['your_ci'] . "') as gender FROM wh_match_rate 
                            WHERE member_ci='" .  $rrow['your_ci'] . "'
                                     AND delete_yn='n' 
                                     ORDER BY match_rate DESC";
                $matchData = $MemberModel->query($query)->getResultArray();

                $matchRank = [];
                foreach ($matchData as $matchRow) {
                    if ($matchRow['member_ci'] === $rrow['your_ci'] && $matchRow['your_ci'] === $rrow['my_ci']) {
                        $matchRank[] = ['gender' => $matchRow['gender'], 'my_ci' => $rrow['your_ci'], 'my_nickname' => $matchRow['my_nickname'], 'your_ci' => $matchRow['your_ci'], 'your_nickname' => $matchRow['your_nickname'], 'match_score' => $matchRow['match_score'], 'match_score_max' => $matchRow['match_score_max'], 'match_rate' => $matchRow['match_rate']];
                    }
                }
                if ($matchRank) {
                    $partyMemberDataMen4[$rrow['your_ci']] = $matchRank;
                    $uniqueNicknames4[] = ['your_ci' => $matchRank[0]['your_ci'], 'my_ci' => $rrow['your_ci']];
                }
            }
        }



        // print_r($partyMemberData);
        $data['partyMemberData1'] = $partyMemberDataMen;
        $data['partyMemberData2'] = $partyMemberDataMen2;
        $data['partyMemberData3'] = $partyMemberDataMen3;
        $data['partyMemberData4'] = $partyMemberDataMen4;
        $data['uniqueNicknames'] = $uniqueNicknames;
        $data['uniqueNicknames2'] = $uniqueNicknames2;
        $data['uniqueNicknames3'] = $uniqueNicknames3;
        $data['uniqueNicknames4'] = $uniqueNicknames4;
        $data['memberData'] = $memberData;

        if ($matchNum === '1') {
            $matchResultData = $uniqueNicknames;
        } else if ($matchNum === '2') {
            $matchResultData = $uniqueNicknames2;
        } else if ($matchNum === '3') {
            $matchResultData = $uniqueNicknames3;
        } else if ($matchNum === '4') {
            $matchResultData = $uniqueNicknames4;
        }
        foreach ($matchResultData as $sendMsg) {

            // 이후 메세지 생성
            $word_file_path = APPPATH . 'Data/MemberCode.php';
            require($word_file_path);
            // 내 정보 쿼리
            $query = "SELECT mb.ci, mb.name, SUBSTR(mb.birthday, 1, 4)AS birthday, mb.city, mb.town, mb.nickname, mb.mbti, mf.file_path, mf.file_name
                      FROM members mb, member_files mf WHERE mb.ci = mf.member_ci AND mf.board_type='main_photo' AND mf.delete_yn='n' AND mb.ci = '" . $sendMsg['my_ci'] . "'";
            $myProfile = $MemberModel->query($query)->getResultArray();
            $mbtiTxt = '';
            $cityTxt = '';
            $townTxt = '';

            foreach ($mbtiCode as $item) {
                if ($item['id'] === $myProfile[0]['mbti']) $mbtiTxt = $item['name'];
            }
            foreach ($sidoCode as $item) {
                if ($item['id'] === $myProfile[0]['city']) $cityTxt = $item['name'];
            }
            foreach ($gunguCode as $item) {
                if ($item['p_id'] === $myProfile[0]['city'] && $item['id'] === $myProfile[0]['town']) $townTxt = $item['name'];
            }

            // 서로 포크 시 AI 메세지 전송
            $aiMsgSend1 = '<div class="recieve_profile">';
            $aiMsgSend1 .= '<img style="width:50px; height:50px; border-radius: 50%;" src="/' . $myProfile[0]['file_path'] . $myProfile[0]['file_name'] . '">';
            $aiMsgSend1 .= '<div class="content_mypage_info">';
            $aiMsgSend1 .= '<div class="profile">';
            $aiMsgSend1 .= '<h2>' . $myProfile[0]['name'] . '</h2>';
            // $aiMsgSend1 .= `<button class="match_percent">99%</button>`;
            $aiMsgSend1 .= '</div>';
            $aiMsgSend1 .= '<p>' . $myProfile[0]['birthday'] . ' · ' . $cityTxt . ' ' . $townTxt . ' · ' . $mbtiTxt . '</p>';
            $aiMsgSend1 .= '</div>';
            $aiMsgSend1 .= '</div>';
            $aiMsgSend1 .= '<p class="receive_match_msg">띵동 AI 소개팅이 도착했어요<br> 정보를 확인하실래요?</p>';
            $aiMsgSend1 .= '<button style="width: 200px;" class="receive_profile_view" onclick="moveToUrl(`/mo/viewProfile/' . $myProfile[0]['nickname'] . '`)">정보보기</button>';

            $query2 = "INSERT INTO wh_chat_room_msg_ai
            (room_ci, member_ci, entry_num, msg_type, msg_cont, chk_num, chk_entry_num)
            VALUES('" . $sendMsg['your_ci'] . "','AImanager','1','0','" . $aiMsgSend1 . "','9','9');";


            // 내정보 상대방에게 전송
            $sendMsg = $MemberModel->query($query2);
        }
        return $this->response->setJSON(['success' => true, 'msg' => 'AI 소개팅 메시지가 발송되었습니다.']);
    }
    public function partyMngmentTest($page = null)
    {

        $MemberModel = new MemberModel();



        // 참여자 전원 돌면서 해당방 안의 매칭률 있는지 확인하기
        $query = "SELECT mb.name, mb.nickname, mb.ci FROM wh_meeting_members wmm, members mb WHERE wmm.member_ci = mb.ci AND wmm.meeting_idx='189' AND wmm.delete_yn='N'";
        $memberData = $MemberModel->query($query)->getResultArray();

        $partyMember = []; //파티 멤버의 ci값 적재
        foreach ($memberData as $row) {
            $partyMember[] = $row['ci'];
        }


        $partyMemberDataMen = [];
        $partyMemberDataMen2 = [];
        $partyMemberDataMen3 = [];
        $partyMemberDataMen4 = [];

        // 1차매칭 시작
        foreach ($partyMember as &$row) {
            $query = "SELECT *, (SELECT gender FROM members WHERE ci='" . $row . "') as gender FROM wh_match_rate WHERE member_ci='" . $row . "' AND delete_yn='n' ORDER BY match_rate DESC";
            $matchData = $MemberModel->query($query)->getResultArray();
            $matchRank = [];
            if ($matchData) {
                foreach ($matchData as $matchRow) {
                    if (in_array($matchRow['your_ci'], $partyMember)) {
                        // 남자 데이터만 저장
                        if ($matchRow['gender'] === '1') {
                            $matchRank[] = ['gender' => $matchRow['gender'], 'my_ci' => $row, 'my_nickname' => $matchRow['my_nickname'], 'your_ci' => $matchRow['your_ci'], 'your_nickname' => $matchRow['your_nickname'], 'match_score' => $matchRow['match_score'], 'match_score_max' => $matchRow['match_score_max'], 'match_rate' => $matchRow['match_rate']];
                        }
                    }
                }
            }
            if ($matchRank) {
                $partyMemberDataMen[$row] = $matchRank;
            }
        }
        unset($row); // 참조 해제

        $uniqueNicknames = []; // 중복을 피하기 위해 이미 사용된 닉네임을 저장할 배열

        foreach ($partyMemberDataMen as $ci => &$matches) {

            usort($matches, function ($a, $b) {
                return $b['match_rate'] - $a['match_rate']; // 내림차순 정렬 -> 본인 배열 내에서 먼저하기
            });
        }
        foreach ($partyMemberDataMen as $ci => &$matches) {

            // 중복되지 않는 첫 번째 요소 찾기
            foreach ($matches as $key => &$match) {
                if (!in_array($match['your_ci'], array_column($uniqueNicknames, 'your_ci'))) {
                    // 남자의 1순위 매칭상대를 먼저 넣는다
                    $uniqueNicknames[] = ['your_ci' => $match['your_ci'], 'my_ci' => $ci];
                    $matches = [$match]; // 해당 요소만 남김
                    break;
                }
            }
        }
        unset($matches); // 참조 해제


        // partyMemberDataMen 한번 더 돌면서, 상대방도 매칭에 응해주기
        foreach ($partyMemberDataMen as $ci => $row) {
            foreach ($row as $rrow) {
                $query = "SELECT *, (SELECT gender FROM members WHERE ci='" . $rrow['your_ci'] . "') as gender FROM wh_match_rate WHERE member_ci='" .  $rrow['your_ci'] . "' AND delete_yn='n' ORDER BY match_rate DESC";
                $matchData = $MemberModel->query($query)->getResultArray();
                $matchRank = [];
                foreach ($matchData as $matchRow) {
                    if ($matchRow['member_ci'] === $rrow['your_ci'] && $matchRow['your_ci'] === $rrow['my_ci']) {
                        $matchRank[] = ['gender' => $matchRow['gender'], 'my_nickname' => $matchRow['my_nickname'], 'my_ci' => $rrow['your_ci'], 'your_ci' => $matchRow['your_ci'], 'your_nickname' => $matchRow['your_nickname'], 'match_score' => $matchRow['match_score'], 'match_score_max' => $matchRow['match_score_max'], 'match_rate' => $matchRow['match_rate']];
                    }
                }
                if ($matchRank) {
                    $partyMemberDataMen[$rrow['your_ci']] = $matchRank;
                    $uniqueNicknames[] = ['your_ci' => $matchRank[0]['your_ci'], 'my_ci' => $rrow['your_ci']];
                }
            }
        }


        // 2차매칭 시작
        $partyMember = array_reverse($partyMember);
        foreach ($partyMember as &$row) {
            $query = "SELECT *, (SELECT gender FROM members WHERE ci='" . $row . "') as gender FROM wh_match_rate 
                        WHERE member_ci='" . $row . "' AND delete_yn='n' 
                        ORDER BY match_rate DESC";
            $matchData = $MemberModel->query($query)->getResultArray();
            $matchRank = [];
            if ($matchData) {
                foreach ($matchData as $matchRow) {
                    $yourCi = $matchRow['your_ci'];
                    $beforeMatch = array_filter($uniqueNicknames, function ($person) use ($yourCi) {
                        return $person['your_ci'] === $yourCi;
                    });
                    $flattenedArray = [];

                    foreach ($beforeMatch as $innerArray) {
                        foreach ($innerArray as $key => $value) {
                            $flattenedArray[$key] = $value;
                        }
                    }
                    if ($flattenedArray && $flattenedArray['my_ci'] === $row) {
                        // 지난번 매칭에 포함됐던 커플에 대한 매칭률은 저장 안함
                    } else {
                        if (in_array($matchRow['your_ci'], $partyMember)) {
                            // 남자 데이터만 저장
                            if ($matchRow['gender'] === '1') {
                                $matchRank[] = ['gender' => $matchRow['gender'], 'my_ci' => $row, 'my_nickname' => $matchRow['my_nickname'], 'your_ci' => $matchRow['your_ci'], 'your_nickname' => $matchRow['your_nickname'], 'match_score' => $matchRow['match_score'], 'match_score_max' => $matchRow['match_score_max'], 'match_rate' => $matchRow['match_rate']];
                            }
                        }
                    }
                }
            }
            if ($matchRank) {
                // usort($matchRank, function ($a, $b) {
                //     return $b['match_rate'] - $a['match_rate'];
                // }); //ORDER BY 했으니까..
                // $matchRank = array_slice($matchRank, 0, 5);
                $partyMemberDataMen2[$row] = $matchRank;
            }
            unset($row); // 참조 해제
        }
        $uniqueNicknames2 = []; // 중복을 피하기 위해 이미 사용된 닉네임을 저장할 배열

        foreach ($partyMemberDataMen2 as $ci => &$matches) {
            usort($matches, function ($a, $b) {
                return $b['match_rate'] <=> $a['match_rate']; // 내림차순 정렬
            });
        }

        foreach ($partyMemberDataMen2 as $ci => &$matches) {
            // 중복되지 않는 첫 번째 요소 찾기
            foreach ($matches as $key => &$match) {
                if (!in_array($match['your_ci'], array_column($uniqueNicknames2, 'your_ci'))) {
                    // 남자의 1순위 매칭상대를 먼저 넣는다
                    $uniqueNicknames2[] = ['your_ci' => $match['your_ci'], 'my_ci' => $ci];
                    $matches = [$match]; // 해당 요소만 남김
                    break;
                } else {
                    // 매칭 가능한 상대방이 안남은 경우, 배열오류를 방지하기 위해 비워준다
                    $matches = [];
                }
            }
        }
        unset($matches); // 참조 해제


        // partyMemberDataMen 한번 더 돌면서, 상대방도 매칭에 응해주기
        foreach ($partyMemberDataMen2 as $ci => $row) {
            foreach ($row as $rrow) {
                $query = "SELECT *, (SELECT gender FROM members WHERE ci='" . $rrow['your_ci'] . "') as gender FROM wh_match_rate 
                            WHERE member_ci='" .  $rrow['your_ci'] . "'
                                     AND delete_yn='n' 
                                     ORDER BY match_rate DESC";
                $matchData = $MemberModel->query($query)->getResultArray();

                $matchRank = [];
                foreach ($matchData as $matchRow) {
                    if ($matchRow['member_ci'] === $rrow['your_ci'] && $matchRow['your_ci'] === $rrow['my_ci']) {
                        $matchRank[] = ['gender' => $matchRow['gender'], 'my_ci' => $rrow['your_ci'], 'my_nickname' => $matchRow['my_nickname'], 'your_ci' => $matchRow['your_ci'], 'your_nickname' => $matchRow['your_nickname'], 'match_score' => $matchRow['match_score'], 'match_score_max' => $matchRow['match_score_max'], 'match_rate' => $matchRow['match_rate']];
                    }
                }
                if ($matchRank) {
                    $partyMemberDataMen2[$rrow['your_ci']] = $matchRank;
                    $uniqueNicknames2[] = ['your_ci' => $matchRank[0]['your_ci'], 'my_ci' => $rrow['your_ci']];
                }
            }
        }

        // 3차매칭 시작
        $partyMember = array_reverse($partyMember);
        foreach ($partyMember as &$row) {
            $query = "SELECT *, (SELECT gender FROM members WHERE ci='" . $row . "') as gender FROM wh_match_rate 
                        WHERE member_ci='" . $row . "' AND delete_yn='n' 
                        ORDER BY match_rate DESC";
            $matchData = $MemberModel->query($query)->getResultArray();
            $matchRank = [];
            if ($matchData) {
                foreach ($matchData as $matchRow) {

                    $yourCi = $matchRow['your_ci'];
                    $beforeMatch = array_filter($uniqueNicknames, function ($person) use ($yourCi) {
                        return $person['your_ci'] === $yourCi;
                    });

                    $flattenedArray = [];

                    foreach ($beforeMatch as $innerArray) {
                        foreach ($innerArray as $key => $value) {
                            $flattenedArray[$key] = $value;
                        }
                    }
                    if ($flattenedArray && $flattenedArray['my_ci'] === $row) {
                        // 지난번 매칭에 포함됐던 커플에 대한 매칭률은 저장 안함
                    } else {
                        $beforeMatch = array_filter($uniqueNicknames2, function ($person) use ($yourCi) {
                            return $person['your_ci'] === $yourCi;
                        });

                        $flattenedArray = [];

                        foreach ($beforeMatch as $innerArray) {
                            foreach ($innerArray as $key => $value) {
                                $flattenedArray[$key] = $value;
                            }
                        }
                        if ($flattenedArray && $flattenedArray['my_ci'] === $row) {
                            // 지난번 매칭에 포함됐던 커플에 대한 매칭률은 저장 안함
                        } else {
                            if (in_array($matchRow['your_ci'], $partyMember)) {
                                // 남자 데이터만 저장
                                if ($matchRow['gender'] === '1') {
                                    $matchRank[] = ['gender' => $matchRow['gender'], 'my_ci' => $row, 'my_nickname' => $matchRow['my_nickname'], 'your_ci' => $matchRow['your_ci'], 'your_nickname' => $matchRow['your_nickname'], 'match_score' => $matchRow['match_score'], 'match_score_max' => $matchRow['match_score_max'], 'match_rate' => $matchRow['match_rate']];
                                }
                            }
                        }
                    }
                }
            }
            if ($matchRank) {
                // usort($matchRank, function ($a, $b) {
                //     return $b['match_rate'] - $a['match_rate'];
                // }); //ORDER BY 했으니까..
                // $matchRank = array_slice($matchRank, 0, 5);
                $partyMemberDataMen3[$row] = $matchRank;
            }
            unset($row); // 참조 해제
        }

        $uniqueNicknames3 = []; // 중복을 피하기 위해 이미 사용된 닉네임을 저장할 배열

        foreach ($partyMemberDataMen3 as $ci => &$matches) {
            usort($matches, function ($a, $b) {
                return $b['match_rate'] <=> $a['match_rate']; // 내림차순 정렬
            });
        }

        foreach ($partyMemberDataMen3 as $ci => &$matches) {
            // 중복되지 않는 첫 번째 요소 찾기
            foreach ($matches as $key => $match) {
                if (!in_array($match['your_ci'], array_column($uniqueNicknames3, 'your_ci'))) {
                    // 남자의 1순위 매칭상대를 먼저 넣는다
                    $uniqueNicknames3[] = ['your_ci' => $match['your_ci'], 'my_ci' => $ci];
                    $matches = [$match]; // 해당 요소만 남김
                    break;
                } else {
                    // 매칭 가능한 상대방이 안남은 경우, 배열오류를 방지하기 위해 비워준다
                    $matches = [];
                }
            }
            unset($matches); // 참조 해제
        }


        // partyMemberDataMen 한번 더 돌면서, 상대방도 매칭에 응해주기
        foreach ($partyMemberDataMen3 as $row) {
            foreach ($row as $rrow) {
                $query = "SELECT *, (SELECT gender FROM members WHERE ci='" . $rrow['your_ci'] . "') as gender FROM wh_match_rate 
                            WHERE member_ci='" .  $rrow['your_ci'] . "'
                                     AND delete_yn='n' 
                                     ORDER BY match_rate DESC";
                $matchData = $MemberModel->query($query)->getResultArray();

                $matchRank = [];
                foreach ($matchData as $matchRow) {
                    if ($matchRow['member_ci'] === $rrow['your_ci'] && $matchRow['your_ci'] === $rrow['my_ci']) {
                        $matchRank[] = ['gender' => $matchRow['gender'], 'my_ci' => $rrow['your_ci'], 'my_nickname' => $matchRow['my_nickname'], 'your_ci' => $matchRow['your_ci'], 'your_nickname' => $matchRow['your_nickname'], 'match_score' => $matchRow['match_score'], 'match_score_max' => $matchRow['match_score_max'], 'match_rate' => $matchRow['match_rate']];
                    }
                }
                if ($matchRank) {
                    $partyMemberDataMen3[$rrow['your_ci']] = $matchRank;
                    $uniqueNicknames3[] = ['your_ci' => $matchRank[0]['your_ci'], 'my_ci' => $rrow['your_ci']];
                }
            }
        }

        // 4차매칭 시작
        $partyMember = array_reverse($partyMember);
        foreach ($partyMember as &$row) {
            $query = "SELECT *, (SELECT gender FROM members WHERE ci='" . $row . "') as gender FROM wh_match_rate 
                        WHERE member_ci='" . $row . "' AND delete_yn='n' 
                        ORDER BY match_rate DESC";
            $matchData = $MemberModel->query($query)->getResultArray();
            $matchRank = [];
            if ($matchData) {
                foreach ($matchData as $matchRow) {
                    $yourCi = $matchRow['your_ci'];
                    $beforeMatch = array_filter($uniqueNicknames, function ($person) use ($yourCi) {
                        return $person['your_ci'] === $yourCi;
                    });

                    $flattenedArray = [];

                    foreach ($beforeMatch as $innerArray) {
                        foreach ($innerArray as $key => $value) {
                            $flattenedArray[$key] = $value;
                        }
                    }
                    if ($flattenedArray && $flattenedArray['my_ci'] === $row) {
                        // 지난번 매칭에 포함됐던 커플에 대한 매칭률은 저장 안함
                    } else {
                        $beforeMatch = array_filter($uniqueNicknames2, function ($person) use ($yourCi) {
                            return $person['your_ci'] === $yourCi;
                        });

                        $flattenedArray = [];

                        foreach ($beforeMatch as $innerArray) {
                            foreach ($innerArray as $key => $value) {
                                $flattenedArray[$key] = $value;
                            }
                        }
                        if ($flattenedArray && $flattenedArray['my_ci'] === $row) {
                            // 지난번 매칭에 포함됐던 커플에 대한 매칭률은 저장 안함
                        } else {
                            $beforeMatch = array_filter($uniqueNicknames3, function ($person) use ($yourCi) {
                                return $person['your_ci'] === $yourCi;
                            });

                            $flattenedArray = [];

                            foreach ($beforeMatch as $innerArray) {
                                foreach ($innerArray as $key => $value) {
                                    $flattenedArray[$key] = $value;
                                }
                            }
                            if ($flattenedArray && $flattenedArray['my_ci'] === $row) {
                                // 지난번 매칭에 포함됐던 커플에 대한 매칭률은 저장 안함
                            } else {
                                if (in_array($matchRow['your_ci'], $partyMember)) {
                                    // 남자 데이터만 저장
                                    if ($matchRow['gender'] === '1') {
                                        $matchRank[] = ['gender' => $matchRow['gender'], 'my_ci' => $row, 'my_nickname' => $matchRow['my_nickname'], 'your_ci' => $matchRow['your_ci'], 'your_nickname' => $matchRow['your_nickname'], 'match_score' => $matchRow['match_score'], 'match_score_max' => $matchRow['match_score_max'], 'match_rate' => $matchRow['match_rate']];
                                    }
                                }
                            }
                        }
                    }
                }
            }
            if ($matchRank) {
                // usort($matchRank, function ($a, $b) {
                //     return $b['match_rate'] - $a['match_rate'];
                // }); //ORDER BY 했으니까..
                // $matchRank = array_slice($matchRank, 0, 5);
                $partyMemberDataMen4[$row] = $matchRank;
            }
            unset($row); // 참조 해제
        }

        $uniqueNicknames4 = []; // 중복을 피하기 위해 이미 사용된 닉네임을 저장할 배열

        foreach ($partyMemberDataMen4 as $ci => &$matches) {
            usort($matches, function ($a, $b) {
                return $b['match_rate'] <=> $a['match_rate']; // 내림차순 정렬
            });
        }

        foreach ($partyMemberDataMen4 as $ci => &$matches) {
            // 중복되지 않는 첫 번째 요소 찾기
            foreach ($matches as $key => $match) {
                // print_r($match);
                if (!in_array($match['your_ci'], array_column($uniqueNicknames4, 'your_ci'))) {
                    // 남자의 1순위 매칭상대를 먼저 넣는다
                    $uniqueNicknames4[] = ['your_ci' => $match['your_ci'], 'my_ci' => $ci];
                    $matches = [$match]; // 해당 요소만 남김
                    break;
                } else {
                    // 매칭 가능한 상대방이 안남은 경우, 배열오류를 방지하기 위해 비워준다
                    $matches = [];
                }
            }
            unset($matches); // 참조 해제
        }

        // partyMemberDataMen 한번 더 돌면서, 상대방도 매칭에 응해주기
        foreach ($partyMemberDataMen4 as $ci => $row) {
            foreach ($row as $rrow) {
                $query = "SELECT *, (SELECT gender FROM members WHERE ci='" . $rrow['your_ci'] . "') as gender FROM wh_match_rate 
                            WHERE member_ci='" .  $rrow['your_ci'] . "'
                                     AND delete_yn='n' 
                                     ORDER BY match_rate DESC";
                $matchData = $MemberModel->query($query)->getResultArray();

                $matchRank = [];
                foreach ($matchData as $matchRow) {
                    if ($matchRow['member_ci'] === $rrow['your_ci'] && $matchRow['your_ci'] === $rrow['my_ci']) {
                        $matchRank[] = ['gender' => $matchRow['gender'], 'my_ci' => $rrow['your_ci'], 'my_nickname' => $matchRow['my_nickname'], 'your_ci' => $matchRow['your_ci'], 'your_nickname' => $matchRow['your_nickname'], 'match_score' => $matchRow['match_score'], 'match_score_max' => $matchRow['match_score_max'], 'match_rate' => $matchRow['match_rate']];
                    }
                }
                if ($matchRank) {
                    $partyMemberDataMen4[$rrow['your_ci']] = $matchRank;
                    $uniqueNicknames4[] = ['your_ci' => $matchRank[0]['your_ci'], 'my_ci' => $rrow['your_ci']];
                }
            }
        }



        // print_r($partyMemberData);
        $data['partyMemberData1'] = $partyMemberDataMen;
        $data['partyMemberData2'] = $partyMemberDataMen2;
        $data['partyMemberData3'] = $partyMemberDataMen3;
        $data['partyMemberData4'] = $partyMemberDataMen4;
        $data['uniqueNicknames'] = $uniqueNicknames;
        $data['uniqueNicknames2'] = $uniqueNicknames2;
        $data['uniqueNicknames3'] = $uniqueNicknames3;
        $data['uniqueNicknames4'] = $uniqueNicknames4;
        $data['memberData'] = $memberData;



        // echo '<pre>';
        // print_r($uniqueNicknames2);
        // echo '</pre>';

        $session = session();
        $ci = $session->get('ci');
        $query = "SELECT * FROM members WHERE ci='" . $ci . "'";
        $adminVerify = $MemberModel->query($query)->getResultArray();
        if ($adminVerify) {
            $adminId = $adminVerify[0]['email'];
            if ($adminId === 'admin' || $adminId === 'develop') {
                return view('admin/ad_party_mngment_test', $data);
            } else {
                return redirect()->to("/");
            }
        }
    }

    public function partyMngmentTest1()
    {
        $MemberModel = new MemberModel();
        $matchNum = $this->request->getPost('num');


        // 참여자 전원 돌면서 해당방 안의 매칭률 있는지 확인하기
        $query = "SELECT mb.name, mb.nickname, mb.ci FROM wh_meeting_members wmm, members mb WHERE wmm.member_ci = mb.ci AND wmm.meeting_idx='189' AND wmm.delete_yn='N'";
        $memberData = $MemberModel->query($query)->getResultArray();

        $partyMember = []; //파티 멤버의 ci값 적재
        foreach ($memberData as $row) {
            $partyMember[] = $row['ci'];
        }


        $partyMemberDataMen = [];
        $partyMemberDataMen2 = [];
        $partyMemberDataMen3 = [];
        $partyMemberDataMen4 = [];

        // 1차매칭 시작
        foreach ($partyMember as &$row) {
            $query = "SELECT *, (SELECT gender FROM members WHERE ci='" . $row . "') as gender FROM wh_match_rate WHERE member_ci='" . $row . "' AND delete_yn='n' ORDER BY match_rate DESC";
            $matchData = $MemberModel->query($query)->getResultArray();
            $matchRank = [];
            if ($matchData) {
                foreach ($matchData as $matchRow) {
                    if (in_array($matchRow['your_ci'], $partyMember)) {
                        // 남자 데이터만 저장
                        if ($matchRow['gender'] === '1') {
                            $matchRank[] = ['gender' => $matchRow['gender'], 'my_ci' => $row, 'my_nickname' => $matchRow['my_nickname'], 'your_ci' => $matchRow['your_ci'], 'your_nickname' => $matchRow['your_nickname'], 'match_score' => $matchRow['match_score'], 'match_score_max' => $matchRow['match_score_max'], 'match_rate' => $matchRow['match_rate']];
                        }
                    }
                }
            }
            if ($matchRank) {
                $partyMemberDataMen[$row] = $matchRank;
            }
        }
        unset($row); // 참조 해제

        $uniqueNicknames = []; // 중복을 피하기 위해 이미 사용된 닉네임을 저장할 배열

        foreach ($partyMemberDataMen as $ci => &$matches) {

            usort($matches, function ($a, $b) {
                return $b['match_rate'] - $a['match_rate']; // 내림차순 정렬 -> 본인 배열 내에서 먼저하기
            });
        }
        foreach ($partyMemberDataMen as $ci => &$matches) {

            // 중복되지 않는 첫 번째 요소 찾기
            foreach ($matches as $key => &$match) {
                if (!in_array($match['your_ci'], array_column($uniqueNicknames, 'your_ci'))) {
                    // 남자의 1순위 매칭상대를 먼저 넣는다
                    $uniqueNicknames[] = ['your_ci' => $match['your_ci'], 'my_ci' => $ci];
                    $matches = [$match]; // 해당 요소만 남김
                    break;
                }
            }
        }
        unset($matches); // 참조 해제


        // partyMemberDataMen 한번 더 돌면서, 상대방도 매칭에 응해주기
        foreach ($partyMemberDataMen as $ci => $row) {
            foreach ($row as $rrow) {
                $query = "SELECT *, (SELECT gender FROM members WHERE ci='" . $rrow['your_ci'] . "') as gender FROM wh_match_rate WHERE member_ci='" .  $rrow['your_ci'] . "' AND delete_yn='n' ORDER BY match_rate DESC";
                $matchData = $MemberModel->query($query)->getResultArray();
                $matchRank = [];
                foreach ($matchData as $matchRow) {
                    if ($matchRow['member_ci'] === $rrow['your_ci'] && $matchRow['your_ci'] === $rrow['my_ci']) {
                        $matchRank[] = ['gender' => $matchRow['gender'], 'my_nickname' => $matchRow['my_nickname'], 'my_ci' => $rrow['your_ci'], 'your_ci' => $matchRow['your_ci'], 'your_nickname' => $matchRow['your_nickname'], 'match_score' => $matchRow['match_score'], 'match_score_max' => $matchRow['match_score_max'], 'match_rate' => $matchRow['match_rate']];
                    }
                }
                if ($matchRank) {
                    $partyMemberDataMen[$rrow['your_ci']] = $matchRank;
                    $uniqueNicknames[] = ['your_ci' => $matchRank[0]['your_ci'], 'my_ci' => $rrow['your_ci']];
                }
            }
        }


        // 2차매칭 시작
        $partyMember = array_reverse($partyMember);
        foreach ($partyMember as &$row) {
            $query = "SELECT *, (SELECT gender FROM members WHERE ci='" . $row . "') as gender FROM wh_match_rate 
                        WHERE member_ci='" . $row . "' AND delete_yn='n' 
                        ORDER BY match_rate DESC";
            $matchData = $MemberModel->query($query)->getResultArray();
            $matchRank = [];
            if ($matchData) {
                foreach ($matchData as $matchRow) {
                    $yourCi = $matchRow['your_ci'];
                    $beforeMatch = array_filter($uniqueNicknames, function ($person) use ($yourCi) {
                        return $person['your_ci'] === $yourCi;
                    });
                    $flattenedArray = [];

                    foreach ($beforeMatch as $innerArray) {
                        foreach ($innerArray as $key => $value) {
                            $flattenedArray[$key] = $value;
                        }
                    }
                    if ($flattenedArray && $flattenedArray['my_ci'] === $row) {
                        // 지난번 매칭에 포함됐던 커플에 대한 매칭률은 저장 안함
                    } else {
                        if (in_array($matchRow['your_ci'], $partyMember)) {
                            // 남자 데이터만 저장
                            if ($matchRow['gender'] === '1') {
                                $matchRank[] = ['gender' => $matchRow['gender'], 'my_ci' => $row, 'my_nickname' => $matchRow['my_nickname'], 'your_ci' => $matchRow['your_ci'], 'your_nickname' => $matchRow['your_nickname'], 'match_score' => $matchRow['match_score'], 'match_score_max' => $matchRow['match_score_max'], 'match_rate' => $matchRow['match_rate']];
                            }
                        }
                    }
                }
            }
            if ($matchRank) {
                // usort($matchRank, function ($a, $b) {
                //     return $b['match_rate'] - $a['match_rate'];
                // }); //ORDER BY 했으니까..
                // $matchRank = array_slice($matchRank, 0, 5);
                $partyMemberDataMen2[$row] = $matchRank;
            }
            unset($row); // 참조 해제
        }
        $uniqueNicknames2 = []; // 중복을 피하기 위해 이미 사용된 닉네임을 저장할 배열

        foreach ($partyMemberDataMen2 as $ci => &$matches) {
            usort($matches, function ($a, $b) {
                return $b['match_rate'] <=> $a['match_rate']; // 내림차순 정렬
            });
        }

        foreach ($partyMemberDataMen2 as $ci => &$matches) {
            // 중복되지 않는 첫 번째 요소 찾기
            foreach ($matches as $key => &$match) {
                if (!in_array($match['your_ci'], array_column($uniqueNicknames2, 'your_ci'))) {
                    // 남자의 1순위 매칭상대를 먼저 넣는다
                    $uniqueNicknames2[] = ['your_ci' => $match['your_ci'], 'my_ci' => $ci];
                    $matches = [$match]; // 해당 요소만 남김
                    break;
                } else {
                    // 매칭 가능한 상대방이 안남은 경우, 배열오류를 방지하기 위해 비워준다
                    $matches = [];
                }
            }
        }
        unset($matches); // 참조 해제


        // partyMemberDataMen 한번 더 돌면서, 상대방도 매칭에 응해주기
        foreach ($partyMemberDataMen2 as $ci => $row) {
            foreach ($row as $rrow) {
                $query = "SELECT *, (SELECT gender FROM members WHERE ci='" . $rrow['your_ci'] . "') as gender FROM wh_match_rate 
                            WHERE member_ci='" .  $rrow['your_ci'] . "'
                                     AND delete_yn='n' 
                                     ORDER BY match_rate DESC";
                $matchData = $MemberModel->query($query)->getResultArray();

                $matchRank = [];
                foreach ($matchData as $matchRow) {
                    if ($matchRow['member_ci'] === $rrow['your_ci'] && $matchRow['your_ci'] === $rrow['my_ci']) {
                        $matchRank[] = ['gender' => $matchRow['gender'], 'my_ci' => $rrow['your_ci'], 'my_nickname' => $matchRow['my_nickname'], 'your_ci' => $matchRow['your_ci'], 'your_nickname' => $matchRow['your_nickname'], 'match_score' => $matchRow['match_score'], 'match_score_max' => $matchRow['match_score_max'], 'match_rate' => $matchRow['match_rate']];
                    }
                }
                if ($matchRank) {
                    $partyMemberDataMen2[$rrow['your_ci']] = $matchRank;
                    $uniqueNicknames2[] = ['your_ci' => $matchRank[0]['your_ci'], 'my_ci' => $rrow['your_ci']];
                }
            }
        }

        // 3차매칭 시작
        $partyMember = array_reverse($partyMember);
        foreach ($partyMember as &$row) {
            $query = "SELECT *, (SELECT gender FROM members WHERE ci='" . $row . "') as gender FROM wh_match_rate 
                        WHERE member_ci='" . $row . "' AND delete_yn='n' 
                        ORDER BY match_rate DESC";
            $matchData = $MemberModel->query($query)->getResultArray();
            $matchRank = [];
            if ($matchData) {
                foreach ($matchData as $matchRow) {

                    $yourCi = $matchRow['your_ci'];
                    $beforeMatch = array_filter($uniqueNicknames, function ($person) use ($yourCi) {
                        return $person['your_ci'] === $yourCi;
                    });

                    $flattenedArray = [];

                    foreach ($beforeMatch as $innerArray) {
                        foreach ($innerArray as $key => $value) {
                            $flattenedArray[$key] = $value;
                        }
                    }
                    if ($flattenedArray && $flattenedArray['my_ci'] === $row) {
                        // 지난번 매칭에 포함됐던 커플에 대한 매칭률은 저장 안함
                    } else {
                        $beforeMatch = array_filter($uniqueNicknames2, function ($person) use ($yourCi) {
                            return $person['your_ci'] === $yourCi;
                        });

                        $flattenedArray = [];

                        foreach ($beforeMatch as $innerArray) {
                            foreach ($innerArray as $key => $value) {
                                $flattenedArray[$key] = $value;
                            }
                        }
                        if ($flattenedArray && $flattenedArray['my_ci'] === $row) {
                            // 지난번 매칭에 포함됐던 커플에 대한 매칭률은 저장 안함
                        } else {
                            if (in_array($matchRow['your_ci'], $partyMember)) {
                                // 남자 데이터만 저장
                                if ($matchRow['gender'] === '1') {
                                    $matchRank[] = ['gender' => $matchRow['gender'], 'my_ci' => $row, 'my_nickname' => $matchRow['my_nickname'], 'your_ci' => $matchRow['your_ci'], 'your_nickname' => $matchRow['your_nickname'], 'match_score' => $matchRow['match_score'], 'match_score_max' => $matchRow['match_score_max'], 'match_rate' => $matchRow['match_rate']];
                                }
                            }
                        }
                    }
                }
            }
            if ($matchRank) {
                // usort($matchRank, function ($a, $b) {
                //     return $b['match_rate'] - $a['match_rate'];
                // }); //ORDER BY 했으니까..
                // $matchRank = array_slice($matchRank, 0, 5);
                $partyMemberDataMen3[$row] = $matchRank;
            }
            unset($row); // 참조 해제
        }

        $uniqueNicknames3 = []; // 중복을 피하기 위해 이미 사용된 닉네임을 저장할 배열

        foreach ($partyMemberDataMen3 as $ci => &$matches) {
            usort($matches, function ($a, $b) {
                return $b['match_rate'] <=> $a['match_rate']; // 내림차순 정렬
            });
        }

        foreach ($partyMemberDataMen3 as $ci => &$matches) {
            // 중복되지 않는 첫 번째 요소 찾기
            foreach ($matches as $key => $match) {
                if (!in_array($match['your_ci'], array_column($uniqueNicknames3, 'your_ci'))) {
                    // 남자의 1순위 매칭상대를 먼저 넣는다
                    $uniqueNicknames3[] = ['your_ci' => $match['your_ci'], 'my_ci' => $ci];
                    $matches = [$match]; // 해당 요소만 남김
                    break;
                } else {
                    // 매칭 가능한 상대방이 안남은 경우, 배열오류를 방지하기 위해 비워준다
                    $matches = [];
                }
            }
            unset($matches); // 참조 해제
        }


        // partyMemberDataMen 한번 더 돌면서, 상대방도 매칭에 응해주기
        foreach ($partyMemberDataMen3 as $row) {
            foreach ($row as $rrow) {
                $query = "SELECT *, (SELECT gender FROM members WHERE ci='" . $rrow['your_ci'] . "') as gender FROM wh_match_rate 
                            WHERE member_ci='" .  $rrow['your_ci'] . "'
                                     AND delete_yn='n' 
                                     ORDER BY match_rate DESC";
                $matchData = $MemberModel->query($query)->getResultArray();

                $matchRank = [];
                foreach ($matchData as $matchRow) {
                    if ($matchRow['member_ci'] === $rrow['your_ci'] && $matchRow['your_ci'] === $rrow['my_ci']) {
                        $matchRank[] = ['gender' => $matchRow['gender'], 'my_ci' => $rrow['your_ci'], 'my_nickname' => $matchRow['my_nickname'], 'your_ci' => $matchRow['your_ci'], 'your_nickname' => $matchRow['your_nickname'], 'match_score' => $matchRow['match_score'], 'match_score_max' => $matchRow['match_score_max'], 'match_rate' => $matchRow['match_rate']];
                    }
                }
                if ($matchRank) {
                    $partyMemberDataMen3[$rrow['your_ci']] = $matchRank;
                    $uniqueNicknames3[] = ['your_ci' => $matchRank[0]['your_ci'], 'my_ci' => $rrow['your_ci']];
                }
            }
        }

        // 4차매칭 시작
        $partyMember = array_reverse($partyMember);
        foreach ($partyMember as &$row) {
            $query = "SELECT *, (SELECT gender FROM members WHERE ci='" . $row . "') as gender FROM wh_match_rate 
                        WHERE member_ci='" . $row . "' AND delete_yn='n' 
                        ORDER BY match_rate DESC";
            $matchData = $MemberModel->query($query)->getResultArray();
            $matchRank = [];
            if ($matchData) {
                foreach ($matchData as $matchRow) {
                    $yourCi = $matchRow['your_ci'];
                    $beforeMatch = array_filter($uniqueNicknames, function ($person) use ($yourCi) {
                        return $person['your_ci'] === $yourCi;
                    });

                    $flattenedArray = [];

                    foreach ($beforeMatch as $innerArray) {
                        foreach ($innerArray as $key => $value) {
                            $flattenedArray[$key] = $value;
                        }
                    }
                    if ($flattenedArray && $flattenedArray['my_ci'] === $row) {
                        // 지난번 매칭에 포함됐던 커플에 대한 매칭률은 저장 안함
                    } else {
                        $beforeMatch = array_filter($uniqueNicknames2, function ($person) use ($yourCi) {
                            return $person['your_ci'] === $yourCi;
                        });

                        $flattenedArray = [];

                        foreach ($beforeMatch as $innerArray) {
                            foreach ($innerArray as $key => $value) {
                                $flattenedArray[$key] = $value;
                            }
                        }
                        if ($flattenedArray && $flattenedArray['my_ci'] === $row) {
                            // 지난번 매칭에 포함됐던 커플에 대한 매칭률은 저장 안함
                        } else {
                            $beforeMatch = array_filter($uniqueNicknames3, function ($person) use ($yourCi) {
                                return $person['your_ci'] === $yourCi;
                            });

                            $flattenedArray = [];

                            foreach ($beforeMatch as $innerArray) {
                                foreach ($innerArray as $key => $value) {
                                    $flattenedArray[$key] = $value;
                                }
                            }
                            if ($flattenedArray && $flattenedArray['my_ci'] === $row) {
                                // 지난번 매칭에 포함됐던 커플에 대한 매칭률은 저장 안함
                            } else {
                                if (in_array($matchRow['your_ci'], $partyMember)) {
                                    // 남자 데이터만 저장
                                    if ($matchRow['gender'] === '1') {
                                        $matchRank[] = ['gender' => $matchRow['gender'], 'my_ci' => $row, 'my_nickname' => $matchRow['my_nickname'], 'your_ci' => $matchRow['your_ci'], 'your_nickname' => $matchRow['your_nickname'], 'match_score' => $matchRow['match_score'], 'match_score_max' => $matchRow['match_score_max'], 'match_rate' => $matchRow['match_rate']];
                                    }
                                }
                            }
                        }
                    }
                }
            }
            if ($matchRank) {
                // usort($matchRank, function ($a, $b) {
                //     return $b['match_rate'] - $a['match_rate'];
                // }); //ORDER BY 했으니까..
                // $matchRank = array_slice($matchRank, 0, 5);
                $partyMemberDataMen4[$row] = $matchRank;
            }
            unset($row); // 참조 해제
        }

        $uniqueNicknames4 = []; // 중복을 피하기 위해 이미 사용된 닉네임을 저장할 배열

        foreach ($partyMemberDataMen4 as $ci => &$matches) {
            usort($matches, function ($a, $b) {
                return $b['match_rate'] <=> $a['match_rate']; // 내림차순 정렬
            });
        }

        foreach ($partyMemberDataMen4 as $ci => &$matches) {
            // 중복되지 않는 첫 번째 요소 찾기
            foreach ($matches as $key => $match) {
                // print_r($match);
                if (!in_array($match['your_ci'], array_column($uniqueNicknames4, 'your_ci'))) {
                    // 남자의 1순위 매칭상대를 먼저 넣는다
                    $uniqueNicknames4[] = ['your_ci' => $match['your_ci'], 'my_ci' => $ci];
                    $matches = [$match]; // 해당 요소만 남김
                    break;
                } else {
                    // 매칭 가능한 상대방이 안남은 경우, 배열오류를 방지하기 위해 비워준다
                    $matches = [];
                }
            }
            unset($matches); // 참조 해제
        }

        // partyMemberDataMen 한번 더 돌면서, 상대방도 매칭에 응해주기
        foreach ($partyMemberDataMen4 as $ci => $row) {
            foreach ($row as $rrow) {
                $query = "SELECT *, (SELECT gender FROM members WHERE ci='" . $rrow['your_ci'] . "') as gender FROM wh_match_rate 
                            WHERE member_ci='" .  $rrow['your_ci'] . "'
                                     AND delete_yn='n' 
                                     ORDER BY match_rate DESC";
                $matchData = $MemberModel->query($query)->getResultArray();

                $matchRank = [];
                foreach ($matchData as $matchRow) {
                    if ($matchRow['member_ci'] === $rrow['your_ci'] && $matchRow['your_ci'] === $rrow['my_ci']) {
                        $matchRank[] = ['gender' => $matchRow['gender'], 'my_ci' => $rrow['your_ci'], 'my_nickname' => $matchRow['my_nickname'], 'your_ci' => $matchRow['your_ci'], 'your_nickname' => $matchRow['your_nickname'], 'match_score' => $matchRow['match_score'], 'match_score_max' => $matchRow['match_score_max'], 'match_rate' => $matchRow['match_rate']];
                    }
                }
                if ($matchRank) {
                    $partyMemberDataMen4[$rrow['your_ci']] = $matchRank;
                    $uniqueNicknames4[] = ['your_ci' => $matchRank[0]['your_ci'], 'my_ci' => $rrow['your_ci']];
                }
            }
        }



        // print_r($partyMemberData);
        $data['partyMemberData1'] = $partyMemberDataMen;
        $data['partyMemberData2'] = $partyMemberDataMen2;
        $data['partyMemberData3'] = $partyMemberDataMen3;
        $data['partyMemberData4'] = $partyMemberDataMen4;
        $data['uniqueNicknames'] = $uniqueNicknames;
        $data['uniqueNicknames2'] = $uniqueNicknames2;
        $data['uniqueNicknames3'] = $uniqueNicknames3;
        $data['uniqueNicknames4'] = $uniqueNicknames4;
        $data['memberData'] = $memberData;

        if ($matchNum === '1') {
            $matchResultData = $uniqueNicknames;
        } else if ($matchNum === '2') {
            $matchResultData = $uniqueNicknames2;
        } else if ($matchNum === '3') {
            $matchResultData = $uniqueNicknames3;
        } else if ($matchNum === '4') {
            $matchResultData = $uniqueNicknames4;
        }
        foreach ($matchResultData as $sendMsg) {

            // 이후 메세지 생성
            $word_file_path = APPPATH . 'Data/MemberCode.php';
            require($word_file_path);
            // 내 정보 쿼리
            $query = "SELECT mb.ci, mb.name, SUBSTR(mb.birthday, 1, 4)AS birthday, mb.city, mb.town, mb.nickname, mb.mbti, mf.file_path, mf.file_name
                      FROM members mb, member_files mf WHERE mb.ci = mf.member_ci AND mf.board_type='main_photo' AND mf.delete_yn='n' AND mb.ci = '" . $sendMsg['my_ci'] . "'";
            $myProfile = $MemberModel->query($query)->getResultArray();
            $mbtiTxt = '';
            $cityTxt = '';
            $townTxt = '';

            foreach ($mbtiCode as $item) {
                if ($item['id'] === $myProfile[0]['mbti']) $mbtiTxt = $item['name'];
            }
            foreach ($sidoCode as $item) {
                if ($item['id'] === $myProfile[0]['city']) $cityTxt = $item['name'];
            }
            foreach ($gunguCode as $item) {
                if ($item['p_id'] === $myProfile[0]['city'] && $item['id'] === $myProfile[0]['town']) $townTxt = $item['name'];
            }

            // 서로 포크 시 AI 메세지 전송
            $aiMsgSend1 = '<div class="recieve_profile">';
            $aiMsgSend1 .= '<img style="width:50px; height:50px; border-radius: 50%;" src="/' . $myProfile[0]['file_path'] . $myProfile[0]['file_name'] . '">';
            $aiMsgSend1 .= '<div class="content_mypage_info">';
            $aiMsgSend1 .= '<div class="profile">';
            $aiMsgSend1 .= '<h2>' . $myProfile[0]['name'] . '</h2>';
            // $aiMsgSend1 .= `<button class="match_percent">99%</button>`;
            $aiMsgSend1 .= '</div>';
            $aiMsgSend1 .= '<p>' . $myProfile[0]['birthday'] . ' · ' . $cityTxt . ' ' . $townTxt . ' · ' . $mbtiTxt . '</p>';
            $aiMsgSend1 .= '</div>';
            $aiMsgSend1 .= '</div>';
            $aiMsgSend1 .= '<p class="receive_match_msg">띵동 AI 소개팅이 도착했어요<br> 정보를 확인하실래요?</p>';
            $aiMsgSend1 .= '<button style="width: 200px;" class="receive_profile_view" onclick="moveToUrl(`/mo/viewProfile/' . $myProfile[0]['nickname'] . '`)">정보보기</button>';

            $query2 = "INSERT INTO wh_chat_room_msg_ai
            (room_ci, member_ci, entry_num, msg_type, msg_cont, chk_num, chk_entry_num)
            VALUES('" . $sendMsg['your_ci'] . "','AImanager','1','0','" . $aiMsgSend1 . "','9','9');";


            // 내정보 상대방에게 전송
            $sendMsg = $MemberModel->query($query2);
        }
        return $this->response->setJSON(['success' => true, 'msg' => 'AI 소개팅 메시지가 발송되었습니다.']);
    }

    public function memberCertificateCheck()
    {
        $level = $this->request->getPost('level');
        $id = $this->request->getPost('id');

        $MemberFileModel = new MemberFileModel();

        $updated = $MemberFileModel
            ->where('id', $id)
            ->update(null, ['extra1' => $level]);

        if ($updated) {
            if ($level == 'y') {
                return $this->response->setJSON(['success' => true, 'msg' => '승인 되었습니다.']);
            }
        } else {
            return $this->response->setJSON(['error' => true, 'msg' => '승인 실패.']);
        }
    }

    /*회원 계좌이체 승인 목록*/
    public function memberPaymentList($page = null)
    {

        // 페이지가 없으면 기본값으로 1을 사용
        // if ($page === null || !is_numeric($page)) {
        //     $page = 1;
        // } else {
        //     $page = 2;
        // }

        // $perPage = 20;
        $MemberModel = new MemberModel();

        // $total = $MemberModel->query("SELECT COUNT(*) as total FROM members m LEFT JOIN member_files mf ON m.ci = mf.member_ci")->getRow()->total;

        // $offset = ($page - 1) * $perPage; // 현재 페이지의 첫 번째 데이터 인덱스
        $query = "SELECT m.idx, 
                m.name, 
                CASE 
                     WHEN m.gender = 1 THEN '남' 
                     WHEN m.gender = 0 THEN '여' 
                END AS gender,
                m.nickname, 
                m.email, 
                CASE 
                     WHEN m.recommender_code IS NULL THEN '미사용' 
                     ELSE m.recommender_code
                END AS recommender_code,
                m.grade, 
                m.temp_grade,
                CASE 
                    WHEN m.grade = m.temp_grade THEN 'y'
                    ELSE 'n'
                END AS grade_match
             FROM members as m 
             WHERE m.temp_grade != 'grade01'
             AND m.delete_yn = 'N'
             ORDER BY grade_match, m.updated_at DESC, m.idx DESC";

        $data['datas'] = $MemberModel->query($query)->getResultArray();
        $data['query'] = $MemberModel->getLastQuery()->getQuery();

        // $pager = service('pager');
        // $data['pager'] = $pager->makeLinks($page, $perPage, $total);


        $session = session();
        $ci = $session->get('ci');
        $MemberModel = new MemberModel();
        $query = "SELECT * FROM members WHERE ci='" . $ci . "'";

        $adminVerify = $MemberModel->query($query)->getResultArray();
        if ($adminVerify) {
            $adminId = $adminVerify[0]['email'];
            if ($adminId === 'admin' || $adminId === 'develop') {
                return view('admin/ad_payment_list', $data);
            } else {
                return redirect()->to("/");
            }
        }
    }

    public function memberPaymentCheck()
    {
        $tempGrade = $this->request->getPost('tempGrade');
        $idx = $this->request->getPost('idx');

        $MemberModel = new MemberModel();

        $query = "UPDATE members SET grade='" . $tempGrade . "' WHERE idx='" . $idx . "'";
        $updated = $MemberModel->query($query);

        if ($updated) {
            return $this->response->setJSON(['success' => true, 'msg' => '승인 되었습니다.']);
        } else {
            return $this->response->setJSON(['error' => true, 'msg' => '승인 실패.']);
        }
    }

    /*회원 신고*/
    public function reportEidt(): string
    {
        return view('admin/ad_privacy_edit');
    }

    public function reportList()
    {
        $ReportMemberModel = new ReportMemberModel();

        $data['reports'] = $ReportMemberModel->orderBy('created_at', 'DESC')->findAll();

        $session = session();
        $ci = $session->get('ci');
        $MemberModel = new MemberModel();
        $query = "SELECT * FROM members WHERE ci='" . $ci . "'";

        $adminVerify = $MemberModel->query($query)->getResultArray();
        if ($adminVerify) {
            $adminId = $adminVerify[0]['email'];
            if ($adminId === 'admin' || $adminId === 'develop') {
                return view('admin/ad_report_member_list', $data);
            } else {
                return redirect()->to("/");
            }
        }
    }

    public function reportView($idx)
    {
        $ReportMemberModel = new ReportMemberModel();
        $data['report'] = $ReportMemberModel->find($idx);

        return view('admin/ad_report_view', $data);
    }

    public function reportDelete()
    {
        $reportId = $this->request->getPost('reportId');

        $ReportMemberModel = new ReportMemberModel();
        $deleted = $ReportMemberModel->delete($reportId);

        if ($deleted) {
            return $this->response->setJSON(['success' => true]);
        } else {
            return $this->response->setJSON(['success' => false]);
        }
    }
    /*회사소개 - media */
    public function newsEdit(): string
    {
        return view('admin/ad_news_edit');
    }

    public function newsList()
    {
        $BoardModel = new BoardModel();
        $BoardModel->setTableName('wh_board_news');

        $data['newss'] = $BoardModel->orderBy('created_at', 'DESC')->findAll();

        $session = session();
        $ci = $session->get('ci');
        $MemberModel = new MemberModel();
        $query = "SELECT * FROM members WHERE ci='" . $ci . "'";

        $adminVerify = $MemberModel->query($query)->getResultArray();
        if ($adminVerify) {
            $adminId = $adminVerify[0]['email'];
            if ($adminId === 'admin' || $adminId === 'develop') {
                return view('admin/ad_news_list', $data);
            } else {
                return redirect()->to("/");
            }
        }
    }

    public function newsUpload()
    {
        $title = $this->request->getPost('title');
        $content = $this->request->getPost('content');
        $type = $this->request->getPost('bigo1');
        $link = $this->request->getPost('bigo2');

        $BoardModel = new BoardModel();
        $BoardModel->setTableName('wh_board_news');

        if ($type == '01') {
            $content = '';
        } else {
            $link = '';
        }

        $data = [
            'title' => $title,
            'content' => $content,
            'bigo1' => $type,
            'bigo2' => $link,
            'author' => 'admin',
            'board_type' => 'news',
            'used' => 1
        ];

        $inserted = $BoardModel->insert($data);

        if ($inserted) {
            $insertedId = $BoardModel->insertID();
            return redirect()->to("/ad/intro/newsView/{$insertedId}")->with('msg', '등록이 완료되었습니다.');
        } else {
            return redirect()->to('/ad/intro/newsEdit')->with('msg', '입력을 처리하는 도중 오류가 발생했습니다.');
        }
    }

    public function newsView($id)
    {
        $BoardModel = new BoardModel();
        $BoardModel->setTableName('wh_board_news');
        $data['news'] = $BoardModel->find($id);

        return view('admin/ad_news_view', $data);
    }

    public function newsModify($id)
    {
        $BoardModel = new BoardModel();
        $BoardModel->setTableName('wh_board_news');
        $data['news'] = $BoardModel->find($id);


        if ($data['news'] === null) {
            return redirect()->to('/ad/intro/newsList')->with('msg', '해당 데이터를 찾을 수 없습니다.');
        }

        return view('admin/ad_news_modify', $data);
    }

    public function newsUpdate()
    {
        $id = $this->request->getPost('news_id');
        $title = $this->request->getPost('title');
        $content = $this->request->getPost('content');
        $type = $this->request->getPost('bigo1');
        $link = $this->request->getPost('bigo2');

        if (!$id || !is_numeric($id)) {
            return redirect()->to('/ad/intro/newsList')->with('msg', '잘못된 요청입니다.');
        }

        $BoardModel = new BoardModel();
        $BoardModel->setTableName('wh_board_news');

        if ($type == '01') {
            $content = '';
        } else {
            $link = '';
        }

        $updated = $BoardModel->update($id, [
            'title' => $title,
            'content' => $content,
            'bigo1' => $type,
            'bigo2' => $link,
            'updated_at' => 'admin'
        ]);

        if ($updated) {
            return redirect()->to("/ad/intro/newsView/{$id}")->with('msg', '수정이 완료되었습니다.');
        } else {
            return redirect()->to("/ad/intro/newsEdit/{$id}")->with('msg', '입력을 처리하는 도중 오류가 발생했습니다.');
        }
    }

    /*서포터즈 공지사항*/
    public function spNoticeEdit(): string
    {
        return view('admin/ad_sp_notice_edit');
    }

    public function spNoticeList(): string
    {
        $fileData = new BoardFileModel();
        $query = $fileData->select(
            'bo.id AS notice_id,
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
                    bf.board_type AS board_type,
                    bf.file_name AS file_name,
                    bf.file_path AS file_path,
                    bf.org_name AS org_name'
        )
            ->from('wh_support_board_notice bo')
            ->join('wh_board_files bf', 'bo.id = bf.board_idx', 'left')
            ->groupBy('bo.id, bf.id')
            ->orderBy('bo.id', 'DESC')
            ->get();

        $data['datas'] = $query->getResultArray();

        return view('admin/ad_sp_notice_list', $data);
    }

    public function spNoticeUpload()
    {
        $title = $this->request->getPost('title');
        $content = $this->request->getPost('content');
        $file = $this->request->getFile('userfile');

        if ($file->isValid()) {
            $upload = new Upload();
            $fileData = $upload->Boardupload($file, 'wh_support_board_notice', 'notice', $title, $content);

            if ($fileData) {
                return redirect()->to("/ad/support/noticeList")->with('msg', '등록이 완료되었습니다.');
            } else {
                return redirect()->to("/ad/support/noticeList")->with('msg', '등록이 실패 되었습니다.');
            }
        } else {

            $BoardModel = new BoardModel();
            $BoardModel->setTableName('wh_support_board_notice');
            $data = [
                'title' => $title,
                'content' => $content,
                'author' => 'admin',
                'board_type' => 'spnotice',
                'used' => 1
            ];

            $inserted = $BoardModel->insert($data);

            if ($inserted) {
                $insertedId = $BoardModel->insertID();
                return redirect()->to("/ad/support/noticeView/{$insertedId}")->with('msg', '등록이 완료되었습니다.');
            } else {
                return redirect()->to('/ad/support/noticeEdit')->with('msg', '입력을 처리하는 도중 오류가 발생했습니다.');
            }
        }
    }

    public function spNoticeView($id)
    {
        $BoardModel = new BoardModel();
        $BoardModel->setTableName('wh_support_board_notice');
        $data['notice'] = $BoardModel->find($id);

        $fileData = new BoardFileModel();
        $data['file'] = $fileData->where('board_idx', $id)->first();
        // echo $fileData->getLastQuery();
        return view('admin/ad_sp_notice_view', $data);
    }

    public function spNoticeModify($id)
    {
        $BoardModel = new BoardModel();
        $BoardModel->setTableName('wh_support_board_notice');
        $data['notice'] = $BoardModel->find($id);

        $fileData = new BoardFileModel();
        $data['file'] = $fileData->where('board_idx', $id)->first();

        if ($data['notice'] === null) {
            return redirect()->to('/ad/notice/noticeList')->with('msg', '해당 데이터를 찾을 수 없습니다.');
        }
        return view('admin/ad_sp_notice_modify', $data);
    }

    public function spNoticeUpdate()
    {
        $boardId = $this->request->getPost('notice_id');
        $fileId = $this->request->getPost('file_id');
        $boardType = $this->request->getPost('board_type');
        $title = $this->request->getPost('title');
        $content = $this->request->getPost('content');
        $newFile = $this->request->getFile('userfile');

        if ($newFile->isValid()) {
            $upload = new Upload();
            if ($fileId) { //있던 파일 수정
                $fileType = 'udtFile';
            } else if (!$fileId) { //없던 파일 등록
                $fileType = 'newFile';
            }

            $fileData = $upload->BoardUpdate($newFile, 'wh_support_board_notice', $boardType, $title, $content, $boardId, $fileId, $fileType);

            if ($fileData) {
                return redirect()->to("/ad/support/noticeList")->with('msg', '등록이 완료되었습니다.');
            } else {
                return redirect()->to("/ad/support/noticeList")->with('msg', '등록이 실패 되었습니다.');
            }
        } else {
            $BoardModel = new BoardModel();
            $BoardModel->setTableName('wh_support_board_notice');

            $updated = $BoardModel->update($boardId, [
                'title' => $title,
                'content' => $content,
                'updated_at' => 'admin'
            ]);

            if ($updated) {
                return redirect()->to("/ad/support/noticeView/{$boardId}")->with('msg', '수정이 완료되었습니다.');
            } else {
                return redirect()->to("/ad/support/noticeEdit/{$boardId}")->with('msg', '입력을 처리하는 도중 오류가 발생했습니다.');
            }
        }
    }

    public function spNoticeDelete()
    {
        $BoardId = $this->request->getPost('BoardId');
        $fileId = $this->request->getPost('fileId');

        $BoardModel = new BoardModel();
        $BoardModel->setTableName('wh_support_board_notice');
        $deleted = $BoardModel->delete($BoardId);

        if ($fileId) {
            $BoardFileModel = new BoardFileModel();
            $BoardFileModel->delete($fileId);
        }

        if ($deleted) {
            return $this->response->setJSON(['success' => true]);
        } else {
            return $this->response->setJSON(['success' => false]);
        }
    }

    public function spfileDelete()
    {
        $fileId = $this->request->getPost('fileId');

        $BoardFileModel = new BoardFileModel();

        $deleted = $BoardFileModel->delete($fileId);

        if ($deleted) {
            return $this->response->setJSON(['success' => true]);
        } else {
            return $this->response->setJSON(['success' => false]);
        }
    }

    /*서포터즈 faq */
    public function spFaqEdit(): string
    {
        return view('admin/ad_sp_faq_edit');
    }

    public function spFaqUpload()
    {
        $title = $this->request->getPost('title');
        $content = $this->request->getPost('content');

        $BoardModel = new BoardModel();
        $BoardModel->setTableName('wh_support_board_faq');
        $data = [
            'title' => $title,
            'content' => $content,
            'board_type' => 'spfaq',
            'author' => 'admin',

        ];

        $inserted = $BoardModel->insert($data);

        if ($inserted) {
            return redirect()->to('/ad/support/faqList')->with('msg', '등록이 완료 되었습니다.');
        } else {
            return redirect()->to('/ad/support/faqEdit')->with('msg', '입력을 처리하는 도중 오류가 발생했습니다.');
        }
    }

    public function spFaqList()
    {
        $BoardModel = new BoardModel();
        $BoardModel->setTableName('wh_support_board_faq');

        $data['faqs'] = $BoardModel->orderBy('created_at', 'DESC')->findAll();

        return view('admin/ad_sp_faq_list', $data);
    }

    public function spFaqModify($id)
    {
        $BoardModel = new BoardModel();
        $BoardModel->setTableName('wh_support_board_faq');
        $data['faq'] = $BoardModel->find($id);


        if ($data['faq'] === null) {
            return redirect()->to('/ad/spport/faqList')->with('msg', '해당 데이터를 찾을 수 없습니다.');
        }

        return view('admin/ad_sp_faq_modify', $data);
    }

    public function spFaqUpdate()
    {
        $id = $this->request->getPost('faq_id');
        $title = $this->request->getPost('title');
        $content = $this->request->getPost('content');

        if (!$id || !is_numeric($id)) {
            return redirect()->to('/ad/support/faqList')->with('msg', '잘못된 요청입니다.');
        }

        $BoardModel = new BoardModel();
        $BoardModel->setTableName('wh_support_board_faq');

        $updated = $BoardModel->update($id, [
            'title' => $title,
            'content' => $content,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_at' => 'admin'
        ]);

        if ($updated) {
            return redirect()->to('/ad/support/faqList')->with('msg', 'FAQ가 업데이트 되었습니다.');
        } else {
            return redirect()->back()->withInput()->with('msg', 'FAQ 업데이트에 실패했습니다.');
        }
    }

    public function spFaqView($id)
    {
        $BoardModel = new BoardModel();
        $BoardModel->setTableName('wh_support_board_faq');
        $data['faq'] = $BoardModel->find($id);

        return view('admin/ad_sp_faq_view', $data);
    }

    /*서포터즈 리워드 내역확인*/
    public function rewordList($page = null)
    {

        if ($page === null || !is_numeric($page)) {
            $page = 1;
        } else {
            $page = 2;
        }

        $perPage = 20;
        $MemberModel = new MemberModel();

        $total = $MemberModel->query("SELECT COUNT(*) as total FROM wh_support_reward")->getRow()->total;

        $offset = ($page - 1) * $perPage;
        $query = "SELECT
                    wsr.idx,
                    m.name,
                    m.nickname,
                    wsr.ci,
                    wsr.reward_type,
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
                ORDER BY wsr.idx desc, wsr.check ASC
                LIMIT $perPage OFFSET $offset";

        $data['datas'] = $MemberModel->query($query)->getResultArray();
        $data['query'] = $MemberModel->getLastQuery()->getQuery();

        $pager = service('pager');
        $data['pager'] = $pager->makeLinks($page, $perPage, $total);

        return view('admin/ad_reword_list', $data);
    }

    public function rewordChkApprove()
    {
        $level = $this->request->getPost('level');
        $idx = $this->request->getPost('id');

        $SupportRewardModel = new SupportRewardModel();

        $updated = $SupportRewardModel
            ->where('idx', $idx)
            ->set(['check' => $level])
            ->update();

        if ($updated) {
            if ($level == '1') {
                return $this->response->setJSON(['success' => true, 'msg' => '지급 확인 되었습니다.']);
            } else if ($level == '2') {
                return $this->response->setJSON(['success' => true, 'msg' => '지급 불가 되었습니다.']);
            } else if ($level == '0') {
                return $this->response->setJSON(['success' => true, 'msg' => '확인 처리 되었습니다.']);
            }
        } else {
            return $this->response->setJSON(['error' => true, 'msg' => '승인 실패.']);
        }
    }
    public function resetImg()
    {
        $session = session();
        $ci = $session->get('ci');
        $MemberModel = new MemberModel();
        $query = "SELECT email FROM members WHERE ci='" . $ci . "'";

        $adminYn = $MemberModel->query($query)->getResultArray();

        if ($adminYn[0]['email'] === 'admin' || $adminYn[0]['email'] === 'develop') {
            $postCi = $this->request->getPost('ci');
            $query = "UPDATE member_files SET file_path='static/images/', file_name='profile_noimg.png', org_name='profile_noimg.png' WHERE member_ci='" . $postCi . "' AND board_type='main_photo' AND delete_yn='n' ";
            $MemberModel->query($query);
            if ($MemberModel) {
                return $this->response->setJSON(['success' => true, 'msg' => '해당 회원의 프로필 사진이 초기화 되었습니다.']);
            } else {
                return $this->response->setJSON(['success' => true, 'msg' => '초기화 실패, 데이터베이스 확인필요']);
            }
        } else {
            // 관리자 아닐 때
            return $this->response->setJSON(['error' => true, 'msg' => '권한이 없습니다.']);
        }
    }
}
