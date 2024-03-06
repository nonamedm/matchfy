<html lang="ko">

<head>
    <title>Matchfy</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, viewport-fit=cover">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="pragma" content="no-cache">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="/static/css/common_mo.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/static/js/basic.js"></script>
</head>

<body class="mo_wrap">
    <div class="wrap">
        <!-- HEADER: MENU + HEROE SECTION -->
        <mobileheader style="height:44px; display: block;"></mobileheader>
        <header>

            <div class="menu">
                <ul>
                    <li class="left_arrow">
                        <img src="/static/images/left_arrow.png" />
                    </li>
                    <li class="header_title">
                        회원 안내
                    </li>
                </ul>
            </div>

        </header>

        <div class="sub_wrap">
            <div class="content_wrap">
                <div class="content_title">
                    <h2 class="member_grade">멤버십 등급에 따라<br />혜택을 제공 받으세요</h2>

                    <p>전달값 확인하기 :<br/> <?php foreach ($postData as $key => $value)
                                    {
                                        echo $key . ': ' . $value . '<br>';
                                    } ?></p>
                </div>
                <form class="main_signin_form" method="post" action="">
                    <div class="content_body">
                        <div class="grade_box">
                            <div class="grade_box_title">
                                <div class="chk_box radio_box">
                                    <input type="radio" id="grade01" name="grade" checked="">
                                    <label for="grade01">
                                        <h2>준회원</h2>
                                    </label>
                                </div>
                                <span>Free</span>
                            </div>
                            <div class="grade_box_cont">
                                <p>기본정보</p>
                                <span>이름 / 생년월일 / 성별</span>
                            </div>
                        </div>
                        <div class="grade_box">
                            <div class="grade_box_title">
                                <div class="chk_box radio_box">
                                    <input type="radio" id="grade02" name="grade" checked="">
                                    <label for="grade02">
                                        <h2>정회원 등급 업그레이드</h2>
                                    </label>
                                </div>
                                <div class="grade_box_price">
                                    <img src="/static/images/now_signin.png" />
                                    <div class="price_box">
                                        <p class="org_price">109,900</p>
                                        <p class="tot_price">99,000</p>
                                    </div>
                                </div>
                            </div>
                            <div class="grade_box_cont">
                                <p>기본정보 + 추가정보</p>
                                <span>결혼유무 / 흡연유무 / 음주회수(주) / 종교 /</span><br />
                                <span>MBTI/키/ 스타일 / 학력 / 학교명 / 전공 /</span><br />
                                <span>직업/ 자산구간 / 소득구간</span>
                            </div>
                        </div>
                        <div class="grade_box">
                            <div class="grade_box_title">
                                <div class="chk_box radio_box">
                                    <input type="radio" id="grade03" name="grade" checked="">
                                    <label for="grade03">
                                        <h2>프리미엄 등급 업그레이드</h2>
                                    </label>
                                </div>
                                <div class="grade_box_price">
                                    <img src="/static/images/now_signin.png" />
                                    <div class="price_box">
                                        <p class="org_price">1,399,900</p>
                                        <p class="tot_price">990,000</p>
                                    </div>
                                </div>
                            </div>
                            <div class="grade_box_cont">
                                <p>기본정보 + 추가정보 인증</p>
                                <span>추가 정보 중</span><br />
                                <span>확인 가능한 정보 인증 </span>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="btn_group multy">
                    <button type="button" class="btn type02">취소</button>
                    <button type="button" class="btn type01"
                        onclick='signIn(<?php echo json_encode($postData); ?>)'>다음</button>
                </div>
            </div>
        </div>
    </div>





    <div style="height: 50px;"></div>
    <footer class="footer">

        <!-- <div class="footer_logo mb40">
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
            </div> -->

    </footer>
    </div>


    <!-- SCRIPTS -->

    <script>

    </script>

    <!-- -->


</body>

</html>