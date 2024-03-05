<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Matchfy 관리자 페이지</title>
    <link rel="stylesheet" href="/static/css/common_admin.css">
    <link rel="stylesheet" href="/static/css/common.css">
    <script>
    <?php
        if(session()->has('msg')) {
            echo "alert('" . session('msg') . "');";
        }
    ?>

    function fn_clickDelete(value) {
        var confirmed = confirm('삭제하시겠습니까?');
        console.log(value);
        if (confirmed) {
            $.ajax({
                type: "post",
                url: "/ad/privacy/privacyDelete",
                data: { id: value },
                success: function(response) {
                    alert('삭제 되었습니다.');
                    location.reload();
                },
                error: function(xhr, status, error) {
                    alert('삭제 중 오류가 발생 하였습니다.');
                    console.log(error);
                }
            });
        }
    }
    
</script>
</head>
<body>
    <div class="ad-box">
        <div>
            <?php
                include 'header.php';
            ?>
        </div>
        <div class="ad-con">
            <h2>개인정보처리방침 목록</h2> 
            <a href="/ad/privacy/privacyEdit">등록</a><br />
            <?php foreach ($privacys as $privacy): ?>
                <p><strong><?= $privacy['id'] ?></strong><?= $privacy['title'] ?></p>
                <p><?=nl2br($privacy['content']); ?></p>
                <a href="/ad/privacy/privacyModify/<?= $privacy['id'] ?>">수정</a>
                <input type="button" value="삭제"  Onclick="fn_clickDelete('<?= $privacy['id']?>')"/>
                <hr>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>