<?php
/**
 * Created by PhpStorm.
 * User: syacko
 * Date: 2/11/16
 * Time: 4:36 PM
 */
$data = $_SERVER['QUERY_STRING'];
var_dump($data);

var_dump($_POST);

echo '<p>Hi ' . htmlspecialchars($_POST["name"]) . ', I am some random ' . rand() .' output from the server.</p>';
?>