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

<body>
    <div class="ad_box">
        <div>
            <?php
            include 'header.php';
            ?>
        </div>
        <div class="ad_con">
            <h2>회사소개 - Media 목록</h2>
            <input class="edit btn type01" type="button" value="<?= lang('Korean.registration') ?>" Onclick="fn_EditClick('news');" /><br>
            <table>
                <thead>
                    <tr class="tr">
                        <th class="th" style="width:5%;">번호</th>
                        <th class="th text_left" style="width:60%;">제목</th>
                        <th class="th" style="width:20%;">바로가기</th>
                        <th class="th" style="width:5%;">수정</th>
                        <th class="th" style="width:5%;"><?= lang('Korean.delete') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($newss as $news) : ?>
                        <tr class="tr">

                            <td class="td"><strong><?= $news['id'] ?></strong></td>
                            <td class="td text_left">
                                <a href="/ad/intro/newsView/<?= $news['id'] ?>">
                                    <?php
                                    if ($news['bigo1']) {
                                        $typename;
                                        $typeclass;
                                        if ($news['bigo1'] == '01') {
                                            $typename = '언론보도';
                                            $typeclass = 'news_type';
                                        } else {
                                            $typename = '보도자료';
                                            $typeclass = 'news_type2';
                                        }
                                        echo "<b class='news_type " . $typeclass . "'>" . $typename . "</b>";
                                    }
                                    ?>
                                    <strong><?= $news['title'] ?></strong>
                                </a>
                            </td>

                            <td class="td link_btn">
                                <?php
                                if ($news['bigo2']) {
                                    echo '<a class ="link_btn" href="' . $news['bigo2'] . '">해당 뉴스 바로가기</a>';
                                }
                                ?>
                            </td>

                            <td class="td">
                                <input type="button" class="btn type01" value="수정" Onclick="fn_clickUpdate('news','<?= $news['id'] ?>')" />
                            </td>
                            <td class="td">
                                <input type="button" class="btn type02" value="<?= lang('Korean.delete') ?>" Onclick="fn_clickDelete('<?= $news['id'] ?>','news')" />
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>