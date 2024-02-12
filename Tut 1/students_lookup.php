<?php
require_once 'StudentsLookup.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $mark = isset($_POST['mark']) ? $_POST['mark'] : 0;

    $studentsAboveMark = StudentsLookup::getStudentsAboveMark($mark);

    echo "<h2>Students with marks $mark and above:</h2>";
    echo "<ul>";
    foreach ($studentsAboveMark as $studentInfo){
        echo "<li>$studentInfo</li>";
    }
    echo "</ul>";
}
