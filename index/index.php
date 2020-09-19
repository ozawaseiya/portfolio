<?php
session_start();
header( 'Expires:' );
header( 'Cache-Control:' );
header( 'Pragma:' );
if ( isset( $_SESSION[ 'member_login' ] ) == true ) {
	print $_SESSION[ 'member_kanji' ];
	print 'さんログイン中<br/>';
}
?>
<!doctype html>
<html lang="ja">
<head> 
	<meta charset="UTF-8N">
	<meta name="description" content="これはショッピングサイト東三河幸せ宅配便のサイトです。このショッピングサイトは愛知県内の東三河地方（豊橋市、豊川市、蒲郡市、新城市、田原市、設楽町、東栄町、豊根村）のお客様を対象にしています。私たちは東三河地方の方々に地元のおいしいお菓子・ジュースをお届けしたいと思い、ネット通販サービスを日々提供しております。当サイトが取り扱っている商品は全て地元の食材であり、地元の業者が加工しております。">
	</div>
	</div>
	<title>東三河のおいしいお菓子・スイーツ・ドリンク</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="index1.css" media="screen and (min-width: 481px)">
	<link rel="stylesheet" href="index2.css" media="screen and (max-width: 480px)">
	<link rel="stylesheet" type="text/css" href="slickBox/slick/slick.css"/>
	<link rel="stylesheet" type="text/css" href="slickBox/slick/slick-theme.css"/>
</head>
<body> 
	<header>
		<div id="headerInner">
			<a href="#"><img src="../common/logo.png" alt="東三河幸せ宅配便" id="mainPhoto"></a>
			<img src="../common/motto.png" alt="地元のおいしさと楽しみをご自宅にお届けいたします" id="mainMotto"/>
			<div id="shoppingCartZone">
				<a href="../shop/cart/productCartLook.php"><img src="../common/shoppingcart.png" alt="買い物かご" id="shoppingCart"/></a>
			</div>
			<div id="hamburgar">
				<div id="navDrawer">
					<input id="navInput" type="checkbox" class="navUnshown">
					<label id="navOpen" for="navInput"><span></span></label>
					<label class="navUnshown" id="navClose" for="navInput"></label>
					<div id="navContent">
						<ul id="contentInner">
							<li>
								<a href="../companyInfo/companyInfo2.php">
									<p>ご利用者の声</p>
								</a>
							</li>
							<li>
								<a href="../companyInfo/companyInfo3.php">
									<p>会社概要と地域連携店一覧</p>
									</a</li>
									<li>
										<a href="../companyInfo/companyInfo4.php">
											<p>サービスご利用方法</p>
										</a>
									</li>
						</ul>
					</div>
				</div>
			</div>
			<nav id="gnav">
				<ul id="gNavi">
					<li id="indexPage"><a href="#">最初のページへ</a>
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
					<li>
						<a href="../login/memberBranch.php">会員登録・ログイン</a>
					</li>
				</ul>
			</nav>
			<ul class="breadList">
				<li itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb">
					<a href="#" itemprop="url">
      <span itemprop="最初のページ">最初のページ</span>
    </a>
	</li>			

<li>
					<?php
					if ( isset( $_SESSION[ 'member_login' ] ) == true ) {
						print '<div id="logOut"><a href="../login/memberLogin/memberLogout.php"><p>ログアウトする</p></a></div>';
					}
					?>

				</li>

			</ul>

		</div>
	</header>
	<div id="section">
		<aside>
			<div id="shiawaseZoneBase">
				<div id="shiawaseZone">
					<img src="../common/shiawaseZone.jpg" alt="ご利用者の声"/>
					<input type="button" id="shiawaseButton" onclick="location.href='../companyInfo/companyInfo2.php'" value="ご利用者の声">
				</div>
			</div>
			<div id="contactZoneBase">
				<div id="contactZone">
					<div id="contactBoard">
						<p>電話・メールでのご注文</p>
					</div>
					<div id="contactInfo">
						<p>電話:0533-83-7378</p>
						<p>受付時間:10:00-18:00</p>
						<p>(祝日不可)</p>
						<p>メールアドレス:</p>
						<p>shiawase@co.jp</p>
					</div>
				</div>
			</div>
			<div id="twitterZoneBase">
				<div id="twitterZone">
					<div id="twitterBoard">
						<p>公式Twitter情報</p>
					</div>
					<div id="twitterFollow">
						<a href="https://twitter.com/shiawasetakuhai" target="_blank" rel="noopener"><img src="../common/twitterButton.jpg" alt="twitterlogo"/></a>
						<a href="https://twitter.com/shiawasetakuhai?ref_src=twsrc%5Etfw" class="twitter-follow-button" data-show-count="false">Follow @shiawasetakuhai</a>
						<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
					</div>
					<div id="twitterInfo">
						<p>新商品情報が満載！</p>
						<p>毎週月曜日に更新！</p>
					</div>
				</div>
			</div>
		</aside>
		<div id="contents">
			<div id="frameZone">
				<div id="frame">
					<section class="lazy slider">
						<div>
							<a href="../product/product1.php"><img src="../common/mainPhotonamacreamroll.jpg" alt="生クリームロール"></a>
						</div>
						<div>
							<a href="../product/product3.php"><img src="../common/mainPhotookazakimiso.jpg" alt="岡崎味噌まんじゅう"></a>
						</div>
						<div>
							<a href="#"><img src="../common/mainPhotoshiotsumacaron.jpg" alt="塩津の塩マカロン"></a>
						</div>
						<div>
							<a href="../product/product4.php"><img src="../common/mainPhotopremiumshu.jpg" alt="プレミアムシュー"></a>
						</div>
					</section>
				</div>
				<div id="campaign">
					<img src="../common/campaign.jpg" alt="新しいキャンペーン"/>
				</div>
			</div>
			<div id="ranking">
				<div id="mainTitle">
					<p>人気商品ランキング１～３位</p>
				</div>
				<div id="snackranking">
					<?php
					try {

						$dsn = 'mysql:host=portfolio-db.clfmlox1pztr.ap-northeast-1.rds.amazonaws.com;dbname=portfolio;charset=utf8';
						$user = 'portfolio';
						$password = 'portfolio2020';
						$dbh = new PDO( $dsn, $user, $password );
						$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

						$sql = 'SELECT orderproduct, sum(orderquantity) FROM `dat_order_product` where orderproduct between 0 and 3 group by orderproduct order by sum(orderquantity) DESC LIMIT 3';
						$stmt = $dbh->prepare( $sql );
						$stmt->execute();

						while ( $rec = $stmt->fetch( PDO::FETCH_ASSOC ) ) {
							$ranking[] = $rec[ 'orderproduct' ];
						}

						$sql = 'SELECT productname,price,rankingimage FROM `dat_product` WHERE code=?';
						$stmt = $dbh->prepare( $sql );
						$data[ 0 ] = $ranking[ 0 ];
						$stmt->execute( $data );

						$ranking1 = $ranking[ 0 ];
						global $ranking1;

						$sql = "SELECT productname,price,rankingimage FROM `dat_product` WHERE code=$ranking1";
						$stmt = $dbh->prepare( $sql );
						$stmt->execute( $data );

						while ( $rec = $stmt->fetch( PDO::FETCH_ASSOC ) ) {
							$rankingproductname1 = $rec[ 'productname' ];
							$rankingprice1 = $rec[ 'price' ];
							$rankingimage1 = '<img src="../common/' . $rec[ 'rankingimage' ] . '">';

							global $rankingproductname1;
							global $rankingprice1;
							global $rankingimage1;
						}

						$ranking2 = $ranking[ 1 ];
						global $raking2;

						$sql = "SELECT productname,price,rankingimage FROM `dat_product` WHERE code=$ranking2";
						$stmt = $dbh->prepare( $sql );
						$stmt->execute( $data );

						while ( $rec = $stmt->fetch( PDO::FETCH_ASSOC ) ) {
							$rankingproductname2 = $rec[ 'productname' ];
							$rankingprice2 = $rec[ 'price' ];
							$rankingimage2 = '<img src="../common/' . $rec[ 'rankingimage' ] . '">';
						}

						$ranking3 = $ranking[ 2 ];
						global $ranking3;

						$sql = "SELECT productname,price,rankingimage FROM `dat_product` WHERE code=$ranking3";
						$stmt = $dbh->prepare( $sql );
						$stmt->execute( $data );

						while ( $rec = $stmt->fetch( PDO::FETCH_ASSOC ) ) {
							$rankingproductname3 = $rec[ 'productname' ];
							$rankingprice3 = $rec[ 'price' ];
							$rankingimage3 = '<img src="../common/' . $rec[ 'rankingimage' ] . '">';
						}

						$sql = 'SELECT orderproduct, sum(orderquantity) FROM `dat_order_product` where orderproduct between 4 and 7 group by orderproduct order by sum(orderquantity) DESC LIMIT 3';
						$stmt = $dbh->prepare( $sql );
						$stmt->execute();

						while ( $rec = $stmt->fetch( PDO::FETCH_ASSOC ) ) {
							$ranking[] = $rec[ 'orderproduct' ];
						}

						$sql = 'SELECT productname,price,rankingimage FROM `dat_product` WHERE code=?';
						$stmt = $dbh->prepare( $sql );
						$data[ 0 ] = $ranking[ 0 ];
						$stmt->execute( $data );

						$ranking4 = $ranking[ 3 ];
						global $ranking4;

						$sql = "SELECT productname,price,rankingimage FROM `dat_product` WHERE code=$ranking4";
						$stmt = $dbh->prepare( $sql );
						$stmt->execute( $data );

						while ( $rec = $stmt->fetch( PDO::FETCH_ASSOC ) ) {
							$rankingproductname4 = $rec[ 'productname' ];
							$rankingprice4 = $rec[ 'price' ];
							$rankingimage4 = '<img src="../common/' . $rec[ 'rankingimage' ] . '">';
						}

						$ranking5 = $ranking[ 4 ];
						global $ranking5;

						$sql = "SELECT productname,price,rankingimage FROM `dat_product` WHERE code=$ranking5";
						$stmt = $dbh->prepare( $sql );
						$stmt->execute( $data );

						while ( $rec = $stmt->fetch( PDO::FETCH_ASSOC ) ) {
							$rankingproductname5 = $rec[ 'productname' ];
							$rankingprice5 = $rec[ 'price' ];
							$rankingimage5 = '<img src="../common/' . $rec[ 'rankingimage' ] . '">';
						}

						$ranking6 = $ranking[ 5 ];
						global $ranking6;

						$sql = "SELECT productname,price,rankingimage FROM `dat_product` WHERE code=$ranking6";
						$stmt = $dbh->prepare( $sql );
						$stmt->execute( $data );

						while ( $rec = $stmt->fetch( PDO::FETCH_ASSOC ) ) {
							$rankingproductname6 = $rec[ 'productname' ];
							$rankingprice6 = $rec[ 'price' ];
							$rankingimage6 = '<img src="../common/' . $rec[ 'rankingimage' ] . '">';
						}

						$dbh = null;

					} catch ( Exception $e ) {
						print 'ただいま障害により大変ご迷惑をお掛けしております。';
						exit();
					}
					?>
					<div id="board1">
						<p>和菓子・洋菓子部門</p>
					</div>
					<ul class="board">
						<li class="rank1"><img src="../common/No.1.png" alt="ランキング1位"/>
							<?php
							print '<a href="../product/product' . ( $ranking1 + 1 ) . '.php">';
							print $rankingimage1;
							print $rankingproductname1 . '&nbsp;&nbsp;';
							print $rankingprice1 . '円';
							print '</a>';
							?>
						</li>
						<li class="rank2">
							<img src="../common/No.2.png" alt="ランキング2位"/>
							<?php
							print '<a href="../product/product' . ( $ranking2 + 1 ) . '.php">';
							print $rankingimage2;
							print $rankingproductname2 . '&nbsp;&nbsp;';
							print $rankingprice2 . '円';
							print '</a>';
							?>
						</li>
						<li class="rank3"><img src="../common/No.3.png" alt="ランキング3位"/>
							<?php
							print '<a href="../product/product' . ( $ranking3 + 1 ) . '.php">';
							print $rankingimage3;
							print $rankingproductname3 . '&nbsp;&nbsp;';
							print $rankingprice3 . '円';
							print '</a>';
							?>
						</li>
					</ul>
				</div>
				<div id="drinkranking">
					<div id="board2">
						<p>ドリンク部門</p>
					</div>
					<ul class="board">
						<li class="rank1"><img src="../common/No.1.png" alt="ランキング1位"/>
							<?php
							print '<a href="../product/product' . ( $ranking4 + 1 ) . '.php">';
							print $rankingimage4;
							print $rankingproductname4 . '&nbsp;&nbsp;';
							print $rankingprice4 . '円';
							print '</a>';
							?>
						</li>
						<li class="rank2"><img src="../common/No.2.png" alt="ランキング2位"/>
							<?php
							print '<a href="../product/product' . ( $ranking5 + 1 ) . '.php">';
							print $rankingimage5;
							print $rankingproductname5 . '&nbsp;&nbsp;';
							print $rankingprice5 . '円';
							print '</a>';
							?>
						</li>
						<li class="rank3"><img src="../common/No.3.png" alt="ランキング3位"/>
							<?php
							print '<a href="../product/product' . ( $ranking6 + 1 ) . '.php">';
							print $rankingimage6;
							print $rankingproductname6 . '&nbsp;&nbsp;';
							print $rankingprice6 . '円';
							print '</a>';
							?>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<footer>
		<div id="footerInner">
			<a href="../contactUs/contactInput.php">お問い合わせ</a>
			<a href="../companyInfo/companyInfo3.php">会社概要と地域連携店一覧</a>
			<a href="../companyInfo/companyInfo4.php">サービスご利用方法</a>
			<a href="../companyInfo/companyInfo5.php">採用関連情報</a>
			<a href="../companyInfo/companyInfo6.php">個人情報保護とご利用規約</a>
			<a href="../companyInfo/companyInfo7.php">サイトマップ</a>
		</div>
	</footer>
	<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
	<script src="slickBox/slick/slick.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript" src="index.js">
	</script>
</body>
</html>