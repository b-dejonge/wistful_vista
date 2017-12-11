<?php include 'views/header.php'; ?>
<script src="js/nav.js"></script>
<body class="apt-page">
<nav id="header" class="navbar navbar-default navbar-fixed-top">
    <div id="header-container" class="container navbar-container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a id="brand" class="navbar-brand" href="index.php"><img class="brand-img" alt=""></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse right">
            <ul class="nav navbar-nav">
                <li><a href="index.php">Home</a></li>
                <li><a href="index.php?action=apartments">Apartments</a></li>
                <li><a href="index.php?action=contact">Contact</a></li>
                <?php if(isset($_SESSION['renterID'])){echo '<li><a href="index.php?action=dashboard">Dashboard</a></li>';}?>
                <li><?php if(isset($_SESSION['renterID'])){echo '<form action="model/logout.php" method="post"><button type="submit" class="nav-logout-button" name="logout-submit">Logout</button></form>';} else { echo '<a href="index.php?action=login">Login/Register</a>';}?></li>
            </ul>
        </div><!-- /.nav-collapse -->
    </div><!-- /.container -->
</nav><!-- /.navbar -->

<div id="apt-banner" class="text-center clearfix">
  <div class="container">
    <h1 class="title">All Apartments</h1>
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
          <img src="./views/images/apartments/1.jpg">
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
          <img src="./views/images/apartments/2.jpg">
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
          <img src="./views/images/apartments/3.jpg">
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
  <div class="row featured">
    <div class="col-xs-12 gutter">
      <div class="col-lg-4 col-xs-12">
        <div class="featuredApt">
          <img src="./views/images/apartments/4.jpg">
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
          <img src="./views/images/apartments/5.jpg">
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
          <img src="./views/images/apartments/6.jpg">
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
  <div class="row featured">
    <div class="col-xs-12 gutter">
      <div class="col-lg-4 col-xs-12">
        <div class="featuredApt">
          <img src="./views/images/apartments/7.jpg">
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
          <img src="./views/images/apartments/8.jpg">
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
          <img src="./views/images/apartments/9.jpg">
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

<?php include 'views/footer.php'; ?>
