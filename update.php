<?php
$connect = new PDO('mysql:host=localhost;dbname=calendar', 'root', '');
if(isset($_POST["id"]))
{
 $query = "
 UPDATE event 
 SET title=:title, start_event=:start_event, end_event=:end_event, desc_event=:desc_event, place_event=:place_event
 WHERE id=:id
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':title'  => $_POST['title'],
   ':start_event' => $_POST['start'],
   ':end_event' => $_POST['end'],
   ':id'   => $_POST['id'],
   ':place_event' => $_POST['place'],
   ':desc_event' => $_POST['desc']
  )
 );
}

?>
