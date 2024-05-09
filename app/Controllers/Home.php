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
    public function company(): string
    {
        return view('/intro/company');
    }
    public function media(): string
    {
        return view('/intro/media');
    }
    public function animatedAi(): string
    {
        return view('/intro/animatedai');
    }
}
