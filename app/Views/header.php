<header>
    <div class="menu">
        <ul>
            <li class="left_arrow">
                <a href="javascript:history.back()">
                    <img src="/static/images/left_arrow.png" />
                </a>
            </li>
            <li class="header_title">
                <?php echo isset($title) ? $title : 'MatchFI'; ?>
            </li>
        </ul>
        <!-- 공통 메뉴 아이템 -->
        <?php if (isset($title) && $title == "내 모임 관리") : ?>
            <!-- "내 모임" 페이지에 특화된 메뉴 아이템 -->
            <div class="menu_right edit" id="meet_edit_btn" onclick="MeetingEditChk();">편집</div>
            <div class="menu_right edit meet_menu_right" style="display:none;">
                <span class="meet_menu_header" onclick="MeetCancelChk();"> 편집종료</span>
                <span class="meet_menu_header" id="meet_delete_btn" onclick="MyGoupDelconfrim();">삭제</span>
            </div>
        <?php endif; ?>
    </div>
</header>