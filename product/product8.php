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
	<title>ドリンク</title>
	<link href="1style8.css" rel="stylesheet" type="text/css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.7.1/css/lightbox.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-1.12.4.min.js" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.7.1/js/lightbox.min.js" type="text/javascript"></script>
	<script src="1script8.js"></script>
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
					<li><a href="productList/productList1.php">洋菓子・和菓子</a>
					</li>
					<li><a href="productList/productList2.php">ドリンク</a>
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
					<a href="productList/productList2.php" itemprop="url">
      <span itemprop="ドリンク一覧">ドリンク一覧></span>
    </a>
				

				</li>
				<li itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb">
					<a href="#" itemprop="url">
      <span itemprop="ドリンク">ドリンク</span>
    </a>
				

				</li>
			</ul>
		</div>
	</header>
	<div id="contents">
		<div id="mainTitle">
			<p>ドリンク</p>
		</div>
		<div id="sub1">
			<div id="productPicture"><a href="../common/mikawawinebig.jpg" data-lightbox="abc" data-title="拡大画像（右側の×ボタンをクリックすると戻ります）"><img src="../common/mikawawine.jpg" alt="三河ワイン">
</a>
			</div>
			<p>この商品画像をクリックすると画像が拡大します</p>
			<div id="counterZone">
				<?php
				print '<form method="get" action="../shop/counts/productCount.php">';
				print '&nbsp;&nbsp;&nbsp;&nbsp;希望購入個数<select name="cnt">';
				print '<option value="1" selected>1</option>';
				print '<option value="2">2</option>';
				print '<option value="3">3</option>';
				print '<option value="4">4</option>';
				print '<option value="5">5</option>';
				print '<option value="6">6</option>';
				print '<option value="7">7</option>';
				print '<option value="8">8</option>';
				print '<option value="9">9</option>';
				print '<option value="10">10</option>';
				print '</select>個';
				print '<input type="hidden" name="code" value="7">';
				print '<input id="kago" type="submit" value="この商品を選択する">';
				print '<input id="button" type="button" onclick="history.back()" value="前のページへ戻る">';
				print '</form>';
				?>
			</div>
		</div>
		<section>
			<h3>商品情報</h3>
			<table>
				<tr>
					<th>商品名</th>
					<td>:三河ワイン（赤ワイン)</td>
				</tr>
				<tr>
					<th>価格</th>
					<td>:1280円(税込価格)</td>
				</tr>
				<tr>
					<th>容量</th>
					<td>:1本 750ml</td>
				</tr>
				<tr>
					<th>生産者名</th>
					<td>:岡崎農園組合</td>
				</tr>
				<tr>
					<th>商品重量</th>
					<td>:1170g</td>
				</tr>
				<tr>
					<th>サイズ</th>
					<td>:高さ×幅×奥行 298mm×78㎜×78㎜</td>
				</tr>
				<tr>
					<th>容器</th>
					<td>:ワイン瓶</td>
				</tr>
				<tr>
					<th>商品紹介</th>
					<td>:デラウェアのもつブドウ本来の酸味とフルーティーな味わいを楽しめます。アルコール度数：14%</td>
				</tr>
				<tr>
					<th>原材料名</th>
					<td>:岡崎産デラウェア酸化防止剤(亜硫酸塩)、保存料(ソルビン酸)</td>
				</tr>
				<tr>
					<th>栄養成分表示</th>
					<td>:1ロールあたりエネルギー：73kcal、たんぱく質：0.16g、脂質：0g、淡水化物：1.2g</td>
				</tr>
			</table>
		</section>
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
</body>
</html>