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
                        <?php if ($_SESSION['renterID'] == 0) {echo "<li><a href='index.php?action=create'><i class='fa fa-plus' aria-hidden='true'></i><span class='hidden-xs hidden-sm'>Create</span></a></li>";} ?>
                        <li><a href="index.php?action=messages"><i class="fa fa-envelope" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Messages</span></a></li>
                        <li><a href="index.php?action=payments"><i class="fa fa-usd" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Payments</span></a></li>
                        <li class="active"><a href="index.php?action=maintenance"><i class="fa fa-support" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Maintenance</span></a></li>
                    </ul>
                </div>
            </div>
            <?php include 'views/dashboard-header.php'; ?>
                <div class="user-dashboard">
                    <h1>Hello, <?php echo $_SESSION['firstName'] ?></h1>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 gutter">

                            <div class="sales">
                                <h2>Maintenance</h2>
                                <?php if ($_SESSION['renterID'] == 0) {}else{echo '
                                <div class="btn-group">
                                    <button class="btn btn-secondary btn-lg add-request" data-toggle="modal" data-target="#add-request">Add Request</button>
                                </div>';}?>
                                <div class='payment_container'>
                                  <div class='row col-md-12 custyle'>

                                  <table class='table table-striped custab'>
                                  <thead>
                                      <tr>
                                          <th>ID</th>
                                          <?php if ($_SESSION['renterID'] == 0) {
                                            echo "<th>Name</th>
                                                  <th>Apt #</th>";
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
                                include_once 'model/database.php';
                                if ($_SESSION['renterID'] == 0){
                                  $sql = "SELECT firstName, lastName, apt, maintenanceID, urgency, description, date, status FROM renter, maintenance WHERE renter.renterID = maintenance.renterID ORDER BY status ASC, urgency ASC";

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
                                          echo "<td>$row[firstName] $row[lastName]</td>
                                                <td>$row[apt]</td>";
                                        }
                                  echo "<td>$row[urgency]</td>
                                        <td class='description'>$row[description]</td>
                                        <td>";echo date ('F d, Y', strtotime($row['date'])); echo "</td>";
                                        if ($_SESSION['renterID'] == 0) {
                                          if ($row['status'] == '0') {
                                            echo "<td>Open</td>
                                            <td class='text-center'><form action='model/closeRequest.php' method='POST' style='margin-bottom:0;'><button class='btn btn-danger btn-sm' type='submit' name='closeRequest-submit' value='$row[maintenanceID]'><i class='fa fa-times' aria-hidden='true'> Close</i></button></form></td>";
                                          } else {
                                            echo "<td>Closed</td>
                                            <td class='text-center'>None</td>";
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
                <form role="form" id="addrequest-form" method="POST" action="model/addrequest.php">
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
