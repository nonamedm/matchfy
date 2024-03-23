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
    <script src="/static/js/jquery.min.js"></script>
    <script src="/static/js/meeting_member.js"></script>
    <link rel="stylesheet" href="/static/css/common_mo.css">
</head>

<body class="mo_wrap">
    <div class="wrap">
        <!-- HEADER: MENU + HEROE SECTION -->
        <mobileheader style="height:44px; display: block;"></mobileheader>
        
        <?php $title = "매칭모임"; include 'header.php'; ?>

        <div class="sub_wrap">
            <div class="content_wrap">
                <div class="group_deatil_img">
                    <img src="/static/images/group_deatil.png" />
                </div>
                <div class="group_detail_info">
                    <div class="group_detail_header">
                        <div class="group_detail_type">주중 모임</div>
                        <p>매칭률 <span>90%</span> 이상</p>
                    </div>
                    <div class="group_detail_title">
                        <h2>금요일에 남산타워 갈 멤버 구해요 !</h2>
                        <p class="group_detail_schedule">2023.03.22 (금) 모임</p>
                        <p class="group_detail_period">2023.03.04~2023.03.21 까지 모집중</p>
                        <div class="group_particpnt" onclick="meetingMemberList('1')">
                            <span>신청 2</span>/4명
                        </div>
                    </div>
                    <hr class="hoz_part" />
                    <div class="group_detail_cont">
                        <p>안녕하세요 홍길동 입니다. </p>

                        <p>3/22 금요일에 모여서<br />
                            남산타워가실 분 만나요!</p>

                        <p>7시쯤에 명동역 5번출구 앞에서 만나서<br />
                            다같이 가면 좋겠습니다. </p>

                        <p>다녀와서 저녁식사 같이해요! </p>
                        <div class="group_detail_location">
                            <div>
                                <img src="/static/images/group_location_detail.png" />
                            </div>
                            <div style="padding: 10px 0 0 20px;">
                                <div class="group_location">
                                    <img src="/static/images/ico_location_16x16.png" />
                                    광장시장 자매 육회
                                </div>
                                <p class="group_location_schedule">2023.03.22 (금) 20시 </p>
                                <p class="group_location_fee"><span>30,000원</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="group_detail_map">
                        <h2>모임장소</h2>
                        <img src="/static/images/group_naver_map.png" />

                    </div>
                </div>
            </div>
            <div style="height: 50px;"></div>
            <footer class="footer">
                <div class="btn_group">
                                                             
                    <button type="button" class="btn type01" onclick="meetingApplication('1')">함께하기</button>
                </div>
                
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

    <!-- -->


</body>

</html>