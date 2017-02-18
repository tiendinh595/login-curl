<?php

$URL = 'https://www.wattpad.com/login?nextUrl=https://www.wattpad.com/home';

$cookie_path = dirname(__FILE__).'/cookie.txt';

/**
 * Hace login en la web enviando un POST con el usuario y contraseña.
 */
function login($user, $pass) {
    global $cookie_path, $URL;
    $ch = curl_init($URL);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, 'username='.$user.'&password='.$pass);
    curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_path);
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_path);
    $ret = curl_exec($ch);
    curl_close($ch);

    return $ret;
}

/**
 * Recupera una página html.
 */
function get($url) {
    global $cookie_path;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
    curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_path);
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_path);
    $html = curl_exec($ch);
    curl_close($ch);

    return $html;
}

$dataLogin = login('xx', 'xx');
//echo $dataLogin;

echo get('https://www.wattpad.com/user/xx');