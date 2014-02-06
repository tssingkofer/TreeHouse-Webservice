<?php

header("Content-type: text/xml");

$host = "localhost";
$user = "treehouseRead";
$pass = "worstcasescenario";
$database = "treehouse";
$query_var = htmlspecialchars($_GET["FirstName"]);
$submit_var = htmlspecialchars($_GET["id"]);

$dbs= mysql_connect($host, $user, $pass)OR die('couldnt connect to database: '. mysql_error());
@mysql_select_db($database)OR die('couldnt establish connection: '. mysql_error());

if ($query_var != "")
{
    $query="SELECT YouthId, FirstName, LastName, DATE_FORMAT(dob,'%m-%d-%Y') as DOB FROM dbo_youthinfo WHERE FirstName ='$query_var'"; //define level here
    $resultID=mysql_query($query)OR die("Query: $query\n<br />MySQL Error:".mysql_error());
    
    $xml_output = "<?xml version=\"1.0\"?>\n";
    
    $xml_output .= "<results>\n";
    
    for($x = 0 ; $x < mysql_num_rows($resultID) ; $x++){
        $row = mysql_fetch_assoc($resultID);
        $xml_output .= "<student>";
        $xml_output .= "\t<YouthId>" . $row['YouthId'] . "</YouthId>\n";
        //first name
        $xml_output .= "\t\t<FirstName>" . $row['FirstName'] . "</FirstName>\n";
        //last name
        $xml_output .= "\t\t<LastName>" . $row['LastName'] . "</LastName>\n";
        //race
        $xml_output .= "\t\t\t<DOB>" . $row['DOB'] . "</DOB>\n";
        $xml_output .= "</student>";
    }
    
    $xml_output .= "</results>";
    
    echo $xml_output;
    
} else
{
    if ($submit_var != "")
    {
        $query2 ="CREATE TABLE IF NOT EXISTS dbo_attendance (`id` INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY, `YouthID` INT( 11 ) NOT NULL COMMENT 'foreign key',`date` DATETIME NOT NULL ,INDEX ( `YouthID` ),
        FOREIGN KEY (YouthID) REFERENCES dbo_youthinfo(YouthID) ON UPDATE CASCADE ON DELETE CASCADE)";
        //ALTER TABLE `dbo_attendance` ADD FOREIGN KEY ( `YouthID` ) REFERENCES `treehouse`.`dbo_youthinfo` (`YouthID`) ON DELETE CASCADE ON UPDATE CASCADE ;
        $query="INSERT INTO `treehouse`.`dbo_attendance` (`id` ,`YouthID` ,`date`)VALUES (NULL , '$submit_var', NOW())"; //define level here
        $requltID2=mysql_query($query2)OR die("Query: $query2\n<br />MySQL Error:".mysql_error());
        $resultID=mysql_query($query)OR die("Query: $query\n<br />MySQL Error:".mysql_error());
        
        
        /*$xml_output = "<?xml version=\"1.0\"?>\n";
         $xml_output .= "<results>\n";
         $row = mysql_fetch_assoc($resultID);
         $xml_output .= "\t<YouthId>" . "" . "</YouthId>\n";
         $xml_output .= "</results>"; */
    }
}
?>
