<html>
    <body>
        
    <?php 
    session_start();
        
        include('/Smarty/smarty/libs/Smarty.class.php');

        $smarty = new Smarty;
      
        if (isset($_GET['form_submitted'])):
         $_SESSION['name']=$_GET['name'];
        $smarty->assign('name', $_GET['name']);
        
        $smarty->display('logged_home.tpl');

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
