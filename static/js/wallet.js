var pointValue="5000";

$(document).ready(function() {
    getMyPoint();
    chargePoint();
    getPointDateSearch();
    $('.point_order').change(function() {
        var value = $(this).val();
        var type="";
        var date="";
        
        if($('.1week').hasClass('on')){
            date = '1week';
        }else if($('.1month').hasClass('on')){
            date = '1month';
        }else{
            date = '3month';
        }

        if($(this).hasClass('add')){
            type="add";
        }else{
            type="use";
        }

        getPointSearch(value,date,type);
    });
}); 

function chargePoint(){
    $('.mypage_wallet_select > div').click(function() {
        $('.mypage_wallet_select > div').removeClass('charge_select1 charge_select2 selected');

        $(this).addClass('charge_select1');
        $(this).addClass('selected');
        pointValue = $(this).children(0).eq(0).data('points');

        $('.mypage_wallet_select > div').not(this).addClass('charge_select2');
        
        var points = parseInt($(this).find('p').data('price'));
        var quantity = parseInt($('#quantity').val());
        var totalPrice = points * quantity;
        $('#total_price').text(totalPrice.toLocaleString());
    });

    // 수량 증가 버튼 이벤트 처리
    $('.quantity_plus').click(function() {
        var quantity = parseInt($('#quantity').val());
        quantity++;
        $('#quantity').val(quantity);
        updateTotalPrice();
    });

    // 수량 감소 버튼 이벤트 처리
    $('.quantity_minus').click(function() {
        var quantity = parseInt($('#quantity').val());
        if (quantity > 1) {
            quantity--;
            $('#quantity').val(quantity);
            updateTotalPrice();
        }
    });

    $('#quantity').on('change', function() {
        updateTotalPrice();
    });

    $('#paymethod').change(function() {
        var selectedValue = $(this).val();
        var selectedText = $(this).children("option[value='" + selectedValue + "']").text();
        if(selectedValue == "kakaopay"){
            $("#selected_pay_type").text(selectedText);
        }else{
            $("#selected_pay_type").text(selectedText+" 결제");
        }
    });
}

function updateTotalPrice() {
    var points = parseInt($('.mypage_wallet_select .selected p').data('price'));
    var quantity = parseInt($('#quantity').val());
    var totalPrice = points * quantity;
    $('#total_price').text(totalPrice.toLocaleString());
}

function pointCheck(){
    
    var selectedOption = $("#paymethod").val();
    if (selectedOption === '') {
        alert('충전수단을 선택해주세요.');
        return false;
    }
    if (!$('#agree01').prop('checked')) {
        alert('위 구매조건 확인 및 결제진행에 동의에 체크 하여주세요.');
        return false;
    }
    return true;
}

// result={
//         authResultCode: '0000',
//         authResultMsg: '인증 성공',
//         tid: 'UT0000113m01012111051714341073',
//         clientId: 'S2_af4543a0be4d49a98122e01ec2059a56',
//         orderId: 'c74a5960-830b-4cd8-82a9-fa1ce739a18f',
//         amount: '5000',
//         mallReserved: '',
//         authToken: 'NICEUNTTB06096FF8F653AA366E7EEED1101AAAE',
//         signature: '99ea68bf15681741e793ece56ab87891b9bdc94cd54abdcb55b2884f4336155a'
//         };

function serverAuth() {
    var quantityNum = $('#quantity').val();
    if (pointCheck() == true) {

        AUTHNICE.requestPay({
            clientId: 'S2_41a14a007a4a44da9618ae765ad0338c',
            method: $('#paymethod').val(),
            orderId: '30e99557-283c-4b38-b4a5-14389fd84fa5',
            amount: Number($('#total_price').text().replaceAll(',', '')),
            goodsName: '나이스페이-상품',
            returnUrl: '/mo/mypage/mypageAddPoint/'+pointValue+'/'+quantityNum,
            fnSuccess: function(result) {
                // 결제 성공 시 처리
                console.log('결제가 성공적으로 이루어졌습니다.');
                console.log('결제 정보:', result);
                // resultUrl에서 필요한 데이터를 받아와 사용할 수 있습니다.
            },
            fnError: function(result) {
                console.log(result.errorMsg)
            }
        });
    }
}

function getMyPoint(){
    $.ajax({
        url: '/mo/mypage/getPoint',
        type: 'get',
        success: function(data) {
            var number = parseInt(data);
            var formattedNumber = number.toLocaleString();
            $(".current_points").text(formattedNumber);
        },
        error: function(xhr, status, error) {
            console.log(error);
        }
    });
}

function pointCharge(){
    window.location="/mo/mypage/wallet/charge";
}

function WalletLocation(){
    window.location="/mo/mypage/wallet";
}

function getPointDateSearch(){
    $('.point_date').click(function(){
        $('.point_date').removeClass('on'); // 모든 버튼의 'on' 클래스 제거
        $(this).addClass('on'); // 클릭된 버튼에 'on' 클래스 추가
        
        var buttonText = $(this).text();
        console.log("Clicked button text:", buttonText);
        
       
    });
}
function getPointSearch(value,date,type){
    $.ajax({
        url: '/mo/mypage/selectPoint',
        type: 'post',
        data:{
            value:value,
            date:date,
            type:type,
        },
        success: function(data) {
            var data = data.points;
            var html="";
            for(var i=0;i<data.length;i++){
                html += '<div class="mypage_wallet_detail">'
                html += '<div class="date">';
                html += '<p>'+data[i]['create_at'].split(' ')[0]+'</p>';
                html += '</div>';
                html += '<div class="desc">';
                html += '<p>'+data[i]['point_details']+'</p>';
                html += '</div>';
                html += '<div class="price">';
                if(type=='add'){
                    html += '<p>'+Number(data[i]['add_point']).toLocaleString()+'</p>';
                }else{
                    html += '<p>'+Number(data[i]['use_point']).toLocaleString()+'</p>';
                }
                html += '</div>';
                html += '</div>';
                html += '<hr class="hoz_part" />';
            }
            $('#point_content').html(html);
        },
        error: function(xhr, status, error) {
            console.log(error);
        }
    });
}

function usePoint(){
    $.ajax({
        url: '/mo/usePoint',
        data:{point:'2000'},
        type: 'post',
        success: function(data) {
            alert(data.msg);
        },
        error: function(xhr, status, error) {
            alert('zz');
            console.log(error);
        }
    });
}