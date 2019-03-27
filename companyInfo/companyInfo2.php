<?php
session_start();
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
	<title>幸せ宅配便ライフ</title>
	<link href="companyInfo2.css" rel="stylesheet" type="text/css">
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
						<a href="companyInfo1.php">幸せ宅配便とは</a>
						<div class="menu">
							<ul class="menuInner">
								<li class="megaDrop1">
									<a href="#">
										<p>ご利用者の声</p>
									</a>
								</li>
								<li class="megaDrop1">
									<a href="companyInfo3.php">
										<p>会社概要と地域連携店一覧</p>
									</a>
								</li>
								<li class="megaDrop1">
									<a href="companyInfo4.php">
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
					<a href="#" itemprop="url">
      <span itemprop="ご利用者の声">ご利用者の声</span>
    </a>
				

				</li>
			</ul>
		</div>
	</header>
	<div id="section">
		<aside>
			<div id="shiawaseZoneBase">
				<div id="shiawaseZone">
					<img src="../common/shiawaseZone.jpg" alt="ご利用者の声"/>
					<input type="button" id="shiawaseButton" onclick="location.href='companyInfo2.php'" value="ご利用者の声">
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
			<div id="mainTitle">
				<p>ご利用者の声</p>
			</div>
			<div id="shiawaseOtodokeLife">
				<div id="suzuki">
					<img src="../common/suzukitakae.jpg" alt="S・T様"/>
					<p class="rightMessage">車がなくてもおいしいお菓子がすぐに手に入る<br/>主婦74歳　S.T様</p>
					<div class="customerMessage">
						<p>月5回ほど幸せ宅配便を利用しています。車の運転を辞めてから行動範囲が一気に狭くなってしまい、甘いものが大好きな私は最寄りのスーパーのお菓子コーナーだけしか商品の選択肢がなくなってしまいました。でも、この東三河幸せ宅配便の利用を始めてから以前からよく利用していた設楽若松屋のお菓子を再び楽しめるようになり、今では近所の友達に声掛けし茶話会をしています。こんな楽しみ方もあったなんて幸せです。</p>
					</div>
				</div>
				<div id="kidokoro">
					<img src="../common/kidokorokaori.jpg" alt="K・K様"/>
					<p class="rightMessage">育児・家事でいつも忙しい私にもピッタリ！！<br/>主婦43歳　K.K様</p>
					<div class="customerMessage">
						<p>育児・家事と仕事を両立しており、なかなか時間に余裕がない私にとって東三河幸せ宅配便は大好きなお菓子を楽々注文できてしかも自宅まで送り届けてくれる嬉しいサービスです。いつでも地元のおいしいお菓子を食べられて親子三世代で喜んでいます。</p>
					</div>
				</div>
			</div>
			<div id="backButtonZone">
				<input type="button" id="serviceButton" onclick="location.href='companyInfo4.php'" value="サービスご利用方法">
				<input id="backButton" type="button" onclick="history.back()" value="前のページへ戻る">
			</div>
		</div>
	</div>
	<footer>
		<div id="footerInner">
			<a href="../contactUs/contactInput.php">お問い合わせ</a>
			<a href="companyInfo3.php">会社概要と地域連携店一覧</a>
			<a href="companyInfo4.php">サービスご利用方法</a>
			<a href="companyInfo5.php">採用関連情報</a>
			<a href="companyInfo6.php">個人情報保護とご利用規約</a>
			<a href="companyInfo7.php">サイトマップ</a>
		</div>
	</footer>
</body>
</html>