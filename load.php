<?php

//DB Connection
$connect = new PDO('mysql:host=localhost;dbname=calendar', 'root', '');
$data = array();

$query = "SELECT * FROM event ORDER BY id";

$statement = $connect->prepare($query);

$statement->execute();
//Set response to $result
$result = $statement->fetchAll();
//Set $data from $result
foreach($result as $row)
{
 $data[] = array(
  'id'   => $row["id"],
  'title'   => $row["title"],
  'start'   => $row["start_event"],
  'end'   => $row["end_event"]
 );
}

echo json_encode($data);

?>