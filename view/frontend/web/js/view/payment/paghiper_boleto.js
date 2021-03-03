define(
  [
    'uiComponent',
    'Magento_Checkout/js/model/payment/renderer-list'
  ],
  function (
    Component,
    rendererList
  ) {
    'use strict';
    rendererList.push(
      {
        type: 'paghiper_boleto',
        component: 'Tezus_PagHiper/js/view/payment/method_renderer/boleto_method'
      },
      // other payment method renderers if required
    );
    /** Add view logic here if needed */
    return Component.extend({});
  }
);