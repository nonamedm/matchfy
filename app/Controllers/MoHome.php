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
    public function mypage(): string
    {
        return view('mo_mypage');
    }
    public function mymsg(): string
    {
        return view('mo_mymsg');
    }
    public function mymsgList(): string
    {
        return view('mo_mymsg_list');
    }
    public function mymsgMenu(): string
    {
        return view('mo_mymsg_menu');
    }
    public function mymsgAi(): string
    {
        return view('mo_mymsg_ai');
    }
    public function mymsgAiProfilePopup(): string
    {
        return view('mo_mymsg_ai_profile_popup');
    }
    public function mymsgMatchReviewPopup(): string
    {
        return view('mo_mymsg_match_review_popup');
    }
    public function mymsgMemberPopup(): string
    {
        return view('mo_mymsg_member_popup');
    }
    public function reportPopup(): string
    {
        return view('mo_report_popup');
    }
    public function schedulePopup(): string
    {
        return view('mo_schedule_popup');
    }
    public function schDepositPopup(): string
    {
        return view('mo_sch_deposit_popup');
    }
    public function invite(): string
    {
        return view('mo_invite');
    }
    public function invitePopup(): string
    {
        return view('mo_invite_popup');
    }
}
