<?php

    session_start();

    require 'vendor/autoload.php';

    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;

    try
    {

        // On vérifie si les champs sont vides, si ils le sont, on crée une session contenant le msg d'erreur
        // Trouver comment en faire une fonction

        if(empty($_POST['name'])) 
        {
            $_SESSION["emptyName"] = "Le nom est requis";
        }

        if(empty($_POST['firstName']))
        {
            $_SESSION['emptyFirstName'] = "Le prénom est requis";
        }

        if(empty($_POST['gender']))
        {
            $_SESSION['emptyGender'] = "Veuillez choisir votre sexe";
        }

        if(empty($_POST['email']))
        {
            $_SESSION['emptyEmail'] = "Veuillez inscrire votre email";
        }

        if(empty($_POST['country']))
        {
            $_SESSION['emptyCountry'] = "Veuillez indiquer votre pays";
        }

        if(empty($_POST['problem']))
        {
            $_SESSION['emptyProblem'] = "Veuillez indiquer votre soucis";
        }

        
        // Si les données sont entrées

        if(!empty($_POST['name']) AND !empty($_POST['firstName']) AND !empty($_POST['gender']) AND !empty($_POST['country']) AND !empty($_POST['email']) AND !empty($_POST['problem']))
        {
            
            $name = htmlspecialchars(strtoupper($_POST['name']));
            $firstname = htmlspecialchars($_POST['firstName']);
            $gender = htmlspecialchars($_POST['gender']);
            $email = htmlspecialchars($_POST['email']);
            $country = htmlspecialchars(strtoupper($_POST['country']));
            $reason = htmlspecialchars($_POST['reason']);
            $problem = htmlspecialchars($_POST['problem']);
    
            // Contenu du mail

            $messageContent = "<p>Bonjour ". $name . " " . $firstname . " (" . $gender . " - " . $country . "),</p> 
            Nous avons bien reçu votre requete à propos de votre soucis concernant " . "'" . $reason . "'.<br> 
            Nous nous efforçons de vous répondre dans les plus bref délais.
            <p>Votre description du problème : " . $problem . "</p>
            <p>- L'équipe support de GoubliéLeNomDuSiteMdr</p>";
    
            // Mise en place de trap mail

            $phpmailer = new PHPMailer();
    
            $phpmailer->isSMTP();
            $phpmailer->Host = 'smtp.mailtrap.io';
            $phpmailer->SMTPAuth = true;
            $phpmailer->Port = 2525;
            $phpmailer->Username = '2799caf4e1a248';
            $phpmailer->Password = '819a82499db978';
            $phpmailer->CharSet = 'UTF-8';
    
            $phpmailer->setFrom($email, $name . " " . $firstname);
            $phpmailer->addAddress('adressepoubelle.professionnel@gmail.com');
            $phpmailer->addReplyTo($email, $name, $firstname);
    
            $phpmailer->isHTML(true);
            $phpmailer->Subject = $reason;
            $phpmailer->Body = $messageContent;
            
            // Envoie du mail
            
            $phpmailer->send();

            $_SESSION['mailSend'] = "Votre mail a bien été envoyé !";
            
        }

        header('Location: index.php');

    }
    catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$phpmailer->ErrorInfo}";
    }

   
