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
            }

            header .menu-toggle {
                padding: 0 1rem;
            }
        }
    </style>
</head>

<body>

    <!-- HEADER: MENU + HEROE SECTION -->
    <header>

        <div class="menu">
            <ul>
                <li class="logo">
                    <img src="/static/images/matchfy.png" />
                </li>
                <!-- <li class="menu-toggle">
                    <button onclick="toggleMenu();">&#9776;</button>
                </li> -->
                <?php
                $session = session();
                $ci = $session->get('ci');
                $name = $session->get('name');
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
                                로그아웃
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
                            <p>로그인</p>
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
                <h2>AI가 분석하고 소개하는 <span>매치파이</span></h2>
                <p>똑똑한 AI가 나와 딱 맞는 상대를 소개해드립니다.</p>
                <button onclick="moveToUrl('/mo')">지금 매칭하기</button>
            </div>
        </div>

        <div class="content_no_img">
            <div class="main_cont_center_box main_cont_left_box">
                <h3 class="circle_h"><img src="/static/images/circle_1.png" />프로필</h3>
                <h2>프로필 등록으로<br /> 매칭 99% 멤버찾기</h2>
                <p>등록한 프로필로 매칭점수가 일치하는<br /> 멤버들을 찾을 수 있어요</p>
            </div>
            <div class="main_cont_right_img">
                <img src="/static/images/main_profile_img.png" />
            </div>
        </div>

        <div class="content_no_img bg_color_theme">
            <div class="main_cont_center_box main_cont_right_box">
                <h3 class="circle_h text_white"><img src="/static/images/circle_2.png" />매칭점수</h3>
                <h2 class="text_white">매칭점수 기반의<br />멤버들 모아보기</h2>
                <p class="text_white">매칭점수가 70% 이상 일치하는 멤버들과 <br />소통을 할 수 있어요</p>
            </div>
            <div class="main_cont_left_img">
                <img src="/static/images/main_point_img.png" />
            </div>
        </div>

        <div class="content_no_img">
            <div class="main_cont_center_box main_cont_left_box">
                <h3 class="circle_h"><img src="/static/images/circle_3.png" />제휴</h3>
                <h2>오프라인 만남은<br />제휴점에서 저렴하게</h2>
                <p>소개팅 또는 모임활동시 소비하는 비용을<br />제휴점 이용을 통해 절약할 수 있어요</p>
            </div>
            <div class="main_cont_right_img">
                <img src="/static/images/main_allience_img.png" />
            </div>
        </div>

        <div class="content_no_img bg_color_theme2 content_chat_img">
            <div class="main_cont">
                <h2>매치파이 멤버들의 <br style="display:none">따끈따끈한 후기</h2>
            </div>
            <div class="main_cont chat_div chat_div_left">
                <div class="chat_profile_div">
                    <img src="/static/images/chat_img_1.png" />
                    <span>뽀로로님</span>
                </div>
                <div class="chat_talk_div">
                    <p>매치파이를 통해 운명의 상대를 만났어요! 성격이 비슷하니 싸울 일도 없어서 안정적이고 잔잔한 연애를 하고 있답니다</p>
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
                    <span>홍길동님</span>
                </div>
                <div class="chat_talk_div">
                    <p>매치파이를 통해 운명의 상대를 만났어요! 성격이 비슷하니 싸울 일도 없어서 안정적이고 잔잔한 연애를 하고 있답니다</p>
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
                    <span>손흥민님</span>
                </div>
                <div class="chat_talk_div">
                    <p>매치파이를 통해 운명의 상대를 만났어요! 성격이 비슷하니 싸울 일도 없어서 안정적이고 잔잔한 연애를 하고 있답니다</p>
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
                    <span>김철수님</span>
                </div>
                <div class="chat_talk_div">
                    <p>매치파이를 통해 운명의 상대를 만났어요! 성격이 비슷하니 싸울 일도 없어서 안정적이고 잔잔한 연애를 하고 있답니다</p>
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
                <h2>똑똑한 AI가 주선하는 찰떡궁합 소개팅</h2>
                <p>지금 바로, 함께해요</p>
                <button onclick="moveToUrl('/mo')">로그인</button>
            </div>
        </div>
    <?php
    } else {
    ?>
        <script>
            const clickOn = (button) => {
                var buttons = document.querySelectorAll('.main_title_btn button');
                buttons.forEach(function(btn) {
                    btn.classList.remove('on');
                });

                button.classList.add('on');
                AImatch(button.value);
            }
            const AImatch = (v) => {
                $(".AImatch_list").html("");
                $.ajax({
                    url: '/ajax/AImatch', // todo : 추후 본인인증 연결
                    type: 'POST',
                    data: {
                        "value": v
                    },
                    async: false,
                    success: function(data) {
                        console.log(data);
                        data.result.forEach(function(item) {
                            var html = '<div class="ai_mat_card">';
                            html += `<a onclick="moveToUrl('/mo/viewProfile/` + item.nickname + `')">`;
                            if (item.file_path !== "" && item.file_path !== null) {
                                html += '<img src="/' + item.file_path + item.file_name + '" />';
                            } else {
                                html += '<img src="/static/images/profile_noimg.png" />';
                            }
                            html += '<h2>' + item.birthyear + ', ' + item.city + '</h2>';
                            html += '<div class="profile_row">';
                            if (item.mbti !== "" && item.mbti !== null) {
                                html += '<p class="mbti">' + item.mbti + '</p>';
                            } else {
                                html += '<p class="mbti nodata"></p>';
                            }
                            html += '<p class="mat_percent">' + item.match_rate + '%</p>';
                            html += '</div>';
                            html += '</a>';
                            html += '</div>';

                            $(".AImatch_list").append(html);
                        });
                    },
                    error: function(data, status, err) {
                        console.log(err);
                        alert('오류가 발생하였습니다. \n다시 시도해 주세요.');
                    },
                });
            }
            $(function() {
                AImatch('9');
            })
        </script>
        <div class="content_banner_top">
            <img src="/static/images/content_banner_top.png" />
        </div>
        <div class="content_no_img login_main">
            <div class="login_main_title">
                <h2>나와 딱 맞는 AI 매칭</h2>
                <div class="main_title_btn">
                    <button onclick="clickOn(this)" class="on" value="9">전체</button>
                    <button onclick="clickOn(this)" value="0">여성</button>
                    <button onclick="clickOn(this)" value="1">남성</button>
                </div>
            </div>
            <div class="login_main_list AImatch_list">


            </div>
        </div>
        <div class="content_no_img login_main">
            <div class="login_main_title">
                <h2>주중모임</h2>
            </div>
            <div class="group_row">
                <p class="group_week">주중</p>
                <div class="group_type">
                    <h2>
                        식사/술/차
                    </h2>
                    <div class="main_title_btn">
                        <button class="total">전체보기</button>
                        <button class="disabled">
                            < </button>
                                <button>></button>
                    </div>
                </div>
                <div class="login_main_list">
                    <div class="ai_group_card">
                        <img src="/static/images/group_main_01.png" />
                        <div class="group_particpnt">
                            <span>신청 2</span>/4명
                        </div>
                        <div class="group_location">
                            <img src="/static/images/ico_location_16x16.png">
                            서울/강남구
                        </div>
                        <div class="schedule_row">
                            <p>20,000원 <span>2023. 01. 24(수) 19:30</span></p>
                        </div>
                    </div>
                    <div class="ai_group_card">
                        <img src="/static/images/group_main_02.png" />
                        <div class="group_particpnt">
                            <span>신청 2</span>/4명
                        </div>
                        <div class="group_location">
                            <img src="/static/images/ico_location_16x16.png">
                            서울/강남구
                        </div>
                        <div class="schedule_row">
                            <p>20,000원 <span>2023. 01. 24(수) 19:30</span></p>
                        </div>
                    </div>
                    <div class="ai_group_card">
                        <img src="/static/images/group_main_03.png" />
                        <div class="group_particpnt">
                            <span>신청 2</span>/4명
                        </div>
                        <div class="group_location">
                            <img src="/static/images/ico_location_16x16.png">
                            서울/강남구
                        </div>
                        <div class="schedule_row">
                            <p>20,000원 <span>2023. 01. 24(수) 19:30</span></p>
                        </div>
                    </div>
                    <div class="ai_group_card">
                        <img src="/static/images/group_main_04.png" />
                        <div class="group_particpnt">
                            <span>신청 2</span>/4명
                        </div>
                        <div class="group_location">
                            <img src="/static/images/ico_location_16x16.png">
                            서울/강남구
                        </div>
                        <div class="schedule_row">
                            <p>20,000원 <span>2023. 01. 24(수) 19:30</span></p>
                        </div>
                    </div>

                </div>
            </div>
            <div class="group_row">
                <p class="group_week">주중</p>
                <div class="group_type">
                    <h2>
                        여행
                    </h2>
                    <div class="main_title_btn">
                        <button class="total">전체보기</button>
                        <button class="disabled">
                            < </button>
                                <button>></button>
                    </div>
                </div>
                <div class="login_main_list">
                    <div class="ai_group_card">
                        <img src="/static/images/group_main_05.png" />
                        <div class="group_particpnt">
                            <span>신청 2</span>/4명
                        </div>
                        <div class="group_location">
                            <img src="/static/images/ico_location_16x16.png">
                            서울/강남구
                        </div>
                        <div class="schedule_row">
                            <p>20,000원 <span>2023. 01. 24(수) 19:30</span></p>
                        </div>
                    </div>
                    <div class="ai_group_card">
                        <img src="/static/images/group_main_06.png" />
                        <div class="group_particpnt">
                            <span>신청 2</span>/4명
                        </div>
                        <div class="group_location">
                            <img src="/static/images/ico_location_16x16.png">
                            서울/강남구
                        </div>
                        <div class="schedule_row">
                            <p>20,000원 <span>2023. 01. 24(수) 19:30</span></p>
                        </div>
                    </div>
                    <div class="ai_group_card">
                        <img src="/static/images/group_main_07.png" />
                        <div class="group_particpnt">
                            <span>신청 2</span>/4명
                        </div>
                        <div class="group_location">
                            <img src="/static/images/ico_location_16x16.png">
                            서울/강남구
                        </div>
                        <div class="schedule_row">
                            <p>20,000원 <span>2023. 01. 24(수) 19:30</span></p>
                        </div>
                    </div>
                    <div class="ai_group_card">
                        <img src="/static/images/group_main_08.png" />
                        <div class="group_particpnt">
                            <span>신청 2</span>/4명
                        </div>
                        <div class="group_location">
                            <img src="/static/images/ico_location_16x16.png">
                            서울/강남구
                        </div>
                        <div class="schedule_row">
                            <p>20,000원 <span>2023. 01. 24(수) 19:30</span></p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="content_no_img login_main">
            <div class="login_main_title">
                <h2>주말모임</h2>
            </div>
            <div class="group_row">
                <p class="group_week">주말</p>
                <div class="group_type">
                    <h2>
                        식사/술/차
                    </h2>
                    <div class="main_title_btn">
                        <button class="total">전체보기</button>
                        <button class="disabled">
                            < </button>
                                <button>></button>
                    </div>
                </div>
                <div class="login_main_list">
                    <div class="ai_group_card">
                        <img src="/static/images/group_main_01.png" />
                        <div class="group_particpnt">
                            <span>신청 2</span>/4명
                        </div>
                        <div class="group_location">
                            <img src="/static/images/ico_location_16x16.png">
                            서울/강남구
                        </div>
                        <div class="schedule_row">
                            <p>20,000원 <span>2023. 01. 24(수) 19:30</span></p>
                        </div>
                    </div>
                    <div class="ai_group_card">
                        <img src="/static/images/group_main_02.png" />
                        <div class="group_particpnt">
                            <span>신청 2</span>/4명
                        </div>
                        <div class="group_location">
                            <img src="/static/images/ico_location_16x16.png">
                            서울/강남구
                        </div>
                        <div class="schedule_row">
                            <p>20,000원 <span>2023. 01. 24(수) 19:30</span></p>
                        </div>
                    </div>
                    <div class="ai_group_card">
                        <img src="/static/images/group_main_03.png" />
                        <div class="group_particpnt">
                            <span>신청 2</span>/4명
                        </div>
                        <div class="group_location">
                            <img src="/static/images/ico_location_16x16.png">
                            서울/강남구
                        </div>
                        <div class="schedule_row">
                            <p>20,000원 <span>2023. 01. 24(수) 19:30</span></p>
                        </div>
                    </div>
                    <div class="ai_group_card">
                        <img src="/static/images/group_main_04.png" />
                        <div class="group_particpnt">
                            <span>신청 2</span>/4명
                        </div>
                        <div class="group_location">
                            <img src="/static/images/ico_location_16x16.png">
                            서울/강남구
                        </div>
                        <div class="schedule_row">
                            <p>20,000원 <span>2023. 01. 24(수) 19:30</span></p>
                        </div>
                    </div>

                </div>
            </div>
            <div class="group_row">
                <p class="group_week">주말</p>
                <div class="group_type">
                    <h2>
                        여행
                    </h2>
                    <div class="main_title_btn">
                        <button class="total">전체보기</button>
                        <button class="disabled">
                            < </button>
                                <button>></button>
                    </div>
                </div>
                <div class="login_main_list">
                    <div class="ai_group_card">
                        <img src="/static/images/group_main_05.png" />
                        <div class="group_particpnt">
                            <span>신청 2</span>/4명
                        </div>
                        <div class="group_location">
                            <img src="/static/images/ico_location_16x16.png">
                            서울/강남구
                        </div>
                        <div class="schedule_row">
                            <p>20,000원 <span>2023. 01. 24(수) 19:30</span></p>
                        </div>
                    </div>
                    <div class="ai_group_card">
                        <img src="/static/images/group_main_06.png" />
                        <div class="group_particpnt">
                            <span>신청 2</span>/4명
                        </div>
                        <div class="group_location">
                            <img src="/static/images/ico_location_16x16.png">
                            서울/강남구
                        </div>
                        <div class="schedule_row">
                            <p>20,000원 <span>2023. 01. 24(수) 19:30</span></p>
                        </div>
                    </div>
                    <div class="ai_group_card">
                        <img src="/static/images/group_main_07.png" />
                        <div class="group_particpnt">
                            <span>신청 2</span>/4명
                        </div>
                        <div class="group_location">
                            <img src="/static/images/ico_location_16x16.png">
                            서울/강남구
                        </div>
                        <div class="schedule_row">
                            <p>20,000원 <span>2023. 01. 24(수) 19:30</span></p>
                        </div>
                    </div>
                    <div class="ai_group_card">
                        <img src="/static/images/group_main_08.png" />
                        <div class="group_particpnt">
                            <span>신청 2</span>/4명
                        </div>
                        <div class="group_location">
                            <img src="/static/images/ico_location_16x16.png">
                            서울/강남구
                        </div>
                        <div class="schedule_row">
                            <p>20,000원 <span>2023. 01. 24(수) 19:30</span></p>
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
    <footer class="footer">
        <div class="footer_logo mb40">
            matchfy
        </div>
        <div class="footer_link mb40">
            <a href="#">회사정보</a>
            <a href="/mo/privacy">개인정보 처리방침</a>
            <a href="/mo/terms">서비스 이용약관</a>
        </div>
        <div class="footer_info mb40">
            <span>(주)회사명 <img src="/static/images/part_line.png" /> 서울특별시 강남구 논현로 9길 26 길동빌딩 502호</span>
            <span>대표이사 : 홍길동 <img src="/static/images/part_line.png" /> 사업자등록번호 : 123-45-6789<img src="/static/images/part_line.png" /> gildong@naver.com</span>
        </div>
        <div class="footer_copy">
            COPYRIGHT 2023. ALL RIGHTS RESERVED.
        </div>

    </footer>

    <!-- SCRIPTS -->



    <!-- -->

</body>

</html>