<?php 

header("Content-type: text/xml"); 

$host = "localhost"; 
$user = "root"; 
$pass = "root"; 
$database = "TreeHouse"; 
$query_var = htmlspecialchars($_GET["LastName"]);

$linkID = mysql_connect($host, $user, $pass) or die("Could not connect to host."); 
mysql_select_db($database, $linkID) or die("Could not find database."); 


$query = "SELECT YouthId, FirstName, LastName, DOB FROM dbo_YouthInfo WHERE LastName = '{$query_var}'"; 
$resultID = mysql_query($query, $linkID) or die("Data not found."); 

$xml_output = "<?xml version=\"1.0\"?>\n"; 
$xml_output .= "<results>\n"; 

for($x = 0 ; $x < mysql_num_rows($resultID) ; $x++){ 
    $row = mysql_fetch_assoc($resultID); 
    $xml_output .= "\t<YouthId>" . $row['YouthId'] . "</YouthId>\n"; 
    //first name
    $xml_output .= "\t\t<FirstName>" . $row['FirstName'] . "</FirstName>\n"; 
    //last name
    $xml_output .= "\t\t<LastName>" . $row['LastName'] . "</LastName>\n";
    //race
    $xml_output .= "\t\t\t<DOB>" . $row['DOB'] . "</DOB>\n";
     
} 

$xml_output .= "</results>"; 

echo $xml_output; 

?> 