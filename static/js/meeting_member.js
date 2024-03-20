function meetingMemberList(idx){
    $.ajax({
        url: '/mo/mypage/group/partcntPopup',
        data:{
            meetingIdx:idx,
        },
        type: 'post',
        success: function(data) {
            var html='';
            if(data.success == true){
                var data = data.data;
                    html += '<div id= "meetingMemPopup" class="layerPopup alert middle">';
                    html += '<div class="layerPopup_wrap">';
                    html += '<div class="layerPopup_content medium">';
                    html += '<p class="txt">참석 멤버</p>';
                    html += '<div class="">';
                    for(var i=0; i<data.length;i++){
                        
                        html += '<div class="chat_member">';
                        html += '<div class="chat_member_profile">';
                        if(data[i].file_path){
                            html += '<img class="profile_img" src="'+data[i].file_path+data[i].file_name+'" />';
                        }else{
                            html += '<img class="profile_img" src="/static/images/mypage_no_pfofile.png" />';
                        }
                        html += '<p>'+data[i].name+'</p>';
                        if(data[i].meeting_master =='K'){
                            html += '<img class="group_master" src="/static/images/group_master.png" />';
                        }
                        html += '</div>';
                        html += '<div class="group_member_detail">';
                        html += data[0].birthday.slice(2,4) + ' · ' + data[i].city + ' · ' + data[i].mbti;
                        html += '</div>';
                        html += '</div>';
                    }

                    html += '</div>';
                    html += '<div class="layerPopup_bottom">';
                    html += '<div class="btn_group">';
                    html += '<button class="btn type01" onclick="meetingPopupClose();">확인</button>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';

                    // 동적으로 생성된 HTML을 페이지에 추가
                    $('body').append(html);
            }else{
                alert('실패');
            }
        },
        error: function(xhr, status, error) {
            console.log(error);
        }
    });
}
function meetingPopupClose(){
    $('#meetingMemPopup').hide();
}