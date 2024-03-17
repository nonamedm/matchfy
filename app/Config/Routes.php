<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/publish', 'Home::list');
$routes->get('/index/login', 'Home::indexLogin');
$routes->get('/mo', 'MoHome::index');
$routes->get('/mo/pass', 'MoHome::pass');
$routes->post('/mo/agree', 'MoHome::agree');
$routes->post('/mo/signin', 'MoHome::signin');
$routes->post('/mo/signinPhoto', 'MoHome::signinPhoto');
$routes->post('/mo/signinType', 'MoHome::signinType');
$routes->get('/mo/signinSuccess', 'MoHome::signinSuccess');
$routes->post('/mo/signinRegular', 'MoHome::signinRegular');
$routes->post('/mo/signinPremium', 'MoHome::signinPremium');
$routes->get('/mo/signinPopup', 'MoHome::signinPopup');
$routes->get('/mo/menu', 'MoHome::menu');
$routes->get('/mo/notice', 'MoHome::notice');
$routes->get('/mo/notice/view/(:num)', 'MoHome::noticeView/$1');
$routes->get('/mo/faq', 'MoHome::faq');
$routes->get('/mo/terms', 'MoHome::terms');
$routes->get('/mo/privacy', 'MoHome::privacy');
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
$routes->get('/mo/mypage/wallet/success', 'MoHome::mypageSeccess');
$routes->post('/mo/mypage/mypageAddPoint/(:num)/(:num)', 'MoHome::mypageAddPoint/$1/$2');
$routes->get('/mo/mypage/getPoint', 'MoHome::mypageGetPoint');
$routes->post('/mo/mypage/selectPoint', 'MoHome::mypageSelectPoint');
//포인트사용시
$routes->post('/mo/usePoint', 'MoHome::usePoint');
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
$routes->get('/mo/alliance/detail2', 'MoHome::allianceDetail2');
$routes->get('/mo/alliance/payment', 'MoHome::alliancePayment');
$routes->get('/mo/alliance/schedule', 'MoHome::allianceSchedule');
$routes->get('/mo/alliance/reservePopup', 'MoHome::allianceReservePopup');
$routes->get('/mo/alliance/apply', 'MoHome::allianceApply');
$routes->get('/mo/alliance/exchange', 'MoHome::allianceExchange');
$routes->get('/mo/partner', 'MoHome::partner');
$routes->get('/mo/partner/regular', 'MoHome::partnerRegular');
$routes->get('/mo/partner/premium', 'MoHome::partnerPremium');


// file upload
$routes->post('/upload', 'Upload::upload');

// ajax
$routes->post('/ajax/signUp', 'MoAjax::signUp');
$routes->post('/ajax/signUpdate', 'MoAjax::signUpdate');
$routes->post('/ajax/login', 'MoAjax::login');
$routes->post('/ajax/logout', 'MoAjax::logout');
$routes->post('/ajax/mbrFileRegUp', 'MoAjax::mbrFileRegUp');
$routes->post('/ajax/searchUniversity', 'MoAjax::searchUniversity');
$routes->post('/ajax/updtUserData', 'MoAjax::updtUserData');

/*관리자페이지*/
$routes->get('/downloadFile/(:num)', 'download::downloadFile/$1');
$routes->post('/ad/BoardDelete', 'AdminHome::boardDelete');

$routes->get('/ad/header', 'AdminHome::header');
$routes->get('/ad/faq/faqEdit', 'AdminHome::faqEdit');
$routes->post('/ad/faq/faqUpload', 'AdminHome::faqUpload');
$routes->get('/ad/faq/faqList', 'AdminHome::faqList');
$routes->get('/ad/faq/faqView/(:num)', 'AdminHome::faqView/$1');
$routes->get('/ad/faq/faqModify/(:num)', 'AdminHome::faqModify/$1');
$routes->post('/ad/faq/faqUpdate', 'AdminHome::faqUpdate');


$routes->get('/ad/terms/termsMenuSelect', 'AdminHome::termsMenuSelect');
$routes->get('/ad/terms/termsEdit', 'AdminHome::termsEdit');
$routes->post('/ad/terms/termsUpload', 'AdminHome::termsUpload');
$routes->get('/ad/terms/termsList', 'AdminHome::termsList');
$routes->get('/ad/terms/termsView/(:num)', 'AdminHome::termsView/$1');
$routes->get('/ad/terms/termsModify/(:num)', 'AdminHome::termsModify/$1');
$routes->post('/ad/terms/termsUpdate', 'AdminHome::termsUpdate');


$routes->get('/ad/privacy/privacyMenuSelect', 'AdminHome::privacyMenuSelect');
$routes->get('/ad/privacy/privacyEdit', 'AdminHome::privacyEdit');
$routes->post('/ad/privacy/privacyUpload', 'AdminHome::privacyUpload');
$routes->get('/ad/privacy/privacyList', 'AdminHome::privacyList');
$routes->get('/ad/privacy/privacyView/(:num)', 'AdminHome::privacyView/$1');
$routes->get('/ad/privacy/privacyModify/(:num)', 'AdminHome::privacyModify/$1');
$routes->post('/ad/privacy/privacyUpdate', 'AdminHome::privacyUpdate');


$routes->get('/ad/notice/noticeMenuSelect', 'AdminHome::noticeMenuSelect');
$routes->get('/ad/notice/noticeEdit', 'AdminHome::noticeEdit');
$routes->post('/ad/notice/noticeUpload', 'AdminHome::noticeUpload');
$routes->get('/ad/notice/noticeList', 'AdminHome::noticeList');
$routes->get('/ad/notice/noticeView/(:num)', 'AdminHome::noticeView/$1');
$routes->get('/ad/notice/noticeModify/(:num)', 'AdminHome::noticeModify/$1');
$routes->post('/ad/notice/noticeUpdate', 'AdminHome::noticeUpdate');
$routes->post('/ad/notice/noticeDelete', 'AdminHome::noticeDelete');
$routes->post('/ad/FileDelete', 'AdminHome::fileDelete');

