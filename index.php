<?php
    //Chek  if user  Coming From  Areguest
 if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        // Assign variables
        $user = filter_var($_POST['username'],FILTER_SANITIZE_STRING);
        $mail = filter_var($_POST ['email'],FILTER_SANITIZE_EMAIL);
        $cell = filter_var($_POST ['cellphone'],FILTER_SANITIZE_NUMBER_INT);
        $msg  = filter_var($_POST['message'],FILTER_SANITIZE_STRING);
        //Creatinh Array of errors
        $formNameError = array() ;
        if(strlen($user) < 5 ){
          $formNameError[] = "Username Nust  be Lareger Than <strong>5</strong> Characters..!";
        }
        if(   $mail !=  filter_var($mail)  ){
          $formNameError[] = "Your email not..!";
        }
        if(strlen($cell) < 11  ){
          $formNameError[] = "cellnumper Nust be Larger Then <strong>11</strong> Numper..!";
        }
        if(strlen($msg) <= 10 ){
          $formNameError[] = "Message Nust be Lareger Then  <strong> 10</strong> Characters..!";
        }
          $headers = 'form'  . $mail .'/r/n';
          $mymail  = 'isa430752@gmail.com';
          $subject = 'Contact form...';
              //if no erroes sendv the mail[to subject,message,Headres]
          if (empty($formNameError)){
        mail($mymail,$subject,$msg,$headers);
          $mymail  = '';
          $subject = '';
          $msg     = '';
          $headers = '';
          $success ='<div class="alert alert-success">We Have Racieved Your Message</div>';
        }
      }
?>
<!DoCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>conect-form</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/fontawesome.min.css">
    <link rel="stylesheet" href="./css/contact.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,400;0,600;0,700;0,800;1,500;1,600&display=swap" >
</head>
    <body>
        <!--start Form-->
        <div class="continyer">
            <h1 class="text-center">Contact My</h1>
            <form class="contact-form" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                    <?php  if( ! empty($formNameError)) { ?>
                      <div class="alert alert-danger" role="alert">
                          <?php foreach($formNameError as $errors){
                              echo $errors. '<br>'; 
                            }
                          ?>
                      </div>
                  <?php } ?>
                  <?php if(isset($success)) echo $success ; ?>
                  <div class="form-group">
                    <input
                      class="form-control" 
                      type="text" 
                      name="username" 
                      placeholder="Type your iser name "
                      value="<?php if(isset($user)) echo $user ; ?>">
                      <span class="axstrisx">*</span>
                  </div>
                  <div class="form-group">
                    <input 
                          class="form-control" 
                          type="email"
                          name="email"    
                          placeholder="Please Type a valid email" 
                          value="<?php if(isset($mail)) {echo $mail ;  } ?>">
                          <span class="axstrisx">*</span>
                  </div>
                      <input class="form-control" 
                      type="text" 
                      name="cellphone" 
                      placeholder="Type your Cellphone.!" 
                      value="<?php if(isset($cell)) { echo $cell ; } ?>">               
                      <div class="form-group">
                <textarea
                    class="form-control" name="message"  
                    placeholder="Your Massege!"><?php if (isset($msg)) {echo $msg ; } ?></textarea>
                          <span class="axstrisx">*</span>
                  </div>
                <input
                    class="btn btn-success btn-block" 
                    type="submit" 
                    value="Send message">
            </form>
        </div>
        <!--End Form-->
        <scriptv src="./js/bootstrap.min.js"></script>
        <scriptv src="./js/jquery-1.12.4.min.js"></script>
    </body>
</html>
