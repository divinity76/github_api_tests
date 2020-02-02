<?php
declare(strict_types = 1);

// generating a secure token:
// php -r '$token=base64_encode(random_bytes(20));echo "token: ".$token.PHP_EOL."php-ified pre-computed sha1-hash: \"\\x".implode("\\x",str_split(bin2hex(hash("sha1",$token,true)),2))."\"".PHP_EOL;'
// token: TmzmMMQJPIyguIR4vypjfflBe8o=
// php-ified pre-computed sha1-hash: "\x31\x34\xf6\x29\xdc\x41\xfb\x00\x7c\x79\xc7\xf2\x37\xb9\x8a\x79\x37\x98\x21\x33"
const TOKEN_SHA1 = "\x31\x34\xf6\x29\xdc\x41\xfb\x00\x7c\x79\xc7\xf2\x37\xb9\x8a\x79\x37\x98\x21\x33";

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
