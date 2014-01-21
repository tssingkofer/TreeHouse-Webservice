<?php
    
    header("Content-type: text/xml");
    
    $host = "localhost";
    $user = "root";
    $pass = "root";
    $database = "treehouse";
    $query_var = htmlspecialchars($_GET["ProgramID"]);

    
    $dbs= mysql_connect($host, $user, $pass)OR die('couldnt connect to database: '. mysql_error());
    @mysql_select_db($database)OR die('couldnt establish connection: '. mysql_error());
    
    if ($query_var != "")
    {
        $query="SELECT ActivityName, ProgramDate FROM dbo_programs WHERE ProgramID ='$query_var'"; //define level here
        $resultID=mysql_query($query)OR die("Query: $query\n<br />MySQL Error:".mysql_error());
        
        $xml_output = "<?xml version=\"1.0\"?>\n";

$xml_output .= "<results>\n";

for($x = 0 ; $x < mysql_num_rows($resultID) ; $x++){
    $row = mysql_fetch_assoc($resultID);
    $xml_output .= "\t<ActivityName>" . $row['ActivityName'] . "</ActivityName>\n";
    //ProgramDate
    $xml_output .= "\t\t<ProgramDate>" . $row['ProgramDate'] . "</ProgramDate>\n";
    
}

$xml_output .= "</results>";

echo $xml_output;

}
?>
