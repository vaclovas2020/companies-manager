<?php 
function isNumber($str){
    return (preg_match('/^[0-9]+$/', $str) == 1)?true:false;
}
function isPhoneNumber($str){
    return (preg_match('/(^[+]{1}[0-9]{11}$)|(^[0-9]{9}$)/', $str) == 1)?true:false; // 9 numbers without + or 11 numbers with +
}
?>