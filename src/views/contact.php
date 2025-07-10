<?php
    // Load constants for contact information
    require_once __DIR__ . '/../config/constants.php';

    if (isset($_POST['btn-send'])) 
    {
        $UserName = $POST['UName'];
        $Email = $POST['Email'];
        $Subject = $POST['Subject'];
        $Msg = $POST['msg'];

        if (empty($UserName) || empty($Email) || empty($Subject) || empty($Msg)) 
        {
            header('location:../../public/index.php?error');
        }
        else {

            $to = CONTACT_EMAIL; // Using constant instead of hardcoded email

            if (mail($to,$Subject,$Msg,$Email)) 
            {
                header("location:../../public/index.php?success");
            }

        }
    }
    else 
    {
        header("location:../../public/index.php#contact");
    }




?>










