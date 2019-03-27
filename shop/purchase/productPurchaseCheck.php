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
	<title>購入確認画面</title>
	<link href="productPurchaseCheck.css" rel="stylesheet" type="text/css">
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
			<ul class="breadList">
				<li itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb">
					<a href="../cart/productCartLook.php" itemprop="url">
      <span itemprop="買い物かごの中">買い物かごの中></span>
    </a>
				

				</li>
				<li itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb">
					<a href="productPurchaseInfoInput.php" itemprop="url">
      <span itemprop="購入情報入力画面">購入情報入力画面></span>
    </a>
				

				</li>
				<li itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb">
					<a href="productPurchaseCheck.php" itemprop="url">
      <span itemprop="購入確認画面">購入確認画面</span>
    </a>
				

				</li>
			</ul>
		</div>
	</header>
	<div id="contents">
		<div id="mainTitle">
			<p>購入確認画面</p>
		</div>
		<h3>以前登録されたフォームの情報を確認してください。</h3>
		<h4>＊下記のフォームに記載されている住所にのみ商品の配送が可能となります。ご了承願います。</h4>
		<div id="infoInput">
			<?php

			require_once( '../../common/common.php' );

			$post = sanitize( $_POST );

			$date = $post[ 'date' ];
			$time = $post[ 'time' ];
			$payment = $post[ 'pay' ];

			$code = $_SESSION[ 'member_code' ];

			$dsn = 'mysql:dbname=aichi1990_shop;host=mysql7075.xserver.jp;charset=utf8';
			$user = 'aichi1990_shop';
			$password = 'a31706105';
			$dbh = new PDO( $dsn, $user, $password );
			$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

			$sql = 'SELECT kanji,tel,email1,postal1,postal2,prefecture,address FROM dat_member WHERE code=?';
			$stmt = $dbh->prepare( $sql );
			$data[] = $code;
			$stmt->execute( $data );

			$rec = $stmt->fetch( PDO::FETCH_ASSOC );

			$dbh = null;

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
			print '<input type="text" id="mailLength" value="' . $email . '" required>';
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
			print '<input type="text" value="' . $address . '" id="addressWidth" required>';
			print '<br/><br/>';

			if ( isset( $_POST[ 'date' ] ) && $_POST[ 'date' ] == '' ) {
				print '日付を指定してください';
			}

			if ( isset( $_POST[ 'time' ] ) && $_POST[ 'time' ] == '' ) {
				print '時間帯を指定ください';
			}

			if ( isset( $_POST[ 'pay' ] ) && $_POST[ 'pay' ] == 'cash' ) {
				$payment = '代金引換';
				require_once( '../../common/common.php' );
				$post = sanitize( $_POST );
				$cardnumber = $post[ 'cardnumber' ];
				$cardvalidyear = $post[ 'cardvalidyear' ];
				$cardvalidmonth = $post[ 'cardvalidmonth' ];
				$cardnumber = NULL;
				$cardvalidyear = NULL;
				$cardvalidmonth = NULL;
			} else {
				$payment = 'クレジットカード';
				require_once( '../../common/common.php' );
				$post = sanitize( $_POST );
				$cardnumber = $post[ 'cardnumber' ];
				$cardvalidyear = $post[ 'cardvalidyear' ];
				$cardvalidmonth = $post[ 'cardvalidmonth' ];
			}
			$arrival1 = '日付:' . $date;
			$arrival2 = '時間帯:' . $time . '時頃';
			$arrival = '日付:' . $date . '&nbsp;&nbsp;時間帯:' . $time . '時頃';
			global $arrival;

			?>
			<table border="1">
				<tr>
					<td class="add">お支払い方法</td>
					<td class="data">
						<?php print $payment; ?>
					</td>
				</tr>
				<tr>
					<td class="add">配達日時</td>
					<td class="data">
						<?php print $arrival1; ?><br/>
						<?php print $arrival2; ?>
					</td>
				</tr>
			</table>
			<div id="buttonZone">
				<?php
				if ( isset( $_POST[ 'pay' ] ) && $_POST[ 'pay' ] == 'cash' ) {
					require_once( '../../common/common.php' );
					$post = sanitize( $_POST );
					$cardnumber = $post[ 'cardnumber' ];
					$cardvalidyear = $post[ 'cardvalidyear' ];
					$cardvalidmonth = $post[ 'cardvalidmonth' ];
					$cardnumber = NULL;
					$cardvalidyear = NULL;
					$cardvalidmonth = NULL;
					print '<form method="post" action="productPurchaseDone.php">';
					print '<input type="hidden" name="name" value="' . $name . '">';
					print '<input type="hidden" name="tel" value="' . $tel . '" >';
					print '<input type="hidden" name="email" value="' . $email . '">';
					print '<input type="hidden" name="postal1" value="' . $postal1 . '">';
					print '<input type="hidden" name="postal2" value="' . $postal2 . '">';
					print '<input type="hidden" name="prefecture" value="' . $prefecture . '">';
					print '<input type="hidden" name="address" value="' . $address . '">';
					print '<input type="hidden" name="arrival" value="' . $arrival . '">';
					print '<input type="hidden" name="payment" value="' . $payment . '">';
					print '<input type="hidden" name="cardnumber" value="' . $cardnumber . '">';
					print '<input type="hidden" name="cardvalidyear" value="' . $cardvalidyear . '" >';
					print '<input type="hidden" name="cardvalidmonth" value="' . $cardvalidmonth . '" >';
					print '<input type="submit" class="submit" value="注文を確定する">';
					print '</form>';
					print '<form method="post" action="productPurchaseInfoInput.php">';
					print '<input type="hidden" name="name" value="' . $name . '">';
					print '<input type="hidden" name="tel" value="' . $tel . '" >';
					print '<input type="hidden" name="email" value="' . $email . '">';
					print '<input type="hidden" name="postal1" value="' . $postal1 . '">';
					print '<input type="hidden" name="postal2" value="' . $postal2 . '">';
					print '<input type="hidden" name="prefecture" value="' . $prefecture . '">';
					print '<input type="hidden" name="address" value="' . $address . '">';
					print '<input type="hidden" name="arrival" value="' . $arrival . '">';
					print '<input type="hidden" name="payment" value="' . $payment . '">';
					print '<input type="hidden" name="cardnumber" value="' . $cardnumber . '">';
					print '<input type="hidden" name="cardvalidyear" value="' . $cardvalidyear . '" >';
					print '<input type="hidden" name="cardvalidmonth" value="' . $cardvalidmonth . '" >';
					print '<input type="submit" class="backButton" value="前のページへ戻る">';
					print '</form>';
				} else {
					if ( isset( $_POST[ 'pay' ] ) && $_POST[ 'pay' ] == 'card' && preg_match( "([0-9]{16})", $cardnumber ) == false ) {
						print '*カード番号を正確に入力してください。';
						print '<form method="post" action="productPurchaseInfoInput.php">';
						print '<input type="submit" class="backButton" value="前のページへ戻る">';
						print '</form>';
					} else {
						$cardnumber = md5( $cardnumber );
						require_once( '../../common/common.php' );
						$post = sanitize( $_POST );
						$cardnumber = $post[ 'cardnumber' ];
						$cardvalidyear = $post[ 'cardvalidyear' ];
						$cardvalidmonth = $post[ 'cardvalidmonth' ];
						print '<form method="post" action="productPurchaseDone.php">';
						print '<input type="hidden" name="name" value="' . $name . '">';
						print '<input type="hidden" name="tel" value="' . $tel . '" >';
						print '<input type="hidden" name="email" value="' . $email . '">';
						print '<input type="hidden" name="postal1" value="' . $postal1 . '">';
						print '<input type="hidden" name="postal2" value="' . $postal2 . '">';
						print '<input type="hidden" name="prefecture" value="' . $prefecture . '">';
						print '<input type="hidden" name="address" value="' . $address . '">';
						print '<input type="hidden" name="arrival" value="' . $arrival . '">';
						print '<input type="hidden" name="payment" value="' . $payment . '">';
						print '<input type="hidden" name="cardnumber" value="' . $cardnumber . '">';
						print '<input type="hidden" name="cardvalidyear" value="' . $cardvalidyear . '" >';
						print '<input type="hidden" name="cardvalidmonth" value="' . $cardvalidmonth . '" >';
						print '<input type="submit" class="submit" value="注文を確定する">';
						print '</form>';
						print '<form method="post" action="productPurchaseInfoInput.php">';
						print '<input type="hidden" name="name" value="' . $name . '">';
						print '<input type="hidden" name="tel" value="' . $tel . '" >';
						print '<input type="hidden" name="email" value="' . $email . '">';
						print '<input type="hidden" name="postal1" value="' . $postal1 . '">';
						print '<input type="hidden" name="postal2" value="' . $postal2 . '">';
						print '<input type="hidden" name="prefecture" value="' . $prefecture . '">';
						print '<input type="hidden" name="address" value="' . $address . '">';
						print '<input type="hidden" name="arrival" value="' . $arrival . '">';
						print '<input type="hidden" name="payment" value="' . $payment . '">';
						print '<input type="hidden" name="cardnumber" value="' . $cardnumber . '">';
						print '<input type="hidden" name="cardvalidyear" value="' . $cardvalidyear . '" >';
						print '<input type="hidden" name="cardvalidmonth" value="' . $cardvalidmonth . '" >';
						print '<input type="submit" class="backButton" value="前のページへ戻る">';
						print '</form>';
					}
				}
				?>
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