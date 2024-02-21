<?php

namespace App\Controllers;

class MoHome extends BaseController
{
    public function index(): string
    {
        return view('mo_index');
    }
}
