<?php

//insert.php

$connect = new PDO('mysql:host=localhost;dbname=calendar', 'root', '');

if(isset($_POST["title"]))
{
 $query = "
 INSERT INTO event 
 (title, start_event, end_event, desc_event) 
 VALUES (:title, :start_event, :end_event, :desc_event)
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':title'  => $_POST['title'],
   ':start_event' => $_POST['start'],
   ':end_event' => $_POST['end'],
   ':desc_event'  => $_POST['desc']
  )
 );
}


?>