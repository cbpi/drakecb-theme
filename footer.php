    </main>
    
    <footer class="pFooter <?php if( is_front_page() ){echo '';}else{echo 'exfont';}?>">

        <div class="container-fluid">

            <div class="col-md-6 col-sm-12 col-xs-12 fCopy">
                Copyright © 2016-<?php echo date("Y")?>. <span>DRAKECB</span>
            </div>
            <a href="#" data-scroll class="scrollToTop" style="display: block;"><i class="fa fa-angle-double-up"></i></a>
            <div class="col-md-6 col-sm-12 col-xs-12 fIcons">
                <a href="https://www.instagram.com/pi0918pi/" rel="nofollow">
                    <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
                <a href="https://www.facebook.com/profile.php?id=100011947177329" rel="nofollow">
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
                <a href="#">
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
                <a href="#">
                    <i class="fa fa-dribbble" aria-hidden="true"></i>
                </a>
            </div>

        </div>

    </footer>
    <?php wp_footer();?>
</body>

</html>
