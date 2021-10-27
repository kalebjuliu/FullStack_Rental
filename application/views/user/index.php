<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Rental Gaming Console</title>

    <!-- Custom fonts for this template-->

    <link href="<?= base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>assets/css/sb-admin-2.css" rel="stylesheet">

</head>

<body>

    <?= $navlinks ?>

    <div class="container mt-5 mx-auto" style="width: 1000px;">

        <?php if ($this->session->userdata('id')) { ?>
            <div class="d-flex justify-content-end cart-view">
                <a href="<?php echo base_url('cart'); ?>" title="View Cart"><i class="fas fa-shopping-cart"></i> (<?php echo ($this->cart->total_items() > 0) ? $this->cart->total_items() . ' Items' : '0'; ?>)
                </a>
            </div>
        <?php } ?>

        <div style="margin-top: 50px; font-family:'Spartan'; margin-bottom: 5rem !important">
            <h3 style="font-weight: bold; color: black;">Console Catalog</h3>
            <p>Explore console you might like to rent!</p>
        </div>


        <div class="row row-cols-3">
            <?php foreach ($products as $product) : ?>
                <div class="card col" style="max-width: 300px; margin-right: 15px; margin-bottom: 15px; border: none;">
                    <img class="card-img-top" src="<?= base_url("assets/img") . "/" . $product['image'] ?>" style="max-height: 180px; max-width: 260px;">
                    <div class="card-body">

                        <h5 class="card-title" style="font-weight: bold; font-family:'Spartan'; color: black"><?= $product['name'] ?></h5>

                        <p style="font-weight: 500; font-family:'Spartan'; color: #4e73df">Rp. <?= $product['price'] ?></p>

                        <div class="d-flex">
                            <a class="mr-2" href="<?= base_url('User/addToCart/') . $product['id'] ?>" style="border-radius: 40px; border: 2px solid #979799; color: #979799; font-weight: bold; padding: 5px 15px; font-size: 12px;">Add to cart!</a>
                            <a href="<?= base_url('User/detail/') . $product['id'] ?>" style="border-radius: 40px; border: 2px solid #979799; color: #979799; font-weight: bold; padding: 5px 20px; font-size: 12px;">Detail</a>
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>


    </div>


</body>



<?= $footer ?>