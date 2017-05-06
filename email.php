<?php
$nome   = $_POST["nome"]; // Pega o valor do campo Nome
$fone   = $_POST["fone"]; // Pega o valor do campo Telefone
$email    = $_POST["email"];  // Pega o valor do campo Email
$estado = $_POST["estado"]; // Pega o valor do campo estado
$mensagem = $_POST["mensagem"]; // Pega os valores do campo Mensagem

// Variável que junta os valores acima e monta o corpo do email

$Vai    = "Nome: $nome\n\nE-mail: $email\n\nTelefone: $fone\n\nMensagem: $mensagem\n\nRegião que deseja atuar: $estado";


require_once("phpmailer/PHPMailerAutoload.php");

define('GUSER', 'igntemplates@gmail.com');  // <-- Insira aqui o seu GMail
define('GPWD', '258749632400');    // <-- Insira aqui a senha do seu GMail

function smtpmailer($para, $de, $de_nome, $assunto, $corpo) { 
  global $error;
  $mail = new PHPMailer();
  $mail->IsSMTP();    // Ativar SMTP
  $mail->SMTPDebug = 0;   // Debugar: 1 = erros e mensagens, 2 = mensagens apenas
  $mail->SMTPAuth = true;   // Autenticação ativada
  $mail->SMTPSecure = 'tls';  // tsl REQUERIDO pelo GMail
  $mail->Host = 'smtp.gmail.com'; // SMTP utilizado
  $mail->Port = 587;      // A porta 587 deverá estar aberta em seu servidor
  $mail->Username = GUSER;
  $mail->Password = GPWD;
  $mail->SetFrom($de, $de_nome);
  $mail->Subject = $assunto;
  $mail->Body = $corpo;
  $mail->AddAddress($para);
  if(!$mail->Send()) {
    $error = 'Mail error: '.$mail->ErrorInfo; 
    echo $error;
    return false;
  } else {
    $error = 'Mensagem enviada!';
    return true;
  }
}

smtpmailer('www.igntemplates@gmail.com', 'igntemplates@gmail.com', 'Enviador', 'Assunto', $Vai);

Header("location:http://www.obrigado.com.br"); // Redireciona para uma página de obrigado.

?> 
