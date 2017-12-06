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
                        <?php if ($_SESSION['renterID'] == 0) {echo "<li class='active'><a href='index.php?action=create'><i class='fa fa-plus' aria-hidden='true'></i><span class='hidden-xs hidden-sm'>Create</span></a></li>";} ?>
                        <li><a href="index.php?action=messages"><i class="fa fa-envelope" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Messages</span></a></li>
                        <li><a href="index.php?action=payments"><i class="fa fa-usd" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Payments</span></a></li>
                        <li><a href="index.php?action=maintenance"><i class="fa fa-support" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Maintenance</span></a></li>
                    </ul>
                </div>
            </div>
            <?php include 'views/dashboard-header.php'; ?>
                <div class="user-dashboard">
                    <h1>Hello, <?php echo $_SESSION['firstName'] ?></h1>
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 gutter">

                            <div class="sales">
                                <h2>New Payment</h2>
                                <div class='newPayment_container'>
                                  <div class='row col-md-12'>
                                    <br />
                                    <form action="model/createNew.php" method="POST">
                                      <label for="renterSelect" class="text-muted small">Apt # - Name</label><br />
                                      <select name="renterSelect" style="width:255px">
                                      <?php
                                      $sql = "SELECT firstName, lastName, apt FROM renter ORDER BY apt ASC";
                                      $result = mysqli_query($conn, $sql);
                                      $resultCheck = mysqli_num_rows($result);
                                      if ($resultCheck > 0) {
                                        while($row = $result->fetch_assoc()) {
                                          if ($row['apt'] == 0){
                                            //do nothing
                                          }
                                          else{
                                          echo"<option value='$row[apt]'>$row[apt] - $row[firstName] $row[lastName]</option>";
                                          }
                                        }
                                      }
                                      ?>
                                      </select>
                                      <br /><br />
                                      <label for="amount">Amount:</label>
                                      <input type="tel" name="amount" placeholder="$000.00" style="width:195px">
                                      <br /><br />
                                      <label for="paymentDate">Payment Date:</label>
                                      <input type="date" name="paymentDate">
                                      <br /><br />
                                      <button type="submit" name="newPayment-submit">Submit</button>
                                    </form>
                                  </div>
                              </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 gutter">

                            <div class="sales report">
                                <h2>New Message</h2>
                                <div class='newMessage_container'>
                                  <div class='row col-md-12'>
                                    <br />
                                    <form action="model/createNew.php" method="POST">
                                      <label for="from">From:</label>
                                      <label for="subject" style="margin-left:135px;">Subject:</label><br>
                                      <input type="text" name="from">
                                      <input type="text" name="subject">
                                      <br /><br />
                                      <label for="message">Your Message:</label><br />
                                      <textarea name="message" style="width:100%; height:120px;"></textarea>
                                      <br /><br />
                                      <button type="submit" name="newMessage-submit">Submit</button>
                                    </form>
                                  </div>
                              </div>
                            </div>
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
<script>
$(document).ready(function() {
  $('.newPayment').click(function() {
    document.getElementById('newPaymentForm').style.display = 'block';
    document.getElementById('newMessageForm').style.display = 'none';
  });
  $('.newMessage').click(function() {
    document.getElementById('newMessageForm').style.display = 'block';
    document.getElementById('newPaymentForm').style.display = 'none';

  });
});
</script>
<?php include 'views/dashboard-footer.php'; ?>
