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
        <header>

            <div class="menu">
                <ul>
                    <li class="left_arrow">
                        <img src="/static/images/left_arrow.png" />
                    </li>
                    <li class="header_title">
                        모임
                    </li>
                </ul>
                <div class="menu_right edit" id="meet_edit_btn"onclick="MeetingEditChk();">편집</div>
                <div class="menu_right edit meet_menu_right" style="display:none;">
                    <span class="meet_menu_header" onclick="MeetCancelChk();"> 취소</span>
                    <span class="meet_menu_header" id="meet_delete_btn" onclick="MyGoupDelconfrim();">삭제</span>
                </div>
            </div>

        </header>

        <div class="sub_wrap">
            <div class="content_wrap">
                <div class="notice_filter">
                    <p>09.01 ~ 09.30</p>
                    <select>
                        <option>최근순</option>
                        <option>최근순</option>
                        <option>최근순</option>
                    </select>
                </div>
                <div class="mygroup_list" id="mygroup_list_body">
                <?php foreach ($meetings as $meeting): ?>
                    <div class="apply_group_detail">
                        <div class="chk_box meet_delete_chk_box" style="display:none;">
                            <input type="checkbox" class="totAgree" id="totAgree<?= $meeting->meeting_idx ?>" name="chkDefault00">
                            <label class="totAgree_label" for="totAgree<?= $meeting->meeting_idx ?>"></label>
                        </div>
                        <a href="/mo/mypage/group/detail/<?= $meeting->meeting_idx ?>">
                            <img src="<?= $meeting->file_path?><?= $meeting->file_name?>" />
                        </a>
                        <div class="group_list_item group_apply_item">
                            <div class="group_particpnt" onclick="javascript:meetingMemberList(<?= $meeting->meeting_idx ?>);">
                                <span>신청 <?= $meeting->meeting_idx_count ?></span>/<?= $meeting->number_of_people ?>명
                            </div>
                            <a href="/mo/mypage/group/detail/<?= $meeting->meeting_idx ?>">
                                <div class="group_location">
                                    <img src="/static/images/ico_location_16x16.png" />
                                    <?= $meeting->meeting_place ?>
                                </div>
                                <p class="group_price"><?= $meeting->membership_fee ?>원</p>
                                <p class="group_schedule"><?= $meeting->meeting_start_date ?> </p>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
                    <!-- <div class="apply_group_detail">
                        <img src="/static/images/group_list_1.png" />
                        <div class="group_list_item group_apply_item">
                            <div class="group_particpnt">
                                <span>신청 2</span>/4명
                            </div>
                            <div class="group_location">
                                <img src="/static/images/ico_location_16x16.png" />
                                서울/강남구
                            </div>
                            <p class="group_price">20,000원</p>
                            <p class="group_schedule">2023. 01. 24(수) 19:30 </p>
                        </div>
                    </div> -->
                    <!-- <div class="apply_group_detail">
                        <img src="/static/images/group_list_2.png" />
                        <div class="group_list_item group_apply_item">
                            <div class="group_particpnt">
                                <span>신청 2</span>/4명
                            </div>
                            <div class="group_location">
                                <img src="/static/images/ico_location_16x16.png" />
                                서울/강남구
                            </div>
                            <p class="group_price">20,000원</p>
                            <p class="group_schedule">2023. 01. 24(수) 19:30 </p>
                        </div>
                    </div>
                    <div class="apply_group_detail">
                        <img src="/static/images/group_list_3.png" />
                        <div class="group_list_item group_apply_item">
                            <div class="group_particpnt">
                                <span>신청 2</span>/4명
                            </div>
                            <div class="group_location">
                                <img src="/static/images/ico_location_16x16.png" />
                                서울/강남구
                            </div>
                            <p class="group_price">20,000원</p>
                            <p class="group_schedule">2023. 01. 24(수) 19:30 </p>
                        </div>
                    </div>
                    <div class="apply_group_detail">
                        <img src="/static/images/group_list_4.png" />
                        <div class="group_list_item group_apply_item">
                            <div class="group_particpnt">
                                <span>신청 2</span>/4명
                            </div>
                            <div class="group_location">
                                <img src="/static/images/ico_location_16x16.png" />
                                서울/강남구
                            </div>
                            <p class="group_price">20,000원</p>
                            <p class="group_schedule">2023. 01. 24(수) 19:30 </p>
                        </div>
                    </div>
                    <div class="apply_group_detail">
                        <img src="/static/images/group_list_1.png" />
                        <div class="group_list_item group_apply_item">
                            <div class="group_particpnt">
                                <span>신청 2</span>/4명
                            </div>
                            <div class="group_location">
                                <img src="/static/images/ico_location_16x16.png" />
                                서울/강남구
                            </div>
                            <p class="group_price">20,000원</p>
                            <p class="group_schedule">2023. 01. 24(수) 19:30 </p>
                        </div>
                    </div>
                    <div class="apply_group_detail">
                        <img src="/static/images/group_list_2.png" />
                        <div class="group_list_item group_apply_item">
                            <div class="group_particpnt">
                                <span>신청 2</span>/4명
                            </div>
                            <div class="group_location">
                                <img src="/static/images/ico_location_16x16.png" />
                                서울/강남구
                            </div>
                            <p class="group_price">20,000원</p>
                            <p class="group_schedule">2023. 01. 24(수) 19:30 </p>
                        </div>
                    </div> -->
                </div>
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