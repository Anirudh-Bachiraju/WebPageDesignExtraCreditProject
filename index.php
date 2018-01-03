<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="style.css">
	<title>Extra Credit Assignment</title>
</head>

<body id="body" align="center">
	<center>
		<h1>Anirudh Bachiraju | Posting Website</h1>
		<br />
		<div id="postingdiv">
			<textarea rows="10" cols="100" name="post" form="form"></textarea>
			<form action="index.php" method="post" id="form">
				<input class="button" name="submit" type="submit">
				
			</form>
		</div>
		<br />
		<hr />
		<br />
	</center>

<?php
/* creates an html element, like in js */
class html_element
{
	/* vars */
	var $type;
	var $attributes;
	var $self_closers;
	
	/* constructor */
	function html_element($type,$self_closers = array('input','img','hr','br','meta','link'))
	{
		$this->type = strtolower($type);
		$this->self_closers = $self_closers;
	}
	
	/* get */
	function get($attribute)
	{
		return $this->attributes[$attribute];
	}
	
	/* set -- array or key,value */
	function set($attribute,$value = '')
	{
		if(!is_array($attribute))
		{
			$this->attributes[$attribute] = $value;
		}
		else
		{
			$this->attributes = array_merge($this->attributes,$attribute);
		}
	}
	
	/* remove an attribute */
	function remove($att)
	{
		if(isset($this->attributes[$att]))
		{
			unset($this->attributes[$att]);
		}
	}
	
	/* clear */
	function clear()
	{
		$this->attributes = array();
	}
	
	/* inject */
	function inject($object)
	{
		if(@get_class($object) == __class__)
		{
			$this->attributes['text'].= $object->build();
		}
	}
	
	/* build */
	function build()
	{
		//start
		$build = '<'.$this->type;
		
		//add attributes
		if(count($this->attributes))
		{
			foreach($this->attributes as $key=>$value)
			{
				if($key != 'text') { $build.= ' '.$key.'="'.$value.'"'; }
			}
		}
		
		//closing
		if(!in_array($this->type,$this->self_closers))
		{
			$build.= '>'.$this->attributes['text'].'</'.$this->type.'>';
		}
		else
		{
			$build.= ' />';
		}
		
		//return it
		return $build;
	}
	
	/* spit it out */
	function output()
	{
		echo $this->build();
	}
}
?>
<?php
if(isset($_POST['submit'])) {	
	$post = $_POST["post"];
	// Open the text file
	$f = fopen("data.txt", "a");
	// Write text
	fwrite($f, $post . "\n"); 
	// Close the text file
	fclose($f);
	// Open file for reading, and read the line
	$lines = file('data.txt');
	// Loop through our array, show HTML source as HTML source; and line numbers too.
	$votes = 0;
	foreach ($lines as $line_num => $line) {
		$votesid = $line_num + 1;
		$imgid = $votesid + 1;
		$img = new html_element('img');
		$img->set('src','https://upload.wikimedia.org/wikipedia/commons/thumb/1/1b/OOjs_UI_icon_caretUp.svg/2000px-OOjs_UI_icon_caretUp.svg.png');
		$img->set('class','upvote');
		$img->set('width','50');
		$img->set('height','50');
		$img->set('id',$imgid);
		$img->set('onclick','add(this.id)');
		$img->output();
		$pvote = new html_element('h1');
		$pvote->set('text',$votes);
		$pvote->set('id',$votesid);
		$pvote->output();
		$img1 = new html_element('img');
		$img1->set('src','https://upload.wikimedia.org/wikipedia/commons/thumb/0/01/Japanese_Map_symbol_%28Field%29.svg/2000px-Japanese_Map_symbol_%28Field%29.svg.png');
		$img1->set('class','downvote');
		$img1->set('width','50');
		$img1->set('height','50');
		$img1->set('id',$imgid);
		$img1->output();
		$p = new html_element('p');
		$p->set('text',$line);
		$p->set('id',$line_num);
		$p->output();
	}
}
?>
<?php
$header = file_get_contents('index.php');
file_put_contents('saved.php',$header);
?>
<script type="text/javascript">
function add(x) {
    var y = x-1;
    var z = document.getElementById(y).innerHTML;
    z = z+1;
}
</script>
</body>

</html>
