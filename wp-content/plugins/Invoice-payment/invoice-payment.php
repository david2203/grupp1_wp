<?php
/* Plugin Name: Invoice Payment
Author: David, Sandra, Shawn, Rasmus
Description: Payment Method: faktura (invoice)
Version: 0.0.1 */

//  
add_action('plugins_loaded','invoice_payment_init',11);

function invoice_payment_init() {
    if ( class_exists("WC_Payment_Gateway") ) {
        class WC_Invoice_Pay_Gateway extends WC_Payment_Gateway {
            public function __construct() {
                $this->id ="invoice_payment";
                // $this->icon=apply_filters("woocommerce_invoice_icon", plugins_url . '/assets/icon.png');
                $this->has_fields = false;
                $this->method_title= __("Invoice Payment", 'in_pay_woo');
                $this->method_description= __("Invoice Payment description", 'in_pay_woo');
                $this->init_form_fields();
                $this->init_settings();

            }
            public function init_form_fields(){
                $this->form_fields = apply_filters(
                    "woo_invoice_pay_fields", array(
                        'enabled' => array(
                            'title' => __('Enable/Disable','invoice_pay_woo'),
                            'type'=>'checkbox',
                            'label' => __('Enable Invoice','invoice_pay_woo'),
                            'default' => 'no'
                        ),
                        'title' => array(
                            'title' => __('Invoice Payment Gateway','invoice_pay_woo'),
                            'type'=>'text',
                            'default' => __('Invoice Payment Gateway','invoice_pay_woo'),
                            'description' => __('Add a new title for the Invoice Gateway that customers will see when they are on the checkout page','invoice_pay_woo'),
                            'default' => __('Invoice Payment Gateway','invoice_pay_woo'),
                            'desc_tip' =>true
                        ),
                        'description' => array(
                            'title' => __('Invoice Payment Gateway Description','invoice_pay_woo'),
                            'type'=>'textarea',
                            // 'default' => __('Invoice Payment Gateway','invoice_pay_woo'),
                            'description' => __('Add a new title for the Invoice Gateway that customers will see when they are on the checkout page','invoice_pay_woo'),
                            'desc_tip' =>true
                        ),
                    )
                    );
            }
            public function process_payments($order_id){
                $order = wc_get_order($order_id);

                $order->update_status('on-hold', __('Awaiting Invoice Payment','invoice_pay_woo' ));

                $order->reduce_order_stock();

                WC()->cart->empty_cart();
                return array(
                    'result' => 'success',
                    'redirict' => $this->get_return_url($order)
                );
            }
        }
    }
}

add_filter("woocommerce_payment_gateways", 'add_to_invoice_payment_gateway');

function add_to_invoice_payment_gateway($gateways) {
    $gateways[] = 'WC_Invoice_pay_Gateway';
    return $gateways;
}