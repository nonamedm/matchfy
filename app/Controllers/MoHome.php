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
        $data['params'] = '';
        return view('mo_pass', $data);
    }
    public function agree(): string
    {
        $postData = $this->request->getPost();

        // 특정 키의 POST 값만 받아오기
        $mobile_no = $this->request->getPost('mobile_no');
        $name = $this->request->getPost('name');
        $birthday = $this->request->getPost('birthday');

        return view('mo_agree', $postData);
    }
    public function signin(): string
    {
        $postData = $this->request->getPost();
        return view('mo_signin', $postData);
    }
    public function signinType(): string
    {
        $postData = $this->request->getPost();
        return view('mo_signin_type', $postData);
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
    public function mypageWallet(): string
    {
        return view('mo_mypage_wallet');
    }
    public function mypageWallet2(): string
    {
        return view('mo_mypage_wallet2');
    }
    public function mypageWalletCharge(): string
    {
        return view('mo_mypage_wallet_charge');
    }
    public function mypageGroupList(): string
    {
        return view('mo_mypage_group_list');
    }
    public function mypageGroupSearchList(): string
    {
        return view('mo_mypage_group_search_list');
    }
    public function mypageGroupDetail(): string
    {
        return view('mo_mypage_group_detail');
    }
    public function mypageGroupPartcntPopup(): string
    {
        return view('mo_mypage_group_partcnt_popup');
    }
    public function mypageGroupApplyPopup(): string
    {
        return view('mo_mypage_group_apply_popup');
    }
    public function mypageGroupCreate(): string
    {
        return view('mo_mypage_group_create');
    }
    public function mypageMygroupList(): string
    {
        return view('mo_mypage_mygroup_list');
    }
    public function mypageMygroupListEdit(): string
    {
        return view('mo_mypage_mygroup_list_edit');
    }
    public function mypageGroupSearchPopup(): string
    {
        return view('mo_mypage_group_search_popup');
    }
    public function mymsgAiQna(): string
    {
        return view('mo_mymsg_ai_qna');
    }
    public function myfeed(): string
    {
        return view('mo_myfeed');
    }
    public function myfeedDetail(): string
    {
        return view('mo_myfeed_detail');
    }
    public function myfeedEdit(): string
    {
        return view('mo_myfeed_edit');
    }
    public function matchFeed(): string
    {
        return view('mo_match_feed');
    }
    public function myfeedView(): string
    {
        return view('mo_myfeed_view');
    }
    public function myfeedViewProfile(): string
    {
        return view('mo_myfeed_view_profile');
    }
    public function alertPopup(): string
    {
        return view('mo_alert_popup');
    }
    public function allianceList(): string
    {
        return view('mo_alliance_list');
    }
    public function allianceRegionPopup(): string
    {
        return view('mo_alliance_region_popup');
    }
    public function allianceDetail(): string
    {
        return view('mo_alliance_detail');
    }
    public function allianceDetail2(): string
    {
        return view('mo_alliance_detail2');
    }
    public function alliancePayment(): string
    {
        return view('mo_alliance_payment');
    }
    public function allianceSchedule(): string
    {
        return view('mo_alliance_schedule');
    }
    public function allianceReservePopup(): string
    {
        return view('mo_alliance_reserve_popup');
    }
    public function allianceApply(): string
    {
        return view('mo_alliance_apply');
    }
    public function allianceExchange(): string
    {
        return view('mo_alliance_exchange');
    }
    public function partner(): string
    {
        return view('mo_partner');
    }
    public function partnerRegular(): string
    {
        return view('mo_partner_regular');
    }
    public function partnerPremium(): string
    {
        return view('mo_partner_premium');
    }
}
