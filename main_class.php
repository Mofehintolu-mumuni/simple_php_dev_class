    <?php
    class simple_php_functions {
    
    private $host = "localhost";
    private $username = "root";
    private $password = "Your password";
    private $database = "Your database";
    private $Link;
    private $user_id;
    private $message_id;
    private $url = 
    private $mail_password = "Your mail Pass word"
    private $mail_account = "Your mail account"
    private $mail_host = 
    private $mail_port = 
    private $send_grid_api_key = 
   
   //Users table
    private $users_db_table = "users";
    
    //deactivated users table
    private $deactivated_users_table = "deactivated_users";
  
    //Accounts instant user payments table 
    private $accounts_instant_payment_table = "instant_payment_table_for_accounts";
    
    public $user_image_destination = "C:/wamp/www/PHP/HOUSE-SHARE-PROJECT/PHP format/demo/demo-new/user_images/";
    
    
    
    
    
    
    
   function query($query_statement){
        $mysqli_query = mysqli_query($this->Link,$query_statement);
        return$mysqli_query;
        
    }
   
   
   function fetch_array($query_result){
    $row = mysqli_fetch_array($query_result,MYSQLI_BOTH);
    return$row;
   }
   
  

   
    function sql_escape_string($variable){
        $escaped_string = mysqli_real_escape_string($this->Link,$variable);
        return$escaped_string;
        
    }
   
   
   function sql_num_rows($query){
    $num_rows = mysqli_num_rows($query);
    return$num_rows;
    
   }
   
  private function connnect_to_db(){
    
    $link = mysqli_connect($this->host, $this->username, $this->password, $this->database)or die("Cannot connect to database");
   return$link;
  }


    
     function __construct() {
 
        $link = $this->connnect_to_db();
        //return$link;
  
         $this->Link = $link;
     }

    
    
    function sanitize_phone_number($number){
        if(strlen($number) == 11){
        $cleartag = strip_tags($number);
         
        if(ctype_digit($cleartag) == "TRUE"){
            
           if(preg_match("/^[0-9]{11}$/", $cleartag)) {
         return $cleartag;
        
         }
          else return null;
        
        }
       else return null;
       
         }
          else return null;
         
        }
    
    
    
     function sanitize_first_name($old_string){
        $new_string = strip_tags($old_string);
        if (preg_match("/^[a-zA-Z]{2,12}$/",$new_string)) {
        return $new_string;
        
         }
          else return null;
       
			}
    
    
     function sanitize_other_name($old_string){
        $new_string = strip_tags($old_string);
        if (preg_match("/^[a-zA-Z ]{2,40}$/",$new_string)) {
        return $new_string;
        
         }
          else return null;
       
			}
            
            
            
            
            function sanitize_gender($gender){
                $new_gender = strip_tags($gender);
                 if(preg_match("/^[a-zA-Z ]{4,6}$/",$new_gender)){
                    return $new_gender;
                 }
                 else return null;               
            }
    
    
    function sanitize_email($old_string){
    $new_string = strip_tags($old_string);
            
    if (!filter_var($new_string, FILTER_VALIDATE_EMAIL)) 
    {
    return null;
    }
                elseif(filter_var($new_string, FILTER_VALIDATE_EMAIL)){
                $check = explode("@", "$new_string");
                $check_dns = checkdnsrr("$check[1]", "ANY");
                 if ($check_dns) {
                    return $new_string;
                  }
                  else return null;
                }
                 }
                 
                 
                 
    function sanitize_password($old_string) {
    $new_string = strip_tags($old_string);
    $length = strlen($new_string);
    if(($length <= 12) && ($length != 0)){
        if (preg_match("/^(?=[^\s]*?[0-9])(?=[^\s]*?[a-zA-Z])[a-zA-Z0-9]*$/", $new_string)) {
    return $new_string;
    }
    else return null;
    }
    else return null;
    
    }
    

    
    
    
    function user_registration_date($timestamp){
        $array = getdate($timestamp);
        $reg_date = $array['mday']."-".$array['mon']."-".$array['year'];
        return $reg_date;
    }
    
    
    
    
    
    
    
    }  
    
    
    ?>
