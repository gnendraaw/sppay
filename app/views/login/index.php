<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-8">
                <?php Flasher::flash(); ?>

                <div class="card o-hidden border-0 shadow-lg my-3">
                    <div class="card-body p-0">
                        <div class="col">
                            <div class="p-5">
                                <div class="text-center">
                                    <h4 class="text-grey-800 mb-4">Selamat Datang!</h4>
                                </div>
                                <div class="user">
                                    <form action="<?=BASE_URL?>/login/sign" class="user" method="post">
                                        <div class="form-group">
                                            <input type="text" name="username" id="login-username-input" class="form-control form-control-user" required maxlength="32" placeholder="Username. . ." autofocus>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" id="login-Password-input" class="form-control form-control-user" required maxlength="32" placeholder="Password. . .">
                                        </div>
                                        <input type="submit" class="btn btn-primary btn-user btn-block" value="Login">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>