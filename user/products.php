<?php
require '../db/config.php';
require '../db/session.contr.cls.php';
$dbObj = new Dbh;
$sessObj = new SessionManageCls();
if ($sessObj->isLogged() == true) {
    $user_data = $sessObj->getSessionData();
    // print_r( $user_data);
    require 'header.php';

?>
    <!-- content -->
    <style>
        @import url(https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css);
        @import url(https://fonts.googleapis.com/css?family=Raleway:400,500,700);

        .snip1418 {
            font-family: 'Raleway', Arial, sans-serif;
            position: relative;
            overflow: hidden;
            margin: 10px;
            min-width: 230px;
            max-width: 315px;
            width: 100%;
            background: #ffffff;
            text-align: left;
            color: #000000;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            -webkit-transform: translateZ(0);
            transform: translateZ(0);
            -webkit-perspective: 20em;
            perspective: 20em;
        }

        .snip1418 * {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            -webkit-transition: all 0.3s ease-out;
            transition: all 0.3s ease-out;
        }

        .snip1418 img {
            max-width: 100%;
            vertical-align: top;
            position: relative;
            height: 300px;
        }

        .snip1418 .add-to-cart {
            position: absolute;
            top: 0;
            left: 0;
            padding-right: 10px;
            color: #ffffff;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 0.9em;
            opacity: 0;
            background-color: #409ad5;
            -webkit-transform: rotateX(-90deg);
            transform: rotateX(-90deg);
            -webkit-transform-origin: 100% 0;
            -ms-transform-origin: 100% 0;
            transform-origin: 100% 0;
        }

        .snip1418 .add-to-cart i {
            display: inline-block;
            margin-right: 10px;
            width: 40px;
            line-height: 40px;
            text-align: center;
            background-color: #164666;
            color: #ffffff;
            font-size: 1.4em;
        }

        .snip1418 .add-to-wishlist {
            position: absolute;
            top: 0;
            right: 0;
            padding-right: 10px;
            color: #ffffff;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 0.9em;
            opacity: 0;
            background-color: #91c2f6;
            -webkit-transform: rotateX(-90deg);
            transform: rotateX(-90deg);
            -webkit-transform-origin: 100% 0;
            -ms-transform-origin: 100% 0;
            transform-origin: 100% 0;
        }

        .snip1418 .add-to-wishlist i {
            display: inline-block;
            margin-right: 10px;
            width: 40px;
            line-height: 40px;
            text-align: center;
            background-color: #164666;
            color: #ffffff;
            font-size: 1.4em;
        }

        .snip1418 figcaption {
            padding: 20px;
            background: whitesmoke;
        }

        .snip1418 h3,
        .snip1418 p {
            margin: 0;
        }

        .snip1418 h3 {
            font-size: 1.5em;
            font-weight: 700;
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        .snip1418 p {
            font-size: 0.9em;
            letter-spacing: 1px;
            font-weight: 400;
        }

        .snip1418 .price {
            font-weight: 500;
            font-size: 1.5em;
            line-height: 48px;
            letter-spacing: 1px;
        }

        .snip1418 .price s {
            margin-right: 5px;
            opacity: 0.5;
            font-size: 0.9em;
        }

        .snip1418 a {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
        }

        .snip1418:hover .add-to-cart,
        .snip1418.hover .add-to-cart {
            opacity: 1;
            -webkit-transform: rotateX(0deg);
            transform: rotateX(0deg);
        }

        .snip1418:hover .add-to-cart i,
        .snip1418.hover .add-to-cart i {
            background-color: #2980b9;
        }

        .snip1418:hover .add-to-wishlist,
        .snip1418.hover .add-to-wishlist {
            opacity: 1;
            -webkit-transform: rotateX(0deg);
            transform: rotateX(0deg);
        }

        .snip1418:hover .add-to-wishlist i,
        .snip1418.hover .add-to-wishlist i {
            background-color: #2980b9;
        }
    </style>

    <div class="overview">
        <div class="row mt-5">
            <div class="content mt-3">
                <button id="invokeModalBtn" style="display: none;" type="button" data-toggle="modal" data-target="#purchaseModel">Launch modal</button>
                <div class="row">
                    <?php
                    $product_data = $dbObj->connFnc()->query("SELECT `tbl_product`.`product_id`,`tbl_product`.`product_name`,`tbl_product`.`stock`,`tbl_product`.`price`,`tbl_product`.`image`,`tbl_product`.`description`,`tbl_product`.`date`,`tbl_product`.`status`,`tbl_category`.`cata_name` FROM `tbl_product` INNER JOIN `tbl_category` ON `tbl_product`.`cata_id` = `tbl_category`.`cata_id` WHERE `tbl_product`.`status` = 1;")->fetch_all(MYSQLI_ASSOC);
                    if (!empty($product_data)) {
                        // print_r($product_data);
                        foreach ($product_data as $val) {
                    ?>
                            <figure class="snip1418"><img src="../images/products/<?= $val['image'] ?>" alt="<?= $val['image'] ?>" />
                                <!-- <div class="add-to-cart"> <i class="ion-android-add"></i><span>Buy Now</span></div> -->
                                <div class="add-to-wishlist"> <i class="ion-android-add"></i><span>Add to cart</span></div>
                                <figcaption>
                                    <h3><?= $val['product_name'] ?></h3>
                                    <p><?= $val['description'] ?></p>
                                    <h6><?= $val['cata_name'] ?></h6>
                                    <div class="price">
                                        <!-- <s><//?= $val['price'] ?></s> -->
                                        ₹<?= $val['price'] ?>
                                        &nbsp;&nbsp;
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <?= "STOCK :" . $val['stock'] ?>
                                    </div>

                                </figcaption><a onclick="invokePurchaseBtn(<?= $val['product_id'] ?>)"></a></a>
                            </figure>
                    <?php
                        }
                    }
                    ?>
                </div>

            </div> <!-- .content -->
        </div>
    </div>
    <!-- content end -->

    <!-- Modal -->
    <div class="modal fade" id="purchaseModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Please Enter data</h5>
                    <button type="button" id="modalClsBtn" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" onclick="disvokePurchaseBtn()">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" id="productIdHiddenLabel">
                        <label for="exampleFormControlInput1">Enter Qty</label>
                        <input type="number" class="form-control" id="purchaseQtyInp" placeholder="QTY">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="finalSbtBtn" type="button" onclick="invokeCartFnc()" class="btn btn-primary">Add to cart</button>

                </div>
            </div>
        </div>
    </div>
<?php
    require 'footer.php';
} else {
    header("Location:../user-login.php");
}
?>

<script>
    function invokeCartFnc() {
        qty = $("#purchaseQtyInp").val();
        productId = $("#productIdHiddenLabel").val();
        userlog_id = <?= $user_data['log_id'] ?>;
        if (qty > 0 && qty <= 10) {
            if (productId != '' && productId != null && userlog_id != null) {
                $("#finalSbtBtn").attr('disabled', 'disabled');
                $.ajax({
                    type: "POST",
                    url: "../api/user_api.php",
                    data: {
                        "userlog_id": userlog_id,
                        "productId": productId,
                        "qty": qty,
                        'action': 10,
                    },
                    dataType: 'JSON',
                    cache: false,
                    success: function(response) {
                        $("#finalSbtBtn").removeAttr('disabled', 'disabled');
                        if (response.status == 1) {
                            $("#modalClsBtn").trigger('click');
                            swal("success", "product added to cart", "success");
                        } else {
                            swal("error", response.msg, "error");
                        }
                    }
                });
            } else {
                swal("error", "please select a visit date.", "error");
            }
        } else {

            swal("error", "Maximum Allowed quantity is 10 and minimum 1", "error");
        }

    }

    function invokePurchaseBtn(productId) {
        // modal-open
        $("#productIdHiddenLabel").val(productId);
        $("#invokeModalBtn").trigger("click");
    }

    function swal(tittle, text, icon) {
        Swal.fire({
            title: tittle,
            text: text,
            icon: icon,
        });
    }
</script>