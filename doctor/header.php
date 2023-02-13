<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="docotr_style.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Dashboard</title>
</head>

<body>
    <section class="header">
        <div class="logo">
            <i class="ri-menu-line icon icon-0 menu"></i>
            <h2>JEE<span>VANI</span></h2>
        </div>

    </section>
    <section class="main">
        <div class="sidebar">
            <ul class="sidebar--items">
                <li>
                    <a href="index.php">
                        <span class="icon icon-1"><i class="ri-layout-grid-line"></i></span>
                        <span class="sidebar--item">Doctor Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="docsheduler.php">
                        <span class="icon icon-2"><i class="ri-time-line"></i></span>
                        <span class="sidebar--item">Manage Time shedule</span>
                    </a>
                </li>
                <!-- <li>
                    <a href="prescribe.php" >
                        <span class="icon icon-4"><i class="ri-send-plane-fill"></i></span>
                        <span class="sidebar--item">prescription</span>
                    </a>
                </li> -->
                <li>
                    <a href="docappoview.php">
                        <span class="icon icon-2"><i class="ri-health-book-fill"></i></span>
                        <span class="sidebar--item">Manage Appoinment </span>
                    </a>
                </li>

                <li>
                    <a href="appohistory.php">
                        <span class="icon icon-2"><i class="ri-health-book-line"></i></span>
                        <span class="sidebar--item">Appoinment History</span>
                    </a>
                </li>
                <li>
                    <a href="applyleave.php">
                        <span class="icon icon-4"><i class="ri-send-plane-fill"></i></span>
                        <span class="sidebar--item"> Apply Leave</span>
                    </a>
                </li>

                <li>
                    <a href="viewleavestatus.php">
                        <span class="icon icon-4"><i class="ri-flag-2-line"></i></span>
                        <span class="sidebar--item">Leave Status</span>
                    </a>
                </li>


                <li>
                    <a href="updateprofile.php">
                        <span class="icon icon-5"><i class="ri-profile-line"></i></span>
                        <span class="sidebar--item">Update Profile</span>
                    </a>
                </li>
                <li>
                    <a href="updatepass.php">
                        <span class="icon icon-6"><i class="ri-lock-password-fill"></i></span>
                        <span class="sidebar--item">Update Password</span>
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