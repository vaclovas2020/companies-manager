<?php
require_once('function.error_messages.php'); // error mesages print module
require_once('function.validation.php'); // validation module
$data_json = file_get_contents('data.json'); // get data file
$data = json_decode($data_json, true); // convert json string to PHP data array
if (!empty($data)){
    echo "----COMPANIES LIST----\n";
    echo "id|name|registration_code|email|phone|comment|\n";
    function printOneColumn($str){ // print one column
        echo $str."|";
    }
    foreach ($data as $company){ // print each company data
        printOneColumn($company['id']);
        printOneColumn($company['name']);
        printOneColumn($company['registration_code']);
        printOneColumn($company['email']);
        printOneColumn($company['phone']);
        printOneColumn($company['comment']);
        echo "\n"; // add new line
    }
}
else{
    echo "Companies list is empty.";
}
if ($argc > 1){
    $command = $argv[1];
    switch($command){
        case 'add': // add new company command
        if ($argc == 6){
            $company_name = $argv[1];
            $company_registration_code = $argv[2];
            $company_email = $argv[3];
            $company_phone = $argv[4];
            $company_comment = $argv[5];
            if (!isNumber($company_registration_code)){
                require_field_number_die('company_registration_code');
            }
            if (!filter_var($company_email, FILTER_VALIDATE_EMAIL)){ // email validation
                require_field_email_die('company_email');
            }
            if (!isPhoneNumber($str)){
                require_field_phone_number_die('company_phone');
            }
        }
        else require_more_arguments_error();
        break;

        default: break;
    }
}
else{
    // print help manual text (in the future I will write that)
}
?>