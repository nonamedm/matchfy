<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Matchfy</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">

    <link rel="stylesheet" href="/static/css/common.css">
    <script src="/static/js/jquery.min.js"></script>
    <script src="/static/js/basic.js"></script>
    <!-- STYLES -->

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
            padding: .4rem 0 0;
        }

        .menu {
            padding: .4rem 2rem;
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
</head>
<?php
$session = session();
$ci = $session->get('ci');
$name = $session->get('name');
?>


<!-- HEADER: MENU + HEROE SECTION -->
<?php
if ($ci) {
?>

    <body style="max-width: 400px; margin: 0 auto;">
        <header class="ci_header">
        <?php
    } else {
        ?>

            <body>
                <header>
                <?php
            } ?>

                <div class="menu">
                    <ul>
                        <li class="logo">
                            <img src="/static/images/matchfy.png" />
                        </li>
                        <!-- <li class="menu-toggle">
                        <button onclick="toggleMenu();">&#9776;</button>
                    </li> -->
                        <?php
                        if ($ci) {
                        ?>
                            <li class="menu_left" style="display: inline-flex">
                                <button class="" onclick="moveToUrl('/mo/menu')">
                                    <svg width="22" height="16" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M21.5 8C21.5 8.23206 21.4078 8.45463 21.2437 8.61872C21.0796 8.78281 20.8571 8.875 20.625 8.875H1.375C1.14294 8.875 0.920376 8.78281 0.756282 8.61872C0.592187 8.45463 0.5 8.23206 0.5 8C0.5 7.76794 0.592187 7.54538 0.756282 7.38128C0.920376 7.21719 1.14294 7.125 1.375 7.125H20.625C20.8571 7.125 21.0796 7.21719 21.2437 7.38128C21.4078 7.54538 21.5 7.76794 21.5 8ZM1.375 1.875H20.625C20.8571 1.875 21.0796 1.78281 21.2437 1.61872C21.4078 1.45462 21.5 1.23206 21.5 1C21.5 0.767936 21.4078 0.545376 21.2437 0.381282C21.0796 0.217187 20.8571 0.125 20.625 0.125H1.375C1.14294 0.125 0.920376 0.217187 0.756282 0.381282C0.592187 0.545376 0.5 0.767936 0.5 1C0.5 1.23206 0.592187 1.45462 0.756282 1.61872C0.920376 1.78281 1.14294 1.875 1.375 1.875ZM20.625 14.125H1.375C1.14294 14.125 0.920376 14.2172 0.756282 14.3813C0.592187 14.5454 0.5 14.7679 0.5 15C0.5 15.2321 0.592187 15.4546 0.756282 15.6187C0.920376 15.7828 1.14294 15.875 1.375 15.875H20.625C20.8571 15.875 21.0796 15.7828 21.2437 15.6187C21.4078 15.4546 21.5 15.2321 21.5 15C21.5 14.7679 21.4078 14.5454 21.2437 14.3813C21.0796 14.2172 20.8571 14.125 20.625 14.125Z" fill="#343330" />
                                    </svg>
                                </button>
                            </li>
                        <?php } ?>
                        <li class="menu_item" style="display: inline-flex">
                            <?php
                            if ($ci) {
                            ?>
                                <!-- <button class="login_btn" onclick="userLogout()">
                                <p>
                                    <?= lang('Korean.logout') ?>
                                </p>
                            </button>
                            <button class="login_btn" onclick="moveToUrl('/mo/mypage')">
                                <p>mypage</p>
                            </button> -->
                                <button class="login_btn mypage_icon" onclick="moveToUrl('/mo/mypage')">
                                    <svg width="28" height="26" viewBox="0 0 28 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M26.8651 23.5C24.9613 20.2087 22.0276 17.8487 18.6038 16.73C20.2974 15.7218 21.6132 14.1856 22.3491 12.3572C23.0851 10.5289 23.2005 8.50948 22.6777 6.60918C22.1548 4.70887 21.0227 3.03272 19.4551 1.83814C17.8874 0.643552 15.971 -0.00341797 14.0001 -0.00341797C12.0292 -0.00341797 10.1128 0.643552 8.54513 1.83814C6.9775 3.03272 5.84534 4.70887 5.32252 6.60918C4.7997 8.50948 4.91513 10.5289 5.65108 12.3572C6.38703 14.1856 7.7028 15.7218 9.39634 16.73C5.97259 17.8475 3.03884 20.2075 1.13509 23.5C1.06528 23.6138 1.01897 23.7405 0.998905 23.8725C0.978837 24.0045 0.985415 24.1392 1.01825 24.2687C1.05108 24.3981 1.10951 24.5197 1.19008 24.6262C1.27066 24.7326 1.37174 24.8219 1.48738 24.8887C1.60301 24.9555 1.73085 24.9985 1.86335 25.015C1.99586 25.0316 2.13034 25.0215 2.25887 24.9853C2.3874 24.949 2.50737 24.8874 2.6117 24.8041C2.71604 24.7207 2.80262 24.6173 2.86634 24.5C5.22134 20.43 9.38384 18 14.0001 18C18.6163 18 22.7788 20.43 25.1338 24.5C25.1976 24.6173 25.2842 24.7207 25.3885 24.8041C25.4928 24.8874 25.6128 24.949 25.7413 24.9853C25.8698 25.0215 26.0043 25.0316 26.1368 25.015C26.2693 24.9985 26.3972 24.9555 26.5128 24.8887C26.6284 24.8219 26.7295 24.7326 26.8101 24.6262C26.8907 24.5197 26.9491 24.3981 26.9819 24.2687C27.0148 24.1392 27.0213 24.0045 27.0013 23.8725C26.9812 23.7405 26.9349 23.6138 26.8651 23.5ZM7.00009 8.99998C7.00009 7.61551 7.41064 6.26214 8.17981 5.11099C8.94898 3.95985 10.0422 3.06264 11.3213 2.53283C12.6004 2.00301 14.0079 1.86439 15.3657 2.13449C16.7236 2.40458 17.9709 3.07127 18.9498 4.05023C19.9288 5.0292 20.5955 6.27648 20.8656 7.63435C21.1357 8.99222 20.9971 10.3997 20.4673 11.6788C19.9374 12.9578 19.0402 14.0511 17.8891 14.8203C16.7379 15.5894 15.3846 16 14.0001 16C12.1442 15.998 10.3649 15.2599 9.05254 13.9475C7.74022 12.6352 7.00208 10.8559 7.00009 8.99998Z" fill="#343330" />
                                    </svg>

                                </button>
                            <?php
                            } else { ?>
                                <button class="login_btn" onclick="moveToUrl('/mo')">
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
                            <button onclick="moveToUrl('/mo')"><?= lang('Korean.mainConBtn') ?></button>
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
                    <script>
                        // const clickOn = (button) => {
                        //     var buttons = document.querySelectorAll('.main_title_btn button');
                        //     buttons.forEach(function(btn) {
                        //         btn.classList.remove('on');
                        //     });

                        //     button.classList.add('on');
                        //     AImatch(button.value);
                        // }
                        const AImatch = (v) => {
                            $.ajax({
                                url: '/ajax/AImatch',
                                type: 'POST',
                                data: {
                                    "value": v
                                },
                                async: false,
                                success: function(data) {
                                    console.log(data);
                                    if (data.message === 'success') {
                                        $(".AImatch_list").html("");
                                        $(".AImatch_list").css("display", "flex");
                                        data.result.forEach(function(item) {
                                            var html = '<div class="ai_mat_card">';
                                            html += `<a onclick="moveToUrl('/mo/viewProfile/` + item.nickname + `')">`;
                                            if (item.file_path !== "" && item.file_path !== null) {
                                                html += '<img src="/' + item.file_path + item.file_name + '" />';
                                            } else {
                                                html += '<img src="/static/images/profile_noimg_main.png" />';
                                            }
                                            html += '<h2>' + item.birthyear + ', ' + item.city + '</h2>';
                                            html += '<div class="profile_row">';
                                            if (item.mbti !== "" && item.mbti !== null) {
                                                html += '<p class="mbti">' + item.mbti + '</p>';
                                            } else {
                                                html += '<p class="mbti nodata"></p>';
                                            }
                                            // html += '<p class="mat_percent">' + item.match_rate + '%</p>';
                                            html += matchRateType(item.match_rate);
                                            html += '</div>';
                                            html += '</a>';
                                            html += '</div>';

                                            $(".AImatch_list").append(html);
                                        });
                                    } else {
                                        // fn_alert('검색결과가 없습니다');
                                        // $(".AImatch_list").css("text-align", "center");
                                        // $(".AImatch_list").removeClass("login_main_list");
                                    }
                                },
                                error: function(data, status, err) {
                                    console.log(err);
                                    fn_alert('오류가 발생하였습니다. \n다시 시도해 주세요.');
                                },
                            });
                        }

                        const AImatch2 = (v) => {
                            $.ajax({
                                url: '/ajax/AImatch2',
                                type: 'POST',
                                data: {
                                    "value": v
                                },
                                async: false,
                                success: function(data) {
                                    console.log(data);
                                    if (data.message === 'success') {
                                        $(".AImatch2_list").html("");
                                        $(".AImatch2_list").css("display", "flex");
                                        data.result.forEach(function(item) {
                                            var html = '<div class="ai_mat_card">';
                                            html += `<a onclick="moveToUrl('/mo/viewProfile/` + item.nickname + `')">`;
                                            if (item.file_path !== "" && item.file_path !== null) {
                                                html += '<img src="/' + item.file_path + item.file_name + '" />';
                                            } else {
                                                html += '<img src="/static/images/profile_noimg_main.png" />';
                                            }
                                            html += '<h2>' + item.birthyear + ', ' + item.city + '</h2>';
                                            html += '<div class="profile_row">';
                                            if (item.mbti !== "" && item.mbti !== null) {
                                                html += '<p class="mbti">' + item.mbti + '</p>';
                                            } else {
                                                html += '<p class="mbti nodata"></p>';
                                            }
                                            // html += '<p class="mat_percent">' + item.match_rate + '%</p>';
                                            html += matchRateType(item.match_rate);
                                            html += '</div>';
                                            html += '</a>';
                                            html += '</div>';

                                            $(".AImatch2_list").append(html);
                                        });
                                    } else {
                                        // fn_alert('검색결과가 없습니다');
                                        // $(".AImatch_list").css("text-align", "center");
                                        // $(".AImatch_list").removeClass("login_main_list");
                                    }
                                },
                                error: function(data, status, err) {
                                    console.log(err);
                                    fn_alert('오류가 발생하였습니다. \n다시 시도해 주세요.');
                                },
                            });
                        }

                        const matchRateType = (rate) => {
                            if (80 <= rate) {
                                return '<p class="mat_percent"><img class="faceIcon" style="width:20px;height: 20px;" src="/static/images/blue_face_icon.png"></p>';
                            } else if (rate => 65 || rate < 80) {
                                return '<p class="mat_percent"><img class="faceIcon" style="width:20px;height: 20px;" src="/static/images/green_face_icon.png"></p>';
                            } else if (rate => 50 || rate < 65) {
                                return '<p class="mat_percent"><img class="faceIcon" style="width:20px;height: 20px;" src="/static/images/yellow_face_icon.png"></p>';
                            } else if (rate => 35 || rate < 50) {
                                return '<p class="mat_percent"><img class="faceIcon" style="width:20px;height: 20px;" src="/static/images/orange_face_icon.png"></p>';
                            } else {
                                return '<p class="mat_percent"><img class="faceIcon" style="width:20px;height: 20px;" src="/static/images/red_face_icon.png"></p>';
                            }
                        }
                        const meetingList = () => {
                            $.ajax({
                                url: '/ajax/mainMeetingList',
                                type: 'POST',
                                async: false,
                                success: function(data) {
                                    console.log(data);
                                    data.result.forEach(function(item) {
                                        $(".category" + item.category).html("");
                                        $(".category" + item.category).css("display", "flex");
                                    });
                                    data.result.forEach(function(item) {
                                        var html = `<div class="ai_group_card">`;
                                        html += `<a onclick="moveToUrl('/mo/mypage/group/detail/` + item.idx + `')" >`
                                        if (item.file_path !== "" && item.file_path !== null) {
                                            html += '<img src="/' + item.file_path + item.file_name + '" />';
                                        } else {
                                            html += '<img src="/static/images/group_main_01.png" />';
                                        }
                                        html += '<div class="group_particpnt">';
                                        html += '<span>신청 ' + item.count + '</span>/' + item.number_of_people + '명 </div>';
                                        html += '<div class = "group_location" >';
                                        html += ' ' + item.title + ' </div>';
                                        html += '<div class = "group_location" >';
                                        html += '<img src = "/static/images/ico_location_16x16.png" >';
                                        html += ' ' + item.meeting_place + ' </div>';
                                        html += '<div class = "schedule_row" >';
                                        html += '<p> ' + item.membership_fee.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',') + ' 원 <span> ' + item.meetingDateTime + ' </span></p>';
                                        html += '</div></a></div>';
                                        $(".category" + item.category).append(html);
                                    });
                                },
                                error: function(data, status, err) {
                                    console.log(err);
                                    fn_alert('오류가 발생하였습니다. \n다시 시도해 주세요.');
                                },
                            });
                        }

                        const clickLeft = (val) => {
                            var container = $('.' + val);
                            var containerWidth = container.outerWidth();
                            var scrollLeft = container.scrollLeft();
                            var maxScroll = container[0].scrollWidth - containerWidth;
                            if (scrollLeft !== 0) {
                                container.animate({
                                    scrollLeft: '-=250px'
                                }, 500);
                            }
                        }


                        const clickRight = (val) => {
                            var container = $('.' + val);
                            var containerWidth = container.outerWidth();
                            var scrollLeft = container.scrollLeft();
                            var maxScroll = container[0].scrollWidth - containerWidth;
                            if (scrollLeft < maxScroll) {
                                container.animate({
                                    scrollLeft: '+=250px'
                                }, 500);
                            }
                        }

                        const scrollAction = () => {
                            $('.category01').scroll(function() {
                                var scrollLeft = $(this).scrollLeft();
                                var container = $('.category01');
                                var containerWidth = container.outerWidth();
                                var maxScroll = container[0].scrollWidth - containerWidth;
                                if ((scrollLeft - 5) <= '0') {
                                    $(".category01_left").addClass('disabled');
                                } else {
                                    $(".category01_left").removeClass('disabled');
                                }
                                if ((scrollLeft + 5) >= maxScroll) {
                                    $(".category01_right").addClass('disabled');
                                } else {
                                    $(".category01_right").removeClass('disabled');
                                }

                                if (scrollLeft === '0' && (scrollLeft + 5) >= maxScroll) {
                                    $(".category01_left").addClass('disabled');
                                    $(".category01_right").addClass('disabled');
                                }
                            });
                            $('.category02').scroll(function() {
                                var scrollLeft = $(this).scrollLeft();
                                var container = $('.category02');
                                var containerWidth = container.outerWidth();
                                var maxScroll = container[0].scrollWidth - containerWidth;
                                if ((scrollLeft - 5) <= '0') {
                                    $(".category02_left").addClass('disabled');
                                } else {
                                    $(".category02_left").removeClass('disabled');
                                }
                                if ((scrollLeft + 5) >= maxScroll) {
                                    $(".category02_right").addClass('disabled');
                                } else {
                                    $(".category02_right").removeClass('disabled');
                                }

                                if (scrollLeft === '0' && (scrollLeft + 5) >= maxScroll) {
                                    $(".category02_left").addClass('disabled');
                                    $(".category02_right").addClass('disabled');
                                }
                            });
                            $('.category03').scroll(function() {
                                var scrollLeft = $(this).scrollLeft();
                                var container = $('.category03');
                                var containerWidth = container.outerWidth();
                                var maxScroll = container[0].scrollWidth - containerWidth;
                                if ((scrollLeft - 5) <= '0') {
                                    $(".category03_left").addClass('disabled');
                                } else {
                                    $(".category03_left").removeClass('disabled');
                                }
                                if ((scrollLeft + 5) >= maxScroll) {
                                    $(".category03_right").addClass('disabled');
                                } else {
                                    $(".category03_right").removeClass('disabled');
                                }

                                if (scrollLeft === '0' && (scrollLeft + 5) >= maxScroll) {
                                    $(".category03_left").addClass('disabled');
                                    $(".category03_right").addClass('disabled');
                                }
                            });
                            $('.category04').scroll(function() {
                                var scrollLeft = $(this).scrollLeft();
                                var container = $('.category04');
                                var containerWidth = container.outerWidth();
                                var maxScroll = container[0].scrollWidth - containerWidth;
                                if ((scrollLeft - 5) <= '0') {
                                    $(".category04_left").addClass('disabled');
                                } else {
                                    $(".category04_left").removeClass('disabled');
                                }
                                if ((scrollLeft + 5) >= maxScroll) {
                                    $(".category04_right").addClass('disabled');
                                } else {
                                    $(".category04_right").removeClass('disabled');
                                }

                                if (scrollLeft === '0' && (scrollLeft + 5) >= maxScroll) {
                                    $(".category04_left").addClass('disabled');
                                    $(".category04_right").addClass('disabled');
                                }
                            });
                        }
                        $(function() {
                            AImatch('9');
                            AImatch2('9');
                            meetingList();
                            scrollAction();

                        })
                    </script>
                    <div class="content_banner_top" onclick="moveToUrl('/mo/mypage/group/detail/169')">
                        <img src="/static/images/content_banner_top.png" />
                    </div>
                    <div class="content_no_img login_main">
                        <div class="login_main_title">
                            <h2><?= lang('Korean.mainTitle') ?></h2>
                            <div class="main_title_btn">
                                <!-- <button onclick="clickOn(this)" class="on" value="9"><?= lang('Korean.all') ?></button>
                    <button onclick="clickOn(this)" value="0"><?= lang('Korean.woman') ?></button>
                    <button onclick="clickOn(this)" value="1"><?= lang('Korean.man') ?></button> -->
                            </div>
                        </div>
                        <div class="login_main_list AImatch_list">
                            <div class="ai_mat_card" style="padding-top: 50px;">
                                <h2><?= lang('Korean.indexCon') ?></h2>
                                <a onclick="moveToUrl('/mo/partner')">
                                    <p class=""><?= lang('Korean.settingBtn') ?></p>
                                </a>
                                <div class="profile_row">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content_no_img login_main">
                        <div class="login_main_title">
                            <h2><?= lang('Korean.mainTitle2') ?></h2>
                            <div class="main_title_btn">
                                <!-- <button onclick="clickOn(this)" class="on" value="9"><?= lang('Korean.all') ?></button>
                    <button onclick="clickOn(this)" value="0"><?= lang('Korean.woman') ?></button>
                    <button onclick="clickOn(this)" value="1"><?= lang('Korean.man') ?></button> -->
                            </div>
                        </div>
                        <div class="login_main_list AImatch2_list">
                            <div class="ai_mat_card" style="padding-top: 50px;">
                                <h2><?= lang('Korean.indexCon') ?></h2>
                                <a onclick="moveToUrl('/mo/partner')">
                                    <p class=""><?= lang('Korean.settingBtn') ?></p>
                                </a>
                                <div class="profile_row">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content_no_img login_main">
                        <div class="login_main_title">
                            <h2><?= lang('Korean.weekdayMeeting') ?></h2>
                        </div>
                        <div class="group_row">
                            <p class="group_week"><?= lang('Korean.weekTitle') ?></p>
                            <div class="group_type">
                                <h2>
                                    <?= lang('Korean.indexCon11') ?>
                                </h2>
                                <div class="main_title_btn">
                                    <button class="total" onclick="moveToUrl('/mo/mypage/group/list')"><?= lang('Korean.all') ?>보기</button>
                                    <button class="category01_left slide_btn disabled" onclick="clickLeft('category01')">
                                        <img src="/static/images/slide_left.png" />
                                    </button>
                                    <button class="category01_right slide_btn" onclick="clickRight('category01')">
                                        <img src="/static/images/slide_right.png" />
                                    </button>
                                </div>
                            </div>
                            <div class="login_main_list category01">
                                <div class="ai_group_card" style="text-align: center;">
                                    <div class="group_location" style="margin: 0 auto; padding-top: 50px;">
                                        <?= lang('Korean.noMeetList') ?>
                                    </div>
                                    <div class="schedule_row" style="display: block;">
                                        <a onclick="moveToUrl('/mo/mypage/group/list')">
                                            <p><?= lang('Korean.createBtn') ?></p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="group_row">
                            <p class="group_week"><?= lang('Korean.weekTitle') ?></p>
                            <div class="group_type">
                                <h2>
                                    <?= lang('Korean.trip') ?>
                                </h2>
                                <div class="main_title_btn">
                                    <button class="total" onclick="moveToUrl('/mo/mypage/group/list')"><?= lang('Korean.all') ?>보기</button>
                                    <button class="category02_left slide_btn disabled" onclick="clickLeft('category02')">
                                        <img src="/static/images/slide_left.png" />
                                    </button>
                                    <button class="category02_right slide_btn" onclick="clickRight('category02')">
                                        <img src="/static/images/slide_right.png" />
                                    </button>
                                </div>
                            </div>
                            <div class="login_main_list category02">
                                <div class="ai_group_card" style="text-align: center;">
                                    <div class="group_location" style="margin: 0 auto; padding-top: 50px;">
                                        <?= lang('Korean.noMeetList') ?>
                                    </div>
                                    <div class="schedule_row" style="display: block;">
                                        <a onclick="moveToUrl('/mo/mypage/group/list')">
                                            <p><?= lang('Korean.createBtn') ?></p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content_no_img login_main">
                        <div class="login_main_title">
                            <h2><?= lang('Korean.holiMeeting') ?></h2>
                        </div>
                        <div class="group_row">
                            <p class="group_week"><?= lang('Korean.holidayTitle') ?></p>
                            <div class="group_type">
                                <h2>
                                    <?= lang('Korean.indexCon11') ?>
                                </h2>
                                <div class="main_title_btn">
                                    <button class="total" onclick="moveToUrl('/mo/mypage/group/list')"><?= lang('Korean.all') ?>보기</button>
                                    <button class="category03_left slide_btn disabled" onclick="clickLeft('category03')">
                                        <img src="/static/images/slide_left.png" />
                                    </button>
                                    <button class="category03_right slide_btn" onclick="clickRight('category03')">
                                        <img src="/static/images/slide_right.png" />
                                    </button>
                                </div>
                            </div>
                            <div class="login_main_list category03">
                                <div class="ai_group_card" style="text-align: center;">
                                    <div class="group_location" style="margin: 0 auto; padding-top: 50px;">
                                        <?= lang('Korean.noMeetList') ?>
                                    </div>
                                    <div class="schedule_row" style="display: block;">
                                        <a onclick="moveToUrl('/mo/mypage/group/list')">
                                            <p><?= lang('Korean.createBtn') ?></p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="group_row">
                            <p class="group_week"><?= lang('Korean.holidayTitle') ?></p>
                            <div class="group_type">
                                <h2>
                                    <?= lang('Korean.trip') ?>
                                </h2>
                                <div class="main_title_btn">
                                    <button class="total" onclick="moveToUrl('/mo/mypage/group/list')"><?= lang('Korean.all') ?>보기</button>
                                    <button class="category04_left slide_btn disabled" onclick="clickLeft('category04')">
                                        <img src="/static/images/slide_left.png" />
                                    </button>
                                    <button class="category04_right slide_btn" onclick="clickRight('category04')">
                                        <img src="/static/images/slide_right.png" />
                                    </button>
                                </div>
                            </div>
                            <div class="login_main_list category04">
                                <div class="ai_group_card" style="text-align: center;">
                                    <div class="group_location" style="margin: 0 auto; padding-top: 50px;">
                                        <?= lang('Korean.noMeetList') ?>
                                    </div>
                                    <div class="schedule_row" style="display: block;">
                                        <a onclick="moveToUrl('/mo/mypage/group/list')">
                                            <p><?= lang('Korean.createBtn') ?></p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>


                <!-- FOOTER: DEBUG INFO + COPYRIGHTS -->

                <!-- <div style="height: 50px;"></div> -->
                <footer class="footer <?php if (!$ci) {
                                            echo "block";
                                        } ?>">
                    <div class="footer_logo mb40">
                        matchfy
                    </div>
                    <div class="footer_link mb40">
                        <a href="/intro/main" target="_blank"><?= lang('Korean.companyName') ?></a>
                        <a href="/mo/privacy"><?= lang('Korean.pravacyName') ?></a>
                        <a href="/mo/terms"><?= lang('Korean.serviceName') ?></a>
                        <!-- <a href="#"><?= lang('Korean.supporterName') ?></a> -->
                    </div>
                    <div class="footer_info mb40">
                        <span><?= lang('Korean.footerInfo1') ?> <img src="/static/images/part_line.png" /> <?= lang('Korean.footerInfo2') ?></span>
                        <span><?= lang('Korean.footerInfo3') ?> <img src="/static/images/part_line.png" /> <?= lang('Korean.footerInfo4') ?><img src="/static/images/part_line.png" /> gildong@naver.com</span>
                    </div>
                    <div class="footer_copy">
                        COPYRIGHT 2023. ALL RIGHTS RESERVED.
                    </div>

                </footer>

                <!-- SCRIPTS -->



                <!-- -->

            </body>

</html>