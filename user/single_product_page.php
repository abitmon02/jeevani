<?php
require '../db/config.php';
require '../db/session.contr.cls.php';
$dbObj = new Dbh;
$sessObj = new SessionManageCls();
if ($sessObj->isLogged() == true) {
    $user_data = $sessObj->getSessionData();
    require 'header.php';
?>
    <!-- <button  id="pdfButton" ><b>Print</b></button> -->
    <style>
        .container {
            position: relative;
            min-width: 250px;
            max-width: 1200px;
            min-height: 1000px;
            margin: 1em 1em 0;
            border: 1px solid #eee;
            border-radius: .3em;
            overflow: hidden;
            background: #fff;
            box-shadow: 0px 10px 20px 3px rgba(30, 30, 30, .45);
        }

        .products-main--active {
            background: linear-gradient(to right top, rgb(30, 30, 30), rgb(17, 19, 117));
        }

        /*===========
   Product
=============*/

        .product {
            display: flex;
            flex-flow: column;
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            border-radius: inherit;
        }

        /*=============
 Product Image
===============*/

        .product__img {
            display: flex;
            justify-content: center;
            align-items: center;
            flex: 1 1 0%;
            border-top-right-radius: inherit;
            border-top-left-radius: inherit;
            overflow: hidden;
        }

        .product__img img {
            width: 60%;
            height: 60%;
            position: inherit;
            /* //border-top-right-radius: inherit; */
            /* //border-top-left-radius: inherit; */
        }

        /*=============
 Product Body
===============*/

        .product__body {
            display: flex;
            flex-flow: column;
            flex: 1 1 0%;
        }

        /*===================
  Product Thumbnails
=====================*/

        .product__thumbnails {
            display: flex;
            flex: 0 1 35%;
            justify-content: stretch;
            align-items: stretch;
        }

        .product__thumbnail {
            position: relative;
            display: flex;
            width: 100%;
        }

        .product__thumbnail--active {
            filter: opacity(.2);
            pointer-events: none;
        }

        .product__thumbnail--active::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            width: 100%;
            box-shadow: 2px -2px 5px rgba(30, 30, 30, .2) inset;
        }

        /*===================
 Product Description
=====================*/

        .product__description {
            display: flex;
            flex-direction: column;
            justify-content: center;
            flex: 1 1 85%;
            font-size: .8em;
            padding: 0 .5em 0 2em;
        }

        .product__title {
            font-weight: 500;
            font-size: 2em;
            margin-bottom: 0;
        }

        .product__description-text {
            font-size: 1.1em;
            line-height: 1.7;
            color: rgb(111, 110, 136);
        }

        /*===========
   Options
=============*/

        .options {
            display: flex;
            flex: 1 1 15%;
            font-size: 1.7rem;
            border-top: 2px solid #ddd;
            color: rgb(132, 131, 162);
        }

        .options__icons {
            display: flex;
            justify-content: space-around;
            align-items: center;
            flex: 0 1 60%;
        }


        .options__link {
            text-decoration: none;
        }

        .options__link I {
            vertical-align: middle;
        }

        /*============
  Navigation
==============*/

        .navigation {
            display: flex;
            flex: 1 1 10%;
            justify-content: flex-end;
        }

        .navigation__prev-btn {
            align-self: center;
            margin-right: 2rem;
            font-size: 2.5rem;
            padding-top: 0;
            padding-bottom: 0;
            border: none;
            background: transparent;
            color: #888;
            cursor: pointer;
            outline: none;
            -webkit-tap-highlight-color: transparent;
        }



        /*===========
   PRODUCTS
=============*/

        .products {
            position: absolute;
            display: flex;
            flex-flow: column;
            justify-content: center;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background: inherit;
            border-radius: inherit;
            opacity: 0;
            z-index: -1;
            transition: opacity .3s ease-in-out;
            overflow: hidden;
        }

        .products--active {
            position: relative;
            z-index: 1;
            opacity: 1;
            overflow: visible;
        }

        .products-main--active .product {
            z-index: -1;
            opacity: 0;
        }


        /*Products Header*/
        .products__header {
            color: #fff;
            /* //background: pink; */
        }

        .products__title {
            font-size: 2em;
            margin-bottom: 1.7em;
            font-weight: 400;
        }


        /*Products Body*/
        .products__body {
            flex: 0 1 auto;
            display: flex;
            justify-content: center;
        }


        /*Products List*/
        .products__list {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 0;
            list-style: none;
        }

        .products__list-item {
            display: flex;
            flex-direction: column;
            max-width: 100%;
            margin: 1em 1em 0;
            padding: 1.3em 0 1.3em 2em;
            border-radius: .5em;
            background: #fff;
            box-shadow: 0 5px 10px rgba(50, 50, 50, .5);
            overflow: hidden;
            transform: translateX(50%);
            opacity: 0;
            transition: transform .6s ease-in-out, opacity .65s ease-in-out;
        }

        .products-list--active .products__list-item {
            transform: translateX(0%);
            opacity: 1;
        }

        .products__link {
            text-decoration: none;
        }

        /*Product Data*/
        .product-data {
            flex: 1 1 30%;
            color: rgb(132, 131, 162);
            font-weight: 400;
        }

        .product-data__name {
            margin-top: .2em;
            font-weight: inherit;
        }

        .product-data__image {}

        .product-data__image IMG {
            border-radius: 2em 0 0 2em;
        }


        /*======================
  Splash Circle Effect
========================*/
        .splash-circle {
            position: absolute;
            border-radius: 50%;
            background: rgba(250, 250, 250, .9);
            border: 2px solid rgba(38, 50, 56, 0.4);
            transform: scale(0);
            pointer-events: none;
        }

        .splash-circle.active {
            transform: scale(3);
            opacity: 0;
            transition: transform .5s, opacity .6s;
            transition-timing-function: ease-in-out;
        }

        .nav-btn--splash {
            line-height: .5;
            padding: 0;
            -webkit-tap-highlight-color: none;
        }

        .btn--icon__symbol {
            pointer-events: none;
        }



        .img-splash-animation {
            animation: grow-and-fade .4s .6s ease-in-out 1 forwards;
            z-index: 99;
        }

        .img-splash-animation--reverse {
            animation: grow-and-fade .4s .2s ease-in-out 1 backwards;
            animation-direction: reverse;
            z-index: 99;
        }


        /* @Media Queries */

        @media screen and (min-width: 700px) {

            .container {
                margin: 1em 1em 0;
            }

            .product__body {
                border-radius: inherit;
            }

            .product__thumbnails {
                border-top-right-radius: inherit;
                overflow: hidden;
            }

            .product__description {
                /* //font-size: .8em; */
                padding: 0 5em 0 2em;
            }

            .product__description {
                font-size: 1rem;
                flex: 1 1 70%;
                padding: 0 14em 0 2em;
            }

            .options__icons {
                display: flex;
                justify-content: space-around;
                align-items: center;
                flex: 0 1 30%;
            }

            /*Products Main Page*/
            .products {
                position: absolute;
            }

            .products--active {
                padding-left: 10em;
            }

            .products__body {
                display: block;
            }

            .products__list {
                flex-direction: row;
                align-items: stretch;
            }

            .products__list-item {
                margin: 0 0 0 .3em;
                max-width: 200px;
            }


        }

        @media screen and (min-width: 1000px) {

            .container {
                min-height: 400px;
                margin: 1em auto 0;
            }

            .product {
                flex-flow: row;
            }

            .product__img {
                border-radius: 0;
            }

            .product__img IMG {
                border-radius: .3em 0 0 .3em;
            }

        }



        /* @ANIMATIONS */

        @keyframes grow-and-fade {

            0% {
                transform: scale(1);
                opacity: 1;
            }

            20% {
                transform: scale(1.5);
                opacity: .3;
            }

            40% {
                transform: scale(2);
                opacity: .5;
            }


            60% {
                position: fixed;
                transform: scale(2.2);
                opacity: .4;
            }


            80% {
                position: fixed;
                transform: scale(2.5);
                opacity: .2;
            }

            100% {
                position: fixed;
                transform: scale(3);
                opacity: 0;
            }

        }
    </style>




    <!-- Page Content -->
    <div class="overview" id="generatePDF">
        <div class="row m-2">
            <div class="col-lg-12">
                <h2 style="color: #9f8e64;margin-top: 10px;">Product Detail</h2>

            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <?php
                if (isset($_GET['p_code']) && $_GET['p_code'] != null) {
                    $data = $dbObj->connFnc()->query('SELECT * FROM `tbl_product` WHERE `tbl_product`.`product_id` =  "' . $_GET['p_code'] . '"')->fetch_assoc();
                    if (!empty($data)) {

                ?>
                        <section class="container">

                            <div class="product">

                                <figure class="product__img">
                                    <img style="position: inherit;" src="../images/products/<?= $data['image'] ?>" class="js-product-img" />
                                </figure>

                                <div class="product__body">

                                    <div class="product__description">
                                        <h2 class="product__title mb-2"><?= $data['product_name'] ?></h2>
                                        <p class="product__description-text">
                                            <?= $data['description'] ?>
                                        </p>
                                        <h5 class="mb-2"><b>₹<?= $data['price'] ?></b></h5>
                                        <h6>Stock : <?= $data['stock'] ?></h6>
                                    </div>

                                    <div class="options">
                                        <div class="options__icons">
                                            <button class="btn btn-primary" onclick="invokePurchaseBtn(<?= $data['product_id'] ?>)">ADD TO CART</button>

                                        </div>
                                        <nav class="navigation">
                                            <button class="navigation__prev-btn nav-btn--splash js-splash-btn">
                                                <span class="btn--icon__symbol">&rarr;</span>
                                            </button>
                                        </nav>
                                    </div>
                                </div>

                            </div>



                            <section>
                            <?php
                        } else { ?>
                                <label for="">No product found.</label>
                        <?php
                        }
                    }
                        ?>
            </div>

        </div>
        <button id="invokeModalBtn" style="display: none;" type="button" data-toggle="modal" data-target="#purchaseModel">Launch modal</button>
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
    <?php
    require 'footer.php';
} else {
    header("Location:../user-login.php");
}
    ?>