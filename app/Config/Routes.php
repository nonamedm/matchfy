<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/intro/main', 'Home::intro');
$routes->get('/intro/company', 'Home::company');
$routes->get('/intro/media', 'Home::media');
$routes->get('/intro/mediaView/(:num)', 'Home::mediaView/$1');
$routes->get('/intro/animatedAi', 'Home::animatedAi');
$routes->get('/publish', 'Home::list');
$routes->get('/index/login', 'Home::indexLogin');
$routes->get('/mo', 'MoHome::index');
$routes->get('/mo/pass', 'MoHome::pass');
$routes->post('/mo/agree', 'MoHome::agree');
$routes->post('/mo/signin', 'MoHome::signin');
$routes->post('/mo/signinPhoto', 'MoHome::signinPhoto');
$routes->post('/mo/signinType', 'MoHome::signinType');
$routes->get('/mo/upgradeGrade', 'MoHome::upgradeGrade');
$routes->get('/mo/signinSuccess', 'MoHome::signinSuccess');
$routes->post('/mo/signinRegular', 'MoHome::signinRegular');
$routes->post('/mo/signinPremium', 'MoHome::signinPremium');
$routes->get('/mo/updateMyinfo', 'MoHome::updateMyinfo');
$routes->get('/mo/updateRegular', 'MoHome::updateRegular');
$routes->get('/mo/updatePremium', 'MoHome::updatePremium');
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
$routes->post('/mo/mymsg', 'MoHome::mymsg');
$routes->get('/mo/mymsgAimsg', 'MoHome::mymsgAimsg');
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

// $routes->get('/mo/mypage/wallet', 'MoHome::mypageWallet');
// $routes->get('/mo/mypage/wallet2', 'MoHome::mypageWallet2');
// $routes->get('/mo/mypage/wallet/charge', 'MoHome::mypageWalletCharge');
// $routes->get('/mo/mypage/wallet/success', 'MoHome::mypageSeccess');
$routes->post('/mo/mypage/mypageAddPoint/(:num)/(:num)', 'MoHome::mypageAddPoint/$1/$2');
$routes->get('/mo/mypage/getPoint', 'MoHome::mypageGetPoint');
$routes->post('/mo/mypage/selectPoint', 'MoHome::mypageSelectPoint');
// $routes->post('/mo/mypage/walletTypeList', 'MoHome::walletTypeList');
//포인트사용시
$routes->post('/mo/applyMember', 'MoHome::applyMember');
$routes->post('/mo/usePointTemp', 'MoHome::usePointTemp');
$routes->get('/mo/mypage/group/list', 'MoHome::mypageGroupList');
$routes->get('/mo/mypage/group/searchList', 'MoHome::mypageGroupSearchList');
$routes->get('/mo/mypage/group/detail/(:num)', 'MoHome::mypageGroupDetail/$1');
$routes->post('/mo/mypage/group/partcntPopup', 'MoHome::mypageGroupPartcntPopup');
$routes->post('/mo/mypage/group/applyPopup', 'MoHome::mypageGroupApplyPopup');
$routes->get('/mo/mypage/group/create', 'MoHome::mypageGroupCreate');
$routes->get('/mo/mypage/mygroup/list', 'MoHome::mypageMygroupList');
$routes->get('/mo/mypage/mygroup/myList', 'MoHome::mypageMygroupMyList');
$routes->get('/mo/alliance/schedule', 'MoHome::allianceSchedule');
$routes->get('/mo/mypage/mygroup/mygroupReservationRefresh', 'MoHome::mygroupReservationRefresh');
$routes->post('/mo/mypage/mygroup/select', 'MoHome::mypageMygroupEdit');
$routes->post('/mo/mypage/mygroup/cancelReservation', 'MoHome::mypageCancelReservation');
$routes->post('/mo/mypage/mygroup/cancelReservationChk', 'MoHome::mypageCancelReservationChk');
$routes->post('/mo/mypage/mygroup/del', 'MoHome::mypageMygroupDel');
// $routes->get('/mo/mypage/mygroup/list/edit', 'MoHome::mypageMygroupListEdit');
$routes->get('/mo/mypage/group/searchPopup', 'MoHome::mypageGroupSearchPopup');
$routes->get('/mo/mymsg/ai/qna', 'MoHome::mymsgAiQna');
$routes->get('/mo/myfeed/(:any)', 'MoHome::myfeed/$1');
$routes->get('/mo/myfeed/detail', 'MoHome::myfeedDetail');
$routes->get('/mo/myfeed/edit', 'MoHome::myfeedEdit');
$routes->get('/mo/matchFeed', 'MoHome::matchFeed');
$routes->get('/mo/myfeed/view', 'MoHome::myfeedView');
$routes->get('/mo/viewProfile/(:any)', 'MoHome::myfeedViewProfile/$1');
$routes->get('/mo/alertPopup', 'MoHome::alertPopup');
$routes->get('/mo/alliance/list', 'MoHome::allianceList');
$routes->get('/mo/alliance/regionPopup', 'MoHome::allianceRegionPopup');
$routes->get('/mo/alliance/detail/(:num)', 'MoHome::allianceDetail/$1');
$routes->get('/mo/alliance/detail2', 'MoHome::allianceDetail2');

$routes->post('/mo/alliance/agree', 'MoHome::allianceAgree');
$routes->get('/mo/alliance/pass', 'MoHome::alliancePass');
$routes->get('/mo/alliance/payment/(:num)/(:num)/(:any)/(:any)', 'MoHome::alliancePayment/$1/$2/$3/$4');
$routes->get('/mo/alliance/reservePopup', 'MoHome::allianceReservePopup');
$routes->post('/mo/alliance/apply', 'MoHome::allianceApply');
$routes->get('/mo/alliance/alert/(:num)', 'MoHome::allianceAlert/$1');
$routes->post('/mo/alliance/alliancePaymentChk', 'MoHome::alliancePaymentChk');
$routes->get('/mo/alliance/exchange', 'MoHome::allianceExchange');
$routes->post('/mo/alliance/exchangepointSubmit', 'MoHome::allianceExchangePoint');
$routes->get('/mo_mypage_excharge_success', 'MoHome::exchangePoint_success');
$routes->get('/mo_mypage_excharge_fail', 'MoHome::exchangePoint_fail');
$routes->get('/mo/partner', 'MoHome::partner');
$routes->get('/mo/factorBasic', 'MoHome::factorBasic');
$routes->get('/mo/factorInfo', 'MoHome::factorInfo');
$routes->get('/mo/partner/regular', 'MoHome::partnerRegular');
$routes->get('/mo/partner/premium', 'MoHome::partnerPremium');

//id and password lose
$routes->get('/mo/idpwfind/pass', 'MoHome::idpwFindPass');
$routes->post('/mo/idpwfind/passwordReset', 'MoHome::passworldReset');
//$routes->get('/mo/idpwfind/passwordReset', 'MoHome::passworldReset');
$routes->post('/ajax/passwordUpdate', 'MoAjax::passwordUpdate');

//Aouth2.0
$routes->get('/auth/kakao/login', 'OAuth2::loginKakao');
$routes->get('/auth/kakao/callback', 'OAuth2::callback');
$routes->get('/auth/naver/login', 'OAuth2::loginNaver');
$routes->get('/auth/naver/callback', 'OAuth2::callback');

// file upload
$routes->post('/upload', 'Upload::upload');
$routes->post('/ckeditorUpload', 'Upload::ckeditorUpload');

// ajax
$routes->post('/ajax/signUp', 'MoAjax::signUp');
$routes->post('/ajax/alianceUp', 'MoAjax::alianceUp');
$routes->post('/ajax/signUpdate', 'MoAjax::signUpdate');
$routes->post('/ajax/myinfoUpdate', 'MoAjax::myinfoUpdate');
$routes->post('/ajax/mobileDupChk', 'MoAjax::mobileDupChk');
$routes->post('/ajax/isValidRecommendCode', 'MoAjax::isValidRecommendCode');
$routes->post('/ajax/login', 'MoAjax::login');
$routes->post('/ajax/logout', 'MoAjax::logout');
$routes->post('/ajax/mbrFileRegUp', 'MoAjax::mbrFileRegUp');
$routes->post('/ajax/searchUniversity', 'MoAjax::searchUniversity');
$routes->post('/ajax/updtUserData', 'MoAjax::updtUserData');
$routes->post('/ajax/updtFeedData', 'MoAjax::updtFeedData');
$routes->post('/ajax/showFeedDetail', 'MoAjax::showFeedDetail');
$routes->post('/ajax/myFeedDelete', 'MoAjax::myFeedDelete');
$routes->post('/ajax/myFeedUpdate', 'MoAjax::myFeedUpdate');
$routes->post('/ajax/savePartner', 'MoAjax::savePartner');
$routes->post('/ajax/saveFactorBasic', 'MoAjax::saveFactorBasic');
$routes->post('/ajax/saveFactorInfo', 'MoAjax::saveFactorInfo');
$routes->post('/ajax/chgExcept', 'MoAjax::chgExcept');
$routes->post('/ajax/calcMatchRate', 'MoAjax::calcMatchRate');
$routes->post('/ajax/meetingSave', 'MoAjax::meetingSave');
$routes->post('/ajax/meetingFilter', 'MoAjax::meetingFiltering');
$routes->post('/ajax/myMeetingFilter', 'MoAjax::myMeetingFiltering');
$routes->post('/ajax/AImatch', 'MoAjax::AImatch');
$routes->post('/ajax/AImatch2', 'MoAjax::AImatch2');
$routes->post('/ajax/mainMeetingList', 'MoAjax::mainMeetingList');
$routes->post('/ajax/allianceFilter', 'MoAjax::allianceFiltering');
$routes->get('/ajax/alliance/reservation', 'MoAjax::allianceReservation');
$routes->post('/ajax/myAlliance', 'MoAjax::myAlliance');
$routes->post('/ajax/myAllianceDetail', 'MoAjax::myAllianceDetail');
$routes->post('/ajax/upgradeGrade', 'MoAjax::upgradeGrade');
$routes->post('/ajax/gunguSch', 'MoAjax::gunguSch');
$routes->post('/ajax/getVerifyCode', 'MoAjax::getVerifyCode');
$routes->post('/ajax/chkVerifyCode', 'MoAjax::chkVerifyCode');

/* 채팅 */
$routes->post('/ajax/createChat', 'MoAjax::createChat');
$routes->post('/ajax/createMultyChat', 'MoAjax::createMultyChat');
$routes->post('/ajax/sendMsg', 'MoAjax::sendMsg');
$routes->post('/ajax/sendMsgAi', 'MoAjax::sendMsgAi');
$routes->post('/ajax/reloadMsg', 'MoAjax::reloadMsg');
$routes->post('/ajax/reloadMsgAi', 'MoAjax::reloadMsgAi');
$routes->post('/ajax/extRm', 'MoAjax::extRm');
$routes->post('/ajax/banUsr', 'MoAjax::banUsr');
$routes->post('/ajax/sndRpt', 'MoAjax::sndRpt');
$routes->post('/ajax/submitScdl', 'MoAjax::submitScdl');
$routes->post('/ajax/partScdl', 'MoAjax::partScdl');
$routes->post('/ajax/usablePoint', 'MoAjax::usablePoint');
$routes->post('/ajax/sndDeposit', 'MoAjax::sndDeposit');

/*관리자페이지*/
$routes->get('/downloadFile/(:num)', 'download::downloadFile/$1');
$routes->get('/downloadCeonumFile/(:num)', 'download::downloadCeonumFile/$1');
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
$routes->get('/ad/exchange/exchangeList', 'AdminHome::exchangeList');
$routes->post('/ad/exchangeCheck', 'AdminHome::exchangeCheck');
$routes->get('/ad/alliance/allianceList', 'AdminHome::allianceList');
$routes->post('/ad/allianceCheck', 'AdminHome::allianceCheck');
$routes->get('/ad/member/memberApproveList', 'AdminHome::memberApproveList');
$routes->post('/ad/memberCertificateCheck', 'AdminHome::memberCertificateCheck');
$routes->get('/ad/member/memberPaymentList', 'AdminHome::memberPaymentList');
$routes->post('/ad/memberPaymentCheck', 'AdminHome::memberPaymentCheck');
$routes->get('/ad/report/reportList', 'AdminHome::reportList');
$routes->get('/ad/report/reportView/(:num)', 'AdminHome::reportView/$1');
$routes->post('/ad/report/reportDelete', 'AdminHome::reportDelete');
$routes->get('/ad/intro/newsEdit', 'AdminHome::newsEdit');
$routes->post('/ad/intro/newsUpload', 'AdminHome::newsUpload');
$routes->get('/ad/intro/newsList', 'AdminHome::newsList');
$routes->get('/ad/intro/newsView/(:num)', 'AdminHome::newsView/$1');
$routes->get('/ad/intro/newsModify/(:num)', 'AdminHome::newsModify/$1');
$routes->post('/ad/intro/newsUpdate', 'AdminHome::newsUpdate');

$routes->get('/ad/support/noticeMenuSelect', 'AdminHome::spNoticeMenuSelect');
$routes->get('/ad/support/noticeEdit', 'AdminHome::spNoticeEdit');
$routes->post('/ad/support/noticeUpload', 'AdminHome::spNoticeUpload');
$routes->get('/ad/support/noticeList', 'AdminHome::spNoticeList');
$routes->get('/ad/support/noticeView/(:num)', 'AdminHome::spNoticeView/$1');
$routes->get('/ad/support/noticeModify/(:num)', 'AdminHome::spNoticeModify/$1');
$routes->post('/ad/support/noticeUpdate', 'AdminHome::spNoticeUpdate');
$routes->post('/ad/support/noticeDelete', 'AdminHome::spNoticeDelete');
$routes->post('/ad/FileDelete', 'AdminHome::fileDelete');
$routes->get('/ad/support/faqEdit', 'AdminHome::spFaqEdit');
$routes->post('/ad/support/faqUpload', 'AdminHome::spFaqUpload');
$routes->get('/ad/support/faqList', 'AdminHome::spFaqList');
$routes->get('/ad/support/faqView/(:num)', 'AdminHome::spFaqView/$1');
$routes->get('/ad/support/faqModify/(:num)', 'AdminHome::spFaqModify/$1');
$routes->post('/ad/support/faqUpdate', 'AdminHome::spFaqUpdate');

$routes->post('/proxy/createToken', 'ProxyController::createToken');
$routes->post('/proxy/createPassWeb', 'ProxyController::createPassWeb');
$routes->get('/proxy/getResultValue', 'ProxyController::getResultValue');
$routes->post('/proxy/idpwFind', 'ProxyController::idpwFind');

/*support*/
$routes->get('/support', 'SupportHome::index');
$routes->get('/support/menu', 'SupportHome::menu');
$routes->get('/support/notice', 'SupportHome::noticeList');
$routes->get('/support/notice/view/(:num)', 'SupportHome::noticeView/$1');
$routes->get('/support/faq', 'SupportHome::faq');
$routes->get('/support/terms', 'SupportHome::terms');
$routes->get('/support/privacy', 'SupportHome::privacy');