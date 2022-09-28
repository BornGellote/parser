<?php

function parse($url, $start, $end)
{
    $startTag = strpos($url, $start);
    if( $startTag === false) return 0;
    $startTag2 = substr($url, $startTag);

    return strip_tags(substr($startTag2, 0, strpos($startTag2, $end)));
}

$siteUrl = file_get_contents('https://www.teacherspayteachers.com/Product/The-Ultimate-Social-Skills-Character-Education-Bundle-33-Units-850pgs-3698363');

echo parse($siteUrl, '<title data-react-helmet="true">', '</title>');
// echo parse($siteUrl, '<h1 class="ProductPageSummary__header">', '</h1>');

echo $siteUrl;


