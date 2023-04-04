$(document).ready(function() {

    var refundItemQty;
    var refundItemCode;
    var refundItemOrderId;
    var refundItemPaymentId;
    var refundItemOrderItemId;
    var refundType;

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
                refundItemQty = $(this).closest("tr").find("#refund-item-qty").val();
                refundItemCode = $(this).closest("tr").find("#refund-item-code").text();
                refundItemOrderId = $(this).closest("tr").find("#refund-item-orderId").text();
                refundItemPaymentId = $(this).closest("tr").find("#refund-item-paymentId").text();
                refundItemOrderItemId = $(this).closest("tr").find("#refund-item-orderItemId").text();
                $('#view-modal-refunded-type').modal('show');
            }
        });
    });



    $('#create-refund').on('submit', function(e) {
        refundType = $('#refundType').val();
        refundType = $('#refundType').val();

        e.preventDefault();

        $.ajax({
            url: '/create-refund',
            type: 'POST',
            processData: false,
            contentType: false,
            data: {
              refundType: refundType,
              refundItemQty: refundItemQty,
              refundItemCode: refundItemCode,
              refundItemOrderId: refundItemOrderId,
              refundItemPaymentId: refundItemPaymentId,
              refundItemOrderItemId: refundItemOrderItemId
            },
            success: function(response) {
              console.log(response);
            }
        });

        
    });
});