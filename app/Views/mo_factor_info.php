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
                        <h2>가중치 설정 페이지 </h2>
                    </div>
                    <img src="/static/images/partner.png" />
                </div>
                <form class="main_signin_form" enctype="multipart/form-data">
                    <legend></legend>
                    <div class="">
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="appear_type" class="signin_label">주요 가중치 선택 (최대 3개 선택) -> 내가 저장한 항목에 대해서 우선 출력</label>
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
                                                class="animal_type" value="<?= $item['value'] ?>" <?php if ($item['value'] === $animal_type1 || $item['value'] === $animal_type2 || $item['value'] === $animal_type3)
                                                  {
                                                      ?> checked <?php
                                                  } ?>><label for="<?= $item['id'] ?>">
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
                            배제항목 필요
                            (체크박스선택 -> 추가 selectbox생성- > 선택)
                            <div class="form_row signin_form">
                                <div class="signin_form_div">
                                    <label for="region1" class="signin_label">지역</label>
                                    <select id="region1" name="region1">
                                        <option value="">시/군/구</option>
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
                                    <select id="region2" name="region2">
                                        <option value="">시/군/구</option>
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
                                        <select id="height" name="height" class="custom_select">
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
                                        <select id="personal_style" name="personal_style" class="custom_select">
                                            <option value="">선택</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="form_row signin_form">
                                    <div class="signin_form_div">
                                        <h4 class="profile_photo_label">결혼유무</h4>
                                        <select id="marital" name="marital" class="custom_select" value="">
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
                                        <select id="smoking" name="smoking" class="custom_select" value="">
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
                                        <select id="mbti" name="mbti" class="custom_select" value="">
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
                                        <select id="education" name="education" class="custom_select" value="">
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
                                        <select id="job" name="job" class="custom_select" value="">
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
        const selectGender = (e) => {
            console.log(e.value);
            $('#personal_style').empty();
            $('#personal_style').html('<option value="">선택</option>');
            if (e.value === '0') {
                <?php
                foreach ($femaleStyle as $item)
                { ?>
                    $("#personal_style").append("<option value='<?= $item['value'] ?>'><?= $item['name'] ?></option>")
                <?php } ?>
            } else {
                <?php
                foreach ($maleStyle as $item)
                { ?>
                    $("#personal_style").append("<option value='<?= $item['value'] ?>'><?= $item['name'] ?></option>")
                <?php } ?>
            }

        }
        $(document).ready(function () {
            selectGender(0);

            var partnerGender = <?php echo json_encode($partner_gender); ?>;
            var animalType1 = <?php echo json_encode($animal_type1); ?>;
            var animalType2 = <?php echo json_encode($animal_type2); ?>;
            var animalType3 = <?php echo json_encode($animal_type3); ?>;
            var height = "<?php echo $height; ?>";
            var personalStyle = "<?php echo $stylish; ?>";
            var marital = "<?php echo $married; ?>";
            var smoking = "<?php echo $smoker; ?>";
            var drinking = "<?php echo $drinking; ?>";
            var religion = "<?php echo $religion; ?>";
            var mbti = "<?php echo $mbti; ?>";
            var education = "<?php echo $education; ?>";
            var job = "<?php echo $job; ?>";
            var assetRange = "<?php echo $asset_range; ?>";
            var incomeRange = "<?php echo $income_range; ?>";
            var fatherBirthYear = "<?php echo $father_birth_year; ?>";
            var fatherJob = "<?php echo $father_job; ?>";
            var motherBirthYear = "<?php echo $mother_birth_year; ?>";
            var motherJob = "<?php echo $mother_job; ?>";
            var siblings = "<?php echo $siblings; ?>";
            var residence1 = "<?php echo $residence1; ?>";
            var residence2 = "<?php echo $residence2; ?>";
            var residence3 = "<?php echo $residence3; ?>";

            if (partnerGender !== "" || partnerGender !== null) {
                $('input[name="partner_mf"][value="' + partnerGender + '"]').prop('checked', true);
            }
            if (height !== "" || height !== null) {
                $("#height").val(height);
            }
            if (personalStyle !== "" || personalStyle !== null) {
                $("#personal_style").val(personalStyle);
            }
            if (marital !== "" || marital !== null) {
                $("#marital").val(marital);
            }
            if (smoking !== "" || smoking !== null) {
                $("#smoking").val(smoking);
            }
            if (drinking !== "" || drinking !== null) {
                $("#drinking").val(drinking);
            }
            if (religion !== "" || religion !== null) {
                $("#religion").val(religion);
            }
            if (mbti !== "" || mbti !== null) {
                $("#mbti").val(mbti);
            }
            if (education !== "" || education !== null) {
                $("#education").val(education);
            }
            if (job !== "" || job !== null) {
                $("#job").val(job);
            }
            if (assetRange !== "" || assetRange !== null) {
                $("#asset_range").val(assetRange);
            }
            if (incomeRange !== "" || incomeRange !== null) {
                $("#income_range").val(incomeRange);
            }
            if (fatherBirthYear !== "" || fatherBirthYear !== null) {
                $("#father_birth_year").val(fatherBirthYear);
            }
            if (fatherJob !== "" || fatherJob !== null) {
                $("#father_job").val(fatherJob);
            }
            if (motherBirthYear !== "" || motherBirthYear !== null) {
                $("#mother_birth_year").val(motherBirthYear);
            }
            if (fatherJob !== "" || fatherJob !== null) {
                $("#mother_job").val(motherJob);
            }
            if (siblings !== "" || siblings !== null) {
                $("#siblings").val(siblings);
            }
            if (residence1 !== "" || residence1 !== null) {
                $("#residence1").val(residence1);
            }
            if (residence2 !== "" || residence2 !== null) {
                $("#residence2").val(residence2);
            }
            if (residence3 !== "" || residence3 !== null) {
                $("#residence3").val(residence3);
            }



            const rankedItemsList = $('#ranked');
            let rankedItems = [];
            $('.animal_type').click(function () {
                const checkedCount = $('.animal_type:checked').length;
                if (checkedCount > 3) {
                    $(this).prop('checked', false);
                    return;
                }

                const item = $(this).parent().text().trim();
                const value = $(this).val().trim();
                const order = parseInt($(this).attr('data-order'));

                if ($(this).prop('checked')) {
                    rankedItems.push({
                        item: item,
                        order: order,
                        value: value
                    });
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
                    rankedItemsList.append(`<li data-value="${obj.value}">${index + 1}순위: ${obj.item}</li>`);
                });
            });
            <?php
            $word_file_path = APPPATH . 'data/MemberCode.php';
            require ($word_file_path);
            ?>
            if (animalType1 !== "" || animalType1 !== null) {
                <?php foreach ($animalType as $item)
                {
                    if ($item['value'] === $animal_type1)
                    {
                        ?>
                        rankedItems.push({
                            item: "<?= $item['name'] ?>",
                            order: 0,
                            value: <?= $item['value'] ?>
                        });
                        <?php
                    }

                }
                ?>
                rankedItemsList.append(`<li data-value="<?= $animal_type1 ?>">1순위: ` + rankedItems[0].item + `</li>`);
            }
            if (animalType2 !== "" || animalType2 !== null) {
                <?php foreach ($animalType as $item)
                {
                    if ($item['value'] === $animal_type2)
                    {
                        ?>
                        rankedItems.push({
                            item: "<?= $item['name'] ?>",
                            order: 0,
                            value: <?= $item['value'] ?>
                        });
                        <?php
                    }

                }
                ?>
                rankedItemsList.append(`<li data-value="<?= $animal_type2 ?>">2순위: ` + rankedItems[1].item + `</li>`);
            }
            if (animalType3 !== "" || animalType3 !== null) {
                <?php foreach ($animalType as $item)
                {
                    if ($item['value'] === $animal_type3)
                    {
                        ?>
                        rankedItems.push({
                            item: "<?= $item['name'] ?>",
                            order: 0,
                            value: <?= $item['value'] ?>
                        });
                        <?php
                    }

                }
                ?>
                rankedItemsList.append(`<li data-value="<?= $animal_type3 ?>">3순위: ` + rankedItems[2].item + `</li>`);
            }
        });

        function savePartnerInfo() {
            var postData = new FormData($('form')[0]);
            $('#ranked li').each(function (index, li) {
                var value = $(li).data('value');
                postData.append('animal_type' + (index + 1), value);
            });

            $.ajax({
                url: '/ajax/savePartner', // todo : 추후 본인인증 연결
                type: 'POST',
                data: postData,
                processData: false,
                contentType: false,
                async: false,
                success: function (data) {
                    console.log(data);
                    if (data.status === 'success') {
                        // 성공                        
                        console.log('저장', data);
                        moveToURl('/mo/factorInfo');
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