<?php 
include_once "header.php";
?>

<div id="content-wrap"> 
    <ul class="rslides">
        <li><img src="images/macbeth.png" alt="Macbeth"></li> 
        <li><img src="images/natureofmath.jpg" alt="Nature of Mathematics"></li>
        <li><img src="images/stevejobs.jpg" alt="Steve Jobs"></li>
        <li><img src="images/history.png" alt="History"></li>
        <li><img src="images/calculus.png" alt="Calculus"></li> 
    </ul>


    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="js/responsiveslides.min.js"></script>

    <script>
        $(function () {
            $(".rslides").responsiveSlides({
                auto: true, // Boolean: Animate automatically, true or false
                speed: 500, // Integer: Speed of the transition, in milliseconds
                timeout: 4000, // Integer: Time between slide transitions, in milliseconds
                pager: false, // Boolean: Show pager, true or false
                nav: false
            });
        });
    </script>

</div>


<?php
include_once "footer.php";