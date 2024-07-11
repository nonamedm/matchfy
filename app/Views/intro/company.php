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
        <div class="company-main fade-in">
            <span class="company-main-text">
                큐브베리는 AI 기술을 통해 비즈니스 변혁을 이끄는 기업입니다.<br />
                맞춤형 AI 솔루션과 빅데이터 분석으로, 고객의 복잡한 도전과제를 단순화하고,<br />
                효율성을 증대시키며, 전략적 가치를 창출합니다.<br />
                큐브베리와 함께, AI의 무한한 가능성을 경험하세요.
            </span>
            <div class="company-bg"></div>
            <div class="company-overlay"></div>
        </div>

        <div class="contents-box">
            <span class="contents-title hidden">
                Business
            </span>

            <ul class="contents-ul">
                <li class="contents-li hidden">
                    <div class="contents-text">
                        <span>생성형 AI 모델 기반 솔루션 구축</span>
                        <p>고도화된 AI솔루션을 맞춤 설계하여 비즈니스 문제를 해결하고 프로세스를 최적화합니다. 데이터 분석에서부터 의사결정 시스템까지, 각 기업의 니즈를 충족시키기 위한 맞춤형 AI 알고리즘을 개발합니다. 이를 통해 고객사의 운영 효율성을 향상시키고, 시장 내 경쟁력을 강화합니다.</p>
                    </div>
                    <span class="plus-btn">
                        <a href="#">+</a>
                    </span>
                </li>

                <li class="contents-li hidden">
                    <div class="contents-text">
                        <span>AI 기반 앱서비스 구축 · 운영</span>
                        <p>큐브베리의 AI기반 앱과 웹 서비스는 사용자 경험을 향상시키는 알고리즘을 추구합니다. 사용자 데이터를 분석하고 학습하여, 각 사용자 맞춤 컨텐츠를 제공하고, 사용자의 상호작용을 촉진하는 서비스를 구축합니다. 사용자가 필요로 하는 정보와 서비스를 빠르게 제공함으로써, 고객 참여를 극대화하고 비즈니스 성장을 가속화 합니다.</p>

                    </div>
                    <span class="plus-btn">
                        <a href="#">+</a>
                    </span>
                </li>

                <li class="contents-li hidden">
                    <div class="contents-text">
                        <span>미디어 콘텐츠 마케팅</span>
                        <p>큐브베리의 미디어 콘텐츠 마케팅은 전문적인 콘텐츠 기획과 제작으로 핵심 메시지를 소비자에게 정확하게 전달하고 소비자의 공감을 이끌어 내 지속적인 확산 및 콘텐츠 재생산을 유도합니다. AI를 적용해 목표 시장에서 가장 효과적인 콘텐츠 전략을 개발하며, 데이터를 기반으로 캠페인의 성과를 최적화하고  마케팅 비용 대비 효과를 극대화하는 데 집중합니다.</p>
                    </div>
                    <span class="plus-btn">
                        <a href="#">+</a>
                    </span>
                </li>
            </ul>

            <div class="plus-contents">
                <div class="plus-contents-box hidden">
                    <div class="text">
                        Executives and organization
                    </div>
                    <span class="plus plus_organ_btn">
                        <a href="#">+</a>
                    </span>
                </div>
                <div class="organ_img hidden">
                    <img src="/static/images/intro/organization_img.png" />
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