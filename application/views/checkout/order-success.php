<?= $header ?>

<div class="container-fluid">
    <?= $navlinks ?>


    <div class="mt-5">
        <h4 class="mt-3 mb-3" style="font-family:'Spartan'; font-weight: bold;">Order Status</h4>
        <?php if (!empty($order)) { ?>

            <!-- Order items -->
            <div class="row col-lg-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Product</th>
                            <th>Duration</th>
                            <th>QTY</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!empty($order['items'])) {
                            foreach ($order['items'] as $item) {
                        ?>
                                <tr>
                                    <td>
                                        <?php $imageURL = !empty($item["image"]) ? base_url('assets/img/' . $item["image"]) : base_url('assets/images/pro-demo-img.jpeg'); ?>
                                        <img src="<?php echo $imageURL; ?>" width="75" />
                                    </td>
                                    <td><?php echo $item["name"]; ?></td>
                                    <td><?= $order['duration'] ?> Days</td>
                                    <td><?php echo $item["quantity"]; ?></td>
                                    <td><?php echo $order["status"]; ?></td>
                                    <td><a href="<?= base_url('checkout/changeStatus/') . $ordID ?>"><?php
                                                                                                        if ($order["status"] == 'Siap di Pick-up' || $order["status"] == 'Selesai' || $order["status"] == 'Sedang Dikirim') {
                                                                                                            echo "<button class='btn btn-primary' disabled>Siap di Pick-up</button>";
                                                                                                        } else {
                                                                                                            echo "<button class='btn btn-primary'>Siap di Pick-up</button>";
                                                                                                        }
                                                                                                        ?></a></td>
                                </tr>
                        <?php }
                        } ?>
                    </tbody>
                </table>
            </div>
        <?php } else { ?>
            <div class="col-md-12">
                <div class="alert alert-danger">Your order submission failed.</div>
            </div>
        <?php } ?>
    </div>

</div>



<?= $footer ?>