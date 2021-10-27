<div class="d-flex flex-row justify-content-around mt-5">
    <div class="navbar-name">
        <a href="<?= base_url('user') ?>">
            <img src="<?= base_url('assets/img/logo.png') ?>" alt="">
        </a>
    </div>
    <div class="navbar-links">
        <ul class="links d-flex" style="list-style: none; font-size: 13px; font-weight: 500; font-family: 'Spartan'">
            <?php if ($this->session->userdata('id')) { ?>
                <li><a href="<?= base_url('checkout/myOrder') ?>">
                        <p class="mr-4" style="color: #979799;">My Orders</p>
                    </a></li>
                <li><a href="<?= base_url("cart") ?>">
                        <p class="mr-4" style="color: #979799;">Shopping Cart</p>
                    </a></li>
            <?php } ?>

            <?php if (!$this->session->userdata('id')) { ?>
                <li><a href="<?= base_url("auth/registration") ?>">
                        <p class="mr-4" style="color: #979799;">Register</p>
                    </a></li>
                <li><a href="<?= base_url("auth") ?>">
                        <p style="color: #979799;">Login</p>
                    </a></li>
            <?php } ?>

            <?php if ($this->session->userdata('id')) { ?>
                <li><a class="dropdown-item" href=<?= base_url('auth/logout') ?>><i class="fas fa-sign-out-alt mr-2 text-gray-400"></i></a></li>
            <?php } ?>
        </ul>
    </div>
</div>