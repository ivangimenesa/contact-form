<?php

// mail('destinario','assunto','mensagem','from:remetente');
if( mail(trim($_POST['email']), trim($_POST['assunto']), $_POST['mensagem'], "from:igntemplates@gmail.com" ) ){
	$resultado = "Sua mensagem foi enviada com sucesso.";
}else{
	$resultado = "Sua mensagem NÃO foi enviada. <a href='#'>Clique aqui</a> para voltar e tentar novamente.";
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Formul&aacute;rio de Contato</title>
</head>

<body>

<?php echo $resultado?>

</body>
</html>
