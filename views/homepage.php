<?php include 'views/header.php'; ?>
<script src="js/nav.js"></script>
<body class="homepage">
<nav id="header" class="navbar navbar-default navbar-fixed-top">
    <div id="header-container" class="container navbar-container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a id="brand" class="navbar-brand" href="#"><img class="brand-img" alt=""></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse right">
            <ul class="nav navbar-nav">
                <li class="<!--active-->"><a href="index.php">Home</a></li>
                <li><a href="index.php?action=apartments">Apartments</a></li>
                <li><a href="index.php?action=contact">Contact</a></li>
                <?php if(isset($_SESSION['renterID'])){echo '<li><a href="index.php?action=dashboard">Dashboard</a></li>';}?>
                <li><?php if(isset($_SESSION['renterID'])){echo '<form action="includes/logout.php" method="post"><button type="submit" class="nav-logout-button" name="logout-submit">Logout</button></form>';} else { echo '<a href="index.php?action=login">Login/Register</a>';}?></li>
            </ul>
        </div><!-- /.nav-collapse -->
    </div><!-- /.container -->
</nav><!-- /.navbar -->

<div id="hero">
  <div id="hero-overlay"></div>
  <div class="header">
      <h1>Our apartments are </h1>
      <b><span1>
      affordable<br />
      modern<br />
      close to the beach
    </span1></b>
  </div>
</div>

<div class="main">
  <div class="row">
    <div class="col-xs-12 heading">
      <h2>Featured Apartments</h2>
    </div>
    <p class="subheading">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
  </div>
  <div class="row featured">
    <div class="col-xs-12 gutter">
      <div class="col-lg-4 col-xs-12">
        <div class="featuredApt">
          <img src="http://via.placeholder.com/350x233">
          <div class="featuredApt-contents">
            <div class="featuredApt-header clearfix">
              <div class="pull-left">
                <h5 class="entry-title">Affordable and Modern</h5>
                <span class="view-floor-plan"><i class="fa fa-building-o" aria-hidden="true"></i> View floor plan</span>
              </div>
              <button class="btn btn-default pull-right" style="font-size:15px;">$389.99</button>
            </div>
            <div class="featuredApt-meta clearfix">
              <span><i class="fa fa-arrows-alt"></i> 2150 SqFt</span>
              <span><i class="fa fa-bed"></i> 3 Beds</span>
              <span><i class="fa fa-bathtub"></i> 1.5 Baths</span>
              <span><i class="fa fa-cab"></i> Yes</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-xs-12">
        <div class="featuredApt">
          <img src="http://via.placeholder.com/350x233">
          <div class="featuredApt-contents">
            <div class="featuredApt-header clearfix">
              <div class="pull-left">
                <h5 class="entry-title">Modern Family Style</h5>
                <span class="view-floor-plan"><i class="fa fa-building-o" aria-hidden="true"></i> View floor plan</span>
              </div>
              <button class="btn btn-default pull-right" style="font-size:15px;">$389.99</button>
            </div>
            <div class="featuredApt-meta clearfix">
              <span><i class="fa fa-arrows-alt"></i> 2840 SqFt</span>
              <span><i class="fa fa-bed"></i> 4 Beds</span>
              <span><i class="fa fa-bathtub"></i> 2.5 Baths</span>
              <span><i class="fa fa-cab"></i> Yes</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-xs-12">
        <div class="featuredApt">
          <img src="http://via.placeholder.com/350x233">
          <div class="featuredApt-contents">
            <div class="featuredApt-header clearfix">
              <div class="pull-left">
                <h5 class="entry-title">Modern Studio</h5>
                <span class="view-floor-plan"><i class="fa fa-building-o" aria-hidden="true"></i> View floor plan</span>
              </div>
              <button class="btn btn-default pull-right" style="font-size:15px;">$389.99</button>
            </div>
            <div class="featuredApt-meta clearfix">
              <span><i class="fa fa-arrows-alt"></i> 1380 SqFt</span>
              <span><i class="fa fa-bed"></i> 1 Beds</span>
              <span><i class="fa fa-bathtub"></i> 1 Baths</span>
              <span><i class="fa fa-cab"></i> Yes</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> <!-- End Main -->
<div class="row announcement">
  <div class="col-xs-12 text-center">
    <div class="announcement-main">
      <h2>Experience greatness for yourself</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
      <div class="buttons">
        <a href="index.php?action=contact"><button class="btn btn-default">Take a Tour</button></a>
        <a href="index.php?action=apartments"><button class="btn btn-default">View Apartments</button></a>
      </div>
    </div>
  </div>
</div> <!-- End Announcement -->
<div class="why-us-bg">
  <div class="row why-us">
    <div class="col-xs-12">
      <div class="row">
        <div class="col-xs-12 heading">
          <h2>Why Choose Us</h2>
        </div>
        <p class="subheading">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
      </div>
      <div class="row why-us-contents text-center">
        <div class="col-md-3 col-xs-6">
          <img src="views/images/money-pin.png" width="90">
          <h5 class="entry-title">Affordable</h5>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
        <div class="col-md-3 col-xs-6">
          <img src="views/images/building-pin.png" width="90">
          <h5 class="entry-title">Modern Style</h5>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
        <div class="col-md-3 col-xs-6">
          <img src="views/images/beach-pin.png" width="90">
          <h5 class="entry-title">Close to the Beach</h5>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
        <div class="col-md-3 col-xs-6">
          <img src="views/images/parking-pin.png" width="90">
          <h5 class="entry-title">Free Parking</h5>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
      </div>
    </div>
  </div>
</div>
</body>

<?php include 'views/footer.php'; ?>
