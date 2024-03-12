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
        <header>

            <div class="menu">
                <ul>
                    <li class="left_arrow">
                        <img src="/static/images/left_arrow.png" />
                    </li>
                    <li class="header_title">
                        정회원 프로필
                    </li>
                </ul>
            </div>

        </header>

        <div class="sub_wrap">
            <div class="content_wrap">
                <form class="main_signin_form">
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
                    <legend></legend>
                    <div class="">
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="marital" class="signin_label">결혼유무</label>
                                <select id="marital" name="marital" class="custom_select" value="">
                                    <option value="">선택</option>
                                    <option value="0">미혼</option>
                                    <option value="1">기혼</option>
                                </select>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="smoking" class="signin_label">흡연유무</label>
                                <select id="smoking" name="smoking" class="custom_select" value="">
                                    <option value="">선택</option>
                                    <option value="0">전혀안함</option>
                                    <option value="1">하루 1~2회</option>
                                    <option value="2">하루 3~5회</option>
                                    <option value="3">하루 5회 이상</option>
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
                                    <option value="0">초등학교이하</option>
                                    <option value="1">중학교</option>
                                    <option value="2">고등학교</option>
                                    <option value="3">대학교(2/3년제)</option>
                                    <option value="4">대학교(4년제)</option>
                                    <option value="5">대학원(석사)</option>
                                    <option value="6">대학원(박사)</option>
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
                                <select id="job" name="job" class="custom_select" value="">
                                        <option value="">선택</option>
                                        <option value="0">사업관리</option>
                                        <option value="1">경영/회계/사무</option>
                                        <option value="2">금융보험</option>
                                        <option value="3">교육직</option>
                                        <option value="4">법률직</option>
                                        <option value="5">보건의료직</option>
                                        <option value="6">사회복지/종교</option>
                                        <option value="7">문화/예술</option>
                                        <option value="8">운전/운송</option>
                                        <option value="9">영업/판매</option>
                                        <option value="10">경비/청소</option>
                                        <option value="11">숙박/여행</option>
                                        <option value="12">음식/서비스</option>
                                        <option value="13">건설, 기계</option>
                                        <option value="14">재료</option>
                                        <option value="15">화학/바이오</option>
                                        <option value="16">섬유/의복</option>
                                        <option value="17">전기/전자</option>
                                        <option value="18">정보통신</option>
                                        <option value="19">식품가공</option>
                                        <option value="20">인쇄/목재</option>
                                        <option value="21">환경/에너지</option>
                                        <option value="22">농업</option>
                                        <option value="23">기타</option>
                                    </select>
                                    <button type="button" class="btn btn_input_form"
                                        onclick="showPopupRgt('job','<?php echo $ci ?>')">인증</button>
                                </div>
                            </div>
                        </div>

                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="asset_range" class="signin_label">자산구간</label>
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

                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="income_range" class="signin_label">소득구간</label>
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