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
<header class="header spci_header support">

    <div class="logo_menu">
        <ul style="display: flex;">
            <?php
            if ($get_ci) {
            ?>
                <li class="menu_left" style="width: 5%;height: auto;display: inline-flex;">
                    <button class="" onclick="moveToUrl('/support/menu')">
                        <svg width="22" height="16" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M21.5 8C21.5 8.23206 21.4078 8.45463 21.2437 8.61872C21.0796 8.78281 20.8571 8.875 20.625 8.875H1.375C1.14294 8.875 0.920376 8.78281 0.756282 8.61872C0.592187 8.45463 0.5 8.23206 0.5 8C0.5 7.76794 0.592187 7.54538 0.756282 7.38128C0.920376 7.21719 1.14294 7.125 1.375 7.125H20.625C20.8571 7.125 21.0796 7.21719 21.2437 7.38128C21.4078 7.54538 21.5 7.76794 21.5 8ZM1.375 1.875H20.625C20.8571 1.875 21.0796 1.78281 21.2437 1.61872C21.4078 1.45462 21.5 1.23206 21.5 1C21.5 0.767936 21.4078 0.545376 21.2437 0.381282C21.0796 0.217187 20.8571 0.125 20.625 0.125H1.375C1.14294 0.125 0.920376 0.217187 0.756282 0.381282C0.592187 0.545376 0.5 0.767936 0.5 1C0.5 1.23206 0.592187 1.45462 0.756282 1.61872C0.920376 1.78281 1.14294 1.875 1.375 1.875ZM20.625 14.125H1.375C1.14294 14.125 0.920376 14.2172 0.756282 14.3813C0.592187 14.5454 0.5 14.7679 0.5 15C0.5 15.2321 0.592187 15.4546 0.756282 15.6187C0.920376 15.7828 1.14294 15.875 1.375 15.875H20.625C20.8571 15.875 21.0796 15.7828 21.2437 15.6187C21.4078 15.4546 21.5 15.2321 21.5 15C21.5 14.7679 21.4078 14.5454 21.2437 14.3813C21.0796 14.2172 20.8571 14.125 20.625 14.125Z" fill="#343330" />
                        </svg>
                    </button>
                </li>
            <?php } ?>
            <li class="logo" onclick="moveToUrl('/support')" style="width:90%;height: 44px;line-height: 44px;">
                <img src="/static/images/matchfy.png" />
            </li>
            <li style="width:5%;">
                
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