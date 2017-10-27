<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Music Library</title>
		<meta charset="utf-8" />
		<link href="http://selab.hanyang.ac.kr/courses/cse326/2017/labs/images/5/music.jpg" type="image/jpeg" rel="shortcut icon" />
		<link href="http://selab.hanyang.ac.kr/courses/cse326/2017/labs/labResources/music.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<h1>My Music Page</h1>
		
		<!-- Ex 1: Number of Songs (Variables) -->
		<?php
			$song_Count = 5678;
			$play_Time = 567;
		?>
		<p>
			I love music.
			I have <?php print $song_Count; ?> total songs,
			which is over <?php print $play_Time; ?> hours of music!
		</p>

		
		
	
		<div class="section">
			<h2>Yahoo! Top Music News</h2>
		
			<ol>
				<!-- Ex 2: Top Music News (Loops) -->
					<!-- Ex 3: Query Variable -->
			<?php
				
				$news_pages = $_GET["newspages"];
				if($news_pages == null){
					$news_pages = 5;
				}

				for ($index = 1; $index <= $news_pages; $index++) {
					echo "<li><a href=http://music.yahoo.com/news/archive/?page=$index> Page $index</a></li>";
				}
			?>

				<!-- <li><a href="http://music.yahoo.com/news/archive/?page=1">Page 1</a></li>
				<li><a href="http://music.yahoo.com/news/archive/?page=2">Page 2</a></li>
				<li><a href="http://music.yahoo.com/news/archive/?page=3">Page 3</a></li>
				<li><a href="http://music.yahoo.com/news/archive/?page=4">Page 4</a></li>
				<li><a href="http://music.yahoo.com/news/archive/?page=5">Page 5</a></li> -->
			</ol>
		</div>

	
		
		<div class="section">
			<h2>My Favorite Artists</h2>
	
		
			<ol>
				<!-- Ex 4: Favorite Artists (Arrays) -->
				<?php
					$products = array("Guns N' Roses","Green Day","Blink 182");
					array_push($products , "Queen");
					for ($i=0 ; $i < sizeof($products) ; $i++) { ?>
					<li><?=$products[$i]?></li>	 
				<?php } ?>
				<!-- <li>Guns N' Roses</li>
				<li>Green Day</li>
				<li>Blink182</li> -->

				<!-- Ex 5: Favorite Artists from a File (Files) -->
				<?php
					$lines = file("favorite.txt");
					foreach ($lines as $line ) { ?>
						<li><a href="http://en.wikipedia.org/wiki/<?= $line ?>"><?= $line ?></a></li>
				<?php } ?>
				


			</ol>
		</div>
		
		
		
		
		<div class="section">
			<h2>My Music and Playlists</h2>
			<!-- Ex 6: Music (Multiple Files) -->
			<ul id="musiclist">
			<?php
			$music_routes = glob("lab5/musicPHP/songs/*.mp3");
			foreach ($music_routes as $route) {
				
				?>
				 <li class="mp3item"> <?= $route ?> </li>
				
				<?php }; ?> 
			<!-- Ex 7: MP3 Formatting -->
			<?php
			$music_routes = glob("lab5/musicPHP/songs/*.mp3");

			for ($i = 1; $i < count($music_routes); $i++) {
				$pointer = $i;
				for ($j = $i - 1; $j >= 0; $j--) {
				   if (filesize($music_routes[$pointer]) > filesize($music_routes[$j])) {
					  $temp = $music_routes[$pointer];
					  $music_routes[$pointer] = $music_routes[$j];
					  $music_routes[$j] = $temp;
					  $pointer = $j;
				   }
				}
			 }

			foreach ($music_routes as $route) {?>

				 <li class="mp3item"><a href="<?=$route?>" download><?= basename($route)?></a>(<?= number_format(filesize($route) / 1024) ?>kb)</li>
				
			<?php };
			?>
		
				<!-- Exercise 8: Playlists (Files) -->
			<ul>
				<?php
					$m3us = glob("lab5/musicPHP/songs/*.m3u");
					rsort($m3us);
					foreach ($m3us as $m3u_routes){ ?>
						<li class="playlistitem"><?=basename($m3u_routes)?></li>
					<ul>
						<?php 
							$files = file($m3u_routes);
							rsort($files); // sort reverse abc order
							shuffle($files); // ramdom elements in arr
							
							
							
						
								for($i = 0; $i < count($files); $i++) {
									$seperator = '#';
									$check_result = strpos($files[$i],$seperator);

									if($check_result !== 0) {
										$file_route = "lab5/musicPHP/song";
										?>
										<li><?=$files[$i]?></li>
									
									<?php } ?>
								<?php }?>
					</ul>
									<?php }?>
					
	

				
			</ul>
		</div>

		<div>
			<a href="http://validator.w3.org/check/referer">
				<img src="http://selab.hanyang.ac.kr/courses/cse326/2017/labs/images/w3c-html.png" alt="Valid HTML5" />
			</a>
			<a href="http://jigsaw.w3.org/css-validator/check/referer">
				<img src="http://selab.hanyang.ac.kr/courses/cse326/2017/labs/images/w3c-css.png" alt="Valid CSS" />
			</a>
		</div>
	</body>
</html>
