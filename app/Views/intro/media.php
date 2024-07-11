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
                <a href="#">Contact</a>
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

        <div class="contents-box">
            <span class="contents-title fade-in">
                Media
            </span>

            <ul class="contents-media-ul">
                <?php foreach ($newss as $news) : ?>
                    <li class="contents-media-li hidden">
                        <a href="<?php if ($news['bigo2']) {
                                        echo $news['bigo2'];
                                    } else {
                                        echo "/intro/mediaView/" . $news['id'];
                                    } ?>" target="_blank">
                            <?php
                            if ($news['bigo1']) {
                                $typename;
                                $typeclass;
                                if ($news['bigo1'] == '01') {
                                    $typename = '언론보도';
                                    $typeclass = 'media-type';
                                } else {
                                    $typename = '보도자료';
                                    $typeclass = 'media-type2';
                                }
                                echo "<div class='" . $typeclass . "'>" . $typename . "</div>";
                            }
                            ?>
                            <div class="media-box">
                                <?php
                                $title = $news['title'];
                                $max_length = 20;

                                if (mb_strlen($title) > $max_length) {
                                    $title = mb_substr($title, 0, $max_length);
                                    $title = preg_replace('/\s+[^ ]*$/', '', $title);
                                    $title = preg_replace('/\r?\n|\r/', '', $title);
                                    $title .= '...';
                                }
                                ?>
                                <span class="media-title"> <strong><?= $title ?></strong></span>
                                <span class="media-date"><i class="fa-solid fa-calendar-days"></i><?= date('Y년 m월 d일', strtotime($news['created_at'])) ?></span>
                            </div>
                        </a>
                    </li>
                <?php endforeach; ?>
                <!-- <div class="page-box">
                    <ul>
                        <li class="on">1</li>
                        <li>2</li>
                        <li>3</li>
                        <li>4</li>
                    </ul>
                </div> -->
            </ul>

            <div class="plus-contents">
                <div class="plus-contents-box hidden">
                    <div class="text">
                        Image file
                    </div>
                    <span class="plus plus_media_btn">
                        <a href="#">+</a>
                    </span>
                </div>
                <div class="media_img hidden">
                    <img src="/static/images/intro/media_img.png" />
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