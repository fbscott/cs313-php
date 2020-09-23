// global namespace: Team Teach Activity (TTA)
var TTA = TTA || {};

// DOM elements
TTA.clickMeButton    = document.getElementById('js-click-me-button');
TTA.formOne          = document.colorOne;
TTA.formTwo          = document.colorTwo;
TTA.formThree        = document.colorThree;
TTA.bgColorOne       = TTA.formOne.bg1;
TTA.bgColorTwo       = TTA.formTwo.bg2;
TTA.bgColorThree     = TTA.formThree.bg3;
TTA.colorButtonOne   = document.getElementById('js-set-color-one');
TTA.colorButtonTwo   = document.getElementById('js-set-color-two');
TTA.colorButtonThree = document.getElementById('js-set-color-three');
TTA.divOne           = document.getElementById('js-div-01');
TTA.divTwo           = document.getElementById('js-div-02');
TTA.divThree         = document.getElementById('js-div-03');

// event listeners
TTA.clickMeButton.addEventListener('click', e => {
    // keep page from refreshing
    e.preventDefault();
    TTA.alertOnClick('Clicked!');
});

TTA.colorButtonOne.addEventListener('click', e => {
    // keep page from refreshing
    e.preventDefault();
    TTA.changeColor(TTA.divOne, TTA.bgColorOne);
});

// stretch 01
$(TTA.colorButtonTwo).on('click', e => {
    // keep page from refreshing
    e.preventDefault();
    $(TTA.divTwo).css('background-color', '#' + TTA.getColor(TTA.bgColorTwo));
});

// stretch 02
$(TTA.colorButtonThree).on('click', e => {
    // keep page from refreshing
    e.preventDefault();
    $(TTA.divThree).animate({
        backgroundColor: '#' + TTA.getColor(TTA.bgColorThree)
    }, 'slow');
});

/******************************************************************************
 * ALERT ON CLICK
 * Alert the user when button is clicked.
 * @param  {String} message - verbiage to pass to alert()
 *****************************************************************************/
TTA.alertOnClick = message => {
    // call alert message
    alert(message);
};

/******************************************************************************
 * GET COLOR
 * @param  {String} input - user-defined hex value
 * @return {String} hex   - color value
 *****************************************************************************/
TTA.getColor = input => input.value;

/******************************************************************************
 * STYLE ELEMENT
 * @param  {DOM}    el    - div to color
 * @param  {String} color - hex color value
 *****************************************************************************/
TTA.styleEl = (el, color) => {
    el.style.backgroundColor = '#' + color;
};

/******************************************************************************
 * CHANGE DIV BACKGROUND COLOR
 * Receives an event, DOM element, and user-defined hex color value (minus the
 * '#'). Calls TTA.styleEl() to apply the appropriate background CSS.
 * @param  {DOM}    el    - DOM element to be styled
 * @param  {String} input - user-defined hex value
 *****************************************************************************/
TTA.changeColor = (el, input) => {
    let _color = TTA.getColor(input);

    TTA.styleEl(el, _color);
};
