<?php
    header("Content-type: text/xml");
    
$host = "localhost";
$user = "administrator";
$pass = "worstcasescenario";
$database = "treehouse";

$Password = htmlspecialchars($_POST["Password"]);
$Username = htmlspecialchars($_POST["Username"]);


$dbs= mysql_connect($host, $user, $pass)OR die('couldnt connect to database: '. mysql_error());
@mysql_select_db($database)OR die('couldnt establish connection: '. mysql_error());

$query2 ="CREATE TABLE IF NOT EXISTS dbo_admin (`id` INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY, `Username` VARCHAR( 11 ) NOT NULL,`Passwd` VARCHAR(100) NOT NULL)";
    
$query="Select Username, Passwd FROM dbo_admin WHERE Username = '$Username' and Passwd = '$Password'";


$resultID2=mysql_query($query2)OR die("Query: $query\n<br />MySQL Error:".mysql_error());
    
$resultID=mysql_query($query)OR die("Query: $query\n<br />MySQL Error:".mysql_error());

$xml_output = "<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>\n";

$xml_output .= "<results>\n";
if (mysql_num_rows($resultID) == 1)
{
   
    $xml_output .= "<account>";
    $xml_output .= "\t<Exists>" . "Yes" . "</Exists>\n";
    $xml_output .= "</account>";
}else {
    $xml_output .= "<account>";
    $xml_output .= "\t<Exists>" . "No" . "</Exists>\n";
    $xml_output .= "</account>";
}
//$row = mysql_fetch_assoc($resultID);
$xml_output .= "</results>";
echo $xml_output;
?>
