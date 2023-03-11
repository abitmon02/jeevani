<?php
include_once('../config.php');
if (isset($_POST)) {
    if ($_POST['action'] == 1) {
        // enable or disable status;
        $cataName = filter_var($_POST['cataName'], FILTER_DEFAULT);
        if (is_string($cataName)) {
            $cata_data = $con->query("SELECT * FROM `tbl_category` WHERE `tbl_category`.`cata_name` = '$cataName'")->fetch_assoc();
            if (empty($cata_data)) {
                if ($con->query("INSERT INTO `tbl_category`(`cata_name`, `date`, `status`) VALUES ('$cataName',now(),1)")) {
                    $return_data = ['status' => 1, 'msg' => "Created Successfully."];
                } else {
                    $return_data = ['status' => 0, 'msg' => "Sql Error", 'error_code' => 2];
                }
            } else {
                $return_data = ['status' => 0, 'msg' => "Category name already exists", 'error_code' => 1];
            }
        } else {
            $return_data = ['status' => 0, 'msg' => "Value Manipulation Found", 'error_code' => 0];
        }
        echo json_encode($return_data);
    } else if ($_POST['action'] == 2) {
        $cata_code = filter_var($_POST['cata_code'], FILTER_DEFAULT);
        $product_name = filter_var($_POST['product_name'], FILTER_DEFAULT);
        $stock = filter_var($_POST['stock'], FILTER_DEFAULT);
        $price_inp = filter_var($_POST['price_inp'], FILTER_DEFAULT);
        $desc_inp = filter_var($_POST['desc_inp'], FILTER_DEFAULT);
        $image = $_FILES['file'];

        $target_dir = "../images/products/";
        $target_file = $target_dir . basename($image["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($image["tmp_name"]);
            if ($check !== false) {

                $uploadOk = 1;
            } else {

                $return_data = ['status' => 0, 'msg' => "File is not an image.", 'error_code' => 2];
            }
        }

        // Check if file already exists
        if (file_exists($target_file)) {

            $return_data = ['status' => 0, 'msg' => "Sorry, file already exists.", 'error_code' => 2];
        }

        // Check file size
        if ($image["size"] > 500000) {

            $return_data = ['status' => 0, 'msg' => "Sorry, your file is too large.", 'error_code' => 2];
        }

        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            $return_data = ['status' => 0, 'msg' => "Sorry, only JPG, JPEG, PNG & GIF files are allowed.", 'error_code' => 2];
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo json_encode($return_data);
        } else {
            if (move_uploaded_file($image["tmp_name"], $target_file)) {
                if ($con->query("INSERT INTO `tbl_product`(`cata_id`, `product_name`, `stock`, `price`, `image`, `description`, `date`, `status`) VALUES ('$cata_code','$product_name','$stock','$price_inp','" . basename($image["name"] . "','$desc_inp',now(),1)"))) {
                    $return_data = ['status' => 1, 'msg' => "Product added successflly"];
                } else {
                    $return_data = ['status' => 0, 'msg' => "Sql Error", 'error_code' => 2];
                }
            } else {
                $return_data = ['status' => 0, 'msg' => "Sorry, there was an error uploading your file.", 'error_code' => 2];
            }
            echo json_encode($return_data);
        }
    } elseif ($_POST['action'] == 3) {
        $product_id = filter_var($_POST['product_id'], FILTER_DEFAULT);
        if (!empty($con->query("SELECT * FROM `tbl_product` WHERE `tbl_product`.`product_id` = '$product_id'")->fetch_assoc())) {
            if ($con->query("DELETE FROM `tbl_product` WHERE `tbl_product`.`product_id` = '$product_id'")) {
                $return_data = ['status' => 1, 'msg' => "Product Deleted successfully"];
            } else {
                $return_data = ['status' => 0, 'msg' => "Sql Error", 'error_code' => 2];
            }
        } else {
            $return_data = ['status' => 0, 'msg' => "Unauthorized request", 'error_code' => 2];
        }
        echo json_encode($return_data);
    } elseif ($_POST['action'] == 4) {
        $cata_id = filter_var($_POST['cata_id'], FILTER_DEFAULT);
        if (!empty($con->query("SELECT * FROM `tbl_category` WHERE `tbl_category`.`cata_id` = '$cata_id'")->fetch_assoc())) {
            if ($con->query("DELETE FROM `tbl_category` WHERE `tbl_category`.`cata_id` = '$cata_id'")) {
                $return_data = ['status' => 1, 'msg' => "Category Deleted successfully"];
            } else {
                $return_data = ['status' => 0, 'msg' => "Sql Error", 'error_code' => 2];
            }
        } else {
            $return_data = ['status' => 0, 'msg' => "Unauthorized request", 'error_code' => 2];
        }
        echo json_encode($return_data);
    } else if ($_POST['action'] == 5) {
        $newStock = filter_var($_POST['newStock'], FILTER_DEFAULT);
        $product_id = filter_var($_POST['product_id'], FILTER_DEFAULT);
        $product_data = $con->query("SELECT * FROM `tbl_product` WHERE `tbl_product`.`product_id` = '$product_id'")->fetch_assoc();
        if (!empty($product_data) ) {
            // if (!empty($product_data) && $product_data['stock'] < $newStock) {
            if ($con->query("UPDATE `tbl_product` SET `stock`='$newStock' WHERE `tbl_product`.`product_id` = '$product_id';")) {
                $return_data = ['status' => 1, 'msg' => "Product stock updated successfully"];
            } else {
                $return_data = ['status' => 0, 'msg' => "Sql Error", 'error_code' => 2];
            }
        } else {
            $return_data = ['status' => 0, 'msg' => "Stock not updated. no changes!", 'error_code' => 2];
        }
        echo json_encode($return_data);
    } else if ($_POST['action'] == 6) {
        $cata_id = filter_var($_POST['cata_id'], FILTER_DEFAULT);
        $status = $con->query("SELECT  `status` FROM `tbl_category` WHERE `tbl_category`.`cata_id` = '$cata_id'")->fetch_assoc()['status']  == 0 ? 1 : 0;
        if ($con->query("UPDATE `tbl_category` SET `tbl_category`.`status` = '$status' WHERE `tbl_category`.`cata_id` = '$cata_id';")) {
            $return_data = ['status' => 1, 'msg' => "Category status updated"];
        } else {
            $return_data = ['status' => 0, 'msg' => "Sql Error", 'error_code' => 2];
        }
        echo json_encode($return_data);
    } else if ($_POST['action'] == 7) {
        $product_id = filter_var($_POST['product_id'], FILTER_DEFAULT);
        $status = $con->query("SELECT `status` FROM `tbl_product` WHERE `tbl_product`.`product_id` = '$product_id'")->fetch_assoc()['status']  == 0 ? 1 : 0;
        if ($con->query("UPDATE `tbl_product` SET `tbl_product`.`status` = '$status' WHERE `tbl_product`.`product_id` = '$product_id';")) {
            $return_data = ['status' => 1, 'msg' => "Category status updated"];
        } else {
            $return_data = ['status' => 0, 'msg' => "Sql Error", 'error_code' => 2];
        }
        echo json_encode($return_data);
    }
}
