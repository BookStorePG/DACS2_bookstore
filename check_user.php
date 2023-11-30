<?php

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
    
    echo '<script>alert("Login to countinue..")</script>';
    echo '<script>window.location="?act=login"</script>';
}

?>
