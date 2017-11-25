<?php include 'views/header.php'; ?>

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
<link rel="stylesheet" href="css/dashboard.css">

<body class="home">
    <div class="container-fluid display-table">
        <div class="row display-table-row">
            <div class="col-md-2 col-sm-1 hidden-xs display-table-cell v-align box" id="navigation">
                <div class="logo">
                    <a href="index.php?action=homepage"><img src="views/images/logo-white.png" alt="logo" class="hidden-xs hidden-sm"></a>
                </div>
                <div class="navi">
                    <ul>
                        <li class="active"><a href="index.php?action=dashboard"><i class="fa fa-home" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Dashboard</span></a></li>
                        <li><a href="index.php?action=payments"><i class="fa fa-usd" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Payments</span></a></li>
                        <li><a href="index.php?action=maintenance"><i class="fa fa-support" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Maintenance</span></a></li>
                    </ul>
                </div>
            </div>
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
                                    <li class="hidden-xs"><a href="#" class="add-project" data-toggle="modal" data-target="#add_project"><i class="fa fa-plus" aria-hidden="true"></i>Add Project</a></li>
                                    <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
                                    <li>
                                        <a href="#" class="icon-info">
                                            <i class="fa fa-bell" aria-hidden="true"></i>
                                            <span class="label label-primary">2</span>
                                        </a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i>
                                            <b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <div class="navbar-content">
                                                    <span><?php echo $_SESSION['firstName'] . " " . $_SESSION['lastName'] ?></span>
                                                    <p class="text-muted small">
                                                        Admin
                                                    </p>
                                                    <div class="divider">
                                                    </div>
                                                    <a href="#" class="view btn-sm active">View Profile</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><form action="includes/logout.php" method="post"><button type="submit" name="logout-submit" class="link-button"><i class="fa fa-sign-out" aria-hidden="true"></i></button></li>
                                </ul>
                            </div>
                        </div>
                    </header>
                </div>
                <div class="user-dashboard">
                    <h1>Hello, <?php echo $_SESSION['firstName'] ?></h1>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12 gutter">

                            <div class="sales">
                                <h2>Payments</h2>

                                <div class="btn-group">
                                    <button class="btn btn-secondary btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span>Period:</span> Last Year
                                    </button>
                                    <div class="dropdown-menu">
                                        <a href="#">2012</a>
                                        <a href="#">2014</a>
                                        <a href="#">2015</a>
                                        <a href="#">2016</a>
                                    </div>
                                </div>
                                <div class='payment_container'>
                                  <div class='row col-md-12 custyle'>
                                  <table class='table table-striped custab'>
                                  <thead>
                                      <tr>
                                          <th>ID</th>
                                          <?php if ($_SESSION['renterID'] == 0) {
                                            echo "<th>Name</th>";
                                          } ?>
                                          <th>Ammount</th>
                                          <th>Due Date</th>
                                      </tr>
                                  </thead>
                                <?php
                                include_once 'includes/database.php';
                                if ($_SESSION['renterID'] == 0){
                                  $sql = "SELECT firstName, lastName, paymentID, paymentAmount, paymentDate FROM renter, payment WHERE renter.renterID = payment.renterID ORDER BY paymentDate ASC LIMIT 5";
                                } else {
                                  $sql = "SELECT paymentID, paymentAmount, paymentDate FROM renter, payment WHERE renter.renterID = payment.renterID AND $_SESSION[renterID] = renter.renterID";
                                }
                                // $sql = "SELECT paymentID, paymentAmount, paymentDate FROM renter, payment WHERE renter.renterID = payment.renterID AND $_SESSION[renterID] = renter.renterID";
                                $result = mysqli_query($conn, $sql);
                                $resultCheck = mysqli_num_rows($result);

                                if ($resultCheck > 0) {
                                  while($row = $result->fetch_assoc()) {
                                    echo"<tr>
                                        <td>$row[paymentID]</td>";
                                        if ($_SESSION['renterID'] == 0) {
                                          echo "<td>$row[firstName] $row[lastName]</td>";
                                        }
                                        echo "<td>$row[paymentAmount]</td>
                                        <td>";echo date ('F d, Y', strtotime($row['paymentDate'])); echo"</td>
                                    </tr>";
                                  }
                                } else {
                                  echo "<tr><td colspan='4'>No payments at this time</td></tr>";
                                }
                                if ($resultCheck >= 5) {
                                  echo "<tr><td align='right' colspan='4'><a href='index.php?action=payments'>View All Payments</a></td></tr>";
                                }
                                ?>
                                  </table>
                                  </div>
                              </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 gutter">

                            <div class="sales report">
                                <h2>Maintenance</h2>
                                <div class="btn-group">
                                    <button class="btn btn-secondary btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span>Period:</span> Last Year
                                    </button>
                                    <div class="dropdown-menu">
                                        <a href="#">2012</a>
                                        <a href="#">2014</a>
                                        <a href="#">2015</a>
                                        <a href="#">2016</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>



    <!-- Modal -->
    <div id="add_project" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header login-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title">Add Project</h4>
                </div>
                <div class="modal-body">
                            <input type="text" placeholder="Project Title" name="name">
                            <input type="text" placeholder="Post of Post" name="mail">
                            <input type="text" placeholder="Author" name="passsword">
                            <textarea placeholder="Desicrption"></textarea>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="cancel" data-dismiss="modal">Close</button>
                    <button type="button" class="add-project" data-dismiss="modal">Save</button>
                </div>
            </div>

        </div>
    </div>

</body>

<?php include 'views/footer.php'; ?>
