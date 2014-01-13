<?php
    
    header("Content-type: text/xml");
    
    $host = "localhost";
    $user = "treehouseRead";
    $pass = "worstcasescenario";
    $database = "treehouse";
    
    $dbs= mysql_connect($host, $user, $pass)OR die('couldnt connect to database: '. mysql_error());
    @mysql_select_db($database)OR die('couldnt establish connection: '. mysql_error());
	
    $query="SELECT ProgramID,ActivityName,ProgramDate FROM dbo_programs WHERE ActivityName IS NOT NULL ORDER BY ProgramDate LIMIT 10";
    
    $resultID=mysql_query($query)OR die("Query: $query\n<br />MySQL Error:".mysql_error());
    
    $xml_output = "<?xml version=\"1.0\"?>\n";

$xml_output .= "<results>\n";

for($x = 0 ; $x < mysql_num_rows($resultID) ; $x++){
    $row = mysql_fetch_assoc($resultID);
    $xml_output .= "<student>";
    $xml_output .= "\t<ProgramID>" . $row['ProgramID'] . "</ProgramID>\n";
    //first name
    $xml_output .= "\t\t<ActivityName>" . $row['ActivityName'] . "</ActivityName>\n";
    //last name
    $xml_output .= "\t\t<ProgramDate>" . $row['ProgramDate'] . "</ProgramDate>\n";
    
    $xml_output .= "</student>";
}

$xml_output .= "</results>";
echo $xml_output;


?>
