var CART = CART || {};

CART.buttons = document.getElementsByClassName('js-cart-button');

[].forEach.call(CART.buttons, button => {
    button.addEventListener('click', e => {
        // prevent navigation event
        // console.log(button);
        e.preventDefault();
        javascript:void(0);
    });
});
