<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 <meta http-equiv="refresh" content="5" >
  <title>Blog</title>
 </head>
 <body>
  <div>
  <?php

include "DbConnect.php";
$db = new DbConnect();

$conn = $db -> connect();


$name = htmlspecialchars($_POST['name']);
$post = htmlspecialchars($_POST['post']);



if ($name != "" && $post !="" ){ 
    $name = $conn->quote($_POST['name']);
    $post = $conn->quote($_POST['post']);
    echo("<h2>Your post:</h2>");
    echo("<b>Your nickname:</b>".$name."<br> <br>");
    echo("<b>Text of your post:</b><i>".$post."</i>");
    
    
    

    $query = $conn->prepare("insert `test2` values(:name, :post)");
    $query->bindValue(':name', $name, PDO::PARAM_STR);
    $query->bindValue(':post', $post, PDO::PARAM_STR);
    $query->execute();
}


?>
<h2>Last posts:</h2>

<?php

$query = $conn->prepare("SELECT * FROM test2");
$query->execute();
$Array = $query->fetchAll(PDO::FETCH_ASSOC);


for ($i=count($Array); $i>0; $i--) {
    echo "<b>Author: </b>".$Array[$i-1]['name']." <br><br>";
    echo "<b>Post: </b> <i>".$Array[$i-1]['post']." </i><br><br><br>";
}

?>

 </div>
 </body>
</html>