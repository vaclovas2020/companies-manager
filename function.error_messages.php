<?php 
function require_more_arguments_error(){
    echo "ERROR: This command require more arguments than was given.\n";
}
function require_field_number_die($field){
    die("Field '$field' must be number.\n");
}
function require_field_email_die($field){
    die("Field '$field' must be valid email address.\n");
}
function require_field_phone_number_die($field){
    die("Field '$field' must be valid phone number: 9 numbers without + or 11 numbers with + and do not use spaces\n");
}
function can_not_save_data_file_error(){
    die("Can not save data to the data file. Try again later.\n");
}
function no_company_exist_error(){
    die("Company with this company_id does not exit. Please check company_id\n");
}
?>