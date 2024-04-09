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
</head>

<body class="mo_wrap">
    <div class="wrap">
        <!-- HEADER: MENU + HEROE SECTION -->
        <mobileheader style="height:44px; display: block;"></mobileheader>

        <?php $title = "제휴"; include 'header.php'; ?>

        <div class="sub_wrap">
            <div class="content_wrap">
                <div class="alliance_payment">
                    <div class="alliance_payment_point">
                        <p>보유포인트</p>
                        <h2><?=number_format($points, 0)?> 원</h2>
                    </div>
                    <div class="amount_pay">
                        <div class="amount_pay_left alliance">
                            <h2>총 결제금액</h2>
                        </div>
                        <div class="amount_pay_right">
                            <h2><?=number_format($totalAmount, 0)?> 원</h2>
                        </div>
                    </div>
                    <hr class="hoz_part" />
                    <div class="alliance_detail_cont">
                        <h2>예매자 정보</h2>
                        <div class="alliance_profile_content">
                            <h2>예매자</h2>
                            <p><?=$user['name']?></p>
                        </div>                            
                        <div class="alliance_profile_content">
                            <h2>연락처</h2>
                            <p><?=$user['mobile_no']?></p>
                        </div>                           
                    </div>
                    <hr class="hoz_part" />
                    <div class="alliance_detail_cont">
                        <h2>개인정보 수집 제공</h2>
                        <div class="alliance_terms_agree allance_btn">
                            <p><?= nl2br($privacys['title']); ?></p>
                            <img src="/static/images/select_arrow.png"/>
                        </div>           
                        <div class="allance_content" style="display:none;">
                            <p class=""><?= nl2br($privacys['content']); ?></p>
                        </div>                 
                        <div class="alliance_terms_agree allance_btn">
                            <p><?= nl2br($privacys['title']); ?></p>
                            <img src="/static/images/select_arrow.png"/>
                        </div>
                        <div class="allance_content" style="display:none;">
                            <p class=""><?= nl2br($privacys['content']); ?></p>
                        </div>                              
                    </div>
                    <hr class="hoz_part" />
                    <div class="alliance_detail_cont">
                        <h2>취소/환불 규정</h2>                        
                        <table class="basic_table">
                            <tr>
                                <td>이용 1일 전까지</td>
                                <td>결제 금액에 대한 취소 수수료 없음</td>
                            </tr>
                            <tr>
                                <td>이용 당일</td>
                                <td>결제 금액의 100% 차감</td>
                            </tr>
                        </table>
                    </div>
                    <hr class="hoz_part" />
                    
                </div>
            </div>
            <div style="height: 50px;"></div>
            <footer class="footer">

                <div class="pay_agree_desc">
                    <div class="chk_box">
                        <input type="checkbox" id="agree01" name="chkDefault00" checked="">
                        <label class="agree_cont_label" for="agree01">위 구매조건 확인 및 결제진행에 동의</label>
                    </div>
                    <p>· 회원탈퇴 시 회원정보가 삭제됨으로 구매하신 포인트는
                        자동 소멸됩니다.</p>
                </div>
                <div class="btn_group multy">
                    <button type="button" class="btn type02" id="cancelButton">취소</button>
                    <button type="button" class="btn type01" id="alliance_reserve">동의하고 결제</button>
                </div>
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





    </div>


    <!-- SCRIPTS -->

    <script>
        function toggleMenu() {
            var menuItems = document.getElementsByClassName('menu-item');
            for (var i = 0; i < menuItems.length; i++) {
                var menuItem = menuItems[i];
                menuItem.classList.toggle("hidden");
            }
        }
    </script>
    <script>
        $(document).ready(function() {
            toggleMenu();

            // 취소
            $('#cancelButton').click(function() {
                window.history.back();
            });

            $('#alliance_reserve').click(function() {

                // 동의 확인
                if (!$('#agree01').is(':checked')) {
                    alert('구매 조건 확인 및 결제 진행에 동의해 주세요.');
                    return false;
                }

                //결제 포인트 체크
                var points = <?= $points ?>;
                var alliancePay = <?= $totalAmount ?>;

                if (alliancePay > points) {
                    alert('보유포인트가 부족합니다.');
                    return false;
                }

            });
        });

        function toggleMenu() {
            $('.allance_btn').click(function () {
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
    </script>

    <!-- -->


</body>

</html>