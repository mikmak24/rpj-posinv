$(document).ready(function() {

    var total = 0;
    var itemsOrdered = [];
    var order_no = 'ORD'+ Math.floor(Math.random() * 90000) + 10000;

    var today = new Date();
    var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
    var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
    var dateTime = date+' '+time;
    var orderTotal = 0;


    $('.btn-details').on('click', function(e) {

        var data = $(this).data("item"); // Get the name data attribute\
        var newTable = $("<tr>");
        var row = '<td name="item_code">'
        +data.item_code+'</td><td>'
        +data.item_name+'</td><td name="item_price">'
        +data.item_price+'</td><td><input type="text" value="0" name="item_discount"></td><td name="itemquan"><input type="number" name="item_quantity" value="1"></td><td name="item_total" style="color: red;">'+data.item_price+'</td></tr>';

        newTable.append(row);
        $("#sales-table").append(newTable);

        var myArray = {};
        myArray['item_code'] = data.item_code;
        myArray['item_name'] = data.item_name;
        myArray['item_price'] = data.item_price;
        myArray['item_discount'] = 0;
        myArray['item_quantity'] = 1;
        myArray['item_total'] = data.item_price * 1;

        itemsOrdered.push(myArray);

    });

    $('table').on('change', 'input[name="item_quantity"]', function() {
        var row = $(this).closest('tr');
        var item_code = row.find('td[name="item_code"]').text();

        var price = parseFloat(row.find('td[name="item_price"]').text());
        var quantity = parseInt($(this).val());

        // Calculate the total value and update the 'Item Total' column in the same row
        var total = price * quantity;

        // loop through array and update item_price for item with matching item_code
        for (var i = 0; i < itemsOrdered.length; i++) {
            if (itemsOrdered[i].item_code === item_code) {
                itemsOrdered[i].item_quantity = quantity;
                itemsOrdered[i].item_total = total;
                break; // exit loop once item is found and updated
            }
        }

        row.find('td[name="item_total"]').text(total);

    });

    $('table').on('change', 'input[name="item_discount"]', function() {
        var row = $(this).closest('tr');

        var item_code = row.find('td[name="item_code"]').text();
        var price = parseFloat(row.find('td[name="item_price"]').text());
        var quantity = parseFloat(row.find('input[name="item_quantity"]').val());

        var item_total =  price * quantity;
        var origdiscount = $(this).val();
        var discount = $(this).val();

        //Check if the discount value is an integer followed by a percentage symbol
        if (discount.toString().endsWith('%')) {
            // Extract the numeric value of the percentage and divide by 100
            discount = (parseInt(discount) / 100) * item_total;
            item_total = item_total - discount;
            row.find('td[name="item_total"]').text(item_total);
        } else {
            // The discount value does not contain a percentage symbol, leave it as an integer
            discount = parseInt(discount);
            item_total = item_total - discount;
            row.find('td[name="item_total"]').text(item_total);
        }

         // loop through array and update item_price for item with matching item_code
         for (var i = 0; i < itemsOrdered.length; i++) {
            if (itemsOrdered[i].item_code === item_code) {
                itemsOrdered[i].item_discount = origdiscount;
                itemsOrdered[i].item_total = item_total;
                break; // exit loop once item is found and updated
            }
        }


    });


    $('#proceed').click(function() {
        var row = $(this).closest('tr');

        for (var i = 0; i < itemsOrdered.length; i++) {
            orderTotal += itemsOrdered[i].item_total;
        }
        $('#order_no').val('');
        $('#order_date').val('');
        $('#order_total').val('');

        $('#order_no').val(order_no);
        $('#order_date').val(dateTime);
        $('#order_total').val(orderTotal);
        $("#payment_summary").show();
    });



    $('#order_discount').change(function() {
        var order_total = orderTotal;
        var order_discount = $('#order_discount').val();

         //Check if the discount value is an integer followed by a percentage symbol
         if (order_discount.toString().endsWith('%')) {
            // Extract the numeric value of the percentage and divide by 100
            order_discount = (parseInt(order_discount) / 100) * order_total;
            order_total = order_total - order_discount;
        } else {
            // The discount value does not contain a percentage symbol, leave it as an integer
            order_discount = parseInt(order_discount);
            order_total = order_total - order_discount;
        }

        $('#order_total').val(order_total);
    });

    $('#payment_amount').change(function() {
        var order_total = $('#order_total').val();
        var payment_amount = $('#payment_amount').val();

        var change = payment_amount - order_total;

        if (change < 0) {
            $("#payment_change_error").show();
        }

        $('#payment_change').val(change);

    });

    $('#bill').click(function() {
    
        var paymentData = {
            "payment_change":  $('#payment_change').val(),
            "payment_amount":  $('#payment_amount').val(),
            "payment_amount":  $('#payment_amount').val(),
            "order_no":  $('#order_no').val(),
            "order_date":  $('#order_date').val(),
            "order_total":  $('#order_total').val(),
            "order_discount":  $('#order_discount').val(),
        };

        var data = {
            array1: itemsOrdered,
            array2: paymentData
        };

     
        swal({
            title: `Are you sure want to bill this order?`,
            text: "Please review the added items.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willAdd) => {
              if (willAdd) {

                $.ajax({
                    url: "/create-sales",
                    type: 'POST',
                    dataType: 'json',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: JSON.stringify(data),
                    contentType: 'application/json',
                    success: function(response) {

                    $('html, body').animate({ scrollTop: 0 }, 'slow');

                    setTimeout(function() {
                        location.reload();
                    }, 3000);

                    $("#div-success").show();

                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                      console.log(textStatus + ': ' + errorThrown);
                      console.log('HEYEYEYEYEYEYEYEY')
                    }
                });    
              }
            });
    });


        
});