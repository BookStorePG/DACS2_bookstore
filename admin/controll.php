<?php 
	if(isset($_GET['act'])){$act=$_GET['act'];}else{$act="";}
	switch($act)
	{
        case "product":
		    require_once("list-product.php");
        break;
        case "add-product":
		    require_once("add-product.php");
        break;
        default:
            require_once("list-product.php");
        break;

	}
?>