<?php
  //incluindo config
  include "../../../../../wp-config.php";

  //Conecta bd
  $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  if (mysqli_connect_errno()) {
      printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
  }

  //Cria UL e LI
  $ulli = "";

  $query = "SELECT meta_value AS picidfito FROM wp_postmeta t2 WHERE post_id IN (SELECT meta_value AS picidfito FROM wp_postmeta t1 WHERE post_id IN (
      SELECT post_id AS picidpost FROM wp_postmeta WHERE meta_value = 2435 AND meta_key = 'useridfoto') AND t1.meta_key = 'foto') AND t2.meta_key = '_wp_attached_file'";

  if ($result = mysqli_query($mysqli, $query)) {
    while ($obj = mysqli_fetch_object($result)) {
        $ulli .= "<li><img width=\"500\" src=\"/wp-content/uploads/".$obj->picidfito."\" /></li>";
    }
    mysqli_free_result($result);
}
?>

<!DOCTYPE html>
<html class="no-js" lang="en">
<head>

  <!-- Demo CSS -->
	<link rel="stylesheet" href="css/demo.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="../flexslider.css" type="text/css" media="screen" />

	<!-- Modernizr -->
  <script src="js/modernizr.js"></script>

</head>
<body class="loading">

      <section class="slider">
        <div id="carousel" class="flexslider">
          <ul class="slides">
            <?php echo $ulli; ?>
          </ul>
        </div>
        <div id="slider" class="flexslider">
          <ul class="slides">
            <?php echo $ulli; ?>
          </ul>
        </div>
        
      </section>
      

  <!-- jQuery -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.min.js">\x3C/script>')</script>

  <!-- FlexSlider -->
  <script defer src="../jquery.flexslider.js"></script>

  <script type="text/javascript">
    $(function(){
      SyntaxHighlighter.all();
    });
    $(window).load(function(){
      $('#carousel').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        itemWidth: 210,
        itemMargin: 5,
        asNavFor: '#slider'
      });

      $('#slider').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        sync: "#carousel",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  </script>


  <!-- Syntax Highlighter -->
  <script type="text/javascript" src="js/shCore.js"></script>
  <script type="text/javascript" src="js/shBrushXml.js"></script>
  <script type="text/javascript" src="js/shBrushJScript.js"></script>

  <!-- Optional FlexSlider Additions -->
  <script src="js/jquery.easing.js"></script>
  <script src="js/jquery.mousewheel.js"></script>
  <script defer src="js/demo.js"></script>

</body>
</html>