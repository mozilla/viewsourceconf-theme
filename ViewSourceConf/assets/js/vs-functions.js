jQuery(document).ready(function($) {
    $('#responsive-menu').sidr({source:'#mobile-navigation',side: 'right'});
    $("#page-header").sticky({topSpacing:0});
    $("#page-header-front-page").sticky({topSpacing:0});
});
