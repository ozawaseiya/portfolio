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
<!doctype html>
<html lang="ja">
<head><!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WN5NLKS');</script>
<!-- End Google Tag Manager -->
	<meta charset="UTF-8N">
	<title>買い物かごの中</title>
	<link href="productCartLook.css" rel="stylesheet" type="text/css">
</head>

<body><!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WN5NLKS"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
	<header>
		<div id="headerInner">
			<a href="../../index/index.php"><img src="../../common/logo.png" alt="東三河幸せ宅配便" id="mainPhoto"></a>
			<img src="../../common/motto.png" alt="地元のおいしさと楽しみをご自宅にお届けいたします" id="mainMotto"/>
			<div id="shoppingCartZone">
				<a href="#"><img src="../../common/shoppingcart.png" alt="買い物かご" id="shoppingCart"/></a>
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
			<ul class="breadList">
				<li itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb">
					<a href="../../index/index.php" itemprop="url">
      <span itemprop="最初のページ">最初のページ></span>
    </a>
				

				</li>
				<li itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb">
					<a href="#" itemprop="url">
      <span itemprop="買い物かごの中">買い物かごの中</span>
    </a>
				

				</li>
			</ul>
		</div>
	</header>
	<div id="contents">
		<div id="mainTitle">
			<p>買い物かごの中</p>
		</div>
		<div id="section">
			<?php

			try {

				if ( isset( $_SESSION[ 'cart' ] ) == true ) {
					$cart = $_SESSION[ 'cart' ];
					$quantity = $_SESSION[ 'cnt' ];
					$max = count( $cart );
				} else {
					$max = 0;
				}
				?>
			<div id="noCartProduct">
				<?php
				if ( $max == 0 ) {
					print '<p>買い物かごの中に商品がありません。</p>';
					print '<br/>';
					print '<form action="../../product/productList/productList1.php" method="get">';
					print '<input id="wagashi1" type="submit" value="洋菓子・和菓子一覧へ">';
					print '</form>';
					print '<form action="../../product/productList/productList2.php" method="get">';
					print '<input id="drink2" type="submit" value="ドリンク一覧へ">';
					print '</form>';
					exit();
				}
				?>
			</div>
			<?php
			$dsn = 'mysql:dbname=aichi1990_shop;host=mysql7075.xserver.jp;charset=utf8';
			$user = 'aichi1990_shop';
			$password = 'a31706105';
			$dbh = new PDO( $dsn, $user, $password );
			$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

			foreach ( ( array )$cart as $key => $val ) {
				$sql = 'SELECT productname,companyname,price,imagecart FROM dat_product WHERE code=?';
				$stmt = $dbh->prepare( $sql );
				$data[ 0 ] = $val;
				$stmt->execute( $data );

				$rec = $stmt->fetch( PDO::FETCH_ASSOC );
				$productname[] = $rec[ 'productname' ];
				$companyname[] = $rec[ 'companyname' ];
				$productprice[] = $rec[ 'price' ];
				$productimagecart[] = $rec[ 'imagecart' ];

				if ( $rec[ 'imagecart' ] == '' ) {
					$productimagecart[] = '';
				} else {
					$productimagecart[] = '<img src="../../common/' . $rec[ 'imagecart' ] . '">';
				}
			}
			$dbh = null;
			}
			catch ( Exception $e ) {
				print 'ただいま障害により大変ご迷惑をお掛けしております。';
				exit();
			}
			?>

			<form method="post" action="productQuantityChange.php">
				<table id="tableList" border="1">
					<tr>
						<td class="tableTitle">商品</td>
						<td class="tableTitle">商品画像</td>
						<td class="tableTitle">販売店</td>
						<td class="tableTitle">商品価格</td>
						<td class="tableTitle">数量</td>
						<td class="tableTitle">合計</td>
						<td class="tableTitle">削除</td>
					</tr>
					<?php for($i=0;$i<$max;$i++)
	{
?>
					<tr>
						<td class="productInfo">
							<?php print $productname[$i];?>
						</td>
						<td id="imageCartBox">
							<?php print $productimagecart[2*$i+1];?>
						</td>
						<td class="productInfo">
							<?php print $companyname[$i];?>
						</td>
						<td class="productInfo">
							<?php print $productprice[$i];?>円</td>
						<td>
							<select id="reCounter" name="cnt<?php print $i; ?>" value="<?php print $quantity[$i];?>">
								<option <?php if($quantity[$i]=='1' ){echo( "selected");}?>>1</option>
								<option <?php if($quantity[$i]=='2' ){echo( "selected");}?>>2</option>
								<option <?php if($quantity[$i]=='3' ){echo( "selected");}?>>3</option>
								<option <?php if($quantity[$i]=='4' ){echo( "selected");}?>>4</option>
								<option <?php if($quantity[$i]=='5' ){echo( "selected");}?>>5</option>
								<option <?php if($quantity[$i]=='6' ){echo( "selected");}?>>6</option>
								<option <?php if($quantity[$i]=='7' ){echo( "selected");}?>>7</option>
								<option <?php if($quantity[$i]=='8' ){echo( "selected");}?>>8</option>
								<option <?php if($quantity[$i]=='9' ){echo( "selected");}?>>9</option>
								<option <?php if($quantity[$i]=='10' ){echo( "selected");}?>>10</option>
							</select>
						</td>
						<td class="productInfo">
							<?php print $productprice[$i]*$quantity[$i];?>円</td>
						<td><input type="checkbox" id="delete" name="delete<?php print $i;?>">
						</td>
					</tr>
					<?php
					}
					?>
					<?php
					for ( $i = 0; $i < $max; $i++ ) {
						$price = $productprice[ $i ] * $quantity[ $i ];
						$data = array( $price );

						global $pricetotal;
						$pricetotal += array_sum( $data );
					}
					?>
				</table>
				<div id="amountInfo">
					<p>ご購入商品の合計金額
						<?php $total=$pricetotal+300; print $total; ?>円</p>
				</div><br/>
				<p>*数量入力後、「変更する」で数量変更</p>
				<p>*最大数量は10個まで</p>
				<p>*送料は一律300円</p>
				<p>*削除欄のチェックボックスを押して「変更する」で削除</p>
				<br/>
				<input type="hidden" name="max" value="<?php print $max;?>">
				<input type="submit" id="submit" value="変更する"><br/>
				<input type="button" id="wagashi2" onclick="location.href='../../product/productList/productList1.php'" value="洋菓子・和菓子一覧へ"/>
				<input type="button" id="drink2" onclick="location.href='../../product/productList/productList2.php'" value="ドリンク一覧へ"/>
			</form>

			<?php
			if ( isset( $_SESSION[ "member_login" ] ) == false ) {
				print '<form action="../../login/memberRegister/infoInput.php" method="post">';
				print '<input type="submit" id="register" value="会員登録へ">';
				print '</form>';
			}
			?>
			<?php
			if ( isset( $_SESSION[ "member_login" ] ) == true ) {
				print '<form action="../purchase/productPurchaseInfoInput.php" method="post">';
				print '<input type="submit" id="purchase" value="商品購入へ">';
				print '</form>';
			}
			?>

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