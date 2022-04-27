<?php
    require 'vendor/autoload.php';

    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;

    try
    {
        if(isset($_POST['name']) AND isset($_POST['firstName']) AND isset($_POST['gender']) AND isset($_POST['email']) AND isset($_POST['country']) AND isset($_POST['reason']) AND isset($_POST['problem']))
        {
    
            $name = htmlspecialchars(strtoupper($_POST['name']));
            $firstname = htmlspecialchars($_POST['firstName']);
            $gender = htmlspecialchars($_POST['gender']);
            $email = htmlspecialchars($_POST['email']);
            $country = htmlspecialchars(strtoupper($_POST['country']));
            $reason = htmlspecialchars($_POST['reason']);
            $problem = htmlspecialchars($_POST['problem']);
    
            $messageContent = "<p>Bonjour ". $name . " " . $firstname . " (" . $gender . " - " . $country . "),</p> 
            Nous avons bien reçu votre requete à propos de votre soucis concernant " . "'" . $reason . "'.<br> 
            Nous nous efforçons de vous répondre dans les plus bref délais.
            <p>Votre description du problème : " . $problem . "</p>
            <p>- L'équipe support de GoubliéLeNomDuSiteMdr</p>";
    
            $phpmailer = new PHPMailer();
    
            $phpmailer->isSMTP();
            $phpmailer->Host = 'smtp.mailtrap.io';
            $phpmailer->SMTPAuth = true;
            $phpmailer->Port = 2525;
            $phpmailer->Username = '2799caf4e1a248';
            $phpmailer->Password = '819a82499db978';
            $phpmailer->CharSet = 'UTF-8';
    
            $phpmailer->setFrom('adressepoubelle.professionnel@gmail.com', 'Michelle');
            $phpmailer->addAddress('adressepoubelle.professionnel@gmail.com');
            $phpmailer->addReplyTo($email, $name, $firstname);
    
            $phpmailer->isHTML(true);
            $phpmailer->Subject = $reason;
            $phpmailer->Body = $messageContent;
            
            
            $phpmailer->send();
            
            $confirmation = 1;
            header('Location: index.php');
  
        }
        else
        {
            echo "Des informations sont manquantes";
        }
    }
    catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$phpmailer->ErrorInfo}";
    }

   
