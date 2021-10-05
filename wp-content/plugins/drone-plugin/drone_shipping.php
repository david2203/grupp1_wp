<?php
/* Plugin Name: Drone Shipping
Author: David, Sandra, Shawn, Rasmus
Description: Shipping method: Drönare
Version: 0.0.1 */

add_action('woocommerce_shipping_init', 'drone_shipping_init');

function drone_shipping_init()
{
    if (!class_exists("WC_DRONE_SHIPPING")) {
        class WC_DRONE_SHIPPING extends WC_Shipping_Method
        {
            public function __construct()
            {
                $this->id = 'drone_shipping';
                $this->method_title = __('Drone Shipping');
                $this->method_description = __('Description of Drone shipping');

                $this->enabled = "yes";
                $this->title = 'Drone Shipping';

                $this->init();
            }
            public function init()
            {
                $this->init_form_fields();
                $this->init_settings();

                add_action("woocommerce_update_options_shipping_" . $this->id, array($this,  'process_admin_options'));
            }
            public function calculate_shipping( $package = array() ) {
                    
                $weight = 0;
                $cost = 0;
                $country = $package["destination"]["country"];
             
                foreach ( $package['contents'] as $item_id => $values ) 
                { 
                    $_product = $values['data']; 
                    $weight = $weight + $_product->get_weight() * $values['quantity']; 
                }
             
                $weight = wc_get_weight( $weight, 'kg' );
             
                if( $weight <= 10 ) {
             
                    $cost = 10;
             
                } elseif( $weight <= 30 ) {
             
                    $cost = 50;
             
                } elseif( $weight <= 50 ) {
             
                    $cost = 100;
             
                } else {
             
                    $cost = 200;
             
                }
             // Vi använde oss av dessa country codes som exempel för distance rate shipping. Eftersom google api för distance rate kostar. 
                $countryZones = array(
                    'HR' => 0,
                    'US' => 3,
                    'GB' => 2,
                    'CA' => 3,
                    'ES' => 2,
                    'DE' => 1,
                    'IT' => 1,
                    'SE' => 0,
                    );
             
                $zonePrices = array(
                    0 => 10,
                    1 => 30,
                    2 => 50,
                    3 => 70
                    );
             
                $zoneFromCountry = $countryZones[ $country ];
                $priceFromZone = $zonePrices[ $zoneFromCountry ];
             
                $cost += $priceFromZone;
             
                $rate = array(
                    'id' => $this->id,
                    'label' => $this->title,
                    'cost' => $cost
                );
             
                $this->add_rate( $rate );
                
            }
            function init_form_fields()
            {

                $this->form_fields = array(

                    'enabled' => array(
                        'title' => __('Enable', 'my'),
                        'type' => 'checkbox',
                        'description' => __('Enable this shipping.', 'my'),
                        'default' => 'yes'
                    ),

                    'title' => array(
                        'title' => __('Title', 'my'),
                        'type' => 'text',
                        'description' => __('Title to be display on site', 'my'),
                        'default' => __('My Shipping', 'my')
                    ),
                    // 'weight' => array(
                    //     'title' => __('Weight (kg)', 'my'),
                    //     'type' => 'number',
                    //     'description' => __('Maximum allowed weight', 'my'),
                    //     'default' => 100
                    // ),
                    'price' => array(
                        'title' => __( 'Pris', 'my' ),
                          'type' => 'number',
                          'description' => __( 'Default Price (This will alter, depending on the distance to the customer and the weight of the product)', 'my' ),
                          'default' => __( 100, 'my' )
                          ),
                );
            }
            
        }
    }
}

add_filter('woocommerce_shipping_methods', 'add_drone_method');


function add_drone_method($methods)
{
    $methods['drone_shipping'] = 'WC_DRONE_SHIPPING';
    return $methods;
}


