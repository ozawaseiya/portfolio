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
<?php

require_once( '../common/common.php' );

$post = sanitize( $_POST );

$contactseikanji = $post[ 'seikanji' ];
$contactmeikanji = $post[ 'meikanji' ];
$contactseifurigana = $post[ 'seifurigana' ];
$contactmeifurigana = $post[ 'meifurigana' ];
$contacttel = $post[ 'tel' ];
$contactemail1 = $post[ 'email1' ];
$contactinquiry = $post[ 'inquiry' ];

$okflg = true;

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
	<title>登録確認画面</title>
	<link href="contactInputCheck.css" rel="stylesheet" type="text/css">
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
					<a href="#" itemprop="url">
      <span itemprop="入力確認画面">入力確認画面</span>
    </a>
				

				</li>
			</ul>
		</div>
	</header>
	<div id="contents">
		<div id="mainTitle">
			<p>入力確認画面</p>
		</div>
		<h3>下記の入力されたフォームの情報を確認してください。</h3>
		<div id="infoInput">
			<table border="1">
				<tr>
					<td class="infoData">お名前（姓）</td>
					<td>
						<?php
						if ( isset( $_POST[ 'contactseikanji' ] ) && $_POST[ 'contactseikanji' ] == NULL ) {
							print 'お名前（姓）が入力されていません。';
							$okflg = false;
						} else {
							print $contactseikanji;
						}
						?>
					</td>
				</tr>
				<tr>
					<td class="infoData">お名前（名）</td>
					<td>
						<?php
						if ( isset( $_POST[ 'contactmeikanji' ] ) && $_POST[ 'contactmeikanji' ] == NULL ) {
							print 'お名前（名）が入力されていません。';
							$okflg = false;
						} else {
							print $contactmeikanji;
						}
						?> </td>
				</tr>
				<tr>
					<td class="infoData">お名前（せい）</td>
					<td>
						<?php
						if ( isset( $_POST[ 'contactseifurigana' ] ) && $_POST[ 'contactseifurigana' ] == NULL ) {
							print 'お名前（せい）が入力されていません。';
							$okflg = false;
						} else {
							print $contactseifurigana;
						}
						?>
					</td>
				</tr>
				<tr>
					<td class="infoData">お名前（めい）</td>
					<td>
						<?php
						if ( isset( $_POST[ 'contactmeifurigana' ] ) && $_POST[ 'contactmeifurigana' ] == NULL ) {
							print 'お名前（めい）が入力されていません。';
							$okflg = false;
						} else {
							print $contactmeifurigana;
						}
						?> </td>
				</tr>
				<tr>
					<td class="infoData">電話番号</td>
					<td>
						<?php
						if ( preg_match( "(^\d{10}$|^\d{11}$)", $contacttel ) == 0 ) {
							print '電話番号を正確に入力してください。';
							$okflg = false;
						} else {
							print $contacttel;
						}
						?>
					</td>
				</tr>
				<tr>
					<td class="infoData">メールアドレス</td>
					<td>
						<?php
						if ( preg_match( '/\A[\w\-\.]+\@[\w\-\.]+\.([a-z]+)\z/', $contactemail1 ) == 0 ) {
							print 'メールアドレスを正確に入力してください。<br/>';
							$okflg = false;
						} else {
							print $contactemail1;
						}
						?>
					</td>
				</tr>
				<tr>
					<td class="infoData">お問合せ内容</td>
					<td>
						<?php
						if ( isset( $_POST[ 'contactinquiry' ] ) && $_POST[ 'contactinquiry' ] == NULL ) {
							print 'お問い合わせ内容が入力されていません。';
							$okflg = false;
						} else {
							print '<textarea name="inquiry" cols="60" rows="8" required>' . $contactinquiry . '</textarea>';
						}
						?>
					</td>
				</tr>
			</table>
		</div>
		<?php
		if ( $okflg == true ) {
			$contactkanji = $contactseikanji .= $contactmeikanji;
			$contactfurigana = $contactseifurigana .= $contactmeifurigana;
			print '<form method="post" action="contactInputDone.php">';
			print '<input type="hidden" name="kanji" value="' . $contactkanji . '">';
			print '<input type="hidden" name="furigana" value="' . $contactfurigana . '">';
			print '<input type="hidden" name="tel" value="' . $contacttel . '">';
			print '<input type="hidden" name="email1" value="' . $contactemail1 . '">';
			print '<input type="hidden" name="inquiry" value="' . $contactinquiry . '">';
			?>
		<div id="buttonZone">
			<?php
			print '<input type="submit" id="button1" value="登録完了画面へ">';
			print '<input type="button" id="button2" onclick="history.back()" value="入力画面へ戻る">';
			print '</form>';
			} else {
				?>
			<div id="buttonZone2">
				<?php
				print '<form>';
				print '<input type="button" id="button2" onclick="history.back()" value="入力画面へ戻る">';
				print '</form>';
				}
				?>
			</div>
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