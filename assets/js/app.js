/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */
const imagesContext = require.context('../image', true, /\.(png|jpg|jpeg|gif|ico|svg|webp)$/);
imagesContext.keys().forEach(imagesContext);

// any CSS you import will output into a single css file (app.css in this case)
require('../scss/app.scss');
require('../scss/contact.scss');
require('../scss/synthese.scss');
require('../scss/index.scss');
require('../scss/boutique.scss');
require('../scss/arbre.scss');
require('../scss/ressource.scss');
require('../scss/ccm.scss');
require('../scss/pay.scss');


// Need jQuery? Install it with "yarn add jquery", then uncomment to import it.
// import $ from 'jquery';
const $ = require('jquery');
require('bootstrap');

$(".text-button").hide();
$(".button_nav").mouseover(function () {
    var x = $(this).attr("id");
    $("#text-" + x).show("slow");
}).mouseout(function () {
    var x = $(this).attr("id");
    $("#text-" + x).hide();
});


window.setTimeout(function () {
    $(".alert").fadeTo(500, 0).slideUp(500, function () {
        $(this).remove();
    });
}, 500);
