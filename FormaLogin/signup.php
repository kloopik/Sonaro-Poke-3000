<?php
    include_once 'header.php';
?>
    <section class="main-container">
        <div class="main-wrapper-signup">
            <h2>Sign Up</h2>
            <form class="signup-form" action="includes/signup.inc.php" method="post">
                <input type="text" name="first" placeholder="First Name">
                <input type="text" name="last" placeholder="Last Name">
                <input type="text" name="email" placeholder="Email">
                <input type="text" name="uid" placeholder="Username">
                <input type="password" name="pwd" placeholder="Password">
                <input type="password" name="cpwd" placeholder="Confim Password">
                <button type="submit" name="submit">Sign Up</button>
            </form>
            <?php
            $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

            if(strpos($fullUrl,"signup=empty")==true){
                echo"<p>Užpildyk visus langelius!</p>";
                exit();
            }
            elseif (strpos($fullUrl,"signup=name A-Z")==true){
                echo"<p>Naudok tik raides!</p>";
                exit();
            }
            elseif (strpos($fullUrl,"signup=invalidemail")==true){
                echo"<p>Neteisingas pašto adresas!</p>";
                exit();
            }
            elseif (strpos($fullUrl,"signup=usertaken")==true){
                echo"<p>Toks vartuotojas jau egzistuoja</p>";
                exit();
            }
            elseif (strpos($fullUrl,"pasword=neteisingas")==true){
                echo"<p>Slaptažodis neteisingas</p>";
                exit();
            }
            elseif (strpos($fullUrl,"pasword=nesutampa")==true){
                echo"<p>Slaptažodis nesutampa</p>";
                exit();
            }
            ?>
        </div>
    </section>
<?php
    include_once 'footer.php';
?> 