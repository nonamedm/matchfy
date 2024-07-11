<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Matchfy</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=3.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <link rel="stylesheet" href="/static/css/common.css">
    <link rel="stylesheet" href="/static/css/common_mo.css">
    <script src="/static/js/jquery.min.js"></script>
    <script src="/static/js/basic.js"></script>



    <style {csp-style-nonce}>
        html,
        body {
            margin: 0;
            padding: 0;
        }

        header {
            position: relative;
            margin: 0 auto;
            background-color: rgba(247, 248, 249, 1);
            /* padding: .4rem 0 0; */
        }

        .menu {
            /* padding: .4rem 2rem; */
            display: flex;
            justify-content: space-between;
            padding: 10px 20px 0px 20px;
            height: 50px;
            line-height: 50px;
        }

        header ul {
            border-bottom: 1px solid rgba(242, 242, 242, 1);
            list-style-type: none;
            margin: 0;
            overflow: hidden;
            padding: 0;
            text-align: right;
        }

        header li {
            display: inline-block;
        }

        header .logo {
            height: 44px;
            padding: .4rem .5rem;
        }

        header.spci_header .logo_menu ul button {
            background: #ff0267;
        }

        .sp_content_banner {
            overflow: hidden;
        }

        .sp_main_notice {
            position: absolute;
            /* 슬라이드 각 요소들을 절대적 위치로 배치 */
            top: 0;
            /* 상단에 위치 */
            left: 0;
            /* 왼쪽에 위치 */
            width: 100%;
            /* 부모 요소에 꽉 차도록 */
            opacity: 0;
            /* 초기에 투명하게 설정 */
            transition: opacity 1s ease;
            /* opacity가 변할 때 애니메이션 적용 */
        }

        .sp_main_notice.active {
            opacity: 1;
            /* 활성화된 슬라이드는 투명도를 1로 설정하여 보이도록 함 */
        }

        @media (max-width: 629px) {
            header ul {
                padding: 0;
                width: 100%;
            }

            header .menu-toggle {
                padding: 0 1rem;
            }
        }
    </style>
    <script>
        $(document).ready(function() {
            const notices = $('.sp_main_notice');
            let index = 0;

            function showNotice() {
                // 현재 인덱스의 공지를 활성화
                $(notices[index]).addClass('active');
                // 3초 후에 hideNotice 함수 실행
                setTimeout(hideNotice, 3000);
            }

            function hideNotice() {
                // 현재 인덱스의 공지를 비활성화
                $(notices[index]).removeClass('active');
                // 다음 공지의 인덱스 계산
                index = (index + 1) % notices.length;
                // 다음 공지를 보여줌
                showNotice();
            }

            // 페이지 로딩 시 첫 번째 공지를 보여줌
            showNotice();
        });
    </script>
</head>
<?php
$session = session();
$ci = $session->get('ci_support');
$name = $session->get('name');
?>


<!-- HEADER: MENU + HEROE SECTION -->
<?php
if ($ci) {
?>

    <body style="max-width: 400px; margin: 0 auto;position: relative;">
        <header class="spci_header">
        <?php
    } else {
        ?>

            <body>
                <header class="spci_header">
                <?php
            } ?>

                <div class="logo_menu">
                    <ul style="display: flex;">
                        <li class="menu_left" style="width: 10%;height: auto;display: inline-flex;">
                            <?php
                            if ($ci) {
                            ?>
                                <button class="" onclick="moveToUrl('/support/menu')">
                                    <svg width="22" height="16" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M21.5 8C21.5 8.23206 21.4078 8.45463 21.2437 8.61872C21.0796 8.78281 20.8571 8.875 20.625 8.875H1.375C1.14294 8.875 0.920376 8.78281 0.756282 8.61872C0.592187 8.45463 0.5 8.23206 0.5 8C0.5 7.76794 0.592187 7.54538 0.756282 7.38128C0.920376 7.21719 1.14294 7.125 1.375 7.125H20.625C20.8571 7.125 21.0796 7.21719 21.2437 7.38128C21.4078 7.54538 21.5 7.76794 21.5 8ZM1.375 1.875H20.625C20.8571 1.875 21.0796 1.78281 21.2437 1.61872C21.4078 1.45462 21.5 1.23206 21.5 1C21.5 0.767936 21.4078 0.545376 21.2437 0.381282C21.0796 0.217187 20.8571 0.125 20.625 0.125H1.375C1.14294 0.125 0.920376 0.217187 0.756282 0.381282C0.592187 0.545376 0.5 0.767936 0.5 1C0.5 1.23206 0.592187 1.45462 0.756282 1.61872C0.920376 1.78281 1.14294 1.875 1.375 1.875ZM20.625 14.125H1.375C1.14294 14.125 0.920376 14.2172 0.756282 14.3813C0.592187 14.5454 0.5 14.7679 0.5 15C0.5 15.2321 0.592187 15.4546 0.756282 15.6187C0.920376 15.7828 1.14294 15.875 1.375 15.875H20.625C20.8571 15.875 21.0796 15.7828 21.2437 15.6187C21.4078 15.4546 21.5 15.2321 21.5 15C21.5 14.7679 21.4078 14.5454 21.2437 14.3813C21.0796 14.2172 20.8571 14.125 20.625 14.125Z" fill="#343330" />
                                    </svg>
                                </button>
                            <?php } ?>
                        </li>
                        <li class="logo" onclick="moveToUrl('/support')" style="width:85%;height: 44px;line-height: 44px;">
                            <img src="/static/images/matchfy_supporters02.png" />
                        </li>
                        <li class="menu_item" style="display: inline-flex">
                            <?php
                            if ($ci) {
                            ?>

                            <?php
                            } else { ?>
                                <button class="login_btn" onclick="moveToUrl('/support/mo')">
                                    <img src="/static/images/login_ico.png" />
                                    <p><?= lang('Korean.login') ?></p>
                                </button>
                            <?php
                            }
                            ?>
                        </li>
                    </ul>
                </div>

                </header>
                <?php
                if (!$ci) {
                ?>
                    <div class="content">
                        <div class="main_bg_center_box">
                            <h2><?= lang('Korean.mainCon') ?></h2>
                            <p><?= lang('Korean.mainCon2') ?></p>
                            <button onclick="moveToUrl('/support/mo')"><?= lang('Korean.mainConBtn') ?></button>
                        </div>
                    </div>

                    <div class="content_no_img">
                        <div class="main_cont_center_box main_cont_left_box">
                            <h3 class="circle_h"><img src="/static/images/circle_1.png" />Profile</h3>
                            <h2><?= lang('Korean.indexCon1') ?></h2>
                            <p><?= lang('Korean.indexCon2') ?></p>
                        </div>
                        <div class="main_cont_right_img">
                            <img src="/static/images/main_profile_img.png" />
                        </div>
                    </div>

                    <div class="content_no_img bg_color_theme">
                        <div class="main_cont_center_box main_cont_right_box">
                            <h3 class="circle_h text_white"><img src="/static/images/circle_2.png" />Contact</h3>
                            <h2 class="text_white"><?= lang('Korean.indexCon3') ?></h2>
                            <p class="text_white"><?= lang('Korean.indexCon4') ?></p>
                        </div>
                        <div class="main_cont_left_img">
                            <img src="/static/images/main_point_img.png" />
                        </div>
                    </div>

                    <div class="content_no_img">
                        <div class="main_cont_center_box main_cont_left_box">
                            <h3 class="circle_h"><img src="/static/images/circle_3.png" />Place</h3>
                            <h2><?= lang('Korean.indexCon5') ?></h2>
                            <p><?= lang('Korean.indexCon6') ?></p>
                        </div>
                        <div class="main_cont_right_img">
                            <img src="/static/images/main_allience_img.png" />
                        </div>
                    </div>

                    <div class="content_no_img bg_color_theme2 content_chat_img">
                        <div class="main_cont">
                            <h2><?= lang('Korean.indexCon7') ?></h2>
                        </div>
                        <div class="main_cont chat_div chat_div_left">
                            <div class="chat_profile_div">
                                <img src="/static/images/chat_img_1.png" />
                                <span>뽀로로<?= lang('Korean.sir') ?></span>
                            </div>
                            <div class="chat_talk_div">
                                <p><?= lang('Korean.indexCon8') ?></p>
                                <img src="/static/images/review_star.png" />
                                <img src="/static/images/review_star.png" />
                                <img src="/static/images/review_star.png" />
                                <img src="/static/images/review_star.png" />
                                <img src="/static/images/review_star.png" />
                            </div>
                        </div>
                        <div class="main_cont chat_div chat_div_right">
                            <div class="chat_profile_div">
                                <img src="/static/images/chat_img_2.png" />
                                <span>홍길동<?= lang('Korean.sir') ?></span>
                            </div>
                            <div class="chat_talk_div">
                                <p><?= lang('Korean.indexCon8') ?></p>
                                <img src="/static/images/review_star.png" />
                                <img src="/static/images/review_star.png" />
                                <img src="/static/images/review_star.png" />
                                <img src="/static/images/review_star.png" />
                                <img src="/static/images/review_star.png" />
                            </div>
                        </div>
                        <div class="main_cont chat_div chat_div_left">
                            <div class="chat_profile_div">
                                <img src="/static/images/chat_img_3.png" />
                                <span>손흥민<?= lang('Korean.sir') ?></span>
                            </div>
                            <div class="chat_talk_div">
                                <p><?= lang('Korean.indexCon8') ?></p>
                                <img src="/static/images/review_star.png" />
                                <img src="/static/images/review_star.png" />
                                <img src="/static/images/review_star.png" />
                                <img src="/static/images/review_star.png" />
                                <img src="/static/images/review_star.png" />
                            </div>
                        </div>
                        <div class="main_cont chat_div chat_div_right no_margin">
                            <div class="chat_profile_div">
                                <img src="/static/images/chat_img_4.png" />
                                <span>김철수<?= lang('Korean.sir') ?></span>
                            </div>
                            <div class="chat_talk_div">
                                <p><?= lang('Korean.indexCon8') ?></p>
                                <img src="/static/images/review_star.png" />
                                <img src="/static/images/review_star.png" />
                                <img src="/static/images/review_star.png" />
                                <img src="/static/images/review_star.png" />
                                <img src="/static/images/review_star.png" />
                            </div>
                        </div>
                    </div>

                    <div class="content content_bottom">
                        <div class="main_bg_center_box ">
                            <h2><?= lang('Korean.indexCon9') ?></h2>
                            <p><?= lang('Korean.indexCon10') ?></p>
                            <button onclick="moveToUrl('/mo')"><?= lang('Korean.login') ?></button>
                        </div>
                    </div>
                <?php
                } else {
                ?>
                    <div class="kakao_chat_btn">
                        <a href="http://pf.kakao.com/_PgyUG/chat"><img src="/static/images/kakao_chat_icon.png"></a>
                    </div>

                    <div class="sp_content sp_content_banner">
                        <?php if (!empty($data['datas']) && is_array($data['datas'])) : ?>
                            <?php foreach ($data['datas'] as $notice) : ?>
                                <a href="/support/notice/view/<?= htmlspecialchars($notice['notice_id']) ?>">
                                    <div class="sp_main_notice">
                                        <span>필독</span>
                                        <span><?= htmlspecialchars($notice['title']) ?></span>
                                        <span><?= date('Y.m.d', strtotime($notice['created_at'])) ?></span>
                                    </div>
                                </a>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <div class="sp_main_notice">
                                <span>없음</span>
                                <span></span>
                                <span></span>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="sp_content">
                        <div class="sp_main_mywallet">
                            <span>보유포인트</span>
                            <span><?= number_format($my_point) ?></span>
                        </div>
                    </div>

                    <div class="sp_content">
                        <div class="sp_main_title">
                            <span>포인트 적립내역</span>
                            <span><a href="/support/mypage/wallet">더보기</a></span>
                        </div>
                        <div class="sp_main_content">
                            <?php if (!empty($points)) : ?>
                                <?php foreach ($points as $point) : ?>
                                    <div class="sp_mywallet_list">
                                        <span><?= date('Y-m-d', strtotime($point['create_at'])) ?></span>
                                        <span><?= $point['point_details'] ?></span>
                                        <span>+ <?= number_format($point['add_point']) ?></span>
                                    </div>
                                <?php endforeach ?>
                            <?php else : ?>
                                <div class="sp_mywallet_list">
                                    <span></span>
                                    <span style="font-weight: 100;">포인트 내역이 없습니다.</span>
                                    <span></span>
                                </div>
                            <?php endif ?>
                        </div>
                    </div>
                    <br />
                    <div class="sp_content">
                        <div class="sp_main_title">
                            <span>공지사항</span>
                            <span><a href="/support/notice">더보기</a></span>
                        </div>
                        <div class="sp_main_content">
                            <?php if (!empty($data['datas']) && is_array($data['datas'])) : ?>
                                <?php foreach ($data['datas'] as $notice) : ?>
                                    <a href="/support/notice/view/<?= htmlspecialchars($notice['notice_id']) ?>">
                                        <div class="sp_notice_list">
                                            <span class="title"><?= htmlspecialchars($notice['title']) ?>
                                                <?php if ($notice['file_id']) : ?>
                                                    <span style="margin-left:10px;">
                                                        <svg width="15" height="18" viewBox="0 0 15 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M14.4132 8.67094C14.4736 8.73122 14.5214 8.8028 14.5541 8.88159C14.5868 8.96038 14.6036 9.04484 14.6036 9.13013C14.6036 9.21543 14.5868 9.29989 14.5541 9.37868C14.5214 9.45747 14.4736 9.52905 14.4132 9.58933L7.75653 16.242C6.90435 17.094 5.74859 17.5727 4.5435 17.5726C3.33841 17.5725 2.18271 17.0937 1.33064 16.2416C0.47857 15.3894 -7.60522e-05 14.2336 9.06373e-09 13.0285C7.60703e-05 11.8235 0.478868 10.6678 1.33105 9.81568L9.38399 1.64429C9.99238 1.03525 10.8178 0.69284 11.6786 0.692383C12.5395 0.691927 13.3653 1.03346 13.9743 1.64185C14.5834 2.25025 14.9258 3.07566 14.9262 3.93651C14.9267 4.79736 14.5851 5.62314 13.9768 6.23218L5.92218 14.4036C5.55639 14.7694 5.06028 14.9749 4.54298 14.9749C4.02567 14.9749 3.52956 14.7694 3.16377 14.4036C2.79798 14.0378 2.59248 13.5417 2.59248 13.0244C2.59248 12.5071 2.79798 12.0109 3.16377 11.6452L9.92188 4.77995C9.98108 4.7168 10.0523 4.66613 10.1314 4.63092C10.2105 4.59571 10.2958 4.57667 10.3823 4.57493C10.4689 4.57319 10.5549 4.58877 10.6353 4.62077C10.7158 4.65277 10.789 4.70054 10.8507 4.76126C10.9124 4.82198 10.9613 4.89443 10.9946 4.97434C11.0278 5.05425 11.0448 5.14001 11.0444 5.22657C11.0441 5.31313 11.0264 5.39874 10.9924 5.47837C10.9585 5.558 10.909 5.63003 10.8468 5.69023L4.08784 12.5627C4.02732 12.6228 3.97922 12.6941 3.94629 12.7728C3.91336 12.8514 3.89623 12.9357 3.89589 13.021C3.89555 13.1062 3.91201 13.1907 3.94431 13.2696C3.97662 13.3485 4.02415 13.4202 4.08419 13.4807C4.14422 13.5412 4.21559 13.5893 4.29421 13.6223C4.37284 13.6552 4.45718 13.6723 4.54242 13.6727C4.62767 13.673 4.71214 13.6566 4.79102 13.6242C4.86991 13.5919 4.94166 13.5444 5.00217 13.4844L13.0559 5.31703C13.4217 4.952 13.6275 4.45661 13.628 3.93983C13.6286 3.42306 13.4238 2.92725 13.0588 2.56146C12.6937 2.19567 12.1983 1.98987 11.6816 1.98934C11.1648 1.98881 10.669 2.19359 10.3032 2.55862L2.25187 10.7268C1.95025 11.0279 1.7109 11.3855 1.54748 11.7791C1.38407 12.1728 1.29978 12.5948 1.29944 13.021C1.2991 13.4472 1.38272 13.8693 1.54551 14.2632C1.7083 14.6571 1.94708 15.0151 2.24822 15.3167C2.54936 15.6183 2.90696 15.8577 3.3006 16.0211C3.69424 16.1845 4.11621 16.2688 4.54242 16.2691C4.96864 16.2695 5.39074 16.1858 5.78464 16.0231C6.17854 15.8603 6.53652 15.6215 6.83814 15.3203L13.4957 8.66769C13.6178 8.5465 13.783 8.47876 13.9551 8.47937C14.1272 8.47998 14.292 8.54888 14.4132 8.67094Z" fill="#343330" />
                                                        </svg>
                                                    </span>
                                                <?php endif ?>

                                            </span>
                                            <span class="date"><?= date('Y.m.d', strtotime($notice['created_at'])) ?></span>
                                        </div>
                                    </a>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <p>등록된 공지사항 리스트가 없습니다.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <br />

                <?php
                }
                ?>


                <!-- FOOTER: DEBUG INFO + COPYRIGHTS -->

                <!-- <div style="height: 50px;"></div> -->
                <footer class="footer <?php if (!$ci) {
                                            echo "block";
                                        } ?>" style="background:#000;">
                    <div class="footer_logo mb40">
                        matchfy
                    </div>
                    <div class="footer_link mb40">
                        <a href="/intro/main" target="_blank"><?= lang('Korean.companyName') ?></a>
                        <a href="/support/privacy"><?= lang('Korean.pravacyName') ?></a>
                        <a href="/support/terms"><?= lang('Korean.serviceName') ?></a>
                        <!-- <a href="#"><?= lang('Korean.supporterName') ?></a> -->
                    </div>
                    <div class="footer_info mb40">
                        <span><?= lang('Korean.footerInfo1') ?> <img src="/static/images/part_line.png" /> <?= lang('Korean.footerInfo2') ?></span>
                        <span><?= lang('Korean.footerInfo3') ?> <img src="/static/images/part_line.png" /> <?= lang('Korean.footerInfo4') ?><img src="/static/images/part_line.png" /> hi@cuberry.kr</span>
                    </div>
                    <div class="footer_copy">
                        COPYRIGHT 2023. ALL RIGHTS RESERVED.
                    </div>

                </footer>

                <!-- SCRIPTS -->



                <!-- -->

            </body>

</html>