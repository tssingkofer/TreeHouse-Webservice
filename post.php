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

?>
