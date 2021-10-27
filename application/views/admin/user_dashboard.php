<?= $header ?>

<?= $sidebar ?>

<div class="container-fluid">

    <div class="d-flex justify-content-between">
        <h4 class="mb-4">Users Table</h4>
    </div>

    <table class="table">
        <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Address</th>
            <th>Phone Number</th>
        </tr>

        <?php
        $num = 1;
        foreach ($users as $user) :
        ?>
            <tr>
                <td><?php echo $num++ ?></td>
                <td><?php echo $user['first_name'] ?></td>
                <td><?php echo $user['last_name'] ?></td>
                <td><?php echo $user['address'] ?></td>
                <td><?php echo $user['phone_number'] ?></td>
            </tr>

        <?php endforeach; ?>
    </table>
</div>



<?= $footer ?>