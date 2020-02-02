<?php
declare(strict_types = 1);

// generating a secure token:
// php -r '$token=base64_encode(random_bytes(20));echo "token: ".$token.PHP_EOL."token urlencoded: ".urlencode($token).PHP_EOL."php-ified pre-computed sha1-hash: \"\\x".implode("\\x",str_split(bin2hex(hash("sha1",$token,true)),2))."\"".PHP_EOL;'
// token: 2803vTRrMSTIJya5eEynKoNg/WU=
// token urlencoded: 2803vTRrMSTIJya5eEynKoNg%2FWU%3D
// php-ified pre-computed sha1-hash: "\xe8\xe0\x02\x18\x92\xb4\xbf\x00\xed\x79\x19\x02\x64\xd2\x65\x4a\x23\x37\x58\xfc"
const TOKEN_SHA1 = "\xe8\xe0\x02\x18\x92\xb4\xbf\x00\xed\x79\x19\x02\x64\xd2\x65\x4a\x23\x37\x58\xfc";

header("Content-Type: text/plain;charset=UTF-8");

ob_start();
echo "getallheaders: ";
var_dump(getallheaders());
echo "php://input: ";
var_dump(file_get_contents("php://input"));
echo "_GET: ";
var_dump($_GET);
echo "_POST: ";
var_dump($_POST);
$str = ob_get_clean();
echo $str;
file_put_contents(((string) time()) . ".txt", $str);
