<?php
include('../config.php');
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
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
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
                    <a href="viewdoctors.php">
                            <span class="icon icon-4"><i class="ri-user-2-line"></i></span>
                            <span class="sidebar--item">Doctors List</span>
                        </a>
                    </li>
                    <li>
                    <a href="#"  id="active--link">
                        <span class="icon icon-2"><i class="ri-pie-chart-box-line"></i></span>
                        <span class="sidebar--item">Treatment Bookings</span>
                    </a>
                </li>

                    <li>
                    <a href="adddoc.php">
                            <span class="icon icon-4"><i class="ri-user-add-line"></i></span>
                            <span class="sidebar--item">Add Doctor</span>
                        </a>
                    </li>
             
                    <li>
                    <a href="manage_drleave.php">
                            <span class="icon icon-6"><i class="ri-map-pin-user-line"></i></span>
                            <span class="sidebar--item">Manage Doctors Leave</span>
                        </a>
                    </li>
                    <li>
                    <a href="removedoctor.php">
                        <span class="icon icon-4"><i class="ri-user-line"></i></span>
                            <span class="sidebar--item">Manage Doctor</span>
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
							<h3>View Treatment Booking</h3>
                            <form action="treatment_pdf.php" class="doctor--card" method="POST">
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
                                <th>Sl no.</th>
									<th>Name</th>
									<th>Treatment Name</th>
                                    <th></th>
									<th>Arriving Date</th>
                                    <th>Payment Satus</th>
								</tr>
							</thead>
							<tbody>
							<?php
                                $d=1;
                                
		  					
		 				   $query="SELECT * FROM tbl_c_packages ";
                                            $data = mysqli_query($con,$query);
                                            while($res=mysqli_fetch_assoc($data))
                                            {
                                                $uid = $res['p_id'];
                                                $lid = $res['l_id'];
                                                $vdate = $res['visit_date'];
                                                $status= $res['status'];
                                                $query1="SELECT * FROM tbl_packages where p_id = '$uid' ";
                                                $data1 = mysqli_query($con,$query1);
                                                while($res1=mysqli_fetch_assoc($data1))
                                                {
                                                    $pic = $res1['p_image'];
                                                    $pname = $res1['p_name'];

                                                
                                                $query2="SELECT * FROM tbl_patient where l_id = '$lid' ";
                                                $data2 = mysqli_query($con,$query2);
                                                while($res2=mysqli_fetch_assoc($data2))
                                                {
                                                        $name = $res2['u_name'];
                                                        
                                                }
                                                
							?>
							<tr>
                            <td><?php echo $d++;?></td>							
								<td><?php echo  $name ; ?></td>
                               <td><?php echo  $pname ; ?></td>
                               <td><img src="../images/<?php echo $res1['p_image'];?>" width="50px" height="45px"></td>	
                               <td><?php echo  $vdate ; ?></td>
                               <td><span class="label text-light bg-success" style="padding: 10px 10px;border-radius: 10px">Paid</span></td>
                         
                            </tr>
							<?php
							}}
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
