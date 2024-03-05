<?php

namespace App\Controllers;
use App\Models\BoardModel;

class AdminHome extends BaseController
{
    /*관리자 header*/
    public function header(): string
    {
        return view('admin/header');
    }

    /*terms 확인*/
    public function termsEdit(): string
    {
        return view('admin/ad_terms_edit');
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
        $title = $this->request->getPost('question');
        $content = $this->request->getPost('answer');

        $BoardModel = new BoardModel();
        $BoardModel->setTableName('wh_board_terms');
        $data = [
            'title' => $title,
            'content' => $content,
            'author' => 'admin',
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
        $title = $this->request->getPost('question');
        $content = $this->request->getPost('answer');

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
