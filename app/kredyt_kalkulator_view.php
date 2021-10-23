<?php
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<meta charset="utf-8" />
<title>Kalkulator kredytowy</title>
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
</head>
<body>

    
   <div style="width:90%; margin: 2em auto;">
	<a href="<?php print(_APP_ROOT); ?>/app/inna_chroniona.php" class="pure-button">kolejna chroniona strona</a>
	<a href="<?php print(_APP_ROOT); ?>/app/security/logout.php" class="pure-button pure-button-active">Wyloguj</a>
</div>
    
    
<form action="<?php print(_APP_URL);?>/app/kredyt_kalkulator.php" method="post" class="pure-form pure-form-stacked>
        <legend>Kalkulator Kredytowy</legend>
        <fieldset>
	<label for="id_x">Kwota kredytu: </label>
	<input id="id_x" type="text" name="x" value="<?php print($x); ?>" /><br />
	<label for="id_y">Oproentowanie: </label>
	<input id="id_y" type="text" name="y" value="<?php print($y); ?>" /><br />
        <label for="id_y">Ilość rat: </label>
	<input id="id_y" type="text" name="z" value="<?php print($z); ?>" /><br />
	</fieldset>	
	<input type="submit" value="Oblicz" class="pure-button pure-button-primary" />
</form>	

<?php
//wyświeltenie listy błędów, jeśli istnieją
if (isset($messages)) {
	if (count ( $messages ) > 0) {
		echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

<?php if (isset($result)){ ?>
<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #ff0; width:300px;">
<?php echo 'Wynik: '.$result; ?>
</div>
<?php } ?>

</body>
</html>