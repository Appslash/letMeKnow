<?php
/**
 * Created by PhpStorm.
 * User: AppSlash
 * Date: 04-09-2019
 * Time: 20:01
 */

session_start();
$random_alpha = md5(rand());
$captcha_code = substr($random_alpha, 0, 6);
$_SESSION["captcha_code"] = $captcha_code;
$target_layer = imagecreatetruecolor(70,35);
$captcha_background = imagecolorallocate($target_layer, 100, 0, 163);
imagefill($target_layer,0,0,$captcha_background);
$captcha_text_color = imagecolorallocate($target_layer, 0, 0, 0);
imagestring($target_layer, 5, 5, 10, $captcha_code, $captcha_text_color);
header("Content-type: image/jpeg");
imagejpeg($target_layer);
?>