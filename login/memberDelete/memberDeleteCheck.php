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
	<title>会員登録削除確認画面</title>
	<link href="memberDeleteCheck.css" rel="stylesheet" type="text/css">
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
					<a href="memberDelete.php" itemprop="url">
      <span itemprop="会員登録削除画面">会員登録削除画面></span>
    </a>
				


				</li>
				<li itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb">
					<a href="#" itemprop="url">
      <span itemprop="会員登録削除確認画面">会員登録削除確認画面</span>
    </a>
				


				</li>
			</ul>
		</div>
	</header>
	<div id="contents">
		<div id="mainTitle">
			<p>会員登録削除確認画面</p>
		</div>
		<div id="messageBox">
			<?php
			try {

				require_once( '../../common/common.php' );

				$post = sanitize( $_POST );
				$memberemail1 = $post[ 'email1' ];
				$memberpassword = $post[ 'password' ];

				$memberpassword = crypt($memberpassword,PASSWORD_DEFAULT);

				$dsn = 'mysql:dbname=aichi1990_shop;host=mysql7075.xserver.jp;charset=utf8';
				$user = 'aichi1990_shop';
				$password = 'a31706105';
				$dbh = new PDO( $dsn, $user, $password );
				$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

				$sql = 'SELECT code,kanji,tel,email1,postal1,postal2,prefecture,address FROM dat_member WHERE email1=? AND password=?';
				$stmt = $dbh->prepare( $sql );
				$data[] = $memberemail1;
				$data[] = $memberpassword;
				$stmt->execute( $data );

				$dbh = null;

				$rec = $stmt->fetch( PDO::FETCH_ASSOC );

				if ( $rec == false ) {
					print 'メールアドレス又はパスワードが間違っています。<br/>';
					print '<form action="memberDelete.php" method="get">';
					print '<input type="submit" id="loginSubmit" value="会員登録削除へ">';
					print '</form>';
				} else {

					$code = $rec[ 'code' ];
					$name = $rec[ 'kanji' ];
					$tel = $rec[ 'tel' ];
					$email = $rec[ 'email1' ];
					$postal1 = $rec[ 'postal1' ];
					$postal2 = $rec[ 'postal2' ];
					$prefecture = $rec[ 'prefecture' ];
					$address = $rec[ 'address' ];


					print 'お名前<br/>';
					print '<input type="text" value="' . $name . '" required>';
					print '<br/><br/>';

					print '電話番号<br/>';
					print '<input type="text" value="' . $tel . '" required>';
					print '<br/><br/>';

					print 'メールアドレス<br/>';
					print '<input type="text" class="wideBox" value="' . $email . '" required>';
					print '<br/><br/>';

					print '郵便番号<br/>';
					print '<input type="text" value="' . $postal1 . '" required>';
					print '-';
					print '<input type="text" value="' . $postal2 . '" required>';
					print '<br/><br/>';

					print '都道府県<br/>';
					print '<input type="text" value="' . $prefecture . '" required>';
					print '<br/><br/>';

					print '住所<br/>';
					print '<input type="text" class="wideBox" value="' . $address . '" required>';
					print '<br/><br/>';

					print '<form method="post" action="memberDeleteDone.php">';
					$_SESSION[ 'member_code' ] = $rec[ 'code' ];
					print '<input type="submit" value="会員登録削除へ" id="submitButton">';
					print '</form>';

				}
			} catch ( EXCEPTION $e ) {
				print 'ただいま障害により大変ご迷惑をお掛けしております。';
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