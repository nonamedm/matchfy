<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="/static/js/jquery.min.js"></script>
    <script src="/static/js/ad_board.js"></script>
    <link rel="stylesheet" href="/static/css/common_admin.css">
    <link rel="stylesheet" href="/static/css/common.css">
    <title>Matchfy 관리자페이지</title>
</head>
<body>
    <div class="ad_box">
        <div>
            <?php
                include 'header.php';
            ?>
        </div>
        <div class="ad_con">
            <h2>이용약관 목록</h2> 
            <input class="edit btn type01" type="button" value="<?=lang('Korean.registration')?>" Onclick="fn_EditClick('terms');"/><br>
            <table>
                <thead>
                    <tr class="tr">
                        <th class="th" style="width:5%;">번호</th>
                        <th class="th text_left" style="width:20%;">제목</th>
                        <th class="th text_left" style="width:65%;">내용</th>
                        <th class="th" style="width:5%;">수정</th>
                        <th class="th" style="width:5%;"><?=lang('Korean.delete')?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($termss as $terms): ?>
                        <tr class="tr">
                            <td class="td"><strong><?= $terms['id']?></strong></td>
                            <td class="td text_left">
                                <a href="/ad/terms/termsView/<?= $terms['id'] ?>">
                                    <strong><?= $terms['title'] ?></strong>
                                </a>
                            </td>
                            <?php
                                $content = $terms['content'];
                                $max_length = 30; 

                                if (mb_strlen($content) > $max_length) {
                                    $content = mb_substr($content, 0, $max_length);
                                    $content = preg_replace('/\s+[^ ]*$/', '', $content);
                                    $content = preg_replace('/\r?\n|\r/', '', $content);
                                    $content .= '...';
                                }
                            ?>
                            <td class="td text_left">
                                <a href="/ad/terms/termsView/<?= $terms['id'] ?>"><?= $content ?></a>
                            </td>
                        
                        
                            <td class="td">
                                <input type="button" class="btn type01" value="수정" Onclick="fn_clickUpdate('terms','<?= $terms['id']?>')"/>
                            </td>
                            <td class="td">
                                <input type="button" class="btn type02" value="<?=lang('Korean.delete')?>"  Onclick="fn_clickDelete('<?= $terms['id']?>','terms')"/>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>