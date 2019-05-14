<?php

// include the head.php with <header> elements
include('head.php');

?>
<!-- put all the posts on the right -->
<div id="right">
<?php
// a function to display each single blog post
function display_post($post){
  echo "<div class='blogPost'>";
  //adding in h1
  echo "<h1>".$post['title']."</h1>";
  echo "<br>";
  //adding in em
  echo "<em>".date('j F, Y', $post['post_date'])."</em>";
  echo "<br>";
  echo $post['content'];
  echo "<br>";
  echo $post['author'];
  echo "<br>";
  foreach ($post['category'] as $category){
    echo ucwords($category).','.' ';
  }
    //display category

}
// load the json file for the posts
$post_data = file_get_contents("data/posts.json");
//decode the json file
$post_data = json_decode($post_data, TRUE);
//sorting posts by date
$dates = array_column($post_data, 'post_date');
array_multisort($dates, SORT_DESC , $post_data);

// loop through the posts
foreach($post_data as $post){
  //display the single post
  display_post($post);
}
?>

<!-- close the #right -->
</div>
<?php
//load the bottom of the page
include('foot.php');
?>
