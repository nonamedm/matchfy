<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Matchfy</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <a href="/intro/main"><li>Home</li></a>
            <a href="/intro/animatedAi"><li>애니메틱 AI</li></a>
            <a href="/intro/company"><li>company</li></a>
            <a href="/intro/media"><li>Media</li></a>
            <a href="#" onclick="concatBtn();"><li>Contact</li></a>
            </ul>
        </div>
    </nav>

    <div class="contents">
        <div class="contents-box">
            <div class="animated-box">
                <span class="animated-title fade-in">
                    생성형 AI기술을 활용한 스토리보드 애니메이션 메이커
                </span>
                <p class="fade-in">
                    애니메틱 AI
                </p>
            </div>

            <div class="animated-img">
                <div class="animated-img-box hidden">
                    <img src="/static/images/intro/animated_img.png" />
                </div>
                <div class="animated-img-box hidden">
                    <img src="/static/images/intro/animated_img2.png" />
                </div>
            </div>

            <div class="animated-box-02">
                <p class="animated-title hidden">
                    <span class="text">애니메틱 AI란?</span>
                </p>

                <div class="animated-contents hidden">
                    생성형 AI 기술을 활용하여 스토리보드 또는 웹툰 등의 시작 프레임과 최종프레임의 중간 프레임을 자동으로 생성하고 하나의 애니메이션으로 완성해 주는 보간기술(frame interpolation)솔루션<br />
                </div>

                <p class="animated-title hidden">
                    <span class="text">애니메틱 AI의 Vision</span>
                </p>

                <div class="animated-contents hidden">
                    <ul>
                        <li>드라마, 영화, 광고 등 영상물 제작 시 원활한 소통을 위한 프리비주얼 애니메이션 제작 용이 (컨셉 검증 및 시각적 스토리텔링 구체화)</li>
                        <li>아키텍쳐 및 건축 프로젝트의 시각적 프리비주얼로 활영하여 디자인 아이디어를 고객 및 투자자에게 효과적으로 전달</li>
                        <li>대규모 이벤트의 시나리오 및 플로우를 시각화하여 이벤트 기획의 효율성을 높이고 참여자에게 명확한 개념 전달</li>
                        <li>카툰, 웹툰을 애니메이션화 할 때 시간과 비용이 획기적으로 감소</li>
                    </ul>
                </div>

                <div class="animated-p hidden">
                    *개발 진행 및 특허 출원 준비 중
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

        </div>
    </div>

</body>

</html>