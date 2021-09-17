<?php
session_start();
include 'db.php';
mysqli_select_db($con,'kuchbhee');
$username = $_SESSION['username'];

$work = $_POST['post'];
$itemname = $_POST['itemname'];

if (isset($work)) {
        echo "<pre>", print_r($_FILES['itemimage']['name']),"</pre>";
        $profileImageName = $username . '_' . $product_names . '_' . $_FILES['itemimage']['name'];
        $path = 'assets/image/';
        if (!file_exists($path)) {
            mkdir($path, 0777,true);
        }
} 
         $target = 'assets/image/'. $profileImageName;
        move_uploaded_file($_FILES['itemimage']['tmp_name'], $target);
        
        mysqli_query($con,"insert into image (image, name) 
        values ( '$profileImageName','$itemname')") or die("failed to query database".mysqli_error());
        
        echo '<script type ="text/javascript"> alert("Item Uploaded Successfully, Your product will be visible to users after varification after few hours!");window.location= "index.html"</script>';
        
?>