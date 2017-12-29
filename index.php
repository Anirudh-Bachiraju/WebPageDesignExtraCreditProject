<!DOCTYPE html>
<html>
<body>
<?php
$myfile = fopen("data.txt", "a+") or die("Unable to open file!");
$txt = "John Doe\n";
fwrite($myfile, $txt);
$txt = "Jane Doe\n";
fwrite($myfile, $txt);
fread($myfile,filesize("data.txt"));
fclose($myfile);
?>
<p>sjkghjksdgjkdffg</p>
</body>
</html>