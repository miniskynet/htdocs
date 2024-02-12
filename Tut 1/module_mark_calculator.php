<?php

require_once 'ModuleMarkCalculator.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if(isset($_POST['cw1'])){
        $cw1 = $_POST['cw1'];
    } else{
        $cw1 = 0;
    }

    if(isset($_POST['cw2'])){
        $cw2 = $_POST['cw2'];
    } else{
        $cw2 = 0;
    }

    $moduleMark = ModuleMarkCalculator::calculateModuleMark($cw1, $cw2);

    echo "Overall Module Mark: $moduleMark";
}

