<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Parallax Welcome Page</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'><link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Home </title>
<link rel="stylesheet" href="/AuthGate/css/style.css">

</head>
<body>
  
  

<!-- Starbackground -->
<div id='stars'></div>
<div id='stars2'></div>
<div id='stars3'></div>

<!-- parallax text/java -->
<div id="parallax">
  <div class="layer" data-depth="0.6">
  
<!-- text -->
    <div class="some-space">
      <h1>Welcome <?php print($_SESSION['username']);?>!</h1>
    </div>
  
  </div>
  <div class="layer" data-depth="0.4">
    <div id="particles-js"></div>
  </div>

<!-- Button -->
  <div class="layer" data-depth="0.3">
    <div class="some-more-space1"><a><form>
      <button type="submit" name="logout">logout</button>
    </form></a></div>
  </div>
</div>

</body>
</html>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js'></script>
<script src='https://matthew.wagerfield.com/parallax/deploy/jquery.parallax.js'></script><script  src="/AuthGate/js/script.js"></script>

</body>
</html>
