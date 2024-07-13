<html lang="ko">

<head>
    <title>Matchfy</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=3.0,  user-scalable=no, viewport-fit=cover">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="pragma" content="no-cache">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="/static/css/common_mo.css">
</head>

<body class="mo_wrap">
    <div class="wrap">
        <!-- HEADER: MENU + HEROE SECTION -->


        <?php $title = "제휴";
        include 'header.php'; ?>

        <div class="sub_wrap">
            <div class="content_wrap">
                <div class="group_deatil_img">
                    <img src="/static/images/alliance_detail.png" />
                </div>
                <div class="group_detail_info">
                    <div class="group_detail_header">
                        <div class="group_detail_type"><?= lang('Korean.extra') ?></div>
                        <p>　</p>
                    </div>
                    <div class="group_detail_title">
                        <h2>레드버튼 보드게임(이수점)</h2>
                        <p class="group_detail_schedule">서울 동작</p>
                    </div>
                    <div class="tab_wrap">
                        <ul>
                            <li>
                                <?= lang('Korean.reservBtn') ?>
                            </li>
                            <li class="on">
                                <?= lang('Korean.allianceDetailInfo') ?>
                            </li>
                        </ul>
                    </div>
                    <div class="alliance_detail_cont">
                        <h2><?= lang('Korean.intro') ?></h2>
                        <p>· 최소 2인 이상 예약 및 체험이 가능합니다.</p>
                        <p>· 입장 시간 10분 전까지 도착해주세요.</p>
                        <p>· 예약처리 기준 15분 내 미 방문 시 자동 사용 완료 처리 됩니다.</p>
                        <p>· 주차 불가 </p>
                        <p>· 외부 음료 반입 금지</p>

                    </div>
                    <div class="alliance_detail_cont">
                        <h2><?= lang('Korean.allianceCancelCon') ?></h2>
                        <table class="basic_table">
                            <tr>
                                <td><?= lang('Korean.allianceCancelCon2') ?></td>
                                <td><?= lang('Korean.allianceCancelCon3') ?></td>
                            </tr>
                            <tr>
                                <td><?= lang('Korean.allianceCancelCon4') ?></td>
                                <td><?= lang('Korean.allianceCancelCon5') ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="alliance_detail_cont">
                        <h2><?= lang('Korean.allianceLocation') ?></h2>
                        <div class="group_location">
                            <img src="/static/images/ico_location_16x16.png" />
                            서울시 동작구 상도동 205-23 2층
                        </div>
                        <div class="group_detail_map">
                            <img src="/static/images/group_naver_map.png" />
                        </div>
                    </div>
                    <div class="alliance_detail_cont">
                        <h2><?= lang('Korean.allianceSellerInfo') ?></h2>
                        <div class="alliance_profile_content">
                            <h2><?= lang('Korean.allianceMutual') ?></h2>
                            <p>레드버튼 이수</p>
                        </div>
                        <div class="alliance_profile_content">
                            <h2><?= lang('Korean.allianceRepresentativeName') ?></h2>
                            <p>홍길동</p>
                        </div>
                        <div class="alliance_profile_content">
                            <h2><?= lang('Korean.allianceCeonum') ?></h2>
                            <p>112-34-55667</p>
                        </div>
                        <div class="alliance_profile_content">
                            <h2><?= lang('Korean.allianceCompanyContact') ?></h2>
                            <p>02-1234-1234</p>
                        </div>
                    </div>
                </div>
                <div style="height: 50px;"></div>
                <footer class="footer">

                    <div class="btn_group">
                        <button type="button" class="btn type01"><?= lang('Korean.reservBtn') ?></button>
                    </div>
                </footer>
            </div>

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