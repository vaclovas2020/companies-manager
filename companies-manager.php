<?php
$data_json = file_get_contents('data.json'); // get data file
if (!empty($data_json)){
    $data = json_decode($data_json, true); // convert json string to PHP data array
    echo "----COMPANIES LIST----\n";
    echo "id|name|registration_code|email|phone|comment\n";
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
        echo '\n'; // add new line
    }
}
else{
    echo "Companies list is empty.";
}
?>