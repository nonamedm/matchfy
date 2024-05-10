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

    CKEDITOR.replace('content');
 
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

});
function fn_clickList(board){
    if(board=='notice'){
        window.location.href = "/ad/notice/noticeList";
    }else if(board=='faq'){
        window.location.href = "/ad/faq/faqList";
    }else if(board=='terms'){
        window.location.href = "/ad/terms/termsList";
    }else if(board=='privacy'){
        window.location.href = "/ad/privacy/privacyList";
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
                }else{
                    window.location.href = '/ad/faq/faqList';
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

function fn_clickUpdate(board,id) {
    if(board=='notice'){
        window.location.href = "/ad/notice/noticeModify/" + id;
    }else if(board=='faq'){
        window.location.href = "/ad/faq/faqModify/" + id;
    }else if(board=='terms'){
        window.location.href = "/ad/terms/termsModify/" + id;
    }else if(board=='privacy'){
        window.location.href = "/ad/privacy/privacyModify/" + id;
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