<?php
$connect = new PDO('mysql:host=localhost;dbname=calendar', 'root', '');
if(isset($_POST["id"]))
{
 $query = "
 UPDATE events 
 SET title=:title, desc=:desc, place=:place, start_event=:start_event, end_event=:end_event 
 WHERE id=:id
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':title'  => $_POST['title'],
   ':desc' => $_POST['desc'],
   ':place' => $_POST['place'],
   ':start_event' => $_POST['start_event'],
   ':end_event' => $_POST['end_event'],
   ':id'   => $_POST['id']
  )
 );
}

?>
