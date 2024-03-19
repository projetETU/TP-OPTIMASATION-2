<?php include ( "inc/connect.inc.php" ); ?>
<?php 
ob_start();
session_start();
if (!isset($_SESSION['user_login'])) {
	$user = "";
}
else {
	$user = $_SESSION['user_login'];
	$result = mysqli_query($con, "SELECT * FROM user WHERE id='$user'");
	$get_user_email = mysqli_fetch_assoc($result);
	$uname_db = $get_user_email != null ? $get_user_email['firstName'] : null;
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Welcome to nita's online grocery</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

		
	</head>
	<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-14TZ4THZ6G"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-14TZ4THZ6G');
</script>
	<body style="min-width: 980px;">
		<div class="homepageheader" style="position: relative;">
			<div class="signinButton loginButton">
				<div class="uiloginbutton signinButton loginButton" style="margin-right: 40px;">
					<?php 
						if ($user!="") {
							echo '<a  aria-label="Read more about Seminole tax hike" style="text-decoration: none; color: #fff;" href="logout.php">LOG OUT</a>';
						}
						else {
							echo '<a aria-label="Read more about Seminole tax hike" style="color: #fff; text-decoration: none;" href="signin.php">SIGN UP</a>';
						}
					 ?>
					
				</div>
				<div class="uiloginbutton signinButton loginButton" style="">
					<?php 
						if ($user!="") {
							echo '<a  aria-label="Read more about Seminole tax hike" style="text-decoration: none; color: #fff;" href="profile.php?uid='.$user.'">Hi '.$uname_db.'</a>';
						}
						else {
							echo '<a  aria-label="Read more about Seminole tax hike" style="text-decoration: none; color: #fff;" href="login.php">LOG IN</a>';
						}
					 ?>
				</div>
			</div>
			<div style="float: left; margin: 5px 0px 0px 23px;">
				<a  aria-label="Read more about Seminole tax hike" href="index.php">
					<img alt="image" style=" height: 75px; width: 130px;" src="image/cart.webp">
				</a>
			</div>
			<div class="">
				<div id="srcheader">
					<form id="newsearch" method="get" action="search.php">
					        <input type="text" class="srctextinput" name="keywords" size="21" maxlength="120"  placeholder="Search Here..."><input type="submit" value="search" class="srcbutton" >
					</form>
				<div class="srcclear"></div>
				</div>
			</div>
		</div>
		<div class="home-welcome">
			<div class="home-welcome-text" style="background-image: url(image/background.webp); height: 380px; ">
				<div style="padding-top: 180px;">
					<div style=" background-color: #dadbe6;">
						<h1 style="margin: 0px;">Welcome To nita's online grocery</h1>
						<h2>Most Convenient Store in 7th ave. Caloocan</h2>
					</div>
				</div>
			</div>
		</div>
		<div class="home-prodlist">
			<div>
				<h3 style="text-align: center;">Products Category</h3>
			</div>
			<div style="padding: 20px 30px; width: 85%; margin: 0 auto;">
				<ul style="float: left;">
					<li style="float: left; padding: 25px;">
						<div class="home-prodlist-img"><a  aria-label="Read more about Seminole tax hike"href="OurProducts/Category.php?item=noodles">
							<img alt="image" src="./image/product/noodles/n.webp" class="home-prodlist-imgi" >
							</a>
						</div>
					</li>
				</ul>
				<ul style="float: left;">
					<li style="float: left; padding: 25px;">
					<div class="home-prodlist-img"><a aria-label="Read more about Seminole tax hike" href="OurProducts/Category.php?item=snack">
							<img alt="image" src="./image/product/snack/sn.webp" class="home-prodlist-imgi">
							</a>
						</div>
					</li>
				</ul>
				<ul style="float: left;">
					<li style="float: left; padding: 25px;">
					<div class="home-prodlist-img"><a  aria-label="Read more about Seminole tax hike" href="OurProducts/Category.php?item=sweet">
							<img alt="image" src="./image/product/sweet/s.webp" class="home-prodlist-imgi"></a>
						</div>
					</li>
				</ul>
				<ul style="float: left;">
					<li style="float: left; padding: 25px;">
					<div class="home-prodlist-img"><a aria-label="Read more about Seminole tax hike" href="OurProducts/Category.php?item=hygiene">
							<img src="./image/product/hygiene/hy.webp" class="home-prodlist-imgi"></a>
						</div>
					</li>
				</ul>
				<ul style="float: left;">
					<li style="float: left; padding: 25px;">
					<div class="home-prodlist-img"><a  aria-label="Read more about Seminole tax hike" href="OurProducts/Category.php?item=shampoo">
							<img alt="image" src="./image/product/shampoo/pall.webp" class="home-prodlist-imgi"></a>
						</div>
					</li>
				</ul>
				<ul style="float: left;">
					<li style="float: left; padding: 25px;">
					<div class="home-prodlist-img"><a  aria-label="Read more about Seminole tax hike" href="OurProducts/Category.php?item=soap">
							<img alt="image" src="./image/product/soap/sp.webp" class="home-prodlist-imgi"></a>
						</div>
					</li>
				</ul>
				<ul style="float: left;">
					<li style="float: left; padding: 25px;">
					<div class="home-prodlist-img"><a aria-label="Read more about Seminole tax hike" href="OurProducts/Category.php?item=drink">
							<img alt="image" src="./image/product/drink/dr.webp" class="home-prodlist-imgi"></a>
						</div>
					</li>
				</ul>
				<ul style="float: left;">
					<li style="float: left; padding: 25px;">
					<div class="home-prodlist-img"><a  aria-label="Read more about Seminole tax hike" href="OurProducts/Category.php?item=seasoning">
							<img alt="image" src="./image/product/seasoning/cond.webp" class="home-prodlist-imgi"></a>
						</div>
					</li>
				</ul>
			</div>			
		</div>
	</body>
</html>