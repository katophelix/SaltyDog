<!-- Basic code to take the values and stuff them in your db.
Code: -->
<?php
//verify there are values passed on URL
if (isset ($_GET['data1']) && isset ($_GET['data2']) )
{
	//get those values.  you might want to validate them depending on what they are.
	$data1 = $_GET['data1'];
	$data2 = $_GET['data2'];
	
	//open db
	$dbc = mysql_connect ('localhost', 'root', '');
	$dbSelected = mysql_select_db("yourdb", $dbc);

	//insert values into db; the values are inserted, along with the time right now.
	$query = "INSERT INTO mytable (data1Field,data2Field,date)".
					"VALUES ('$data1','$data2',NOW())";
	$result = mysql_query ($query) or die ('Error inserting into db.');
	
	//we're done.  
	mysql_close ($dbc);
	
}
else
{
	die ('Missing paramaeter(s).');
}
?>
<!-- And the basic code to print out all the values... ie. www.yousite.com/displayAll.php 
Code: -->
<?php
$query = 'SELECT * from mytable';
$result = mysql_query ($query);
if (!$result) 
{
	die('Invalid query: ' . mysql_error());
}
else
{
	while ($row = mysql_fetch_array ($result))
	{
		echo ('data1 = '. $row['data1'].' data2 = '.$row['data2'].' date = '.$row['date'].'<br>');
	}
}
?>
