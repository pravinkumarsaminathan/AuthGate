<?php 
include_once "libs/load.php"; 
?>
<!DOCTYPE html>
<html lang="en">

<?php load_templates("_head"); ?>

<body>

    <div class="login-card-container">
        <div class="login-card">
            <?php load_templates("_logo_text"); ?>
            <form class="login-card-form">
                <?php load_templates("_username"); ?>
                <?php load_templates("_email"); ?>
                <?php load_templates("_phone"); ?>
                <?php load_templates("_password"); ?>
                <button type="submit">Auth Up</button>
            </form>
            <div class="login-card-footer">
                Already have an account? <a href="Authin.php">Auth in</a>
            </div>
        </div>

</body>

</html>