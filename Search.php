<?php include('Databaseconnection.php');
   $key=$_GET['key'];
    echo "$key";

$sql="select * from bookdescriptions where title LIKE '%key%'";

$e=$conn->query($sql);

if( $e ){
     echo " inserted successfully\n";
} else {
    echo "Error " . $conn->error;
}

if(!$e) echo mysql_error();
else
{
while($row=mysqli_fetch_array($e)){
    echo "$row[title] \n";}
} 

?>
