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
	<title>注文詳細情報一覧</title>
	<link href="orderDetail.css" rel="stylesheet" type="text/css">
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
					<li><a href="orderList.php">注文管理情報一覧</a>
					</li>
				</ul>
			</nav>
		</div>
	</header>
	<div id="contents">
		<div id="mainTitle">
			<p>注文詳細情報一覧</p>
		</div>
		<div id="detailZone">

			<?php

			try {

				$ordercode = $_GET[ 'code' ];
				$total = 0;

				$dsn = 'mysql:dbname=aichi1990_shop;host=mysql7075.xserver.jp;charset=utf8';
				$user = 'aichi1990_shop';
				$password = 'a31706105';
				$dbh = new PDO( $dsn, $user, $password );
				$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );


				$sql = "SELECT ordercode,orderproduct,orderquantity,orderprice FROM dat_order_product WHERE ordercode=$ordercode";
				$stmt = $dbh->prepare( $sql );
				$data[] = $ordercode;
				$stmt->execute( $data );


				print '<form method="post" action="orderDetailBranch.php">';
				while ( true ) {
					$rec = $stmt->fetch( PDO::FETCH_ASSOC );
					if ( $rec == false ) {
						break;
					}
					print '<div id="orderList">';
					print '○注文番号:' . $rec[ 'ordercode' ] . '&nbsp;';
					$ordercode = $rec[ 'ordercode' ];
					global $ordercode;
					print '商品番号:' . $rec[ 'orderproduct' ] . '&nbsp;';
					$orderproduct[] = $rec[ 'orderproduct' ];
					global $orderproduct;
					print '注文個数:' . $rec[ 'orderquantity' ] . '&nbsp;';
					$orderquantity = $rec[ 'orderquantity' ];
					$orderprice = $rec[ 'orderprice' ];
					print '価格:' . $orderprice * $orderquantity . '円';
					$price = $orderprice * $orderquantity;
					$data = array( $price );
					global $data;
					$totalprice += array_sum( $data );
					$total = $totalprice + 300;
					print '</div>';
				}

				print '<div id="amount">';
				print 'この注文番号の合計金額' . $total . '円（送料300円分込）';
				print '</div>';


				print '<div id="productTitleZone"><p>商品情報一覧</p></div>';


				foreach ( ( array )$orderproduct as $key => $val ) {
					$sql = 'SELECT code,productname,companyname,price FROM dat_product WHERE code=?';
					$stmt = $dbh->prepare( $sql );
					$data[ 0 ] = $val;
					$stmt->execute( $data );


					$rec = $stmt->fetch( PDO::FETCH_ASSOC );
					$numbercode[] = $rec[ 'code' ];
					$productname[] = $rec[ 'productname' ];
					$companyname[] = $rec[ 'companyname' ];
					$price2[] = $rec[ 'price' ];
				}

				$max = count( $orderproduct );
				for ( $i = 0; $i < $max; $i++ ) {
					print '<table>';
					print '<tr>';
					print '<th>番号</th><th id="productData">商品名</th><th>販売店名</th><th id="priceData">価格</th>';
					print '</tr>';
					print '<tr>';
					print '<td id="numberData">' . $numbercode[ $i ] . '</td>';
					print '<td>' . $productname[ $i ] . '</td>';
					print '<td>' . $companyname[ $i ] . '</td>';
					print '<td>' . $price2[ $i ] . '円</td>';
					print '</tr>';
					print '</table>';
				}

				$dbh = null;


				print '<br/>';
				print '<div id="buttonZone">';
				print '<input type="submit" id="button1" name="back" value="前のページへ戻る">';
				print '</div>';
				print '</form>';
			} catch ( Exception $e ) {
				print 'ただいま障害により大変ご迷惑をお掛けしております。';
				exit();
			}

			?>
		</div>
	</div>
	<footer>
	</footer>
</body>
</html>