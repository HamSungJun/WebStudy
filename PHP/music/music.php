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
		<p>
		<?
			$Num_Songs = 5678;
			$Total_PTime = intval($Num_Songs / 10);
		?>
			I love music.
			I have <?= $Num_Songs ?> total songs,
			which is over <?= $Total_PTime ?> hours of music!
		</p>

		
		<div class="section">
			<h2>Yahoo! Top Music News</h2>
		
			<ol>
			
			<?
			// <!-- Ex 2: Top Music News (Loops) -->
			// <!-- Ex 3: Query Variable -->
				$num_Pages = $_GET["news_pages"];
				for ($i=1; $i <= $num_Pages; $i++) {?>
					<li><a href="http://music.yahoo.com/news/archive/?page=<?= $i ?>">Page <?= $i ?></a></li>
				<?}
			?>
			</ol>
		</div>

		<!-- Ex 4: Favorite Artists (Arrays) -->
		<!-- Ex 5: Favorite Artists from a File (Files) -->
		<div class="section">
			<h2>My Favorite Artists</h2>
		
			<ol>
				<?
					$Artists_lines = file("favorite.txt");
					foreach ($Artists_lines as $Artist) { ?>

					<li><a href="http://en.wikipedia.org/wiki/<?= $Artist ?>"><?= "$Artist\n"  ?></a></li>
						
					<?}
				?>
			</ol>
		</div>
		
		<!-- Ex 6: Music (Multiple Files) -->
		<!-- Ex 7: MP3 Formatting -->
		<div class="section">
			<h2>My Music and Playlists</h2>

			<ul id="musiclist">
			
				<?
				$Music_Files = glob("./lab5/musicPHP/songs/*.mp3");
			
				
				for ($i=0; $i < count($Music_Files) ; $i++) { 
					$Max_Sized_File = $Music_Files[$i];
					for ($j= $i + 1; $j < count($Music_Files); $j++) { 
						if(filesize($Max_Sized_File) < filesize($Music_Files[$j])){
							$temp = $Music_Files[$i];
							$Max_Sized_File = $Music_Files[$j];
							$Music_Files[$i] = $Music_Files[$j];
							$Music_Files[$j] = $temp;
						}
					}
				}
				
				foreach ($Music_Files as $Music_File) {?>
					<li class="mp3item"><a href=<?= $Music_File ?>><?= basename($Music_File) . "  "?></a><?= "(".intval((filesize($Music_File)/1024))."KB)" ?></li>
				<?
				}
				?>
				<!-- Exercise 8: Playlists (Files) -->
				
					<?
					$M3U_Files = glob("./lab5/musicPHP/songs/*.m3u");
					
					foreach ($M3U_Files as $M3U_File) {
						$M3U_List = file($M3U_File); 
						
						# --- Reverse Order ---
						# rsort($M3U_List);
						# --- Shuffle ---
						# shuffle($M3U_List);
					
						?>
						<li class="playlistitem"><?= basename($M3U_File) . " : " ?>
						<ul><?
							foreach ($M3U_List as $list) { 
								if(substr($list , 0 , 1) != "#"){ ?>
									<li><?= $list ?></li>
								<?}
								else{
									
								
								}
								?>
									
							<?
							}
							?>
						</ul>
					<?
					}
					?>

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
