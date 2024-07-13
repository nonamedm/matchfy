<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=3.0">
    <script src="/static/js/jquery.min.js"></script>
    <script src="/static/js/ad_board.js"></script>
    <link rel="stylesheet" href="/static/css/common_admin.css">
    <link rel="stylesheet" href="/static/css/common.css">
    <title>Matchfy 관리자페이지</title>
</head>
<script>
    <?php
    if (session()->has('msg')) {
        echo "alert('" . session('msg') . "');";
    }
    ?>
</script>

<body>
    <div class="ad_box">
        <div>
            <?php
            include 'header.php';
            ?>
        </div>
        <div class="ad_con">
            <h2>서포터즈 공지사항 목록</h2>
            <input class="btn type01 edit" type="button" value="<?= lang('Korean.registration') ?>" Onclick="fn_EditClick('spnotice');" />
            <table>
                <thead>
                    <tr class="tr">
                        <th class="th" style="width:5%;">번호</th>
                        <th class="th text_left" style="width:20%;">제목</th>
                        <th class="th text_left" style="width:50%;">내용</th>
                        <th class="th" style="width:15%;">파일</th>
                        <th class="th" style="width:5%;">수정</th>
                        <th class="th" style="width:5%;"><?= lang('Korean.delete') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($datas as $data) : ?>
                        <tr class="tr">
                            <td class="td"><strong><?= $data['notice_id'] ?></strong></td>
                            <td class="td text_left">
                                <a href="/ad/support/noticeView/<?= $data['notice_id'] ?>">
                                    <strong><?= $data['title'] ?></strong>
                                </a>
                            </td>
                            <?php
                            $content = $data['content'];
                            $max_length = 30;

                            if (mb_strlen($content) > $max_length) {
                                $content = mb_substr($content, 0, $max_length);
                                $content = preg_replace('/\s+[^ ]*$/', '', $content);
                                $content = preg_replace('/\r?\n|\r/', '', $content);
                                $content .= '...';
                            }
                            ?>
                            <td class="td text_left">
                                <a href="/ad/support/noticeView/<?= $data['notice_id'] ?>"><?= $content ?></a>
                            </td>
                            <td class="td">
                                <?php if ($data['file_id']) : ?>
                                    <span class="attatch_file_div"><a class="attatch_file" href="/downloadFile/<?= $data['file_id'] ?>"><?= $data['org_name'] ?></a></span>
                                <?php endif ?>
                            </td>
                            <td class="td">
                                <input type="button" class="btn type01" value="수정" Onclick="fn_clickUpdate('spnotice','<?= $data['notice_id'] ?>')" />
                            </td>
                            <td class="td">
                                <input type="button" class="btn type02" value="<?= lang('Korean.delete') ?>" Onclick="fn_clickBoFileDelete('<?= $data['notice_id'] ?>','<?= $data['file_id'] ?>')" />
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>