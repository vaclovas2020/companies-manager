<?php
require_once('function.error_messages.php'); // error mesages print module
require_once('function.validation.php'); // validation module
require_once('function.is_company_exist.php'); // check if company exist in data array and return index
require_once('function.is_email_exist.php'); // check if email exist in data array and return index
require_once('function.add_new_company.php');

$data_json = file_get_contents('data.json'); // get data file
$data = json_decode($data_json, true); // convert json string to PHP data array
if ($argc > 1){
    $command = $argv[1];
    switch($command){
        case 'add': // add new company command
        if ($argc == 8){
            $company_id = $argv[2];
            $company_name = $argv[3];
            $company_registration_code = $argv[4];
            $company_email = $argv[5];
            $company_phone = $argv[6];
            $comment = $argv[7];
            add_new_company(array(
                'id'=>$company_id,
                'name'=>$company_name,
                'registration_code'=>$company_registration_code,
                'email'=>$company_email,
                'phone'=>$company_phone,
                'comment'=>$comment
            ));
            if (file_put_contents('data.json', json_encode($data)) === false){
                can_not_save_data_file_error();
            }
            else{
                echo 'New company was added!';
            }
        }
        else require_more_arguments_error();
        break;

        case 'edit': // edit company command
        if ($argc == 8){
            $company_id = $argv[2];
            if (!isNumber($company_id)){
                require_field_number_die('company_id');
            }
            $company_id = intval($company_id); // conver to int
            $index = is_company_exist($company_id, $data);
            if ($index !== false){ // check if company exist
                $company_name = $argv[3];
                $company_registration_code = $argv[4];
                $company_email = $argv[5];
                $company_phone = $argv[6];
                $comment = $argv[7];
                if (!isNumber($company_registration_code)){
                    require_field_number_die('company_registration_code');
                }
                if (!filter_var($company_email, FILTER_VALIDATE_EMAIL)){ // email validation
                    require_field_email_die('company_email');
                }
                if (is_email_exist($email, $data) !== false){
                    email_already_exist_error();
                }
                if (!isPhoneNumber($company_phone)){
                    require_field_phone_number_die('company_phone');
                }
                // company data validation completed
                $data[$index]['name'] = $company_name;
                $data[$index]['registration_code'] = $company_registration_code;
                $data[$index]['email'] = $company_email;
                $data[$index]['phone'] = $company_phone;
                $data[$index]['comment'] = $comment;

                if (file_put_contents('data.json', json_encode($data)) === false){
                    can_not_save_data_file_error();
                }
                else{
                    echo 'Company data was updated!';
                }
            }
            else no_company_exist_error();
        }
        else require_more_arguments_error();
        break;

        case 'remove': // remove company command
        if ($argc == 3){
            $company_id = $argv[2];
            if (!isNumber($company_id)){
                require_field_number_die('company_id');
            }
            $company_id = intval($company_id); // conver to int
            $index = is_company_exist($company_id, $data);
            if ($index !== false){ // check if company exist
                array_slice($data, $index, 1);
                if (file_put_contents('data.json', json_encode($data)) === false){
                    can_not_save_data_file_error();
                }
                else{
                    echo 'Company was removed from list!';
                }
            }
            else no_company_exist_error();
        }
        else require_more_arguments_error();
        break;

        default: break;
    }
}
else{
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
    echo "\n\nAVAILABLE COMMANDS\n\n";
    echo "add [company_id] [company_name] [company_registration_code] [company_email] [company_phone] [comment]\n\tUse this command if you want add new company\n";
    echo "edit [company_id] [company_name] [company_registration_code] [company_email] [company_phone] [comment]\n\tUse this command if you want edit already exist company\n";
    echo "remove [company_id]\n\tUse this command if you want delete company\n";
    echo "\n";
}
?>