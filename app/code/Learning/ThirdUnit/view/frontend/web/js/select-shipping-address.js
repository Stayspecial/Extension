define([
   'jquery',
   'Magento_Checkout/js/model/quote',
   'Magento_Checkout/js/checkout-data',
   'Magento_Customer/js/customer-data',
   'mage/translate'
       
], 
function ($,quote,$t,customerData) {
'use strict';
return function (shippingAddress) {
var customData = window.checkoutConfig.myCustomData;
var keyword=customData.toString();
var trackname=keyword.split(",");
for(var i = 0; i < trackname.length; i++) {
if(trackname[i]==shippingAddress.region){
$(".messages").append( '<div role="alert" class="message notice" id="err_msg"><span data-bind="text: errorValidationMessage()" >You cannot ship to this state.Try again.</span></div>');
$("#shipping-method-buttons-container :submit").attr("disabled", true);
}
else {
 $("#err_msg").remove();
$("#shipping-method-buttons-container :submit").attr("disabled", false);
}
}
//console.log(shippingAddress);
quote.shippingAddress(shippingAddress);
    };
});
