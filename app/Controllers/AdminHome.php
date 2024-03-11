<?php

namespace App\Controllers;

use App\Controllers\Upload;
use App\Models\BoardModel;
use App\Models\BoardFileModel;

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

        // 파일이있을경우
        
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

    public function BoardDelete(){
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
}
