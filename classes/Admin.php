<?php  
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php') ;
?>

<?php
 /**
 * 
 */
 class Admin 
 {

 	private $db;
    private $fm;
 	
 	function __construct()
 	{
 		 $this->db=new Database();
         $this->fm=new Format();
 	}


   //get admin info 
	public function get_admin_info(){
		$query="SELECT * FROM admin";
		$result=$this->db->select($query);
		return $result;
	}
  
  //add admin 

	public function add_admin($data){
	   $admin_name=$this->fm->validation($data['admin_name']);
	   $admin_name=mysqli_real_escape_string($this->db->link,$admin_name);

	   $admin_email=$this->fm->validation($data['admin_email']);
	   $admin_email=mysqli_real_escape_string($this->db->link,$admin_email);

	   $admin_pass=$this->fm->validation($data['admin_pass']);
	   $admin_pass=mysqli_real_escape_string($this->db->link,$admin_pass);

	   if($admin_name==" "||$admin_email==" "||$admin_pass==" "){
	   	  $msg="<span>Field Must Not Be Empty</span>";
	   	  return $msg;
	   }
	   elseif(strlen($admin_pass)<6) {
	   	  $msg="<span>Password Must Be Greater Than 6 Charecter</span>";
	   	  return $msg;
	   }
	   elseif (!filter_var($admin_email, FILTER_VALIDATE_EMAIL)) {
	   	  $msg="<span>Invalid Email</span>";
	   	  return $msg;
	   }
	   else
	   {
	   	$admin_pass = password_hash($admin_pass,PASSWORD_DEFAULT);
	   	$query="INSERT INTO admin(admin_name,admin_email,admin_pass)
	   	  VALUES('$admin_name','$admin_email','$admin_pass')";
	   	$result=$this->db->insert($query);
	   	if($result)
	   	{
	   		$msg="<span>Admin Added Successfully</span>";
	   		return $msg;
	   	}
	   	else
	   	{
	       $msg="<span>Admin NOT Added Successfully</span>";
	   		return $msg;
	   	}
	   }
	}

	//admin login 

	public function admin_login($data){
	   $admin_email=$this->fm->validation($data['admin_email']);
	   $admin_email=mysqli_real_escape_string($this->db->link,$admin_email);

	   $admin_pass=$this->fm->validation($data['admin_pass']);
	   $admin_pass=mysqli_real_escape_string($this->db->link,$admin_pass);
	   if($admin_email==" "||$admin_pass==" "){
	   	  $msg="<span>Field Must Not Be Empty</span>";
	   	  return $msg;
	   }else{
	   	  $query="SELECT * FROM admin WHERE admin_email='$admin_email'";
	   	  $result = $this->db->select($query);
	   	  if($result!=false){
	   	  	$value=$result->fetch_assoc();
                if(password_verify($admin_pass,$value['admin_pass'])){
                 Session::init(); 
                 Session::set("adminlogin",true);
                 Session::set("adminid",$value['admin_id']);
                 Session::set("adminname",$value['admin_name']);
                 header("Location:index.php");
                   }
            else
            {
                $msg="<span>Password not matched</span>";
                return $msg; 
            }
	   	  }
	   	  else
            {
                $msg="<span>Email or Password not matched</span>";
                return $msg; 
            }

	   }
	}

	//Change Pass
	public function change_pass($data,$id){
		$id=$this->fm->validation($id);
        $id=mysqli_real_escape_string($this->db->link,$id);
        $old_pass=$this->fm->validation($data['old_pass']);
        $old_pass=mysqli_real_escape_string($this->db->link,$data['old_pass']);
        $new_pass=$this->fm->validation($data['new_pass']);
        $new_pass=mysqli_real_escape_string($this->db->link,$data['new_pass']);

        if($old_pass==""|| $new_pass=="")
        {
            $msg="<span>Field Must Not Be Empty</span>";
            return $msg;
        }else{
          $new_pass = password_hash($new_pass,PASSWORD_DEFAULT);
          $query="SELECT admin_pass FROM admin WHERE admin_id='$id'";
	   	  $result = $this->db->select($query);
	   	  if($result!=false){
	   	  	$value=$result->fetch_assoc();
               if(password_verify($old_pass,$value['admin_pass'])){
                  $query="UPDATE admin
		          SET admin_pass='$new_pass'
		          WHERE admin_id='$id'";
		        $result=$this->db->update($query);
		       if($result)
		   	   {
		   		$msg="<span>Password Updated Successfully</span>";
		   		return $msg;
		   	   }
                
               }
            else
            {
                $msg="<span>Password not matched</span>";
                return $msg; 
            }
	   	  }
       }
	}

//get admin by id 
 public function get_user_by_id($id){
 	$query="SELECT * FROM admin WHERE admin_id='$id'";
   $result=$this->db->select($query);
   return $result;
 }



//update admin ionfo 

public function update_user($data,$id){
   
   
   $id=mysqli_real_escape_string($this->db->link,$id);

   $admin_name=$this->fm->validation($data['admin_name']);
   $admin_name=mysqli_real_escape_string($this->db->link,$admin_name);

   $admin_email=$this->fm->validation($data['admin_email']);
   $admin_email=mysqli_real_escape_string($this->db->link,$admin_email);

   if($admin_name==" "||$admin_email==" "){
   	  $msg="<span>Field Must Not Be Empty</span>";
   	  return $msg;
	}
   elseif (!filter_var($admin_email, FILTER_VALIDATE_EMAIL)) {
   	  $msg="<span>Invalid Email</span>";
   	  return $msg;
	}else{
		$query="UPDATE admin
               SET 
               admin_name='$admin_name',
               admin_email='$admin_email'
               WHERE admin_id='$id'";
        $result=$this->db->update($query);
       if($result)
   	{
   		Session::init();
   		Session::set("username",$admin_name);
   		$msg="<span>Admin Information Updated Successfully</span>";
   		return $msg;
   	}
   	else
   	{
       $msg="<span>Admin Information NOT Updated Successfully</span>";
   		return $msg;
   	}
	}
}


public function add_slider($data,$file){
	$permited  = array('jpg', 'jpeg', 'png', 'gif');
    $file_name = $file['file']['name'];
    $file_size = $file['file']['size'];
    $file_temp = $file['file']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
    $uploaded_image = "upload/slider/".$unique_image;

    if($file_name=="")
    {
    	$msg="<span>Field Must Not Be Empty</span>";
   	  return $msg;
    }
    else
    {
    	move_uploaded_file($file_temp, $uploaded_image);
    	$query="INSERT INTO slider(image)
        VALUES('$uploaded_image')";
    $result=$this->db->insert($query);
   	if($result)
   	{
   		$msg="<span>Slider Image Inserted Successfully</span>";
   		return $msg;
   	}
   	else
   	{
       $msg="<span>Slider Image NOT Inserted Successfully</span>";
   		return $msg;
   	}
    }
}


public function get_all_slider_image(){
  $query="SELECT * FROM slider";
   $result=$this->db->select($query);
   return $result;
}


}