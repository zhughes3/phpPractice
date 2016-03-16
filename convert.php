<?php
/**
 * Created by PhpStorm.
 * @author Zachary Hughes <zhughes3@gmail.com>
 * Date: 3/16/2016
 * Time: 10:22 AM
 * Description: A program to convert values between Fahrenheit and Celsius temperatures.
 */

include_once 'security.php';
$f = $c = '';

if (isset($_POST['f'])) {
    $f = sanitizeString($_POST['f']);
}

if (isset($_POST['c'])) {
    $c = sanitizeString($_POST['c']);
}

if ($f != '') {
    $c = intval((5/9) * ($f - 32));
    $out = "$f&deg;f equals $c &deg;c";
} elseif ($c != '') {
    $f = intval((9/5) * $c + 32);
    $out = "$c&deg;c equals $f &deg;f";
} else $out = "";

echo <<<_END
  <html>
    <head>
      <title>Temperature Converter</title>
    </head>
    <body>
      <pre>
        Enter either Fahrenheit or Celsius and click on Convert

        <b>$out</b>
        <form method = "post" action = "convert.php">
        Fahrenheit <input type = "text" name = "f" size = "7">
        Celsius <input type = "text" name = "c" size = "7">
        <input type = "submit" value = "Convert">
        </form>
      </pre>
    </body>
  </html>
_END;
