<?php
$mail = "Prueba de mensaje";
//Titulo
$titulo = "Codigo de confirmacion";
//cabecera
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
//dirección del remitente 
$headers .= "From: LiberLibera < support@liberlibera.tk >\r\n";
//Enviamos el mensaje a tu_dirección_email 
$bool = mail("alfredomedranosanchez@gmail.com ",$titulo,$mail,$headers);
if($bool){
    echo "Mensaje enviado";
}else{
    echo "Mensaje no enviado";
}
?>