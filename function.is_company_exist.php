<?php function is_company_exist($company_id, $data){
    for ($i = 0; $i < count($data); $i++){
        $company = $data[$i];
        if ($company_id == $company['id']){
            return $i; // return index of data array
        }
    }
    return false;
} ?>