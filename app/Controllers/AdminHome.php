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


class AdminHome extends BaseController
{
    /*관리자 header*/
    public function header(): string
    {
        return view('admin/header');
    }

    /*공지사항*/
    public function noticeEdit(): string
    {
        return view('admin/ad_notice_edit');
    }

    public function noticeList() :string{
        $fileData = new BoardFileModel();
        $query = $fileData->
            select('bo.id AS notice_id,
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
            ->groupBy('bo.id')
            ->orderBy('bo.id', 'DESC')
            ->get();

        $data['datas'] = $query->getResultArray(); 
        
        return view('admin/ad_notice_list', $data);
    }

    public function noticeUpload()
    {
        $title = $this->request->getPost('title');
        $content = $this->request->getPost('content');
        $file = $this->request->getFile('userfile');
   
        if ($file->isValid()) {
            $upload= new Upload();
            $fileData = $upload->Boardupload($file,'wh_board_notice','notice',$title,$content);
            
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

    public function noticeView($id){
        $BoardModel = new BoardModel();
        $BoardModel->setTableName('wh_board_notice');
        $data['notice'] = $BoardModel->find($id);

        $fileData = new BoardFileModel();
        $data['file'] = $fileData->where('board_idx', $id)->first();
        // echo $fileData->getLastQuery();
        return view('admin/ad_notice_view', $data);
    }

    public function noticeModify($id){
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

    public function noticeUpdate(){
        $boardId = $this->request->getPost('notice_id');
        $fileId = $this->request->getPost('file_id');
        $boardType = $this->request->getPost('board_type');
        $title = $this->request->getPost('title');
        $content = $this->request->getPost('content');
        $newFile = $this->request->getFile('userfile');
        
        if ($newFile->isValid()) {
            $upload= new Upload();
            if($fileId){//있던 파일 수정
                $fileType = 'udtFile';
            }else if(!$fileId){//없던 파일 등록
                $fileType = 'newFile';
            }
            
            $fileData = $upload->BoardUpdate($newFile,'wh_board_notice',$boardType,$title,$content,$boardId,$fileId,$fileType);
            
            if ($fileData) {
                return redirect()->to("/ad/notice/noticeList")->with('msg', '등록이 완료되었습니다.');    
            } else {
                return redirect()->to("/ad/notice/noticeList")->with('msg', '등록이 실패 되었습니다.');
            }
        }else{
            $BoardModel = new BoardModel();
            $BoardModel->setTableName('wh_board_notice');

            $updated = $BoardModel->update($boardId, [
                'title' => $title,
                'content' => $content,
                'updated_at'=>'admin'
            ]);

            if ($updated) {
                return redirect()->to("/ad/notice/noticeView/{$boardId}")->with('msg', '수정이 완료되었습니다.');
            } else {
                return redirect()->to("/ad/notice/noticeEdit/{$boardId}")->with('msg', '입력을 처리하는 도중 오류가 발생했습니다.');
            }
            
        }
    }

    public function noticeDelete(){
        $BoardId = $this->request->getPost('BoardId');
        $fileId = $this->request->getPost('fileId');

        $BoardModel = new BoardModel();
        $BoardModel->setTableName('wh_board_notice');
        $deleted = $BoardModel->delete($BoardId);   

        if($fileId){
            $BoardFileModel = new BoardFileModel();
            $BoardFileModel->delete($fileId);
        }

        if ($deleted) {
            return $this->response->setJSON(['success' => true]);
        } else {
            return $this->response->setJSON(['success' => false]);
        }
    }

    public function fileDelete(){
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

    public function privacyList(){
        $BoardModel = new BoardModel();
        $BoardModel->setTableName('wh_board_privacy');

        $data['privacys'] = $BoardModel->orderBy('created_at', 'DESC')->findAll();

        return view('admin/ad_privacy_list',$data);
    }
    
    public function privacyMenuSelect(){
        
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

    public function privacyUpload(){
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

    public function privacyView($id){
        $BoardModel = new BoardModel();
        $BoardModel->setTableName('wh_board_privacy');
        $data['privacy'] = $BoardModel->find($id);

        return view('admin/ad_privacy_view', $data);
    }

    public function privacyModify($id){
        $BoardModel = new BoardModel();
        $BoardModel->setTableName('wh_board_privacy');
        $data['privacy'] = $BoardModel->find($id); 

        
        if ($data['privacy'] === null) {
            return redirect()->to('/ad/privacy/privacyList')->with('msg', '해당 데이터를 찾을 수 없습니다.');
        }

        return view('admin/ad_privacy_modify', $data);
    }

    public function privacyUpdate(){
        $id = $this->request->getPost('privacy_id');
        $title = $this->request->getPost('title');
        $content = $this->request->getPost('content');

        $BoardModel = new BoardModel();
        $BoardModel->setTableName('wh_board_privacy');

        $updated = $BoardModel->update($id, [
            'title' => $title,
            'content' => $content,
            'updated_at'=>'admin'
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
    
    public function termsList(){
        $BoardModel = new BoardModel();
        $BoardModel->setTableName('wh_board_terms');

        $data['termss'] = $BoardModel->orderBy('created_at', 'DESC')->findAll();

        return view('admin/ad_terms_list',$data);
    }
    
    public function termsMenuSelect(){
        
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

    public function termsUpload(){
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

    public function termsView($id){
        $BoardModel = new BoardModel();
        $BoardModel->setTableName('wh_board_terms');
        $data['terms'] = $BoardModel->find($id); 

        return view('admin/ad_terms_view', $data);
    }

    public function termsModify($id){
        $BoardModel = new BoardModel();
        $BoardModel->setTableName('wh_board_terms');
        $data['terms'] = $BoardModel->find($id); 

        
        if ($data['terms'] === null) {
            return redirect()->to('/ad/terms/termsList')->with('msg', '해당 데이터를 찾을 수 없습니다.');
        }

        return view('admin/ad_terms_modify', $data);
    }

    public function termsUpdate(){
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
            'updated_at'=>'admin'
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

        }else{
            return redirect()->to('/ad/faq/faqEdit')->with('msg', '입력을 처리하는 도중 오류가 발생했습니다.');
        }
    }

    public function faqList(){
        $BoardModel = new BoardModel();
        $BoardModel->setTableName('wh_board_faq');

        $data['faqs'] = $BoardModel->orderBy('created_at', 'DESC')->findAll();

        return view('admin/ad_faq_list',$data);
    }

    public function faqModify($id){
        $BoardModel = new BoardModel();
        $BoardModel->setTableName('wh_board_faq');
        $data['faq'] = $BoardModel->find($id); 

        
        if ($data['faq'] === null) {
            return redirect()->to('/ad/faq/faqList')->with('msg', '해당 데이터를 찾을 수 없습니다.');
        }

        return view('admin/ad_faq_modify', $data);
    }

    public function faqUpdate(){
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
            'updated_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>'admin'
        ]);
    
        if ($updated) {
            return redirect()->to('/ad/faq/faqList')->with('msg', 'FAQ가 업데이트 되었습니다.');
        } else {
            return redirect()->back()->withInput()->with('msg', 'FAQ 업데이트에 실패했습니다.');
        }
    }

    public function faqView($id){
        $BoardModel = new BoardModel();
        $BoardModel->setTableName('wh_board_faq');
        $data['faq'] = $BoardModel->find($id); 

        return view('admin/ad_faq_view', $data);
    }

    public function boardDelete(){
        $id = $this->request->getPost('id');
        $board_name = $this->request->getPost('boardName');
        
        $BoardModel = new BoardModel();
        if($board_name == 'faq'){
            $BoardModel->setTableName('wh_board_faq');
        }else if($board_name=='privacy'){
            $BoardModel->setTableName('wh_board_privacy');
        }else if($board_name=='terms'){
            $BoardModel->setTableName('wh_board_terms');
        }

        $deleted = $BoardModel->delete($id);

        if ($deleted) {
            if($board_name == 'faq'){
                return redirect()->to('/ad/faq/faqList')->with('msg', '삭제되었습니다.');
            }else if($board_name=='privacy'){
                return redirect()->to('/ad/privacy/privacyList')->with('msg', '삭제되었습니다.');
            }else if($board_name=='terms'){
                return redirect()->to('/ad/terms/termsList')->with('msg', '삭제되었습니다.');
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

        return view('admin/ad_exchange_list', $data);
    }

    public function exchangeCheck(){
        $exchange_level = $this->request->getPost('exchange_level');
        $idx = $this->request->getPost('idx');

        $exchangePoint = new PointExchangeModel();

        $updated = $exchangePoint->update($idx, [
            'exchange_type' => 'E',
            'exchange_level' => $exchange_level,
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
    
        if ($updated) {
            if($exchange_level =='1'){
                return $this->response->setJSON(['success' => true, 'msg' => '환전 승인 되었습니다.']);
            }else if($exchange_level =='2'){
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

        return view('admin/ad_alliance_list', $data);
    }
    
    public function allianceCheck(){
        $level = $this->request->getPost('level');
        $idx = $this->request->getPost('idx');
    
        $AllianceModel = new AllianceModel();

        $updated = $AllianceModel->update($idx, [
            'alliance_application' => $level,
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
    
        if ($updated) {
            if($level =='2'){
                return $this->response->setJSON(['success' => true, 'msg' => '제휴 승인 되었습니다.']);
            }
        } else {
            return $this->response->setJSON(['error' => true, 'msg' => '제휴승인 실패 되었습니다.']);
        }
    
    }

    public function memberApproveList($page = null){

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

        return view('admin/ad_member_list', $data);
    }

    public function memberCertificateCheck(){
        $level = $this->request->getPost('level');
        $id = $this->request->getPost('id');
    
        $MemberFileModel = new MemberFileModel();

        $updated = $MemberFileModel
            ->where('id', $id)
            ->update(null, ['extra1' => $level]);
    
        if ($updated) {
            if($level =='y'){
                return $this->response->setJSON(['success' => true, 'msg' => '승인 되었습니다.']);
            }
        } else {
            return $this->response->setJSON(['error' => true, 'msg' => '승인 실패.']);
        }
    
    }

}
