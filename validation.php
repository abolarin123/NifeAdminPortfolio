<?php
session_start();
$check=true;

function isValidated($value)
{
    $value = isEmpty($value);
    $value= trim($value);
    $value=(strlen($value)> 3) ? $value:$GLOBALS['check']=false;
   $value= htmlspecialchars($value);
   return $value;

}
function isEmpty($data)
{
    if (empty($data)){
        $GLOBALS['check']=false;
    }
    else{
        return $data;
        
    }

}
function isValidEmail($value) {
    if (!filter_var($value, FILTER_VALIDATE_EMAIL)){
        $check = false;
     $_SESSION['success'] = 'Invalid email format.';
    }
    return $value;
}
?>