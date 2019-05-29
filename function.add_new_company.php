<?php
function add_new_company($company){
    global $data;
    $company_id = $company['id'];
    if (!isNumber($company_id)){
        require_field_number_die('company_id');
        return;
    }
    $company_id = intval($company_id); // conver to int
    $index = is_company_exist($company_id, $data);
    if ($index !== false){ // check if company exist
        company_exist_error();
        return;
    }
    $company_name = $company['name'];;
    $company_registration_code = $company['registration_code'];
    $company_email = $company['email'];
    $company_phone = $company['phone'];
    $comment = $company['comment'];
    if (!isNumber($company_registration_code)){
        require_field_number_die('company_registration_code');
        return;
    }
    if (!filter_var($company_email, FILTER_VALIDATE_EMAIL)){ // email validation
        require_field_email_die('company_email');
        return;
    }
    if (is_email_exist($company_email, $data) !== false){
        email_already_exist_error();
        return;
    }
    if (!isPhoneNumber($company_phone)){
        require_field_phone_number_die('company_phone');
        return;
    }
    // company data validation completed
    array_push($data, array(
                'id'=>$company_id,
                'name'=>$company_name,
                'registration_code'=>$company_registration_code,
                'email'=>$company_email,
                'phone'=>$company_phone,
                'comment'=>$comment
    ));
}
?>