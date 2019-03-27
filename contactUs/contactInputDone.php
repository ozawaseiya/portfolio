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
	<title>登録完了画面</title>
	<link href="contactInputDone.css" rel="stylesheet" type="text/css">
	<script>
	</script>
</head>

<body><!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WN5NLKS"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
	<header>
		<div id="headerInner">
			<a href="../index/index.php"><img src="../common/logo.png" alt="東三河幸せ宅配便" id="mainPhoto"></a>
			<img src="../common/motto.png" alt="地元のおいしさと楽しみをご自宅にお届けいたします" id="mainMotto"/>
			<div id="shoppingCartZone">
				<a href="../shop/cart/productCartLook.php"><img src="../common/shoppingcart.png" alt="買い物かご" id="shoppingCart"/></a>
			</div>
			<nav id="gnav">
				<ul id="gNavi">
					<li><a href="../index/index.php">最初のページへ</a>
					</li>
					<li><a href="../product/productList/productList1.php">洋菓子・和菓子</a>
					</li>
					<li><a href="../product/productList/productList2.php">ドリンク</a>
					</li>
					<li class="toggle">
						<a href="../companyInfo/companyInfo1.php">幸せ宅配便とは</a>
						<div class="menu">
							<ul class="menuInner">
								<li class="megaDrop1">
									<a href="../companyInfo/companyInfo2.php">
										<p>ご利用者の声</p>
									</a>
								</li>
								<li class="megaDrop1">
									<a href="../companyInfo/companyInfo3.php">
										<p>会社概要と地域連携店一覧</p>
									</a>
								</li>
								<li class="megaDrop1">
									<a href="../companyInfo/companyInfo4.php">
										<p>サービスご利用方法</p>
									</a>
								</li>
							</ul>
						</div>
					</li>
					<li><a href="../login/memberBranch.php">会員登録・ログイン</a>
					</li>
				</ul>
			</nav>
			<ul class="breadList">
				<li itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb">
					<a href="../index/index.php" itemprop="url">
      <span itemprop="最初のページ">最初のページ></span>
    </a>
				

				</li>
				<li itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb">
					<a href="contactInput.php" itemprop="url">
      <span itemprop="お問い合わせ情報入力画面">お問い合わせ情報入力画面></span>
    </a>
				

				</li>
				<li itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb">
					<a href="contactInputCheck.php" itemprop="url">
      <span itemprop="入力確認画面">入力確認画面></span>
    </a>
				

				</li>
				<li itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb">
					<a href="#" itemprop="url">
      <span itemprop="登録完了画面">登録完了画面</span>
    </a>
				

				</li>
			</ul>
		</div>
	</header>
	<div id="contents">
		<div id="mainTitle">
			<p>登録完了画面</p>
		</div>
		<div id="message">
			<?php
			try {

				require_once( '../common/common.php' );

				$post = sanitize( $_POST );

				$contactkanji = $post[ 'kanji' ];
				$contactfurigana = $post[ 'furigana' ];
				$contacttel = $post[ 'tel' ];
				$contactemail1 = $post[ 'email1' ];
				$contactinquiry = $post[ 'inquiry' ];

				$dsn = 'mysql:dbname=aichi1990_shop;host=mysql7075.xserver.jp;charset=utf8';
				$user = 'aichi1990_shop';
				$password = 'a31706105';
				$dbh = new PDO( $dsn, $user, $password );
				$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

				$sql = 'INSERT INTO dat_inquiry (kanji, furigana, tel, email1, inquiry) VALUES (?,?,?,?,?)';
				$stmt = $dbh->prepare( $sql );
				$data[] = $contactkanji;
				$data[] = $contactfurigana;
				$data[] = $contacttel;
				$data[] = $contactemail1;
				$data[] = $contactinquiry;
				$stmt->execute( $data );

				$dbh = null;

				print $contactkanji . '様<br/><br/>';
				print 'お問い合わせフォームをお送りいただきありがとうございました。<br/>';
				print $contactemail1 . 'をメールアドレスに登録いたしました。<br/>';
				print '後日、お問い合わせフォームの内容の回答をお送りいたします。';

				print '<div id="buttonZone"><form method="post" action="../index/index.php">';
				print '<input type="submit" id="button3" value="最初のページへ">';
				print '</form></div>';

			} catch ( Exception $e ) {
				print 'ただいま障害により大変ご迷惑をおかけしております。';
				exit();
			}
			?>
		</div>
	</div>
	<footer>
		<div id="footerInner">
			<a href="contactInput.php">お問い合わせ</a>
			<a href="../companyInfo/companyInfo3.php">会社概要と地域連携店一覧</a>
			<a href="../companyInfo/companyInfo4.php">サービスご利用方法</a>
			<a href="../companyInfo/companyInfo5.php">採用関連情報</a>
			<a href="../companyInfo/companyInfo6.php">個人情報保護とご利用規約</a>
			<a href="../companyInfo/companyInfo7.php">サイトマップ</a>
		</div>
	</footer>
</body>
</html>