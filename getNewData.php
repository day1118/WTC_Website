<?php
$host="localhost"; //replace with your hostname 
$username="root"; //replace with your username 
$password="pi"; //replace with your password 
$db_name="Data"; //replace with your database 
$db_table="WaterHeight";
$con=mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");
$sql = "select * from $db_table"; //replace emp_info with your table name 
$result = mysql_query($sql);
$json = array();
if(mysql_num_rows($result)){
	while($row=mysql_fetch_row($result)){
		$row[0] = $row[0]*1000;
		$json['data'][]=$row;
	}
}
mysql_close($db_name);
echo json_encode($json); 
// please refer to our PHP JSON encode function tutorial for learning json_encode function in detail 
?>