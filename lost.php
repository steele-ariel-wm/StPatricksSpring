<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="lost.css">
    <link href='https://fonts.googleapis.com/css?family=Cinzel' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="jquery-2.1.4.min%20(1).js"></script>
    <script type="text/javascript" src="home.js"></script>
    <meta charset="UTF-8">
    <title>St. Patrick's </title>
</head>
<body>
<div class="overlay"></div>
<div class="hover-space">
    <header>
        <div class="logo">St. Patrick's Day</div>
        <nav>
            <ul>
                <li><a href="home.html">Home</a></li>
                <li><a href="lost.html" class="active">Lost Leprechaun</a></li>
            </ul>
        </nav>
    </header>
</div>

<?php
$first_name = $_POST['firstname'];
$last_name = $_POST['lastname'];
$when_it_happened = $_POST['whenithappened'];
$how_long = $_POST['howlong'];
$how_many = $_POST['howmany'];
$alien_description = $_POST['aliendescription'];
$what_they_did = $_POST['whattheydid'];
$fang_spotted = $_POST['fangspotted'];
$email = $_POST['email'];
$other = $_POST['other'];


//This is where you will want to have the students convert MySQLi to PDO
//Tell students to either find the documentation for PDO in Slack or in previous projects

$dbh = new PDO('mysql:host=localhost;dbname=mydb', 'root', 'root');

$query = "INSERT INTO
              aliens_abduction (first_name, last_name, when_it_happened, how_long, how_many,
alien_description, what_they_did, fang_spotted, other, email) " .
    "VALUES (:first_name, :last_name,
:when_it_happened, :how_long, :how_many, :alien_description, :what_they_did,
:fang_spotted, :other, :email)";

$stmt = $dbh->prepare($query);
$result = $stmt->execute(
    array(
        'first_name'        =>  $first_name,
        'last_name'         =>  $last_name,
        'when_it_happened'  =>  $when_it_happened,
        'how_long'          =>  $how_long,
        'how_many'          =>  $how_many,
        'alien_description' =>  $alien_description,
        'what_they_did'     =>  $what_they_did,
        'fang_spotted'      =>  $fang_spotted,
        'other'             =>  $other,
        'email'             =>  $email
    )
);

if(!$result) {
    die('Error querying database.');
}

echo 'Thanks for submitting the form.<br />';
echo 'You were abducted ' . $when_it_happened;
echo ' and were gone for ' . $how_long . '<br />';
echo 'Number of aliens: ' . $how_many . '<br />';
echo 'Describe them: ' . $alien_description . '<br />';
echo 'The aliens did this: ' . $what_they_did . '<br />';
echo 'Was Fang there? ' . $fang_spotted . '<br />';
echo 'Other comments: ' . $other . '<br />';
echo 'Your email address is ' . $email;
?>


</body>
</html>