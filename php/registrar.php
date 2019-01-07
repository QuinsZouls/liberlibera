<?php
  /**register**/
  include("conexion.php");
  require("crypto.php");
  require 'PHPMailer/PHPMailer/src/PHPMailer.php';
  require 'PHPMailer/PHPMailer/src/Exception.php';
  require 'PHPMailer/PHPMailer/src/SMTP.php';
  require 'PHPMailer/PHPMailer/src/POP3.php';
  require 'PHPMailer/PHPMailer/src/OAuth.php';
  $mail = new PHPMailer\PHPMailer\PHPMailer();
  $nombre=encrypt($_POST['Nombre'],$key);
  $clave=$_POST['Clave_Socio'];
  $apellidos=encrypt($_POST['Apellidos'],$key);
  $email=encrypt($_POST['Email'],$key);
  $nacimiento=$_POST['Nacimiento'];
  $pass1=encrypt($_POST['Password'],$key);
  $pass2=encrypt($_POST['Passwordr'],$key);
  $sql="INSERT INTO usuarios (Email, Nombre, Apellidos, Fecha_Nacimiento, Password, Tipo_Usuario, Activo, Id_socio) VALUES('".$email."', '".$nombre."', '".$apellidos."','".$nacimiento."', '".$pass1."','2','0','".$clave."')";
  if($pass1==$pass2){
    $consulta=mysqli_query($conexion,$sql) or die ("se murio la consulta");
    $link = 'https://www.liberlibera.tk/cuenta/confirmacion/verificar_correo.php?cuenta='.$email.'';
    try{
        $mail->isSMTP();  
        $mail->SMTPDebug=0;
        $mail->Host = 'mail.liberlibera.tk';
        $mail->SMTPAuth = true;
        $mail->Username = "support@liberlibera.tk";
        $mail->Password = "liberlibera05ñ";
        $mail->SMTPSecure = 'tls';                           
        $mail->Port = 26; 
        $mail->From="support@liberlibera.tk";
        $mail->FromName = "Codigo de confirmacion LiberLibera";
        $mail->addAddress($_POST['Email'],"usuario de liberlibera");
        $mail->Subject="Activa tu cuenta de liberlibera";
        $mail->Body='
        <html lang="es">
            <head>
              <title>Verificaci&oacute;n de correo</title>
              <meta name="viewport" content="width=device-width, initial-scale=1.0">
              <meta charset="utf-8">
              <style>
                *{
                  float:inherit;
                }
                .contenedor{
                  margin: auto auto auto auto;
                  text-align:center;
                  max-width:70vw;
                  width:auto;
                  height:90vh;
                  background-color:#313638;
                  display:block;
                }
                img{
                  width: 200px;
                  height: 200px;
                }
                span{
                  font-size:30px;
                  color: #E8E9EB;
                }
                span.txt{
                  font-size:20px;
                  color:#BFBEB5!important;
                }
              </style>
            </head>
            <body>
              <div class="contenedor">
                <span>Club de lectura LiberLibera</span>
                <br>
                <img src="https://www.liberlibera.tk/images/home/liberlibera.jpg">
                <br>
                <span class="txt">Es necesario verificar la cuenta de correo para poder hacer uso de la plataforma</span>
                <br>
                <a href="'.$link.'" class="btn btn-success">Verificar la cuenta</a>
              </div>

            </body>
          </html>
        ';
        $mail->isHTML(true);

        if(!$mail->send()) echo "no envidado ", $mail->ErrorInfo;
        else header("Location: https://www.liberlibera.tk/cuenta/confirmacion/?email='".$email."'");
      }catch (Exception $e) {
        
          echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
      }

  }else{
    echo"Password no coiciden";
  }
?>
