
<?php 

function redirect($url){
    if (headers_sent()){
      die('<script type="text/javascript">window.location=\''.$url.'\';</script>');
    }else{
      header('Location: ' . $url);
      die();
    }    
}

function run_query(){
    
}
    include('Databaseconnection.php');

    $successful_login=false;

    if(isset($_POST['action']))
    {          
        if($_POST['action']=="login")
        {
            $email = mysqli_real_escape_string($connection,$_POST['email']);
            $password = mysqli_real_escape_string($connection,$_POST['password']);
            //password
            $strSQL = mysqli_query($connection,"select name from auth where email='".$email."' and password='".($password)."'");
            $Results = mysqli_fetch_array($strSQL);
            if(count($Results)>=1)
            {
                $message = $Results['name']." Login Sucessfully!!";
                $successful_login=true;
            }
            else
            {
                $message = "Invalid email or password!!";
            }        
        }
        elseif($_POST['action']=="signup")
        {
            $name       = mysqli_real_escape_string($connection,$_POST['name']);
            $email      = mysqli_real_escape_string($connection,$_POST['email']);
            $phone_number = mysqli_real_escape_string($connection,$_POST['phone_number']);


            $password   = mysqli_real_escape_string($connection,$_POST['password']);

            
            echo "$email , $password ,$name ,$phone_number";
            $query = "SELECT email FROM auth where email='".$email."'";

            $strSQL = mysqli_query($connection,$query);
            $numResults = mysqli_num_rows($strSQL);

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) // Validate email address
            {
                $message =  "Invalid email address please type a valid email!!";
            }
            elseif($numResults>=1)
            {
                $message = $email." Email already exist!!";
            }
            else
            {
                mysqli_query($connection,"insert into auth(name,email,password,phone_number) values('".$name."','".$email."','".$password."',".$phone_number.")");
                
                
                $message = "Signup Sucessfully!!";
                $successful_login=true;

            }
        }
    }


echo "<br>$message";
/*if($successful_login){
    redirect("/csl203/sample/Register.php?form_submitted=true & message=$message");
}
else{
    redirect("/csl203/sample/Register.php?message=$message");
}
*/

?>
