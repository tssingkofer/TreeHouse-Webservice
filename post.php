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
    
$Living = htmlspecialchars($_POST["Living"]);
$Hispanic = htmlspecialchars($_POST["Hispanic"]);
$FreeLunch = htmlspecialchars($_POST["FreeLunch"]);
$Ethnicity = htmlspecialchars($_POST["Ethnicity"]);
$Referral = htmlspecialchars($_POST["Referral"]);
    
 

$dbs= new mysqli($host, $user, $pass, $database);
if ($dbs->connect_errno)
    {
    echo "Failed to connect to MySQL: (" . $dbs->connect_errno . ") " . $dbs->connect_error;
    exit();
    }

    //

    $query = ("INSERT INTO dbo_youthinfo (FirstName, LastName, MI, Address, "
                . "City, State, Zip, PhoneHome, PhoneMobile, Email, DOB, Age, Gender, "
                . "Grade, School, HighSchool, GradDate)VALUES ('$FirstName', '$LastName', "
                . "'$MI', '$Address', '$City', '$State', '$Zip', '$PhoneHome', '$PhoneMobile', "
                . "'$Email', '$DOB', '$Age', '$Gender', '$Grade', '$School', '$HighSchool', '$GradDate'); ");

                //. " Select last_insert_id() as insert_id");
//echo $query;

//'Firstname', 'LastName', 'MI', 'Address', 'City', 'State', 'Zip', 'PhoneHome', 'PhoneMobile', 'Email', 'DOB', 'Age', 'Gender', 'Grade', 'School', 'HighSchool', 'GradDate')";

//'$FirstName', '$LastName', '$MI', '$Address', '$City', '$State', '$Zip', '$PhoneHome', '$PhoneMobile', '$Email', '$DOB', '$Age', '$Gender', '$Grade', '$School', '$HighSchool', '$GradDate')";

$resultID= mysqli_query($dbs,$query) or die ("Query for dbo_youthinfo: $query\n<br />MySQL Error:" . $dbs->error);

//echo " Ran query. ";
//$resultID=mysql_query($query)OR die("Query for dbo_youthinfo: $query\n<br />MySQL Error:".mysql_error());

//Referral

if ($Referral == "Other Teen/Friend")
{
    $referralID = 1;
}else{
    if ($Referral == "Parent/Other Family Member")
    {
        $referralID = 2;
    }else {
        if ($Referral == "Teacher/School Counselor/School Staff")
        {
            $referralID = 3;
        }else{
                if ($Referral =="Pastor/Minister/Church Staff")
                {
                    $referralID = 4;
                }else{
                    if ($Referral == "Therapist/Social Worker")
                    {
                        $referralID = 5;
                    }else{
                        if ($Referral == "Probation Officer")
                        {
                            $referralID = 6;
                        }else{
                            if ($Referral == "Treehouse staff")
                            {
                                $referralID = 7;
                            }else{
                                $referralID = 0;
                                //There is an error
                            }
                        }
                    }
                }
        }
    }
}



$lastID = mysqli_insert_id($dbs);
//echo $lastID;


//if($resultID->num_rows > 0){
//while ($row = $resultID->fetch_assoc()) {
    //$lastID = $row["last_insert_id()"];
  //  echo $lastID;
//}
//echo $lastID;
//}
mysqli_close($dbs);

$dbs= new mysqli($host, $user, $pass, $database);
if ($dbs->connect_errno)
    {
    echo "Failed to connect to MySQL: (" . $dbs->connect_errno . ") " . $dbs->connect_error;
    exit();
    }

$query3="INSERT INTO dbo_referralsourceyouth (ReferralSourceID, YouthID) VALUES ('$referralID','$lastID')";
    
$resultID3=$dbs->query($query3) or die ("Query for dbo_referralsourceyouth: $query3\n<br />MySQL Error:". $dbs->error);


//Ethnicity

if ($Ethnicity == "American Indian/Alaska Native")
{
    $EthnicityID = 1;
}else{
    if ($Ethnicity == "Black/African American")
    {
        $EthnicityID = 2;
    }else {
        if ($Ethnicity == "Asian")
        {
            $EthnicityID = 3;
        }else{
                if ($Ethnicity =="Native Hawaiian/PacificIslander")
                {
                    $EthnicityID = 4;
                }else{
                    if ($Ethnicity == "White")
                    {
                        $EthnicityID = 5;
                    }else{
                                $EthnicityID = 0;
                                //There is an error
                            }
                    }
        }
    }
}



$query4="INSERT INTO `treehouse`.`dbo_ethnicityyouth` (`EthnicityID`, `YouthID`) VALUES ('$EthnicityID','$lastID')";

$resultID4=$dbs->query($query4) or die ("Query youthID: $query4\n<br />MySQL Error:". $dbs->error);

mysqli_free_result();

//FreeLunch
//
//I can't find a column


//Hispanic

//I see Hispanic as a column in ethnicity

//Living

//I am not seeing where this goes either.

if ($Living == "Mom")
{
    $LivingID = 1;
}else{
    if ($Living == "Dad")
    {
        $LivingID = 2;
    }else {
        if ($Living == "Step Mom")
        {
            $LivingID = 3;
        }else{
                if ($Living =="Step Dad")
                {
                    $LivingID = 4;
                }else{
                    if ($Living == "Mom's Boyfriend/Partner")
                    {
                        $LivingID = 5;
                    }else{
                        if ($Living == "Dad's Girlfriend/Partner")
                            {
                            $LivingID = 6;
                            
                            }else{
                                if ($Living == "Brothers")
                                {
                                    $LivingID = 7;
                            
                                }else{
                                    if ($Living == "Sisters")
                                    {
                                        $LivingID = 8;
                                    }else{
                                        if ($Living == "Other Relatives")
                                        {
                                            $LivingID = 9;
                                        }else{
                                            if ($Living == "Foster Parents")
                                            {
                                                $LivingID = 10;
                                            }else{
                                                $LivingID = 0;
                                                //There is an error
                            }
                    }
                                    }
                                }
                            }
                    }
                }
        }
    }
}

// close connection
mysqli_close($dbs);
//http://php.net/manual/en/reserved.variables.post.php

//echo "good";
?>
