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
                                        <input type="radio" id="female" name="partner_mf" value="0" checked="">
                                        <label for="female">
                                            <h2>여성</h2>
                                        </label>
                                    </div>
                                    <div class="chk_box radio_box partner">
                                        <input type="radio" id="male" name="partner_mf" value="1">
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
                                    <div class="chk_box radio_box animal_type_chk">
                                        <input type="checkbox" id="animal_type0" name="animal_type" class="animal_type" value="0"><label for="animal_type0"><h2>다람쥐상</h2></label>                                        
                                    </div>
                                    <div class="chk_box radio_box animal_type_chk">
                                        <input type="checkbox" id="animal_type1" name="animal_type" class="animal_type" value="1"><label for="animal_type1"><h2>쿼카상</h2></label>                                       
                                    </div>
                                    <div class="chk_box radio_box animal_type_chk">                                        
                                        <input type="checkbox" id="animal_type2" name="animal_type" class="animal_type" value="2"><label for="animal_type2"><h2>햄스터상</h2></label>                                     
                                    </div>
                                    <div class="chk_box radio_box animal_type_chk">                                        
                                        <input type="checkbox" id="animal_type3" name="animal_type" class="animal_type" value="3"><label for="animal_type3"><h2>소상</h2></label>                                    
                                    </div>
                                    <div class="chk_box radio_box animal_type_chk">
                                        <input type="checkbox" id="animal_type4" name="animal_type" class="animal_type" value="4"><label for="animal_type4"><h2>호랑이상</h2></label>                                    
                                    </div>
                                    <div class="chk_box radio_box animal_type_chk">
                                        <input type="checkbox" id="animal_type5" name="animal_type" class="animal_type" value="5"><label for="animal_type5"><h2>토끼상</h2></label>                                     
                                    </div>
                                    <div class="chk_box radio_box animal_type_chk">
                                        <input type="checkbox" id="animal_type6" name="animal_type" class="animal_type" value="6"><label for="animal_type6"><h2>용상</h2></label>                                 
                                    </div>
                                    <div class="chk_box radio_box animal_type_chk">
                                        <input type="checkbox" id="animal_type7" name="animal_type" class="animal_type" value="7"><label for="animal_type7"><h2>공룡상</h2></label>                                 
                                    </div>
                                    <div class="chk_box radio_box animal_type_chk">
                                        <input type="checkbox" id="animal_type8" name="animal_type" class="animal_type" value="8"><label for="animal_type8"><h2>뱀상</h2></label>                                    
                                    </div>
                                    <div class="chk_box radio_box animal_type_chk">
                                        <input type="checkbox" id="animal_type9" name="animal_type" class="animal_type" value="9"><label for="animal_type9"><h2>거북이상</h2></label>       
                                    </div>
                                    <div class="chk_box radio_box animal_type_chk">
                                        <input type="checkbox" id="animal_type10" name="animal_type" class="animal_type" value="10"><label for="animal_type10"><h2>말상</h2></label>                                
                                    </div>
                                    <div class="chk_box radio_box animal_type_chk">
                                        <input type="checkbox" id="animal_type11" name="animal_type" class="animal_type" value="11"><label for="animal_type11"><h2>양상</h2></label>                                
                                    </div>
                                    <div class="chk_box radio_box animal_type_chk">
                                        <input type="checkbox" id="animal_type12" name="animal_type" class="animal_type" value="12"><label for="animal_type12"><h2>원숭이상</h2></label>                                  
                                    </div>
                                    <div class="chk_box radio_box animal_type_chk">
                                        <input type="checkbox" id="animal_type13" name="animal_type" class="animal_type" value="13"><label for="animal_type13"><h2>닭상</h2></label>                             
                                    </div>
                                    <div class="chk_box radio_box animal_type_chk">
                                        <input type="checkbox" id="animal_type14" name="animal_type" class="animal_type" value="14"><label for="animal_type14"><h2>강아지상</h2></label>                                     
                                    </div>
                                    <div class="chk_box radio_box animal_type_chk">
                                        <input type="checkbox" id="animal_type15" name="animal_type" class="animal_type" value="15"><label for="animal_type15"><h2>곰상</h2></label>                                 
                                    </div>
                                    <div class="chk_box radio_box animal_type_chk">
                                        <input type="checkbox" id="animal_type16" name="animal_type" class="animal_type" value="16"><label for="animal_type16"><h2>늑대상</h2></label>                                  
                                    </div>
                                    <div class="chk_box radio_box animal_type_chk">
                                        <input type="checkbox" id="animal_type17" name="animal_type" class="animal_type" value="17"><label for="animal_type17"><h2>여우상</h2></label>                                 
                                    </div>
                                    <div class="chk_box radio_box animal_type_chk">
                                        <input type="checkbox" id="animal_type18" name="animal_type" class="animal_type" value="18"><label for="animal_type18"><h2>돼지상</h2></label>                                     
                                    </div>
                                    <div class="chk_box radio_box animal_type_chk">
                                        <input type="checkbox" id="animal_type19" name="animal_type" class="animal_type" value="19"><label for="animal_type19"><h2>고양이상</h2></label>                                    
                                    </div>
                                    <div class="chk_box radio_box animal_type_chk">
                                        <input type="checkbox" id="animal_type20" name="animal_type" class="animal_type" value="20"><label for="animal_type20"><h2>사자상</h2></label>                               
                                    </div>
                                    <div class="chk_box radio_box animal_type_chk">
                                        <input type="checkbox" id="animal_type21" name="animal_type" class="animal_type" value="21"><label for="animal_type21"><h2>너구리상</h2></label>                                    
                                    </div>
                                    <div class="chk_box radio_box animal_type_chk">
                                        <input type="checkbox" id="animal_type22" name="animal_type" class="animal_type" value="22"><label for="animal_type22"><h2>사슴상</h2></label>                                     
                                    </div>
                                    <div class="chk_box radio_box animal_type_chk">
                                        <input type="checkbox" id="animal_type23" name="animal_type" class="animal_type" value="23"><label for="animal_type23"><h2>개구리상</h2></label>                                   
                                    </div>
                                    <div class="chk_box radio_box animal_type_chk">
                                        <input type="checkbox" id="animal_type24" name="animal_type" class="animal_type" value="24"><label for="animal_type24"><h2>두꺼비상</h2></label>                                   
                                    </div>
                                    <div class="chk_box radio_box animal_type_chk">
                                        <input type="checkbox" id="animal_type25" name="animal_type" class="animal_type" value="25"><label for="animal_type25"><h2>상어상</h2></label>                                  
                                    </div>
                                    <div class="chk_box radio_box animal_type_chk">
                                        <input type="checkbox" id="animal_type26" name="animal_type" class="animal_type" value="26"><label for="animal_type26"><h2>물고기상</h2></label>                                     
                                    </div>
                                    <div class="chk_box radio_box animal_type_chk">
                                        <input type="checkbox" id="animal_type27" name="animal_type" class="animal_type" value="27"><label for="animal_type27"><h2>오리상</h2></label>                                     
                                    </div>
                                    <div class="chk_box radio_box animal_type_chk">
                                        <input type="checkbox" id="animal_type28" name="animal_type" class="animal_type" value="28"><label for="animal_type28"><h2>펭귄상</h2></label>                                     
                                    </div>
                                </div>
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
                                    <h4 class="profile_photo_label">결혼유무</h4>
                                    <select id="marital" class="custom_select" value="">
                                        <option value="">선택</option>
                                        <option value="0">유</option>
                                        <option value="1">무</option>
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
                                    </select>
                                </div>
                            </div>
                            <div class="form_row signin_form">
                                <div class="signin_form_div">
                                    <label for="drinking" class="signin_label">음주 횟수</label>
                                    <select id="drinking" class="custom_select" value="">
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
                                    <select id="religion" class="custom_select" value="">
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
                                    <label for="height" class="signin_label">키</label>
                                    <input id="height" type="text" value="" placeholder="키 입력">
                                </div>
                            </div>

                            <div class="form_row signin_form">
                                <div class="signin_form_div">
                                    <label for="personal_style" class="signin_label">스타일</label>
                                    <select id="personal_style" class="custom_select" value="">
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
                                    <p class="profile_photo_desc">재직증명서 혹은 건강보험 자격득실확인서를 업로드해주세요</p>
                                    <div class="input_btn">
                                        <input id="job" type="text" value="" placeholder="직업을 입력해 주세요">
                                        <button class="btn btn_input_form">인증</button>
                                    </div>
                                </div>
                            </div>

                            <div class="form_row signin_form">
                                <div class="signin_form_div input_btn">
                                    <label for="religion" class="signin_label">자산구간</label>
                                    <p class="profile_photo_desc">잔고증명, 부동산 등기부 등본을 업로드해 주세요</p>
                                    <div class="input_btn">
                                        <select id="religion" class="custom_select" value="">
                                            <option value="">선택</option>
                                            <option value="0">2천만원 이하</option>
                                            <option value="1">2천만원~1억이하</option>
                                            <option value="2">1억이상~</option>
                                        </select>
                                        <button class="btn btn_input_form">인증</button>
                                    </div>
                                </div>
                            </div>

                            <div class="form_row signin_form">
                                <div class="signin_form_div input_btn">
                                    <label for="religion" class="signin_label">소득구간</label>
                                    <p class="profile_photo_desc">소득금액증명을 업로드해주세요! <a href="#"> [정부24가기 →]</a></p>

                                    <div class="input_btn">
                                        <select id="religion" class="custom_select" value="">
                                            <option value="">선택</option>
                                            <option value="0">소득구간1</option>
                                            <option value="1">소득구간2</option>
                                            <option value="2">소득구간3</option>
                                            <option value="3">소득구간4</option>
                                            <option value="4">소득구간5</option>
                                            <option value="5">소득구간6</option>
                                        </select>
                                        <button class="btn btn_input_form">인증</button>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if (isset ($grade) && ($grade === 'grade03')): ?>
                            <div class="form_row signin_form">
                                <div class="signin_form_div">
                                    <label for="parents" class="signin_label">부</label>
                                    <div class="multy_select">
                                        <select id="parents1" class="custom_select" value="">
                                            <option value="">선택</option>
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                        <select id="parents2" class="custom_select" value="">
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
                                        <select id="parents3" class="custom_select" value="">
                                            <option value="">선택</option>
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                        <select id="parents4" class="custom_select" value="">
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
                                    <label for="brother" class="signin_label">형제</label>
                                    <select id="brother" class="custom_select" value="">
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
                                        <select id="parents3" class="custom_select" value="">
                                            <option value="">선택</option>
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                        <select id="parents4" class="custom_select" value="">
                                            <option value="">선택</option>
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                        <select id="parents4" class="custom_select" value="">
                                            <option value="">선택</option>
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
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
        $(document).ready(function() {
            // 
            const rankedItemsList = $('#ranked');
            let rankedItems = [];
            $('.animal_type').click(function() {
                const checkedCount = $('.animal_type:checked').length;
                if (checkedCount > 3) {
                    $(this).prop('checked', false);
                    return;
                }

                const item = $(this).parent().text().trim();
                const order = parseInt($(this).attr('data-order'));

                if ($(this).prop('checked')) {
                    rankedItems.push({item: item, order: order});
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