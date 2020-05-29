<script src="js/minicart.js"></script>
<script>
paypal.minicart.render();

paypal.minicart.cart.on('checkout', function(evt) {
    var items = this.items(),
        len = items.length,
        total = 0,
        i;

    // Cuenta la cantidad de objetos en el carrito
    for (i = 0; i < len; i++) {
        total += items[i].get('quantity');
    }

    if (total < 3) {
        alert(
            ' La cantidad mínima del pedido es de 4. Por favor añada más al carrito antes de proceder a la compra.');
        evt.preventDefault();
    }
});
</script>