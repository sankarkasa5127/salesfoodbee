<?php
ini_set("display_errors", "1");
header("Content-Type: application/json");
$servername = "wp10975332.server-he.de";
$username = "dbu10975332";
$password = "ch03ms23";
$dbname = "db10975332-abee";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo"<pre>"; print_r($_POST);

if(isset($_POST['submit'])){
 $restaurant_id =  $_POST['restaurant_id']; 
 $number = rand();
 $booking = str_pad($number, 8, "0", STR_PAD_LEFT);
 $no_of_person =  $_POST['no_of_person'];
 $name =  $_POST['name'];
 $email =  $_POST['email'];
 $phone_no =  $_POST['phone_no'];
 $message =  $_POST['message'];
 $slot =  $_POST['slot'];
 $date =  $_POST['date'];


 
 if($name == "" || $email == "" || $no_of_person== "" ||  $phone_no == "" || $message =="" || $slot == "" || $date==""){
    $response = array(
        'status' => false,
        'message' => 'An error occured... all Field is required'
    ); 
echo  $json_responce =  json_encode($response);  
 die();
     
 }


$sql = "INSERT INTO bookings (restaurant_id, reservation_id, no_of_person , name ,email, phone_no, message, slot , date)
VALUES('$restaurant_id', '$booking','$no_of_person', '$name' , '$email' , '$phone_no' , '$message' ,'$slot' , '$date')";

if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
     $get_query = 'SELECT * FROM tbl_users WHERE code= '.$restaurant_id;  
        $result=mysqli_query($conn, $get_query);
    $res = $result->fetch_assoc();
    //  echo"<pre>"; print_r($res['userId']); die();
    
        
require_once __DIR__ . '/vendor/autoload.php';
         $response=array();
        $response['error']='202';
        $response['data']= $last_id;
        $response['start']='';
        $pusherdata['message']=$response;
          $options = array(
            'cluster' => env('PUSHER_APP_CLUSTER'),
            'useTLS' => true
          );
            $pusher = new Pusher(
              env('PUSHER_APP_KEY'),
              env('PUSHER_APP_SECRET'),
              env('PUSHER_APP_ID'),
              $options
            );
            $pusher->trigger('foodbeeApp', 'ReservationStatus'.$res['userId'], $pusherdata);
    
    $response = array(
        'status' => true,
        'message' => 'Your  Reservation  created successfully'
    );
    echo  $json_responce =  json_encode($response);  
    } else {
     $response = array(
        'status' => false,
        'message' =>  "Error: " . $sql . "<br>" . $conn->error
    ); 
    echo  $json_responce =  json_encode($response);  
    die();
  
}

$conn->close();
}
?>
<?php
$message = "
<html>
  <head>
    <title>NEW RESERVATIONS</title>
  </head>
  <body>
    <table>
  <tr>
    <th>Name:</th>
	<td> ".$name. "</td>  
  </tr>
  <tr>
  <th>Email:</th>
  <td>".$email. "</td>
  </tr>
  <tr>
  <th>Mobile:</th>
  <td>".$phone_no. "</td>
  </tr>
  <tr>
  <th>Date:</th>
  <td>".$date. "</td>
  </tr>
  <tr>
  <th>Time:</th>
  <td>".$slot. "</td>
  </tr>
  <tr>
  <th>Anzahl der Personen:</th>
  <td>".$no_of_person. "</td>
  </tr>
  <tr>
  <th>Message:</th>
  <td>".$message. "
<tr>




</td>
	</tr>
  </td>
  </tr>
 
   
</table>
  </body>
</html>
";
$message2 = "
<html>
  <head>
    <title> RESERVATIONS</title>
  </head>
  <body>
    <table>
	 <tr>
    <th>Lieber Gast,</th>
	<td> </td>  
  </tr>
 <tr>
    <td>Ihre Reservierungsanfrage haben wir erhalten. Sie bekommen zeitnah eine Bestaetigung von uns.</td>
	<td> </td>  
  </tr>

 <tr>
 <td>Mit freundlichen Gruessen</td>
 <td></td>
 </tr>
 <tr>
 <td>Ihr Bombay dining Team.</td>
 <td>

 
 </td>
 </tr>
   
</table>
  </body>
</html>
"; 
require 'include/Exception.php';
require 'include/PHPMailer.php';
require 'include/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
$mail = new PHPMailer(true);
	 $sender = 'info@foodbee.de';	
	 	
	  $senderName = "Bombay dining";
	 		
	 $usernameSmtp = 'ravinder2541@gmail.com';
	 $passwordSmtp = 'MFUhmCYtxsOb802p';	
	 $host = 'serversmtp-relay.sendinblue.com';
	 $port = 587; 
	 try {		
	 
// 	 $mail->isSMTP();		
	 $mail->setFrom($sender, $senderName);	
	 $mail->Username   = $usernameSmtp;		
	 $mail->Password   = $passwordSmtp;	
	 $mail->Host       = $host;		
	 $mail->Port       = $port;	
	 $mail->SMTPAuth   = true;		
	 $mail->SMTPSecure = 'tls';		
			
			
			$mail->addAddress("info@bombaydining.de");	 
							
					
	$mail->isHTML(true);	
	
	$mail->Subject    = "Neue Reservierung ab";	
	
	$mail->Body       = $message;
	
	$mail->Send();
			
			// Remove previous recipients
$mail->ClearAllRecipients();
// alternative in this case (only addresses, no cc, bcc): 
// $mail->ClearAddresses();

$mail->Body     =$message2;
//$adminemail = $generalsettings[0]["admin_email"]; 

// Add the admin address
$mail->AddAddress($_POST['email']); 
$mail->Send();
	
	echo "OK";die;		
	} catch (phpmailerException $e) {	
	echo "An error occurred. {$e->errorMessage()}", PHP_EOL;

	} catch (Exception $e) {	
	echo "Email not sent. {$mail->ErrorInfo}", PHP_EOL; 
	
	}			
	die();




?>

