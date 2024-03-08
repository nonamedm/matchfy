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
                            <img src="/static/images/profile_noimg.png" />
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
                                <select id="marital" class="custom_select" value="">
                                    <option>선택</option>
                                    <option value="0">유</option>
                                    <option value="1">무</option>
                                </select>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="smoking" class="signin_label">흡연유무</label>
                                <select id="smoking" class="custom_select" value="">
                                    <option>선택</option>
                                    <option value="0">유</option>
                                    <option value="1">무</option>
                                </select>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="drinking" class="signin_label">음주 횟수</label>
                                <select id="drinking" class="custom_select" value="">
                                    <option>선택</option>
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
                                <select id="religion" class="custom_select" value="">
                                    <option>선택</option>
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
                                <select id="mbti" class="custom_select" value="">
                                    <option>선택</option>
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
                                <input id="height" type="text" value="" placeholder="키 입력">
                            </div>
                        </div>

                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="personal_style" class="signin_label">스타일</label>
                                <select id="personal_style" class="custom_select" value="">
                                    <option>선택</option>
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
                                <select id="education" class="custom_select" value="">
                                    <option>선택</option>
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
                                <input id="major" type="text" value="" placeholder="전공을 입력해주세요">
                            </div>
                        </div>

                        <div class="form_row signin_form">
                            <div class="signin_form_div input_btn">
                                <h4 class="profile_photo_label">학교명</h4>
                                <p class="profile_photo_desc">최종학교 졸업증명서를 업로드해주세요!</p>
                                <div class="input_btn">
                                    <input id="school" type="text" value="" placeholder="학교를 입력해 주세요">
                                    <button class="btn btn_input_form">인증</button>
                                </div>
                            </div>
                        </div>

                        <div class="form_row signin_form">
                            <div class="signin_form_div input_btn">
                                <h4 class="profile_photo_label">직업</h4>
                                <p class="profile_photo_desc">명함 혹은 재직증명서를 업로드해주세요</p>
                                <div class="input_btn">
                                    <input id="job" type="text" value="" placeholder="직업을 입력해 주세요">
                                    <button class="btn btn_input_form">인증</button>
                                </div>
                            </div>
                        </div>

                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="religion" class="signin_label">자산구간</label>
                                <select id="religion" class="custom_select" value="">
                                    <option>선택</option>
                                    <option value="0">2천만원 이하</option>
                                    <option value="1">2천만원~1억이하</option>
                                    <option value="2">1억이상~</option>
                                </select>
                            </div>
                        </div>

                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="religion" class="signin_label">소득구간</label>
                                <select id="religion" class="custom_select" value="">
                                    <option>선택</option>
                                    <option value="0">소득구간1</option>
                                    <option value="1">소득구간2</option>
                                    <option value="2">소득구간3</option>
                                    <option value="3">소득구간4</option>
                                    <option value="4">소득구간5</option>
                                    <option value="5">소득구간6</option>
                                </select>
                            </div>
                        </div>
                        <div id="main_photo_uploaded" style="display:none;"></div>
                        <div class="btn_group">
                            <button type="button" class="btn type01" onclick="signUpdate()">가입</button>
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
            editPhotoListner();
            // editPhotoListListner();
            // editMovListListner();
        });        
    </script>

    <!-- -->


</body>

</html>