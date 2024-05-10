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
    <script src="/static/js/jquery.min.js"></script>
    <script src="/static/js/basic.js"></script>
</head>

<body class="mo_wrap">
    <div class="wrap">
        <!-- HEADER: MENU + HEROE SECTION -->


        <?php $title = "제휴";
        $prevUrl = "/";
        include 'header.php'; ?>

        <div class="sub_wrap">
            <div class="content_wrap">
                <div class="alliance_banner">
                    <img src="/static/images/alliance_banner.png" />
                </div>
                <div class="group_search">
                    <input type="text" placeholder="<?= lang('Korean.alliancePlacehoder3') ?>" />
                    <img src="/static/images/ico_search_18x18.png" />
                </div>
                <div class="group_category">
                    <div class="group_category_all" data-category="">
                        <img src="/static/images/group_category_all.png" />
                        <p><?= lang('Korean.all') ?></p>
                    </div>
                    <div class="group_category_1" data-category="01">
                        <img src="/static/images/alliance_category_1.png" />
                        <p><?= lang('Korean.allianceType2') ?></p>
                    </div>
                    <div class="group_category_2" data-category="02">
                        <img src="/static/images/alliance_category_2.png" />
                        <p><?= lang('Korean.allianceType3') ?></p>
                    </div>
                    <div class="group_category_3" data-category="03">
                        <img src="/static/images/alliance_category_3.png" />
                        <p><?= lang('Korean.allianceType4') ?></p>
                    </div>
                    <div class="group_category_4" data-category="">
                        <img src="/static/images/alliance_category_4.png" />
                        <p><?= lang('Korean.allianceType5') ?></p>
                    </div>
                </div>
                <!-- <div class="group_search_filter">
                    <select class="small">
                        <option><?= lang('Korean.region') ?> <?= lang('Korean.all') ?></option>

                    </select>
                </div> -->
                <div class="group_search_list">
                    <?php foreach ($alliances as $alliance) : ?>
                        <a href="/mo/alliance/detail/<?= $alliance['idx'] ?>">
                            <div class="group_list_item">
                                <img src="/<?= $alliance['file_path'] ?><?= $alliance['file_name'] ?>" />

                                <div class="group_location">
                                    <img src="/static/images/ico_location_16x16.png" />
                                    <?= $alliance['company_name'] ?>
                                </div>
                                <p class="group_price"><?= $alliance['address'] ?></p>
                                <p class="group_schedule">
                                    <?php
                                    if ($alliance['alliance_type'] === "01") {
                                        echo "음식점";
                                    } else if ($alliance['alliance_type'] === "02") {
                                        echo "카페";
                                    } else if ($alliance['alliance_type'] === "03") {
                                        echo "숙박";
                                    } else {
                                        echo "기타";
                                    }
                                    ?>
                                </p>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="layerPopup alert middle alliance" style="display: none;"><!-- class: imgPop 추가 -->
        <div class="layerPopup_wrap">
            <div class="layerPopup_header">
                <a href="#" class="btn_popup_close" onclick="closePopup();" style="float: right;">닫기</a>
            </div>
            <div class="layerPopup_content">
                <p class="txt"><?= lang('Korean.region') ?> <?= lang('Korean.selected') ?></p>
                <!-- <em class="desc">인증을 위한 혼인관계증명서를<br/>등록해주세요</em> -->

                <div class="region_list">
                    <div class="region_list_box on"><?= lang('Korean.all') ?></div>
                    <div class="region_list_box"><?= lang('Korean.seoul') ?></div>
                    <div class="region_list_box"><?= lang('Korean.gyeonggi') ?></div>
                    <div class="region_list_box"><?= lang('Korean.incheon') ?></div>
                    <div class="region_list_box"><?= lang('Korean.daejeon') ?></div>
                    <div class="region_list_box"><?= lang('Korean.sejong') ?></div>
                    <div class="region_list_box"><?= lang('Korean.chungnam') ?></div>
                    <div class="region_list_box"><?= lang('Korean.chungbuk') ?></div>
                    <div class="region_list_box"><?= lang('Korean.gwangju') ?></div>
                    <div class="region_list_box"><?= lang('Korean.jeonnam') ?></div>
                    <div class="region_list_box"><?= lang('Korean.jeonbuk') ?></div>
                    <div class="region_list_box"><?= lang('Korean.daegu') ?></div>
                    <div class="region_list_box"><?= lang('Korean.gyeongbuk') ?></div>
                    <div class="region_list_box"><?= lang('Korean.busan') ?></div>
                    <div class="region_list_box"><?= lang('Korean.ulsan') ?></div>
                    <div class="region_list_box"><?= lang('Korean.gyeongnam') ?></div>
                    <div class="region_list_box"><?= lang('Korean.gangwon') ?></div>
                    <div class="region_list_box"><?= lang('Korean.jeju') ?></div>
                </div>
                <div class="layerPopup_bottom">
                    <div class="btn_group multy">
                        <button class="btn type03" id="reset"><?= lang('Korean.reset') ?></button>
                        <button class="btn type01" id="confirm"><?= lang('Korean.check') ?></button>
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
                <a href="#"><?= lang('Korean.companyName') ?></a>
                <a href="#"><?= lang('Korean.pravacyName') ?></a>
                <a href="#"><?= lang('Korean.serviceName') ?></a>
                <a href="#"><?= lang('Korean.supporterName') ?></a>
            </div>
            <div class="footer_info mb40">
                <span><?= lang('Korean.footerInfo1') ?> <img src="/static/images/part_line.png" /> <?= lang('Korean.footerInfo2') ?></span>
                <span><?= lang('Korean.footerInfo3') ?> <img src="/static/images/part_line.png" /> <?= lang('Korean.footerInfo4') ?><img
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
                var filterOption = selectedRegionText === "<?= lang('Korean.all') ?>" ? '' : selectedRegionText;
                allianceFiltering(selectedCategory, searchText, filterOption);
            }

        });
    </script>

    <!-- -->


</body>

</html>