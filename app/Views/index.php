<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Matchfy</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">

    <link rel="stylesheet" href="/static/css/common.css">
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
            float: left;
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

                <li class="menu_item">
                    <button class="login_btn" onclick="moveToUrl('/mo')"><img src="/static/images/login_ico.png" />
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


    <!-- FOOTER: DEBUG INFO + COPYRIGHTS -->

    <!-- <div style="height: 50px;"></div> -->
<footer class="footer">
        

        <div class="footer_logo mb40">
            matchfy
        </div>
        <div class="footer_link mb40">
            <a href="#">회사정보</a>
            <a href="#">개인정보 처리방침</a>
            <a href="#">서비스 이용약관</a>
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
        
    </script>

    <!-- -->

</body>

</html>