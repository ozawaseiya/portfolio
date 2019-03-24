<?php
session_start();
header( 'Expires:' );
header( 'Cache-Control:' );
header( 'Pragma:' );
if ( isset( $_SESSION[ 'staff_login' ] ) == false ) {
	print 'ログインされていません。<br/>';
	print '<a href="../../staffLogin/staffLogin.php">ログイン画面へ</a>';
	exit();
} else {
	print $_SESSION[ 'staff_kanji' ];
	print 'さんログイン中<br/>';
	print '<br/>';
}
?>

<!doctype html>
<html lang="ja">
<head>
	<meta charset="UTF-8N">
	<title>商品追加完了</title>
	<link href="orderAddDone.css" rel="stylesheet" type="text/css">
</head>

<body>
	<header>
		<div id="headerInner">
			<a href="../../../index/index.php"><img src="../../../common/logo.png" alt="東三河幸せ宅配便" id="mainPhoto"></a>
			<img src="../../../common/motto.png" alt="地元のおいしさと楽しみをご自宅にお届けいたします" id="mainMotto"/>
			<nav id="gnav">
				<ul id="gNavi">
					<li><a href="../../adminBranch.php">トップメニュー</a>
					</li>
					<li><a href="../../staff/staffList.php">管理者情報一覧</a>
					</li>
					<li><a href="../../memberData/memberList/memberList.php">会員登録一覧</a>
					</li>
					<li><a href="../../inquiryData/inquiryList/inquiryList.php">お問い合わせ一覧</a>
					</li>
					<li><a href="../../productData/productList/productList.php">商品管理情報一覧</a>
					</li>
					<li><a href="../orderList/orderList.php">注文管理情報一覧</a>
					</li>
				</ul>
			</nav>
		</div>
	</header>
	<div id="contents">
		<div id="mainTitle">
			<p>商品追加完了</p>
		</div>
		<div id="textZone">
			<?php
			try {

				require_once( '../../../common/common.php' );

				$post = sanitize( $_POST );
				$name = $post[ 'name' ];
				$tel = $post[ 'tel' ];
				$email = $post[ 'email' ];
				$postal1 = $post[ 'postal1' ];
				$postal2 = $post[ 'postal2' ];
				$prefecture = $post[ 'prefecture' ];
				$address = $post[ 'address' ];
				$payment = $post[ 'payment' ];
				$arrival = $post[ 'arrival' ];
				$cardnumber = $post[ 'cardnumber' ];
				$cardvalidyear = $post[ 'cardvalidyear' ];
				$cardvalidmonth = $post[ 'cardvalidmonth' ];

				$cart = $_SESSION[ 'cart' ];
				$orderquantity = $_SESSION[ 'cnt' ];
				$max = count( $cart );


				$dsn = 'mysql:dbname=aichi1990_shop;host=mysql7075.xserver.jp;charset=utf8';
				$user = 'aichi1990_shop';
				$password = 'a31706105';
				$dbh = new PDO( $dsn, $user, $password );
				$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );


				for ( $i = 0; $i < $max; $i++ ) {
					$sql = 'SELECT productname,companyname,price FROM dat_product WHERE code=?';
					$stmt = $dbh->prepare( $sql );
					$data[ 0 ] = $cart[ $i ];
					$stmt->execute( $data );

					$rec = $stmt->fetch( PDO::FETCH_ASSOC );

					$productname = $rec[ 'productname' ];
					$companyname = $rec[ 'companyname' ];
					$productprice = $rec[ 'price' ];
					$amount[] = $productprice;
					$count = $orderquantity[ $i ];
					$total = $productprice * $count;

					print $productname . '<br/>';
					print $companyname . '<br/>';
					print $productprice . '円x';
					print $count . '個＝';
					print $total . '円<br/><br/>';

					$price = $productprice * $count;
					$data = array( $price );

					global $sum;
					$sum += array_sum( $data );

				}

				print '商品総額' . $sum . '円(別途送料300円)<br/>';

				$sql = 'LOCK TABLES dat_order WRITE,dat_order_product WRITE';
				$stmt = $dbh->prepare( $sql );
				$stmt->execute();

				$lastmembercode = $_SESSION[ 'member_code' ];
				global $lastmembercode;

				$sql = 'INSERT INTO dat_order(membercode,name,tel,email,postal1,postal2,prefecture,address,payment,arrival,cardnumber,cardvalidyear,cardvalidmonth)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)';
				$stmt = $dbh->prepare( $sql );
				$data = array();
				$data[] = $lastmembercode;
				$data[] = $name;
				$data[] = $tel;
				$data[] = $email;
				$data[] = $postal1;
				$data[] = $postal2;
				$data[] = $prefecture;
				$data[] = $address;
				$data[] = $payment;
				$data[] = $arrival;
				$data[] = $cardnumber;
				$data[] = $cardvalidyear;
				$data[] = $cardvalidmonth;
				$stmt->execute( $data );

				$sql = 'SELECT LAST_INSERT_ID()';
				$stmt = $dbh->prepare( $sql );
				$stmt->execute();
				$rec = $stmt->fetch( PDO::FETCH_ASSOC );
				$lastcode = $rec[ 'LAST_INSERT_ID()' ];

				for ( $i = 0; $i < $max; $i++ ) {
					$sql = 'INSERT INTO dat_order_product(ordercode,membercode,orderproduct,orderprice,orderquantity)VALUES(?,?,?,?,?)';
					$stmt = $dbh->prepare( $sql );
					$data = array();
					$data[] = $lastcode;
					$data[] = $lastmembercode;
					$data[] = $cart[ $i ];
					$data[] = $amount[ $i ];
					$data[] = $orderquantity[ $i ];
					$stmt->execute( $data );
				}

				$sql = 'UNLOCK TABLES';
				$stmt = $dbh->prepare( $sql );
				$stmt->execute();

				$dbh = null;

			} catch ( Exception $e ) {
				print 'ただいま障害により大変ご迷惑をお掛けしております。';
				exit();
			}
			?>
			<div id="backButtonZone">
				<?php
				$cart = $_SESSION[ 'cart' ];

				for ( $i = $max; 0 <= $i; $i-- ) {
					if ( isset( $_SESSION[ 'cart' ] ) == true ) {
						array_splice( $cart, $i, 1 );
						array_splice( $orderquantity, $i, 1 );
					}
				}

				$_SESSION[ 'cart' ] = $cart;
				$_SESSION[ 'cnt' ] = $orderquantity;

				print '<br/>';
				print '<a href="../orderList/orderList.php">注文管理情報一覧へ</a>';

				?>
			</div>
		</div>
	</div>
	<footer>
	</footer>
</body>
</html>