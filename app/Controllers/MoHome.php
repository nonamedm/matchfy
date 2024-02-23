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
    public function signinType(): string
    {
        return view('mo_signin_type');
    }
    public function signinSuccess(): string
    {
        return view('mo_signin_success');
    }
    public function signinRegular(): string
    {
        return view('mo_signin_regular');
    }
    public function signinPremium(): string
    {
        return view('mo_signin_premium');
    }
    public function signinPopup(): string
    {
        return view('mo_signin_popup');
    }
    public function menu(): string
    {
        return view('mo_menu');
    }
    public function notice(): string
    {
        return view('mo_notice');
    }
    public function noticeView(): string
    {
        return view('mo_notice_view');
    }
    public function faq(): string
    {
        return view('mo_faq');
    }
    public function terms(): string
    {
        return view('mo_terms');
    }
}
