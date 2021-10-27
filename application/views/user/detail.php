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
    <div class="container-fluid mt-5" style="max-width: 80%; font-family: 'Spartan'">

        <?= $navlinks ?>

        <?php foreach ($product as $i) : ?>
            <div style="margin-top: 150px;" class="d-flex" ">
                <div class=" img">
                <img style="max-height: 250px;" src="<?= base_url("assets/img") . "/" . $i['image'] ?>" alt="">
            </div>
            <div style="font-family: 'Spartan';" class="desc">
                <h1 style="font-weight: bold; color: #4e73df""><?= $i['name']; ?></h1>
                <h5>Rp. <?= $i['price']; ?></h5>
                <p style=" line-height: 25px; text-align: justify;" class="mt-3"><?= $i['description']; ?></p>

                    <a class="mt-5" href="<?= base_url('User/addToCart/') . $i['id'] ?>" style="border-radius: 40px; border: 2px solid #979799; color: #979799; font-weight: bold; padding: 12px; font-size: 14px;">Add to cart!</a>
            </div>
    </div>



<?php endforeach; ?>

</div>




</body>



<?= $footer ?>