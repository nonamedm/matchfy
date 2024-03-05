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
                        휴대폰 본인인증
                    </li>
                </ul>
            </div>

        </header>

        <div class="sub_wrap">
            <div class="content_wrap">
                <div class="content_title">
                    <h2>휴대폰 본인인증</h2>
                    <p>원활한 서비스 이용을 위해 휴대전화 본인인증이 필요합니다. </p>
                </div>
                <div class="content_body">
                    <img src="/static/images/pass_phone_img.png" />
                </div>
                <div class="btn_group">
                    <button type="button" class="btn type01" onclick="certIdentify()">휴대폰 본인인증</button>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        // $(document).ready(function () {
        //     $.ajax({
        //         url: "/ajax/delCmt",
        //         type: "post",
        //         data: { cmt_idx: '_cmt_idx', trgt_id: '_trgt_id', trgt_idx: '_trgt_idx' }, //
        //         dataType: "json",
        //         async: false,
        //         success: function (data) {
        //             console.log(data);
        //             if (data) {
        //                 // 성공
        //                 //console.log('111');
                        
        //             } else {
        //                 // 삭제 성공
        //                 //console.log('222');
        //                 alert("오류가 발생하였습니다. \n다시 시도해 주세요.");
        //             }
        //             return false;
        //         },
        //         error: function (data, status, err) {
        //             alert("there was an error while fetching events!");
        //             console.log(err);
        //         },
        //     });
        // });
    </script>

    <!-- -->


</body>

</html>