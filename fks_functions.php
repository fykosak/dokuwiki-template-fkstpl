<?php

function rnd_background() {
    /* Vybere nahodny obrazek do hlavicky stranek */
    $i = mt_rand(0, 9);
    echo 'style="background-image:url('.DOKU_TPL.'images/23.jpg)"';
   // echo 'style="background-image:url(\'' . DOKU_TPL . '/images/top-' . $i . '.png\')"';
}

function get_default_lang() {
    static $map = array(
        'org' => 'en',
        'cz' => 'cs',
    );
    preg_match('/\.([a-z]+)$/i', $_SERVER['HTTP_HOST'], $matches);
    return isset($map[$matches[1]]) ? $map[$matches[1]] : 'cs';
}