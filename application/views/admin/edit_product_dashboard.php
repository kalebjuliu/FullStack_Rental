<?= $header ?>

<?= $sidebar ?>


<div class="container-fluid">

    <h3>Edit Product</h3>

    <?php foreach ($product as $prod) : ?>
        <form action="<?= base_url('Product_admin/update_product') ?>" method="POST" enctype="multipart/form-data">


            <div class="form-group">
                <input type="hidden" class="form-control form-control-user" id="name" name="id" value="<?= $prod->id ?>">
            </div>
            <div class="form-group">
                <input type="hidden" class="form-control form-control-user" id="image_name" name="image_name" value="<?= $prod->image ?>">
            </div>

            <div class="form-group">
                <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Product Name" value="<?= $prod->name ?>">
                <small class="text-danger"><?= form_error('name'); ?></small>
            </div>

            <div class="form-group">
                <input type="number" class="form-control form-control-user" id="qty" name="qty" placeholder="Quantity" value="<?= $prod->qty ?>">
                <small class="text-danger"><?= form_error('qty'); ?></small>
            </div>

            <div class="form-group">
                <input type="number" class="form-control form-control-user" id="price" name="price" placeholder="Price" value="<?= $prod->price ?>">
                <small class="text-danger"><?= form_error('price'); ?></small>
            </div>

            <div class="form-group">
                <textarea class="form-control form-control-user" id="description" name="description"><?= $prod->description ?></textarea>
                <small class="text-danger"><?= form_error('description'); ?></small>
            </div>



            <div class="form-group">
                <img src="<?= base_url("assets/img/") . $prod->image ?>" alt="" class="img-thumbnail" style="max-width: 200px; max-height: 200px;">
                <input type="file" class="form-control form-control-user" id="image" name="image" placeholder="Image">
                <small class="text-danger"><?= form_error('image'); ?></small>
            </div>


            <button type="submit" class="btn btn-primary btn-user btn-block">
                Update Product
            </button>
        </form>
    <?php endforeach; ?>
</div>


<?= $footer ?>