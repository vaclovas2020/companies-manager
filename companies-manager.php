<?php
require_once('function.error_messages.php'); // error mesages print module
require_once('function.validation.php'); // validation module
$data_json = file_get_contents('data.json'); // get data file
$data = json_decode($data_json, true); // convert json string to PHP data array
$id_auto_increment_value = $data['id_auto_increment_value'];
if (!empty($data)){
    echo "----COMPANIES LIST----\n";
    echo "id|name|registration_code|email|phone|comment|\n";
    function printOneColumn($str){ // print one column
        echo $str."|";
    }
    foreach ($data['data'] as $company){ // print each company data
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
            $comment = $argv[5];
            if (!isNumber($company_registration_code)){
                require_field_number_die('company_registration_code');
            }
            if (!filter_var($company_email, FILTER_VALIDATE_EMAIL)){ // email validation
                require_field_email_die('company_email');
            }
            if (!isPhoneNumber($str)){
                require_field_phone_number_die('company_phone');
            }
            // company data validation completed
            $id_auto_increment_value++; // increment company id value
            array_push($data['data'], array(
                'id'=>$id_auto_increment_value,
                'name'=>$company_name,
                'registration_code'=>$company_registration_code,
                'email'=>$company_email,
                'phone'=>$company_phone,
                'comment'=>$comment
            ));
            if (file_put_contents('data.json', json_encode($data)) === false){
                can_not_save_data_file_error();
            }
        }
        else require_more_arguments_error();
        break;

        default: break;
    }
}
else{
    // print help manual text (in the future I will write that)
    echo "\nAVAILABLE COMMANDS\n";
    echo "add [company_name] [company_registration_code] [company_email] [company_phone] [comment]\n\tUse this command if you want add new company\n";
}
?>