<?php  
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../lib/Session.php');
include_once ($filepath.'/../helpers/Format.php') ;
?>

<?php
 /**
 * 
 */
 class User 
 {

 	private $db;
    private $fm;
 	
 	function __construct()
 	{
 		 $this->db=new Database();
         $this->fm=new Format();
 	}

  public function userRegistration($data){
      
      $first_name=$this->fm->validation($data['first_name']);
      $first_name=mysqli_real_escape_string($this->db->link,$first_name);

      $last_name=$this->fm->validation($data['last_name']);
      $last_name=mysqli_real_escape_string($this->db->link,$last_name);

      $username=$this->fm->validation($data['username']);
      $username=mysqli_real_escape_string($this->db->link,$username);

      $email=$this->fm->validation($data['email']);
      $email=mysqli_real_escape_string($this->db->link,$email);

      $user_cat_id=$this->fm->validation($data['user_cat_id']);
      $user_cat_id=mysqli_real_escape_string($this->db->link,$user_cat_id);

      $password=$this->fm->validation($data['password']);
      $password=mysqli_real_escape_string($this->db->link,$password);

      

      if($first_name==""|| $last_name==""|| $username=="" || $email==""|| $password=="")
        {
        	$msg="<span style='color:red;font-size:20px;'>Field Must Not Be Empty</span>";
        	return $msg;
        }
        $mailcheck="SELECT users.email FROM users Where email='$email'";
        $mailres=$this->db->select($mailcheck);
       if ($mailres!=false) {
                $msg="<span style='color:red;font-size:20px;'>Email already Esits</span>";
                return $msg;
        }
        elseif (filter_var($email, FILTER_VALIDATE_EMAIL)==false) {
        	$msg="<span style='color:red;font-size:20px;'>Invalid Email</span>";
        	return $msg;
        }
        elseif (strlen($password)<6) {
        	$msg="<span style='color:red;font-size:20px;'>password To Short</span>";
        	return $msg;
        }
        else{
        	$password = md5($password);
   	        $validation_code = md5($username.microtime());
   	        $query="INSERT INTO 
   	             users( first_name,last_name,username,email,user_cat_id,password,validation_code,active)
	             VALUES('$first_name','$last_name','$username','$email','$user_cat_id','$password','$validation_code',0)";
	        $result=$this->db->insert($query);

	         $subject = "Activation Account";
		     $msg = "Please Click the Link below to activate your Account
		     http://localhost/BookShop/activate.php?email=$email&code=$validation_code";
		     $headers = "From: noreply@yourwebsite.com";
		     mail($email,$subject,$msg,$headers);

		     if ($result) {
		     	Session::set_message("Confirmation link has been sent to $email,  please verify
                 your account by clicking on the link in the message!");
		     	 header("Location: login.php");
		     }else{
		     	$_SESSION['message'] = 'Registration failed!';
                header("Location: error.php");
		     }
     
        }
  
  }

  public function email_exists($email){
     $mailcheck="SELECT users.email FROM users Where email='$email'";
     $mailres=$this->db->select($mailcheck);
     if ($mailres) {
       return true;
     }
  }


  public function activate_user(){
  	 if ($_SERVER['REQUEST_METHOD'] == "GET") {
		if (isset($_GET['email'])) {
			$email = $this->fm->validation($_GET['email']);
			$email = mysqli_real_escape_string($this->db->link,$email);
			$code = $this->fm->validation($_GET['code']);
            $code = mysqli_real_escape_string($this->db->link,$code);
			$query = "SELECT id FROM users WHERE email='$email' AND validation_code='$code'";
			$result=$this->db->select($query);
			if($result){
			if (mysqli_num_rows($result) == 1) {
				$query2 = "UPDATE users
				       SET 
				       active=1,
				       validation_code=0
				       WHERE email='$email' AND validation_code='$code'";
				$result2=$this->db->update($query2);
				if ($result2) {
				  Session::set_message("<p class='bg-success'>Your account has been activated please login</p>");
	   		      header("Location: login.php");
				}
			 
			}}else{
				Session::set_message("msg","<p class='bg-danger'>Sorry Your account could not be activated</p>");
				header('Location : login.php');
			}
		}
	}
}

public function recover_password(){
   if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_SESSION['token']) && $_POST['token'] === $_SESSION['token']) {
      $email = $this->fm->validation($_POST['email']);
      $email = mysqli_real_escape_string($this->db->link,$_POST['email']);
      if ($this->email_exists($email)) {
        $salt=rand(10,100);
        $code = md5($email . $salt);
        setcookie('temp_access_code',$code,time() + 900);
        $query = "UPDATE users
               SET
               validation_code = '$code'
               WHERE email='$email'";
        $result=$this->db->update($query);
        $subject = "Please Reset Your Password";
        $msg = "Here is Your Reset Password Code {$code}
               Click Here To Reset Your Password http://localhost/BookShop/code.php?email=$email&code=$code";
        $headers = "From: noreply@yourwebsite.com";       
        if(mail($email,$subject,$msg,$headers)){
          Session::set_message("Please Check Your Email");
          header("Location: login.php");
        }else{

        echo $this->fm->display_error_message("Email  Cant Not Be Sent") ;
        }

      }else{
       echo $this->fm->display_error_message("This Email Does Not Exists") ;
      }
    }else{
     header("Location: login.php");
    }
   if (isset($_POST['cancel_submit'])) {
      header("Location: login.php");
    }
        
  }

}

public function validate_code(){
  if (isset($_COOKIE['temp_access_code'])) {
    if (!isset($_GET['email']) && !isset($_GET['code'])) {
      header("Location : login.php");  
    }else if (empty($_GET['email']) && empty($_GET['code'])){
      header("Location : login.php");  
    }else{
      if (isset($_POST['code'])){
        $code = $this->fm->validation($_POST['code']);
        $code = mysqli_real_escape_string($this->db->link,$code);
        $email = $this->fm->validation($_GET['email']);
        $email = mysqli_real_escape_string($this->db->link,$email);
        $query = "SELECT id FROM users WHERE validation_code='$code' AND email='$email'"; 
        $result=$this->db->update($query);
        
        if ($result) {
          if (mysqli_num_rows($result) == 1) {
            setcookie('temp_access_code',$code,time() + 300);
            $this->fm->redirect("reset.php?email=$email&code=$code");
          }
        }else{
          echo $fm->display_error_message("Wrong Validation Code");
        }
      }
    }
  }else{
       set_message("<p class='bg-danger text-center'>Sorry Your Validation Cookie was Expried</p>");
       $this->fm->redirect("recover.php");
  }
}

public function password_reset(){
  if (isset($_COOKIE['temp_access_code'])) {

  if (isset($_SESSION['token']) && isset($_POST['token']) && $_POST['token'] === $_SESSION['token']) {  
    
  if (isset($_GET['email']) && isset($_GET['code'])){
    $password = $this->fm->validation($_POST['password']);
    $password = mysqli_real_escape_string($this->db->link,$password);
    $confirm_password = $this->fm->validation($_POST['confirm_password']);
    $confirm_password = mysqli_real_escape_string($this->db->link,$confirm_password);
    $email = $this->fm->validation($_GET['email']);
    $email = mysqli_real_escape_string($this->db->link,$email);
    if($password == $confirm_password){
    $updated_password = md5($password);
        $query = "UPDATE users
               SET
               password = '$updated_password',
               validation_code=0
               WHERE email='$email'";
        $result=$this->db->update($query);
        Session::set_message("<p class='bg-success text-center'>Your Password has been Changed</p>");
        $this->fm->redirect("login.php");
  }else{
       echo $this->fm->display_error_message("Password fields dont't macth");
  } }
    } }else{
    Session::set_message("<p class='bg-danger text-center'>Sorry your time was expried</p>");
    $this->fm->redirect("recover.php");
  }
}


public function user_login($data){

    $email      = $this->fm->validation($data['email']);
    $email      = mysqli_real_escape_string($this->db->link,$email);  
    $password      = $this->fm->validation($data['password']);
    $password      = mysqli_real_escape_string($this->db->link,$password);
    
    $remember   = isset($data['remember']);

    if($email==""|| $password=="")
      {
        $msg="<span style='color:red;font-size:20px;'>Field Must Not Be Empty</span>";
        return $msg;
      }
    else{
      $pass=md5($password);
      $query="SELECT  * FROM users WHERE email='$email' and password='$pass'";
      $result=$this->db->select($query);
      if($result!=false)
      {

          if ($remember == 'on') {
            setcookie("email",$email,time() + 86400);
          }
          $value=$result->fetch_assoc();
          Session::set("userlogin",true);
          Session::set("userid",$value['id']);
          Session::set("username",$value['username']);
          Session::set("useremail",$value['email']);
          $this->fm->redirect("index.php");
      }
      else
      {
          $this->fm->display_error_message("Your credentials are not correct"); 
      }
   }
}


public  function logged_in(){

  if (Session::get('userlogin')==true || isset($_COOKIE['email'])) {
      
      return true;
    
    }else{
    return false;
  }
  return false;
}



}