<?= $header ?>

<?= $sidebar ?>

<div class="container-fluid">
    <table class="table">
        <tr>
            <th>ID</th>
            <th>User ID</th>
            <th>Status</th>
            <th>Action</th>
        </tr>

        <?php
        foreach ($orders as $order) :
        ?>
            <tr>
                <td class="align-middle"><?php echo $order['id']; ?></td>
                <td class="align-middle"><?php echo $order['user_id']; ?></td>
                <td class="align-middle"><?php echo $order['status']; ?></td>
                <td class="align-middle">
                    <div class="btn btn-transparent btn-sm mr-2"><?= anchor('Order_admin/delivered/' . $order['id'], '<p>Sudah Dikirim</p>') ?></div>
                    <div class="btn btn-transparent btn-sm"><?= anchor('Order_admin/done/' . $order['id'], '<p>Selesai</p>') ?></i></div>
                </td>
            </tr>

        <?php endforeach; ?>
    </table>

</div>


<?= $footer ?>