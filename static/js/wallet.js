$(document).ready(function() {
    $('.mypage_wallet_select > div').click(function() {
        $('.mypage_wallet_select > div').removeClass('charge_select1 charge_select2 selected');
        
        // 클릭된 포인트 옵션에
        $(this).addClass('charge_select1');
        $(this).addClass('selected');
        // 클릭되지 않은 포인트 옵션
        $('.mypage_wallet_select > div').not(this).addClass('charge_select2');
        
        var points = parseInt($(this).find('p').data('points'));
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
        if(selectedValue == "1"){
            $("#selected_pay_type").text(selectedText);
        }else{
            $("#selected_pay_type").text(selectedText+" 결제");
        }
    });
}); 

function updateTotalPrice() {
    var points = parseInt($('.mypage_wallet_select .selected p').data('points'));
    var quantity = parseInt($('#quantity').val());
    var totalPrice = points * quantity;
    $('#total_price').text(totalPrice.toLocaleString());
}

function serverAuth() {
    AUTHNICE.requestPay({
        clientId: 'S2_41a14a007a4a44da9618ae765ad0338c',
        method: 'card',
        orderId: '30e99557-283c-4b38-b4a5-14389fd84fa5',
        amount: $('#total_price').val(),
        goodsName: '나이스페이-상품',
        returnUrl: 'http://localhost:8080/mo/mypage/wallet/charge', //API를 호출할 Endpoint 입력
        fnSuccess: function (result) {
            handlePaymentSuccess(result);
        },
        fnError: function (result) {
        alert('개발자확인용 : ' + result.errorMsg + '')
        }
    });
}

function handlePaymentSuccess(result) {
    //테스트용
    var result;
    result={
            authResultCode: '0000',
            authResultMsg: '인증 성공',
            tid: 'UT0000113m01012111051714341073',
            clientId: 'S2_af4543a0be4d49a98122e01ec2059a56',
            orderId: 'c74a5960-830b-4cd8-82a9-fa1ce739a18f',
            amount: '1000',
            mallReserved: '',
            authToken: 'NICEUNTTB06096FF8F653AA366E7EEED1101AAAE',
            signature: '99ea68bf15681741e793ece56ab87891b9bdc94cd54abdcb55b2884f4336155a'
            };
    
    $.ajax({
        url: '/addMoney',
        type: 'POST',
        contentType: 'application/json',
        data: JSON.stringify(result),
        success: function(response) {
            
            alert('결제가 성공적으로 완료되었습니다.');
        },
        error: function(xhr, status, error) {

            alert('결제 처리 중 오류가 발생하였습니다.');
        }
    });
}

//포인트충전 이동
function pointCharge(){
    window.location="/mo/mypage/wallet/charge";
}