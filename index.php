<?php 
    if(!empty($_POST))
    {
        $email = "";
        $subject = "";
        $message = "";
        $error = "";
        print_r($_POST);
        if(!empty($_POST['email']))
        {
            $email = $_POST['email'];
            if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                $error .= "Invalid Email";
            }
        }else{
            $error .= "Please Enter Email<br>";
        }

        if(!empty($_POST['subject']))
        {
            $subject = $_POST['subject'];
        }else{
            $error .= "Please Enter The Subject<br>";
        }

        if(!empty($_POST['message']))
        {
            $message = $_POST['message'];
        }else{
            $error .= "Please Enter The Subject<br>";
        }

        if($error == ""){
            $headers = "MIME-Version: 1.0\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8\r\n";
            $headers = "From: ". $email;
           if(mail($email,$subject,$message,$headers)){
            echo  "<div class='alert alert-success' role='alert'>Email Was Sent</div>";
           }else{
            echo  "<div class='alert alert-danger' role='alert'><strong>Found the following error(s):</strong><br><p>Email failed to send</p></div>";
           }
        }else{
            echo  "<div class='alert alert-danger' role='alert'><strong>Found the following error(s):</strong><br><p>".$error.
            "</p></div>";
        }
    }

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Contact Us</title>
</head>
<body>

<h2>Get In Touch With Us</h2>
<div id="error"></div>
<form method="post">
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" name="email"id="email" placeholder="name@example.com">
  </div>
  <div class="form-group">
    <label for="subject">Subject</label>
    <input type="text" class="form-control" name="subject" id="subject" >
  </div>
  
  <div class="form-group">
    <label for="message">Message</label>
    <textarea class="form-control" name="message" id="message" rows="3"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script type="text/javascript">
        $("form").submit(function (e) {
            e.preventDefault();

            var error = "";
            if($("#email").val() == "")
            {
                error += "Please Enter Email<br>";
                
            }
            if($("#subject").val() == "")
            {
                error += "Please Enter Subject<br>";
                
            }
            if($("#message").val() == "")
            {
                error += "Please Enter Message";
                
            }
            if(error != ""){
                $("#error").html(
                    "<div class='alert alert-danger' role='alert'><strong>Found the following error(s):</strong><br><p>"+error+
                    "</p></div>"
                    return false;
                );
            }else{
                return true;
            }
                   
         });
    </script>
</body>
</html>