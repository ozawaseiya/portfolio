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
	<title>数量変更・削除画面</title>
	<link href="productQuantityChange.css" rel="stylesheet" type="text/css">
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
			<ul class="breadList">
				<li itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb">
					<a href="../../index/index.php" itemprop="url">
      <span itemprop="最初のページ">最初のページ></span>
    </a>
				

				</li>
				<li itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb">
					<a href="productCartLook.php" itemprop="url">
      <span itemprop="買い物かごの中">買い物かごの中</span>
    </a>
				

				</li>
				<li itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb">
					<a href="#" itemprop="url">
      <span itemprop="数量変更・削除画面">数量変更・削除画面</span>
    </a>
				

				</li>
			</ul>
		</div>
	</header>
	<div id="contents">
		<div id="mainTitle">
			<p>数量変更・削除画面</p>
		</div>
		<div id="section">
			<?php

			require_once( '../../common/common.php' );

			$post = sanitize( $_POST );

			$max = $post[ 'max' ];
			for ( $i = 0; $i < $max; $i++ ) {
				if ( preg_match( "/[+-]?\d+/", $post[ 'cnt' . $i ] ) == 0 ) {
					print '<p>数量に誤りがあります。</p>';
					print '<form action="productCartLook.php" method="get">';
					print '<input type="submit" id="wrongButton" value="前のページへ戻る">';
					print '</form>';
					exit();
				}
				if ( $post[ 'cnt' . $i ] < 1 || 10 < $post[ 'cnt' . $i ] ) {
					print '<p>数量は最大10個までです。</p>';
					print '<form action="productCartLook.php" method="get">';
					print '<input type="submit" id="numberButton" value="前のページへ戻る">';
					print '</form>';
					exit();
				}
				$quantity[] = $post[ 'cnt' . $i ];
			}

			$cart = $_SESSION[ 'cart' ];

			for ( $i = $max; 0 <= $i; $i-- ) {
				if ( isset( $_POST[ 'delete' . $i ] ) == true ) {
					array_splice( $cart, $i, 1 );
					array_splice( $quantity, $i, 1 );
				}
			}

			$_SESSION[ 'cart' ] = $cart;
			$_SESSION[ 'cnt' ] = $quantity;

			header( 'Location:productCartLook.php' );
			exit();
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