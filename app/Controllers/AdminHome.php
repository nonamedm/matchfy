<?php

namespace App\Controllers;
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

    public function noticeList(){
        $BoardModel = new BoardModel();
        $BoardModel->setTableName('wh_board_notice');

        $data['notices'] = $BoardModel->orderBy('created_at', 'DESC')->findAll();

        return view('admin/ad_notice_list',$data);
    }

    public function noticeUpload()
    {
        $title = $this->request->getPost('title');
        $content = $this->request->getPost('content');
        $file = $this->request->getFile('userfile');
    
    
        $uploadConfig = [
            'upload_path' => WRITEPATH . 'uploads', // 파일을 저장할 경로
            'allowed_types' => 'gif|jpg|png|pdf|hwp|txt', // 허용되는 파일 유형
            'max_size' => 1024 * 8, // 최대 파일 크기 (8MB)
            'encrypt_name' => true // 파일명 암호화
        ];
        
        $uploadPath = $uploadConfig['upload_path'];
    
        
        if ($file->isValid()) {
            
            $fileName = $file->getRandomName();
            $tempFilePath = $file->getTempName();
            
            if (move_uploaded_file($tempFilePath, $uploadPath . '/' . $fileName)) {
                
                $BoardModel = new BoardModel();
                $BoardModel->setTableName('wh_board_notice');

                $data = [
                    'title' => $title,
                    'content' => $content,
                    'author' => 'admin',
                    'board_type' => 'notice',
                    'used' => 1
                ];
                $boardId = $BoardModel->insert($data);

                if ($boardId) {
                    $insertedData = $BoardModel->where('id', $boardId)->first();
                    $boardType = $insertedData['board_type'];
                    $fileModel = new BoardFileModel();
                    $filePath = $uploadPath . '/' . $fileName;
                    
                    $data = [
                        'file_name' =>  $fileName,
                        'file_path' =>  $filePath,
                        'upload_date' => date('Y-m-d H:i:s'),
                        'board_id' => $boardId,
                        'board_type' => $boardType
                    ];

                    $fileModel->saveFileUpload($data);
                    return redirect()->to("/ad/notice/noticeList")->with('msg', '등록이 완료되었습니다.');
                }
            } else {
                return redirect()->to("/ad/notice/noticeList")->with('msg', '등록이 실패 되었습니다.');
            }
        } else {
            // 업로드된 파일이 유효하지 않은 경우 에러 메시지를 표시합니다.
            return redirect()->to("/ad/notice/noticeList")->with('msg', '에러');
        }
    }

    // public function noticeUpload(){
    //     $title = $this->request->getPost('title');
    //     $content = $this->request->getPost('content');

    //     $BoardModel = new BoardModel();
    //     $BoardModel->setTableName('wh_board_notice');
    //     $data = [
    //         'title' => $title,
    //         'content' => $content,
    //         'author' => 'admin',
    //         'board_type' => 'notice',
    //         'used' => 1
    //     ];

    //     $inserted = $BoardModel->insert($data);

    //     if ($inserted) {
    //         $insertedId = $BoardModel->insertID();
    //         return redirect()->to("/ad/notice/noticeView/{$insertedId}")->with('msg', '등록이 완료되었습니다.');
    //     } else {
    //         return redirect()->to('/ad/notice/noticeEdit')->with('msg', '입력을 처리하는 도중 오류가 발생했습니다.');
    //     }
    // }

    public function noticeView($id){
        $BoardModel = new BoardModel();
        $BoardModel->setTableName('wh_board_notice');
        $data['notice'] = $BoardModel->find($id); // 해당 아이디로 데이터를 조회합니다.

        return view('admin/ad_notice_view', $data);
    }

    public function noticeModify($id){
        $BoardModel = new BoardModel();
        $BoardModel->setTableName('wh_board_notice');
        $data['notice'] = $BoardModel->find($id); // 해당 아이디로 데이터를 조회합니다.

        // 데이터가 없을 경우에 대한 처리
        if ($data['notice'] === null) {
            return redirect()->to('/ad/notice/noticeList')->with('msg', '해당 데이터를 찾을 수 없습니다.');
        }

        return view('admin/ad_notice_modify', $data);
    }

    public function noticeUpdate(){
        $id = $this->request->getPost('notice_id');
        $title = $this->request->getPost('title');
        $content = $this->request->getPost('content');

        $BoardModel = new BoardModel();
        $BoardModel->setTableName('wh_board_notice');

        $updated = $BoardModel->update($id, [
            'title' => $title,
            'content' => $content,
            'updated_at'=>'admin'
        ]);

        if ($updated) {
            // 업데이트가 성공하면 수정된 데이터의 ID를 가져와서 해당 view 페이지로 리다이렉트합니다.
            return redirect()->to("/ad/notice/noticeView/{$id}")->with('msg', '수정이 완료되었습니다.');
        } else {
            return redirect()->to("/ad/notice/noticeEdit/{$id}")->with('msg', '입력을 처리하는 도중 오류가 발생했습니다.');
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
            // 데이터가 존재하는 경우
            $insertedId = $privacy['id'];
            return redirect()->to("/ad/privacy/privacyView/{$insertedId}");
        } else {
            // 데이터가 존재하지 않는 경우
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
        $data['privacy'] = $BoardModel->find($id); // 해당 아이디로 데이터를 조회합니다.

        return view('admin/ad_privacy_view', $data);
    }

    public function privacyModify($id){
        $BoardModel = new BoardModel();
        $BoardModel->setTableName('wh_board_privacy');
        $data['privacy'] = $BoardModel->find($id); // 해당 아이디로 데이터를 조회합니다.

        // 데이터가 없을 경우에 대한 처리
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
            // 업데이트가 성공하면 수정된 데이터의 ID를 가져와서 해당 view 페이지로 리다이렉트합니다.
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
            // 데이터가 존재하는 경우
            $insertedId = $terms['id'];
            return redirect()->to("/ad/terms/termsView/{$insertedId}");
        } else {
            // 데이터가 존재하지 않는 경우
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
        $data['terms'] = $BoardModel->find($id); // 해당 아이디로 데이터를 조회합니다.

        return view('admin/ad_terms_view', $data);
    }

    public function termsModify($id){
        $BoardModel = new BoardModel();
        $BoardModel->setTableName('wh_board_terms');
        $data['terms'] = $BoardModel->find($id); // 해당 아이디로 데이터를 조회합니다.

        // 데이터가 없을 경우에 대한 처리
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
            // 업데이트가 성공하면 수정된 데이터의 ID를 가져와서 해당 view 페이지로 리다이렉트합니다.
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
        $title = $this->request->getPost('question');
        $content = $this->request->getPost('answer');

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
        $data['faq'] = $BoardModel->find($id); // 해당 아이디로 데이터를 조회합니다.

        // 데이터가 없을 경우에 대한 처리
        if ($data['faq'] === null) {
            return redirect()->to('/ad/faq/faqList')->with('msg', '해당 데이터를 찾을 수 없습니다.');
        }

        return view('admin/ad_faq_modify', $data);
    }

    public function faqUpdate(){
        $id = $this->request->getPost('faq_id');
        $title = $this->request->getPost('question');
        $content = $this->request->getPost('answer');
    
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

    public function faqDelete(){
        $id = $this->request->getPost('id');

        $BoardModel = new BoardModel();
        $BoardModel->setTableName('wh_board_faq');
        
        $deleted = $BoardModel->delete($id);

        if ($deleted) {
            return redirect()->back()->withInput()->with('msg', '삭제 되었습니다.');
        } else {
            return redirect()->back()->with('msg', '삭제에 실패하였습니다.');
        }
    }
}
