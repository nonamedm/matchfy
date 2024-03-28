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
    <script src="/static/js/mygroup.js"></script>
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
                        모임
                    </li>
                </ul>
<<<<<<< HEAD
                <div class="menu_right edit">편집</div>
                <div class="menu_right delete" style="display:none;">삭제</div>
=======
                <div class="menu_right edit" id="meet_edit_btn"onclick="MeetingEditChk();">편집</div>
                <div class="menu_right edit meet_menu_right" style="display:none;">
                    <span class="meet_menu_header" onclick="MeetCancelChk();"> 편집종료</span>
                    <span class="meet_menu_header" id="meet_delete_btn" onclick="MyGoupDelconfrim();">삭제</span>
                </div>
>>>>>>> origin/local_payment
            </div>

        </header>

        <div class="sub_wrap">
            <div class="content_wrap">
                <div class="notice_filter">
                    <select class="small" id="notice_filter">
                        <option value="create_at">등록순</option>
                        <option value="meeting_start_date">빠른 모임순</option>
                        <option value="membership_fee">예약금 낮은 순</option>
                    </select>
                </div>
<<<<<<< HEAD
                <div class="mygroup_list">
                    <?php foreach ($meetings as $meeting): ?>
                    <a href="/mo/mypage/group/detail/<?= $meeting['idx'] ?>">
                        <div class="apply_group_detail  <?= $meeting['isEnded'] ? 'ended' : '' ?>">
                            <div class="chk_box" style="display:none;">
                                <input type="checkbox" id="totAgree<?= $meeting['idx'] ?>" name="chkDefault<?= $meeting['idx'] ?>">
                                <label class="totAgree_label" for="totAgree<?= $meeting['idx'] ?>"></label>
=======
                <div class="mygroup_list" id="mygroup_list_body">
                <?php foreach ($meetings as $meeting): ?>
                    <div class="apply_group_detail">
                        <div class="chk_box meet_delete_chk_box" style="display:none;">
                            <input type="checkbox" class="totAgree" id="totAgree<?= $meeting->meeting_idx ?>" name="chkDefault00">
                            <label class="totAgree_label" for="totAgree<?= $meeting->meeting_idx ?>"></label>
                        </div>
                        <a href="/mo/mypage/group/detail/<?= $meeting->meeting_idx ?>">
                            <img src="/<?= $meeting->file_path?><?= $meeting->file_name?>" />
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
                                <p class="group_price"><?= number_format($meeting->membership_fee) ?>원</p>
                                <?php
                                    $date = $meeting->meeting_start_date;
                                    $dayOfWeek = date('w', strtotime($date)); // 요일을 숫자(0~6)로 가져옴

                                    $days = array('일', '월', '화', '수', '목', '금', '토');
                                    $newDate = date('Y.m.d', strtotime($date)) . ' (' . $days[$dayOfWeek] . ') 모임';
                                ?>
                                <p class="group_schedule"><?= $newDate ?> </p>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
                    <!-- <div class="apply_group_detail">
                        <img src="/static/images/group_list_1.png" />
                        <div class="group_list_item group_apply_item">
                            <div class="group_particpnt">
                                <span>신청 2</span>/4명
>>>>>>> origin/local_payment
                            </div>
                            <?php if ($meeting['isEnded']): ?>
                                <div class="ended_overlay">종료</div>
                            <?php endif; ?>
                            <?php if ($meeting['meeting_idx']): ?>
                                <img class="profile_img <?= $meeting['isEnded'] ? 'grayscale' : '' ?>" src="/<?= $meeting['file_path'] ?><?= $meeting['file_name'] ?>" />
                            <?php else: ?>
                                <img class="profile_img <?= $meeting['isEnded'] ? 'grayscale' : '' ?>" src="/static/images/group_list_1.png" />
                            <?php endif; ?>
                            <div class="group_list_item group_apply_item">
                                <div class="group_particpnt">
                                    <span>신청 <?=$meeting['count']?></span>/<?= $meeting['number_of_people'] ?>명
                                </div>
                                <div class="group_location">
                                    <img src="/static/images/ico_location_16x16.png" />
                                    <?= $meeting['meeting_place'] ?>
                                </div>
                                <p class="group_price"><?= number_format($meeting['membership_fee']) ?>원</p>
                                <p class="group_schedule"><?= $meeting['meetingDateTime'] ?> </p>
                            </div>
                        </div>
<<<<<<< HEAD
                    </a>
                    <?php endforeach; ?>
=======
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
>>>>>>> origin/local_payment
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

        // 편집 버튼 클릭 이벤트
        document.querySelector('.menu_right.edit').addEventListener('click', function() {

            document.querySelectorAll('.chk_box').forEach(chkBox => chkBox.style.display = 'block');

            document.querySelector('.menu_right.edit').style.display = 'none';
            document.querySelector('.menu_right.delete').style.display = 'block';

            document.querySelectorAll('.mygroup_list a').forEach(a => {
                a.dataset.href = a.getAttribute('href'); // 원래 href 값을 저장
                a.removeAttribute('href'); // href 속성 제거
            });
        });

        // 삭제 버튼 클릭 이벤트
        document.querySelector('.menu_right.delete').addEventListener('click', function() {
            
            document.querySelectorAll('.chk_box').forEach(chkBox => chkBox.style.display = 'none');
            
            document.querySelector('.menu_right.delete').style.display = 'none';
            document.querySelector('.menu_right.edit').style.display = 'block';
            // 링크 활성화
            document.querySelectorAll('.mygroup_list a').forEach(a => {
                if(a.dataset.href) { // 저장된 href 값이 있으면 복원
                    a.setAttribute('href', a.dataset.href);
                }
            });
        });

        $(document).ready(function() {
            // 필터링 옵션
            $('#notice_filter').change(function() {
                var filterOption = $(this).val();
                MymeetingFiltering(filterOption);
            });
        });

    </script>

    <!-- -->


</body>

</html>