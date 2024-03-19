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
?>

<!DOCTYPE html>
<html>
<head>
    <title>Drinks</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<?php include ( "../inc/mainheader.inc.php" ); ?>
<div class="categoli">
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
    </table>
</div>
<div style="padding: 15px 0px; font-size: 15px; margin: 0 auto; display: table; width: 98%;">
    <div>
        <?php
        $getposts = mysqli_query($con, "SELECT * FROM products WHERE available >= '1' AND item = '" . mysqli_real_escape_string($con, $_GET['item']) . "'") or die(mysqli_error($con));
        if (mysqli_num_rows($getposts)) {
            echo '<ul id="recs">';
            while ($row = mysqli_fetch_assoc($getposts)) {
                $id = $row['id'];
                $pName = $row['pName'];
                $price = $row['price'];
                $description = $row['description'];
                $picture = $row['picture'];

                echo '
    <ul style="float: left;">
        <li style="float: left; padding: 0px 25px 25px 25px;">
            <div class="home-prodlist-img"><a href="view_product.php?pid='.$id.'">
                <img src="../image/product/'.$_GET['item'].'/'.$picture.'" class="home-prodlist-imgi">
                </a>
                <div style="text-align: center; padding: 0 0 6px 0;"> <span style="font-size: 15px;">'.$pName.'</span><br> Price: '.$price.' Php</div>
            </div>
        </li>
    </ul>
';

            }
        }
        $con->close();
        ?>

    </div>
</div>
</body>
</html>