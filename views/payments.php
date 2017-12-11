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
                        <li class="active"><a href="index.php?action=payments"><i class="fa fa-usd" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Payments</span></a></li>
                        <li><a href="index.php?action=maintenance"><i class="fa fa-support" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Maintenance</span></a></li>
                    </ul>
                </div>
            </div>
            <?php include 'views/dashboard-header.php'; ?>
                <div class="user-dashboard">
                    <h1>Hello, <?php echo $_SESSION['firstName'] ?></h1>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 gutter">

                            <div class="sales">
                                <h2>Payments</h2>
                                <div class='payment_container'>
                                  <div class='row col-md-12 custyle'>

                                  <table class='table table-striped custab'>
                                  <thead>
                                      <tr>
                                          <th>ID</th>
                                          <th>Name</th>
                                          <?php if ($_SESSION['renterID'] == 0) {
                                            echo "<th>Apt #</th>";
                                          }?>
                                          <th>Ammount</th>
                                          <th>Due Date</th>
                                          <?php if ($_SESSION['renterID'] == 0) {
                                            echo "<th class='text-center'>Paid?</th>";
                                          } else {
                                            echo "<th class='text-center'>Action</th>";
                                          }
                                          ?>
                                      </tr>
                                  </thead>
                                <?php
                                include_once 'model/database.php';
                                if ($_SESSION['renterID'] == 0){
                                  $sql = "SELECT firstName, lastName, apt, paymentID, paymentAmount, paymentDate, paymentPaid FROM renter, payment WHERE renter.renterID = payment.renterID ORDER BY paymentPaid ASC, paymentDate ASC";

                                } else {
                                  $sql = "SELECT firstName, lastName, paymentID, paymentAmount, paymentDate, paymentPaid FROM renter, payment WHERE renter.renterID = payment.renterID AND $_SESSION[renterID] = renter.renterID ORDER BY paymentPaid ASC, paymentDate ASC";
                                }
                                $result = mysqli_query($conn, $sql);
                                $resultCheck = mysqli_num_rows($result);

                                if ($resultCheck > 0) {
                                  while($row = $result->fetch_assoc()) {
                                    echo
                                    "<tr>
                                        <td>$row[paymentID]</td>
                                        <td>$row[firstName] $row[lastName]</td>";
                                        if ($_SESSION['renterID'] == 0) {
                                          echo "<td>$row[apt]</td>";
                                        }
                                        echo "<td>$row[paymentAmount]</td>
                                        <td>";echo date ('F d, Y', strtotime($row['paymentDate'])); echo "</td>";
                                        if ($_SESSION['renterID'] == 0) {
                                          if ($row['paymentPaid'] == '0') {
                                            echo "<td class='text-center'><a class='btn btn-danger btn-sm'><i class='fa fa-times' aria-hidden='true'>Paid</i></a></td>";
                                          } else {
                                            echo "<td class='text-center'><a class='btn btn-success btn-sm'><i class='fa fa-check' aria-hidden='true'>Paid</i></a></td>";
                                          }
                                        } else {
                                        if ($row['paymentPaid'] == '0'){
                                          echo "
                                              <td class='text-center'><button href='#' class='btn btn-success btn-sm payNowButton' value='$row[paymentAmount]'><i class='fa fa-usd' aria-hidden='true'>Pay Now</i></button></td>
                                          ";
                                        } else {
                                          echo "<td class='text-center'><a class='btn btn-sm'><i class='fa fa-check' aria-hidden='true'>Paid</i></a></td>";
                                        }
                                      }
                                    echo "</tr>";
                                  }
                                } else {
                                  echo "<tr><td colspan='5'>No payments at this time</td></tr>";
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


    <script>
    $(document).ready(function() {
      $('.payNowButton').click(function() {
        var totalAmount = $(this).val();
        $('#pay_now').modal('show');
        document.getElementById('payNow').innerHTML = 'Pay $' + totalAmount;
        document.getElementById('payNow').value = totalAmount;
      });
    });
    </script>

    <!-- Modal -->
    <div id="pay_now" class="modal fade" role="dialog">
      <div class="container">
        <div class="row">
            <!-- You can make it whatever width you want. I'm making it full width
                 on <= small devices and 4/12 page width on >= medium devices -->
            <div class="col-xs-12 col-md-4">
                <!-- CREDIT CARD FORM STARTS HERE -->
                <div class="panel panel-default credit-card-box">
                    <div class="panel-heading display-table" >
                        <div class="row display-tr" >
                            <h3 class="panel-title display-td" >Payment Details</h3>
                            <div class="display-td" >
                                <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form role="form" id="payment-form" method="POST" action="model/paynow.php">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="cardNumber">CARD NUMBER</label>
                                        <div class="input-group">
                                            <input
                                                type="tel"
                                                class="form-control"
                                                name="cardNumber"
                                                placeholder="Valid Card Number"
                                                autocomplete="cc-number"
                                                maxlength="19"
                                                required autofocus
                                                onkeyup="$cc.validate(event)"
                                            />
                                            <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-7 col-md-7">
                                    <div class="form-group">
                                        <label for="cardExpiry"><span class="hidden-xs">EXPIRATION</span><span class="visible-xs-inline">EXP</span> DATE</label>
                                        <input
                                            type="tel"
                                            class="form-control exp-input"
                                            name="cardExpiry"
                                            placeholder="MM/YYYY"
                                            autocomplete="cc-exp"
                                            maxlength="7"
                                            required
                                            onkeyup="$cc.expiry.call(this,event)"

                                        />
                                    </div>
                                </div>
                                <div class="col-xs-5 col-md-5 pull-right">
                                    <div class="form-group">
                                        <label for="cardCVC">CV CODE</label>
                                        <input
                                            type="tel"
                                            class="form-control"
                                            name="cardCVC"
                                            placeholder="CVC"
                                            autocomplete="cc-csc"
                                            maxlength="3"
                                            required
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="couponCode">NAME ON CARD</label>
                                        <input type="text" class="form-control" name="name" required />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4">
                                    <button class="btn btn-danger btn-lg btn-block" type="button" data-dismiss="modal">Cancel</button>
                                </div>
                                <div class="col-xs-8">
                                    <button class="subscribe btn btn-success btn-lg btn-block" name="paynow-submit" type="submit" id="payNow" value=""></button>
                                </div>
                            </div>
                            <div class="row" style="display:none;">
                                <div class="col-xs-12">
                                    <p class="payment-errors"></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- CREDIT CARD FORM ENDS HERE -->


            </div>
          </div>

      </div>
    </div>
</body>
<script src="js/creditCardValidator.js"></script>
<script>
$(document).ready(function(){
   $('[data-toggle="offcanvas"]').click(function(){
       $("#navigation").toggleClass("hidden-xs");
   });
});
</script>
<?php include 'views/dashboard-footer.php'; ?>
