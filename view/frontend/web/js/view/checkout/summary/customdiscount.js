define(
    [
        'jquery',
        'Vexpro_Marketplace/js/view/summary/abstract-total'
    ],
    function ($,Component) {
        "use strict";
        return Component.extend({
            defaults: {
                template: 'Mageplaza_HelloWorld/checkout/summary/customdiscount'
            },
            isDisplayedCustomdiscount : function(){
                return true;
            },
            getCustomDiscount : function(){
                return '$10';
            }
        });
    }
 );