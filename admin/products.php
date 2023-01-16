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
                    <a href="index.php" >
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
                    <a href="#" id="active--link">
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
            <div class="overview">
                <div class="title">

                    <div>
                        <div class="content mt-3">
                            <form id="form">
                                <h6 class="mb-4">Add Products</h6>
                                <div class="form-group col-md-12">
                                    <label for="exampleFormControlInput1">Choose category</label>
                                    <select id="cata_choose" class="custom-select form-control">
                                        <option disabled>Choose category</option>
                                        <?php
                                        $data = $con->query("SELECT * FROM `tbl_category`")->fetch_all(MYSQLI_ASSOC);
                                        if (!empty($data)) {
                                            foreach ($data as $val) {
                                        ?> <option value="<?= $val['cata_id'] ?>"><?= $val['cata_name'] ?></option> <?php
                                                                                                                }
                                                                                                            }
                                                                                                                    ?>

                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="exampleFormControlInput1">Product Name</label>
                                    <input type="text" class="form-control" id="product_name" placeholder="Please enter product name">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="exampleFormControlInput1">Stock </label>
                                    <input type="number" class="form-control" id="stock" placeholder="Please enter stock qty">
                                </div>
                                
                                <div class="form-group col-md-12">
                                    <label for="exampleFormControlInput1">Price/unit</label>
                                    <input type="text" class="form-control" id="price_inp" placeholder="Please enter price">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="exampleFormControlInput1">Image</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image_inp">
                                        <label class="custom-file-label" for="image_inp">Choose file</label>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="exampleFormControlInput1">Description</label>
                                    <input type="text" class="form-control" id="desc_inp" placeholder="Please enter Description">
                                </div>
                            </form>
                            <div class="col-md-12">
                                <button class="btn btn-md btn-success" id="addProductBtn">SUBMIT</button>
                            </div>
                            <br>
                            <br>
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
                    <h2 class="section--title"><b>Product list</b></h2>
                </div>
                <div class="table">
                    <table id="example" class="display">

                        <thead>
                            <tr>
                                <th>SL No.</th>

                                <th>Product Name</th>
                                <th>Category</th>
                                <th>Stock</th>
                                <th>Price</th>
                                <th>description</th>
                                <th>date</th>

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $user_data = $con->query("SELECT `tbl_product`.`product_id`,`tbl_product`.`product_name`,`tbl_product`.`stock`,`tbl_product`.`price`,`tbl_product`.`image`,`tbl_product`.`description`,`tbl_product`.`date`,`tbl_product`.`status`,`tbl_category`.`cata_name` FROM `tbl_product` INNER JOIN `tbl_category` ON `tbl_product`.`cata_id` = `tbl_category`.`cata_id`;")->fetch_all(MYSQLI_ASSOC);
                            $i = 1;
                            if (!empty($user_data)) {
                                foreach ($user_data as $value) { ?>
                                    <tr class="firstRow">
                                        <td><?= $i ?></td>

                                        <td><img src="../images/products/<?= $value['image'] ?>" width="50px" height="50px" alt="<?= $value['image'] ?>"><br><?= $value['product_name'] ?></td>
                                        <td><?= $value['cata_name'] ?></td>

                                        <td><?= $value['stock'] ?></td>
                                        <td><?= $value['price'] ?></td>
                                        <td><?= $value['description'] ?></td>

                                        <td><?= $value['date'] ?></td>
                                        <td>
                                            <div class="toggle">
                                                <input type="checkbox" onchange="changeStatus(<?= $value['product_id'] ?>)" <?= $value['status'] == 1 ? 'checked' : '' ?>>

                                            </div>
                                            <button onclick="deleteProduct(<?= $value['product_id'] ?>)" class="btn btn-danger">X</button>
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
        function deleteProduct(product_id) {
            $.ajax({
                type: "POST",
                url: "../api/manageprodcuts.php",
                data: {
                    'product_id': product_id,
                    'action': 3,
                },
                dataType: 'JSON',
                cache: false,
                success: function(response) {
                    if (response.status == 1) {
                        swal('Success', response.msg, 'success');
                        setTimeout(() => {
                            window.location.reload();
                        }, 1000);
                    } else {
                        swal('error', response.msg, 'error');
                    }
                }
            });
        }
        $("#addProductBtn").click(() => {
            cata_code = $("#cata_choose").val();
            product_name = $("#product_name").val();
            stock = $("#stock").val();
            price_inp = $("#price_inp").val();
            image_inp = $("#image_inp").val();
            desc_inp = $("#desc_inp").val();
            if (cata_code != null) {
                if (product_name.length > 3) {
                    if (!isNaN(stock) && stock > 0) {
                        if (price_inp > 0) {
                            if (image_inp != null) {
                                if (desc_inp.length > 10) {
                                    if (fileValidation()) {
                                        var formData = new FormData();
                                        var file = document.getElementById('image_inp').files[0];
                                        formData.append("action", 2);
                                        formData.append("cata_code", $("#cata_choose").val());
                                        formData.append("product_name", $("#product_name").val());
                                        formData.append("stock", $("#stock").val());
                                        formData.append("price_inp", $("#price_inp").val());
                                        formData.append("file", file);
                                        formData.append("desc_inp", $("#desc_inp").val());
                                        $.ajax({
                                            type: "POST",
                                            url: "../api/manageprodcuts.php",
                                            data: formData,
                                            cache: false,
                                            contentType: false,
                                            processData: false,
                                            dataType: 'json',
                                            success: function(response) {
                                                if (response.status == 1) {
                                                    swal('success', response.msg, 'success');
                                                    setTimeout(() => {
                                                        window.location.reload();
                                                    }, 1000);
                                                } else {
                                                    swal('error', response.msg, 'error');
                                                }
                                            }
                                        });
                                    }
                                } else {
                                    swal('error', "Description should be atleast 10 characters", 'error');
                                }
                            } else {
                                swal('error', "please select a image", 'error');
                            }

                        } else {
                            swal('error', "price must be minimum 1 RS.", 'error');
                        }
                    } else {
                        swal('error', "stock should be minimum 1 digit.", 'error');
                    }
                } else {
                    swal('error', "product name should be at least 4 characters", 'error');
                }
            } else {
                swal('error', "Please select category", 'error');
            }
        })

        function fileValidation() {
            var fileInput = document.getElementById('image_inp');
            var filePath = fileInput.value;
            var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
            if (!allowedExtensions.exec(filePath)) {
                swal('error', 'Please upload file having extensions .jpeg/.jpg/.png/.gif only.', 'error');
                return false;
            } else {
                return true;
            }
        }
        $('#image_inp').on('change', function() {
            //get the file name
            var fileName = $(this).val();
            //replace the "Choose a file" label
            $(this).next('.custom-file-label').html(fileName);
        })

        function swal(tittle, text, icon) {
            Swal.fire({
                title: tittle,
                text: text,
                icon: icon,
            });
        }
    </script>


</body>

</html>