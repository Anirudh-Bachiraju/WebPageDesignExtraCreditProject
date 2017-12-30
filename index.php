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
?>
<hr />
<?php
$line_counter = 0;
$desired_line = 29;

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
