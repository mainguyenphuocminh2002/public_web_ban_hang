$(document).ready(function () {
    $('#AddToCart').click(function (param) {
        var productid = $('#product_id').data('productid');
        var numberproduct = $('#numberProduct').val();
        var linkUrl = $(this).data('url');
        $.ajax({
            type: "POST",
            url: linkUrl,
            data: {
                product_id: productid,
                number: numberproduct
            },
            success: function (res) {
                $('#BoxCart').html(res);
                let number = $('#quantity').text();
                number = number.split('X')
                number = parseInt(number[1]);
                $('.icon-header-noti').attr('data-notify',number)
            }
        });
    })
    $('#DeleteCart').click(function (param) {
        var linkUrl = $(this).data('deleteurlcart');
        var btnKeyDelete = $(this).data('cartid');
        $.ajax({
            url: linkUrl,
            data: { id: btnKeyDelete },
            type: "POST"
        }).done(function (res) {
            $('#BoxCart').html(res);
        })
        var cartKey = '';
        $('.cartItem').each(function (item, key) {
            CartKey = key.dataset.cartid;
            if (CartKey === btnKeyDelete) {
                key.remove();
            }
        })
    })

   

    $('#numberChange').change(function(event){
        var numberkey = event.target.value;
        var productid = $('#product_id').data('productid');
        var keyDelete = $(this).data('deleteid');
        console.log(numberkey);
        if(numberkey > 0 ){
            $.ajax({
                type: "POST",
                url: "http://localhost:8080/Cart/api/UpdateSoLuongSanPham",
                data: {
                    product_id: productid,
                    number: numberkey
                },
                success: function (response) {
                    var price = [];
                   $('.price').each(function(key,item){
                       var detailPrice = item.innerText.split(",");
                       detailPrice = parseInt(detailPrice.join(''));
                       price.push(detailPrice);
                    })
                    $('.total').each(function(key,item){
                        var total = price[key] * numberkey;
                        total = new Intl.NumberFormat().format(total)
                        total = total.toString();
                        item.innerText = total + "VND";
                    });
                }
            });

        }else{
            $('.table_row').each(function(key,item){
                if(keyDelete == item.dataset.deleteid){
                    item.remove();
                    $.ajax({
                        type: "POST",
                        url: "http://localhost:8080/Cart/api/UpdateSoLuongSanPham",
                        data: {
                            product_id: productid,
                            number: numberkey
                        },
                    }).done(function(res){

                    })
                }
            })
        }
    })
    $(function () {
        $("#TinhThanhHtml").change(function (e) {
            var MaTinh = $(this).val();
            var urlDanhSachQuanHuyenTheoTinh = "http://localhost:8080/api/GetQuanHuyenTag/" + MaTinh;
            $.ajax(
                    {
                        url: urlDanhSachQuanHuyenTheoTinh
                        ,data:{maTinh:MaTinh},
                        type:"POST"
                    }
            ).done(function (res) {
                $("#QuanHuyenHtml").html(res);
            });

        });
    });
    
})
// var deleteNum = document.getElementById('DeleteNum')
// deleteNum.addEventListener("click",function(){
//     var check = document.getElementById('numberChange').value();
//     alert(check);   
// })
// $('#DeleteNum').click(function(){
//     console.log($('#numberChange')); 
// })