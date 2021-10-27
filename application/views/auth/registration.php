<?= $header ?>


<body style="background: white;">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 style="font-family: 'Spartan'" class="h4 text-gray-900 mb-5">Register Here!</h1>
                            </div>
                            <form class="user" method="POST" action="<?= base_url('auth/registration') ?>">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="first_name" name="first_name" placeholder="First Name" value="<?= set_value('first_name') ?>">
                                        <small class="text-danger"><?= form_error('first_name'); ?></small>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="last_name" name="last_name" placeholder="Last Name" value="<?= set_value('last_name') ?>">
                                        <small class="text-danger"><?= form_error('last_name'); ?></small>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email Address" value="<?= set_value('email') ?>">
                                    <small class="text-danger"><?= form_error('email'); ?></small>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="address" name="address" placeholder="Address" value="<?= set_value('address') ?>">
                                    <small class="text-danger"><?= form_error('address'); ?></small>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="phone_number" name="phone_number" placeholder="Phone Number" value="<?= set_value('phone_number') ?>">
                                    <small class="text-danger"><?= form_error('phone_number'); ?></small>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                        <small class="text-danger"><?= form_error('password'); ?></small>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" id="repeat_password" name="repeat_password" placeholder="Repeat Password">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="<?= base_url("auth") ?>">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <? $footer ?>