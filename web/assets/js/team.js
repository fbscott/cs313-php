// global namespace: Team Teach Activity (TTA)
var TTA = TTA || {};

// DOM elements
TTA.divOne        = document.getElementById('js-div-01');
// TTA.divTwo        = document.getElementById('js-div-02');
// TTA.divThree      = document.getElementById('js-div-03');
TTA.clickMeButton = document.getElementById('js-click-me-button');
TTA.colorButton   = document.getElementById('js-set-color');
TTA.form          = document.colors;
TTA.bgColor       = TTA.form.bg;

// event listeners
TTA.clickMeButton.addEventListener('click', e => {
    TTA.alertOnClick(e);
});

TTA.colorButton.addEventListener('click', e => {
    TTA.changeColor(e);
});

/******************************************************************************
 * ALERT ON CLICK
 * Alert the user when button is clicked.
 * @param  {Event} e button click
 *****************************************************************************/
TTA.alertOnClick = e => {
    // keep page from refreshing
    e.preventDefault();
    // call alert message
    alert('Clicked!');
};

/******************************************************************************
 * GET COLOR
 * @return {String} hex color value
 *****************************************************************************/
TTA.getColor = () => TTA.bgColor.value;

/******************************************************************************
 * SET COLOR
 * @param  {String} color hex color value
 *****************************************************************************/
TTA.styleDiv = (color) => {
    TTA.divOne.style.backgroundColor = '#' + color;
};

TTA.changeColor = e => {
    // keep page from refreshing
    e.preventDefault();
    let _color = TTA.getColor();

    TTA.styleDiv(_color);
};
