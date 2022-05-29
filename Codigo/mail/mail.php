  <!-- sweetalert2 -->
  <script src="plugins/sweetalert2.all.min.js"></script>
<?php
        //Incluimos los ficheros para mandar correos
        include '../administrador/librerias/PHPMailer/src/Exception.php';
        include '../administrador/librerias/PHPMailer/src/PHPMailer.php';
        include '../administrador/librerias/PHPMailer/src/SMTP.php';

        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;	 

   //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    //aleatoria
    $token = rand(1000,9999);

    try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'dcarbonicas@gmail.com';                     //SMTP username
    $mail->Password   = 'Dcarbonicas$1';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('dcarbonicas@gmail.com', 'Distribuciones Carbónicas S.L');
    $mail->addAddress($email, $nombre);     //Add a recipient
    //$mail->addAddress('mikimontero1996@gmail.com', 'Miguel');               //Name is optional
      
    //Recojo la Ip para poder general el enlace de verificacion  
      $ip = $_SERVER['SERVER_ADDR'];

      $validacion = "$ip/PFG/Codigo/sesion/confirm.php?email=$email";

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Activación de tu cuenta';
    $mail->Body    = 'Tu código de verificación es: '.$token.', vaya aquí para verificar su cuenta:'.$validacion.'';
    


    $mail->send();
   
    $enviado = true;
} catch (Exception $e) {

    $enviado = false;
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>