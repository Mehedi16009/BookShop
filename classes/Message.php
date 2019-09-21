<?php  
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php') ;
include_once ($filepath.'/../helpers/Format.php');
?>
<?php 
class Message{
private $db;
private $fm;
public function __construct()
{
  $this->db=new Database();
  $this->fm=new Format();
}


public function send_message()
{
	if (isset($_POST['submit'])) {
		$to = "mahmudul.hassan240@gmail.com";
        $name=$this->fm->validation($_POST['name']);
        $name=mysqli_real_escape_string($this->db->link,$name);
		$email=$this->fm->validation($_POST['email']);
        $email=mysqli_real_escape_string($this->db->link,$email);
		$subject=$this->fm->validation($_POST['subject']);
        $subject=mysqli_real_escape_string($this->db->link,$subject);
        $message=$this->fm->validation($_POST['message']);
        $message=mysqli_real_escape_string($this->db->link,$message);
		

		$headres = "From: {$name} {$email}";

		$result = mail($to,$subject,$message,$headres);

		if (!$result) {
			echo "Error";
		}else{
			echo "Sent";
		}

	}
}





}