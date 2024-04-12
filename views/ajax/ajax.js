function addToCart(button) {
    let input = $(button).closest('.quantity').find('input');

    let id = input.data('ids');
    let quantity = input.val();
    $.ajax({
        url: '../../views/ajax/add_to_cart.php',
        type: 'POST',
        dataTypes: 'json',
        data: {id: id, quantity: quantity},
        success: function(response) {
            alert('added successfully');
        },
    });
}






