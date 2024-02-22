<?php

namespace App\Controllers;

class MoHome extends BaseController
{
    public function index(): string
    {
        return view('mo_index');
    }
    public function pass(): string
    {
        return view('mo_pass');
    }
    public function agree(): string
    {
        return view('mo_agree');
    }
    public function signin(): string
    {
        return view('mo_signin');
    }
}
