<!DOCTYPE html>
<html>
<body>
<?php
$myfile = fopen("data.txt", "a+") or die("Unable to open file!");
// Output one line until end-of-file
while(!feof($myfile)) {
  echo fgets($myfile) . "<br>";
}
$txt = "New Post\n";
fwrite($myfile, $txt);
fclose($myfile);
?>
</body>
</html>
