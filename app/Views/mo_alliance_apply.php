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

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/static/css/datepicker.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
    <script src="//dapi.kakao.com/v2/maps/sdk.js?appkey9a1a5ebdc4ded5f8146d83a08dade5d7&libraries=services"></script>
    <script src="/static/js/basic.js"></script>
</head>

<body class="mo_wrap">
    <div class="wrap">
        <!-- HEADER: MENU + HEROE SECTION -->
        <mobileheader style="height:44px; display: block;"></mobileheader>

        <?php $title = "제휴 신청";
        include 'header.php'; ?>

        <div class="sub_wrap">
            <div class="loading"><img src="/static/images/loading.gif" /></div>
            <div class="loading_bg"></div>
            <div class="content_wrap">
                <form class="main_signin_form group_create" method="post" action="/ajax/alianceUp" enctype="multipart/form-data">
                    <legend></legend>
                    <div class="">
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="alliance_category" class="signin_label">제휴유형</label>
                                <select id="alliance_category" name="alliance_category" class="custom_select" value="">
                                    <option value="00">제휴 유형을 선택하세요</option>
                                    <option value="01">음식점</option>
                                    <option value="02">카페</option>
                                    <option value="03">숙박</option>
                                    <option value="04">기타</option>
                                </select>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="alliance_number" class="signin_label">업체 연락처</label>
                                <div>
                                    <input id="alliance_number" type="number" name="alliance_number" value="" placeholder="-제외 연락처 입력">
                                </div>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="alliance_email" class="signin_label">이메일</label>
                                <div>
                                    <input id="alliance_email" type="text" name="alliance_email" value="" placeholder="이메일 입력">
                                </div>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="alliance_name" class="signin_label">업체명</label>
                                <div>
                                    <input id="alliance_name" type="text" name="alliance_name" value="<?= $company ?>" placeholder="<?= $company ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="alliance_ceoname" class="signin_label">대표명</label>
                                <div>
                                    <input id="alliance_ceoname" type="text" name="alliance_ceoname" value="<?= $name ?>" placeholder="<?= $name ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="alliance_address" class="signin_label">주소</label>
                                <div style="margin-bottom: 10px;display:flex;">
                                    <input id="alliance_address1" class="alliance_address1" name="alliance_address1" type="text" placeholder="주소를 입력해주세요">
                                    <button class="btn search">검색</button>
                                </div>
                                <input id="alliance_address2" class="alliance_address2" name="alliance_address2" type="text" value="" placeholder="상세주소를 입력해주세요">
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="alliance_ceonumber" class="signin_label">대표 연락처</label>
                                <div>
                                    <input id="alliance_ceonumber" type="number" name="alliance_ceonumber" value="<?= $mobile_no ?>" placeholder="<?= $mobile_no ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="alliance_bizday" class="signin_label">영업일</label>
                                <div id="biz_day" class="biz_day" tabindex="0">
                                    <div class="biz_day_box" value="mon">월</div>
                                    <div class="biz_day_box" value="tue">화</div>
                                    <div class="biz_day_box" value="wed">수</div>
                                    <div class="biz_day_box" value="thu">목</div>
                                    <div class="biz_day_box" value="fri">금</div>
                                    <div class="biz_day_box" value="sat">토</div>
                                    <div class="biz_day_box" value="sun">일</div>
                                </div>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="alliance_biztime" class="signin_label">영업시간</label>
                                <div class="multy_select">
                                    <select id="alliance_biztime1" class="custom_select" name="alliance_biztime1" value="">
                                        <option value="">선택</option>
                                        <option value="0">00시</option>
                                        <option value="1">01시</option>
                                        <option value="2">02시</option>
                                        <option value="3">03시</option>
                                        <option value="4">04시</option>
                                        <option value="5">05시</option>
                                        <option value="6">06시</option>
                                        <option value="7">07시</option>
                                        <option value="8">08시</option>
                                        <option value="9">09시</option>
                                        <option value="10">10시</option>
                                        <option value="11">11시</option>
                                        <option value="12">12시</option>
                                        <option value="13">13시</option>
                                        <option value="14">14시</option>
                                        <option value="15">15시</option>
                                        <option value="16">16시</option>
                                        <option value="17">17시</option>
                                        <option value="18">18시</option>
                                        <option value="19">19시</option>
                                        <option value="20">20시</option>
                                        <option value="21">21시</option>
                                        <option value="22">22시</option>
                                        <option value="23">23시</option>
                                        <option value="24">24시</option>
                                    </select>
                                    <select id="alliance_biztime2" class="custom_select" name="alliance_biztime2" value="">
                                        <option value="">선택</option>
                                        <option value="0">00시</option>
                                        <option value="1">01시</option>
                                        <option value="2">02시</option>
                                        <option value="3">03시</option>
                                        <option value="4">04시</option>
                                        <option value="5">05시</option>
                                        <option value="6">06시</option>
                                        <option value="7">07시</option>
                                        <option value="8">08시</option>
                                        <option value="9">09시</option>
                                        <option value="10">10시</option>
                                        <option value="11">11시</option>
                                        <option value="12">12시</option>
                                        <option value="13">13시</option>
                                        <option value="14">14시</option>
                                        <option value="15">15시</option>
                                        <option value="16">16시</option>
                                        <option value="17">17시</option>
                                        <option value="18">18시</option>
                                        <option value="19">19시</option>
                                        <option value="20">20시</option>
                                        <option value="21">21시</option>
                                        <option value="22">22시</option>
                                        <option value="23">23시</option>
                                        <option value="24">24시</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <label for="alliance_pay" class="signin_label">예약금 설정</label>
                                <div>
                                    <input id="alliance_pay" type="number" name="alliance_pay" value="" placeholder="ex)10,000">
                                </div>
                            </div>
                        </div>
                        <div class="form_row signin_form">
                            <div class="signin_form_div">
                                <h4 class="profile_photo_label">메인사진</h4>
                                <div class="profile_photo_div">
                                    <label for="alliance_photo" class="signin_label profile_photo_input group_photo_input"></label>
                                    <input id="alliance_photo" name="alliance_photo" type="file" value="" placeholder="" accept="image/*">
                                    <div id="alliance_photo_view" class="meeting_photo_view" style="margin-top: 10px;">
                                    </div>
                                </div>
                            </div>
                            <div class="form_row signin_form">
                                <div class="signin_form_div">
                                    <h4 class="profile_photo_label">상세사진</h4>
                                    <div class="profile_photo_div">
                                        <label for="alliance_photo_detail" class="signin_label profile_photo_input"></label>
                                        <input id="alliance_photo_detail" name="alliance_photo_detail" type="file" value="" placeholder="" multiple accept="image/*">
                                        <div id="alliance_detail_post_box">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form_row signin_form">
                                <div class="signin_form_div">
                                    <label for="detailed_content" class="signin_label">상세내용</label>
                                    <textarea id="alliance_cont" value="" name="detailed_content" placeholder="내용을 입력하세요"></textarea></br />
                                </div>
                            </div>
                            <div class="form_row signin_form">
                                <div class="signin_form_div">
                                    <label for="alliance_terms" class="signin_label">개인정보 수집 및 이용목적</label>
                                    <div class="alliance_terms_agree allance_btn">
                                        <p>개인정보 수집 동의</p>
                                        <img src="/static/images/select_arrow.png" />
                                    </div>
                                    <div class="allance_content" style="display:none;">
                                        <p class=""><?= nl2br($privacy['content']); ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="chk_box">
                                <input type="checkbox" id="agree01" name="chkDefault00" checked="">
                                <label class="agree_cont_label" for="agree01">위 구매조건 확인 및 결제진행에 동의</label>
                            </div>
                            <div class="btn_group multy">
                                <button type="button" class="btn type02">취소</button>
                                <button type="button" class="btn type01" onclick="allianceUp()">등록</button>
                            </div>
                        </div>

                        <input type="hidden" id="alliance_bizday" name="alliance_bizday">
                        <input type="hidden" name="gender" value="<?= $gender ?>" />
                        <input type="hidden" name="agree1" value="<?= $agree1 ?>" />
                        <input type="hidden" name="agree2" value="<?= $agree2 ?>" />
                        <input type="hidden" name="agree3" value="<?= $agree3 ?>" />
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
        var filesInput = $('#alliance_photo_detail')[0];
        var filesArray = Array.from(filesInput.files);

        $(document).ready(function() {
            fileDetailBtn();
            alliClosetBtn();
            toggleMenu();
            searchAddr();

        });
        // const searchAddress = () => { 
        //     if(event){
        //         event.preventDefault();
        //     }
        //     new daum.Postcode({
        //         oncomplete: function (data) {
        //             var addr = data.address;
        //             $('#alliance_address1').val(addr);
        //         },
        //         // 테마 옵션 설정
        //         theme: {
        //             bgColor: "#FFFFFF", //바탕 배경색
        //             searchBgColor: "#FFFFFF", //검색창 배경색
        //             contentBgColor: "#FFFFFF", //본문 배경색(검색결과,결과없음,첫화면,검색서제스트)
        //             pageBgColor: "#FFFFFF", //페이지 배경색
        //             textColor: "#333333", //기본 글자색
        //             queryTextColor: "#222222", //검색창 글자색
        //             postcodeTextColor: "#FF0267", //우편번호 글자색
        //             emphTextColor: "#FF0267", //강조 글자색
        //             outlineColor: "#F0F0F0", //테두리
        //         }
        //     }).open();
        // }

        /*제휴신청 - 대표사진 미리보기 */
        $('#alliance_photo').on('change', function(event) {
            var files = event.target.files;
            var imagePreviewContainer = $('#alliance_photo_view');
            imagePreviewContainer.empty(); // 기존의 미리보기를 클리어

            var labelForInput = $('label[for="alliance_photo"]');
            if (files.length > 0) {
                labelForInput.css('display', 'none');
            } else {
                labelForInput.css('display', 'block');
            }

            $.each(files, function(index, file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var img = $('<img>');
                    img.attr('src', e.target.result);
                    img.css('width', '335px'); // 이미지 너비 고정
                    img.css('max-height', '220px'); // 이미지 최대 높이
                    img.css('object-fit', 'cover'); // 이미지 비율 유지
                    img.css('margin-top', '10px');
                    img.css('border', '1px solid #dddddd');
                    img.css('border-radius', '10px');
                    imagePreviewContainer.append(img);

                    // 미리보기 이미지 클릭 시 파일 선택 input 활성화
                    img.on('click', function() {
                        $('#alliance_photo').click();
                    });
                    imagePreviewContainer.append(img);
                };
                reader.readAsDataURL(file);
            });
        });

        /*제휴신청-요일 */
        $('.biz_day_box').on('click', function() {
            $(this).toggleClass('on');
            updateForm();
        });

        function updateForm() {
            var selectedDays = [];
            $('.biz_day_box.on').each(function() {
                selectedDays.push($(this).attr('value'));
            });

            // 선택된 요일을 name과 함께 form 으로 보내기
            $('#alliance_bizday').val(selectedDays.join(', '));
        }

        /* 제휴신청 - 디테일 파일 선택시 */
        function fileDetailBtn() {
            $('#alliance_photo_detail').on('change', function() {
                var files = $(this)[0].files;
                var maxFiles = 20; // 최대 업로드 가능한 파일 개수
                var currentFiles = $('#alliance_detail_post_box .alliance_image_container').length;
                var remainingSlots = maxFiles - currentFiles;

                if (files.length > remainingSlots) {
                    alert('최대 20장까지만 업로드할 수 있습니다.');
                    var excessFiles = Array.from(files).slice(0, remainingSlots);
                    $('#alliance_photo_detail').prop('files', excessFiles);
                    files = excessFiles;
                }

                for (var i = 0; i < files.length; i++) {
                    var reader = new FileReader();
                    reader.onload = (function(file) {
                        return function(e) {
                            var imageContainer = $('<div>', {
                                class: 'alliance_image_container'
                            });
                            var image = $('<img>', {
                                class: 'profile_photo_posted',
                                src: e.target.result,
                                style: 'display: block;'
                            });
                            var closeButton = $('<span>', {
                                class: 'alliance_close_button'
                            });

                            imageContainer.append(image).append(closeButton);
                            $('#alliance_detail_post_box').append(imageContainer);

                            filesArray.push(file);
                            setFilesToInput(filesArray);
                        };
                    })(files[i]);
                    reader.readAsDataURL(files[i]);
                }
            });
        }

        function alliClosetBtn() {
            $(document).on('click', '.alliance_close_button', function() {
                var container = $(this).closest('.alliance_image_container');
                var fileIndex = container.index();

                container.remove();

                filesArray.splice(fileIndex, 1);
                setFilesToInput(filesArray);
            });
        }

        /*제휴신청 - 상세파일목록정리 */
        function setFilesToInput(filesArray) {
            var dataTransfer = new DataTransfer();
            for (var i = 0; i < filesArray.length; i++) {
                dataTransfer.items.add(filesArray[i]);
            }
            filesInput.files = dataTransfer.files;
        }

        function toggleMenu() {
            $('.allance_btn').click(function() {
                var $answer = $(this).next('.allance_content');
                if ($answer.is(':visible')) {
                    $answer.slideUp();
                    $(this).find('img').attr('src', '/static/images/select_arrow.png');
                } else {
                    $answer.slideDown();
                    $(this).find('img').attr('src', '/static/images/select_arrow_up.png');
                }
            });
        }

        function searchAddr() {
            $('#alliance_address1').autocomplete({
                source: function(request, response) {
                    console.log(request);
                    const postData = {
                        'confmKey': 'devU01TX0FVVEgyMDI0MDQwMjIzMDExNzExNDY1NTU=',
                        'currentPage': '1',
                        'countPerPage': '100',
                        'keyword': request.term,
                        'resultType': 'json'
                    }
                    $.ajax({
                        url: 'https://business.juso.go.kr/addrlink/addrLinkApi.do',
                        type: 'POST',
                        data: postData,
                        async: false,
                        success: function(data) {
                            console.log(data)
                            response(
                                $.map(data.results.juso, function(item) {
                                    return {
                                        label: item.jibunAddr,
                                        value: item.jibunAddr,
                                        idx: item.zipNo,
                                    }
                                })
                            )
                        }
                    });
                },
                minLength: 2, // 최소 문자 수
                select: function(event, ui) {
                    // 아이템 선택 시 동작
                    console.log(ui.item.value); // 선택된 주소명
                }
            });
        }
    </script>

</body>

</html>