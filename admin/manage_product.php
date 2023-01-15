<?php
include('../config.php');
session_start();
if(!isset($_SESSION["email"])) 
{
    header("Location:../user-login.php");
}
if (isset($_POST["submit"]))
{
    $name=$_POST["name"];
	$image=$_FILES["image"]["name"];//2d array type inst of name return type size
	 
	$day=$_POST["day"];
    $amount=$_POST["amount"];
 
	move_uploaded_file($_FILES["image"]["tmp_name"],"../images/".$_FILES["image"]["name"]);
    mysqli_query($con, "INSERT INTO `tbl_packages`(`p_name`, `p_image`, `days`, `p_amount`,`p_status`) 
	VALUES ('$name','$image','$day','$amount',0)");
	 
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cngps.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

  <script src="main.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
   
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
                    <a href="index.php"  >
                        <span class="icon icon-1"><i class="ri-layout-grid-line"></i></span>
                        <span class="sidebar--item">Admin Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="addproduct.php"id="active--link">
                        <span class="icon icon-2"><i class="ri-pie-chart-box-line"></i></span>
                        <span class="sidebar--item">Packages</span>
                    </a>
                </li>
                <li>
                    <a href="customPackages.php">
                        <span class="icon icon-2"><i class="ri-pie-chart-box-line"></i></span>
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
                    <a href="viewdoctors.php">
                        <span class="icon icon-4"><i class="ri-user-2-line"></i></span>
                        <span class="sidebar--item">Doctors List</span>
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
                        <span class="sidebar--item">Manage Doctor's Leave</span>
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
							<h3></h3>	
						</div>
                    <table id="example" class="display">
							<thead>
								<tr>
                                <th> &nbsp;&nbsp; sl no.</th>
									<th>Name</th>
									<th>Images</th>
									<th>Day</th>
									<th>Amount</th>
									<th>Edit</th>
									<th>&nbsp; &nbsp;  &nbsp; Status</th>
								</tr>
							</thead>
							<tbody>
								<?php
		  							 $c=1;
		  					 		$query="SELECT * FROM tbl_packages";
									$data = mysqli_query($con,$query);
									while($res=mysqli_fetch_assoc($data))
									{
								?>
								<tr>
                                <td>
                                    <br><br><br><p><?php echo $c++;?></p></td>
									<td><p><?php echo $res['p_name'];?></p></td>
									<td><img src="../images/<?php echo $res['p_image'];?>" width="50px" height="50px"></td>
									<td><p>1 day</p></td>
									<td><p><?php echo $res['p_amount'];?></p></td>  						
									 <td><a href="editpackages.php?edit_id=
                                    <?php echo $res['p_id']; ?>"><span  class="status completed">EDIT</span></a>  
									     <td> <?php if($res['p_status']==0){
                                        echo '<p><a input type="text"   class="status completed"href="pinactive.php?p_id='.$res['p_id'].'&status=1">DEACTIVATE</a></p>';
                                        }if($res['p_status']==1){
                                        echo '<p><a input type="text" class="status completed" href="pactive.php?p_id='.$res['p_id'].'&status=0">ACTIVATE</a></p>';
                                        } ?></td>

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

<script type="text/javascript">
function validate()
{  
 
if(document.getElementById('name').value.length==0 || 
document.getElementById('day').value.length==0 || 
document.getElementById('amount').value.length==0)
{
 
return false;
}

}
  let name = document.getElementById('name');
  let span = document.getElementsByTagName('span');
  let days = document.getElementById('day');
  let amounts = document.getElementById('amount');
  
  name.onkeyup = function()
  {
  var regex = /^([\.\_a-zA-Z]+)([a-zA-Z ]+){1,30}$/;
  if(regex.test(name.value))
  {
  
  document.getElementById('mysubmit').disabled=false;

 

  }
  else
  {
 
  document.getElementById('mysubmit').disabled=true;



  }
  }
 
 days.onkeyup = function(){
   const regexn = /^[A-Za-z0-9]{1,8}$/;
   if(regexn.test(days.value))
  {
   
  document.getElementById('mysubmit').disabled=false;

}
  else
  {
 
  document.getElementById('mysubmit').disabled=true;

  }
  }


  amounts.onkeyup = function(){
   const regexn = /^[A-Za-z0-9]{1,8}$/;
   if(regexn.test(amounts.value))
  {
 
  document.getElementById('mysubmit').disabled=false;


}
  else
  {
 
  document.getElementById('mysubmit').disabled=true;


  }
  }

</script>
