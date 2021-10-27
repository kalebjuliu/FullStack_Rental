<?= $header ?>

<div class="container-fluid">
    <h1>CHECKOUT</h1>
    <div class="checkout">
        <div class="row">
            <?php if (!empty($error_msg)) { ?>
                <div class="col-md-12">
                    <div class="alert alert-danger"><?php echo $error_msg; ?></div>
                </div>
            <?php } ?>

            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Your Cart</span>
                    <span class="badge badge-secondary badge-pill"><?php echo $this->cart->total_items(); ?></span>
                </h4>
                <ul class="list-group mb-3">
                    <?php if ($this->cart->total_items() > 0) {
                        foreach ($cartItems as $item) { ?>
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <?php $imageURL = !empty($item["image"]) ? base_url('assets/img/' . $item["image"]) : base_url('assets/images/pro-demo-img.jpeg'); ?>
                                    <img src="<?php echo $imageURL; ?>" width="75" />
                                    <h6 class="my-0"><?php echo $item["name"]; ?></h6>
                                    <small class="text-muted"><?php echo '$' . $item["price"]; ?>(<?php echo $item["qty"]; ?>)</small>
                                </div>
                                <span class="text-muted"><?php echo '$' . $item["subtotal"]; ?></span>
                            </li>
                        <?php }
                    } else { ?>
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <p>No items in your cart...</p>
                        </li>
                    <?php } ?>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (USD)</span>
                        <strong><?php echo '$' . $this->cart->total(); ?></strong>
                    </li>
                </ul>
                <a href="<?php echo base_url('products/'); ?>" class="btn btn-block btn-info">Add Items</a>
            </div>
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Contact Details</h4>
                <form method="post">
                    <input class="btn btn-success btn-lg btn-block" type="submit" name="placeOrder" value="Place Order">
                </form>
            </div>
        </div>
    </div>


</div>



<?= $footer ?>