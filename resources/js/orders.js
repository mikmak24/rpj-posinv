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





    
});