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
	<title>ドリンク一覧</title>
	<link href="productList2.css" rel="stylesheet" type="text/css">
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
					<li><a href="productList1.php">洋菓子・和菓子</a>
					</li>
					<li><a href="#">ドリンク</a>
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
					<a href="#" itemprop="url">
      <span itemprop="ドリンク一覧">ドリンク一覧</span>
    </a>
				

				</li>
			</ul>
		</div>
	</header>
	<div id="section">
		<aside>
			<div id="shiawaseZoneBase">
				<div id="shiawaseZone">
					<img src="../../common/shiawaseZone.jpg" alt="ご利用者の声"/>
					<input type="button" id="shiawaseButton" onclick="location.href='../../companyInfo/companyInfo2.php'" value="ご利用者の声">
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
						<a href="https://twitter.com/shiawasetakuhai" target="_blank" rel="noopener"><img src="../../common/twitterButton.jpg" alt="twitterlogo"/></a>
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
				<p>ドリンク一覧</p>
			</div>
			<div id="item-list">
				<ul>
					<a href="../product5.php">
						<li id="box1"><img src="../../common/gamagorimikanjuice.jpg" alt="蒲郡みかんジュース"/>
							<div id="box1Info">
								<p>商品名：蒲郡みかんジュース</p>
								<p>販売業者：蒲郡農業組合協会</p>
								<p>価格：150円</p>
							</div>
						</li>
					</a>
					<a href="../product6.php">
						<li id="box2"><img src="../../common/toyonesoda.jpg" alt="豊根サイダー"/>
							<div id="box2Info">
								<p>商品名：豊根サイダー</p>
								<p>販売業者：豊根青年組合</p>
								<p>価格：120円</p>
							</div>
						</li>
					</a>
					<a href="../product7.php">
						<li id="box3"><img src="../../common/shinshirokenkojuice.jpg" alt="新城健康生活"/>
							<div id="box3Info">
								<p>商品名：新城健康生活</p>
								<p>販売業者：新城青年組合</p>
								<p>価格：130円</p>
							</div>
						</li>
					</a>
					<a href="../product8.php">
						<li id="box4"><img src="../../common/mikawawine.jpg" alt="三河ワイン"/>
							<div id="box4Info">
								<p>商品名：三河ワイン（赤ワイン）</p>
								<p>販売業者：岡崎農園組合</p>
								<p>価格：1280円</p>
							</div>
						</li>
					</a>
				</ul>
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