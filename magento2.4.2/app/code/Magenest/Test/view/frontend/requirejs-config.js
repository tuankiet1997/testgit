var config = {
    config: {
        mixins: {
            'Magento_Checkout/js/action/place-order': {
                'Magenest_Test/js/order/place-order-mixin': true
            },
            'Magento_Checkout/js/action/set-payment-information': {
                'Magenest_Test/js/order/set-payment-information-mixin': true
            },
            'Magento_Checkout/js/action/set-shipping-information': {
                'Magenest_Test/js/order/set-shipping-information-mixin': true
            }
        }
    },
};
