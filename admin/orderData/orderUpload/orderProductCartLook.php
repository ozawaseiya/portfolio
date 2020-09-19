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
	<title>商品一覧</title>
	<link href="orderProductCartLook.css" rel="stylesheet" type="text/css">
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
			<p>商品一覧</p>
		</div>
		<div id="textZone">
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
					print '<div id="noCart">';
					print '<p>買い物かごの中に商品がありません。</p>';
					print '<br/>';
					print '<a href="orderProductAdd.php">注文情報追加へ</a>';
					print '<br/><br/>';
					print '<a href="../orderList/orderList.php">注文管理情報一覧へ</a>';
					print '</div>';
					exit();
				}
				?>
			</div>
			<?php
			$dsn = 'mysql:host=portfolio-db.clfmlox1pztr.ap-northeast-1.rds.amazonaws.com;dbname=portfolio;charset=utf8';
			$user = 'portfolio';
			$password = 'portfolio2020';
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
					$productimagecart[] = '<img src="../../../common/' . $rec[ 'imagecart' ] . '">';
				}
			}
			$dbh = null;
			}
			catch ( Exception $e ) {
				print 'ただいま障害により大変ご迷惑をお掛けしております。';
				exit();
			}
			?>

			<form method="post" action="orderProductQuantityChange.php">
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
				<input type="submit" id="button1" value="変更する"><br/>
			</form>
			<div id="buttonZone">
				<?php
				print '<form action="orderProductAdd.php" method="post">';
				print '<input type="submit" id="button2" value="商品追加へ">';
				print '</form>';
				?>
				<?php
				print '<form action="orderAdd.php" method="post">';
				print '<input type="submit" id="button3" value="注文商品購入へ">';
				print '</form>';
				?>
				<input type="button" id="button4" onclick="history.back()" value="前のページへ戻る">
			</div>
		</div>
	</div>
	<footer>
	</footer>
</body>
</html>