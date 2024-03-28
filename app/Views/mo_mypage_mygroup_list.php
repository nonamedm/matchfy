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
                        모임
                    </li>
                </ul>
                <div class="menu_right edit">편집</div>
                <div class="menu_right delete" style="display:none;">삭제</div>
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
                <div class="mygroup_list">
                    <?php foreach ($meetings as $meeting): ?>
                    <a href="/mo/mypage/group/detail/<?= $meeting['idx'] ?>">
                        <div class="apply_group_detail  <?= $meeting['isEnded'] ? 'ended' : '' ?>">
                            <div class="chk_box" style="display:none;">
                                <input type="checkbox" id="totAgree<?= $meeting['idx'] ?>" name="chkDefault<?= $meeting['idx'] ?>">
                                <label class="totAgree_label" for="totAgree<?= $meeting['idx'] ?>"></label>
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
                    </a>
                    <?php endforeach; ?>
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