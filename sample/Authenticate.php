
<?php 

function redirect($url){
    if (headers_sent()){
      die('<script type="text/javascript">window.location=\''.$url.'\';</script>');
    }else{
      header('Location: ' . $url);
      die();
    }    
}

function run_query($connection,$query){
    $strSQL=mysqli_query($connection,$query);
    $executed=false;
    if($strSQL){
        $exectued=true;
    }else{
        echo "Error".$connection->error;
    }
          
    return $executed;
}
    include('Databaseconnection.php');

    $successful_login=false;
    $successful_signup=false;
    $person_name;

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
                $person_name=$Results['name'];
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
                $query = "insert into auth(name,email,password,phone_number) values('".$name."','".$email."','".$password."',".$phone_number.")";

                $executed=run_query($connection,$query);
                
                if($executed){
                    $message = "Signup Sucessfully!! ";
                    $successful_signup=true;
                    $person_name=$name;
                }
            }
        }
    }


echo "<br>$message";
if($successful_login){
    
    redirect("/csl203/sample/Register.php?form_submitted=true&message=$message&name=$person_name");
}
else if($successful_signup){
    redirect("/csl203/sample/Register.php?form_submitted=true&message=$message&name=$person_name");

}
else{
    redirect("/csl203/sample/Register.php?message=$message");
}


?>
