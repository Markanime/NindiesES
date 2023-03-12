<?php  
namespace templates;
//use languages; 

class Verti{
	public $title;
	public $subTitle;
	public $wiiuLinks;
	public $dsLinks;
	public $menuindex;

	private $absUrl;
	private $serverUrl = "";
	private $schema = "";
	private $lang;

    function __construct($lang) {
		$this->serverUrl = "//".$_SERVER['SERVER_NAME'];
		$this->absUrl = $this->serverUrl."/templates/verti";
		$this->lang = $lang;
    }

	function PrintHome() {
		$lang = $this->lang;
		$this->schema = "
		<meta name=\"Keywords\" content=\"$lang->TEMPLATE_HOME_KEYWORDS\"/>
		<meta name=\"Description\" content=\"$lang->TEMPLATE_HOME_DESCRIPTION\"/>
		<meta property=\"og:title\" content=\"$this->subTitle\" />
        <meta property=\"og:description\" content=\"$lang->TEMPLATE_HOME_DESCRIPTION\"/>
        <meta property=\"og:type\" content=\"website\"/>
        <meta property=\"og:image\" content=\"https:$this->serverUrl/img/logothumbnail.jpg\" />

		<meta name=\"twitter:card\" content=\"$lang->TEMPLATE_HOME_DESCRIPTION\">
		<meta property=\"twitter:domain\" content=\"nindies.es\">
		<meta property=\"twitter:url\" content=\"https:$this->serverUrl\">
		<meta name=\"twitter:title\" content=\"$this->subTitle\">
		<meta name=\"twitter:description\" content=\"$lang->TEMPLATE_HOME_DESCRIPTION\">
		<meta name=\"twitter:image\" content=\"https:$this->serverUrl/img/logothumbnail.jpg\">

		<script type=\"application/ld+json\">
		{
			\"@context\": \"https://schema.org\",
			\"@type\": \"VideoObject\",
			\"name\": \"$this->subTitle\",
			\"description\": \"$lang->TEMPLATE_HOME_DESCRIPTION.\",
			\"duration\": \"PT2M20S\",
			\"thumbnailUrl\": \"https:$this->serverUrl/img/logothumbnail.jpg\",
			\"uploadDate\": \"2023-03-07T05:48:02+00:00\",
			\"contentUrl\": \"https:$this->serverUrl/video/spanish_wiiU_3ds_games.mp4\"
		}
		</script>
			 ";
		$this->PrintOpenPage();
		echo "
					<!-- Banner -->
						<div id=\"banner-wrapper\">
							<div id=\"banner\" class=\"box container\">
								<div class=\"row\">
									<div class=\"col-12 col-12-medium\">
										<h2 style=\"visibility: hidden; height: 1px;\">$lang->TEMPLATE_HOME_BANNER_VIDEODESCRIPTION</h2>
										<video id=\"video\" width=\"100%\" alt=\"$lang->TEMPLATE_HOME_BANNER_VIDEODESCRIPTION\" controls autoplay loop muted>
											<source src=\"$this->serverUrl/video/spanish_wiiU_3ds_games.mp4\" type=\"video/mp4\">
										</video>
									</div>
								</div>
							</div>
						</div>
		
					<!-- Features -->
						<div id=\"features-wrapper\">
							<div class=\"container\">
								<div class=\"row\">
									<div class=\"col-6 col-12-medium\">
		
										<!-- Box -->
											<section class=\"box feature\">
												<a href=\"wiiu\" class=\"image featured\"><img src=\"$this->absUrl/images/Wii_U_Console_and_Gamepad.jpg\" alt=\"$lang->TEMPLATE_HOME_FEATURESWIIU_CC00\" /></a>
												<div class=\"inner\">
													<header>
														<h2>$lang->TEMPLATE_HOME_FEATURESWIIU_TITLE</h2>
														<p>$lang->TEMPLATE_HOME_FEATURESWIIU_DESCRIPTION</p>
													</header>
													<p>$lang->TEMPLATE_HOME_FEATURESWIIU_CC01</p>
												</div>
											</section>
		
									</div>
									<div class=\"col-6 col-12-medium\">
										<!-- Box -->
										<section class=\"box feature\">
											<a href=\"3ds\" class=\"image featured\"><img src=\"$this->absUrl/images/1280px-Nintendo-3DS-AquaOpen.jpg\" alt=\"$lang->TEMPLATE_HOME_FEATURES3DS_CC00\" /></a>
											<div class=\"inner\">
												<header>
													<h2>$lang->TEMPLATE_HOME_FEATURES3DS_TITLE</h2>
												</header>
												<p>$lang->TEMPLATE_HOME_FEATURES3DS_CC01</p>
											</div>
										</section>
									</div>
								</div>
							</div>
						</div>
		
					<!-- Main -->
						<div id=\"main-wrapper\">
							<div class=\"container\">
								<div class=\"row gtr-200\">
								
									<div class=\"col-12 col-12-medium imp-medium\">
		
										<!-- Content -->
											<div id=\"content\">
												<section class=\"last\">
													<h2>$lang->TEMPLATE_HOME_MAIN_H2</h2>
													<p>$lang->TEMPLATE_HOME_MAIN_P</p>
												</section>
											</div>
		
									</div>
								</div>
							</div>
						</div>
						<script>

						var vid = document.getElementById(\"video\");
						var randomTime = Math.floor(Math.random() * 120);
						vid.currentTime = randomTime;
						
						</script>
						
						";
			$this->PrintClosingPage();
	}

	function PrintCatalog($catalog) {
		$lang = $this->lang;
		$schemaGames = "";
		$keywordsGames = "";
		$count = count($catalog);
		if ($count > 0) {
			foreach ($catalog as $product) {
				$platformText =  $product["platform"]=="WiiU"? $lang->TERM_WIIU : $lang->TERM_3DS_LONG ;
				$keywordsGames = $keywordsGames.$product["name"].",";
				$schemaGames = $schemaGames."
				{
					\"@context\": \"https://schema.org\",
					\"@type\": \"VideoGame\",
					\"name\": \"".$product["name"]."\",
					\"description\": \"Un juego de ".$product["studio"]." hecho para $platformText\",
				
					\"gamePlatform\": [
						{
						\"@type\": \"GamePlatform\",
						\"name\": \"$platformText\"
						}
					],
					\"image\": {
						\"@type\": \"ImageObject\",
						\"url\": \"https:$this->serverUrl/img/".$product["domain"].".jpg\"
					}
				},";
			}
		}
		$platformurl =  $catalog[0]["platform"]=="WiiU"? "wiiu" : "3ds" ;
		$platfortext =  $catalog[0]["platform"]=="WiiU"?  $lang->TERM_WIIU : $lang->TERM_3DS_LONG ;
		$this->schema = "
		<meta name=\"Keywords\" content=\"indie,game,nindies,Nintendo,eshop,$schemaGames$platformText\"/>
		<meta name=\"Description\" content=\"Juegos de $platfortext hechos en España.\"/>
		<meta property=\"og:title\" content=\"Juegos españoles para $platfortext\" />
        <meta property=\"og:description\" content=\"Juegos de $platfortext hechos en España.\"/>
        <meta property=\"og:type\" content=\"product.group\"/>
        <meta property=\"og:image\" content=\"https:$this->serverUrl/img/logothumbnail.jpg\" />
		<script type=\"application/ld+json\">
		{
			\"@context\": \"https://schema.org\",
			\"@type\": \"ItemList\",
			\"name\": \"Juegos españoles para $platfortext\",
			\"description\": \"Juegos de $platfortext hechos en España.\",
			\"url\": \"https:$this->serverUrl/$platformurl\",
			\"numberOfItems\": $count,
			\"itemListElement\": [
				".substr($schemaGames, 0, -1)."
			 ]
		}
		</script>
			 ";
		$this->PrintOpenPage();
		
		echo "
					<!-- Features -->
						<div id=\"features-wrapper\">
							<div class=\"container\">
								<div class=\"row\">";
									if (count($catalog) > 0) {
										foreach ($catalog as $product) {
										echo "
									<div class=\"col-4 col-12-medium\">
										<section class=\"box feature\">
											<a href=\"$this->serverUrl/$platformurl/".$product["domain"]."\" class=\"image featured\"><img src=\"$this->serverUrl/img/".$product["domain"].".jpg\" alt=\"".$product["name"]."\" /></a>
											<div class=\"inner\">
												<header>
													<h2>".$product["name"]."</h2>
													<p>$lang->LABEL_DATE".$product["releasedate"]."</p>
													<p>$lang->LABEL_STUDIO".$product["studio"]."</p>
												</header>
											</div>
										</section>
									</div>
										";
										}
									}
									echo"
								</div>
							</div>
						</div>";
		$this->PrintClosingPage();
	}


	public function PrintProduct($product,$storeList){
		$lang = $this->lang;
		$this->title = sprintf($lang->PRODUCTPAGE_TITLE,$product["name"],$product["platform"]);
		$this->subTitle = sprintf($lang->PRODUCTPAGE_SUBTITLE,$product["name"]);
		$this->menuindex = $product["platform"]=="WiiU"? 1 : 2 ;
		$platformText =  $product["platform"]=="WiiU"? $lang->TERM_WIIU: $lang->TERM_3DS_LONG;
		$platformTextShort =  $product["platform"]=="WiiU"? $lang->TERM_WIIU :$lang->TERM_3DS;

		$descriptionClean = sprintf($lang->PRODUCTPAGE_DESCRIPTION, $product["studio"],$platformText);
		$region =  $product["domain"] == "tinythief"? $lang->TERM_JAPAN : $lang->TERM_EUROPE;
		$stores = "";
		if (count($storeList)>0) {
			$count = 1;
			foreach($storeList as $store )
			{
				
				if($count > 1){
					$stores = $stores.($count == count($storeList) ? " y " : ", ");
				}
				$stores =  $stores."<a href=\"".$store['url']."\">".$store['label']."</a>";
				$count = $count + 1;
			}
		}

		$date_today = new \DateTime();
		$date_eshopClosed = new \DateTime('27-3-2023');

		$this->schema = "
		<meta name=\"Keywords\" content=\"indie,game,nindies,Nintendo,eshop,$platformText,".$product["name"].",".$product["studio"]."\"/>
		<meta name=\"Description\" content=\"$descriptionClean\"/>
		<meta property=\"og:title\" content=\"".$product["name"]."\" />
        <meta property=\"og:description\" content=\"$descriptionClean\"/>
        <meta property=\"og:type\" content=\"product.item\"/>
        <meta property=\"og:image\" content=\"https:$this->serverUrl/img/".$product["domain"].".jpg\" />
		<script type=\"application/ld+json\">
			{
				\"@context\": \"https://schema.org\",
				\"@type\": \"VideoGame\",
				\"name\": \"".$product["name"]."\",
				\"description\": \"$descriptionClean\",
				\"gamePlatform\": [
					{
					\"@type\": \"GamePlatform\",
					\"name\": \"$platformText\"
					}
				],
				\"image\": {
					\"@type\": \"ImageObject\",
					\"url\": \"https:$this->serverUrl/img/".$product["domain"].".jpg\"
				}
			}
		</script>
		";



		$this->PrintOpenPage("is-preload left-sidebar");

		echo "
		<!-- Main -->
			<div id=\"main-wrapper\">
				<div class=\"container\">
					<div class=\"row gtr-200\">
						<div class=\"col-4 col-12-medium\">
							<div id=\"sidebar\">

								<!-- Sidebar -->
									<section>
										<h3>Información</h3>
										<img width=\"100%\" src=\"$this->serverUrl/img/".$product["domain"].".jpg\" alt=\"".$product["name"]."\" /><br/>
										<b>$lang->LABEL_STUDIO</b>".$product["studio"]."<br/>
										<b>$lang->LABEL_PLATFORM</b>$platformText<br/>
										<b>$lang->LABEL_DATE</b>".$product["releasedate"]."<br/>";
										if ($stores!="") {
											echo "<b>$lang->LABEL_OTHERPLATFORMS</b>$stores</b>";
										}
									echo	"
										<footer>
											<a href=\"".$product["eshop"]."\" class=\"button icon solid fa-info-circle\">$platformTextShort $lang->TERM_ESHOP ($region)</a>
										</footer>
									</section>

									<section>
										<h3>".sprintf($lang->PRODUCTPAGE_RELATEDGAMES,$platformText)."</h3>
										<ul class=\"style2\">
										";
										$this->PrintRandomProducts($product["platform"]=="WiiU"? $this->wiiuLinks : $this->dsLinks,$product["platform"]=="WiiU"? "wiiu":"3ds");
										echo "
										</ul>
									</section>

							</div>
						</div>
						<div class=\"col-8 col-12-medium imp-medium\">
							<div id=\"content\">

								<!-- Content -->
									<article>

										<h2>".$product["name"]."</h2>

										<video width=\"100%\" alt=\"Trailer de ".$product["name"]." para $platformText\" controls autoplay muted>
											<source src=\"$this->serverUrl/video/".$product["domain"].".mp4\" type=\"video/mp4\">
										</video>
										<h3>$lang->PRODUCTPAGE_TOPIC01</h3>";
										
										switch ($product["domain"]) {
											case 'canvaleon':
												echo "<p>$lang->PRODUCTPAGE_MESSAGE01<br />";
												break;
											case 'tinythief':
												if($date_today > $date_eshopClosed)
												{
													echo "<p>$lang->PRODUCTPAGE_MESSAGE02<br />";
												}
												else
												{
													echo "<p>$lang->PRODUCTPAGE_MESSAGE03<br />";
												}
												break;
											case 'vaccine':
												if($date_today > $date_eshopClosed)
												{
													echo "<p>".sprintf($lang->PRODUCTPAGE_MESSAGE05,$product["name"],$platformText)."<br />";
												}
												else
												{
													echo "<p>$lang->PRODUCTPAGE_MESSAGE04<br />";

												}
												break;
											default:
												if($date_today > $date_eshopClosed)
												{
													echo "<p>".sprintf($lang->PRODUCTPAGE_MESSAGE05,$product["name"],$platformText)."<br />";
												}
												else
												{
													echo "<p>".sprintf($lang->PRODUCTPAGE_MESSAGE06,$product["name"],$platformText)."<br />";

												}
												break;
										}

										if ($stores!="") {
											echo sprintf($lang->PRODUCTPAGE_MESSAGE07,$stores,$platformText)."<br />";
										}
										else{
											echo $lang->PRODUCTPAGE_MESSAGE08;
										}
										echo "</p>
										<h3>$lang->PRODUCTPAGE_TOPIC02</h3>
										".$product["description"]."
									</article>

							</div>
						</div>
					</div>
				</div>
			</div>
		";

		$this->PrintClosingPage();
	}


	function PrintOpenPage($bodyClass = "is-preload homepage"){
		echo "<!DOCTYPE HTML>
		<html>";
		$this->PrintHead($this->title);
		echo "
			<body class=\"$bodyClass\">
				<div id=\"page-wrapper\">";
		$this->PrintHeader($this->subTitle,$this->menuindex);
	}

	function PrintClosingPage(){
		$this->PrintFooter();
		echo "		
					</div>
		
				<!-- Scripts -->
		
					<script src=\"$this->absUrl/assets/js/jquery.min.js\"></script>
					<script src=\"$this->absUrl/assets/js/jquery.dropotron.min.js\"></script>
					<script src=\"$this->absUrl/assets/js/browser.min.js\"></script>
					<script src=\"$this->absUrl/assets/js/breakpoints.min.js\"></script>
					<script src=\"$this->absUrl/assets/js/util.js\"></script>
					<script src=\"$this->absUrl/assets/js/main.js\"></script>
		
			</body>
		</html>";
	}

	function PrintMenuItem($link,$label,$selected){
		echo "<li";
		if($selected){
			echo " class=\"current\" ";
		}
		echo "><a href=\"$link\">$label</a></li>";
	}

	function PrintHead($title){
		echo "
		<head>
			<title>$title</title>
            <meta charset=\"UTF-8\">
            <link rel=\"icon\" href=\"$this->serverUrl/favicon/favicon.ico\" />
            <link rel=\"icon\" type=\"image/png\" sizes=\"32x32\" href=\"$this->serverUrl/favicon/favicon-32x32.png\" />
            <link rel=\"icon\" type=\"image/png\" sizes=\"16x16\" href=\"$this->serverUrl/favicon/favicon-16x16.png\" />
            <link rel=\"icon\" type=\"image/png\" sizes=\"192x192\" href=\"$this->serverUrl/favicon/android-chrome-192x192.png\" />
            <link rel=\"icon\" type=\"image/png\" sizes=\"512x512\" href=\"$this->serverUrl/favicon/android-chrome-512x512.png\" />
            <link rel=\"apple-touch-icon\" type=\"image/png\" sizes=\"196x196\" href=\"$this->serverUrl/favicon/apple-touch-icon.png\" />
			<meta name=\"viewport\" content=\"width=device-width, initial-scale=1, user-scalable=no\" />
			<link rel=\"stylesheet\" href=\"$this->absUrl/assets/css/main.css\" />
			$this->schema
		</head>
		";
	}

	function PrintHeader($title,$menuindex){
		$lang = $this->lang;
		echo "
		<!-- Header -->
			<div id=\"header-wrapper\">
				<header id=\"header\" class=\"container\">

					<!-- Logo -->
						<div id=\"logo\">
                            <img src=\"$this->serverUrl/img/logo.png\"/>
							<h1>$title</h1>
						</div>

					<!-- Nav -->
						<nav id=\"nav\">
							<ul>";
							$this->PrintMenuItem($this->serverUrl,$lang->HEADER_HOME,$menuindex == 0);
							$this->PrintMenuItem("$this->serverUrl/wiiu",$lang->HEADER_WIIULIST,$menuindex == 1);
							$this->PrintMenuItem("$this->serverUrl/3ds",$lang->HEADER_3DSLIST,$menuindex == 2);
							echo "
							</ul>
						</nav>

				</header>
			</div>
		";
	}

	function PrintRandomProducts($products,$platformurl="game"){
		if (count($products) > 0) {
			$max = rand(4,count($products)-1);
			for ($i = $max; $i >= $max - 4; $i--){
			echo "
			<li><a href=\"$this->serverUrl/$platformurl/".$products[$i]["domain"]."\">".$products[$i]["name"]."</a></li>";
			}
		}
	}

	function PrintFooter(){
		$lang = $this->lang;
		echo "
		<!-- Footer -->
			<div id=\"footer-wrapper\">
				<footer id=\"footer\" class=\"container\">
					<div class=\"row\">
						<div class=\"col-3 col-6-medium col-12-small\">

							<!-- Links -->
								<section class=\"widget links\">
									<h3>$lang->FOOTER_WIIULIST</h3>
									<ul class=\"style2\">";
									$this->PrintRandomProducts($this->wiiuLinks,"wiiu");
									echo"
										<li><a href=\"wiiu\">$lang->FOOTER_FULLHERE</a></li>
									</ul>
								</section>

						</div>
						<div class=\"col-3 col-6-medium col-12-small\">

							<!-- Links -->
								<section class=\"widget links\">
									<h3>$lang->FOOTER_3DSLIST</h3>
									<ul class=\"style2\">";
									$this->PrintRandomProducts($this->dsLinks,"3ds");
									echo"
										<li><a href=\"3ds\">$lang->FOOTER_FULLHERE</a></li>
									</ul>
								</section>

						</div>
						<div class=\"col-3 col-6-medium col-12-small\">

							<!-- Links -->
								<section class=\"widget links\">
									<h3>$lang->FOOTER_WEBLIST</h3>
									<ul class=\"style2\">
										<li><a href=\"https://www.indiedevday.es/\">$lang->FOOTER_WEBITEM01</a></li>
										<li><a href=\"https://www.devuego.es/bd/\">$lang->FOOTER_WEBITEM02 </a></li>
										<li><a href=\"https://www.burgerdeveloper.com/\">$lang->FOOTER_WEBITEM03 </a></li>
										<li><a href=\"https://www.valenciaindiesummit.com/\">$lang->FOOTER_WEBITEM04</a></li>
										<li><a href=\"https://weirdmarket.es/\">$lang->FOOTER_WEBITEM05</a></li>
										<li><a href=\"http://www.aevi.org.es/\">$lang->FOOTER_WEBITEM06</a></li>
									</ul>
								</section>

						</div>
						<div class=\"col-3 col-6-medium col-12-small\">

							<!-- Contact -->
								<section class=\"widget contact last\">
									<h3>$lang->FOOTER_FOLLOWUS</h3>
									<ul>
										<li><a href=\"https://twitter.com/nindiesES\" class=\"icon brands fa-twitter\"><span class=\"label\">Twitter</span></a></li>
										<li><a href=\"https://www.youtube.com/@nindiesES/\" class=\"icon brands fa-youtube\"><span class=\"label\">Youtube</span></a></li>
										<li><a href=\"https://www.instagram.com/nindiesES/\" class=\"icon brands fa-instagram\"><span class=\"label\">Instagram</span></a></li>
									</ul>
									<p>$lang->FOOTER_DESC</p>
								</section>

						</div>
					</div>
					<div class=\"row\">
						<div class=\"col-12\">
							<div id=\"copyright\">
								<ul class=\"menu\">
									<li><p xmlns:cc=\"http://creativecommons.org/ns#\" xmlns:dct=\"http://purl.org/dc/terms/\"><a property=\"dct:title\" rel=\"cc:attributionURL\" href=\"https://www.nindies.es\">Nindies de España</a> is marked with <a href=\"http://creativecommons.org/publicdomain/zero/1.0?ref=chooser-v1\" target=\"_blank\" rel=\"license noopener noreferrer\" style=\"display:inline-block;\">CC0 1.0<img style=\"height:22px!important;margin-left:3px;vertical-align:text-bottom;\" src=\"https://mirrors.creativecommons.org/presskit/icons/cc.svg?ref=chooser-v1\"><img style=\"height:22px!important;margin-left:3px;vertical-align:text-bottom;\" src=\"https://mirrors.creativecommons.org/presskit/icons/zero.svg?ref=chooser-v1\"></a></p></li>
									<li>Design: <a href=\"http://html5up.net\">HTML5 UP</a></li>
								</ul>
							</div>
						</div>
					</div>
				</footer>
			</div>";
	}

}
?>