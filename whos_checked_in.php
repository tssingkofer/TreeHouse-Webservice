<?php
    
    header("Content-type: text/xml");
    
    $host = "localhost";
    $user = "treehouseRead";
    $pass = "worstcasescenario";
    $database = "treehouse";
    
    $dbs= mysql_connect($host, $user, $pass)OR die('couldnt connect to database: '. mysql_error());
    @mysql_select_db($database)OR die('couldnt establish connection: '. mysql_error());
	
	$query="Select YouthID,FirstName,LastName from treehouse.dbo_youthinfo where YouthID in (SELECT YouthID FROM treehouse.dbo_attendance where date = current_date)";
        $resultID=mysql_query($query)OR die("Query: $query\n<br />MySQL Error:".mysql_error());
        
	$xml_output = "<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>\n";

        $xml_output .= "<results>\n";

    $row = mysql_fetch_assoc($resultID);
    $xml_output .= "<student>";
    $xml_output .= "\t<YouthId>" . $row['YouthId'] . "</YouthId>\n";
    //first name
    $xml_output .= "\t\t<FirstName>" . $row['FirstName'] . "</FirstName>\n";
    //last name
    $xml_output .= "\t\t<LastName>" . $row['LastName'] . "</LastName>\n";
    
    $xml_output .= "</student>";
	
$xml_output .= "</results>";
echo $xml_output;

	
	?>
