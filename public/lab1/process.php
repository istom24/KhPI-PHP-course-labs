<?php
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];

if (trim($first_name) == "" and trim($last_name) == "") { //trim() - видаляє пробіли з початку йкінця
    echo "Fields are empty, enter data";}
elseif (trim($first_name) == "" || trim($last_name) == "") {
    echo "One of the fields is empty, please fill in both ";}
elseif(strlen(trim($first_name)) <= 1 || strlen(trim($last_name)) <= 1){ //strlen() - довжина строки
    echo "The name is very short";}
elseif (preg_match('/[0-9]/', $first_name) || preg_match('/[0-9]/', $last_name)) { // preg_match - передає Тrue, якщо патерн співпадає
    echo "Names should not contain digits";}
else {
    // echo "<h1>Results</h1><p>$first_name $last_name</p><p>$last_name</p>";}
    echo "<h1>Congratulations on your registration, $first_name $last_name </h1>";}

