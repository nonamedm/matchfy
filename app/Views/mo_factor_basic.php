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
    <script src="/static/js/jquery.min.js"></script>
    <script src="/static/js/basic.js"></script>
</head>

<body class="mo_wrap">
    <div class="wrap">
        <!-- HEADER: MENU + HEROE SECTION -->
        <mobileheader style="height:44px; display: block;"></mobileheader>

        <?php $title = "내 상대";
        include 'header.php'; ?>

        <div class="sub_wrap">
            <div class="content_wrap">
                <div class="content_partner">
                    <div class="content_partner_header">
                        <p>
                            <?= $name ?>님, 반갑습니다.<br />
                            어떤 친구를 원하시나요?
                        </p>
                        <h2>만나고 싶은 친구의 정보를<br />
                            입력해주세요! </h2>
                    </div>
                    <img src="/static/images/partner.png" />
                </div>
                <div class="content_partner" style="margin: 50px 5px;">
                    <div class="content_partner_header">
                        <h2>기본 배점 설정 </h2>
                        <p style="margin-top: 20px;">[선택 사항]</p>
                        <p style="text-indent: -10px;">
                            * 입력하는 각 항목에 대해 아래와 같이 세 그룹으로 나뉘고<br/>
                            각각에 기본 배점이 적용 되어있습니다.<br/>
                            더 정확한 매칭을 위해 본인이 원하는 대로 각 항목의<br/>
                            배점을 수정할 수 있습니다.
                        </p>
                    </div>
                </div>
                <form class="main_signin_form" enctype="multipart/form-data">
                    <legend></legend>
                    <div class="">
                        <div class="form_row signin_form">
                            <div class="signin_form_div flex">
                                <label for="group1" class="signin_label">MBTI / 얼굴형 / 스타일 / 음주횟수</label>
                                <select id="group1" name="group1">
                                    <option value="5" selected>5</option>
                                    <option value="10">10</option>
                                    <option value="30">30</option>
                                    <option value="50">50</option>
                                    <option value="70">70</option>
                                </select>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div flex">
                                <label for="group2" class="signin_label">나이 / 체형 / 지역<br/>결혼경험 / 흡연유무 / 종교</label>
                                <select id="group2" name="group2">
                                    <option value="5" selected>5</option>
                                    <option value="10">10</option>
                                    <option value="30">30</option>
                                    <option value="50">50</option>
                                    <option value="70">70</option>
                                </select>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div flex">
                                <label for="group3" class="signin_label">성별 / 키 / 학력 / 직업<br/> 자산구간 / 소득구간</label>
                                <select id="group3" name="group3">
                                    <option value="5" selected>5</option>
                                    <option value="10">10</option>
                                    <option value="30">30</option>
                                    <option value="50">50</option>
                                    <option value="70">70</option>
                                </select>
                            </div>
                        </div>
                        <div class="btn_group">
                            <button type="button" class="btn type01" onclick="savePartnerInfo()">저장</button>
                        </div>
                    </div>
                </form>
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
        $(document).ready(function () {

        });
    </script>

    <!-- -->


</body>

</html>