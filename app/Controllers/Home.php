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
}
