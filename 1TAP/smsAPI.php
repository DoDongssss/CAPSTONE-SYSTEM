<?php
    require_once 'vendor/autoload.php';

    $MessageBird = new \MessageBird\Client('hrnxSLwU4gXFfx0j5e4npnUBN');
    $Message = new \MessageBird\Objects\Message();
    $Message->originator = '+9098314181';
    $Message->recipients = array(+9098314181);
    $Message->body = 'This is a test message';

    $response = $MessageBird->messages->create($Message);
?>