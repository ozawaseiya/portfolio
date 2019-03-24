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
	<title>会員登録完了画面</title>
	<link href="infoInputDone.css" rel="stylesheet" type="text/css">
	<script>
	</script>
</head>

<body>
	<header>
		<div id="headerInner">
			<a href="../../index/index.php"><img src="../../common/logo.png" alt="東三河幸せ宅配便" id="mainPhoto"></a>
			<img src="../../common/motto.png" alt="地元のおいしさと楽しみをご自宅にお届けいたします" id="mainMotto"/>
			<div id="shoppingCartZone">
				<a href="../../shop/cart/productCartLook.php"><img src="../../common/shoppingcart.png" alt="買い物かご" id="shoppingCart"/></a>
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
					<li><a href="../memberBranch.php">会員登録・ログイン</a>
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
					<a href="../memberBranch.php" itemprop="url">
      <span itemprop="会員登録・ログイン">会員登録・ログイン></span>
    </a>
				

				</li>
				<li itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb">
					<a href="infoInput.php" itemprop="url">
      <span itemprop="会員登録入力画面">会員登録入力画面></span>
    </a>
				

				</li>
				<li itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb">
					<a href="infoInputCheck.php" itemprop="url">
      <span itemprop="会員登録入力画面">会員登録確認画面></span>
    </a>
				

				</li>
				<li itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb">
					<a href="#" itemprop="url">
      <span itemprop="会員登録入力画面">会員登録完了画面</span>
    </a>
				

				</li>
			</ul>
		</div>
	</header>
	<div id="contents">
		<div id="mainTitle">
			<p>会員登録完了画面</p>
		</div>
		<div id="message">
			<?php

			try {

				require_once( '../../common/common.php' );

				$post = sanitize( $_POST );

				$memberpassword = $post[ 'password' ];
				$memberkanji = $post[ 'kanji' ];
				$memberfurigana = $post[ 'furigana' ];
				$membertel = $post[ 'tel' ];
				$memberemail1 = $post[ 'email1' ];
				$memberpostal1 = $post[ 'postal1' ];
				$memberpostal2 = $post[ 'postal2' ];
				$memberprefecture = $post[ 'prefecture' ];
				$memberaddress = $post[ 'address' ];

				print $memberkanji . '様<br/><br/>';
				print 'ご注文ありがとうございました。<br/>';
				print $memberemail1 . 'をメールアドレスに登録いたしました。<br/><br/>';
				print 'ご登録された住所は以下の通りです。<br/>';
				print $memberpostal1 . '-' . $memberpostal2 . '<br/>';
				print $memberprefecture . $memberaddress . '<br/><br/>';
				print 'ログインされる方は会員登録・ログインのページへお進みください。';

				$dsn = 'mysql:dbname=aichi1990_shop;host=mysql7075.xserver.jp;charset=utf8';
				$user = 'aichi1990_shop';
				$password = 'a31706105';
				$dbh = new PDO( $dsn, $user, $password );
				$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

				$sql = 'INSERT INTO dat_member(password, kanji, furigana, tel, email1, postal1, postal2, prefecture, address) VALUES (?,?,?,?,?,?,?,?,?)';
				$stmt = $dbh->prepare( $sql );
				$data[] = $memberpassword;
				$data[] = $memberkanji;
				$data[] = $memberfurigana;
				$data[] = $membertel;
				$data[] = $memberemail1;
				$data[] = $memberpostal1;
				$data[] = $memberpostal2;
				$data[] = $memberprefecture;
				$data[] = $memberaddress;
				$stmt->execute( $data );

				$dbh = null;

				print '<form method="post" action="../memberBranch.php">';
				print '<input type="submit" id="button3" value="会員登録・ログインへ">';
				print '</form>';

			} catch ( Exception $e ) {
				print 'ただいま障害により大変ご迷惑をおかけしております。';
				exit();
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