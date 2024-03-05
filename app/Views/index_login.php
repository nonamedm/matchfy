<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Matchfy</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">

    <link rel="stylesheet" href="/static/css/common.css">

    <!-- STYLES -->

    <style {csp-style-nonce}>
        * {
            transition: background-color 300ms ease, color 300ms ease;
        }

        *:focus {
            background-color: rgba(221, 72, 20, .2);
            outline: none;
        }

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

        header li a {
            border-radius: 5px;
            color: rgba(0, 0, 0, .5);
            display: block;
            height: 44px;
            text-decoration: none;
        }

        header li.menu-item a {
            border-radius: 5px;
            margin: 5px 0;
            height: 38px;
            line-height: 36px;
            padding: .4rem .65rem;
            text-align: center;
        }

        header li.menu-item a:hover,
        header li.menu-item a:focus {
            background-color: rgba(221, 72, 20, .2);
            color: rgba(221, 72, 20, 1);
        }

        header .logo {
            float: left;
            height: 44px;
            padding: .4rem .5rem;
        }

        header .menu-toggle {
            display: none;
            float: right;
            font-size: 2rem;
            font-weight: bold;
        }

        header .menu-toggle button {
            background-color: rgba(221, 72, 20, .6);
            border: none;
            border-radius: 3px;
            color: rgba(255, 255, 255, 1);
            cursor: pointer;
            font: inherit;
            font-size: 1.3rem;
            height: 36px;
            padding: 0;
            margin: 11px 0;
            overflow: visible;
            width: 40px;
        }

        header .menu-toggle button:hover,
        header .menu-toggle button:focus {
            background-color: rgba(221, 72, 20, .8);
            color: rgba(255, 255, 255, .8);
        }

        header .heroe {
            margin: 0 auto;
            max-width: 1100px;
            padding: 1rem 1.75rem 1.75rem 1.75rem;
        }

        header .heroe h1 {
            font-size: 2.5rem;
            font-weight: 500;
        }

        header .heroe h2 {
            font-size: 1.5rem;
            font-weight: 300;
        }

        section {
            margin: 0 auto;
            max-width: 1100px;
            padding: 2.5rem 1.75rem 3.5rem 1.75rem;
        }

        section h1 {
            margin-bottom: 2.5rem;
        }

        section h2 {
            font-size: 120%;
            line-height: 2.5rem;
            padding-top: 1.5rem;
        }

        section pre {
            background-color: rgba(247, 248, 249, 1);
            border: 1px solid rgba(242, 242, 242, 1);
            display: block;
            font-size: .9rem;
            margin: 2rem 0;
            padding: 1rem 1.5rem;
            white-space: pre-wrap;
            word-break: break-all;
        }

        section code {
            display: block;
        }

        section a {
            color: rgba(221, 72, 20, 1);
        }

        section svg {
            margin-bottom: -5px;
            margin-right: 5px;
            width: 25px;
        }

        /* .further {
            background-color: rgba(247, 248, 249, 1);
            border-bottom: 1px solid rgba(242, 242, 242, 1);
            border-top: 1px solid rgba(242, 242, 242, 1);
        } */
        .further h2:first-of-type {
            padding-top: 0;
        }

        footer {
            background-color: rgba(221, 72, 20, .8);
            text-align: center;
        }

        footer .environment {
            color: rgba(255, 255, 255, 1);
            padding: 2rem 1.75rem;
        }

        footer .copyrights {
            background-color: rgba(62, 62, 62, 1);
            color: rgba(200, 200, 200, 1);
            padding: .25rem 1.75rem;
        }

        @media (max-width: 629px) {
            header ul {
                padding: 0;
            }

            header .menu-toggle {
                padding: 0 1rem;
            }

            header .menu-item {
                background-color: rgba(244, 245, 246, 1);
                border-top: 1px solid rgba(242, 242, 242, 1);
                margin: 0 15px;
                width: calc(100% - 30px);
            }

            header .menu-toggle {
                display: block;
            }

            header .hidden {
                display: none;
            }

            header li.menu-item a {
                background-color: rgba(221, 72, 20, .1);
            }

            header li.menu-item a:hover,
            header li.menu-item a:focus {
                background-color: rgba(221, 72, 20, .7);
                color: rgba(255, 255, 255, .8);
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

                <li class="menu_item">

                    <button class="login_btn" href="#" target="_blank"><img src="/static/images/login_ico.png" />
                        <p>로그인</p>
                    </button>
                </li>
            </ul>
        </div>

    </header>
    <div class="content">
        <div class="main_bg_center_box">
            <h2>AI가 분석하고 소개하는 <span>매치파이</span></h2>
            <p>똑똑한 AI가 나와 딱 맞는 상대를 소개해드립니다.</p>
            <button>지금 매칭하기</button>
        </div>
    </div>

    <div class="content_banner_top">
        <img src="/static/images/content_banner_top.png" />
    </div>
    <div class="content_no_img login_main">
        <div class="login_main_title">
            <h2>나와 딱 맞는 AI 매칭</h2>
            <div class="main_title_btn">
                <button>전체</button>
                <button class="on">여성</button>
                <button>남성</button>
            </div>
        </div>
        <div class="login_main_list">
            <div class="ai_mat_card">
                <img src="/static/images/main_ai_1.png" />
                <h2>96, 서울/강남</h2>
                <div class="profile_row">
                    <p class="mbti">ENFJ</p>
                    <p class="mat_percent">99%</p>
                </div>
            </div>
            <div class="ai_mat_card">
                <img src="/static/images/main_ai_2.png" />
                <h2>96, 서울/강남</h2>
                <div class="profile_row">
                    <p class="mbti">ENFJ</p>
                    <p class="mat_percent">99%</p>
                </div>
            </div>
            <div class="ai_mat_card">
                <img src="/static/images/main_ai_3.png" />
                <h2>96, 서울/강남</h2>
                <div class="profile_row">
                    <p class="mbti">ENFJ</p>
                    <p class="mat_percent">99%</p>
                </div>
            </div>
            <div class="ai_mat_card">
                <img src="/static/images/main_ai_4.png" />
                <h2>96, 서울/강남</h2>
                <div class="profile_row">
                    <p class="mbti">ENFJ</p>
                    <p class="mat_percent">99%</p>
                </div>
            </div>
            <div class="ai_mat_card">
                <img src="/static/images/main_ai_5.png" />
                <h2>96, 서울/강남</h2>
                <div class="profile_row">
                    <p class="mbti">ENFJ</p>
                    <p class="mat_percent">99%</p>
                </div>
            </div>
            <div class="ai_mat_card">
                <img src="/static/images/main_ai_6.png" />
                <h2>96, 서울/강남</h2>
                <div class="profile_row">
                    <p class="mbti">ENFJ</p>
                    <p class="mat_percent">99%</p>
                </div>
            </div>

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
                    <button class="disabled"><</button>
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
                    <button class="disabled"><</button>
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
                    <button class="disabled"><</button>
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
                    <button class="disabled"><</button>
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
    


    <!-- FOOTER: DEBUG INFO + COPYRIGHTS -->

    <div style="height: 50px;"></div>
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
            <span>대표이사 : 홍길동 <img src="/static/images/part_line.png" /> 사업자등록번호 : 123-45-6789<img
                    src="/static/images/part_line.png" /> gildong@naver.com</span>
        </div>
        <div class="footer_copy">
            COPYRIGHT 2023. ALL RIGHTS RESERVED.
        </div>

    </footer>

    <!-- SCRIPTS -->

    <script>
        function toggleMenu() {
            var menuItems = document.getElementsByClassName('menu-item');
            for (var i = 0; i < menuItems.length; i++) {
                var menuItem = menuItems[i];
                menuItem.classList.toggle("hidden");
            }
        }
    </script>

    <!-- -->

</body>

</html>