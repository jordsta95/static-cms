<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<style>
.newsbox{width:48%; display:inline-block; vertical-align:top; padding:1%;}
@media only screen and (max-width: 580px) {.newsbox{width:100%; display:block;}}
</style>
</head>
<body>
<?php 
	$getPage = $_SERVER['QUERY_STRING'];
	$page = "uploads/" . $getPage . ".php";
	
	$directory = 'uploads/';
	$scanned_directory = array_diff(scandir($directory, 1), array('..', '.'));
	
	if (file_exists($page)) {
    include $page;
} else {
	echo '
	<title>My Example News Page - This section needs editing</title>
<meta name="description" content="This is an example news page. This section needs editing">
<h1>Welcome to the example news page</h1>
<h2>Find below all news that has appeared on this site</h2>
';
	foreach ($scanned_directory as $value) {
		$file = file_get_contents('uploads/' . $value);
		$less_words = implode(' ', array_slice(explode(' ', $file), 0, 50));
		$result = strip_tags($less_words, '<p><a><strong><em>');
		$query = str_replace(".php","",$value);
		$url = "http://example.com/news.php?" . $query;
    echo '<div class="newsbox"><p>'.$result.' ...<br> <a href="'.$url.'">Read more</a></p></div>';
	}
}
	?>
</body>
</html>
