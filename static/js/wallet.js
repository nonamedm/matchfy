var pointValue="5000";
var totalMyPoint='';
var walletType ='add';

$(document).ready(function() {
    getMyPoint();
    chk_formChargePoint();
    getPointDateSearch();
    $('#alliance_exchange_amount').on('change', function() {
        pointsValueCheck();
    });
    
    $('.point_order').change(function() {
        var value = $(this).val();
        var date="";
        
        if($('.1week').hasClass('on')){
            date = '1week';
        }else if($('.1month').hasClass('on')){
            date = '1month';
        }else{
            date = '3month';
        }

        getPointSearch(value,date,walletType);
    });
}); 

/* 페이지 이동 */
function loc_pointCharge(){
    window.location="/mo/mypage/wallet/charge";
}

function loc_pointExchange(){
    window.location="/mo/alliance/exchange";
}

function loc_WalletLocation(){
    window.location="/mo/mypage/wallet";
}

/* 포인트 충전시 form 체크 */
function chk_formChargePoint(){
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
        totalPrice();
    });

    // 수량 감소 버튼 이벤트 처리
    $('.quantity_minus').click(function() {
        var quantity = parseInt($('#quantity').val());
        if (quantity > 1) {
            quantity--;
            $('#quantity').val(quantity);
            totalPrice();
        }
    });

    $('#quantity').on('change', function() {
        totalPrice();
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

/* 합계금액 */
function totalPrice() {
    var points = parseInt($('.mypage_wallet_select .selected p').data('price'));
    var quantity = parseInt($('#quantity').val());
    var totalPrice = points * quantity;
    $('#total_price').text(totalPrice.toLocaleString());
}

/*충전 체크*/
function chk_pointChargeSubmit(){
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

/* 포인트결재 */
function serverAuth() {
    var quantityNum = $('#quantity').val();
    if (chk_pointChargeSubmit() == true) {
        $('.loading').hide();
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

            },
            fnError: function(result) {
                console.log(result.errorMsg)
            }
        });
    }
}

/*보유포인트 */
function getMyPoint(){
    $.ajax({
        url: '/mo/mypage/getPoint',
        type: 'get',
        success: function(data) {
            if(data!=""){
                var number = parseInt(data);
                var formattedNumber = number.toLocaleString();
                $(".current_points").text(formattedNumber);
                totalMyPoint=Number(formattedNumber.replaceAll(',',''));
            }else{
                $(".current_points").text("0");
            }
        },
        error: function(xhr, status, error) {
            console.log(error);
        }
    });
}

/* week month click color */
function getPointDateSearch(){
    $('.point_date').click(function(){
        $('.point_date').removeClass('on');
        $(this).addClass('on');
    });
}

/* week month 서치 */
function getPointSearch(date){
    $('.loading').show();
    var point_order = $('.point_order').val();
    $.ajax({
        url: '/mo/mypage/selectPoint',
        type: 'post',
        data:{
            value:point_order,
            date:date,
            type:walletType,
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
                if(walletType=='add'){
                    html += '<p>+ '+Number(data[i]['add_point']).toLocaleString()+'</p>';
                }else{
                    html += '<p>- '+Number(data[i]['use_point']).toLocaleString()+'</p>';
                }
                html += '</div>';
                html += '</div>';
                html += '<hr class="hoz_part" />';
            }
            $('#point_content').html(html);
            $('.loading').hide();
        },
        error: function(xhr, status, error) {
            console.log(error);
        }
    });
}

/*포인트사용 */
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

/*계좌번호 11자리 */
function isValidAccountNumber(accountNumber) {
    var regex = /^[0-9]{11}$/;
    return regex.test(accountNumber);
}

/*환전시 예외처리*/
function chk_exchangeCheck(){
    var amount = $('#alliance_exchange_amount').val();
    var bank = $('#alliance_exchange_bank').val();
    var account_number = $('#alliance_exchange_account').val();

    if(!amount){
        alert('환불금액을 입력해주세요.');
        return false;
    }

    if(bank=='0'){
        alert('은행을 선택 해주세요.');
        return false;
    }

    if (!isValidAccountNumber(account_number)) {
        alert('올바른 계좌번호를 입력해주세요.');
        return false;
    }

    if (!$('#agree02').prop('checked')) {
        alert('위 구매조건 확인 및 결제진행에 동의에 체크 하여주세요.');
        return false;
    }

    return true;
}

/*환전 금액 이벤트 */
function pointsValueCheck() {
    var amount = parseInt($('#alliance_exchange_amount').val());

    if (amount < 10000) {
        alert('환전 금액은 10,000원 이상이어야 합니다.');
        $('#alliance_exchange_amount').val('');
        $('#exchange_pay').text('');
    } else if (amount > totalMyPoint) {
        alert('총 보유 포인트보다 크거나 같은 금액을 입력할 수 없습니다.');
        $('#alliance_exchange_amount').val(totalMyPoint);
        $('#exchange_pay').text(totalMyPoint.toLocaleString() +'원');
    } else {
        $('#exchange_pay').text(amount.toLocaleString() +'원');
    }
}

/*환전 submit */
function exchangePointSubmit(){
    $('.loading').show();
    var amount = $('#alliance_exchange_amount').val();
    var bank = $('#alliance_exchange_bank').val();
    var account_number = $('#alliance_exchange_account').val();
    if(chk_exchangeCheck()==true){

        $.ajax({
            url: '/mo/alliance/exchangepointSubmit',
            data:{
                amount:amount,
                bank:bank,
                acount_number:account_number,
            },
            type: 'post',
            success: function(data) {
                $('.loading').hide();
                if(data.success == true){
                    window.location='/mo_mypage_excharge_success';
                }else{
                    window.location='/mo_mypage_excharge_fail';
                }
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    }
}

/*입금,사용 페이지 전환*/
function WalletPage(type){
    $('.loading').show();
    walletType = type;
    $("#wallet_tab ul li").removeClass("on");

    if (type === 'add') {
        $("#wallet_tab ul li:nth-child(1)").addClass("on");
    } else {
        $("#wallet_tab ul li:nth-child(2)").addClass("on");
    }

    $.ajax({
        url: '/mo/mypage/walletTypeList',
        type: 'post',
        data:{
            walletType:type
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
                    html += '<p>+ '+Number(data[i]['add_point']).toLocaleString()+'</p>';
                }else{
                    html += '<p>- '+Number(data[i]['use_point']).toLocaleString()+'</p>';
                }
                html += '</div>';
                html += '</div>';
                html += '<hr class="hoz_part" />';
            }
            $('#point_content').html(html);
            $('.loading').hide();
        },
        error: function(xhr, status, error) {
            console.log(error);
        }
    });

}