$(document).ready(function(){
    $('.exchangebtn').click(function() {
        var value = $(this).text();
        var exchange_level = $(this).data('exchange-level');
        var idx =$(this).data('idx');

        exchangeSubmit(exchange_level,idx);
    });
    
    $('.alliancebtn').click(function() {
        var value = $(this).text();
        var level = $(this).data('alliance-level');
        var idx =$(this).data('idx');

        allianceSubmit(level,idx);
    });

    $('.member_approve_btn').click(function() {
        var value = $(this).text();
        var level = $(this).data('approve-level');
        var id =$(this).data('id');

        memberCertificateApprove(level,id);
    });

    $('.member_payment_btn').click(function() {
        var tempGrade = $(this).data('approve-level');
        var idx =$(this).data('idx');

        memberPaymentApprove(tempGrade,idx);
    });

    CKEDITOR.replace('content');
});

function formSubmitChk(){
    $('form').submit(function(){
        var title = $('#title').val();
        var content = CKEDITOR.instances.content.getData().trim();

        if(title.trim() == '') {
            alert('제목을 입력해주세요.');
            return false;
        }

        if(content == '') {
            alert('내용을 입력해주세요.');
            return false; 
        }
    });
}

function fn_clickList(board){
    if(board=='notice'){
        window.location.href = "/ad/notice/noticeList";
    }else if(board=='faq'){
        window.location.href = "/ad/faq/faqList";
    }else if(board=='terms'){
        window.location.href = "/ad/terms/termsList";
    }else if(board=='privacy'){
        window.location.href = "/ad/privacy/privacyList";
    }else if(board=='report'){
        window.location.href = "/ad/report/reportList";
    }else if(board=='news'){
        window.location.href = "/ad/intro/newsList";
    }else if(board=='spnotice'){
        window.location.href = "/ad/support/noticeList";
    }
}

function fn_clickDelete(id,boardName) {
    var confirmed = confirm('삭제하시겠습니까?');
    
    if (confirmed) {
        $.ajax({
            type: "post",
            url: "/ad/BoardDelete",
            data: { id: id,
                    boardName:boardName
                },
            success: function(response) {
                alert('삭제 되었습니다.');
                if(boardName=='faq'){
                    window.location.href = '/ad/faq/faqList';
                }else if(boardName=='terms'){
                    window.location.href = '/ad/terms/termsList';
                }else if(boardName=='privacy'){
                    window.location.href = '/ad/privacy/privacyList';
                }else if(boardName=='report') {
                    window.location.href = '/ad/report/reportList';
                }else if(boardName=='spfaq'){
                    window.location.href = '/ad/support/faqList';
                }else {
                    window.location.href = '/ad/intro/newsList';
                }
                
            },
            error: function(xhr, status, error) {
                alert('삭제 중 오류가 발생 하였습니다.');
                console.log(error);
            }
        });
    }
}

function fn_clickFileDelete(fileId) {
    var confirmed = confirm('삭제하시겠습니까?');
    if (confirmed) {
        $.ajax({
            type: "post",
            url: "/ad/FileDelete",
            data: { fileId: fileId },
            success: function(response) {
                alert('삭제 되었습니다.');
                $('.file_org_name').hide();
                
            },
            error: function(xhr, status, error) {
                alert('삭제 중 오류가 발생 하였습니다.');
                console.log(error);
            }
        });
    }
}

function fn_clickBoFileDelete(BoardId,fileId) {
    var confirmed = confirm('삭제하시겠습니까?');
    console.log(BoardId,fileId);
    if (confirmed) {
        $.ajax({
            type: "post",
            url: "/ad/notice/noticeDelete",
            data: { BoardId: BoardId,
                fileId:fileId},
            success: function(response) {
                alert('삭제 되었습니다.');
                window.location.href = '/ad/notice/noticeList';
            },
            error: function(xhr, status, error) {
                alert('삭제 중 오류가 발생 하였습니다.');
                console.log(error);
            }
        });
    }
}

function fn_clickReportDelete(reportId) {
    var confirmed = confirm('삭제하시겠습니까?');
    console.log(reportId);
    if (confirmed) {
        $.ajax({
            type: "post",
            url: "/ad/report/reportDelete",
            data: { 
                reportId: reportId
            },
            success: function(response) {
                alert('삭제 되었습니다.');
                window.location.href = '/ad/report/reportList';
            },
            error: function(xhr, status, error) {
                alert('삭제 중 오류가 발생 하였습니다.');
                console.log(error);
            }
        });
    }
}

function fn_clickUpdate(board,id) {
    if(board=='notice'){
        window.location.href = "/ad/notice/noticeModify/" + id;
    }else if(board=='faq'){
        window.location.href = "/ad/faq/faqModify/" + id;
    }else if(board=='terms'){
        window.location.href = "/ad/terms/termsModify/" + id;
    }else if(board=='privacy'){
        window.location.href = "/ad/privacy/privacyModify/" + id;
    }else if(board=='news'){
        window.location.href = "/ad/intro/newsModify/" + id;
    }else if(board=='spnotice'){
        window.location.href = "/ad/support/noticeModify/" + id;
    }else if(board=='spfaq'){
        window.location.href = "/ad/support/faqModify/" + id;
    }
}

function fn_EditClick(board) {
    if(board=='notice'){
        window.location.href = "/ad/notice/noticeEdit";
    }else if(board=='faq'){
        window.location.href = "/ad/faq/faqEdit";
    }else if(board=='terms'){
        window.location.href = "/ad/terms/termsEdit";
    }else if(board=='privacy'){
        window.location.href = "/ad/privacy/privacyEdit";
    }else if(board=='news'){
        window.location.href = "/ad/intro/newsEdit";
    }else if(board=='spnotice'){
        window.location.href = "/ad/support/noticeEdit";
    }else if(board=='spfaq'){
        window.location.href = "/ad/support/faqEdit";
    }
}

function exchangeSubmit(exchange_level,idx){
    
    $.ajax({
        url: '/ad/exchangeCheck',
        data:{
            exchange_level:exchange_level,
            idx:idx,
        },
        type: 'post',
        success: function(data) {
            alert(data.msg);
            location.reload();
        },
        error: function(xhr, status, error) {
            console.log(error);
        }
    });
}

function allianceSubmit(level,idx){
    
    $.ajax({
        url: '/ad/allianceCheck',
        data:{
            level:level,
            idx:idx,
        },
        type: 'post',
        success: function(data) {
            alert(data.msg);
            location.reload();
        },
        error: function(xhr, status, error) {
            console.log(error);
        }
    });
}

function memberCertificateApprove(level,id){
    console.log(level);
    console.log(id);
    $.ajax({
        url: '/ad/memberCertificateCheck',
        data:{
            level:level,
            id:id,
        },
        type: 'post',
        success: function(data) {
            alert(data.msg);
            location.reload();
        },
        error: function(xhr, status, error) {
            console.log(error);
        }
    });
}

function memberPaymentApprove(tempGrade,idx){
    $.ajax({
        url: '/ad/memberPaymentCheck',
        data:{
            tempGrade:tempGrade,
            idx:idx,
        },
        type: 'post',
        success: function(data) {
            alert(data.msg);
            location.reload();
        },
        error: function(xhr, status, error) {
            console.log(error);
        }
    });
}

function mediaRadio(){
    $('input[name="bigo1"]').change(function() {
        var selectedValue = $(this).val();
        if (selectedValue === "01") {
            $('#media_link').show();
            $('#media_content').hide();
        } else if (selectedValue === "02") {
            $('#media_link').hide();
            $('#media_content').show();
        }
    });
}

function introChk(){
    $('form').submit(function(){
        var title = $('#title').val();
        var content = CKEDITOR.instances.content.getData().trim();
        var radiochk = $('input[name="bigo1"]:checked').val();
        var link = $('#link').val();

        if(title.trim() == '') {
            alert('제목을 입력해주세요.');
            return false;
        }
        if(radiochk == '01'){ //언론보도
            if(link == '') {
                alert('링크 주소를 입력해주세요.');
                return false; 
            }else{
                CKEDITOR.instances.content.setData('');
            }
        }else{ //보도자료
            if(content == '') {
                alert('내용을 입력해주세요.');
                return false; 
            }else{
                $('#link').val('');
            }
        }
    });
}
