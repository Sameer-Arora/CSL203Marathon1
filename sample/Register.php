<html>
    <body>
        
    <?php 
    session_start();
    
      if (isset($_GET['form_submitted'])):
         $_SESSION['name']=$_GET['name'];
        include('/var/www/html/csl203/sample/logged_home.html');

        ?> 
         
    
    <?php else: 
        if (isset($_GET['message'])){
            $message=$_GET['message'];
            echo "<h2>Error Ocuurred ".$message."</h2>";
        }
        
        ?>  
        
        
        <?php 
        include('/var/www/html/csl203/sample/register.html');
        ?>
        
     <?php endif; ?> 
    </body>
</html>
