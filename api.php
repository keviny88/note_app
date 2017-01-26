

<?php

mysql_connect("localhost", "root", "");

mysql_select_db("note_application");


if(isset($_GET['id']))
{
	$id= $_GET['id'];
}
else
{
	exit();
}


$query= mysql_query("SELECT*FROM notes WHERE note_id='$id'");


while($row= mysql_fetch_array($query))
{
	echo $row['note_body'];
}

?>