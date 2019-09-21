<?php  
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php') ;
?>

<?php
 /**
 * 
 */
 class Book 
 {

 	private $db;
    private $fm;
 	
 	function __construct()
 	{
 		 $this->db=new Database();
         $this->fm=new Format();
 	}
 	

 	//Add Book
public function add_book($data,$file){

  $book_name   =mysqli_real_escape_string($this->db->link,$data['book_name']);

  $author_name   =mysqli_real_escape_string($this->db->link,$data['author_name']);

  $cat_id         =mysqli_real_escape_string($this->db->link,$data['cat_id']);

  $book_isbn       =mysqli_real_escape_string($this->db->link,$data['book_isbn']);

  $book_quantity          =mysqli_real_escape_string($this->db->link,$data['book_quantity']);
 
  $book_price         =mysqli_real_escape_string($this->db->link,$data['book_price']);

  $description         =mysqli_real_escape_string($this->db->link,$data['description']);
  
  
    $permited  = array('jpg', 'jpeg', 'png', 'gif');
    $file_name = $file['file']['name'];
    $file_size = $file['file']['size'];
    $file_temp = $file['file']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
    $uploaded_image = "upload/".$unique_image;
    if($book_name==""|| $author_name==""|| $cat_id==""|| $book_isbn==""|| $book_quantity==""|| $book_price=="" || $description=="" || $file_name=="")
    {
    	$msg="<span>Field Must Not Be Empty</span>";
   	  return $msg;
    }
    elseif(!preg_match("/^[0-9]+(\.[0-9]{2})?$/", $book_price)){
    	$msg="<span>Price Must  Be Number</span>";
   	     return $msg;
    }
    elseif(!filter_var($book_quantity, FILTER_VALIDATE_INT)){
    	$msg="<span>Quantity  Must  Be Integer</span>";
   	     return $msg;
    }
    elseif(!filter_var($book_isbn, FILTER_VALIDATE_INT)){
    	$msg="<span>Quantity  Must  Be Integer Number</span>";
   	     return $msg;
    }
    elseif ($file_size >1048567) {
     echo "<span>Image Size should be less then 1MB!
     </span>";
    } elseif (in_array($file_ext, $permited) === false) {
     echo "<span>You can upload only:-"
     .implode(', ', $permited)."</span>";
    }
    else
    {
    	move_uploaded_file($file_temp, $uploaded_image);
    	$query="INSERT INTO books(book_name,author_name,book_isbn,book_cat_id,book_quantity,book_price,description,book_image)
        VALUES('$book_name','$author_name','$book_isbn','$cat_id','$book_quantity','$book_price','$description','$uploaded_image')";
    $result=$this->db->insert($query);
   	if($result)
   	{
   		$msg="<span>Book Inserted Successfully</span>";
   		return $msg;
   	}
   	else
   	{
       $msg="<span>Book NOT Inserted Successfully</span>";
   		return $msg;
   	}
    }

}
 
//get all book

 public function get_all_book()
 {
  $query="SELECT books.*,
          categories.cat_title
          FROM books
          INNER JOIN categories
          on books.book_cat_id = categories.cat_id
          order by book_id asc";
   $result=$this->db->select($query);
   return $result;
}

//delete by id 

public function del_book($id){
  $id   =mysqli_real_escape_string($this->db->link,$id);

  $query="SELECT * FROM books where book_id='$id'";
  $getdata=$this->db->select($query);
  if($getdata)
  {
    while ($delimg=$getdata->fetch_assoc()) {
      $dellink=$delimg['book_image'];
      unlink($dellink);
    }
  }
  $delquery="DELETE FROM books where book_id='$id'";
  $deldata=$this->db->delete($delquery);
  if($deldata)
  {
    echo "<script>alert('Data Deleted Successfully');</script>";
    echo "<script>window.location='books.php'</script>";
  }
  else
  {
    echo "<script>alert('Data Not Deleted ');</script>";
    echo "<script>window.location='books.php'</script>";

  }
}


//get book by id 

public function get_book_by_id($id){
   $id   =mysqli_real_escape_string($this->db->link,$id);
   $query="SELECT books.*,
          categories.cat_title
          FROM books 
          INNER JOIN categories
          on books.book_cat_id=categories.cat_id
          
          where books.book_id='$id'
          ";
      $result=$this->db->select($query);
      return $result;
}

//update book

public function update_book($data,$file,$id){
  
  $id = mysqli_real_escape_string($this->db->link,$id);

  $book_name      =mysqli_real_escape_string($this->db->link,$data['book_name']);

  $author_name    =mysqli_real_escape_string($this->db->link,$data['author_name']);

  $cat_id         =mysqli_real_escape_string($this->db->link,$data['cat_id']);

  $book_isbn      =mysqli_real_escape_string($this->db->link,$data['book_isbn']);

  $book_quantity  =mysqli_real_escape_string($this->db->link,$data['book_quantity']);
 
  $book_price     =mysqli_real_escape_string($this->db->link,$data['book_price']);
  
  
    $permited  = array('jpg', 'jpeg', 'png', 'gif');
    $file_name = $file['file']['name'];
    $file_size = $file['file']['size'];
    $file_temp = $file['file']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
    $uploaded_image = "upload/".$unique_image;
    if($book_name==""|| $author_name==""|| $cat_id==""|| $book_isbn==""|| $book_quantity==""|| $book_price=="")
    {
    	$msg="<span>Field Must Not Be Empty</span>";
   	  return $msg;
    }
    elseif(!preg_match("/^[0-9]+(\.[0-9]{2})?$/", $book_price)){
    	$msg="<span>Price Must  Be Number</span>";
   	     return $msg;
    }
    elseif(!filter_var($book_quantity, FILTER_VALIDATE_INT)){
    	$msg="<span>Quantity  Must  Be Integer</span>";
   	     return $msg;
    }
    elseif(!filter_var($book_isbn, FILTER_VALIDATE_INT)){
    	$msg="<span>Quantity  Must  Be Integer Number</span>";
   	     return $msg;
    }
    else{
    	if(!empty($file_name)) {
    		if($file_size>1048567)
            {
               $msg= "<span>Image Size Should Be less Than 1 MB.</span>";
               return $msg;
            }if(in_array($file_ext, $permited)===false)
            {
             $msg = "<span>You can upload only:-".implode(', ', $permited)."</span>";
             return $msg;
            }else{
            move_uploaded_file($file_temp, $uploaded_image);
	    	$query="UPDATE books
            set
            book_name='$book_name',
            author_name='$author_name',
            book_isbn='$book_isbn',
            book_cat_id='$cat_id',
            book_quantity='$book_quantity',
            book_price='$book_price',
            book_image='$uploaded_image'
            WHERE book_id='$id'";
		       $result=$this->db->insert($query);
		   	if($result)
		   	{
		   		$msg="<span>Book Inserted Successfully</span>";
		   		return $msg;
		   	}
		   	else
		   	{
		       $msg="<span>Book NOT Inserted Successfully</span>";
		   		return $msg;
		    }
    	}
    }else{
    	$query="UPDATE books
        set
        book_name='$book_name',
        author_name='$author_name',
        book_isbn='$book_isbn',
        book_cat_id='$cat_id',
        book_quantity='$book_quantity',
        book_price='$book_price'
        
        WHERE book_id='$id'";
	    $result=$this->db->insert($query);
	   	if($result)
	   	{
	   		$msg="<span>Book Inserted Successfully</span>";
	   		return $msg;
	   	}
	   	else
	   	{
	       $msg="<span>Book NOT Inserted Successfully</span>";
	   		return $msg;
	    }
    }
    
   }
}


public function get_cat_book($id){
   
  $id = mysqli_real_escape_string($this->db->link,$id);
  $query="SELECT * FROM books WHERE book_cat_id='$id'";
  $result=$this->db->select($query);
  return $result;

}


public function get_all_book_by_seggestion(){
   $id = Session::get('userid');
   $query="SELECT user_categories.cat_title
          
          FROM user_categories
          INNER JOIN users
          on user_categories.cat_id = users.user_cat_id
          where users.id='$id'
          ";
   $result=$this->db->select($query);
   if ($result){
      $result=$result->fetch_assoc();
      $result = $result['cat_title'];
    }

      $query2="SELECT * FROM categories";
      $result2=$this->db->select($query2);
      if($result2){
      while ($value=$result2->fetch_assoc()) {
         if($value['cat_title'] == $result){
          $cat_id = $value['cat_id'];
          $query3="SELECT * FROM books where book_cat_id LIKE '$cat_id'";
          $result3=$this->db->select($query3);
          return $result3;
         }else{
          // $query3="SELECT * FROM books LIMIT 5";
          // $result3=$this->db->select($query3);
          // return $result3;
         }
      }
    }
  
  $query3="SELECT * FROM books LIMIT 5 ORDER BY DESC";
  $result3=$this->db->select($query3);
  return $result3;

}




 }//end of class