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
                        프리미엄 프로필
                    </li>
                </ul>
            </div>

        </header>

        <div class="sub_wrap">
            <div class="content_wrap">
                <div class="content_body">
                    <a id="profileArea" onclick="editPhoto()">
                        <?php
                        if ($file_path)
                        {
                            echo '<img src="/writable/' . $file_path . '/' . $file_name . '" style="border-radius: 50%; width: 74px; height: 74px;" />';
                        } else
                        {
                            echo '<img src="/static/images/profile_noimg.png" style="border-radius: 50%; width: 74px; height: 74px;" />';
                        }
                        ?>

                    </a>
                </div>
                <div class="btn_group">
                    <button type="button" class="btn type02" onclick="editPhoto()">프로필 사진수정</button>
                    <input type="file" id="main_photo" name="main_photo" style="display:none;" accept="image/*" />
                </div>
                <form class="main_signin_form">
                    <legend></legend>
                    <div class="">

                        <div class="form_row signin_form">
                            <div class="signin_form_div input_btn">
                                <h4 class="profile_photo_label">결혼유무</h4>
                                <p class="profile_photo_desc">혼인관계증명서를 업로드해주세요</p>
                                <div class="input_btn">
                                    <select id="marital" name="marital" class="custom_select" value="">
                                        <option value="">선택</option>
                                        <option value="0">유</option>
                                        <option value="1">무</option>
                                    </select>
                                    <button type="button" class="btn btn_input_form"
                                        onclick="showPopupRgt('marital','<?php echo $ci ?>')">인증</button>
                                </div>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="smoking" class="signin_label">흡연유무</label>
                                <select id="smoking" name="smoking" class="custom_select" value="">
                                    <option value="">선택</option>
                                    <option value="0">유</option>
                                    <option value="1">무</option>
                                </select>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="drinking" class="signin_label">음주 횟수</label>
                                <select id="drinking" name="drinking" class="custom_select" value="">
                                    <option value="">선택</option>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
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
                                    <option value="2">불교</option>
                                    <option value="3">천주교</option>
                                    <option value="4">원불교</option>
                                    <option value="5">이슬람</option>
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
                                <label for="height" class="signin_label">키</label>
                                <input id="height" name="height" type="text" value="" placeholder="키 입력">
                            </div>
                        </div>

                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="personal_style" class="signin_label">스타일</label>
                                <select id="personal_style" name="personal_style" class="custom_select" value="">
                                    <option value="">선택</option>
                                    <option value="0">강인</option>
                                    <option value="1">댄디</option>
                                    <option value="2">너드</option>
                                    <option value="3">프리</option>
                                    <option value="4">등등...</option>
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

                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="major" class="signin_label">전공</label>
                                <input id="major" name="major" type="text" value="" placeholder="전공을 입력해주세요">
                            </div>
                        </div>

                        <div class="form_row signin_form">
                            <div class="signin_form_div input_btn">
                                <h4 class="profile_photo_label">학교명</h4>
                                <p class="profile_photo_desc">최종학교 졸업증명서를 업로드해주세요!</p>
                                <div class="input_btn">
                                    <input id="school" name="school" type="text" value="" placeholder="학교를 입력해 주세요">
                                    <button type="button" class="btn btn_input_form"
                                        onclick="showPopupRgt('school','<?php echo $ci ?>')">인증</button>
                                </div>
                            </div>
                        </div>

                        <div class="form_row signin_form">
                            <div class="signin_form_div input_btn">
                                <h4 class="profile_photo_label">직업</h4>
                                <p class="profile_photo_desc">명함 혹은 재직증명서를 업로드해주세요</p>
                                <div class="input_btn">
                                    <input id="job" name="job" type="text" value="" placeholder="직업을 입력해 주세요">
                                    <button type="button" class="btn btn_input_form"
                                        onclick="showPopupRgt('job','<?php echo $ci ?>')">인증</button>
                                </div>
                            </div>
                        </div>

                        <div class="form_row signin_form">
                            <div class="signin_form_div input_btn">
                                <label for="asset_range" class="signin_label">자산구간</label>
                                <p class="profile_photo_desc">잔고증명, 부동산 등기부 등본을 업로드해 주세요</p>
                                <div class="input_btn">
                                    <select id="asset_range" name="asset_range" class="custom_select" value="">
                                        <option value="">선택</option>
                                        <option value="0">2천만원 이하</option>
                                        <option value="1">2천만원~1억이하</option>
                                        <option value="2">1억이상~</option>
                                    </select>
                                    <button type="button" class="btn btn_input_form"
                                        onclick="showPopupRgt('asset_range','<?php echo $ci ?>')">인증</button>
                                </div>
                            </div>
                        </div>

                        <div class="form_row signin_form">
                            <div class="signin_form_div input_btn">
                                <label for="income_range" class="signin_label">소득구간</label>
                                <p class="profile_photo_desc">소득금액증명을 업로드해주세요! <a href="#"> [정부24가기 →]</a></p>

                                <div class="input_btn">
                                    <select id="income_range" name="income_range" class="custom_select" value="">
                                        <option value="">선택</option>
                                        <option value="0">소득구간1</option>
                                        <option value="1">소득구간2</option>
                                        <option value="2">소득구간3</option>
                                        <option value="3">소득구간4</option>
                                        <option value="4">소득구간5</option>
                                        <option value="5">소득구간6</option>
                                    </select>
                                    <button type="button" class="btn btn_input_form"
                                        onclick="showPopupRgt('income_range','<?php echo $ci ?>')">인증</button>
                                </div>
                            </div>
                        </div>

                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="parents" class="signin_label">부</label>
                                <div class="multy_select">
                                    <select id="father_birth_year" name="father_birth_year" class="custom_select"
                                        value="">
                                        <option value="">선택</option>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                    <select id="father_job" name="father_job" class="custom_select" value="">
                                        <option value="">선택</option>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
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
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                    <select id="mother_job" name="mother_job" class="custom_select" value="">
                                        <option value="">선택</option>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="siblings" class="signin_label">형제</label>
                                <select id="siblings" name="siblings" class="custom_select" value="">
                                    <option value="">선택</option>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="parents" class="signin_label">거주형태</label>
                                <div class="multy_select_three">
                                    <select id="residence1" name="residence1" class="custom_select" value="">
                                        <option value="">선택</option>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                    <select id="residence2" name="residence2" class="custom_select" value="">
                                        <option value="">선택</option>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                    <select id="residence3" name="residence3" class="custom_select" value="">
                                        <option value="">선택</option>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="ci" value="<?php echo $ci ?>" />
                        <input type="hidden" name="grade" value="<?php echo $grade ?>" />
                        <div id="main_photo_uploaded" style="display:none;"></div>
                        <div class="btn_group">
                            <button type="button" class="btn type01" onclick="signUpdate()">가입</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php include 'mo_signin_popup.php'; ?>


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
            editPhotoListner();
            // editPhotoListListner();
            // editMovListListner();
        });

    </script>

    <!-- -->


</body>

</html>