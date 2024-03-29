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

        <?php $title = "매칭모임"; include 'header.php'; ?>

        <div class="sub_wrap">
            <div class="content_wrap">
                <div class="group_search">
                    <input type="text" placeholder="모임을 검색해보세요!" />
                    <img src="/static/images/ico_search_18x18.png" class="group_serch_img"/>
                </div>
                <div class="group_category">
                    <div class="group_category_all" data-category="">
                        <img src="/static/images/group_category_all.png" />
                        <p>전체</p>
                    </div>
                    <div class="group_category_1" data-category="01">
                        <img src="/static/images/group_category_1.png"/>
                        <p>주중 모임</p>
                    </div>
                    <div class="group_category_2" data-category="02">
                        <img src="/static/images/group_category_2.png"/>
                        <p>주중 여행</p>
                    </div>
                    <div class="group_category_3" data-category="03">
                        <img src="/static/images/group_category_3.png"/>
                        <p>주말 모임</p>
                    </div>
                    <div class="group_category_4 "data-category="04">
                        <img src="/static/images/group_category_4.png"/>
                        <p>주말 여행</p>
                    </div>
                </div>
                <div class="group_search_filter">
                    <select class="small" id="groupFilterSelect">
                        <option value="create_at">등록순</option>
                        <option value="meeting_start_date">빠른 모임순</option>
                        <option value="membership_fee">예약금 낮은 순</option>
                    </select>
                    <div class="group_create_btn">
                        <img src="/static/images/ico_btn_plus_8x8.png" />
                        <button class="btn type01 on" onclick="moveToUrl('/mo/mypage/group/create')">모임등록</button>
                    </div>
                </div>
                <div class="group_search_list">
                <?php foreach ($meetings as $meeting): ?>
                    <a href="/mo/mypage/group/detail/<?= $meeting['idx'] ?>">
                        <div class="group_list_item">
                            <?php if ($meeting['meeting_idx']): ?>
                                <img class="profile_img" src="/<?= $meeting['file_path'] ?><?= $meeting['file_name'] ?>" />
                            <?php else: ?>
                                <img src="/static/images/group_list_1.png" />
                            <?php endif; ?>
                            
                            <div class="group_particpnt">
                                <span>신청 <?=$meeting['count']?></span>/<?= $meeting['number_of_people'] ?>명
                            </div>
                            <div class="group_location">
                                <img src="/static/images/ico_location_16x16.png" />
                                <?= $meeting['meeting_place'] ?>
                            </div>
                            <p class="group_price"><?= number_format($meeting['membership_fee']) ?>원</p>
                            <p class="group_schedule"><?= $meeting['meeting_start_date'] ?></p>
                        </div>
                    </a>
                <?php endforeach; ?>
                </div>
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

        $(document).ready(function() {

            // 카테고리 클릭
            $('.group_category div').click(function() {

                $('.group_category img').removeClass('highlighted');
                
                $(this).find('img').addClass('highlighted');

                var category = $(this).data('category');
                var searchText = $('.group_search input[type="text"]').val();
                var filterOption = $('#groupFilterSelect').val();
                meetingFiltering(category, searchText, filterOption);
            });

            //검색 - 돋보기 클릭
            $('.group_serch_img').click(function() {
                var searchText = $('.group_search input[type="text"]').val();
                var filterOption = $('#groupFilterSelect').val();
                if (searchText.length < 1) { 
                    alert('글자를 하나 이상 입력해주세요.');
                    return; // 함수 실행 중단
                }
                meetingFiltering('', searchText, filterOption);
            });

            // 검색 - 엔터 키
            $('.group_search input[type="text"]').keypress(function(event) {
                if (event.which == 13) {
                    var searchText = $(this).val();
                    var filterOption = $('#groupFilterSelect').val();
                    if (searchText.length < 1) { 
                        alert('글자를 하나 이상 입력해주세요.');
                        return; // 함수 실행 중단
                    }
                    meetingFiltering('', searchText, filterOption);

                    event.preventDefault();//폼 막기
                }
            });

            // 필터링 옵션
            $('#groupFilterSelect').change(function() {
                var searchText = $('.group_search input[type="text"]').val();
                var filterOption = $(this).val();
                meetingFiltering('', searchText, filterOption);
            });
        });
    </script>

    <!-- -->


</body>

</html>