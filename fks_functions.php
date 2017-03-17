<?php

function rnd_background() {
    /* Vybere nahodny obrazek do hlavicky stranek */
    $i = mt_rand(0, 9);
    echo 'style="background-image:url('.DOKU_TPL.'images/23.jpg)"';
   // echo 'style="background-image:url(\'' . DOKU_TPL . '/images/top-' . $i . '.png\')"';
}
