// JavaScript Document
/***********NAV***********/

/***********FIN NAV*******/
/***********CONTAINER***********/

/***********FIN CONTAINER*******/
/***********FOOTER***********/

/***********FIN FOOTER*******/
/**************BACK*******************/
// Material Select Initialization
$(document).ready(function() {
$('.mdb-select').materialSelect();
});
/**************FIN BACK*******************/
/***********NAV ADMIN***********/
// SideNav Button Initialization
(function runJS() {// SideNav Button Initialization
    $(".button-collapse").sideNav();
    // SideNav Scrollbar Initialization
    var sideNavScrollbar = document.querySelector('.custom-scrollbar');
    Ps.initialize(sideNavScrollbar);
})();
/***********FIN NAV ADMIN***********/