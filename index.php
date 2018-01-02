<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="style.css">
	<title>Extra Credit Assignment</title>
</head>

<body id="body">
	<center>
		<h1>Anirudh Bachiraju | Posting Website</h1>
		<br />
		<div id="postingdiv">
			<textarea rows="10" cols="100" name="post" form="form"></textarea>
			<form action="index.php" method="post" id="form">
				<input class="button" type="submit">
			</form>
		</div>
		<br />
		<hr />
		<br />
	</center>
<?php
$myfile = fopen("data.txt", "a+") or die("Unable to open file!");
// Output one line until end-of-file
while(!feof($myfile)) {
  echo fgets($myfile) . "<br>";
}
$txt = $_POST["post"];
fwrite($myfile, $txt);
?>
<hr />
<?php
$line_counter = 0;
$desired_line = 2;
while ((! feof($myfile)) && ($line_counter < $desired_line)) {
    if ($s = fgets($myfile,1048576)) {
        $line_counter++;
    }
}
fclose($myfile) or die($php_errormsg);
print $s;
?>
</body>

</html>
