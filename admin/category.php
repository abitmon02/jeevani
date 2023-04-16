<?php
include('../config.php');
session_start();
if (!isset($_SESSION["email"])) {
    header("Location:../user-login.php");
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
                    <a href="index.php">
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
                    <a href="#" id="active--link">
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
                    <a href="orderHistory.php">
                        <span class="icon icon-4"><i class="ri-shopping-basket-2-line"></i></span>
                        <span class="sidebar--item">Mange orders and History</span>
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
            <div class="overview">
                    <form action="pdf_cat.php" method="POST">
                                <div class="text-right">
                                    <button type="submit" name="btn_pdf"class="btn btn-light"> </i> Download</button>
                                </div>
                    </form>


                <div class="title">

                    <div>
                        <div class="content mt-3">
                            <form id="form">
                                <h6 class="mb-4">Add Category</h6>
                                <div class="form-group col-md-12">
                                    <label for="exampleFormControlInput1">Enter Category Name</label>
                                    <input type="hidden" id="userid" value="<?= $user_data['userid'] ?>">
                                    <input type="text" class="form-control" id="cataName" placeholder="Enter Category">
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-md btn-success" id="addCatabtn">Add</button>
                                </div>
                                <br>
                                <br>
                            </form>
                        </div>
                    </div>


                </div>

            </div>

            <div class="recent--patients">
                <style>
                    input[type="checkbox"] {
                        position: relative;
                        width: 80px;
                        height: 30px;
                        -webkit-appearance: none;
                        border-radius: 20px;
                        outline: none;
                        transition: .4s;
                        box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.2);
                        cursor: pointer;
                    }

                    img {
                        position: inherit !important;
                    }

                    input:checked[type="checkbox"] {
                        background: green;
                    }

                    input[type="checkbox"]::before {
                        z-index: 2;
                        position: absolute;
                        content: "";
                        left: 0;
                        width: 30px;
                        height: 30px;
                        background: #8E9AA0;
                        border-radius: 50%;
                        transform: scale(1.1);
                        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
                        transition: .4s;
                    }

                    input:checked[type="checkbox"]::before {
                        left: 50px;
                        background: #FFFFFF;
                    }

                    .toggle {
                        position: relative;
                        display: inline;
                    }

                    .label1 {
                        position: absolute;
                        color: #fff;
                        font-weight: 600;
                        pointer-events: none;
                    }

                    .onbtn {
                        bottom: 0px;
                        left: 11px;
                    }

                    .ofbtn {
                        bottom: 0px;
                        right: 8px;
                        color: #8E9AA0;
                    }
                </style>
                <div class="title">
                    <h2 class="section--title"><b>Category list</b></h2>
                </div>
                <div class="table">
                    <table id="example" class="display">

                        <thead>
                            <tr>
                                <th>SL No.</th>
                                <th>Category Name</th>
                                <th>date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $user_data = $con->query("SELECT * FROM `tbl_category`")->fetch_all(MYSQLI_ASSOC);
                            $i = 1;
                            if (!empty($user_data)) {
                                foreach ($user_data as $value) { ?>
                                    <tr class="firstRow">
                                        <td><?= $i ?></td>
                                        <td><?= $value['cata_name'] ?></td>
                                        <td><?= $value['date'] ?></td>
                                        <td>
                                            <div class="toggle">
                                                <input type="checkbox" onchange="changeStatus(<?= $value['cata_id'] ?>)" <?= $value['status'] == 1 ? 'checked' : '' ?>>
                                            </div>
                                            <button onclick="deleteCata(<?= $value['cata_id'] ?>)" class="btn btn-danger">X</button>
                                        </td>
                                    </tr>
                            <?php $i++;
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </section>



    <script src="assets/js/main.js"></script>
    <script>
        function deleteCata(cata_id) {
            $.ajax({
                type: "POST",
                url: "../api/manageprodcuts.php",
                data: {
                    'cata_id': cata_id,
                    'action': 4,
                },
                dataType: 'JSON',
                cache: false,
                success: function(response) {
                    if (response.status == 1) {
                        Swal.fire('success', response.msg, 'success');
                        setTimeout(() => {
                            window.location.reload();
                        }, 1000);
                    } else {
                        Swal.fire('error', response.msg, 'error');
                    }
                }
            });
        }
        $("#addCatabtn").click(() => {
            // invoking create category
            cataName = $("#cataName").val();

            if (cataName.length > 3) {
                $.ajax({
                    type: "POST",
                    url: "../api/manageprodcuts.php",
                    data: {
                        'cataName': cataName,
                        'action': 1,
                    },
                    dataType: 'JSON',
                    cache: false,
                    success: function(response) {
                        if (response.status == 1) {
                            Swal.fire('success', response.msg, 'success');
                            setTimeout(() => {
                                window.location.reload();
                            }, 1000);
                        } else {
                            Swal.fire('error', response.msg, 'error');
                        }
                    }
                });
            } else {
                Swal.fire('error', "Category name should be atleast 4 characters", 'error');
            }
        })
        changeStatus = (cata_id) => {
            if (!isNaN(cata_id)) {
                $.ajax({
                    type: "POST",
                    url: "../api/manageprodcuts.php",
                    data: {
                        'cata_id': cata_id,
                        'action': 6,
                    },
                    dataType: 'JSON',
                    cache: false,
                    success: function(response) {
                        // if (response.status == 1) {
                        //     Swal.fire('success', response.msg, 'success');
                        // } else {
                        //     Swal.fire('error', response.msg, 'error');
                        // }
                    }
                });
            }
        }
    </script>
</body>

</html>