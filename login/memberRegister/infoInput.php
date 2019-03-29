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
	<title>会員登録入力画面</title>
	<link href="infoInput.css" rel="stylesheet" type="text/css">
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
					<a href="#" itemprop="url">
      <span itemprop="会員登録入力画面">会員登録入力画面</span>
    </a>
				

				</li>
			</ul>
		</div>
	</header>
	<div id="contents">
		<div id="mainTitle">
			<p>会員登録入力画面</p>
		</div>
		<h3>下記のフォームから必要な情報を入力してください。</h3>
		<h4>＊下記のフォームに記載された住所にのみ商品の配送が可能となります。ご了承願います。</h4>
		<div id="infoInput">
			<form action="infoInputCheck.php" method="post" name="form1">
				<div id="shimei">
					<p>お名前</p><span class="attention">[必須]</span>
					<label for="seikanji">姓</label><input id="seikanji" class="text" type="text" name="seikanji" placeholder="(例)山田" maxlength="12" required><label for="meikanji">名</label><input id="meikanji" class="text" type="text" name="meikanji" placeholder="（例）花子" maxlength="12" required><br/><br/>
					<p>ふりがな</p><span class="attention">[必須]</span>
					<label for="seifurigana">せい</label><input id="seifurigana" class="text" type="text" name="seifurigana" placeholder="（例）やまだ" maxlength="12" required><label for="meifurigana">めい</label>
					<input id="meifurigana" class="text" type="text" name="meifurigana" placeholder="(例)はなこ" maxlength="12" required>
				</div>
				<div id="telephone">
					<p>電話番号</p><span class="attention">[必須]</span>
					<input class="text" type="text" name="tel" size="40" placeholder="0311112222" pattern="^\d{10}$|^\d{11}$" maxlength="11" id="hankaku" required><label for="hankaku">（半角数字）</label>
				</div>
				<div id="mailadress">
					<p>メールアドレス(半角英数字）</p>
					<span class="attention">[必須]</span>
					<input class="text" type="email" name="email1" id="email_1" size="40" placeholder="sample@shiawase.co.jp" maxlength="40" required><br/><br/>
					<p id=adressMessage>＊確認のためにもう一度メールアドレスを入力してください</p><span class="attention">[必須]</span>
					<div id="inputCheck"><input class="text" type="text" name="email2" id="emailConfirm_1" size="40" oninput="CheckEmail_1(this)" maxlength="40" required>
					</div>
				</div>
				<div id="zipform">
					<p>配送先郵便番号</p><span class="attention">[必須]</span>
					<table>
						<tr>
							<th>郵便番号</th>
							<td><input class="text" type="text" name="postal1" id="zip1" size="4" pattern="^\d{3}$" maxlength="3" required> － <input class="text" type="text" name="postal2" id="zip2" size="5" pattern="^\d{4}$" maxlength="4" onKeyUp="AjaxZip3.zip2addr('postal1','postal2','prefecture','address');" required>
							</td>
						</tr>
						<tr>
							<th>都道府県</th>
							<td>
								<input class="text" type="text" name="prefecture" id="prefecture" size="20" required>
							</td>
						</tr>
						<tr>
							<th>市区町村</th>
							<td><input class="text" type="text" name="address" id="address" size="40" required>
							</td>
						</tr>
					</table>
				</div>
				<div id="passwordBox">
					パスワードを入力してください(半角英数字をそれぞれ1種類以上含む8文字以上)</br>
					<span class="attention">[必須]</span>
					<input type="password" class="text" name="password" id="password" size="40" maxlength="25" autocomplete="off" required>
					</br>
					パスワードをもう一度入力してください<br/>
					<span class="attention">[必須]</span>
					<input type="password" class="text" name="password2" id="passConfirm_1" size="40" oninput="PassCode_1(this)" maxlength="25" autocomplete="off" required><br/>
					<br/>
				</div>
				<div id="resetZone">
					<input id="reset" type="reset" value="入力をリセットする">
				</div>
				<div id="buttonZone">
					<input id="button1" type="submit" onclick="OnButtonClick();" value="登録確認画面へ">
					<input id="button2" type="button" onclick="history.back()" value="前のページへ戻る">
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
	<script src="infoInput.js"></script>
	<script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8N"></script>
</body>
</html>