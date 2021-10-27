<?= $header ?>

<?= $sidebar ?>


<div class="container-fluid">

    <div class="d-flex justify-content-between">
        <h4>Products Table</h4>
        <button type="button" class="btn mb-3" data-toggle="modal" data-target="#tambah_product" style="background: #1f8bff; color: white">
            Add New Product
        </button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="tambah_product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('Product_admin/add_product') ?>" method="POST" enctype="multipart/form-data">

                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Product Name" value="<?= set_value('name') ?>">
                            <small class="text-danger"><?= form_error('name'); ?></small>
                        </div>

                        <div class="form-group">
                            <input type="number" class="form-control form-control-user" id="qty" name="qty" placeholder="Quantity" value="<?= set_value('qty') ?>">
                            <small class="text-danger"><?= form_error('qty'); ?></small>
                        </div>

                        <div class="form-group">
                            <input type="number" class="form-control form-control-user" id="price" name="price" placeholder="Price" value="<?= set_value('price') ?>">
                            <small class="text-danger"><?= form_error('price'); ?></small>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="description" name="description" placeholder="Description" value="<?= set_value('description') ?>">
                            <small class="text-danger"><?= form_error('description'); ?></small>
                        </div>

                        <div class="form-group">
                            <input type="file" class="form-control form-control-user" id="image" name="image" placeholder="Image">
                            <small class="text-danger"><?= form_error('image'); ?></small>
                        </div>


                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Add New Product
                        </button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Description</th>
            <th>Preview</th>
            <th>Action</th>
        </tr>

        <?php
        foreach ($products as $product) :
        ?>
            <tr>
                <td class="align-middle"><?php echo $product['id'] ?></td>
                <td class="align-middle"><?php echo $product['name'] ?></td>
                <td class="align-middle"><?php echo $product['qty'] ?></td>
                <td class="align-middle"><?php echo $product['price'] ?></td>
                <td class="align-middle" style="width: 16%"><?php echo $product['description'] ?></td>
                <td><img src="<?php echo base_url() . "assets/img/" . $product['image'] ?>" alt="" class="img-thumbnail img-responsive center-block d-block mx-auto" style="max-width: 200px; max-height: 200px;"></td>
                <td class="align-middle">
                    <div class="btn btn-transparent btn-sm mr-2"><?= anchor('Product_admin/edit_product/' . $product['id'], '<i class="fas fa-edit"></i>') ?></div>
                    <div class="btn btn-transparent btn-sm"><?= anchor('Product_admin/delete_product/' . $product['id'], '<i class="fas fa-trash">') ?></i></div>
                </td>
            </tr>

        <?php endforeach; ?>
    </table>
</div>


<?= $footer ?>