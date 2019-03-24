<?php
session_start();
header( 'Expires:' );
header( 'Cache-Control:' );
header( 'Pragma:' );
if ( isset( $_SESSION[ 'member_login' ] ) == true ) {
	print $_SESSION[ 'member_kanji' ];
	print 'さんログイン中<br/>';
	print '<br/>';
}
?>
<?php

try {

	$productquantity = $_GET[ 'cnt' ];
	$productcode = $_GET[ 'code' ];

	$okflg = true;

	$dsn = 'mysql:dbname=aichi1990_shop;host=mysql7075.xserver.jp;charset=utf8';
	$user = 'aichi1990_shop';
	$password = 'a31706105';
	$dbh = new PDO( $dsn, $user, $password );
	$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

	$sql = 'SELECT productname,companyname,price,image FROM dat_product WHERE code=?';
	$stmt = $dbh->prepare( $sql );
	$data[] = $productcode;
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
		$productimage = '<img src="../../common/' . $productimage . '">';
	}

} catch ( Exception $e ) {
	print 'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();
}
?>

<!doctype html>
<html lang="ja">
<head>
	<meta charset="UTF-8N">
	<title>商品購入画面</title>
	<link href="productCount.css" rel="stylesheet" type="text/css">
</head>

<body>
	<header>
		<div id="headerInner">
			<a href="../../index/index.php"><img src="../../common/logo.png" alt="東三河幸せ宅配便" id="mainPhoto"></a>
			<img src="../../common/motto.png" alt="地元のおいしさと楽しみをご自宅にお届けいたします" id="mainMotto"/>
			<div id="shoppingCartZone">
				<a href="../cart/productCartLook.php"><img src="../../common/shoppingcart.png" alt="買い物かご" id="shoppingCart"/></a>
			</div>
			<nav id="gnav">
				<ul id="gNavi">
					<li><a href="../../index/index.php">最初のページへ</a>
					</li>
					<li><a href="../../product/productList/productList1.php">洋菓子・和菓子</a>
					</li>
					<li><a href="../../product/productList/productList2.php">ドリンク</a>
					</li>
					<li class="toggle">
						<a href="../../companyInfo/companyInfo1.php">幸せ宅配便とは</a>
						<div class="menu">
							<ul class="menuInner">
								<li class="megaDrop1">
									<a href="../../companyInfo/companyInfo2.php">
										<p>ご利用者の声</p>
									</a>
								</li>
								<li class="megaDrop1">
									<a href="../../companyInfo/companyInfo3.php">
										<p>会社概要と地域連携店一覧</p>
									</a>
								</li>
								<li class="megaDrop1">
									<a href="../../companyInfo/companyInfo4.php">
										<p>サービスご利用方法</p>
									</a>
								</li>
							</ul>
						</div>
					</li>
					<li><a href="../../login/memberBranch.php">会員登録・ログイン</a>
					</li>
				</ul>
			</nav>
		</div>
	</header>
	<div id="contents">
		<div id="mainTitle">
			<p>商品購入画面</p>
		</div>
		<div id="section">
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
							<?php print $productprice;?>円(税込価格)</p>
					</td>
					<td>
						<p class="gap">購入個数:
							<?php print $productquantity;?>
						</p>
					</td>
					<td>
						<p class="gap">合計金額:
							<?php print $productprice*$productquantity;?>円</p>
					</td>
				</tr>
				<div id="buttonZone">
					<?php
					print '<form method="get" action="../cart/productCartin.php">';
					print '<input type="hidden" name="code" value="' . $productcode . '">';
					print '<input type="hidden" name="cnt" value="' . $productquantity . '">';
					print '<input type="submit" id="submitButton" value="買い物かごに入れる">';
					print '<input id="button" type="button" onclick="history.back()" value="前のページへ戻る">';
					print '</form>'
					?>
				</div>
			</div>
		</div>
	</div>
	<footer>
		<div id="footerInner">
			<a href="../../contactUs/contactInput.php">お問い合わせ</a>
			<a href="../../companyInfo/companyInfo3.php">会社概要と地域連携店一覧</a>
			<a href="../../companyInfo/companyInfo4.php">サービスご利用方法</a>
			<a href="../../companyInfo/companyInfo5.php">採用関連情報</a>
			<a href="../../companyInfo/companyInfo6.php">個人情報保護とご利用規約</a>
			<a href="../../companyInfo/companyInfo7.php">サイトマップ</a>
		</div>
	</footer>
</body>
</html>