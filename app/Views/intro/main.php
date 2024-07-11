<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Matchfy</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=3.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <link rel="stylesheet" href="/static/css/intro.css">
    <link rel="stylesheet" href="/static/css/scroll.css">
    <script src="/static/js/jquery.min.js"></script>
    <script src="/static/js/intro/intro.js"></script>
    <script src="/static/js/intro/scroll.js"></script>
</head>

<body>
    <header class="header">
        <div class="cubberry-logo">
        </div>
        <ul class="menu">
            <li class="item-link-service link-a">
                <a href="/intro/main">Service</a>
                <ul class="submenu">
                    <li class="submenu-50 link-a">
                        <a href="/intro/main">매치파이</a>
                    </li>
                    <li class="ai-5 link-a">
                        <a href="/intro/animatedAi">애니메틱 AI</a>
                    </li>
                </ul>
            </li>
            <li class="item-link-company link-a">
                <a href="/intro/company">company</a>
            </li>
            <li class="item-link-careers link-a">
                <a href="/intro/media">Media</a>
            </li>
            <li class="item-link-conference link-a" onclick="concatBtn();">
                <a href="#">contact</a>
            </li>
        </ul>
    </header>

    <nav role="navigation" class="mobileHedaer">
        <div id="menuToggle">

            <input type="checkbox" />

            <span></span>
            <span></span>
            <span></span>

            <ul id="menu">
                <a href="/intro/main">
                    <li>Home</li>
                </a>
                <a href="/intro/animatedAi">
                    <li>애니메틱 AI</li>
                </a>
                <a href="/intro/company">
                    <li>company</li>
                </a>
                <a href="/intro/media">
                    <li>Media</li>
                </a>
                <a href="#" onclick="concatBtn();">
                    <li>Contact</li>
                </a>
            </ul>
        </div>
    </nav>

    <div class="contents">
        <div class="section-01 ">
            <div class="main-title">
                세상에 없던 AI 커플 매칭 서비스
            </div>
            <div class="matchfy-main-img">
                <div class="matchfy-logo-img">
                </div>
            </div>
            <div class="link">
                <span class="service_btn link-a">
                    <a href="https://matchfy.net">서비스 바로가기</a>
                </span>
            </div>
            <div class="link-list">
                <div class="item-link-web-service">
                    <div class="icon-web-service-img">
                    </div>
                    <span class="web-service-text">
                        Web Service
                    </span>
                </div>
                <div class="item-link-web-android">
                    <div class="icon-android-img">
                        <img class="icon-img" src="/static/images/intro/icon-android.png" />
                    </div>
                    <span class="web-android-text">
                        Android
                    </span>
                </div>
                <div class="item-link-ios">
                    <div class="icon-ios-img">
                        <img class="icon-img2" src="/static/images/intro/icon-ios.png" />
                    </div>
                    <span class="web-ios-text">
                        iOS
                    </span>
                </div>
            </div>
            <div class="sec-con-bg">
                <img src="/static/images/intro/main_con_img_group.png" />
            </div>
        </div>

        <div class="secion">
            <div class="sec-con hidden">
                <span class="sub_title">내게 필요한걸 모두 채워주는</span></br>
                <span class="title">세상에없던 </br><b>AI커플 매칭 서비스</b></span>
            </div>

            <div class="section-02-img hidden">
                <img src="/static/images/intro/section02_con_img.png" />
            </div>

        </div>

        <div class="section-03 secion">
            <div class="sec-con hidden">
                <span class="sub_title">친구보다 나를 더 잘 아는</span></br>
                <span class="title"><b>AI매니저</b>에게 받는</br><b>소개팅</b></span>
            </div>

            <div class="sec03-content">
                <span class="con-bold hidden">I. 똑똑한 AI매니저가 나와 딱 맞는 상대를 소개합니다.</span></br>
                <span class="con-light hidden">딥러닝 AI매니저가 서로의 프로필 학습 및 매칭</span></br></br>
                <span class="con-bold hidden">II. 친구에게 소개받듯 믿고 만날 수 있는 상대를 소개합니다.</span></br>
                <span class="con-light hidden">꼼꼼한 프로필 확인을 통한 인증뱃지 부여</span></br></br>
                <span class="con-bold hidden">III. 합리적인 비용으로 매칭 서비스를 제공합니다.</span></br>
                <span class="con-light hidden">수익구조 혁신을 통해 정회원의 매칭 및 정보조회 별 과금 없음</span></br>
            </div>
        </div>

        <div class="section-04">
            <div class="sec04-con">
                <div class="section-num-title-box hidden">
                    <div class="section-num-box">
                        <div class="section-num-circle">
                        </div>
                        <span class="section-num-text">
                            1
                        </span>
                    </div>
                    <span class="section-num-title">
                        프로필
                    </span>
                </div>
                <p class="section-title hidden">
                    <span>AI추천 매칭상대 찾기</span></br>
                    <!-- <span>매칭 99% 멤버찾기</span> -->
                </p>
                <span class="section-subtitle hidden">
                    등록한 프로필로<br />
                    매칭점수가 높은 상대를 찾을 수 있어요.
                </span>
            </div>
            <div class="section-box-img hidden">
                <img src="/static/images/intro/section04_img.png" />
            </div>
        </div>

        <div class="section-05">
            <div class="sec05-con">
                <img src="/static/images/intro/section05_img.png" />
            </div>
            <div class="txt">
                <div class="section-num-title-box hidden">
                    <div class="section-num-box">
                        <div class="section-num-circle">
                        </div>
                        <span class="section-num-text">
                            2
                        </span>
                    </div>
                    <span class="section-num-title">
                        매칭점수
                    </span>
                </div>
                <p class="section-title hidden">
                    <span>AI추천 상대와의 대화,</br>
                        오프라인 모임 참여</span>
                </p>
                <span class="section-subtitle hidden">
                    대화중에도 모임에서도<br />
                    매칭 점수가 높은 상대를 찾을 수 있어요
                </span>
            </div>
        </div>

        <div class="section-06">

            <div class="container-2">
                <div class="section-04-title hidden">
                    <span class="heading-2-your-first-ai-agent-1">
                        세상에 없던 AI 커플 매칭 서비스
                    </span>
                    <div class="matchfy-bi-white-bg-102">
                    </div>
                </div>
                <div class="list-1 hidden">
                    <div class="link-2">
                        <span class="container-34 link-a">
                            <a href="/">서비스 바로가기</a>
                        </span>
                    </div>
                    <div class="item-link-1">
                        <div class="logo-1">
                        </div>
                        <span class="heading-3-web-service">
                            Web Service
                        </span>
                    </div>
                    <div class="item-link-2">
                        <div class="footer-icon-android-svg">
                            <img class="clip-path-group" src="/static/images/intro/icon-android.png" />
                        </div>
                        <span class="heading-3-android">
                            Android
                        </span>
                    </div>
                    <div class="item-link-3">
                        <div class="footer-icon-ios-svg">
                            <img class="container-26" src="/static/images/intro/icon-ios.png" />
                        </div>
                        <span class="heading-3-ios">
                            iOS
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="section">
            <div class="container-1">
                <div class="heading-2-your-first-ai-agent">
                    Business Partners
                </div>
                <div class="footer-logogr-img">
                    <img src="/static/images/intro/footer_logo_gb.png" />
                </div>
                <div class="border">
                    <div class="footer-container">
                        <div class="list">
                            <span class="item">
                                CUBEBERRY Co.,Ltd<br />
                                #1612, Renaissance Tower, 14, Mallijae-ro, Mapo-gu, Seoul, Republic of Korea<br />
                                사업자 등록번호: 480-88-03079｜대표: 이진서
                            </span>
                        </div>
                        <span class="cube-berry-all-rights-reserved">
                            ⓒ 2023. CUBE BERRY All rights reserved.
                        </span>
                    </div>
                    <div class="container">
                        <div class="item-1" id="company_concat" tabindex="0">
                            <p>Tel. 02-6941-0941</p>
                            <p>Email. hi@cuberry.kr</p>
                        </div>
                        <div class="input">
                            <span class="container-14 link-a">
                                <a href="mailto:hi@cuberry.kr"> 메일 보내기</a>
                            </span>
                        </div>
                    </div>
                    <div class="scroll-top" onclick="scrollToTop()">
                        <span class="scroll-top-text">
                            ^
                        </span>
                    </div>
                </div>
            </div>
            <!--  -->
        </div>
    </div>

</body>

</html>