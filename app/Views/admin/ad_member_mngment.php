<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=3.0">
    <script src="/static/js/jquery.min.js"></script>
    <script src="/static/js/ad_board.js"></script>
    <link rel="stylesheet" href="/static/css/common_admin.css">
    <link rel="stylesheet" href="/static/css/common.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/static/css/datepicker.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <title>Matchfy 관리자페이지</title>
    <style>


    </style>

</head>

<body>
    <div class="ad_box">
        <div>
            <?php
            include 'header.php';
            ?>
        </div>
        <!-- <p>쿼리문: <?php echo $query; ?></p> -->
        <div class="ad_con">
            <h2>회원 관리</h2>
            <table class="admin_top_func">
                <thead>
                    <colgroup>
                        <col style="width:40%" />
                        <col style="width:25%" />
                        <col style="width:25%" />
                        <col style="width:10%" />
                    </colgroup>
                </thead>
                <tbody>
                    <tr class="tr">
                        <td>
                            <div class="admin_top_label">
                                <label>가입일</label>
                            </div>
                            <div>
                                <input type="text" id="datepicker1" /> ~
                                <input type="text" id="datepicker2" />
                            </div>
                        </td>
                        <td>
                            <div class="admin_top_label">
                                <label>타입</label>
                            </div>
                            <div>
                                <select id="userGrade">
                                    <option value="">선택</option>
                                    <option value="grade01">준회원</option>
                                    <option value="grade02">정회원</option>
                                    <option value="grade03">프리미엄</option>
                                </select>
                            </div>
                        </td>
                        <td>
                            <div class="admin_top_label">
                                <label>ID</label>
                            </div>
                            <div>
                                <input id="userId" type="text" placeholder="ID 입력" />
                            </div>
                        </td>
                        <td>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="admin_top_label">
                                <label>이름</label>
                            </div>
                            <div>
                                <input id="userName" type="text" placeholder="이름 입력" />
                            </div>
                        </td>
                        <td>
                            <div class="admin_top_label">
                                <label>휴대폰번호</label>
                            </div>
                            <div>
                                <input id="userPhone" type="text" placeholder="휴대폰 번호 입력" />
                            </div>
                        </td>
                        <td>
                            <div class="admin_top_label">
                                <label>상태</label>
                            </div>
                            <div>
                                <select id="userStatus">
                                    <option value="">전체</option>
                                    <option value="">정상</option>
                                    <option value="">정지</option>
                                </select>
                            </div>
                        </td>
                        <td>
                            <button class="admin_top_submit" onclick="searchSubmit()">조회</button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table>
                <thead>
                    <tr class="tr">
                        <th class="th num">No</th>
                        <th class="th">타입</th>
                        <th class="th">이름</th>
                        <th class="th">닉네임</th>
                        <th class="th">생년월일</th>
                        <th class="th">성별</th>
                        <th class="th">이메일(ID)</th>
                        <th class="th">전화번호</th>
                        <th class="th">등급<br />(임시)</th>
                        <!-- <th class="th">사진</th> -->
                        <th class="th">소셜유형</th>
                        <th class="th">최근접속</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $index = 1;
                    foreach ($datas as $data) : ?>
                        <tr class="tr">
                            <td class="td"><?= $index ?></td>
                            <td class="td">
                                <?php $grade = '준회원';
                                if ($data['grade'] === 'grade02') {
                                    $grade = '정회원';
                                } else if ($data['grade'] === 'grade03') {
                                    $grade = '프리미엄';
                                }
                                ?>
                                <?= $grade  ?></td>
                            <td class="td"><?= $data['name'] ?></td>
                            <td class="td"><?= $data['nickname'] ?></td>
                            <td class="td"><?= $data['birthday'] ?></td>
                            <td class="td"><?php if ($data['gender'] === '0') {
                                                echo '여';
                                            } else {
                                                echo '남';
                                            } ?></td>
                            <td class="td"><?= $data['email'] ?></td>
                            <td class="td"><?= substr($data['mobile_no'], 0, 3) . "-" . substr($data['mobile_no'], 3, 4) . "-" . substr($data['mobile_no'], 7) ?></td>
                            <td class="td"><?= $data['temp_grade'] ?></td>
                            <!-- <td class="td">
                                <span class="attatch_file_div"><a class="attach_file" href="<?= '/' . $data['file_path'] . $data['file_name']; ?>" target="_blank"><?= $data['org_name']; ?></a></span>
                                <button onclick="resetImg('<?= $data['ci'] ?>')">초기화</button>
                            </td> -->
                            <td class="td"><?= $data['sns_type'] ?></td>
                            <td class="td"><?= $data['last_access_dt'] ?></td>
                        </tr>
                    <?php
                        $index++;
                    endforeach; ?>
                </tbody>
            </table>
            <div class="pagination">
                <?= $pager_links ?>
            </div>
        </div>
    </div>
    <script>
        $(function() {
            //input을 datepicker로 선언
            $("#datepicker1").datepicker({
                dateFormat: 'yy-mm-dd' //달력 날짜 형태
                    // ,showOtherMonths: true //빈 공간에 현재월의 앞뒤월의 날짜를 표시
                    ,
                showMonthAfterYear: true // 월- 년 순서가아닌 년도 - 월 순서
                    // ,changeYear: true //option값 년 선택 가능
                    // ,changeMonth: true //option값  월 선택 가능                
                    ,
                showOn: "both" //button:버튼을 표시하고,버튼을 눌러야만 달력 표시 ^ both:버튼을 표시하고,버튼을 누르거나 input을 클릭하면 달력 표시  
                    ,
                buttonImage: "/static/images/calendar_img.png" //버튼 이미지 경로
                    ,
                buttonImageOnly: true //버튼 이미지만 깔끔하게 보이게함
                    ,
                buttonText: "선택" //버튼 호버 텍스트        
                    ,
                monthNamesShort: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'] //달력의 월 부분 텍스트
                    ,
                monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'] //달력의 월 부분 Tooltip
                    ,
                dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'] //달력의 요일 텍스트
                    ,
                dayNames: ['일요일', '월요일', '화요일', '수요일', '목요일', '금요일', '토요일'] //달력의 요일 Tooltip
                    ,
                minDate: "-5Y" //최소 선택일자(-1D:하루전, -1M:한달전, -1Y:일년전)
                    ,
                maxDate: "+5y" //최대 선택일자(+1D:하루후, -1M:한달후, -1Y:일년후)  
                    ,
                zIndex: 9999
            });

            //초기값을 오늘 날짜로 설정
            // $('#datepicker1').datepicker('setDate', 'today'); //(-1D:하루전, -1M:한달전, -1Y:일년전), (+1D:하루후, -1M:한달후, -1Y:일년후)            
            $("#datepicker2").datepicker({
                dateFormat: 'yy-mm-dd' //달력 날짜 형태
                    // ,showOtherMonths: true //빈 공간에 현재월의 앞뒤월의 날짜를 표시
                    ,
                showMonthAfterYear: true // 월- 년 순서가아닌 년도 - 월 순서
                    // ,changeYear: true //option값 년 선택 가능
                    // ,changeMonth: true //option값  월 선택 가능                
                    ,
                showOn: "both" //button:버튼을 표시하고,버튼을 눌러야만 달력 표시 ^ both:버튼을 표시하고,버튼을 누르거나 input을 클릭하면 달력 표시  
                    ,
                buttonImage: "/static/images/calendar_img.png" //버튼 이미지 경로
                    ,
                buttonImageOnly: true //버튼 이미지만 깔끔하게 보이게함
                    ,
                buttonText: "선택" //버튼 호버 텍스트        
                    ,
                monthNamesShort: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'] //달력의 월 부분 텍스트
                    ,
                monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'] //달력의 월 부분 Tooltip
                    ,
                dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'] //달력의 요일 텍스트
                    ,
                dayNames: ['일요일', '월요일', '화요일', '수요일', '목요일', '금요일', '토요일'] //달력의 요일 Tooltip
                    ,
                minDate: "-5Y" //최소 선택일자(-1D:하루전, -1M:한달전, -1Y:일년전)
                    ,
                maxDate: "+5y" //최대 선택일자(+1D:하루후, -1M:한달후, -1Y:일년후)  
                    ,
                zIndex: 9999
            });

            //초기값을 오늘 날짜로 설정
            // $('#datepicker2').datepicker('setDate', '+1D'); //(-1D:하루전, -1M:한달전, -1Y:일년전), (+1D:하루후, -1M:한달후, -1Y:일년후)            
        });
        const searchSubmit = () => {
            const startDate = $("#datepicker1").val();
            const endDate = $("#datepicker2").val();
            const userGrade = $("#userGrade").val();
            const userId = $("#userId").val();
            const userName = $("#userName").val();
            const userPhone = $("#userPhone").val();
            const userStatus = $("#userStatus").val();

            var searchUrl = '/ad/member/memberMngment';
            searchUrl = searchUrl + '?search=true';
            if (startDate !== '') {
                searchUrl = searchUrl + '&startDate=' + startDate;
            }
            if (endDate !== '') {
                searchUrl = searchUrl + '&endDate=' + endDate;
            }
            if (userGrade !== '') {
                searchUrl = searchUrl + '&userGrade=' + userGrade;
            }
            if (userId !== '') {
                searchUrl = searchUrl + '&userId=' + userId;
            }
            if (userName !== '') {
                searchUrl = searchUrl + '&userName=' + userName;
            }
            if (userPhone !== '') {
                searchUrl = searchUrl + '&userPhone=' + userPhone;
            }
            if (userStatus !== '') {
                searchUrl = searchUrl + '&userStatus=' + userStatus;
            }

            moveToUrl(searchUrl);

            // $.ajax({
            //     url: searchUrl,
            //     type: 'GET',
            //     async: false,
            //     success: function(data) {

            //     },
            //     error: function(data, status, err) {
            //         console.log(err);
            //         fn_alert('오류가 발생하였습니다. \n다시 시도해 주세요.');
            //     },
            // });
        }
        const moveToUrl = (url, param) => {
            if (!param) {
                location.href = url;
            } else {
                //json 형태의 param 전송 시
                var form = document.createElement('form');
                form.method = 'POST';
                form.action = url;

                for (var key in param) {
                    if (param.hasOwnProperty(key)) {
                        var input = document.createElement('input');
                        input.type = 'hidden';
                        input.name = key;
                        input.value = param[key];
                        form.appendChild(input);
                    }
                }
                document.body.appendChild(form);

                form.submit();
            }
        };
    </script>
</body>

</html>