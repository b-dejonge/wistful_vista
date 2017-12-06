    <div class="col-md-10 col-sm-11 display-table-cell v-align">
        <!--<button type="button" class="slide-toggle">Slide Toggle</button> -->
        <div class="row">
            <header>
                <div class="col-md-7">
                    <nav class="navbar-default pull-left">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="offcanvas" data-target="#side-menu" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                    </nav>
                    <div class="search hidden-xs hidden-sm">
                        <input type="text" placeholder="Search" id="search">
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="header-rightside">
                        <ul class="list-inline header-top pull-right">
                            <li><a href="index.php?action=messages"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle icon-info" data-toggle="dropdown">
                                    <i class="fa fa-bell" aria-hidden="true"></i>
                                    <span class="label label-primary">
                                      <?php
                                        include_once 'model/database.php';
                                        $sql = "SELECT paymentPaid FROM payment WHERE paymentPaid = '0' AND renterID = $_SESSION[renterID]";
                                        $result1 = mysqli_query($conn, $sql);
                                        $openPayments = mysqli_num_rows($result1);
                                        $sql = "SELECT status FROM maintenance WHERE status = '0' AND renterID = $_SESSION[renterID]";
                                        $result2 = mysqli_query($conn, $sql);
                                        $openMaintenance = mysqli_num_rows($result2);
                                        $notifications = $openPayments + $openMaintenance;
                                        // echo $openPayments;
                                        // echo $openMaintenance;
                                        echo $notifications;
                                      ?>
                                    </span>
                                </a>
                                <ul class="dropdown-menu">
                                  <li><?php echo "$openPayments payment(s) due"; ?></li>
                                  <li><?php echo "$openMaintenance request(s) open"; ?></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i>
                                    <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <div class="navbar-content">
                                            <span><?php echo $_SESSION['firstName'] . " " . $_SESSION['lastName'] ?></span>
                                            <p class="text-muted small">
                                                <?php if ($_SESSION['renterID'] == 0) {
                                                  echo "Admin";
                                                } else {
                                                  echo "Apt #$_SESSION[apt]";
                                                } ?>
                                            </p>
                                            <div class="divider">
                                            </div>
                                            <a href="#" class="view btn-sm active">View Profile</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li><form action="model/logout.php" method="post"><button type="submit" name="logout-submit" class="link-button"><i class="fa fa-sign-out" aria-hidden="true"></i></button></form></li>
                        </ul>
                    </div>
                </div>
            </header>
        </div>
