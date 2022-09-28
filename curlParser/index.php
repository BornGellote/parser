<?php
 
include_once 'simple_html_dom.php';

function curlGetPage($url, $referer = 'https://google.com/')
{
    // $ch = curl_init('https://www.teacherspayteachers.com/');
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36');
    curl_setopt($ch, CURLOPT_COOKIEFILE, __DIR__.'cookie.txt');
    curl_setopt($ch, CURLOPT_COOKIEJAR, __DIR__.'cookie.txt');
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_REFERER, $referer);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $responce = curl_exec($ch);
    curl_close($ch);

    // echo $responce;
    return $responce;
}

$page = curlGetPage('https://www.teacherspayteachers.com/Product/The-Ultimate-Social-Skills-Character-Education-Bundle-33-Units-850pgs-3698363');
$html = str_get_html($page);

foreach ($html->find('.ProductPageLayout__outerGridContainer') as $post) {
    $imgMain = $post->find('.ProductPreviewSlider__slideImg', 0);
    // $imgBundle = $post->find('.ProductThumbnail-module__img--un_Rh', 0); // Bundle, why is empty 
    echo 'Single $imgMain src = ' . $imgMain->src . '<br>';
    // echo 'Single $imgBundle src = ' . $imgBundle->src . '<br>';
    // var_dump($imgBundle);
}