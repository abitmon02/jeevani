<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <title>Dashboard</title>
</head>

<body id="MainBody">
    <section class="header">
        <div class="logo">
            <i class="ri-menu-line icon icon-0 menu"></i>
            <h2>JEE<span>VANI</span></h2>
        </div>
       
        
        <div class="search--notification--profile">
            <div class="notification--profile">


                <div class="alert alert-primary" role="alert">
                    &nbsp;<br> Welcome <?= $user_data['email'] ?>
                </div>

            </div>

        </div>

    </section>
    <section class="main">
        <div class="sidebar">
            <ul class="sidebar--items">
                <li>
                    <a href="index.php">
                        <span class="icon icon-1"><i class="ri-layout-grid-line"></i></span>
                        <span class="sidebar--item">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="appoinment.php">
                        <span class="icon icon-2"><i class="ri-folder-add-fill"></i></span>
                        <span class="sidebar--item">Book Appointment</span>
                    </a>
                </li>

                <li>
                    <a href="dicease_pred.php">
                        <span class="icon icon-2"><i class="ri-folder-add-fill"></i></span>
                        <span class="sidebar--item">Disease Preditction</span>
                    </a>
                </li>
                <li>
                    <a href="appoinmenthistory.php">
                        <span class="icon icon-2"><i class="ri-health-book-line"></i></span>
                        <span class="sidebar--item" style="white-space: nowrap;">Appointent History</span>
                    </a>
                </li>
                <li>
                    <a href="packages.php">
                        <span class="icon icon-2"><i class="ri-stethoscope-fill"></i></span>
                        <span class="sidebar--item"> Treatment</span>
                    </a>
                </li>
                <li>
                    <a href="treatmenthistory.php">
                        <span class="icon icon-2"><i class="ri-folder-history-line"></i></span>
                        <span class="sidebar--item"> Treatment Booking history</span>
                    </a>
                </li>
                <li>
                    <a href="products.php">
                        <span class="icon icon-2"><i class="ri-shopping-basket-2-line"></i></span>
                        <span class="sidebar--item"> Products</span>
                    </a>
                </li>

                <li>
                    <a href="feedback.php">
                        <span class="icon icon-2"><i class="ri-discuss-fill "></i></span>
                        <span class="sidebar--item">Feedbacks</span>
                    </a>
                </li>
                <li>
                    <a href="edituserpro.php">
                        <span class="icon icon-4"><i class="ri-profile-line"></i></span>
                        <span class="sidebar--item">Update Profile</span>
                    </a>
                </li>
                <li>
                    <a href="updatepass.php">
                        <span class="icon icon-2"><i class="ri-lock-password-fill"></i></span>
                        <span class="sidebar--item">Update Password</span>
                    </a>
                </li>
            </ul>
            <ul class="sidebar--bottom-items">
                <li>
                    <a href="cart.php">
                        <span class="icon icon-8"><i class="ri-shopping-basket-2-line"></i></span>
                        <span class="sidebar--item">Cart</span>
                    </a>
                </li>
                <li>
                    <a href="orderHistory.php">
                        <span class="icon icon-8"><i class="ri-shopping-basket-2-line"></i></span>
                        <span class="sidebar--item">Order History</span>
                    </a>
                </li>
                <li>
                    <a href="../logout.php">
                        <span class="icon icon-8"><i class="ri-logout-box-r-line"></i></span>
                        <span class="sidebar--item">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
        
        <div class="main--content">