<?php
require_once("db_config.php");
define("CONT_OK", "Du er nå med i trekningen, takk for at du deltar");
define("CONT_ERROR", "Kunne ikke legge til ditt konkurranse svar, Prøv igjen senere");
define("CONT_WRONGSEQ", "Du svarte feil på sikkerhetsspørsmålet, Prøv igjen");
define("CONT_CHEAT", "Du kan bare delta en gang per ip adresse, men lykke til i konkurransen");
define("EMPTY_FIELD", "Fyll ut alle felter, prøv igjen.");
$messages = array(
//Comment Messages
"COMMENT_STORED" => urlencode("Takk for din tilbakemelding."),
"COMMENT_NOTSTORED" => urlencode("Beklager, din kommentar ble ikke lagret."),
"COMMENT_EMPTY" => urlencode("Venligst fyll ut alle felter."),
"COMMENT_TOLONG" => urlencode("Beklager, Max 100 tegn i kommentar feltet, Prøv igjen."),
//Email messages
"EMAIL_BIONIC" => "Du er vel ikke både menneske og robot? prøv igjen.",
"EMAIL_NOTHUMAN" => "Bare Mennesker har lov og sende epost til oss, prøv igjen.",
"EMAIL_SENDT" => "Meldingen ble sendt, vi vil svare deg snarest.",
"EMAIL_NOTSENDT" => "Hmm, det gikk ikke, Prøv igjen.",
"EMAIL_NOSEQ" => "Venligst svar om du er Menneske eller Robot.",
"EMAIL_EMPTY" => "Fyll ut alle felter, prøv igjen.",
//Competition messages
"COMP_ERROR" => "Kunne ikke legge til ditt konkurranse svar, Prøv igjen senere",
"COMP_OK" => "Du er nå med i trekningen, Vinneren blir listet på facebook og kontaktet på epost",
"COMP_WRONGSEQ" => "Du svarte feil på sikkerhetsspørsmålet, Prøv igjen",
"COMP_CHEAT" => "Du kan bare delta en gang per ip adresse, men lykke til i konkurransen",
//Admin messages
"WRONG_USER" => "bruker eksisterer ikke, Prøv igjen.",
"LOGOUT" => "Du er nå logget ut.",
//Form From External Host
"HOST_ERROR" => "Du kan kun bruke skjemaet på nettsiden, prøv igjen.",
"EMPTY" => "Fyll ut alle felter, prøv igjen."
);
$page = "../kontakt.php?msg=";
$domains = array("soradas.no", "www.soradas.no", "localhost");
$url = $_SERVER['HTTP_HOST'];
//If the form is submittet from my domain accept the form data
if(in_array($url, $domains)){
session_start();

	//If contact form is submitted
	if(isset($_POST['submitEmail'])){
		//check if a field is empty
		if($_POST['name'] !="" && $_POST['email'] !="" && $_POST['message'] !=""){
			$_SESSION['name'] = $_POST['name'];
			$_SESSION['email'] = $_POST['email'];
			$_SESSION['message'] = $_POST['message'];
			
			if($_POST['checkH'] && $_POST['checkR']){
				$_SESSION['msg'] = $messages['EMAIL_BIONIC'];
				header("Location:".$page."#catering");
				exit;
				}//End If Both Human And Robot
			
			elseif($_POST['checkR']){
				$_SESSION['msg'] = $messages['EMAIL_NOTHUMAN'];
				header("Location:".$page."#catering");
				exit;
				}//End If Human
			
			elseif($_POST['checkH']){
				$ip = $_POST['ip'];
				$name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
				$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
				$message = filter_input(INPUT_POST, "message", FILTER_SANITIZE_STRING);
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type: text/plain; charset=utf-8" . "\r\n";
				$headers .= "From: $name <$email>" . "\r\n";
				$to = "soradas@soradas.no";
				$subject = "Fra Soradas.no Nettside";
				$body = "Fra: " . $name . "\r\n" . "E-post: " . $email . "\r\n" . "\r\n" . "\r\n" . "Melding:" . "\r\n" . $message . "\r\n \r\nSendt fra ip: " . $ip;
				if(mail($to, $subject, $body, $headers)){
					$_SESSION['msg'] = $messages['EMAIL_SENDT'];
					header("Location:".$page."#catering");
					}
					else{
						$_SESSION['msg'] = $messages['EMAIL_NOTSENDT'];
						header("Location:".$page."#catering");
						exit;
						}
				}//End If Robot
			
			else{
				$_SESSION['msg'] = $messages['EMAIL_NOSEQ'];
				header("Location:".$page."#catering");
				exit;
				}
			
			}//End if no empty fields
		
		else{
			$_SESSION['msg'] = $messages['EMAIL_EMPTY'];
			header("Location:".$page."#catering");
			exit;
		}
	
	}//End if Contact form
	
	//If contest form is submitted
	if(isset($_POST['submit_contest'])){
		$page = "../nytt.php#contest";
		$_SESSION['cont_name'] = $_POST['name'];
		$_SESSION['cont_email'] = $_POST['email'];
		$_SESSION['cont_message'] = $_POST['message'];
		//check if a field is empty
		if($_POST['name'] !="" && $_POST['email'] !="" && $_POST['message'] !="" && $_POST['seq'] !=""){
			if($_POST['seq'] == 7){
				$ip = $_POST['ip'];
				$name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
				$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
				$message = filter_input(INPUT_POST, "message", FILTER_SANITIZE_STRING);
				$headers = "MIME-Version: 1.0 \r\n";
				$headers .= "Content-type: text/html; charset=utf-8 \r\n";
				$headers .= "From: $name <$email> \r\n";
				$to = "konkurranse@soradas.no";
				$subject = "Konkurranse Deltaker";
				$body = "<html><head><title>Konkurranse email</title></head><body style='background:#e6e6e6;'>";
				$body .= "<div style='width:200px; margin:30px 10px;'>";
				$body .= "<p><strong>Fra: </strong><em>".$name."</em></p>";
				$body .= "<p><strong>Email: </strong><em>".$email."</em></p>";
				$body .= "</div>";
				$body .= "<div style='width:400px; margin:50px 20px;'>";
				$body .= "<p><strong>Melding:<strong><br />";
				$body .= "<em>".$message."</em></p>";
				$body .= "<p style='margin:0; padding:0; font-size:smaller;'>Sendt fra ip adresse: ".$ip."</p>";
				$body .= "</div>";
				$body .= "</body></html>";
				if(mail($to, $subject, $body, $headers)){
					$_SESSION['cont_msg'] = CONT_OK;
					header("Location:".$page);
				}
				else{
					$_SESSION['cont_msg'] = CONT_ERROR;
					header("Location:".$page);
				}
			}//End If seq == 7
			else{
				$_SESSION['cont_msg'] = CONT_WRONGSEQ;
				header("Location:".$page);
			}
		}//End if no empty fields
		else{
			$_SESSION['cont_msg'] = EMPTY_FIELD;
			header("Location:".$page);
		}
	}//End if Contest form
	
	
	//If competition form is submitted
	if(isset($_POST['submit_comp'])){
		$page = "../konkurranse.php#comp";
		$ip = filter_input(INPUT_POST,'ip',FILTER_SANITIZE_STRING);
		$name = filter_input(INPUT_POST,'name',FILTER_SANITIZE_STRING);
		$_SESSION['name'] = $name;
		$mail = filter_input(INPUT_POST,'mail',FILTER_SANITIZE_EMAIL);
		$_SESSION['mail'] = $mail;
		$dish = filter_input(INPUT_POST,'dish',FILTER_SANITIZE_STRING);
		//if all fields are filled
		if($name != "" && $dish != "none" && $mail != ""){
			$select = mysql_query("Select ip from comp WHERE ip='$ip'");
			$selectpoll = mysql_query("SELECT count FROM poll WHERE dish='$dish'");
			// if user havent entered already
			if(mysql_num_rows($select) == 0 && mysql_num_rows($selectpoll) > 0){
				$action = "INSERT INTO comp (ip, name, dish, mail) VALUES('$ip','$name', '$dish', '$mail')";
				$count = mysql_fetch_array($selectpoll);
				$num = $count[0] + 1;
				$update = "UPDATE poll SET count='$num' WHERE dish='$dish'";
				if(mysql_query($action) && mysql_query($update)){
					$_SESSION['msg'] = $messages['COMP_OK'];
					header("Location:$page");
					}
				else{
					$_SESSION['msg'] = $messages['COMP_ERROR'];
					header("Location:$page");
					}
			}// END if user havent entered already
			else{
				$_SESSION['msg'] = $messages['COMP_CHEAT'];
				header("location:$page");	
			}
		}// END if all fields are filled
		else{
			$_SESSION['msg'] = $messages['EMPTY'];
			header("location:$page");
		}
	}// END if comp form submitted
	
	//If comment form is submitted
	if(isset($_POST['submitComment'])){
		$page = "../admin/admin.php?msgC=";
		$userip = $_POST['ip'];
			if($_POST['name'] != "" && $_POST['comment'] != ""){
				$name = filter_input(INPUT_POST,"name",FILTER_SANITIZE_STRING);
				$comment = filter_input(INPUT_POST,"comment",FILTER_SANITIZE_STRING);
				if(strlen($comment) > 100){
					header("Location:".$page.$messages['COMMENT_TOLONG']."&com=".urlencode($comment)."&cname=".urlencode($name)."#comment");
					}
				else{
					$date = date('d.m.y - H:i');
					$action = "INSERT INTO feedback (date, name, comment) VALUES('$date', '$name', '$comment')";
					if(mysql_query($action,$con)){
						header("Location:".$page.$messages['COMMENT_STORED']."#comment");
						}
					else{
						header("Location:".$page.$messages['COMMENT_NOTSTORED']."#comment");
						}
					}
				}
			else{
				header("Location:".$page.$messages['COMMENT_EMPTY']."#comment");
				}
	}//End If comment form
	
	//if login form submitted
	if(isset($_POST['submitLogin'])){
		if($_POST['username'] && $_POST['password']){
			$username = filter_input(INPUT_POST,'username',FILTER_SANITIZE_STRING);
			$password = filter_input(INPUT_POST,'password',FILTER_SANITIZE_STRING);
			$password = sha1($password);
			$query = mysql_query("SELECT username FROM users WHERE username='$username' AND password='$password'");
			if(mysql_num_rows($query) == 1){
				$expire = time() + 60*60*24;
				setcookie("log", $username, $expire, "/", $_SERVER['HTTP_HOST']); 
				header("Location:../admin/admin.php");
				}
			else{
				header("Location:../admin/index.php?msg=".$messages['WRONG_USER']."#loginform");
				}
			}
		else{
			header("Location:../admin/index.php?msg=".$messages['EMPTY']."#loginform");
			}
		}
	
	//if submitDelete
	if(isset($_POST['submitDelete'])){
		$id = $_POST['id'];
		$action = "DELETE FROM feedback WHERE id='$id'";
		if(mysql_query($action,$con)){
			header("Location:../admin/admin.php?msg=Kommentar slettet");
			}
		else{
			header("Location:../admin/admin.php?msg=Kommentar ble ikke slettet");
			}
		}

	//if logout
	if(isset($_POST['submitLogout'])){
		$expire = time() - 3600;
		setcookie("log", $username, $expire, "/", $_SERVER['HTTP_HOST']);
		header("Location:../admin/admin.php");
		}// End logout
			
}//End if correct Host
else{
	header("Location:".$page.$messages['HOST_ERROR']."#catering");
	exit;
}
?>