function setDetails(count) {
    var item_code = $("#tags" + count).val();
    var dataString = "item_code=" + item_code;
    $.ajax({
        type: 'POST',
        url: 'itemmaster/getitemajax.php',
        data: dataString
    }).done(function(data) {
        var jsonobj = JSON.parse(data);
//        var desc = jsonobj.item_desc_purch === "" ? jsonobj.item_desc_purch : jsonobj.item_desc_sales;
//        $("#desc" + count).text(desc);
        $("#unit" + count).text(jsonobj.unit);
        $("#price" + count).text(jsonobj.purchase_rate);
    }).fail(function() {
    });
}
function clearValue(count) {
//    $("#desc" + count).text("");
    $("#unit" + count).text("");
    $("#price" + count).text("");
    $("#tags" + count).val("");
    $("#total" + count).text("");
    finalTotal();
}

function calculateAmount(count) {
    var price = $("#price" + count).text();
    var amount = $("#amount" + count).val();
    if (price !== "" && amount !== "") {
        var total = parseFloat(price) * parseFloat(amount);
        $("#total" + count).text((Math.round(total * 100) / 100));
        finalTotal();
    }
}

function finalTotal() {
    var finaltotal = 0;
    for (var index = 1; index <= 30; index++) {
        var price = $("#price" + index).text();
        var amount = $("#amount" + index).val();
        if (price !== "" && amount !== "") {
            var t = parseFloat(price) * parseFloat(amount);
            finaltotal = parseFloat(finaltotal) + parseFloat(t);
            finaltotal = (Math.round(finaltotal * 100) / 100);
        }
    }
    $("#finaltotal").val(finaltotal);
    discount();
}

function discount() {
    var amount = $("#discount").val();
    var finaltotal = $("#finaltotal").val();
    if (amount !== "") {
        var discount = parseFloat(finaltotal) - parseFloat(amount);
        discount = (Math.round(discount * 100) / 100);
        $("#nettotal").val(discount);
    } else {
        $("#nettotal").val($("#finaltotal").val());
    }
}

function searchSupplier() {
    var companyname = $("#companyname").val();
    if (companyname !== "") {
        var dataString = "companyname=" + companyname;
        $.ajax({
            type: 'POST',
            url: 'suppliermaster/searchsupplier_ajax.php',
            data: dataString
        }).done(function(data) {
            var jsonobj = JSON.parse(data);
            $("#suppid").val(jsonobj.supp_id);
            if (jsonobj.length === 0) {
                $("#error").text("Supplier not available!!!");
            }else{
                $("#error").text("");
            }
        }).fail(function() {
        });
    }
}