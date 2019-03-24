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
	<title>採用関連情報</title>
	<link href="companyInfo5.css" rel="stylesheet" type="text/css">
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
      <span itemprop="採用関連情報">採用関連情報</span>
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
				<p>採用関連情報</p>
			</div>
			<div id="company">
				<div id="message">
					<p>現在当社では業務拡大のため新たな人材の採用を検討しております。東三河のお客様の幸せのために私たちと一緒に頑張りたい方は是非ご応募ください。</p>
				</div>
				<table border="1" id="companyInfoZone">
					<tr>
						<th id="orange" colspan="2">現在募集職種</th>
					</tr>
					<tr>
						<td class="wide">募集職種</td>
						<td>本社総合職</td>
					</tr>
					<tr>
						<td class="wide">雇用形態</td>
						<td>正社員</td>
					</tr>
					<tr>
						<td class="wide">仕事内容</td>
						<td>当社サイト管理、当社サイト製作、事務一般、電話応対、渉外担当、配達業務、広報業務、営業業務</td>
					</tr>
					<tr>
						<td class="wide">給与</td>
						<td>月給20万～35万（職務経歴等も考慮）</td>
					</tr>
					<tr>
						<td class="wide">勤務地</td>
						<td>愛知県豊川市大木町新町通297-8</td>
					</tr>
					<tr>
						<td class="wide">勤務時間</td>
						<td>9:30～18:30</td>
					</tr>
					<tr>
						<td class="wide">交通費</td>
						<td>当社交通費規定内で支給</td>
					</tr>
					<tr>
						<td class="wide">諸手当</td>
						<td>皆勤手当、勤務年数2年ごとに特別手当あり</td>
					</tr>
					<tr>
						<td class="wide">賞与</td>
						<td>2回(年支給8月・12月)</td>
					</tr>
					<tr>
						<td class="wide">休日休暇</td>
						<td>基本的に週2日(日曜日は休業日)</td>
					</tr>

					<tr>
						<td class="wide">福利厚生</td>
						<td>社会三保険（厚生年金、健康保険、雇用保険）、家賃補助あり</td>
					</tr 　<tr>
					<td class="wide">応募資格</td>
					<td>高卒以上、45歳程度まで、普通自動車運転免許</td>
					</tr>
					<tr>
						<td class="wide">応募方法</td>
						<td>電話やメールで直接ご応募ください。当社電話番号：0533-93-7378・メール：shiawase@co.jp</td>
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
			<a href="companyInfo3.php">会社概要と地域連携店一覧</a>
			<a href="companyInfo4.php">サービスご利用方法</a>
			<a href="#">採用関連情報</a>
			<a href="companyInfo6.php">個人情報保護とご利用規約</a>
			<a href="companyInfo7.php">サイトマップ</a>
		</div>
	</footer>
</body>
</html>