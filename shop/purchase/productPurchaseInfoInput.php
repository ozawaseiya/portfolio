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
	<title>購入情報入力画面</title>
	<link href="productPurchaseInfoInput.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css">
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
					<a href="#" itemprop="url">
      <span itemprop="購入情報入力画面">購入情報入力画面</span>
    </a>
				

				</li>
			</ul>
		</div>
	</header>
	<div id="contents">
		<div id="mainTitle">
			<p>購入情報入力画面</p>
		</div>
		<h3>商品お届け日時およびお支払い方法を指定してください。</h3>

		<div id="infoInput">
			<?php
			$code = $_SESSION[ 'member_code' ];
			$quantity = $_SESSION[ 'cnt' ];
			?>
			<form method="post" action="productPurchaseCheck.php">
				<div id="shipmentDate">
					<span class="attention">[必須]</span>発送予定日時<br/>
					<input type="text" id="inputDate" name="date" height="40px" autocomplete="off" required>
					<select name="time" id="timeNumber" required>
						<option value="10" selected>10</option>
						<option value="12">12</option>
						<option value="14">14</option>
						<option value="16">16</option>
						<option value="18">18</option>
						<option value="20">20</option>
					</select>
					時頃
				</div><br/>
				<div id="payment">
					<span class="attention">[必須]</span>お支払方法（選択)<br/><br/>
					<div id="radioButton">
						<input type="radio" name="pay" value="card" checked="checked" onclick="display()">クレジットカード払い<br>
						<input type="radio" name="pay" value="cash" onclick="nondisplay()">代金引換<br>
					</div><br/><br/>
					<div id="cardData">
						<span class="attention">[必須]</span>カード情報入力<br/>
						<input type="text" pattern="\d*" name="cardnumber" id="cardNumberInput" height="40px" maxlength="16" autocomplete="off">カード番号<br/><br/>
						<select name="cardvalidyear" id="cardValidYear" height="40px">
							<option value="2019">2019</option>
							<option value="2020">2020</option>
							<option value="2021">2021</option>
							<option value="2022">2022</option>
							<option value="2023">2023</option>
						</select>年
						<select name="cardvalidmonth" id="cardValidMonth" height="40px">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
						</select>月 カード有効期限
					</div>
				</div><br/>
				<div id="buttonZone">
					<input type="submit" id="submit" value="購入確認画面へ">
					<input type="button" id="backButton" onclick="history.back()" value="前のページへ戻る">
				</div>
			</form>
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
	<script type="text/javascript" src="productPurchaseInfoInput.js">
	</script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1/i18n/jquery.ui.datepicker-ja.min.js"></script>
	<script>
		$( function () {
			$.datepicker.setDefaults( $.datepicker.regional[ "ja" ] );
			$( "#inputDate" ).datepicker();
		} );
	</script>
</body>
</html>