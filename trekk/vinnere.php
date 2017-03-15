<?php require("../includes/db_config.php") ;?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Konkurranse Vinnere</title>
</head>

<body>
<div id="vinnere">
<?php
//PICK RANDOM WINNERS FROM DATABASE
$result = mysqli_query($link,"SELECT * FROM comp");
$records = mysqli_num_rows($result);
if($records > 5){
	$i = 0;
	$winner = array();
	while(count($winner) < 5){
		$x = mt_rand(1,$records);
		if(!in_array($x,$winner)){
			$winner[$i] = $x;
			$i = $i + 1;
		}
	}
	
	// CREATE MAILBODY VARIABLE WITH INFO
	$mailbody = "<h2>Vinnerne i konkurransen</h2>
	<p><strong>Antall deltakere var $records.stk</strong></p>";
	
	//FUNCTION FOR EXSTRACTING WINNER INFO FROM DB AND ADDING TO MAILBODY VARIABLE
	function getwinners($link,$win,$number){
		$result = mysqli_query($link,"SELECT * FROM comp WHERE id='$win' LIMIT 0,1");
		global $mailbody;
		while($row = mysqli_fetch_array($result)){
			$mailbody .= "<p><strong>Vinner nr $number:</strong></p>";
			$mailbody .= "<p>Vinner nr$number er: <strong>".$row['name']."</strong></p>";
			$mailbody .= "<p>Favoritt rett til ".$row['name']." er: <strong>".$row['dish']."</strong></p>";
			$mailbody .= "<p>Epost adressen til ".$row['name']." er: <a href='mailto:".$row['mail']."'><strong>".$row['mail']."</strong></a></p>";
			$mailbody .= "<p><br /></p>";
		}
	}
	//CALL GETWINNERS FUNCTION AS MANY TIMES AS RANDOM WINNERS
	getwinners($link,$winner[0],1);
	getwinners($link,$winner[1],2);
	getwinners($link,$winner[2],3);
	getwinners($link,$winner[3],4);
	getwinners($link,$winner[4],5);
	
	//GET FAVOURITE DISH FROM USER VOTES
	$action = mysqli_query($link, "SELECT dish,count FROM poll");
	$values = array();
	while($row = mysqli_fetch_array($action)){
		$values[$row['dish']] = $row['count'];
	}
	arsort($values);
	$pollvinner = array_slice($values,0,1,true);
	foreach($pollvinner as $x=>$x_value){
		$mailbody .= "<p><strong>Favoritt Rett</strong></p>";
		$mailbody .= "<p>Retten som fikk mest stemmer er: <strong>$x</strong></p>"; 
		$mailbody .= "<p>Den fikk <strong>$x_value</strong> stemmer.</p>";
		$mailbody .= "<p><br /></p>";
	}
	
	// SEND EMAIL WITH CONTEST WINNERS TO OWNER
	$name = "konkurranse Trekning";
	$mailfrom = "konkurranse@soradas.no";
	$headers = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=utf-8\r\n";
	$headers .= "From: $name <$mailfrom>\r\n";
	$to = "soradas@soradas.no";
	$subject = "Konkurranse Vinnere";
	if(mail($to, $subject, $mailbody, $headers)){
		echo "<h2>Epost med vinner info sendt på epost til soradas@soradas.no</h2>";
	}
	else{
		echo "<h2>Kunne ikke sende epost til deg, noe gikk galt. kontakt utvikler</h2>";
	}
}
else{
	echo "<h1>De må være minst 5 deltakere i konkurransen før du kan trekke en vinner</h1>";
}
?>
</div>

</body>
</html>