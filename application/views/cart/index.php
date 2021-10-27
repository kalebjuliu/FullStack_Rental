<?= $header ?>


<div class="container-fluid">

    <?= $navlinks ?>

    <div class="mt-5">
        <h4 class="mt-3 mb-3" style="font-family:'Spartan'; font-weight: bold;">Shopping Cart</h4>
        <table class="table">
            <thead>
                <tr>
                    <th width="10%"></th>
                    <th width="30%">Product</th>
                    <th width="15%">Price</th>
                    <th width="20%" class="text-right">Subtotal</th>
                    <th width="12%"></th>
                </tr>
            </thead>
            <tbody>
                <?php if ($this->cart->total_items() > 0) {
                    foreach ($cartItems as $item) {    ?>
                        <tr>
                            <td>
                                <?php $imageURL = !empty($item["image"]) ? base_url('assets/img/' . $item["image"]) : base_url('assets/images/pro-demo-img.jpeg'); ?>
                                <img src="<?php echo $imageURL; ?>" width="50" />
                            </td>
                            <td><?php echo $item["name"]; ?></td>
                            <td><?php echo 'Rp. ' . $item["price"]; ?></td>
                            <td class="text-right"><?php echo 'Rp. ' . $item["subtotal"]; ?></td>
                            <td class="text-right">
                                <button class="btn btn-sm btn-primary" onclick="return confirm('Are you sure to delete item?')?window.location.href='<?php echo base_url('cart/removeItem/' . $item["rowid"]); ?>':false;"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    <?php }
                } else { ?>
                    <tr>
                        <td colspan="6">
                            <p>Your cart is empty! Shop some first</p>
                        </td>
                    <?php } ?>
                    <?php if ($this->cart->total_items() > 0) { ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><strong>Cart Total</strong></td>
                        <td class="text-right"><strong><?php echo 'Rp. ' . $this->cart->total() ?></strong></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <div class="d-flex">
            <div class="mr-3">
                <a href="<?= base_url("user") ?>" class="btn btn-primary ">Continue Shopping</a>
            </div>
            <div>
                <?php if ($this->cart->total_items() > 0) { ?>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Checkout
                    </button>
                <?php } ?>
            </div>
        </div>

    </div>



</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Order Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('checkout') ?>" method="POST">
                    <div class="form-group">
                        <label for="day">Rental Duration (Days)</label>
                        <input type="number" class="form-control form-control-user" id="day" name="day" placeholder="1">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Confirm</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $footer ?>