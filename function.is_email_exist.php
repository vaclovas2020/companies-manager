<?php function is_email_exist($email, $data){
    for ($i = 0; $i < count($data); $i++){
        $company = $data[$i];
        if ($email == $company['email']){
            return $i; // return index of data array
        }
    }
    return false;
} ?>