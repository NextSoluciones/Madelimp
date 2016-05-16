<?php
//Variables post del formulario
$txtNombre=$_POST['nombre'];
$txtEmpresa=$_POST['empresa'];
$txtCorreo=$_POST['email'];
$txtTelefono=$_POST['telefono'];
$txaMensaje=$_POST['asunto'];
$btnEnviar=$_POST['enviar'];
$emailcontacto="ventas@nslatino.com";
$mailserver="nextsoluciones.nslatino.com";
$mailuser="webmaster@madelimp.com";
$mailpass="wmMadelimp.4833";
$nombreContacto="Julio Acuña";
$nombreUser="Web";
if (isset($btnEnviar)) {
    //poner aqui el codigo de sendmail para enviar correo
		$mensaje = "Datos del mensaje:<br>";
		$mensaje .= "---------------------------------------------------------------------------<br>";
	    $mensaje .= "Nombre   : " . $txtNombre . "<br>";
	    $mensaje .= "Correo    : " . $txtCorreo . "<br>";
	    $mensaje .= "Empresa   : " . $txtEmpresa . "<br>";
	    $mensaje .= "Telefono  : " . $txtTelefono . "<br>";
	    $mensaje .= "Mensaje   : " . $txaMensaje . "<br>";
		$mensaje .= "---------------------------------------------------------------------------<br>";
		$para    = $emailcontacto;
		$asunto  = "Consulta desde pagina web  ";
		// echo "<script>var URLactual = window.location;alert(URLactual);</script>";
		require('php/includes/sendmail/class.phpmailer.php');
		$mail = new phpmailer();
		$mail->SetLanguage("es", "");
    $mail->CharSet = "UTF-8";
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host      = $mailserver;
    $mail->Port = 25;

		$mail->Username = $mailuser;
    $mail->Password = $mailpass;

		$mail->AddAddress($emailcontacto, $nombreContacto);
    $mail->AddReplyTo($txtCorreo, $txtNombre);
    $mail->SetFrom($mailuser, $nombreUser);

		$mail->IsHTML(true);
		$mail->Subject   = $asunto;
		$mail->Body      = $mensaje;
		$mail->AltBody	 = htmlspecialchars($mensaje);
		if( !$mail->Send() ){
		echo "<script type='text/javascript'>
		alert('Error al enviar el mensaje');
		</script>";}
		else{
		echo  '<script type="text/javascript">
		alert("Su consulta ha sido enviada.\nPronto nos pondremos en contacto con usted");
		</script>';}
}
echo '
	<h1 class="titulo-home">Artículos de Limpieza para el Hogar y la Empresa</h1>
	<div class="contenedor">
		<div class="izquierdo-home">
			<picture class="img-home">
				<img class="img-home-img lazyload loading" src="assets/loading.gif" data-src="assets/productos-de-limpieza-home.jpg" alt="productos-de-limpieza-home"></img>
			</picture>
			<p class="contenido-home">Contamos con una amplia variedad de artículos de limpieza. Encuentre aquí soluciones para el hogar y la empresa. Estamos en Lima - Per&uacute;.</p>
		</div>
		<div class="derecho-home">
			<p class="contenido-form hidden">Si desea m&aacute;s informaci&oacute;n puede indicarnos su correo electr&oacute;nico y
			nos pondremos en contacto con usted a la brevedad:</p>
			<div class="formulario-home hidden">
				<form action="inicio" method="post">
					<span class="nombre-home span">Nombre: </span>
						<input type="text" name="nombre" class="input" required/><br/>
					<span class="empresa-home span">Empresa: </span>
						<input type="text" name="empresa" class="input"/><br/>
					<span class="correo-home span">Correo: </span>
						<input type="email" name="email" class="input" required/><br/>
					<span class="telefono-home span">Telefono: </span>
						<input type="tel" name="telefono" class="input"/><br/>
          <span class="asunto-home span">Consulta: </span>
						<textarea name="asunto" class="area" rows="5"></textarea>
					<input type="submit" value="Enviar" name="enviar" class="boton-home">
				</form>
			</div>
		</div>
	</div>
	';
?>
