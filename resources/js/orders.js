$(document).ready(function() {

    $('.view-order-details').on('click', function () {
        var orderItems = $(this).data('item');
        $('#myModal').modal('show');
        var table = $('#orderItemsTable');

        // Clear the contents of the table
        $('#orderItemsTable tbody').empty();

        //loop through the array and append each item to the table
        $.each(orderItems, function(index, item) {
            console.log(item)

          // create a new row
            var row = $('<tr>');

            // add the name column
            row.append( $('<td>').text(item['id']));
            row.append( $('<td>').text(item['item_code']));
            row.append( $('<td>').text(item['item_name']));
            row.append( $('<td>').text(item['item_price']));
            row.append( $('<td>').text(item['item_discount']));
            row.append( $('<td>').text(item['item_quantity']));
            row.append( $('<td>').text(item['total']));

            // Create a new cell element for the button

            // Create a new button element
            var button = $('<button class="primary">');
            // Set the text of the button
            button.text('Click me');
            // Set the data attribute of the button
            button.data('id', item.id);

            // Append the button to the last cell of the row
            row.find('td:last-child').append(button);

        
            // add the row to the table
            table.append(row);
        });


    });

    $("table").on("click", "#btn-refund", function(){
        var rowData = $(this).closest("tr").find("td:first").text();

        // Show the other and another buttons for the clicked row
        $(this).closest("tr").find("#refund-item-qty").prop("readonly", false);
        $(this).closest("tr").siblings().find("#refund-item-qty").prop("readonly", true);


        $(this).closest("tr").find("#btn-refund-proceed, #btn-refund-close").show();
        // Add your code to handle the button click here
        $(this).closest("tr").siblings().find("#btn-refund-proceed, #btn-refund-close").hide();

    });

    $("table").on("click", "#btn-refund-close", function(){
        var rowData = $(this).closest("tr").find("td:first").text();

        // Show the other and another buttons for the clicked row
        $(this).closest("tr").find("#refund-item-qty").prop("readonly", true);


        $(this).closest("tr").find("#btn-refund-proceed, #btn-refund-close").hide();
        // Add your code to handle the button click here
    });


    $("table").on("click", "#btn-refund-proceed", function(){
        var rowData = $(this).closest("tr").find("td:first").text();

        swal({
            title: `Are you sure want to refund/return this Item?`,
            text: "Please review the selected items.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willRefund) => {
              if (willRefund) {

                var refundItemQty = $(this).closest("tr").find("#refund-item-qty").val();
                var refundItemCode = $(this).closest("tr").find("#refund-item-code").text();
                var refundItemOrderId = $(this).closest("tr").find("#refund-item-orderId").text();

                alert("Refund item quantity: " + refundItemOrderId);

              

              
              }
        });

    });


   

    // $('#btn-refund').on('click', function () {

    //     swal({
    //         title: `Are you sure want to refund/return this Item?`,
    //         text: "Please review the selected items.",
    //         icon: "warning",
    //         buttons: true,
    //         dangerMode: true,
    //         })
    //         .then((willRefund) => {
    //           if (willRefund) {

    //             $("#refund-item-qty").prop("readonly", false);
    //             $("#refund-item-qty").focus(); // optionally, focus the input element

    //             $("#btn-refund").hide();
    //             $("#btn-refund-proceed").show();
    //             $("#btn-refund-close").show();
   
    //           }
    //         });
    // });

    // $('#btn-refund-close').on('click', function () {

    //     $("#btn-refund").prop("disabled", false); // disable the button
    //     $("#refund-item-qty").prop("readonly", true);

    //     $("#btn-refund").show();
    //     $("#btn-refund-proceed").hide();
    //     $("#btn-refund-close").hide();

    // });

    





    
});