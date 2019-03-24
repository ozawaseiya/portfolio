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
<head>
	<meta charset="UTF-8N">
	<title>東三河幸せ宅配便について</title>
	<link href="companyInfo1.css" rel="stylesheet" type="text/css">
</head>

<body>
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
						<a href="#">幸せ宅配便とは</a>
						<div class="menu">
							<ul class="menuInner">
								<li class="megaDrop1">
									<a href="companyInfo2.php">
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
      <span itemprop="幸せ宅配便とは">幸せ宅配便とは</span>
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
				<p>幸せ宅配便とは</p>
			</div>
			<div id="message">
				<p>私たち「東三河幸せ宅配便」は2018年11月1日から愛知県の東三河地方（豊橋市、豊川市、蒲郡市、新城市、田原市、設楽町、東栄町、豊根村）でネット通販宅配サービスを開始しました。<br/>県内の他地域に比べて便利に買い物を行うことが難しい東三河地方の方に地元の菓子類・ジュースをお届けしたく、ネット通販サービスを日々提供しております。有名なネット通販会社は国内全域を対象としており、全国的に有名なお菓子やジュースを購入することが可能です。逆に各地域の小規模な有名店のお菓子やジュースなどを購入することは非常に難しくなっています。私たちはその点に注目し、「地産地消」「地元経済活性化」をモットーとしてネット通販サービスを立ち上げました。もちろん当サイトが取り扱っている商品は全て地元の食材であり、地元の業者が加工しております。<br/>地元のおいしいものを笑顔でお届けしたい。ずっと地元の味を大事にしてもらいたいと私たちは考えています。「ちょっとあの店のシュークリームが食べたいが、遠くて行くことができない」という主婦の方、ご高齢者の方に心強いショッピングサイトがこの「東三河幸せ宅配便」です。<br/>
				</p>
			</div>
			<div id="shiawasetakuhai"><img src="../common/shiawasetakuhai.jpg" alt="幸せ宅配便">
			</div>
			<div id="backButtonZone">
				<input type="button" id="shiawaseLife" onclick="location.href='companyInfo2.php'" value="ご利用者の声">
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