<header>
    <div class="container">
        <div class="row">
            <div class="logo_box">
                <div class="col-lg-10 col-md-8 col-sm-8 col-12 logo d-flex">
                    <div class="text_logo">
                        <a class="logo_a" href="/">Tasks list</a>
                    </div>
                    <div class="icon_logo">
                        <i class="fa fa-list-ul" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="col-lg-2 сol-md-3 col-sm-4 col-12 login_redirect">
                    <?php
                    if (isset($_SESSION['user'])) {
                        ?>
                        <div class="user d-flex">
                            <div class="user_icon">
                                <i class="fa fa-user-circle" aria-hidden="true"></i>
                            </div>
                            <div class="user_btn">
                                <a href="/users/logout" class="btn btn-primary">
                                    Logout
                                </a>
                            </div>
                        </div>
                        <?php
                    }
                    else {
                        ?>
                        <div class="login_redirect_box">
                            <a href="/users" class="btn btn-primary">
                                Login as admin
                            </a>
                        </div>
                        <?php
                    }
                     ?>
                </div>
            </div>
        </div>
    </div>
</header>
