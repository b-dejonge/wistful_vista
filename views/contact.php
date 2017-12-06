<?php include 'views/header.php'; ?>
<script src="js/nav.js"></script>
<body class="contact-page">
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

<div id="contact-banner" class="text-center clearfix">
  <div class="container">
    <h1 class="title">Get in touch with us</h1>
  </div>
</div>
<div id="contact-content">
  <div class="container">
    <h3 class="entry-title">Contact Us</h3>
    <div class="row">
            <div class="col-md-6">
                <div class="contact-form-wrapper">
                    <div class="contents">
                        <p>Sed perspiciatis unde natus error sit voluptatem accusantium doloremque  laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae.</p>
                    </div>
                    <div class="contact-page-contents clearfix">
                        <div class="row">
                            <div class="col-md-6">
                                <i class="fa fa-map-marker"></i>
                                <div class="contents">
                                    <h6 class="title">Mailing Address</h6>
                                    <address>
                                        95 Amphitheatre Parkway
                                        Mountain View CA,
                                        United States
                                    </address>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <i class="fa fa-phone"></i>
                                <div class="contents">
                                    <h5 class="title">Contact Info</h5>
                                    <ul>
                                        <li>Phone: (123) 45678910</li>
                                        <li>Mail: company@domain.com</li>
                                        <li>Fax: +84 962 216 601</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-6">
                <form action="form-handler.php" method="post" class="contact-form">
                    <p class="form-author common">
                        <input id="author" name="name" type="text" placeholder="Your Name *" aria-required="true" required="required">
                    </p>
                    <p class="form-email common">
                        <input id="email" name="email" type="text" placeholder="Your Email *" aria-describedby="email-notes" aria-required="true" required="required">
                    </p>
                    <p class="form-phone common">
                        <input id="phone" name="phone" type="text" placeholder="Your Phone Number *" aria-required="true" required="required" >
                    </p>
                    <p class="form-subject common">
                        <input id="subject" name="subject" type="text" placeholder="subject">
                    </p>
                    <p class="form-comment">
                        <textarea id="message" name="message" placeholder="Comment" cols="45" rows="8" ></textarea>
                    </p>
                    <p class="form-submit">
                        <button type="submit" id="submit-button" class="submit-btn btn btn-default btn-lg btn-3d" data-hover="Post Comment">Post Comment</button>
                    </p>
                </form>
            </div>
        </div>
    </div>
    <div id="map-canvas">
      <iframe src="https://snazzymaps.com/embed/33525" width="100%" height="400px" style="border:none;"></iframe>
    </div>
</body>

<?php include 'views/footer.php'; ?>
