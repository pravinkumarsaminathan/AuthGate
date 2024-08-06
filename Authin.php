<?php 
include_once "libs/load.php"; 
?>
<!DOCTYPE html>
<html lang="en">

<?php load_templates("_head"); ?>

<body>

    <div class="login-card-container">
        <div class="login-card">
            <?php load_templates("_logo"); ?>
            <div class="login-card-header">
                <h1>Auth In</h1>
                <div>Please login to use the platform</div>
            </div>
            <form class="login-card-form">
                <?php load_templates("_email"); ?>
                <?php load_templates("_password"); ?>
                <?php load_templates("_remember"); ?>
                <button type="submit">Sign In</button>
            </form>
            <div class="login-card-footer">
                Don't have an account? <a href="index.php">Create a free account.</a>
            </div>
        </div>

</body>

</html>