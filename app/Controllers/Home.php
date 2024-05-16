<?php

namespace App\Controllers;
use App\Models\BoardModel;

class Home extends BaseController
{
    public function list(): string
    {
        return view('list');
    }
    public function index(): string
    {
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

        return view('/intro/media',$data);
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
