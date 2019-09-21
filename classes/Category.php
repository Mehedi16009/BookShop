<?php  
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php') ;
include_once ($filepath.'/../helpers/Format.php');
?>
<?php 
class Category{
private $db;
private $fm;
public function __construct()
{
  $this->db=new Database();
  $this->fm=new Format();
}

//get all category

public function getallCat()
{
   $query="SELECT * FROM categories order by cat_id asc";
   $result=$this->db->select($query);
   return $result;

}

//add category 

public function addcatagory($cat_title){
   $cat_title=$this->fm->validation($cat_title);
   $cat_title=mysqli_real_escape_string($this->db->link,$cat_title);
   if (empty($cat_title)) {
   	  $msg="<span>Field Must Not Be Empty</span>";
   	  return $msg;
   }else
   {
   	$query="INSERT INTO categories(cat_title)
   	  VALUES('$cat_title')";
   	$result=$this->db->insert($query);
   	if($result)
   	{
   		$msg="<span>Catagory Inserted Successfully</span>";
   		return $msg;
   	}
   	else
   	{
       $msg="<span>Catagory NOT Inserted Successfully</span>";
   		return $msg;
   	}
   }
}

//delete category 

public function del_cat($id){
	$id=mysqli_real_escape_string($this->db->link,$id);
    $book_query="SELECT * FROM books where book_cat_id='$id'";
	$getdata=$this->db->select($book_query);
	if($getdata)
	{
	while ($delimg=$getdata->fetch_assoc()) {
	  $dellink=$delimg['book_image'];
	  unlink($dellink);
	}
	}

	$query = "DELETE categories,books FROM categories INNER JOIN books 
              WHERE categories.cat_id=books.book_cat_id";
	$result=$this->db->delete($query);
	 if($result)
	  {
	    echo "<script>alert('Data Deleted Successfully');</script>";
	    echo "<script>window.location='categories.php'</script>";
	  }
	  else
	  {
	    echo "<script>alert('Data Not Deleted ');</script>";
	    echo "<script>window.location='categories.php'</script>";

	  }
}

//get category by id 

public function get_cat_by_id($id){
   $id=mysqli_real_escape_string($this->db->link,$id);
   $query="SELECT * FROM categories WHERE cat_id='$id'";
   $result=$this->db->select($query);
   return $result;
}

//update category 

public function edit_cat($cat_title,$id){
   $cat_title=$this->fm->validation($cat_title);
   $cat_title=mysqli_real_escape_string($this->db->link,$cat_title);
   $id=mysqli_real_escape_string($this->db->link,$id);
   if (empty($cat_title)) {
   	  $msg="<span>Field Must Not Be Empty</span>";
   	  return $msg;
   	}else{
	$query="UPDATE categories
            SET cat_title='$cat_title'
            WHERE cat_id='$id'";
        $result=$this->db->update($query);
       if($result)
   	{
   		$msg="<span>Catagory Updated Successfully</span>";
   		return $msg;
   	}
   	else
   	{
       $msg="<span>Catagory NOT Updated Successfully</span>";
   		return $msg;
   	}
   }
}


//User Categories Funcyions



public function add_user_catagory($cat_title){
   $cat_title=$this->fm->validation($cat_title);
   $cat_title=mysqli_real_escape_string($this->db->link,$cat_title);
   if (empty($cat_title)) {
      $msg="<span>Field Must Not Be Empty</span>";
      return $msg;
   }else
   {
    $query="INSERT INTO user_categories(cat_title)
      VALUES('$cat_title')";
    $result=$this->db->insert($query);
    if($result)
    {
      $msg="<span>Catagory Inserted Successfully</span>";
      return $msg;
    }
    else
    {
       $msg="<span>Catagory NOT Inserted Successfully</span>";
      return $msg;
    }
   }
}


public function getalluserCat(){
   $query="SELECT * FROM user_categories order by cat_id asc";
   $result=$this->db->select($query);
   return $result;
}


public function edit_user_cat($cat_title,$id){
   $cat_title=$this->fm->validation($cat_title);
   $cat_title=mysqli_real_escape_string($this->db->link,$cat_title);
   $id=mysqli_real_escape_string($this->db->link,$id);
   if (empty($cat_title)) {
      $msg="<span>Field Must Not Be Empty</span>";
      return $msg;
    }else{
  $query="UPDATE user_categories
            SET cat_title='$cat_title'
            WHERE cat_id='$id'";
        $result=$this->db->update($query);
       if($result)
    {
      $msg="<span>Catagory Updated Successfully</span>";
      return $msg;
    }
    else
    {
       $msg="<span>Catagory NOT Updated Successfully</span>";
      return $msg;
    }
   }
}


public function get_user_cat_by_id($id){
   $id=mysqli_real_escape_string($this->db->link,$id);
   $query="SELECT * FROM user_categories WHERE cat_id='$id'";
   $result=$this->db->select($query);
   return $result;
}


public function del_user_cat($id){
   $id=mysqli_real_escape_string($this->db->link,$id);
   $query = "DELETE FROM user_categories WHERE cat_id='$id'";
   $result=$this->db->delete($query);
   if($result)
    {
      echo "<script>alert('Data Deleted Successfully');</script>";
      echo "<script>window.location='user_categories.php'</script>";
    }
    else
    {
      echo "<script>alert('Data Not Deleted ');</script>";
      echo "<script>window.location='user_categories.php'</script>";

    }
}





   


}