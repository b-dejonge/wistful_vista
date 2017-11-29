<footer id="footer">
  <div class="row site-footer-bg">
    <div class="col-xs-12 site-footer gutter">
      <div class="col-md-4 col-xs-12">
        <section class="about-section">
          <h4 class="title hide">About Us</h4>
          <a href="index.php?action=homepage"><img src="views/images/logo-white.png" class="footer-img"></a>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi</p>
          <ul class="social-icons">
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
            <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
          </ul>
        </section>
      </div>
      <div class="col-md-4 col-xs-12">
        <section class="news-section">
          <h4 class="title">Latest News</h4>
          <ul>
            <li><span class="avatar"><img src="http://via.placeholder.com/48x48"></span>
            <p class="exerpt">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt</p></li>
            <li><span class="avatar"><img src="http://via.placeholder.com/48x48"></span>
            <p class="exerpt">Lorem ipsum dolor sit amet, aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris</p></li>
          </ul>
        </section>
      </div>
      <div class="col-md-4 col-xs-12">
        <section class="office-section">
          <h4 class="title">Our Office</h4>
          <ul>
            <li><i class="fa fa-map-marker"></i> 123 Beach Rd, Miami, FL 29850</li>
            <li><i class="fa fa-phone"></i> (123)456-7890</li>
            <li><i class="fa fa-envelope"></i> contact@wistfulvista.com</li>
            <li><i class="fa fa-fax"></i> (098)765-4321</li>
            <li><i class="fa fa-clock-o"></i> Mon - Sat 9:00am - 8:00pm</li>
          </ul>
        </section>
      </div>
    </div>
  </div>
<div class="site-footer-bottom">
  <div class="footer-container">
    <p class="copyright pull-left">&copy; 2017 Designed by <a href="brandondejonge.com">Brandon DeJonge</a>. All rights reserved.</p>
    <nav class="footer-nav pull-right">
      <ul>
        <li class="<!--active-->"><a href="index.php">Home</a></li>
        <li><a href="index.php?action=apartments">Apartments</a></li>
        <li><a href="index.php?action=contact">Contact</a></li>
        <?php if(isset($_SESSION['renterID'])){echo '<li><a href="index.php?action=dashboard">Dashboard</a></li>';}?>
        <li><?php if(isset($_SESSION['renterID'])){echo '<form action="includes/logout.php" method="post"><button type="submit" class="footer-nav-logout-button" name="logout-submit">Logout</button></form>';} else { echo '<a href="index.php?action=login">Login/Register</a>';}?></li>
      </ul>
  </div>
</div>
</footer>
</html>
