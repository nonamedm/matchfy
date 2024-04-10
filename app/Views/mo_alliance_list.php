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

        <?php $title = "제휴"; include 'header.php'; ?>

        <div class="sub_wrap">
            <div class="content_wrap">
                <div class="alliance_banner" style="margin-left:-20px;">
                    <img src="/static/images/alliance_banner.png" />
                </div>
                <div class="group_search">
                    <input type="text" placeholder="제휴점을 검색해보세요!" />
                    <img src="/static/images/ico_search_18x18.png" />
                </div>
                <div class="group_category">
                    <div class="group_category_all" data-category="">
                        <img src="/static/images/group_category_all.png" />
                        <p>전체</p>
                    </div>
                    <div class="group_category_1" data-category="01">
                        <img src="/static/images/alliance_category_1.png" />
                        <p>음식점</p>
                    </div>
                    <div class="group_category_2" data-category="02">
                        <img src="/static/images/alliance_category_2.png" />
                        <p>카페</p>
                    </div>
                    <div class="group_category_3" data-category="03">
                        <img src="/static/images/alliance_category_3.png" />
                        <p>숙박</p>
                    </div>
                    <div class="group_category_4" data-category="">
                        <img src="/static/images/alliance_category_4.png" />
                        <p>지역별</p>
                    </div>
                </div>
                <!-- <div class="group_search_filter">
                    <select class="small">
                        <option>지역 전체</option>

                    </select>
                </div> -->
                <div class="group_search_list">
                <?php foreach ($alliances as $alliance): ?>
                    <a href="/mo/alliance/detail/<?= $alliance['idx'] ?>">
                        <div class="group_list_item">
                            <img src="/<?= $alliance['file_path'] ?><?= $alliance['file_name'] ?>" />

                            <div class="group_location">
                                <img src="/static/images/ico_location_16x16.png" />
                                <?= $alliance['company_name'] ?>
                            </div>
                            <p class="group_price"><?= $alliance['address'] ?></p>
                            <p class="group_schedule"><?= $alliance['alliance_type'] ?></p>
                        </div>
                    </a>
                <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="layerPopup alert middle alliance" style="display: none;"><!-- class: imgPop 추가 -->
        <div class="layerPopup_wrap">
            <div class="layerPopup_content">
                <p class="txt">지역 선택</p>
                <!-- <em class="desc">인증을 위한 혼인관계증명서를<br/>등록해주세요</em> -->

                <div class="region_list">
                    <div class="region_list_box on">전체</div>
                    <div class="region_list_box">서울</div>
                    <div class="region_list_box">경기</div>
                    <div class="region_list_box">인천</div>
                    <div class="region_list_box">대전</div>
                    <div class="region_list_box">세종</div>
                    <div class="region_list_box">충남</div>
                    <div class="region_list_box">충북</div>
                    <div class="region_list_box">광주</div>
                    <div class="region_list_box">전남</div>
                    <div class="region_list_box">전북</div>
                    <div class="region_list_box">대구</div>
                    <div class="region_list_box">경북</div>
                    <div class="region_list_box">부산</div>
                    <div class="region_list_box">울산</div>
                    <div class="region_list_box">경남</div>
                    <div class="region_list_box">강원</div>
                    <div class="region_list_box">제주</div>
                </div>
                <div class="layerPopup_bottom">
                    <div class="btn_group multy">
                        <button class="btn type03" id="reset">초기화</button>
                        <button class="btn type01" id="confirm">확인</button>
                    </div>
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
            // 검색 - 돋보기 클릭
            $('.group_serch_img').click(function() {
                updateAllianceFiltering();
            });

            // 검색 - 엔터 키
            $('.group_search input[type="text"]').keypress(function(event) {
                if (event.which == 13) {
                    event.preventDefault();
                    updateAllianceFiltering();
                }
            });

            // 검색창 내용 변경 시
            $('.group_search input[type="text"]').on('input', function() {
                updateAllianceFiltering();
            });

            // 카테고리 클릭
            $('.group_category div').click(function() {
                if (!$(this).hasClass('group_category_4')) {
                    $('.group_category img').removeClass('highlighted');
                    $(this).find('img').addClass('highlighted');
                }
                if (!$(this).hasClass('group_category_4')) {
                    updateAllianceFiltering();
                }
            });

            //팝업 - 지역
            $('.group_category_4').click(function() {
                $(".layerPopup").css("display", "flex");
            });

            $('.region_list_box').click(function() {
                $('.region_list_box').removeClass('on');
                $(this).addClass('on');
            });

            //팝업 - 초기화 버튼
            $('.layerPopup .btn.type03').click(function() {
                $('.region_list_box').removeClass('on');
                $('.region_list_box:first').addClass('on');
            });
            
            //팝업 - 확인 버튼
            $('.layerPopup .btn.type01').click(function() {
                $(".layerPopup").hide();
                updateAllianceFiltering();
            });

            // 공통
            function updateAllianceFiltering() {
                var selectedCategory = $('.group_category div img.highlighted').closest('div').data('category') || '';
                var searchText = $('.group_search input[type="text"]').val();
                var selectedRegionText = $('.region_list_box.on').text();
                var filterOption = selectedRegionText === "전체" ? '' : selectedRegionText;
                allianceFiltering(selectedCategory, searchText, filterOption);
            }

        });
    </script>

    <!-- -->


</body>

</html>