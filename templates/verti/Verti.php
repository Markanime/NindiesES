<?php  
namespace templates;

class Verti{
	public $title;
	public $subTitle;
	public $wiiuLinks;
	public $dsLinks;
	public $menuindex;

	private $absUrl;
	private $serverUrl = "";
	private $schema = "";
    function __construct() {
		$this->serverUrl = "//".$_SERVER['SERVER_NAME'];
		$this->absUrl = $this->serverUrl."/templates/verti";
    }

	function PrintHome() {
		$this->PrintOpenPage();
		echo "
					<!-- Banner -->
						<div id=\"banner-wrapper\">
							<div id=\"banner\" class=\"box container\">
								<div class=\"row\">
									<div class=\"col-12 col-12-medium\">
										<h2 style=\"visibility: hidden; height: 1px;\">Video de presentacion de videojuegos españoles publicados en Nintendo</h2>
										<video width=\"100%\" alt=\"Video de presentacion de videojuegos españoles publicados en Nintendo\" controls autoplay muted>
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
												<a href=\"WiiU\" class=\"image featured\"><img src=\"$this->absUrl/images/Wii_U_Console_and_Gamepad.jpg\" alt=\"Nintendo Wii U Photo by Takimata & Tokyoship\" /></a>
												<div class=\"inner\">
													<header>
														<h2>Videojuegos para Nintendo Wii U realizados en España</h2>
														<p></p>
													</header>
													<p><a href=\"https://en.wikipedia.org/wiki/Wii_U#/media/File:Wii_U_Console_and_Gamepad.png\">Fotografia de Nintendo Wii U</a> realizada por <a href=\"https://commons.wikimedia.org/wiki/User:Takimata\">Takimata</a> y editada por <a href=\"https://commons.wikimedia.org/wiki/User:Tokyoship\">Tokyoship</a> con licencia de <a href=\"https://creativecommons.org/licenses/by-sa/3.0/\">CC BY-SA 3.0</a></p>
												</div>
											</section>
		
									</div>
									<div class=\"col-6 col-12-medium\">
										<!-- Box -->
										<section class=\"box feature\">
											<a href=\"3ds\" class=\"image featured\"><img src=\"$this->absUrl/images/1280px-Nintendo-3DS-AquaOpen.jpg\" alt=\"Nintendo 3Ds Photo by Evan-Amos\" /></a>
											<div class=\"inner\">
												<header>
													<h2>Videojuegos para Nintendo 3DS realizados en España</h2>
												</header>
												<p><a href=\"https://en.wikipedia.org/wiki/Nintendo_3DS#/media/File:Nintendo-3DS-AquaOpen.jpg\">Fotografia de Nintendo 3DS</a> realizada por <a href=\"https://en.wikipedia.org/wiki/Public_domain\">Evan-Amos</a> con licencia de <a href=\"https://creativecommons.org/licenses/by-sa/3.0/\">Dominio Publico</a></p>
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
													<h2>Que es Nindies de España?</h2>
													<p>Nindies fue el término que empezó a usar Nintendo en la década de 3DS y WiiU para referirse a los juegos independientes. En dicha época varios estudios Españoles se animaron a publicar varios títulos para estas plataformas, incluso <a href=\"https://www.youtube.com/watch?v=JFmVUj7U6NQ\">Nintendo participó</a> de forma oficial un evento anual en España llamado \"iDÉAME\" el cual deja de celebrarse en 2013. En esta web podrás consultar información sobre los juegos independientes que han sido desarrollados en España que fueron publicados para Nintendo 3DS y Nintendo Wii U</p>
												</section>
											</div>
		
									</div>
								</div>
							</div>
						</div>";
			$this->PrintClosingPage();
	}

	function PrintCatalog($catalog) {
		$schemaGames = "";
		if (count($catalog) > 0) {
			foreach ($catalog as $product) {
				$platformText =  $product["platform"]=="WiiU"? "Wii U" : "Nintendo 3DS" ;

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
						\"url\": \"$this->serverUrl/img/".$product["domain"].".jpg\"
					}
				},";
			}
		}
		$platformurl =  $catalog[0]["platform"]=="WiiU"? "wiiu" : "3ds" ;
		$platfortext =  $catalog[0]["platform"]=="WiiU"? "Wii U" : "Nintendo 3DS" ;
		$this->schema = "
		<script type=\"application/ld+json\">
		{
			\"@context\": \"https://schema.org\",
			\"@type\": \"ItemList\",
			\"name\": \"juegos españoles para $platfortext\",
			\"description\": \"Juegos de $platfortext hechos en España.\",
			\"url\": \"$this->serverUrl/$platformurl\",
			\"numberOfItems\": 3,
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
											<a href=\"$this->serverUrl/".$product["domain"]."\" class=\"image featured\"><img src=\"$this->serverUrl/img/".$product["domain"].".jpg\" alt=\"".$product["name"]."\" /></a>
											<div class=\"inner\">
												<header>
													<h2>".$product["name"]."</h2>
													<p>Fecha de lanzamiento: ".$product["releasedate"]."</p>
													<p>Desarrollo: ".$product["studio"]."</p>
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


	public function PrintProduct($product){
		$this->title = $product["name"]." un juego Español para ".$product["platform"];
		$this->subTitle = "Informacion de ".$product["name"];
		$this->menuindex = $product["platform"]=="WiiU"? 1 : 2 ;
		$platformText =  $product["platform"]=="WiiU"? "Wii U" : "Nintendo 3DS" ;
		/*
		TODO FOR SCHEMA
			\"genre\": [
				\"Platform\",
				\"Action-adventure\"
			],
			
			\"aggregateRating\": {
				\"@type\": \"AggregateRating\",
				\"ratingValue\": \"9.7\",
				\"ratingCount\": \"1034\"
			},
		*/
		$this->schema = "
		<script type=\"application/ld+json\">
			{
				\"@context\": \"https://schema.org\",
				\"@type\": \"VideoGame\",
				\"name\": \"".$product["name"]."\",
				\"description\": \"".$product["description"]."\",
			
				\"gamePlatform\": [
					{
					\"@type\": \"GamePlatform\",
					\"name\": \"$platformText\"
					}
				],
				\"image\": {
					\"@type\": \"ImageObject\",
					\"url\": \"$this->serverUrl/img/".$product["domain"].".jpg\"
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
										<b>Desarrollado por: </b>".$product["studio"]."<br/>
										<b>Plataforma: </b>$platformText<br/>
										<b>Fecha de lanzamiento: </b>".$product["releasedate"]."<br/>

										<footer>
											<a href=\"".$product["eshop"]."\" class=\"button icon solid fa-info-circle\">Comprar en eShop</a>
										</footer>
									</section>

									<section>
										<h3>Mas juegos para $platformText</h3>
										<ul class=\"style2\">
										";
										$this->PrintRandomProducts($product["platform"]=="WiiU"? $this->wiiuLinks : $this->dsLinks);
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

										<video width=\"100%\" alt=\"Video de presentacion de videojuegos españoles publicados en Nintendo\" controls autoplay muted>
											<source src=\"$this->serverUrl/video/".$product["domain"].".mp4\" type=\"video/mp4\">
										</video>

										<h3>Descripción en eShop</h3>
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
			<meta charset=\"utf-8\" />
			<meta name=\"viewport\" content=\"width=device-width, initial-scale=1, user-scalable=no\" />
			<link rel=\"stylesheet\" href=\"$this->absUrl/assets/css/main.css\" />
			$this->schema
		</head>
		";
	}

	function PrintHeader($title,$menuindex){
		echo "
		<!-- Header -->
			<div id=\"header-wrapper\">
				<header id=\"header\" class=\"container\">

					<!-- Logo -->
						<div id=\"logo\">
							<h1><a href=\"$this->serverUrl\">Nindies de España</a></h1>
							<span>$title</span>
						</div>

					<!-- Nav -->
						<nav id=\"nav\">
							<ul>";
							$this->PrintMenuItem($this->serverUrl,"Inicio",$menuindex == 0);
							$this->PrintMenuItem("$this->serverUrl/wiiu","Juegos de Wii U",$menuindex == 1);
							$this->PrintMenuItem("$this->serverUrl/3ds","Juegos de 3DS",$menuindex == 2);
							echo "
							</ul>
						</nav>

				</header>
			</div>
		";
	}

	function PrintRandomProducts($products){
		if (count($products) > 0) {
			$max = rand(4,count($products)-1);
			for ($i = $max; $i >= $max - 4; $i--){
			echo "
			<li><a href=\"$this->serverUrl/".$products[$i]["domain"]."\">".$products[$i]["name"]."</a></li>";
			}
		}
	}

	function PrintFooter(){
		echo "
		<!-- Footer -->
			<div id=\"footer-wrapper\">
				<footer id=\"footer\" class=\"container\">
					<div class=\"row\">
						<div class=\"col-3 col-6-medium col-12-small\">

							<!-- Links -->
								<section class=\"widget links\">
									<h3>Juegos de Nintendo Wii U</h3>
									<ul class=\"style2\">";
									$this->PrintRandomProducts($this->wiiuLinks);
									echo"
										<li><a href=\"wiiu\">Lista completa aqui ...</a></li>
									</ul>
								</section>

						</div>
						<div class=\"col-3 col-6-medium col-12-small\">

							<!-- Links -->
								<section class=\"widget links\">
									<h3>Juegos de Nintendo 3DS</h3>
									<ul class=\"style2\">";
									$this->PrintRandomProducts($this->dsLinks);
									echo"
										<li><a href=\"3ds\">Lista completa aqui ...</a></li>
									</ul>
								</section>

						</div>
						<div class=\"col-3 col-6-medium col-12-small\">

							<!-- Links -->
								<section class=\"widget links\">
									<h3>Webs que apoyan al desarrollo en España</h3>
									<ul class=\"style2\">
										<li><a href=\"https://www.indiedevday.es/\">IndieDevDay - La feria del videojuego indie en barcelona</a></li>
										<li><a href=\"https://www.devuego.es/bd/\">Devuego - Base de datos del videojuego Español</a></li>
										<li><a href=\"https://www.burgerdeveloper.com/\">Indie Burger Awards</a></li>
										<li><a href=\"https://www.valenciaindiesummit.com/\">Indie Summit Valencia</a></li>
										<li><a href=\"https://weirdmarket.es/\">Weird - Animacion, videojuegos y new media</a></li>
										<li><a href=\"http://www.aevi.org.es/\">AEVI - Asociacion Española de videojuegos</a></li>
									</ul>
								</section>

						</div>
						<div class=\"col-3 col-6-medium col-12-small\">

							<!-- Contact -->
								<section class=\"widget contact last\">
									<h3>Contact Us</h3>
									<ul>
										<li><a href=\"https://twitter.com/nindiesES\" class=\"icon brands fa-twitter\"><span class=\"label\">Twitter</span></a></li>
										<li><a href=\"https://www.youtube.com/@nindiesES/\" class=\"icon brands fa-youtube\"><span class=\"label\">Youtube</span></a></li>
										<li><a href=\"https://www.instagram.com/nindiesES/\" class=\"icon brands fa-instagram\"><span class=\"label\">Instagram</span></a></li>
									</ul>
									<p>Nindies de España<br />
									Un registro privado sin animo de lucro<br />
									para preservar el legado de titulos españoles publicados en plataformas de Nintendo</p>
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