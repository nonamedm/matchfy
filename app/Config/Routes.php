<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::list');
$routes->get('/index', 'Home::index');
$routes->get('/mo', 'MoHome::index');
$routes->get('/mo/pass', 'MoHome::pass');
$routes->get('/mo/agree', 'MoHome::agree');
$routes->get('/mo/signin', 'MoHome::signin');
$routes->get('/mo/signinType', 'MoHome::signinType');
$routes->get('/mo/signinSuccess', 'MoHome::signinSuccess');
$routes->get('/mo/signinRegular', 'MoHome::signinRegular');
$routes->get('/mo/signinPremium', 'MoHome::signinPremium');
$routes->get('/mo/signinPopup', 'MoHome::signinPopup');
$routes->get('/mo/menu', 'MoHome::menu');
$routes->get('/mo/notice', 'MoHome::notice');
$routes->get('/mo/notice/view', 'MoHome::noticeView');
$routes->get('/mo/faq', 'MoHome::faq');
$routes->get('/mo/terms', 'MoHome::terms');
$routes->get('/mo/mypage', 'MoHome::mypage');
$routes->get('/mo/mymsg/ai', 'MoHome::mymsgAi');
$routes->get('/mo/mymsg', 'MoHome::mymsg');
$routes->get('/mo/mymsg/list', 'MoHome::mymsgList');
$routes->get('/mo/mymsg/menu', 'MoHome::mymsgMenu');
$routes->get('/mo/mymsg/ai/profilePopup', 'MoHome::mymsgAiProfilePopup');
$routes->get('/mo/mymsg/match/reviewPopup', 'MoHome::mymsgMatchReviewPopup');
$routes->get('/mo/mymsg/memberPopup', 'MoHome::mymsgMemberPopup');
$routes->get('/mo/reportPopup', 'MoHome::reportPopup');
$routes->get('/mo/schedulePopup', 'MoHome::schedulePopup');
$routes->get('/mo/schDepositPopup', 'MoHome::schDepositPopup');
$routes->get('/mo/invite', 'MoHome::invite');
$routes->get('/mo/invitePopup', 'MoHome::invitePopup');
$routes->get('/mo/mypage/wallet', 'MoHome::mypageWallet');
$routes->get('/mo/mypage/wallet2', 'MoHome::mypageWallet2');
$routes->get('/mo/mypage/wallet/charge', 'MoHome::mypageWalletCharge');
$routes->get('/mo/mypage/group/list', 'MoHome::mypageGroupList');
$routes->get('/mo/mypage/group/searchList', 'MoHome::mypageGroupSearchList');
$routes->get('/mo/mypage/group/detail', 'MoHome::mypageGroupDetail');
$routes->get('/mo/mypage/group/partcntPopup', 'MoHome::mypageGroupPartcntPopup');
$routes->get('/mo/mypage/group/applyPopup', 'MoHome::mypageGroupApplyPopup');
$routes->get('/mo/mypage/group/create', 'MoHome::mypageGroupCreate');
$routes->get('/mo/mypage/mygroup/list', 'MoHome::mypageMygroupList');
$routes->get('/mo/mypage/mygroup/list/edit', 'MoHome::mypageMygroupListEdit');
$routes->get('/mo/mypage/group/searchPopup', 'MoHome::mypageGroupSearchPopup');
$routes->get('/mo/mymsg/ai/qna', 'MoHome::mymsgAiQna');
$routes->get('/mo/myfeed', 'MoHome::myfeed');
$routes->get('/mo/myfeed/detail', 'MoHome::myfeedDetail');
$routes->get('/mo/myfeed/edit', 'MoHome::myfeedEdit');
$routes->get('/mo/matchFeed', 'MoHome::matchFeed');
$routes->get('/mo/myfeed/view', 'MoHome::myfeedView');
$routes->get('/mo/myfeed/view/profile', 'MoHome::myfeedViewProfile');
$routes->get('/mo/alertPopup', 'MoHome::alertPopup');
$routes->get('/mo/alliance/list', 'MoHome::allianceList');
$routes->get('/mo/alliance/regionPopup', 'MoHome::allianceRegionPopup');
$routes->get('/mo/alliance/detail', 'MoHome::allianceDetail');

