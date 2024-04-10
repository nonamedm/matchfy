<html lang="ko">

<head>
    <title>Matchfy</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, viewport-fit=cover">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="pragma" content="no-cache">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="/static/css/common_mo.css">
    <script src="/static/js/jquery.min.js"></script>
    <script src="/static/js/basic.js"></script>
</head>
<style>
    .temp_input_text {
        border: 1px solid #dddddd;
        width: 335px;
        height: 50px;
        background: #ffffff;
        border-radius: 15px;
        font-size: 15px;
        color: #999999;
        margin: 10px;
        padding: 10px;
    }
</style>

<body class="mo_wrap">
    <div class="wrap">
        <!-- HEADER: MENU + HEROE SECTION -->
        <mobileheader style="height:44px; display: block;"></mobileheader>

        <?php $title = "휴대폰 본인인증";
        include 'header.php'; ?>

        <div class="sub_wrap">
            <form class="temp_input" action="/mo/alliance/agree" method="post">
            <div class="content_wrap">
                    <div class="content_title">
                        <h2>휴대폰 본인인증</h2>
                        <p>원활한 서비스 이용을 위해 휴대전화 본인인증이 필요합니다. </p>
                    </div>
                    <div class="content_body">
                        <img src="/static/images/pass_phone_img.png" />
                    </div>
                    <div class="btn_group">
                        <button type="button" class="btn type01" onclick="alianceCertIdentify()">휴대폰 본인인증</button>
                    </div>
            </div>
            <div class="content_title">
                <p>* 추후 본인인증 서비스를 연결할 때 까지는 개인정보 직접입력이 필요합니다.</p>
            </div>
            <input id="input_ali_name" class="temp_input_text" type="text" name="name" placeholder="대표명" value="<?= $name ?>" />
            <input id="input_ali_mobile_no" class="temp_input_text" type="text" name="mobile_no" placeholder="대표 연락처" value="<?= $mobile_no ?>" />
            <input id="input_ali_company_name" class="temp_input_text" type="text" name="company" placeholder="업체명" value="<?= $company ?>" />
            <select id="input_gender" class="temp_input_text" name="gender">
                <option>성별을 선택하세요</option>
                <option value="0" <?php if ($gender === '0') : ?>selected<?php endif ?>>여성</option>
                <option value="1" <?php if ($gender === '1') : ?>selected<?php endif ?>>남성</option>
            </select>
            </form>
        </div>


        <div style="height: 50px;"></div>
        <footer class="footer">

        </footer>
    </div>


    <!-- SCRIPTS -->
    <script src="/static/js/jquery.min.js"></script>
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