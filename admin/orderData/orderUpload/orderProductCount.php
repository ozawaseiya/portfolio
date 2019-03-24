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
	<title>注文情報追加</title>
	<link href="orderProductCount.css" rel="stylesheet" type="text/css">
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
			<p>注文情報追加</p>
		</div>
		<div id="inputBox">
			<?php

			try {

				$orderproduct = $_GET[ 'code' ];
				$orderquantity = $_GET[ 'cnt' ];


				$okflg = true;

				$dsn = 'mysql:dbname=aichi1990_shop;host=mysql7075.xserver.jp;charset=utf8';
				$user = 'aichi1990_shop';
				$password = 'a31706105';
				$dbh = new PDO( $dsn, $user, $password );
				$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

				$sql = 'SELECT productname,companyname,price,image FROM dat_product WHERE code=?';
				$stmt = $dbh->prepare( $sql );
				$data[] = $orderproduct;
				$stmt->execute( $data );

				$rec = $stmt->fetch( PDO::FETCH_ASSOC );
				$productproductname = $rec[ 'productname' ];
				$productcompanyname = $rec[ 'companyname' ];
				$productprice = $rec[ 'price' ];
				$productimage = $rec[ 'image' ];

				$dbh = null;

				if ( $productimage == '' ) {
					$productimage = '';
				} else {
					$productimage = '<img src="../../../common/' . $productimage . '">';
				}

			} catch ( Exception $e ) {
				print 'ただいま障害により大変ご迷惑をお掛けしております。';
				exit();
			}
			?>
			<div id="imageBox">
				<?php print $productimage; ?>
			</div>
			<div id="productBox">
				<tr>
					<div id="mainInfo">
						<td>
							<p class="gap">商品情報参照</p>
						</td>
					</div>
					<td>
						<p class="gap">商品名:
							<?php print $productproductname;?>
						</p>
					</td>
					<td>
						<p class="gap">販売店名:
							<?php print $productcompanyname;?>
						</p>
					</td>
					<td>
						<p class="gap">価格:
							<?php print $productprice;?>円</p>
					</td>
					<td>
						<p class="gap">購入個数:
							<?php print $orderquantity;?>
						</p>
					</td>
					<td>
						<p class="gap">合計金額:
							<?php print $productprice*$orderquantity;?>円</p>
					</td>
				</tr>
				<div id="buttonZone">
					<?php
					print '<form method="get" action="orderProductCartin.php">';
					print '<input type="hidden" name="code" value="' . $orderproduct . '">';
					print '<input type="hidden" name="cnt" value="' . $orderquantity . '">';
					print '<input type="submit" id="button1" value="購入する">';
					print '<input type="button" id="button2" onclick="history.back()" value="前のページへ戻る">';
					print '</form>'
					?>
				</div>

			</div>
		</div>
	</div>
	<footer>
	</footer>
</body>
</html>