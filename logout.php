<?php
session_start();
if (isset($_SESSION['username'])) {
    session_destroy();
    header("Location: index.php");
    $fp = "onlinemember.txt";
    $fo = fopen($fp, 'r');
    $fr = fread($fo, filesize($fp));
    $fr--;
    $fc = fclose($fo);
    $fo = fopen($fp, 'w');
    $fw = fwrite($fo, $fr);
    $fc = fclose($fo);
}
else{
    header("Location: index.php");
}
