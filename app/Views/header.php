<?php
$session = session();
$get_ci = $session->get('ci');
// $name = $session->get('name');
if ($get_ci) {
?>
<?php
} else {
?>
    <!-- <header class="header"> -->
<?php
} ?>
<script>
    $(document).ready(function() {
        $('.sub_wrap').css('min-height', window.innerHeight - 130);
        $('.sub_wrap').css('height', window.innerHeight - 130);
    });
</script>

<header class="header ci_header">

    <div class="logo_menu">
        <ul>
            <li class="logo" onclick="moveToUrl('/')">
                <img src="/static/images/matchfy.png" />
            </li>
            <!-- <li class="menu-toggle">
                    <button onclick="toggleMenu();">&#9776;</button>
                </li> -->
            <?php
            if ($get_ci) {
            ?>
                <li class="menu_left" style="display: inline-flex">
                    <button class="" onclick="moveToUrl('/mo/menu')">
                        <svg width="22" height="16" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M21.5 8C21.5 8.23206 21.4078 8.45463 21.2437 8.61872C21.0796 8.78281 20.8571 8.875 20.625 8.875H1.375C1.14294 8.875 0.920376 8.78281 0.756282 8.61872C0.592187 8.45463 0.5 8.23206 0.5 8C0.5 7.76794 0.592187 7.54538 0.756282 7.38128C0.920376 7.21719 1.14294 7.125 1.375 7.125H20.625C20.8571 7.125 21.0796 7.21719 21.2437 7.38128C21.4078 7.54538 21.5 7.76794 21.5 8ZM1.375 1.875H20.625C20.8571 1.875 21.0796 1.78281 21.2437 1.61872C21.4078 1.45462 21.5 1.23206 21.5 1C21.5 0.767936 21.4078 0.545376 21.2437 0.381282C21.0796 0.217187 20.8571 0.125 20.625 0.125H1.375C1.14294 0.125 0.920376 0.217187 0.756282 0.381282C0.592187 0.545376 0.5 0.767936 0.5 1C0.5 1.23206 0.592187 1.45462 0.756282 1.61872C0.920376 1.78281 1.14294 1.875 1.375 1.875ZM20.625 14.125H1.375C1.14294 14.125 0.920376 14.2172 0.756282 14.3813C0.592187 14.5454 0.5 14.7679 0.5 15C0.5 15.2321 0.592187 15.4546 0.756282 15.6187C0.920376 15.7828 1.14294 15.875 1.375 15.875H20.625C20.8571 15.875 21.0796 15.7828 21.2437 15.6187C21.4078 15.4546 21.5 15.2321 21.5 15C21.5 14.7679 21.4078 14.5454 21.2437 14.3813C21.0796 14.2172 20.8571 14.125 20.625 14.125Z" fill="#343330" />
                        </svg>
                    </button>
                </li>
            <?php } ?>
            <li class="menu_item" style="display: inline-flex">
                <?php
                if ($get_ci) {
                ?>
                    <!-- <button class="login_btn" onclick="userLogout()">
                            <p>
                                <?= lang('Korean.logout') ?>
                            </p>
                        </button>
                        <button class="login_btn" onclick="moveToUrl('/mo/mypage')">
                            <p>mypage</p>
                        </button> -->
                    <button class="login_btn mypage_icon" onclick="moveToUrl('/mo/mypage')">
                        <svg width="28" height="26" viewBox="0 0 28 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M26.8651 23.5C24.9613 20.2087 22.0276 17.8487 18.6038 16.73C20.2974 15.7218 21.6132 14.1856 22.3491 12.3572C23.0851 10.5289 23.2005 8.50948 22.6777 6.60918C22.1548 4.70887 21.0227 3.03272 19.4551 1.83814C17.8874 0.643552 15.971 -0.00341797 14.0001 -0.00341797C12.0292 -0.00341797 10.1128 0.643552 8.54513 1.83814C6.9775 3.03272 5.84534 4.70887 5.32252 6.60918C4.7997 8.50948 4.91513 10.5289 5.65108 12.3572C6.38703 14.1856 7.7028 15.7218 9.39634 16.73C5.97259 17.8475 3.03884 20.2075 1.13509 23.5C1.06528 23.6138 1.01897 23.7405 0.998905 23.8725C0.978837 24.0045 0.985415 24.1392 1.01825 24.2687C1.05108 24.3981 1.10951 24.5197 1.19008 24.6262C1.27066 24.7326 1.37174 24.8219 1.48738 24.8887C1.60301 24.9555 1.73085 24.9985 1.86335 25.015C1.99586 25.0316 2.13034 25.0215 2.25887 24.9853C2.3874 24.949 2.50737 24.8874 2.6117 24.8041C2.71604 24.7207 2.80262 24.6173 2.86634 24.5C5.22134 20.43 9.38384 18 14.0001 18C18.6163 18 22.7788 20.43 25.1338 24.5C25.1976 24.6173 25.2842 24.7207 25.3885 24.8041C25.4928 24.8874 25.6128 24.949 25.7413 24.9853C25.8698 25.0215 26.0043 25.0316 26.1368 25.015C26.2693 24.9985 26.3972 24.9555 26.5128 24.8887C26.6284 24.8219 26.7295 24.7326 26.8101 24.6262C26.8907 24.5197 26.9491 24.3981 26.9819 24.2687C27.0148 24.1392 27.0213 24.0045 27.0013 23.8725C26.9812 23.7405 26.9349 23.6138 26.8651 23.5ZM7.00009 8.99998C7.00009 7.61551 7.41064 6.26214 8.17981 5.11099C8.94898 3.95985 10.0422 3.06264 11.3213 2.53283C12.6004 2.00301 14.0079 1.86439 15.3657 2.13449C16.7236 2.40458 17.9709 3.07127 18.9498 4.05023C19.9288 5.0292 20.5955 6.27648 20.8656 7.63435C21.1357 8.99222 20.9971 10.3997 20.4673 11.6788C19.9374 12.9578 19.0402 14.0511 17.8891 14.8203C16.7379 15.5894 15.3846 16 14.0001 16C12.1442 15.998 10.3649 15.2599 9.05254 13.9475C7.74022 12.6352 7.00208 10.8559 7.00009 8.99998Z" fill="#343330" />
                        </svg>

                    </button>
                <?php
                } else { ?>
                    <!-- <button class="login_btn" onclick="moveToUrl('/mo')">
                        <img src="/static/images/login_ico.png" />
                        <p><?= lang('Korean.login') ?></p>
                    </button> -->
                <?php
                }
                ?>
            </li>
        </ul>
    </div>
    <div class="menu">
        <ul>
            <li class="left_arrow">
                <?php if (isset($title) && $title == "프로필") { ?>
                    <?php $previousUrl = $_SERVER['HTTP_REFERER'] ?? null; ?>
                    <?php if (substr($previousUrl, -strlen('/mo/mymsg')) === '/mo/mymsg') {
                    ?>
                        <a onclick="<?php echo "moveToUrl('" . $previousUrl . "','post')"; ?>">
                            <img src="/static/images/left_arrow.png" />
                        </a>
                    <?php
                    } else {
                    ?>
                        <a onclick="<?php echo isset($prevUrl) ? "moveToUrl('" . $prevUrl . "')" : "javascript:history.back()"; ?>">
                            <img src="/static/images/left_arrow.png" />
                        </a>
                    <?php
                    } ?>
                <?php } else { ?>
                    <a onclick="<?php echo isset($prevUrl) ? "moveToUrl('" . $prevUrl . "')" : "javascript:history.back()"; ?>">
                        <img src="/static/images/left_arrow.png" />
                    </a>
                <?php } ?>
            </li>
            <li class="header_title">
                <?php echo isset($title) ? $title : 'Matchfy'; ?>
            </li>
        </ul>
        <!-- 공통 메뉴 아이템 -->
        <?php if (isset($title) && $title == "내 모임 관리") : ?>
            <!-- "내 모임" 페이지에 특화된 메뉴 아이템 -->
            <div class="menu_right edit" id="meet_edit_btn" onclick="MeetingEditChk();"><?= lang('Korean.edit') ?></div>
            <div class="menu_right edit meet_menu_right" style="display:none;">
                <span class="meet_menu_header" onclick="MeetCancelChk();"><?= lang('Korean.editclose') ?></span>
                <span class="meet_menu_header" id="meet_delete_btn" onclick="MyGoupDelconfrim();"><?= lang('Korean.delete') ?></span>
            </div>
        <?php endif; ?>
    </div>
</header>