<?php
    header("Content-type: text/html; charset=UTF-8");

    $test = $_POST['test'];
    $marks = array("Peter"=>65, "Harry"=>80, "John"=>78, "Clark"=>90);
 
    echo json_encode($marks);
?>