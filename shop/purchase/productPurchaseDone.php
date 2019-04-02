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
	<title>ご注文完了画面</title>
	<link href="productPurchaseDone.css" rel="stylesheet" type="text/css">
	<script>
	</script>
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
      <span itemprop="購入確認画面">購入確認画面></span>
    </a>
				

				</li>
				<li itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb">
					<a href="productPurchaseDone.php" itemprop="url">
      <span itemprop="ご注文完了画面">ご注文完了画面</span>
    </a>
				

				</li>
			</ul>
		</div>
	</header>
	<div id="contents">
		<div id="mainTitle">
			<p>ご注文完了画面</p>
		</div>
		<div id="textContents">
			<?php
			try {

				require_once( '../../common/common.php' );

				$post = sanitize( $_POST );

				$name = $post[ 'name' ];
				$tel = $post[ 'tel' ];
				$email = $post[ 'email' ];
				$postal1 = $post[ 'postal1' ];
				$postal2 = $post[ 'postal2' ];
				$prefecture = $post[ 'prefecture' ];
				$address = $post[ 'address' ];
				$arrival = $post[ 'arrival' ];
				$payment = $post[ 'payment' ];
				$cardnumber = $post[ 'cardnumber' ];
				$cardvalidyear = $post[ 'cardvalidyear' ];
				$cardvalidmonth = $post[ 'cardvalidmonth' ];

				$cart = $_SESSION[ 'cart' ];
				$quantity = $_SESSION[ 'cnt' ];
				$max = count( $cart );

				$dsn = 'mysql:dbname=aichi1990_shop;host=mysql7075.xserver.jp;charset=utf8';
				$user = 'aichi1990_shop';
				$password = 'a31706105';
				$dbh = new PDO( $dsn, $user, $password );
				$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

				print $name . '様<br/><br/>';
				print 'ご注文ありがとうございました。<br/>';
				print $email . 'に確認メールを送付しましたのでご確認ください。<br/>';
				print '商品は以下の住所に発送させていただきます。<br/>';
				print $postal1 . '-' . $postal2 . '&nbsp;&nbsp;';
				print $prefecture . ':';
				print $address . '<br/><br/>';
				print 'お支払い方法：' . $payment . '<br/>';
				print '配達日時：' . $arrival . '<br/><br/>';

				for ( $i = 0; $i < $max; $i++ ) {
					$sql = 'SELECT productname,companyname,price FROM dat_product WHERE code=?';
					$stmt = $dbh->prepare( $sql );
					$data[ 0 ] = $cart[ $i ];
					$stmt->execute( $data );

					$rec = $stmt->fetch( PDO::FETCH_ASSOC );

					$productname = $rec[ 'productname' ];
					$companyname = $rec[ 'companyname' ];
					$productprice = $rec[ 'price' ];
					$amount[] = $productprice;
					$count = $quantity[ $i ];
					$total = $productprice * $count;

					print $productname . '<br/>';
					print $companyname . '<br/>';
					print $productprice . '円x';
					print $count . '個＝';
					print $total . '円<br/><br/>';

					$price = $productprice * $count;
					$data = array( $price );

					global $sumprice;
					$sumprice += array_sum( $data );

				}

				$sum = $sumprice + 300;
				print '商品総額：' . $sum . '円(送料300円込み価格)<br/>';

				$sql = 'LOCK TABLES dat_order WRITE,dat_order_product WRITE';
				$stmt = $dbh->prepare( $sql );
				$stmt->execute();

				$lastmembercode = $_SESSION[ 'member_code' ];
				global $lastmembercode;

				$sql = 'INSERT INTO dat_order(membercode,name,tel,email,postal1,postal2,prefecture,address,payment,arrival,cardnumber,cardvalidyear,cardvalidmonth)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)';

				$stmt = $dbh->prepare( $sql );
				$data = array();
				$data[] = $lastmembercode;
				$data[] = $name;
				$data[] = $tel;
				$data[] = $email;
				$data[] = $postal1;
				$data[] = $postal2;
				$data[] = $prefecture;
				$data[] = $address;
				$data[] = $payment;
				$data[] = $arrival;
				$data[] = $cardnumber;
				$data[] = $cardvalidyear;
				$data[] = $cardvalidmonth;
				$stmt->execute( $data );

				$sql = 'SELECT LAST_INSERT_ID()';
				$stmt = $dbh->prepare( $sql );
				$stmt->execute();
				$rec = $stmt->fetch( PDO::FETCH_ASSOC );
				$lastcode = $rec[ 'LAST_INSERT_ID()' ];

				for ( $i = 0; $i < $max; $i++ ) {
					$sql = 'INSERT INTO dat_order_product(ordercode,membercode,orderproduct,orderprice,orderquantity)VALUES(?,?,?,?,?)';
					$stmt = $dbh->prepare( $sql );
					$data = array();
					$data[] = $lastcode;
					$data[] = $lastmembercode;
					$data[] = $cart[ $i ];
					$data[] = $amount[ $i ];
					$data[] = $quantity[ $i ];
					$stmt->execute( $data );
				}

				$sql = 'UNLOCK TABLES';
				$stmt = $dbh->prepare( $sql );
				$stmt->execute();

				$dbh = null;


				$mailto = $post[ 'email' ]; //宛先メールアドレス
				$subject = "～東三河幸せ宅配便～ご注文ありがとうございます";
                                $subject .= ":".date('Y/m/d');
				$content = $name;

				$content .= "様";
				$content .= "\n\nご注文ありがとうございます。";
				$content .= "ご購入された商品の詳細情報等は後ほどメールでお送りいたします。\n";
				$content .= "\n今後とも弊社をよろしくお願いいたします。\n";
				$content .= "-------------------------------------------\n";
				$content .= "東三河幸せ宅配便\n";
				$content .= "本社所在地：愛知県豊川市大木町新町通297-8\n";
				$content .= "電話番号:0533-93-7378\n";
				$content .= "-------------------------------------------";

				$headers = <<<HEAD
From : ozawa.s2090227.1990@docomo.ne.jp //送信元メールアドレス
Return-Path: ozawa.s2090227.1990@docomo.ne.jp //送信元メールアドレス
Content-Type: text/plain;charset=ISO-2022-JP
HEAD;

				mb_send_mail( $mailto, $subject, $content, $headers );


			} catch ( Exception $e ) {
				print 'ただいま障害により大変ご迷惑をお掛けしております。';
				exit();
			}
			?>
			<div id="backButtonZone">
				<?php
				$cart = $_SESSION[ 'cart' ];

				for ( $i = $max; 0 <= $i; $i-- ) {
					if ( isset( $_SESSION[ 'cart' ] ) == true ) {
						array_splice( $cart, $i, 1 );
						array_splice( $quantity, $i, 1 );
					}
				}

				$_SESSION[ 'cart' ] = $cart;
				$_SESSION[ 'cnt' ] = $quantity;

				print '<form action="../cart/productCartLook.php" method="post">';
				print '<input type="submit" id="backButton" value="買い物かごの中へ">';
				print '</form>';
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