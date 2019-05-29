<?php
require_once('function.error_messages.php'); // error mesages print module
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
        if ($argc == 7){
            $company_id = $argv[1];
            $company_name = $argv[2];
            $company_registration_code = $argv[3];
            $comapny_email = $argv[4];
            $company_phone = $argv[5];
            $company_comment = $argv[6];
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