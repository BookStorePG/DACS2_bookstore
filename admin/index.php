<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PageGarden</title>

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>   

    <!------------- custom css file link --------------------->

    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>

<body id="body">

    <div class="navbar" id="navbar">
        <div class="nav">
            <div>
                <a href="#" class="nav-logo">
                    <img src="../img/logo.png" alt=" " class="nav-logo-icon">
                </a>
                <div class="nav-toggle" id="nav-toggle">
                    <i class='bx bxs-chevron-right'></i>
                </div>
                <ul class="nav-list">
                    <a href="#" class="nav-link active">
                        <i class="bx bx-grid-alt nav-icon"></i>
                        <span class="nav-text">Home</span>
                    </a>
                    <a href="#" class="nav-link active">
                        <i class="bx bx-user nav-icon"></i>
                        <span class="nav-text">User</span>
                    </a>
                    <a href="?act=list-product" class="nav-link active">
                        <i class="fa-solid fa-book nav-icon"></i>
                        <span class="nav-text">Products</span>
                    </a>
                    <a href="#" class="nav-link active">
                        <i class="fa-brands fa-shopify nav-icon"></i>
                        <span class="nav-text">Order</span>
                    </a>
                    <a href="#" class="nav-link active">
                        <i class="fa-solid fa-right-from-bracket nav-icon"></i>
                        <span class="nav-text">Logout</span>
                    </a>

                </ul>

            </div>
            <a href="#" class="nav-link active">
                <i class="bx bx-log-out-circle nav-icon"></i>
                <span class="nav-text">Close</span>
            </a>
        </div>

    </div>
    <?php require_once '../connect.php'; ?>
    <?php include("controll.php");?>

    <script src="../js/main.js"> </script>
</body>

</html>
