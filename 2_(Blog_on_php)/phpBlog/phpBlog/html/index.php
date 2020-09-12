<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Blog</title>
 </head>
 <body>
  <h1>My Blog</h1>
  <div>
  <form action="action.php" method="post">
  <p>Nickname: <input type="text" name="name" /></p>
  <p>Text: <input type="text" name="post" /></p>
  <p><input type="submit" /></p>
  </form>
    
  <?php
    include "DbConnect.php";
    $db = new DbConnect();

    $conn = $db -> connect();

	$stmt = $conn->prepare("CHECK TABLE test2;");
	$stmt->execute();
	$status = $stmt->fetchAll(PDO::FETCH_ASSOC);
	if ($status[0]['Msg_text']=="OK"){
	echo "OK";
	}else{
		$stmt = $conn->prepare("SET GLOBAL event_scheduler = ON;");
		$stmt->execute();
	
		$stmt = $conn->prepare("CREATE EVENT MyEvent
		ON SCHEDULE EVERY 15 SECOND
		DO
		TRUNCATE TABLE test2;");
		$stmt->execute();
	}

    $stmt = $conn->prepare("create table if not exists test2(name VARCHAR(100) NOT NULL, post VARCHAR(400) NOT NULL)");
    $stmt->execute();


  ?>

  </div>
 </body>
</html>