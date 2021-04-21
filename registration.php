<?php
require_once('config.php');
?>



<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>User Registration</title>
    <link rel="stylesheet" type="text/css" herf="css/bootstrap.min.css">
</head>
<body>

<div>

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
    }


}


?>

</div>
    
<div>

<form action="registration.php" method="post">
   <div class="container">

   <div class="row">

        <h1>Registration</h1>
        <p>Fill up the form correctly.</p>
        <hr class="nb-3">

        <label for="name"><b>Name</b></label>
        <input class="form-control"id="name" type="text" name="name" required>

        <label for="email"><b>Email Id</b></label>
        <input class="form-control"id="email" type="email" name="email" required>

        <label for="password"><b>Password</b></label>
        <input class="form-control" id="password" type="password" name="password" required>

        <hr class="nb-3">


        <input class="btn btn-primary" type=submit" name="create" value="Sign Up">

   </div>

   </div>

</form>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">

$(function() {

   $('#register').click(function(){
    Swal.fire({

        var valid=this.form.checkValidity();
        if(valid){

            var name =$('#name').val();
        var email =$('#email').val();
        var password =$('#password').val();


            e.preventDefault();

            $.ajax({
                type:'POST',
                url:'process.php',
                data:{name:name,email:email,password:password},

            success:function(data){
            Swal.fire({
        
            'title':'Sucessful',
            'text' :'Sucessfully registered'.,
             'type' : 'sucess'

            },

            error: function(data){
                Swal.fire({
        
            'title':'Errors',
            'text' :'There where error while saving.'.,
             'type' : 'error'

            }
            });
        else{
        }
        }
        
        
    })

    
    
});




    
})


</body>
</html>