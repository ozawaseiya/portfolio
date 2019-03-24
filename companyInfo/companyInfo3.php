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
	<title>会社概要と地域連携店一覧</title>
	<link href="companyInfo3.css" rel="stylesheet" type="text/css">
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
						<a href="companyInfo1.php">幸せ宅配便とは</a>
						<div class="menu">
							<ul class="menuInner">
								<li class="megaDrop1">
									<a href="companyInfo2.php">
										<p>ご利用者の声</p>
									</a>
								</li>
								<li class="megaDrop1">
									<a href="#">
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
      <span itemprop="会社概要と地域連携店一覧">会社概要と地域連携店一覧</span>
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
				<p>会社概要と地域連携店一覧</p>
			</div>
			<div id="company">
				<table border="1" id="companyInfoZone">
					<tr>
						<th id="orange" colspan="2">会社概要</th>
					</tr>
					<tr>
						<td>会社名</td>
						<td>株式会社東三河幸せ宅配便</td>
					</tr>
					<tr>
						<td>本社所在地</td>
						<td>愛知県豊川市大木町新町通297-8</td>
					</tr>
					<tr>
						<td>事業内容</td>
						<td>菓子・飲料等の通信販売</td>
					</tr>
					<tr>
						<td>設立</td>
						<td>2018年11月1日</td>
					</tr>
					<tr>
						<td>資本金</td>
						<td>300万円</td>
					</tr>
					<tr>
						<td>代表者</td>
						<td>尾澤政哉</td>
					</tr>
					<tr>
						<td>役員</td>
						<td>代表取締役：尾澤政哉　専務取締役：城所隆　取締役：日比力　監査役：田中一樹</td>
					</tr>
					<tr>
						<td>取引銀行</td>
						<td>東三河銀行　奥三河信用金庫</td>
					</tr>
					<tr>
						<td>決算期</td>
						<td>3月末</td>
					</tr>
					<tr>
						<td>加盟団体</td>
						<td>豊川市商工組合</td>
					</tr>
				</table>
				<table border="1" id="relatedCompanyInfoZone">
					<tr>
						<th id="green">地域連携店一覧</th>
					</tr>
					<tr>
						<td>たまご屋（豊川市）<a href="#" target="_blank" rel="noopener">URL:https://www.tamagoya.jp/</a>
						</td>
					</tr>
					<tr>
						<td>設楽若松屋（設楽町）<a href="#" target="_blank" rel="noopener">URL:https://www.shitarawakamatsuya.jp/</a>
						</td>
					</tr>
					<tr>
						<td>有楽スイーツ（豊橋市）<a href="#" target="_blank" rel="noopener">URL:https://www.yurakusweets.jp/</a>
						</td>
					</tr>
					<tr>
						<td>加藤プランタン（蒲郡市）<a href="#" target="_blank" rel="noopener">URL:https://www.katopurantan.jp/</a>
						</td>
					</tr>
					<tr>
						<td>蒲郡農業組合協会（蒲郡市）<a href="#" target="_blank" rel="noopener">URL:https://www.gamagoriagriculturecooperation.jp/</a>
						</td>
					</tr>
					<tr>
						<td>豊根青年組合（豊根村）<a href="#" target="_blank" rel="noopener">URL:https://www.toyoneyoungassociation.jp/</a>
						</td>
					</tr>
					<tr>
						<td>新城青年組合（新城市）<a href="#" target="_blank" rel="noopener">URL:https://www.shinshiroyoungassociation.jp/</a>
						</td>
					</tr>
					<tr>
						<td>岡崎農園組合（岡崎市）<a href="#" target="_blank" rel="noopener">URL:https://www.okazakiplantationassociation.jp/</a>
						</td>
					</tr>
				</table>
			</div>
			<div id="backButtonZone">
				<input type="button" id="serviceButton" onclick="location.href='../index/index.php'" value="最初のページへ戻る">
				<input id="backButton" type="button" onclick="history.back()" value="前のページへ戻る">
			</div>
		</div>
	</div>
	<footer>
		<div id="footerInner">
			<a href="../contactUs/contactInput.php">お問い合わせ</a>
			<a href="#">会社概要と地域連携店一覧</a>
			<a href="companyInfo4.php">サービスご利用方法</a>
			<a href="companyInfo5.php">採用関連情報</a>
			<a href="companyInfo6.php">個人情報保護とご利用規約</a>
			<a href="companyInfo7.php">サイトマップ</a>
		</div>
	</footer>
</body>
</html>