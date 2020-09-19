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
<head> 
	<meta charset="UTF-8N">
	<title>商品購入画面</title>
	<link href="productCartin.css" rel="stylesheet" type="text/css">
</head>

<body> 
	<header>
		<div id="headerInner">
			<a href="../../index/index.php"><img src="../../common/logo.png" alt="東三河幸せ宅配便" id="mainPhoto"></a>
			<img src="../../common/motto.png" alt="地元のおいしさと楽しみをご自宅にお届けいたします" id="mainMotto"/>
			<div id="shoppingCartZone">
				<a href="productCartLook.php"><img src="../../common/shoppingcart.png" alt="買い物かご" id="shoppingCart"/></a>
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
			<?php

			try {
				require_once( '../../common/common.php' );

				$get = sanitize( $_GET );

				$productcode = $get[ 'code' ];
				$productquantity = $get[ 'cnt' ];

				if ( isset( $_SESSION[ 'cart' ] ) == true ) {
					$cart = $_SESSION[ 'cart' ];
					$quantity = $_SESSION[ 'cnt' ];
					if ( in_array( $productcode, $cart ) == true ) {
						print '<p>その商品は買い物かごに入っています。</p><br/>';
						print '<div id="backButtonZone">';
						print '<form method="get" action="productCartLook.php">';
						print '<input type="submit" class="backButton" value="買い物かごの中を見る">';
						print '</form>';
						print '</div>';
						exit();
					}
				}

				$cart[] = $productcode;
				$quantity[] = $productquantity;
				$_SESSION[ 'cart' ] = $cart;
				$_SESSION[ 'cnt' ] = $quantity;


			} catch ( Exception $e ) {
				print '<p>ただいま障害により大変ご迷惑をお掛けしております。</p>';
				exit();
			}

			?>

			<div id="buttonZone">
				<p>買い物かごに追加しました。</p><br/>
				<?php
				print '<form method="get" action="productCartLook.php">';
				print '<input type="submit" id="submitButton" value="買い物かごの中を見る">';
				print '</form>'
				?>
				<input type="button" class="backButton" onclick="location.href='../../index/index.php';" value="前のページへ戻る"/>
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