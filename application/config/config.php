<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$config = array(
    'timezone' => 'Asia/Bangkok'
);

date_default_timezone_set($config['timezone']);

$datetime = date('Y-m-d H:i:s');
$date = date('Y-m-d');
$dateu = date('U');
$year = date('Y');
$ip = $_SERVER['REMOTE_ADDR'];
$app_title = 'DOE Account';

$config_department_id = '35220';

$month_sh_th = array(0 => '', 1 =>  'ม.ค.', 2 =>  'ก.พ.', 3 => 'มี.ค.', 4 =>  'เม.ย.', 5 =>  'พ.ค.', 6 =>  'มิ.ย.', 7 =>  'ก.ค.', 8 =>  'ส.ค.', 9 =>  'ก.ย.', 10 =>  'ต.ค.', 11 =>  'พ.ย.', 12 => 'ธ.ค.');


function generateRandomString($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
