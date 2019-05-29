<?php 
function require_more_arguments_error(){
    echo "ERROR: This command require more arguments than was given.";
}
function require_field_number_die($field){
    die("Field '$field' must be number.");
}
function require_field_email_die($field){
    die("Field '$field' must be valid email address.");
}
function require_field_phone_number_die($field){
    die("Field '$field' must be valid phone number: 9 numbers without + or 11 numbers with + and do not use spaces");
}
function can_not_save_data_file_error(){
    die('Can not save data to the data file. Try again later.');
}
?>