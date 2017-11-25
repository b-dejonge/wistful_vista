<?php include 'views/header.php'; ?>
<script src="js/nav.js"></script>
<body>
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
                <li><?php if(isset($_SESSION['renterID'])){echo '<form action="includes/logout.php" method="post"><button type="submit" class="nav-logout-button" name="logout-submit">Logout</button></form>';} else { echo '<a href="index.php?action=login">Login</a>';}?></li>
            </ul>
        </div><!-- /.nav-collapse -->
    </div><!-- /.container -->
</nav><!-- /.navbar -->



<div id="hero">
	<div class="header">
  		<h1>Wistful Vista Apartments</h1>
	</div>
</div>
<div class="main">

</div>

</body>

<?php include 'views/footer.php'; ?>
