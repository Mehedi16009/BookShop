<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href=".">Mehedi Bookstore</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

                    <li>
                        <a href="index.php">Shop</a>
                    </li>
                    <?php if(!$user->logged_in()) { ?>
                    <li>
                        <a href="login.php">Login</a>
                    </li>
                    <?php } ?>
                    <li>
                        <a href="admin/index.php">Admin</a>
                    </li>
                     <li>
                        <a href="checkout.php">Checkout</a>
                    </li>
                    <li>
                        <a href="contact.php">Contact</a>
                    </li>
                   <?php if(Session::get('userlogin') == true || isset($_COOKIE['email'])) { ?>
                    <li>
                        <a href="logout.php">Logout</a>
                    </li>
                   <?php } ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>