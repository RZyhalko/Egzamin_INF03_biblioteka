<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="UTF-8" />
	<title>Biblioteka</title>
	<link rel="stylesheet" href="style.css" />
</head>
<body>
	<header id="baner">
		<h1>Biblioteka w Książkowicach Małych</h1>
	</header>
	<section id="lewy">
		<h4>Dodaj czytelnika</h4>
		<form action="biblioteka.php" method="post">
			<label>
				imię:
				<input type="text" name="imie" /><br>
			</label>
			<label>
				nazwisko:
				<input type="text" name="nazwisko" /><br>
			</label>
			<label>
				symbol:
				<input type="number" name="symbol" /><br>
			</label>
			<button>AKCEPTUJ</button>
		</form>
		<?php
		$baza = mysqli_connect('localhost', 'root', '', 'biblioteka');
		if(!empty($_POST['imie']) && !empty($_POST['nazwisko'])) {
			$imie = $_POST['imie'];
			$nazwisko = $_POST['nazwisko'];
			$kod = $imie[0].$imie[1].$nazwisko[0].$nazwisko[1];
			$kod = strtolower($kod);
			$s1 = "INSERT INTO czytelnicy VALUES (NULL, '$imie', '$nazwisko', '$kod');";
			mysqli_query($baza, $s1);
			echo "Dodano czytelnika $imie $nazwisko";
		}
		?>
	</section>
	<section id="srodkowy">
		<img src="biblioteka.png" alt="biblioteka" />
		<h6>
			ul.
			&nbsp;Czytelników&nbsp;15;
			Książkowice Małe
		</h6>
        <p><a href="mailto:biuro@bib.pl">Czy masz jakieś uwagi?</a></p>
	</section>
	<section id="prawy">
		<h4>Nasi czytelnicy:</h4>
		<ol>
		<?php
		$s2 = "SELECT imie, nazwisko FROM czytelnicy;";
		$w2 = mysqli_query($baza, $s2);
		while($tab = mysqli_fetch_row($w2)) {
			echo "<li>$tab[0] $tab[1]</li>";
		}
		mysqli_close($baza);
		?>
		</ol>
	</section>
	<footer id="stopka">
		<p>Projekt witryny: 0000000000</p>
	</footer>
</body>
</html>