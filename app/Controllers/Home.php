<?php

namespace App\Controllers;

use App\Models\BoardModel;

class Home extends BaseController
{
    public function list(): string
    {
        return view('list');
    }
    public function index()
    {
        // 현재 접속한 도메인을 얻습니다.
        $currentDomain = $_SERVER['HTTP_HOST'];

        // 조건에 따라 리다이렉트
        if ($currentDomain == 'cuberry.kr') {
            // 리다이렉트할 URL
            return redirect()->to('http://cuberry.kr/intro/main');
        }

        // 다른 도메인의 경우 다른 페이지로 리다이렉트
        return view('index');
    }
    public function indexLogin(): string
    {
        return view('index_login');
    }
    public function intro(): string
    {
        return view('/intro/main');
    }
    public function company(): string
    {
        return view('/intro/company');
    }
    public function media(): string
    {
        $BoardModel = new BoardModel();
        $BoardModel->setTableName('wh_board_news');

        $data['newss'] = $BoardModel->orderBy('created_at', 'DESC')->findAll();

        return view('/intro/media', $data);
    }
    public function mediaView($id)
    {
        $BoardModel = new BoardModel();
        $BoardModel->setTableName('wh_board_news');
        $data['news'] = $BoardModel->find($id);

        return view('/intro/media_view', $data);
    }
    public function animatedAi(): string
    {
        return view('/intro/animatedai');
    }
}
