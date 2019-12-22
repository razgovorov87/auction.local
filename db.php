<?php 

require 'libs/rb-mysql.php';
R::setup('mysql:host=localhost;dbname=auctions',
        'root', '' );

session_start();