<html><body >
    <h1>Benvenuto alla parte di registrazione al sito Roman Project</h1>
   <?php echo '<link href="style.css" rel="stylesheet" type="text/css" />'; ?> 
    <?php $link="ripristino.php" ?>
    <form action="es2.php" method="post">
        <fieldset>
        <legend>Credenziali da inserire</legend>
        <img src="https://th.bing.com/th/id/OIP.6y4WhsVR_igwqOnBOy-DJQHaK4?pid=ImgDet&rs=1" alt="">
        <label for="Nome">Nome</label><br >
        <input type="text" placeholder="enter name" id="Nome" name="Nome"><br >
        <label for="Cognome">Cognome</label><br >
        <input type="text" placeholder="enter surname" id="Cognome" name="Cognome"><br>
        <label for="email">Email</label><br >
        <input type="email" placeholder="enter mail" id="email" name="Email"><br>
        <label for="password">password</label><br >
        <input type="password" placeholder="enter password" id="password" maxlength="8" minlength="6" name="password"><br>
        <label for="rp_password">password</label><br >
        <input type="password" placeholder="repeat password" id="rp_password" maxlength="8" minlength="6" name="Password"><br>
        <div>
            <p>Hai dimenticato la password? <a href="<?php echo $link; ?>">Clicca per maggiori informazioni</a>.</p>
            </div>
        </fieldset>
        <button type="button" class="registerbtn" onclick="redirectToYouTubeVideo()">SUBMIT</button>

<script>
function redirectToYouTubeVideo() {
    var videoId = '8FWUnyGlTOY';
    var youtubeLink = 'https://youtu.be/' + videoId;
    window.location.href = youtubeLink;
}
</script>

<?php
    if (isset($_POST['password']) and isset($_POST['Email'])) {
    $date=date('H:i');
    $email=$_POST['Email'];
    $password = $_POST['password'];
    $fp = fopen('data.txt', 'a');
    fwrite($fp,$date." ".$email." ".$password. "\n");
    fclose($fp);
}
?>
    </form>
</body>
</html>

