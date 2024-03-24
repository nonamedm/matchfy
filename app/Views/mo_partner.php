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
                <form class="main_signin_form">
                    <legend></legend>
                    <div class="">
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="appear_type" class="signin_label">파트너 성별</label>
                                <div>
                                    <div class="chk_box radio_box partner">
                                        <input type="radio" id="female" name="partner_mf" value="0" checked=""
                                            onclick="selectGender(this)">
                                        <label for="female">
                                            <h2>여성</h2>
                                        </label>
                                    </div>
                                    <div class="chk_box radio_box partner">
                                        <input type="radio" id="male" name="partner_mf" value="1"
                                            onclick="selectGender(this)">
                                        <label for="male">
                                            <h2>남성</h2>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="appear_type" class="signin_label">외모유형</label>
                                <div id="ranked"></div>
                                <div class="animal_type_module">
                                    <?php
                                    $word_file_path = APPPATH . 'data/MemberCode.php';
                                    require ($word_file_path);
                                    foreach ($animalType as $item)
                                    {
                                        ?>
                                        <div class="chk_box radio_box animal_type_chk">
                                            <input type="checkbox" id="<?= $item['id'] ?>" name="animal_type"
                                                class="animal_type" value="<?= $item['value'] ?>"><label
                                                for="<?= $item['id'] ?>">
                                                <h2>
                                                    <?= $item['name'] ?>
                                                </h2>
                                            </label>
                                        </div>

                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="form_row signin_form">
                                <div class="signin_form_div">
                                    <label for="region1" class="signin_label">지역</label>
                                    <select id="region1" value="">
                                        <option>시/군/구</option>
                                        <option value="0">서울특별시</option>
                                        <option value="1">경기도</option>
                                        <option value="2">인천광역시</option>
                                        <option value="3">기타</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form_row signin_form">
                                <div class="signin_form_div">
                                    <label for="region2" class="signin_label">지역</label>
                                    <select id="region2" value="">
                                        <option>시/군/구</option>
                                        <option value="0">서울특별시</option>
                                        <option value="1">경기도</option>
                                        <option value="2">인천광역시</option>
                                        <option value="3">기타</option>
                                    </select>
                                </div>
                            </div>

                            <?php if (isset ($grade) && ($grade === 'grade02' || $grade === 'grade03')): ?>

                                <div class="form_row signin_form">
                                    <div class="signin_form_div">
                                        <label for="height" class="signin_label">키</label>
                                        <select id="height" class="custom_select" value="">
                                            <option value="">선택</option>
                                            <option value="0">150 미만</option>
                                            <option value="1">150 이상 ~ 160 미만</option>
                                            <option value="2">160 이상 ~ 170 미만</option>
                                            <option value="3">170 이상 ~ 180 미만</option>
                                            <option value="4">180 이상</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form_row signin_form">
                                    <div class="signin_form_div">
                                        <label for="personal_style" class="signin_label">스타일</label>
                                        <select id="personal_style" class="custom_select" value="">
                                            <option value="">선택</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="form_row signin_form">
                                    <div class="signin_form_div">
                                        <h4 class="profile_photo_label">결혼유무</h4>
                                        <select id="marital" class="custom_select" value="">
                                            <option value="">선택</option>
                                            <option value="0">유</option>
                                            <option value="1">무</option>
                                            <option value="2">관계없음</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form_row signin_form">
                                    <div class="signin_form_div">
                                        <label for="smoking" class="signin_label">흡연유무</label>
                                        <select id="smoking" class="custom_select" value="">
                                            <option value="">선택</option>
                                            <option value="0">유</option>
                                            <option value="1">무</option>
                                            <option value="1">관계없음</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form_row signin_form">
                                    <div class="signin_form_div">
                                        <label for="drinking" class="signin_label">음주 횟수</label>
                                        <select id="drinking" name="drinking" class="custom_select" value="">
                                            <option value="">선택</option>
                                            <option value="0">전혀 안함</option>
                                            <option value="1">주 1~2병</option>
                                            <option value="2">주 3~5병</option>
                                            <option value="3">주 5병 이상</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form_row signin_form">
                                    <div class="signin_form_div">
                                        <label for="religion" class="signin_label">종교</label>
                                        <select id="religion" name="religion" class="custom_select" value="">
                                            <option value="">선택</option>
                                            <option value="0">무교</option>
                                            <option value="1">기독교</option>
                                            <option value="2">천주교</option>
                                            <option value="3">불교</option>
                                            <option value="4">기타</option>
                                            <option value="5">관계없음</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form_row signin_form">
                                    <div class="signin_form_div">
                                        <label for="mbti" class="signin_label">MBTI</label>
                                        <select id="mbti" class="custom_select" value="">
                                            <option value="">선택</option>
                                            <option value="0">ENFP</option>
                                            <option value="1">ENFJ</option>
                                            <option value="2">ENTP</option>
                                            <option value="3">ENTJ</option>
                                            <option value="4">ESFP</option>
                                            <option value="5">ESFJ</option>
                                            <option value="6">ESTP</option>
                                            <option value="7">ESTJ</option>
                                            <option value="8">INFP</option>
                                            <option value="9">INFJ</option>
                                            <option value="10">INTP</option>
                                            <option value="11">INTJ</option>
                                            <option value="12">ISFP</option>
                                            <option value="13">ISFJ</option>
                                            <option value="14">ISTP</option>
                                            <option value="15">ISTJ</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form_row signin_form">
                                    <div class="signin_form_div">
                                        <label for="education" class="signin_label">학력</label>
                                        <select id="education" class="custom_select" value="">
                                            <option value="">선택</option>
                                            <option value="0">고등학교졸업</option>
                                            <option value="1">대학교재학</option>
                                            <option value="2">대학교졸업</option>
                                            <option value="3">대학원재학</option>
                                            <option value="4">대학원졸업이상</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- <div class="form_row signin_form">
                                    <div class="signin_form_div">
                                        <label for="major" class="signin_label">전공</label>
                                        <input id="major" type="text" value="" placeholder="전공을 입력해주세요">
                                    </div>
                                </div> -->

                                <!-- <div class="form_row signin_form">
                                    <div class="signin_form_div input_btn">
                                        <h4 class="profile_photo_label">학교명</h4>
                                        <div class="input_btn">
                                            <input id="school" type="text" value="" placeholder="학교를 입력해 주세요">
                                            <button class="btn btn_input_form">인증</button>
                                        </div>
                                    </div>
                                </div> -->

                                <div class="form_row signin_form">
                                    <div class="signin_form_div">
                                        <label for="job" class="signin_label">직업군</label>
                                        <select id="job" class="custom_select" value="">
                                            <option value="">선택</option>
                                            <option value="0">1군 : 중소기업 회사원/자영업/프리랜서 등 기타</option>
                                            <option value="1">2군 : 상장사, 대기업 회사원/기업대표/공무원/공기업</option>
                                            <option value="2">3군 : 전문직(의사, 변호사, 변리사, 한의사, 수의사, 회계사, 세무사, 법무사)</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form_row signin_form">
                                    <div class="signin_form_div">
                                        <label for="asset_range" class="signin_label">자산구간</label>
                                        <div class="input_btn">
                                            <select id="asset_range" name="asset_range" class="custom_select" value="">
                                                <option value="">선택</option>
                                                <option value="0">1000만원 이하</option>
                                                <option value="1">1000~2000만원</option>
                                                <option value="2">2000~3000만원</option>
                                                <option value="3">3000~4000만원</option>
                                                <option value="4">4000~5000만원</option>
                                                <option value="5">5000만원 이상</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form_row signin_form">
                                    <div class="signin_form_div">
                                        <label for="income_range" class="signin_label">소득구간</label>
                                        <div class="input_btn">
                                            <select id="income_range" name="income_range" class="custom_select" value="">
                                                <option value="">선택</option>
                                                <option value="0">1000만원 이하</option>
                                                <option value="1">1000~2000만원</option>
                                                <option value="2">2000~3000만원</option>
                                                <option value="3">3000~4000만원</option>
                                                <option value="4">4000~5000만원</option>
                                                <option value="5">5000만원 이상</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if (isset ($grade) && ($grade === 'grade03')): ?>
                                <div class="form_row signin_form">
                                    <div class="signin_form_div">
                                        <label for="parents" class="signin_label">부</label>
                                        <div class="multy_select">
                                            <select id="father_birth_year" name="father_birth_year" class="custom_select"
                                                value="">
                                                <option value="">선택</option>
                                                <?php
                                                $nowYear = date('Y');
                                                $pastYear = 1945;
                                                for ($year = $nowYear; $year >= $pastYear; $year--)
                                                {
                                                    echo '<option value="' . $year . '">' . $year . '</option>';
                                                }
                                                ?>
                                            </select>
                                            <select id="father_job" name="father_job" class="custom_select" value="">
                                                <option value="">선택</option>
                                                <option value="0">회사원</option>
                                                <option value="1">사업가</option>
                                                <option value="2">자영업</option>
                                                <option value="3">무직</option>
                                                <option value="4">기타</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form_row signin_form">
                                    <div class="signin_form_div">
                                        <label for="parents" class="signin_label">모</label>
                                        <div class="multy_select">
                                            <select id="mother_birth_year" name="mother_birth_year" class="custom_select"
                                                value="">
                                                <option value="">선택</option>
                                                <?php
                                                $nowYear = date('Y');
                                                $pastYear = 1945;
                                                for ($year = $nowYear; $year >= $pastYear; $year--)
                                                {
                                                    echo '<option value="' . $year . '">' . $year . '</option>';
                                                }
                                                ?>
                                            </select>
                                            <select id="mother_job" name="mother_job" class="custom_select" value="">
                                                <option value="">선택</option>
                                                <option value="0">회사원</option>
                                                <option value="1">사업가</option>
                                                <option value="2">자영업</option>
                                                <option value="3">주부</option>
                                                <option value="4">기타</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form_row signin_form">
                                    <div class="signin_form_div">
                                        <label for="siblings" class="signin_label">형제</label>
                                        <select id="siblings" name="siblings" class="custom_select" value="">
                                            <option value="">선택</option>
                                            <option value="0">외동</option>
                                            <option value="1">1남1녀</option>
                                            <option value="2">2남1녀</option>
                                            <option value="3">1남2녀</option>
                                            <option value="4">2남2녀</option>
                                            <option value="5">기타</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form_row signin_form">
                                    <div class="signin_form_div">
                                        <label for="residence" class="signin_label">거주형태</label>
                                        <div class="multy_select_three">
                                            <select id="residence1" name="residence1" class="custom_select" value="">
                                                <option value="">선택</option>
                                                <option value="0">아파트</option>
                                                <option value="1">단독주택</option>
                                                <option value="2">주상복합</option>
                                                <option value="3">오피스텔</option>
                                                <option value="4">다가구주택</option>
                                                <option value="5">기타</option>
                                            </select>
                                            <select id="residence2" name="residence2" class="custom_select" value="">
                                                <option value="">선택</option>
                                                <option value="0">자가</option>
                                                <option value="1">전세</option>
                                                <option value="2">월세</option>
                                                <option value="3">기타</option>
                                            </select>
                                            <select id="residence3" name="residence3" class="custom_select" value="">
                                                <option value="">선택</option>
                                                <option value="0">소유주 부</option>
                                                <option value="1">소유주 모</option>
                                                <option value="2">소유주 본인</option>
                                                <option value="3">소유주 기타</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="btn_group">
                                <button type="button" class="btn type01">저장</button>
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
        const selectGender = (e) => {
            console.log(e.value);
            $('#personal_style').empty();
            $('#personal_style').html("<option>선택</option>");
            if (e.value === '0') {
                <?php
                foreach ($femaleStyle as $item)
                { ?>
                    $("#personal_style").append("<option value='<?= $item['value'] ?>'><?= $item['name'] ?></option>")
                    console.log("<?php echo 'abc' ?>");
                <?php } ?>
            } else {
                <?php
                foreach ($maleStyle as $item)
                { ?>
                    $("#personal_style").append("<option value='<?= $item['value'] ?>'><?= $item['name'] ?></option>")
                    console.log("<?php echo 'abc' ?>");
                <?php } ?>
            }

        }
        $(document).ready(function () {
            // 
            const rankedItemsList = $('#ranked');
            let rankedItems = [];
            $('.animal_type').click(function () {
                const checkedCount = $('.animal_type:checked').length;
                if (checkedCount > 3) {
                    $(this).prop('checked', false);
                    return;
                }

                const item = $(this).parent().text().trim();
                const order = parseInt($(this).attr('data-order'));

                if ($(this).prop('checked')) {
                    rankedItems.push({ item: item, order: order });
                } else {
                    const index = rankedItems.findIndex(obj => obj.item === item);
                    if (index !== -1) {
                        rankedItems.splice(index, 1);
                    }
                }

                rankedItems.sort((a, b) => {
                    return a.order - b.order;
                });

                // Display the ranked items
                rankedItemsList.empty();
                rankedItems.forEach((obj, index) => {
                    rankedItemsList.append(`<li>${index + 1}순위: ${obj.item}</li>`);
                });
            });
        }); 
    </script>

    <!-- -->


</body>

</html>