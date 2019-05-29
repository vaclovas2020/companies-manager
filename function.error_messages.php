<?php 
function require_more_arguments_error(){
    echo "ERROR: ERROR: This command require more arguments than was given.\n";
}
function require_field_number_die($field){
    echo "ERROR: Field '$field' must be number.\n";
}
function require_field_email_die($field){
    echo "ERROR: Field '$field' must be valid email address.\n";
}
function require_field_phone_number_die($field){
    echo "ERROR: Field '$field' must be valid phone number: 9 numbers without + or 11 numbers with + and do not use spaces\n";
}
function can_not_save_data_file_error(){
    echo "ERROR: Can not save data to the data file. Try again later.\n";
}
function no_company_exist_error(){
    echo "ERROR: Company with this company_id does not exit. Please check company_id\n";
}
function company_exist_error(){
    echo "ERROR: Company with this company_id already exist. Try to edit with edit command.\n";
}
function email_already_exist_error(){
    echo "ERROR: Email address already exist in list. Please use unique email address.\n";
}
?>