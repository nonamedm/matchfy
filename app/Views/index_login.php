<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Matchfy</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">

    <link rel="stylesheet" href="/static/css/common.css">
    <script src="/static/js/basic.js"></script>
    <!-- STYLES -->

    <style {csp-style-nonce}>
        html,
        body {
            margin: 0;
            padding: 0;
        }

        header {
            background-color: rgba(247, 248, 249, 1);
            padding: .4rem 0 0;
        }

        .menu {
            padding: .4rem 2rem;
        }

        header ul {
            border-bottom: 1px solid rgba(242, 242, 242, 1);
            list-style-type: none;
            margin: 0;
            overflow: hidden;
            padding: 0;
            text-align: right;
        }

        header li {
            display: inline-block;
        }

        header .logo {
            float: left;
            height: 44px;
            padding: .4rem .5rem;
        }

        @media (max-width: 629px) {
            header ul {
                padding: 0;
            }

            header .menu-toggle {
                padding: 0 1rem;
            }
        }
    </style>
</head>

<body>

    <!-- HEADER: MENU + HEROE SECTION -->
    <header>

        <div class="menu">
            <ul>
                <li class="logo">
                    <img src="/static/images/matchfy.png" />
                </li>
                <!-- <li class="menu-toggle">
                    <button onclick="toggleMenu();">&#9776;</button>
                </li> -->

                <li class="menu_item">

                    <!-- <button class="login_btn" href="#" target="_blank"><img src="/static/images/login_ico.png" />
                        <p><?=lang('Korean.login')?></p>
                    </button> -->
                    <button class="login_btn" onclick="moveToUrl('/mo/mypage')">
                        <img src="/static/images/login_ico.png"/>
                        <p>my</p>
                    </button>
                </li>
            </ul>
        </div>

    </header>
    <div class="content">
        <div class="main_bg_center_box">
            <h2><?=lang('Korean.mainCon')?></h2>
            <p><?=lang('Korean.mainCon2')?></p>
            <button><?=lang('Korean.mainConBtn')?></button>
        </div>
    </div>

    <div class="content_banner_top">
        <img src="/static/images/content_banner_top.png" />
    </div>
    <div class="content_no_img login_main">
        <div class="login_main_title">
            <h2><?=lang('Korean.mainTitle')?></h2>
            <div class="main_title_btn">
                <button><?=lang('Korean.all')?></button>
                <button class="on"><?=lang('Korean.woman')?></button>
                <button><?=lang('Korean.man')?></button>
            </div>
        </div>
        <div class="login_main_list">
            <div class="ai_mat_card">
                <img src="/static/images/main_ai_1.png" />
                <h2>96, <?=lang('Korean.seoul')?>/강남</h2>
                <div class="profile_row">
                    <p class="mbti">ENFJ</p>
                    <p class="mat_percent">99%</p>
                </div>
            </div>
            <div class="ai_mat_card">
                <img src="/static/images/main_ai_2.png" />
                <h2>96, <?=lang('Korean.seoul')?>/강남</h2>
                <div class="profile_row">
                    <p class="mbti">ENFJ</p>
                    <p class="mat_percent">99%</p>
                </div>
            </div>
            <div class="ai_mat_card">
                <img src="/static/images/main_ai_3.png" />
                <h2>96, <?=lang('Korean.seoul')?>/강남</h2>
                <div class="profile_row">
                    <p class="mbti">ENFJ</p>
                    <p class="mat_percent">99%</p>
                </div>
            </div>
            <div class="ai_mat_card">
                <img src="/static/images/main_ai_4.png" />
                <h2>96, <?=lang('Korean.seoul')?>/강남</h2>
                <div class="profile_row">
                    <p class="mbti">ENFJ</p>
                    <p class="mat_percent">99%</p>
                </div>
            </div>
            <div class="ai_mat_card">
                <img src="/static/images/main_ai_5.png" />
                <h2>96, <?=lang('Korean.seoul')?>/강남</h2>
                <div class="profile_row">
                    <p class="mbti">ENFJ</p>
                    <p class="mat_percent">99%</p>
                </div>
            </div>
            <div class="ai_mat_card">
                <img src="/static/images/main_ai_6.png" />
                <h2>96, <?=lang('Korean.seoul')?>/강남</h2>
                <div class="profile_row">
                    <p class="mbti">ENFJ</p>
                    <p class="mat_percent">99%</p>
                </div>
            </div>

        </div>
    </div>
    <div class="content_no_img login_main">
        <div class="login_main_title">
            <h2><?=lang('Korean.weekdayMeeting')?></h2>
        </div>
        <div class="group_row">
            <p class="group_week"><?=lang('Korean.weekTitle')?></p>
            <div class="group_type">
                <h2>
                    <?=lang('Korean.indexCon11')?>
                </h2>
                <div class="main_title_btn">
                    <button class="total"><?=lang('Korean.all')?>보기</button>
                    <button class="disabled">
                        < </button>
                            <button>></button>
                </div>
            </div>
            <div class="login_main_list">
                <div class="ai_group_card">
                    <img src="/static/images/group_main_01.png" />
                    <div class="group_particpnt">
                        <span><?=lang('Korean.application')?> 2</span>/4<?=lang('Korean.people')?>
                    </div>
                    <div class="group_location">
                        <img src="/static/images/ico_location_16x16.png">
                        <?=lang('Korean.seoul')?>/강남구
                    </div>
                    <div class="schedule_row">
                        <p>20,000<?=lang('Korean.won')?> <span>2023. 01. 24(수) 19:30</span></p>
                    </div>
                </div>
                <div class="ai_group_card">
                    <img src="/static/images/group_main_02.png" />
                    <div class="group_particpnt">
                        <span><?=lang('Korean.application')?> 2</span>/4<?=lang('Korean.people')?>
                    </div>
                    <div class="group_location">
                        <img src="/static/images/ico_location_16x16.png">
                        <?=lang('Korean.seoul')?>/강남구
                    </div>
                    <div class="schedule_row">
                        <p>20,000<?=lang('Korean.won')?> <span>2023. 01. 24(수) 19:30</span></p>
                    </div>
                </div>
                <div class="ai_group_card">
                    <img src="/static/images/group_main_03.png" />
                    <div class="group_particpnt">
                        <span><?=lang('Korean.application')?> 2</span>/4<?=lang('Korean.people')?>
                    </div>
                    <div class="group_location">
                        <img src="/static/images/ico_location_16x16.png">
                        <?=lang('Korean.seoul')?>/강남구
                    </div>
                    <div class="schedule_row">
                        <p>20,000<?=lang('Korean.won')?> <span>2023. 01. 24(수) 19:30</span></p>
                    </div>
                </div>
                <div class="ai_group_card">
                    <img src="/static/images/group_main_04.png" />
                    <div class="group_particpnt">
                        <span><?=lang('Korean.application')?> 2</span>/4<?=lang('Korean.people')?>
                    </div>
                    <div class="group_location">
                        <img src="/static/images/ico_location_16x16.png">
                        <?=lang('Korean.seoul')?>/강남구
                    </div>
                    <div class="schedule_row">
                        <p>20,000<?=lang('Korean.won')?> <span>2023. 01. 24(수) 19:30</span></p>
                    </div>
                </div>

            </div>
        </div>
        <div class="group_row">
            <p class="group_week"><?=lang('Korean.weekTitle')?></p>
            <div class="group_type">
                <h2>
                    <?=lang('Korean.trip')?>
                </h2>
                <div class="main_title_btn">
                    <button class="total"><?=lang('Korean.all')?>보기</button>
                    <button class="disabled">
                        < </button>
                            <button>></button>
                </div>
            </div>
            <div class="login_main_list">
                <div class="ai_group_card">
                    <img src="/static/images/group_main_05.png" />
                    <div class="group_particpnt">
                        <span><?=lang('Korean.application')?> 2</span>/4<?=lang('Korean.people')?>
                    </div>
                    <div class="group_location">
                        <img src="/static/images/ico_location_16x16.png">
                        <?=lang('Korean.seoul')?>/강남구
                    </div>
                    <div class="schedule_row">
                        <p>20,000<?=lang('Korean.won')?> <span>2023. 01. 24(수) 19:30</span></p>
                    </div>
                </div>
                <div class="ai_group_card">
                    <img src="/static/images/group_main_06.png" />
                    <div class="group_particpnt">
                        <span><?=lang('Korean.application')?> 2</span>/4<?=lang('Korean.people')?>
                    </div>
                    <div class="group_location">
                        <img src="/static/images/ico_location_16x16.png">
                        <?=lang('Korean.seoul')?>/강남구
                    </div>
                    <div class="schedule_row">
                        <p>20,000<?=lang('Korean.won')?> <span>2023. 01. 24(수) 19:30</span></p>
                    </div>
                </div>
                <div class="ai_group_card">
                    <img src="/static/images/group_main_07.png" />
                    <div class="group_particpnt">
                        <span><?=lang('Korean.application')?> 2</span>/4<?=lang('Korean.people')?>
                    </div>
                    <div class="group_location">
                        <img src="/static/images/ico_location_16x16.png">
                        <?=lang('Korean.seoul')?>/강남구
                    </div>
                    <div class="schedule_row">
                        <p>20,000<?=lang('Korean.won')?> <span>2023. 01. 24(수) 19:30</span></p>
                    </div>
                </div>
                <div class="ai_group_card">
                    <img src="/static/images/group_main_08.png" />
                    <div class="group_particpnt">
                        <span><?=lang('Korean.application')?> 2</span>/4<?=lang('Korean.people')?>
                    </div>
                    <div class="group_location">
                        <img src="/static/images/ico_location_16x16.png">
                        <?=lang('Korean.seoul')?>/강남구
                    </div>
                    <div class="schedule_row">
                        <p>20,000<?=lang('Korean.won')?> <span>2023. 01. 24(수) 19:30</span></p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="content_no_img login_main">
        <div class="login_main_title">
            <h2><?=lang('Korean.holiMeeting')?></h2>
        </div>
        <div class="group_row">
            <p class="group_week"><?=lang('Korean.holidayTitle')?></p>
            <div class="group_type">
                <h2>
                    <?=lang('Korean.indexCon11')?>
                </h2>
                <div class="main_title_btn">
                    <button class="total"><?=lang('Korean.all')?>보기</button>
                    <button class="disabled">
                        < </button>
                            <button>></button>
                </div>
            </div>
            <div class="login_main_list">
                <div class="ai_group_card">
                    <img src="/static/images/group_main_01.png" />
                    <div class="group_particpnt">
                        <span><?=lang('Korean.application')?> 2</span>/4<?=lang('Korean.people')?>
                    </div>
                    <div class="group_location">
                        <img src="/static/images/ico_location_16x16.png">
                        <?=lang('Korean.seoul')?>/강남구
                    </div>
                    <div class="schedule_row">
                        <p>20,000<?=lang('Korean.won')?> <span>2023. 01. 24(수) 19:30</span></p>
                    </div>
                </div>
                <div class="ai_group_card">
                    <img src="/static/images/group_main_02.png" />
                    <div class="group_particpnt">
                        <span><?=lang('Korean.application')?> 2</span>/4<?=lang('Korean.people')?>
                    </div>
                    <div class="group_location">
                        <img src="/static/images/ico_location_16x16.png">
                        <?=lang('Korean.seoul')?>/강남구
                    </div>
                    <div class="schedule_row">
                        <p>20,000<?=lang('Korean.won')?> <span>2023. 01. 24(수) 19:30</span></p>
                    </div>
                </div>
                <div class="ai_group_card">
                    <img src="/static/images/group_main_03.png" />
                    <div class="group_particpnt">
                        <span><?=lang('Korean.application')?> 2</span>/4<?=lang('Korean.people')?>
                    </div>
                    <div class="group_location">
                        <img src="/static/images/ico_location_16x16.png">
                        <?=lang('Korean.seoul')?>/강남구
                    </div>
                    <div class="schedule_row">
                        <p>20,000<?=lang('Korean.won')?> <span>2023. 01. 24(수) 19:30</span></p>
                    </div>
                </div>
                <div class="ai_group_card">
                    <img src="/static/images/group_main_04.png" />
                    <div class="group_particpnt">
                        <span><?=lang('Korean.application')?> 2</span>/4<?=lang('Korean.people')?>
                    </div>
                    <div class="group_location">
                        <img src="/static/images/ico_location_16x16.png">
                        <?=lang('Korean.seoul')?>/강남구
                    </div>
                    <div class="schedule_row">
                        <p>20,000<?=lang('Korean.won')?> <span>2023. 01. 24(수) 19:30</span></p>
                    </div>
                </div>

            </div>
        </div>
        <div class="group_row">
            <p class="group_week"><?=lang('Korean.holidayTitle')?></p>
            <div class="group_type">
                <h2>
                    <?=lang('Korean.trip')?>
                </h2>
                <div class="main_title_btn">
                    <button class="total"><?=lang('Korean.all')?>보기</button>
                    <button class="disabled">
                        < </button>
                            <button>></button>
                </div>
            </div>
            <div class="login_main_list">
                <div class="ai_group_card">
                    <img src="/static/images/group_main_05.png" />
                    <div class="group_particpnt">
                        <span><?=lang('Korean.application')?> 2</span>/4<?=lang('Korean.people')?>
                    </div>
                    <div class="group_location">
                        <img src="/static/images/ico_location_16x16.png">
                        <?=lang('Korean.seoul')?>/강남구
                    </div>
                    <div class="schedule_row">
                        <p>20,000<?=lang('Korean.won')?> <span>2023. 01. 24(수) 19:30</span></p>
                    </div>
                </div>
                <div class="ai_group_card">
                    <img src="/static/images/group_main_06.png" />
                    <div class="group_particpnt">
                        <span><?=lang('Korean.application')?> 2</span>/4<?=lang('Korean.people')?>
                    </div>
                    <div class="group_location">
                        <img src="/static/images/ico_location_16x16.png">
                        <?=lang('Korean.seoul')?>/강남구
                    </div>
                    <div class="schedule_row">
                        <p>20,000<?=lang('Korean.won')?> <span>2023. 01. 24(수) 19:30</span></p>
                    </div>
                </div>
                <div class="ai_group_card">
                    <img src="/static/images/group_main_07.png" />
                    <div class="group_particpnt">
                        <span><?=lang('Korean.application')?> 2</span>/4<?=lang('Korean.people')?>
                    </div>
                    <div class="group_location">
                        <img src="/static/images/ico_location_16x16.png">
                        <?=lang('Korean.seoul')?>/강남구
                    </div>
                    <div class="schedule_row">
                        <p>20,000<?=lang('Korean.won')?> <span>2023. 01. 24(수) 19:30</span></p>
                    </div>
                </div>
                <div class="ai_group_card">
                    <img src="/static/images/group_main_08.png" />
                    <div class="group_particpnt">
                        <span><?=lang('Korean.application')?> 2</span>/4<?=lang('Korean.people')?>
                    </div>
                    <div class="group_location">
                        <img src="/static/images/ico_location_16x16.png">
                        <?=lang('Korean.seoul')?>/강남구
                    </div>
                    <div class="schedule_row">
                        <p>20,000<?=lang('Korean.won')?> <span>2023. 01. 24(수) 19:30</span></p>
                    </div>
                </div>

            </div>
        </div>
    </div>



    <!-- FOOTER: DEBUG INFO + COPYRIGHTS -->

    <!-- <div style="height: 50px;"></div> -->
    <footer class="footer">
        <div class="footer_logo mb40">
            matchfy
        </div>
        <div class="footer_link mb40">
            <a href="#"><?=lang('Korean.companyName')?></a>
            <a href="/mo/privacy"><?=lang('Korean.pravacyName')?></a>
            <a href="/mo/terms"><?=lang('Korean.serviceName')?></a>
            <a href="#"><?=lang('Korean.supporterName')?></a>
        </div>
        <div class="footer_info mb40">
            <span><?=lang('Korean.footerInfo1')?> <img src="/static/images/part_line.png" /> <?=lang('Korean.footerInfo2')?></span>
            <span><?=lang('Korean.footerInfo3')?> <img src="/static/images/part_line.png" /> <?=lang('Korean.footerInfo4')?><img
                    src="/static/images/part_line.png" /> gildong@naver.com</span>
        </div>
        <div class="footer_copy">
            COPYRIGHT 2023. ALL RIGHTS RESERVED.
        </div>

    </footer>

    <!-- SCRIPTS -->

    <script>

    </script>

    <!-- -->

</body>

</html>