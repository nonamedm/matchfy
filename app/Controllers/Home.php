<?php

namespace App\Controllers;

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
    public function introCompany(): string
    {
        return view('/intro/company');
    }
}
