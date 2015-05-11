        <div class = "navbar navbar-default navbar-fixed-bottom">

            <div class = "container">
                <?php wp_nav_menu( array('theme_location' => 'home_nav_menu1' )); ?>
                <p class = "navbar-text pull-left">Site Built By Mostafa Attia</p>
            </div>

        </div>
    </div>


    <script src = "http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/bootstrap.min.js"></script>

    <?php wp_footer(); ?>

</body>
</html> 