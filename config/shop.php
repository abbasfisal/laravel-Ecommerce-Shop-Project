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
    'msg'=> [
        'create' => 'successfully created',
        'fail'   => 'UserName | Password is Invalid'
    ]
];
