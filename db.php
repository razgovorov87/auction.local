<?php 

require 'libs/rb.php';
R::setup( 'mysql:host=localhost;dbname=auction',
        'root', '' );

session_start();