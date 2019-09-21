    <?php
    /**
    * Format Class
    */
    class Format{
     public function formatDate($date){
      return date('F j, Y, g:i a', strtotime($date));
     }

   public function token_generator(){
    $token = $_SESSION['token'] = md5(uniqid(mt_rand(),true));
    return $token;
   }

  public function display_error_message($error){
  echo'<div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
    </button>
    <strong>Warning!!!'.$error.'</strong>.
    </div>';
}

     public function redirect($location){
        return header("Location: {$location}");
      }


     public function textShorten($text, $limit = 400){
      $text = $text. " ";
      $text = substr($text, 0, $limit);
      $text = substr($text, 0, strrpos($text, ' '));
      $text = $text.".....";
      return $text;
     }

     public function validation($data){
      $data = trim($data);
      $data = stripcslashes($data);
      $data = htmlspecialchars($data);
      return $data;
     }

     public function title(){
      $path = $_SERVER['SCRIPT_FILENAME'];
      $title = basename($path, '.php');
      //$title = str_replace('_', ' ', $title);
      if ($title == 'index') {
       $title = 'home';
      }elseif ($title == 'contact') {
       $title = 'contact';
      }
      return $title = ucfirst($title);
     }
    }
    ?>