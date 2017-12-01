<?php include 'views/header.php';?>

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
                        <li><a href="index.php?action=dashboard"><i class="fa fa-home" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Dashboard</span></a></li>
                        <li><a href="index.php?action=payments"><i class="fa fa-usd" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Payments</span></a></li>
                        <li class="active"><a href="index.php?action=maintenance"><i class="fa fa-support" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Maintenance</span></a></li>
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
                                    <!-- <li class="hidden-xs"><a href="#" class="add-project" data-toggle="modal" data-target="#pay_now"><i class="fa fa-plus" aria-hidden="true"></i>Add Project</a></li> -->
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
                                    <li><form action="includes/logout.php" method="post"><button type="submit" name="logout-submit" class="link-button"><i class="fa fa-sign-out" aria-hidden="true"></i></button></form></li>
                                </ul>
                            </div>
                        </div>
                    </header>
                </div>
                <div class="user-dashboard">
                    <h1>Hello, <?php echo $_SESSION['firstName'] ?></h1>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 gutter">

                            <div class="sales">
                                <h2>Maintenance</h2>
                                <div class="btn-group">
                                    <button class="btn btn-secondary btn-lg add-request" data-toggle="modal" data-target="#add-request">Add Request</button>
                                </div>
                                <div class='payment_container'>
                                  <div class='row col-md-12 custyle'>

                                  <table class='table table-striped custab'>
                                  <thead>
                                      <tr>
                                          <th>ID</th>
                                          <?php if ($_SESSION['renterID'] == 0) {
                                            echo "<th>Name</th>";
                                          }?>
                                          <th>Urgency</th>
                                          <th>Description</th>
                                          <th>Date</th>
                                          <th>Status</th>
                                          <?php if ($_SESSION['renterID'] == 0) {
                                            echo "<th class='text-center'>Action</th>";
                                          }?>
                                      </tr>
                                  </thead>
                                <?php
                                include_once 'includes/database.php';
                                if ($_SESSION['renterID'] == 0){
                                  $sql = "SELECT firstName, lastName, maintenanceID, urgency, description, date, status FROM renter, maintenance WHERE renter.renterID = maintenance.renterID ORDER BY status ASC, urgency ASC";

                                } else {
                                  $sql = "SELECT maintenanceID, urgency, description, date, status FROM renter, maintenance WHERE renter.renterID = maintenance.renterID AND $_SESSION[renterID] = renter.renterID ORDER BY status ASC, urgency ASC";
                                }
                                $result = mysqli_query($conn, $sql);
                                $resultCheck = mysqli_num_rows($result);

                                if ($resultCheck > 0) {
                                  while($row = $result->fetch_assoc()) {
                                    echo
                                    "<tr>
                                        <td>$row[maintenanceID]</td>";
                                        if ($_SESSION['renterID'] == 0) {
                                          echo "<td>$row[firstName] $row[lastName]</td>";
                                        }
                                  echo "<td>$row[urgency]</td>
                                        <td class='description'>$row[description]</td>
                                        <td>";echo date ('F d, Y', strtotime($row['date'])); echo "</td>";
                                        if ($_SESSION['renterID'] == 0) {
                                          if ($row['status'] == '0') {
                                            echo "<td>Open</td>
                                            <td class='text-center'><form action='includes/closeRequest.php' method='POST' style='margin-bottom:0;'><button class='btn btn-danger btn-sm' type='submit' name='closeRequest-submit' value='$row[maintenanceID]'><i class='fa fa-times' aria-hidden='true'> Close</i></button></form></td>";
                                          } else {
                                            echo "<td>Closed</td>
                                            <td class='text-center'></td>";
                                          }
                                        } else {
                                        if ($row['status'] == '0'){
                                          echo "
                                              <td>Open</td>
                                          ";
                                        } else {
                                          echo "<td>Closed</td>";
                                        }
                                      }
                                    echo "</tr>";
                                  }
                                } else {
                                  echo "<tr><td colspan='5'>No maintenance requests at this time</td></tr>";
                                }
                                ?>
                                  </table>
                                  </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <!-- <script>
    $(document).ready(function() {
      $('.payNowButton').click(function() {
        var totalAmount = $(this).val();
        $('#pay_now').modal('show');
        document.getElementById('payNow').innerHTML = 'Pay $' + totalAmount;
        document.getElementById('payNow').value = totalAmount;
      });
    });
    </script> -->

    <!-- Modal -->
    <div id="add-request" class="modal fade" role="dialog">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-md-4">
            <div class="panel panel-default credit-card-box">
              <div class="panel-heading display-table" >
                <div class="row display-tr" >
                  <h3 class="panel-title display-td">Add maintenance request</h3>
                </div>
              </div>
              <div class="panel-body">
                <form role="form" id="addrequest-form" method="POST" action="includes/addrequest.php">
                  <div class="row">
                    <div class="col-xs-12">
                      <div class="form-group">
                        <label for="urgency">Urgency</label/>
                          <select class="urgency-select" name="urgency">
                            <option value="Standard">Standard</option>
                            <option value="Soon">Soon</option>
                            <option value="Immediate">Immediate</option>
                          </select>
                        <label for="description">Description</label>
                        <textarea class="" name="description" required /></textarea>
                        <button class="btn btn-danger btn-lg addrequest-cancel pull-left" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-lg addrequest-submit pull-right" name="addrequest-submit" type="submit">Submit</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>
<script>
$(document).ready(function(){
   $('[data-toggle="offcanvas"]').click(function(){
       $("#navigation").toggleClass("hidden-xs");
   });
});
</script>
<?php include 'views/dashboard-footer.php'; ?>
