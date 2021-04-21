<?php
require_once('config.php');
?>

<?php

if(isset($_POST['create'])){

    &name=$_POST['name'];
    &email=$_POST['email'];
    &password=$_POST['password'];

    $sql="INSERT_INTO users(name, email, password) VALUES(?,?,?)";
    $stmtinsert = $db->prepare($sql);
    $result= $stmtinsert->execute([ &name, $email,$password ]);
    if($result){
        echo 'Sucessfully saved.'
    }
    else {
        echo 'There were error while saving the data'
    }else{
        echo 'No idea';
    }

?>