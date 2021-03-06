<!--
 * Author : Rohit Shakya
 * Date   : May-2020
 * Editor : Sublime text
 * Local server: Xampp
 * Title : Username and Password Authentication System 
 -->
<?php
session_start(); 
?> 
<!DOCTYPE html>
<html lang="en">
  <head>
	<title>UserPage</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>
<body style="background:white">
<div class="alert alert-success">
	<div class="container">
  <strong>Welcome!!
<?php
if(!isset($_SESSION['username']))
{
	header('Location: home1.html');
}
else
{
  echo ucfirst($_SESSION['username']);  
}
 
?></strong>
<p>"You are successfully authenticated!!"</p><a href="logout.php">Logout<br><br></a></div> 
<?php
  $rss = new DOMDocument(); //https://bavotasan.com/2010/display-rss-feed-with-php/
  $rss->load('https://news.google.com/news/rss'); //http://wordpress.org/news/feed/
  $feed = array();
  foreach ($rss->getElementsByTagName('item') as $node) {
    $item = array ( 
      'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
      'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
      'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
      'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,
      );
    array_push($feed, $item);
  }
  $limit = 5;
  for($x=0;$x<$limit;$x++) {
    $title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
    $link = $feed[$x]['link'];
    $description = $feed[$x]['desc'];
    $date = date('l F d, Y', strtotime($feed[$x]['date']));
    echo '<p><strong><a href="'.$link.'" title="'.$title.'">'.$title.'</a></strong><br />';
    echo '<small><em>Posted on '.$date.'</em></small></p>';
    echo '<p>'.$description.'</p>';
  }
?>
</body>
</html>
