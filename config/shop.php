<?php
return [
    /*
     |------------------------------
     | for pagination
     |------------------------------
     |
     |
     |
     */
    'perPage'           => 10,

    /*
     |------------------------------
     | OTP config
     |------------------------------
     */
    'otp_sec'           => 120, // every otp is valid unitil specified second
    'otp_wait'          => 'Wait until 120 seconds',
    'otp_succ'          => 'YOUR OTP CODE IS :',


    /*
     |------------------------------
     | Upload Image Path
     |------------------------------
     |
     |
     |
     */
    'brandImagePath'    => 'images\\brands\\',
    'discountImagePath' => 'images\\discounts\\',//path for saving discount image ,
    'productCoverPath'  => 'images\\products_cover\\',//path for saving product main image which will be shown in the fornt end
    'productGalleris'   => 'images\\product_galleries\\',//path to save product gallery image

    /*
     |------------------------------
     | CRUD Message
     |------------------------------
     |
     |
     |
     */
    'msg'               => [
        'create' => 'successfully created',

        'delete'      => 'successfully Delete',
        'delete_fail' => 'Fail While Deleting',

        'fail' => 'UserName | Password is Invalid',

        'add_wishlist'       => 'product successfully added to your wishlist ',
        'was_exist_wishlist' => 'product was exist in your wishlist',

        'add_basket' => 'Product Successfully Added To Your Basket',

        'increase_count'      => 'Product Successfully Increased +1',
        'increase_count_fail' => 'Increase Was Fail / try Againg',

        'dec_count_succ' => 'Product Successfully Decreased -1',
        'dec_count_fail' => 'Product Failed Decreased -1',

        'coupon_expired' => 'The Coupon Code Is Not Valid!'

    ]
];
