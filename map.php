<?php
if(isset($_POST['org']) && isset($_POST['des']))
{
    $org=$_POST['org'];
    $des=$_POST['des'];
echo $org;
echo$des;
}
else{
    echo "fucker is not working!!!! <br>";
}

?> 
<!Doctype html> 

<body> 
<iframe width="600" height="450" frameborder="0" style="border:0"
src="https://www.google.com/maps/embed/v1/directions?origin=<?php echo $org;?>&destination=<?php echo $des;?>&key=AIzaSyBJpzEwpkTJ9TvXJavpj34EU2tOIOZynLQ" allowfullscreen></iframe>
</body>

</html>
 