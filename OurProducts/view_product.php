<?php include ( "../inc/connect.inc.php" ); ?>
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
			$uname_db = $get_user_email['firstName'];
}
if (isset($_REQUEST['pid'])) {
	
	$pid = mysqli_real_escape_string($con, $_REQUEST['pid']);
}else {
	header('location: index.php');
}


$getposts = mysqli_query($con, "SELECT * FROM products WHERE id ='$pid'") or die(mysqlI_error($con));
					if (mysqli_num_rows($getposts)) {
						$row = mysqli_fetch_assoc($getposts);
						$id = $row['id'];
						$pName = $row['pName'];
						$price = $row['price'];
						$piece=$row['piece'];
						$description = $row['description'];
						$picture = $row['picture'];
						$item = $row['item'];
						$available =$row['available'];
					}	


if (isset($_POST['addcart'])) {
	$getposts = mysqli_query($con, "SELECT * FROM cart WHERE pid ='$pid' AND uid='$user'") or die(mysqlI_error($con));
	if (mysqli_num_rows($getposts)) {
		header('location: ../mycart.php?uid='.$user.'');
	}else{
		if(mysqli_query($con, "INSERT INTO cart (uid,pid,quantity) VALUES ('$user','$pid', 1)")){
			header('location: ../mycart.php?uid='.$user.'');
		}else{
			header('location: index.php');
		}
	}
}
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-M49LRCPR');</script>
    <!-- End Google Tag Manager -->

    <title>View-Prod</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
</head>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-14TZ4THZ6G"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-14TZ4THZ6G');
</script>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M49LRCPR"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
	<?php include ( "../inc/mainheader.inc.php" ); ?>
	<div class="categolis">
        <table>
            <tr>
                <th>
                    <a  href="Category.php?item=noodles"  style="text-decoration: none;color: #040403;padding: 4px 12px;background-color: #e6b7b8;border-radius:">Noodles&Canned</a>
                </th>

                <th><a href="Category.php?item=snack" style="text-decoration: none;color: #040403;padding: 4px 12px;background-color: #e6b7b8;border-radius: 12px;">Seasonings</a></th>
                <th><a href="Category.php?item=drink" style="text-decoration: none;color: #040403;padding: 4px 12px;background-color: #24bfae;border-radius: 12px;">Drinks</a></th>
                <th><a href="Category.php?item=snack" style="text-decoration: none;color: #040403;padding: 4px 12px;background-color: #e6b7b8;border-radius: 12px;">Snacks</a></th>
                <th><a href="Category.php?item=sweet" style="text-decoration: none;color: #040403;padding: 4px 12px;background-color: #e6b7b8;border-radius: 12px;">Sweets</a></th>
                <th><a href="Category.php?item=soap" style="text-decoration: none;color: #040403;padding: 4px 12px;background-color: #e6b7b8;border-radius: 12px;">Soap&Detergent</a></th>
                <th><a href="Category.php?item=shampoo" style="text-decoration: none;color: #040403;padding: 4px 12px;background-color: #e6b7b8;border-radius: 12px;">Shampoo</a></th>
                <th><a href="Category.php?item=hygiene" style="text-decoration: none;color: #040403;padding: 4px 12px;background-color: #e6b7b8;border-radius: 12px;">Hygiene</a></th>
            </tr>
        </table>	</div>
	<div style="margin: 0 97px; padding: 10px">

		<?php 
			echo '
				<div style="float: left;">
				<div>
					<img alt="image" src="../image/product/'.$item.'/'.$picture.'" style="height: 500px; width: 500px; padding: 2px; border: 2px solid #c7587e;">
				</div>
				</div>
				<div style="float: right;width: 40%;color: #067165;background-color: #ddd;padding: 10px;">
					<div style="">
						<h3 style="font-size: 25px; font-weight: bold; ">'.$pName.'</h3><hr>
						<h3 style="padding: 20px 0 0 0; font-size: 20px;">Price: '.$price.'Php</h3><hr>
						<h3 style="padding: 20px 0 0 0; font-size: 22px; ">Pieces:'.$piece.'</h3>
						<h3 style="padding: 20px 0 0 0; font-size: 22px; ">Description:</h3>
						<p>
							'.$description.'
						</p>

						<div>
							<h3 style="padding: 20px 0 5px 0; font-size: 20px;">Want to buy this product? </h3>
							<div id="srcheader">
								<form id="" method="post" action="">
								        <input type="submit" name="addcart" value="Add to cart" class="srcbutton" >
								</form><br/>
								<form id="" method="post" action="../orderform.php?poid='.$pid.'">
								        <input type="submit" value="Order Now" class="srcbutton" >
								</form>
								<div class="srcclear"></div>
							</div>
						</div>

					</div>
				</div>

			';
            $con->close();
		?>

	</div>
</body>
</html>