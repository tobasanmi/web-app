<?php

create_wc_order( array(
    'address' => array(
        'first_name' => 'Fresher',
        'last_name'  => 'StAcK OvErFloW',
        'company'    => 'stackoverflow',
        'email'      => 'test1@testoo.com',
        'phone'      => '777-777-777-777',
        'address_1'  => '31 Main Street',
        'address_2'  => '',
        'city'       => 'Chennai',
        'state'      => 'TN',
        'postcode'   => '12345',
        'country'    => 'IN',
    ),
    'user_id'        => '',
    'order_comments' => '',
    'payment_method' => 'bacs',
    'order_status'   => array(
        'status' => 'on-hold',
        'note'   => '',
    ),
    'line_items' => array(
        array(
            'quantity' => 1,
            'args'     => array(
                'product_id'    => 37,
                'variation_id'  => '',
                'variation'     => array(),
            )
        ),
      ),  
        
            'coupon_items' => array(
        array(
            'code'         => 'summer',
        ),
    ),
    'fee_items' => array(
        array(
            'name'      => 'Delivery',
            'total'     => 5,
            'tax_class' => 0, // Not taxable
        ),
    ),
) );
