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
                <form class="main_signin_form" enctype="multipart/form-data">
                    <legend></legend>
                    <div class="content_partner" style="margin: 50px 5px;">
                        <div class="content_partner_header">
                            <h2>가중치 항목 설정 </h2>
                            <p style="margin-top: 20px;">[선택 사항]</p>
                            <p style="text-indent: -10px;">
                                * 더 정확한 매칭을 위해, 상대를 선택할때<br />
                                중점을 두는 사항에 대해 가중치를 설정해보세요
                            </p>
                        </div>
                    </div>
                    <div class="content_partner content_factor" style="margin: 50px 5px;">
                        <div class="content_partner_header">
                            <p style="margin-top: 20px;">4순위까지 선택이 가능하며</p>
                            <br />
                            <p>4개 항목 선택시<br />
                                1순위 X 40점<br />
                                2순위 X 30점<br />
                                3순위 X 20점<br />
                                4순위 X 10점<br />
                            </p>
                            <br />
                            <p>3개 항목 선택시<br />
                                1순위 X 50점<br />
                                2순위 X 30점<br />
                                3순위 X 20점<br />
                            </p>
                            <br />
                            <p>2개 항목 선택시<br />
                                1순위 X 60점<br />
                                2순위 X 40점<br />
                            </p>
                            <br />
                            <p>과 같이 가중치가 반영됩니다</p>
                        </div>
                    </div>
                    <div class="">
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="first_factor" class="signin_label">1순위</label>
                                <select id="first_factor" name="first_factor">
                                    <option value>미선택</option>
                                    <option value="mbti">MBTI</option>
                                    <option value="animal_type1">얼굴형</option>
                                    <option value="stylish">스타일</option>
                                    <option value="drinking">음주횟수</option>
                                    <option value="birthday">나이</option>
                                    <option value="bodyshape">체형</option>
                                    <option value="city">지역</option>
                                    <option value="married">결혼경험</option>
                                    <option value="smoker">흡연유무</option>
                                    <option value="religion">종교</option>
                                    <option value="gender">성별</option>
                                    <option value="height">키</option>
                                    <option value="education">학력</option>
                                    <option value="job">직업</option>
                                    <option value="asset_range">자산구간</option>
                                    <option value="income_range">소득구간</option>
                                </select>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="second_factor" class="signin_label">2순위</label>
                                <select id="second_factor" name="second_factor">
                                    <option value>미선택</option>
                                    <option value="mbti">MBTI</option>
                                    <option value="animal_type1">얼굴형</option>
                                    <option value="stylish">스타일</option>
                                    <option value="drinking">음주횟수</option>
                                    <option value="birthday">나이</option>
                                    <option value="bodyshape">체형</option>
                                    <option value="city">지역</option>
                                    <option value="married">결혼경험</option>
                                    <option value="smoker">흡연유무</option>
                                    <option value="religion">종교</option>
                                    <option value="gender">성별</option>
                                    <option value="height">키</option>
                                    <option value="education">학력</option>
                                    <option value="job">직업</option>
                                    <option value="asset_range">자산구간</option>
                                    <option value="income_range">소득구간</option>
                                </select>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="third_factor" class="signin_label">3순위</label>
                                <select id="third_factor" name="third_factor">
                                    <option value>미선택</option>
                                    <option value="mbti">MBTI</option>
                                    <option value="animal_type1">얼굴형</option>
                                    <option value="stylish">스타일</option>
                                    <option value="drinking">음주횟수</option>
                                    <option value="birthday">나이</option>
                                    <option value="bodyshape">체형</option>
                                    <option value="city">지역</option>
                                    <option value="married">결혼경험</option>
                                    <option value="smoker">흡연유무</option>
                                    <option value="religion">종교</option>
                                    <option value="gender">성별</option>
                                    <option value="height">키</option>
                                    <option value="education">학력</option>
                                    <option value="job">직업</option>
                                    <option value="asset_range">자산구간</option>
                                    <option value="income_range">소득구간</option>
                                </select>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="fourth_factor" class="signin_label">4순위</label>
                                <select id="fourth_factor" name="fourth_factor">
                                    <option value>미선택</option>
                                    <option value="mbti">MBTI</option>
                                    <option value="animal_type1">얼굴형</option>
                                    <option value="stylish">스타일</option>
                                    <option value="drinking">음주횟수</option>
                                    <option value="birthday">나이</option>
                                    <option value="bodyshape">체형</option>
                                    <option value="city">지역</option>
                                    <option value="married">결혼경험</option>
                                    <option value="smoker">흡연유무</option>
                                    <option value="religion">종교</option>
                                    <option value="gender">성별</option>
                                    <option value="height">키</option>
                                    <option value="education">학력</option>
                                    <option value="job">직업</option>
                                    <option value="asset_range">자산구간</option>
                                    <option value="income_range">소득구간</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="content_partner" style="margin: 50px 5px;">
                        <div class="content_partner_header">
                            <h2>배제 항목 설정 </h2>
                        </div>
                    </div>
                    <div class="">
                        <div class="form_row signin_form">
                            <div class="signin_form_div flex">
                                <label for="except1" class="signin_label">배제항목1</label>
                                <div class="multy_select">
                                    <select id="except1" name="except1" onchange="chgExcept(this);">
                                        <option value>미선택</option>
                                        <option value="mbti">MBTI</option>
                                        <option value="animal_type1">얼굴형</option>
                                        <option value="stylish">스타일</option>
                                        <option value="drinking">음주횟수</option>
                                        <!-- <option value="birthday">나이</option> -->
                                        <option value="bodyshape">체형</option>
                                        <option value="city">지역</option>
                                        <option value="married">결혼경험</option>
                                        <option value="smoker">흡연유무</option>
                                        <option value="religion">종교</option>
                                        <!-- <option value="gender">성별</option> -->
                                        <!-- <option value="height">키</option> -->
                                        <option value="education">학력</option>
                                        <option value="job">직업</option>
                                        <option value="asset_range">자산구간</option>
                                        <option value="income_range">소득구간</option>
                                    </select>
                                    <select id="except1_detail" name="except1_detail">
                                        <option value>미선택</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div flex">
                                <label for="except2" class="signin_label">배제항목2</label>
                                <div class="multy_select">
                                    <select id="except2" name="except2" onchange="chgExcept(this);">
                                        <option value>미선택</option>
                                        <option value="mbti">MBTI</option>
                                        <option value="animal_type1">얼굴형</option>
                                        <option value="stylish">스타일</option>
                                        <option value="drinking">음주횟수</option>
                                        <!-- <option value="birthday">나이</option> -->
                                        <option value="bodyshape">체형</option>
                                        <option value="city">지역</option>
                                        <option value="married">결혼경험</option>
                                        <option value="smoker">흡연유무</option>
                                        <option value="religion">종교</option>
                                        <!-- <option value="gender">성별</option> -->
                                        <!-- <option value="height">키</option> -->
                                        <option value="education">학력</option>
                                        <option value="job">직업</option>
                                        <option value="asset_range">자산구간</option>
                                        <option value="income_range">소득구간</option>
                                    </select>
                                    <select id="except2_detail" name="except2_detail">
                                        <option value>미선택</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="btn_group">
                            <button type="button" class="btn type01" onclick="saveFactorInfo()">저장</button>
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
            var first_factor = "<?php echo $first_factor; ?>"
            var second_factor = "<?php echo $second_factor; ?>"
            var third_factor = "<?php echo $third_factor; ?>"
            var fourth_factor = "<?php echo $fourth_factor; ?>"
            var except1 = "<?php echo $except1; ?>"
            var except2 = "<?php echo $except2; ?>"
            var except1_detail = "<?php echo $except1_detail; ?>"
            var except2_detail = "<?php echo $except2_detail; ?>"

            if (first_factor !== "" && first_factor !== null) {
                $("#first_factor").val(first_factor);
            }
            if (second_factor !== "" && second_factor !== null) {
                $("#second_factor").val(second_factor);
            }
            if (third_factor !== "" && third_factor !== null) {
                $("#third_factor").val(third_factor);
            }
            if (fourth_factor !== "" && fourth_factor !== null) {
                $("#fourth_factor").val(fourth_factor);
            }
            if (except1 !== "" && except1 !== null) {
                $("#except1").val(except1);
            }
            if (except2 !== "" && except2 !== null) {
                $("#except2").val(except2);
            }
            // if (except1_detail !== "" || except1_detail !== null) {
            //     $("#except1_detail").val(except1_detail);
            // }
            // if (except2_detail !== "" || except2_detail !== null) {
            //     $("#except2_detail").val(except2_detail);
            // }
        });
        const chgExcept = (e) => {
            if (e.value) {
                $.ajax({
                    url: '/ajax/chgExcept', // todo : 추후 본인인증 연결
                    type: 'POST',
                    data: { "value": e.value },
                    async: false,
                    success: function (data) {
                        console.log(data);
                        if (data.status === 'success') {
                            // 성공                        
                            console.log('리턴', data);
                            $("#" + e.id + "_detail").html('');
                            data.data.forEach(item => {
                                $("#" + e.id + "_detail").append('<option value=' + item.value + '>' + item.name + '</option>');
                            });
                        } else if (data.status === 'error') {
                            console.log('실패', data);
                        } else {
                            alert('알 수 없는 오류가 발생하였습니다. \n다시 시도해 주세요.');
                        }
                        return false;
                    },
                    error: function (data, status, err) {
                        console.log(err);
                        alert('오류가 발생하였습니다. \n다시 시도해 주세요.');
                    },
                });
            } else {
                $("#" + e.id + "_detail").html('');
                $("#" + e.id + "_detail").append('<option>미선택</option>');
            }
        }
        const saveFactorInfo = () => {
            var postData = new FormData($('form')[0]);
            $.ajax({
                url: '/ajax/saveFactorInfo', // todo : 추후 본인인증 연결
                type: 'POST',
                data: postData,
                processData: false,
                contentType: false,
                async: false,
                success: function (data) {
                    console.log(data);
                    if (data.status === 'success') {              // 성공                        
                        console.log('저장', data);
                        if (confirm('파트너 정보저장 성공! \n마이메뉴로 이동합니다.')) {
                            moveToUrl('/mo/menu');
                        }
                    } else if (data.status === 'error') {
                        console.log('실패', data);
                    } else {
                        alert('알 수 없는 오류가 발생하였습니다. \n다시 시도해 주세요.');
                    }
                    return false;
                },
                error: function (data, status, err) {
                    console.log(err);
                    alert('오류가 발생하였습니다. \n다시 시도해 주세요.');
                },
            });
        }
    </script>

    <!-- -->


</body>

</html>