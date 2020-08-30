$(document).ready(function(){
    $(".add-row").click(function(){

        $(".order-table-body").append('<tr>\n' +
            '                    <td><input class="form-control order-input" list="items" placeholder="اسم الصنف" name="name[]"></td>\n' +
            '                    <td><input class="form-control order-input" type="text" name="description[]"></td>\n' +
            '                    <td>\n' +
            '                        <select class="form-control order-input" name="unit[]">\n' +
            '                             <option value="piece">قطعة</option>\n' +
            '                            <option value="box">علبة</option>\n'
            +'                            <option value="carton">كرتون</option>\n' +
            '                        </select></td></td>\n' +
            '                    <td><input class="form-control order-input" type="text" placeholder="000" name="quantity[]"></td>\n' +
            '                </tr>');
        $(".remove-row").removeClass("d-none");

    });
    $(".remove-row").click(function(){
        var rowCount = $('.order-table-body tr').length;
        if (rowCount>1){
            $(".order-table-body tr:last").remove();
        }
        else{
            $(".remove-row").addClass("d-none");
        }



    });

});

$(document).ready(function () {

    $('#dtHorizontalVerticalExample').DataTable({
        "scrollX": true,
        "scrollY": 200,
    });
    $('.dataTables_length').addClass('bs-select');


    $('#share-orders').on('click', function() {

        var click_text = $(this).find('span').eq(0).text();
        $('#autocomplete').val($.trim(click_text));
        $('#result').html("");
        $("#first-offer").html('');
        var img=$(this).find('img').attr('src');
        var name=$(this).find('span').eq(0).text();
        var price=$(this).find('span').eq(1).text();
        var instructions=$(this).find('span').eq(2).text();
        var productId=$(this).find('span').eq(3).text();

        $('#first-offer').append('<section class="offer_one item col-md-3 text-center  m-1 " >\n' +
            '            <img src="'+img+'" name="image">\n' +
            '            <img src="selected.png" class="selected">\n' +
            '            <h3 name="details">'+name+'</h3>\n' +
            '            <span class="price" name="price">\n' +
            '               '+price+'\n' +
            '             </span>\n' +
            '            <span class="vase" name="vase">'+instructions+'</span>\n' +
            '            <button class="add-to-cart" data-productId="'+productId+'" >Add To  Cart</button>\n' +
            '        </section>');

    });
});




