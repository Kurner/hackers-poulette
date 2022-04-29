<?php 
session_start();
session_destroy()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bellota:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../asset/style.css">
    <title>Document</title>
</head>
<body>

    <div class='container-fluid'>
        <img class="logoHacker" src="../asset/img/hackers-poulette-logo.png" alt="Logo Hackers Poulette">
         
    <?php 
        if(!empty($_SESSION['mailSend']))
                    { 
                        echo "<span class='valid'>" . $_SESSION['mailSend'] . "</span>";
                    }
    ?>
    
    <form action='formulaireTraitement.php' method='POST'>
        <div class='form-group'>
            <label for='name'>Votre nom : </label>
            <input type='text' class='form-control' id='name' name='name'>
            <?php if(!empty($_SESSION['emptyName']))
                { 
                    echo "<span class='error'>" . $_SESSION['emptyName'] . "</span>";
                }
            ?>
        </div>
        
        <div class='form-group'>
            <label for='firstName'>Votre prénom : </label>
            <input type='text' class='form-control' id='firstName' name='firstName'>
            <?php if(!empty($_SESSION['emptyFirstName']))
                { 
                    echo "<span class='error'>" . $_SESSION['emptyFirstName'] . "</span>";
                }
            ?>
        </div>

        <div class='form-group'>
            <label for='gender'>Votre sexe : </label>
            <div class='form-check'>

                <input class='form-check-input' type='radio' name='gender' id='genderH' value='Homme'>
                <label class='form-check-label' for='exampleRadios2'>
                    Homme
                </label>

            </div>
            <div class='form-check'>

                <input class='form-check-input' type='radio' name='gender' id='genderF' value='Femme'>
                <label class='form-check-label' for='exampleRadios2'>
                    Femme
                </label>

            </div>
            <div class='form-check disabled'>

                <input class='form-check-input' type='radio' name='gender' id='genderN' value='No binary' disabled>
                <label class='form-check-label' for='genderN'>
                    Non binaire
                </label>

            </div>
            <?php if(!empty($_SESSION['emptyGender']))
                { 
                    echo "<span class='error'>" . $_SESSION['emptyGender'] . "</span>";
                }
            ?>
        </div>

        <div class='form-group'>
            <label for='country'>Votre pays : </label>
            <input type='text' class='form-control' id='country' name='country'>
            <?php if(!empty($_SESSION['emptyCountry']))
                { 
                    echo "<span class='error'>" . $_SESSION['emptyCountry'] . "</span>";
                }
            ?>
        </div>

        <div class='form-group'>
            <label for='email'>Votre adresse mail : </label>
            <input type='email' class='form-control' id='email' name='email'>
            <?php if(!empty($_SESSION['emptyEmail']))
                { 
                    echo "<span class='error'>" . $_SESSION['emptyEmail'] . "</span>";
                }
            ?>
        </div>

        <div class='form-group'>
            <label for='reason'>Raison de votre ticket : </label>

            <select class='form-control' id='reason' name='reason'>
                <option value='On a volé mon vélo'>On a volé mon vélo</option>
                <option value="J'ai pas retrouvé Nemo">J'ai pas retrouvé Nemo</option>
                <option value='La raison 3'>La raison 3</option>
            </select>
            
        </div>

        <div class='form-group'>
            <label for='problem'>Expliquez votre problème : </label>
            <textarea class='form-control' id='problem' name='problem' rows='3'></textarea>
            <?php if(!empty($_SESSION['emptyProblem']))
                { 
                    echo "<span class='error'>" . $_SESSION['emptyProblem'] . "</span>";
                }
            ?>
        </div>

        <input type='submit' value='Envoyer'>
    </form>

</div>

?>

  <!-- <form action="formulaireTraitement.php" method="post">
        <p>
            <label for="name">Votre nom : </label>
            <input type="text" name="name"> 
        </p>
        <p>
            <label for="firstName"> Votre prénom : </label>
            <input type="text" name="firstName">
        </p>
        <p>
            <label for="gender">Votre sexe : </label>
            <input type="radio" name="gender" value="male"> Homme
            <input type="radio" name="gender" value="female"> Femme
        </p>
        <p>
            <label for="email"> Votre adresse mail : </label>
            <input type="email" id="email" name="email">
        </p>
        <p>
            <label for="country">Votre pays : </label>
            <input type="text" name="country"> 
        </p>
        <p>
            <label for="raison"> Votre raison : </label>
            <select name="raison" id="raison">
                <option value="On a volé mon vélo">On a volé mon vélo</option>
                <option value="J'ai pas retrouvé Nemo">J'ai pas retrouvé Nemo</option>
                <option value="La raison 3">La raison 3</option>
            </select>
        </p>
        <p>
            <label for="problem"> Expliquez votre problème : </label>
            <textarea name="problem"></textarea>
        </p>
        <p>
            <input type='submit' value='Envoyer'>
        </p>
    </form> -->

</body>
</html>