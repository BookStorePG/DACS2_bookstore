<?php 
	if(isset($_GET['act'])){$act=$_GET['act'];}else{$act="";}
	switch($act)
	{
		case "home":
		    require_once("home.php");
        break;
        case "shop":
		    require_once("shop.php");
        break;
        case "about":
		    require_once("about.php");
        break;
        case "contact":
		    require_once("contact.php");
        break;
        case "order":
		    require_once("order.php");
        break;
		case "login":
		    require_once("login.php");
        break;
		case "res":
		    require_once("resgister.php");
        break;
		case "logout":
		    require_once("logout.php");
        break;
		case "search":
		    require_once("search.php");
        break;
		case "productdetail":
		    require_once("productdetail.php");
        break;
		case "cart":
		    require_once("cart.php");
        break;
        default:
			require_once('home.php');
		break;

	}
?>
