<?php
    include("opendb.php");
    include("behandl_observation.php");
?>
<!DOCTYPE html>
<html lang="da">
    <head>
        <meta charset="utf-8">
        <title>POBS PlanteOBServationer</title>
        <link rel="stylesheet" href="style.css">

        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="bootstrap/css/styles.css" rel="stylesheet" media="screen">
        
    </head>
    <body>
        <div class="container">
            <header>
                <img src="vaskemaskine_medRim.png" alt="vaskemaskine med rim">             
            </header>
           <?php
                form($conn);
           ?>
            <section id="observationer">
            <?php
                vis_observation($conn);
           ?>
            </section>
            <footer>
                    <p>&copy; Copyright Emilie Fredslund-Andersen & Sofie Friis Jespersen 2018</p>
            </footer>
        </div><!-- pagewrap -->
    </body>
</html>