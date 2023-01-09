<?php

session_start();
if(!isset($_SESSION["email"])) 
{
    header("Location:../user-login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/dashboard.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

  <script src="main.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
  
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                        <a  href="index.php" id="#">
                            <span class="icon icon-1"><i class="ri-layout-grid-line"></i></span>
                            <span class="sidebar--item">Admin Dashboard</span>
                        </a>
                    </li>
                    <li>
                    <a href="addproduct.php">
                            <span class="icon icon-2"><i class="ri-pie-chart-box-line"></i></span>
                            <span class="sidebar--item">Packages</span>
                        </a>
                    </li>
                    <li>
                    <a href="customPackages.php">
                        <span class="icon icon-2"><i class="ri-pie-chart-box-line"></i></span>
                        <span class="sidebar--item"> custom Packages</span>
                    </a>
                </li>
                    <li>
                    <a href="viewpatients.php" >
                            <span class="icon icon-3"><i class="ri-user-line"></i></span>
                            <span class="sidebar--item" style="white-space: nowrap;">Patients</span>

                        </a>
                    </li>
                    <li>
                    <a href="viewdoctors.php" id="active--link">
                            <span class="icon icon-4"><i class="ri-user-2-line"></i></span>
                            <span class="sidebar--item">Doctors List</span>
                        </a>
                    </li>
                    <li>
                    <a href="viewtreatment.php"   >
                        <span class="icon icon-2"><i class="ri-pie-chart-box-line"></i></span>
                        <span class="sidebar--item">Treatment Bookings</span>
                    </a>
                </li>
                    <a href="adddoc.php">
                            <span class="icon icon-4"><i class="ri-user-add-line"></i></span>
                            <span class="sidebar--item">Add Doctor</span>
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
                        <span class="icon icon-4"><i class="ri-user-line"></i></span>
                            <span class="sidebar--item">Manage Doctors</span>
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

    </section>
        
        <!-- CONTENT -->
    <section id="content">
                <!-- MAIN -->
            <main>
                <div class="table-data">
                    <div class="order">
                        <div class="head">
                            <h3>Doctors</h3>
                                
                            <form action="docdet_pdf.php" class="doctor--card" method="POST">
                                <div class="img--box--cover">
                                    <div class="img--box">
                                        <button type="submit" name="btn_pdf"class="btn"><i class="fa fa-download "></i> Download</button>
                                    </div>
                            </form>
                                </div>
                        </div>
                        <table id="example" class="display">
                                    <thead>
                                        <tr>
                                                <th>sl no.</th>
                                                <th>Name</th>
                                                <th>Address</th>
                                                <th>Fees</th>
                                                <th>Email</th>
                                                <th>Specialization</th>		
                                                <th>Status</th>						
                                        </tr>
                                    </thead>
                                <tbody>
                                        <?php
                                        $d=1;
                                
                                                include('../config.php');
                                                $query="SELECT * FROM tbl_doctor";
                                                $data = mysqli_query($con,$query);
                                                while($res=mysqli_fetch_assoc($data))
                                                {
                                                    $lid = $res['l_id'];
                                                $emailval='';
                                                $query1="SELECT * FROM tbl_login where l_id = '$lid' ";
                                                $data1 = mysqli_query($con,$query1);
                                                while($res1=mysqli_fetch_assoc($data1))
                                                {
                                                        $emailval = $res1['email'];
                                                }

                                        ?>
                                        <tr>
                                                <td><p><?php echo $d++;?></p></td>
                                                <td><p><?php echo $res['d_name'];?></p></td>
                                                <td><p><?php echo $res['d_address'];?></p></td>
                                                <td><p><?php echo $res['d_fees'];?></p></td>
                                                <td><p><?php echo $emailval ?></p></td>
                                        
                                                <td><p><?php echo $res['spec'];?></p></td>
                                                <td><p><?php $t = $res['status'];

if ($t == 0) {
echo "Active";
} else {
echo "Inactive";
}?></p></td>
                                        </tr>
                                        <?php
                                            }
                                        ?>								
                                </tbody>
                        </table>
                    </div>
                </div>
            </main>
    </section>
        <script src="js/script.js"></script>
</body>
</html>
