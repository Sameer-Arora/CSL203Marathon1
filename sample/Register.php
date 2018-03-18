<html>
    <body>

      <?php if (isset($_GET['form_submitted'])): ?> 
         
        <?php 
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
        
        <!-- Login and Signup forms -->
        <!--<div id="tabs">
          <ul>
            <li><a href="#tabs-1">Login</a></li>
            <li><a href="#tabs-2" class="active">Signup</a></li>

          </ul>                 
          <div id="tabs-1">
          <form action="/csl203/sample/Register.php?action=login" method="post" onsubmit="/index.php?email=$ "  >

              <p><input id="email" name="email" type="text" placeholder="Email"></p>
            <p><input id="password" name="password" type="password" placeholder="Password">

            <input name="form_submitted" type="hidden" value="1" /></p>

            <p><input type="submit" value="Login" /></p>

              </form>
          </div>

          <div id="tabs-2">
            <form action="/csl203/sample/Register.php?action=signup" method="post">
            <p><input id="name" name="name" type="text" placeholder="Name"></p>
            <p><input id="email" name="email" type="text" placeholder="Email"></p>
            <p><input id="phone_number" name="phone_number" type="text" placeholder="phone_number">
            <p><input id="password" name="password" type="password" placeholder="Password">

            <input name="action" type="hidden" value="signup" /></p>
            <p><input type="submit" value="Signup" /></p>
          </form>
          </div>
        </div>
        -->
     <?php endif; ?> 
    </body>
</html>
