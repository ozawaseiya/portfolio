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

require_once( '../../common/common.php' );

$post = sanitize( $_POST );

$memberseikanji = $post[ 'seikanji' ];
$membermeikanji = $post[ 'meikanji' ];
$memberseifurigana = $post[ 'seifurigana' ];
$membermeifurigana = $post[ 'meifurigana' ];
$membertel = $post[ 'tel' ];
$memberemail1 = $post[ 'email1' ];
$memberpostal1 = $post[ 'postal1' ];
$memberpostal2 = $post[ 'postal2' ];
$memberprefecture = $post[ 'prefecture' ];
$memberaddress = $post[ 'address' ];
$memberpassword = $post[ 'password' ];

$okflg = true;

?>

<!doctype html>
<html lang="ja">
<head> 
	<meta charset="UTF-8N">
	<title>会員登録確認画面</title>
	<link href="infoInputCheck.css" rel="stylesheet" type="text/css">
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
      <span itemprop="会員登録・ログイン">会員登録・ログイン></span>・
    </a>
				

				</li>
				<li itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb">
					<a href="infoInput.php" itemprop="url">
      <span itemprop="会員登録入力画面">会員登録入力画面></span>
    </a>
				

				</li>
				<li itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb">
					<a href="#" itemprop="url">
      <span itemprop="会員登録入力画面">会員登録確認画面</span>
    </a>
				

				</li>
			</ul>
		</div>
	</header>
	<div id="contents">
		<div id="mainTitle">
			<p>会員登録確認画面</p>
		</div>
		<h3>下記の入力されたフォームの情報を確認してください。</h3>
		<h4>＊下記のフォームに記載された住所にのみ商品の配送が可能となります。ご了承願います。</h4>
		<div id="infoInput">
			<table border="1">
				<tr>
					<td class="infoData">お名前（姓）</td>
					<td>
						<?php
						if ( isset( $_POST[ 'memberseikanji' ] ) && $_POST[ 'memberseikanji' ] == NULL ) {
							print 'お名前（姓）が入力されていません。';
							$okflg = false;
						} else {
							print $memberseikanji;
						}
						?>
					</td>
				</tr>
				<tr>
					<td class="infoData">お名前（名）</td>
					<td>
						<?php
						if ( isset( $_POST[ 'membermeikanji' ] ) && $_POST[ 'membermeikanji' ] == NULL ) {
							print 'お名前（名）が入力されていません。';
							$okflg = false;
						} else {
							print $membermeikanji;
						}
						?> </td>
				</tr>
				<tr>
					<td class="infoData">お名前（せい）</td>
					<td>
						<?php
						if ( isset( $_POST[ 'memberseifurigana' ] ) && $_POST[ 'memberseifurigana' ] == NULL ) {
							print 'お名前（せい）が入力されていません。';
							$okflg = false;
						} else {
							print $memberseifurigana;
						}
						?>
					</td>
				</tr>
				<tr>
					<td class="infoData">お名前（めい）</td>
					<td>
						<?php
						if ( isset( $_POST[ 'membermeifurigana' ] ) && $_POST[ 'membermeifurigana' ] == NULL ) {
							print 'お名前（めい）が入力されていません。';
							$okflg = false;
						} else {
							print $membermeifurigana;
						}
						?> </td>
				</tr>
				<tr>
					<td class="infoData">電話番号</td>
					<td>
						<?php
						if ( preg_match( "(^\d{10}$|^\d{11}$)", $membertel ) == 0 ) {
							print '電話番号を正確に入力してください。';
							$okflg = false;
						} else {
							print $membertel;
						}
						?>
					</td>
				</tr>
				<tr>
					<td class="infoData">メールアドレス</td>
					<td>
						<?php
						if ( preg_match( '/\A[\w\-\.]+\@[\w\-\.]+\.([a-z]+)\z/', $memberemail1 ) == 0 ) {
							print 'メールアドレスを正確に入力してください。<br/>';
							$okflg = false;
						} else {
							print $memberemail1;
						}
						?>
					</td>
				</tr>
				<tr>
					<td class="infoData">郵便番号</td>
					<td>
						<?php
						if ( preg_match( '/\A[0-9]+\z/', $memberpostal1 || $memberpostal2 ) == 0 ) {
							print '郵便番号は半角数字で入力してください。';
							$okflg = false;
						} else {
							print $memberpostal1;
							print '-';
							print $memberpostal2;
						}
						?>
					</td>
				</tr>
				<tr>
					<td class="infoData">
						都道府県
					</td>
					<td>
						<?php
						if ( isset( $_POST[ 'memberprefecture' ] ) && $_POST[ 'memberprefecture' ] == '' ) {
							print '都道府県が選択されていません。';
							$okflg = false;
						} else {
							print $memberprefecture;
						}
						?>
					</td>
				</tr>
				<tr>
					<td class="infoData">市区町村番地</td>
					<td>
						<?php
						if ( isset( $_POST[ 'memberaddress' ] ) && $_POST[ 'memberaddress' ] == '' ) {
							print '市区町村番地が入力されていません。';
							$okflg = false;
						} else {
							print $memberaddress;
						}
						?>
					</td>
				</tr>
				<tr>
					<td class="infoData">パスワード</td>
					<td>
						<?php
						if ( preg_match( '/^(?=.*?[a-z])(?=.*?\d)[a-z\d]{8,20}$/i', $memberpassword ) == 0 ) {
							print 'パスワードを再入力してください。';
							$okflg = false;
						} else {
							print 'パスワードの登録は完了しました。';
						}
						?>
					</td>
				</tr>
			</table>
		</div>
		<?php
		if ( $okflg == true ) {
			$memberpassword = crypt($memberpassword,PASSWORD_DEFAULT);
			$memberkanji = $memberseikanji .= $membermeikanji;
			$memberfurigana = $memberseifurigana .= $membermeifurigana;
			print '<form method="post" action="infoInputDone.php">';
			print '<input type="hidden" name="password" value="' . $memberpassword . '">';
			print '<input type="hidden" name="kanji" value="' . $memberkanji . '">';
			print '<input type="hidden" name="furigana" value="' . $memberfurigana . '">';
			print '<input type="hidden" name="tel" value="' . $membertel . '">';
			print '<input type="hidden" name="email1" value="' . $memberemail1 . '">';
			print '<input type="hidden" name="postal1" value="' . $memberpostal1 . '">';
			print '<input type="hidden" name="postal2" value="' . $memberpostal2 . '">';
			print '<input type="hidden" name="prefecture" value="' . $memberprefecture . '">';
			print '<input type="hidden" name="address" value="' . $memberaddress . '">';
			?>
		<div id="buttonZone">
			<?php
			print '<input type="submit" id="button1" value="登録完了画面へ">';
			print '<input type="button" id="button2" onclick="history.back()" value="前のページへ戻る">';
			print '</form>';
			} else {
				?>
			<div id="buttonZone2">
				<?php
				print '<form>';
				print '<input type="button" id="button2" onclick="history.back()" value="前のページへ戻る">';
				print '</form>';
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