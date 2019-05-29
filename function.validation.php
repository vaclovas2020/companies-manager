<?php isNumber($str){
    return (preg_match('/^[0-9]+$/', $str) == 1)?true:false;
} ?>