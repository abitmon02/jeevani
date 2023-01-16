
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/adminstyle.css">
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
                    <a href="index.php" id="active--link">
                        <span class="icon icon-1"><i class="ri-layout-grid-line"></i></span>
                        <span class="sidebar--item">Admin Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="addproduct.php">
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
        <main>
				       
        <div class="main--content">
                       <div class="table-data">
                           <div class="order">
                               
                               <table>
                                   <thead>
                                       <tr>
                                           <th>ID</th>
                                           <th>E-mail</th>
                                            <th>Status</th>
                                       </tr>
                                   </thead>
                                   <tbody>
                                   <?php 
                                           $con = mysqli_connect("localhost","root","","jeevani");
       
                                           if(isset($_POST['search']))
                                           {
                                               $filtervalues = $_POST['search'];
                                               $query = "SELECT * FROM tbl_login WHERE CONCAT(l_id,email,status) LIKE '%$filtervalues%' ";
                                               $query_run = mysqli_query($con, $query);
       
                                               if(mysqli_num_rows($query_run) > 0)
                                               {
                                                   foreach($query_run as $items)
                                                   {
                                                       ?>
                                                       <tr>
                                                           <td><?= $items['l_id']; ?></td>
                                                           <td><?= $items['email']; ?></td>
                                                           <td><?= $items['status']; ?></td>
                                                       </tr>
                                                       <?php
                                                   }
                                               }
                                               else
                                               {
                                                   ?>
                                                       <tr>
                                                           <td colspan="4">No Record Found</td>
                                                       </tr>
                                                   <?php
                                               }
                                           }
                                       ?>						
                                      </tbody>
                               </table>
                           </div>
                       </div>
                   </main>
               </section>
       
       
       
       
       
       
       
                   
       
           <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
           <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
       </body>
       </html>
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       
       