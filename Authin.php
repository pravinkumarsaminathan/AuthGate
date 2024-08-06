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
                <?php load_templates("_email"); ?>
                <?php load_templates("_password"); ?>
                <?php load_templates("_remember"); ?>
                <button type="submit">Sign In</button>
            </form>
            <div class="login-card-footer">
                Don't have an account? <a href="#">Create a free account.</a>
            </div>
        </div>

</body>

</html>