<?php
include('../config.php');
session_start();
if (!isset($_SESSION["email"])) {
    header("Location:../user-login.php");
}
if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $image = $_FILES["image"]["name"]; //2d array type inst of name return type size
    //print_r($_FILES);exit;
    $amount = $_POST["amount"];
    // $description = $_POST["day"];
    move_uploaded_file($_FILES["image"]["tmp_name"], "../images/" . $_FILES["image"]["name"]);
    mysqli_query($con, "INSERT INTO `tbl_packages`(`p_name`, `p_image`, `p_amount`,`p_status`) 
	VALUES ('$name','$image','$amount',0)");
    // header('location:addproduct.php');
    echo "<script>  
                alert('Package  added');
                    window.location.href='addproduct.php';
                </script>";
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script src="main.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
    <link rel="stylesheet" href="css/removedr.css">

    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Admin</title>
   

</head>

<body>
    <section class="header">
        <div class="logo">
            <i class="ri-menu-line icon icon-0 menu"></i>
            <h2>Jee<span>vani</span></h2>
        </div>


    </section>
    <section class="main">
        <div class="sidebar">
            <ul class="sidebar--items">
            <li>
                    <a href="index.php" >
                        <span class="icon icon-1"><i class="ri-layout-grid-line"></i></span>
                        <span class="sidebar--item">Admin Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#" id="active--link">
                        <span class="icon icon-2"><i class="ri-pie-chart-box-line"></i></span>
                        <span class="sidebar--item">Treatments</span>
                    </a>
                </li>
                  <li>
                    <a href="customPackages.php">
                        <span class="icon icon-5"><i class="ri-command-line"></i></span>
                        <span class="sidebar--item"> Custom Packages</span>
                    </a>
                </li>
                <li>
                    <a href="viewpatients.php">
                        <span class="icon icon-3"><i class="ri-user-line"></i></span>
                        <span class="sidebar--item" style="white-space: nowrap;">Patients</span>

                    </a>
                </li>
                <li>
                    <a href="adddoc.php">
                        <span class="icon icon-4"><i class="ri-user-add-line"></i></span>
                        <span class="sidebar--item">Add Doctor</span>
                    </a>
                </li>

                <li>
                    <a href="viewdoctors.php">
                        <span class="icon icon-4"><i class="ri-user-2-line"></i></span>
                        <span class="sidebar--item">Doctors List</span>
                    </a>
                </li>
                <li>
                    <a href="viewtreatment.php">
                    <span class="icon icon-2"><i class="ri-pie-chart-box-line"></i></span>
                     <span class="sidebar--item">Packages Bookings</span>
                   </a>
                </li>

                <li>
                    <a href="manage_drleave.php">
                        <span class="icon icon-6"><i class="ri-map-pin-user-line"></i></span>
                        <span class="sidebar--item">Manage Doctor's Leave</span>
                    </a>
                </li>
                <li>
                    <a href="removedoctor.php">
                        <span class="icon icon-2"><i class="ri-user-settings-fill"></i></span>
                        <span class="sidebar--item">Manage Doctor</span>
                    </a>
                </li>
                <li>
                    <a href="category.php">
                        <span class="icon icon-4"><i class="ri-shopping-bag-2-fill"></i></span>
                        <span class="sidebar--item">Manage Product Category</span>
                    </a>
                </li>
                <li>
                    <a href="products.php">
                        <span class="icon icon-4"><i class="ri-shopping-basket-2-line"></i></span>
                        <span class="sidebar--item">Manage Products</span>
                    </a>
                </li>
                <li>
                    <a href="vw_fdbck.php">
                        <span class="icon icon-6"><i class="ri-feedback-fill"></i></span>
                        <span class="sidebar--item">Feedbacks</span>
                    </a>
                </li>
            </ul>
            <ul class="sidebar--bottom-items">

                <li>
                    <a href="../logout.php">
                        <span class="icon icon-8"><i class="ri-logout-box-r-line"></i></span>
                        <span class="sidebar--item">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="main--content">
			<!-- MAIN -->
            <div class="overview">
        <div class="row mt-5">
            <div class="col-md-12">
            <table>
                 
                    <h2 style="color: #9f8e64;">ADD PACKAGE</h2>
                    <input type="submit"class="btn btn-md btn-success"   style="float:right;" onclick="window.location.href = 'manage_product.php';" value="Manage Product">
                    <span style="color: red; margin-left:55px; font-size:12px"></span>
                    <form method="POST" action="#" onsubmit="return validate();" enctype="multipart/form-data">
                    <div class="form-group col-12 mt-2">    
                    <label class="form-label text-dark">Package Name:</label>
                        <input type="text" id="name"class="form-control" name="name" placeholder="Add treatment name">
                        <span style="color: red; margin-left:50px; font-size:12px"></span><br>
                        <label  class="form-label text-dark">Image:</label><br>
                        <input type="file" id="image" class="form-control"name="image" size="200KB" accept="image/gif,image/jpg,image/JPG, image/jpeg, image/x-ms-bmp, image/x-png">
                        <br>

                        <label  class="form-label text-dark">Amount:</label>
                        <input type="number" id="amount"class="form-control" name="amount" min="0" placeholder="Enter Package Cost ">
                        <span style="color: red; margin-left:55px; font-size:12px"></span><br>
                        <input type="submit" id="mysubmit"class="btn btn-md btn-success"  name="submit" value="Submit">
                        <span style="color: red; margin-left:55px; font-size:12px"></span>
</div>
                    </form>
                </div>
            </table>



        </main>
    </section>
    <script src="js/script.js"></script>
</body>

</html>

<script type="text/javascript">
    function validate() {

        if (document.getElementById('name').value.length == 0 ||
            document.getElementById('day').value.length == 0 ||
            document.getElementById('amount').value.length == 0) {
            return false;
        }

    }
    let name = document.getElementById('name');
    let span = document.getElementsByTagName('span');
    let days = document.getElementById('day');
    let amounts = document.getElementById('amount');

    name.onkeyup = function() {
        var regex = /^([\.\_a-zA-Z]+)([a-zA-Z ]+){1,30}$/;
        if (regex.test(name.value)) {

            document.getElementById('mysubmit').disabled = false;



        } else {

            document.getElementById('mysubmit').disabled = true;



        }
    }

    days.onkeyup = function() {
        const regexn = /^[A-Za-z0-9]{1,8}$/;
        if (regexn.test(days.value)) {

            document.getElementById('mysubmit').disabled = false;

        } else {

            document.getElementById('mysubmit').disabled = true;

        }
    }


    amounts.onkeyup = function() {
        const regexn = /^[A-Za-z0-9]{1,8}$/;
        if (regexn.test(amounts.value)) {

            document.getElementById('mysubmit').disabled = false;


        } else {

            document.getElementById('mysubmit').disabled = true;


        }
    }
</script>