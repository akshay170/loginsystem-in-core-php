<?php 

function dd($values){
    echo "<pre>";
    var_dump($values);
    echo "<pre>";

    die();
}

// dd($_SERVER);
// echo $_SERVER["REQUEST_URI"];
?>