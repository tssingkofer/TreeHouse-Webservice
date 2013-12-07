<?php
$host = "localhost";
$user = "root";
$pass = "root";
$database = "treehouse";

$FirstName = htmlspecialchars($_POST["FirstName"]);
$LastName = htmlspecialchars($_POST["LastName"]);
$MI = htmlspecialchars($_POST["MI"]);
$Address = htmlspecialchars($_POST["Address"]);
$City = htmlspecialchars($_POST["City"]);
$State = htmlspecialchars($_POST["State"]);
$Zip = htmlspecialchars($_POST["Zip"]);
$PhoneHome = htmlspecialchars($_POST["PhoneHome"]);
$PhoneMobile = htmlspecialchars($_POST["PhoneMobile"]);
$Email = htmlspecialchars($_POST["Email"]);
$DOB = htmlspecialchars($_POST["DOB"]);
$Age = htmlspecialchars($_POST["Age"]);
$Gender = htmlspecialchars($_POST["Gender"]);
$Grade = htmlspecialchars($_POST["Grade"]);
$School = htmlspecialchars($_POST["School"]);
$HighSchool = htmlspecialchars($_POST["HighSchool"]);
$GradDate = htmlspecialchars($_POST["GradDate"]);

$dbs= mysql_connect($host, $user, $pass)OR die('couldnt connect to database: '. mysql_error());
@mysql_select_db($database)OR die('couldnt establish connection: '. mysql_error());

$query="INSERT INTO `treehouse`.`dbo_youthinfo` (`FirstName`, `LastName`, `MI`, `Address`, `City`, `State`, `Zip`, `PhoneHome`, `PhoneMobile`, `Email`, `DOB`, `Age`, `Gender`, `Grade`, `School`, `HighSchool`, `GradDate`)VALUES ('$FirstName', '$LastName', '$MI', '$Address', '$City', '$State', '$Zip', '$PhoneHome', '$PhoneMobile', '$Email', '$DOB', '$Age', '$Gender', '$Grade', '$School', '$HighSchool', '$GradDate')";
    //'Firstname', 'LastName', 'MI', 'Address', 'City', 'State', 'Zip', 'PhoneHome', 'PhoneMobile', 'Email', 'DOB', 'Age', 'Gender', 'Grade', 'School', 'HighSchool', 'GradDate')";

//'$FirstName', '$LastName', '$MI', '$Address', '$City', '$State', '$Zip', '$PhoneHome', '$PhoneMobile', '$Email', '$DOB', '$Age', '$Gender', '$Grade', '$School', '$HighSchool', '$GradDate')";


$requltID=mysql_query($query)OR die("Query: $query\n<br />MySQL Error:".mysql_error());


//http://php.net/manual/en/reserved.variables.post.php
/*if (!empty($_POST))
{
    // Array of post values for each different form on your page.
    $postNameArr = array('FirstName', 'LastName', 'MI', 'Address', 'City', 'State', 'Zip', 'PhoneHome', 'PhoneMobile', 'Email', 'DOB', 'Age', 'Gender', 'Grade', 'School', 'HighSchool', 'GradDate');
    
    // Find all of the post identifiers within $_POST
    $postIdentifierArr = array();
    
    foreach ($postNameArr as $postName)
    {
        if (array_key_exists($postName, $_POST))
        {
            $postIdentifierArr[] = $postName;
        }
    }
    
    // Only one form should be submitted at a time so we should have one
    // post identifier.  The die statements here are pretty harsh you may consider
    // a warning rather than this.
    if (count($postIdentifierArr) != 1)
    {
        count($postIdentifierArr) < 1 or
        die("\$_POST contained more than one post identifier: " .
            implode(" ", $postIdentifierArr));
        
        // We have not died yet so we must have less than one.
        die("\$_POST did not contain a known post identifier.");
    }
    
    switch ($postIdentifierArr[0])
    {
        case 'F1_Submit':
            echo "Perform actual code for F1_Submit.";
            break;
            
        case 'Modify':
            echo "Perform actual code for F2_Submit.";
            break;
            
        case 'Delete':
            echo "Perform actual code for F3_Submit.";
            break;
    }
}
else // $_POST is empty.
{
    echo "Perform code for page without POST data. ";
}*/
?>
