<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the </main> and all content after.
 *
 * @link
 *
 * @package WordPress
 * @subpackage BlueOne
 * @since 1.0.0
 */
?>
</main>

<footer id="footer">
    <div class="container">
        <div class="row text-center">
            <div class="footer-content">
                <div class="wow animated fadeInDown">
                    <p>newsletter signup</p>
                    <p>Get Cool Stuff! We hate spam!</p>
                </div>
                <form action="#" method="post" class="subscribe-form wow animated fadeInUp">
                    <div class="input-field">
                        <input type="email" class="subscribe form-control" placeholder="Enter Your Email...">
                        <button type="submit" class="submit-icon">
                            <i class="fa fa-paper-plane fa-lg"></i>
                        </button>
                    </div>
                </form>
                <div class="footer-social">
                    <ul>
                        <?php if (get_option('soc_thumb_url') ) : ?>
                            <li class="wow animated zoomIn">
                                <a href="<?php echo get_option('soc_thumb_url'); ?>" target="_blank">
                                    <i class="fa fa-thumbs-up fa-3x"></i>
                                </a>
                            </li>
                        <?php endif;
                        if (get_option('soc_tw_url') ) : ?>
                            <li class="wow animated zoomIn" data-wow-delay="0.3s">
                                <a href="<?php echo get_option('soc_tw_url'); ?>" target="_blank">
                                    <i class="fa fa-twitter fa-3x"></i>
                                </a>
                            </li>
                        <?php endif;
                        if (get_option('soc_skype_url') ) : ?>
                            <li class="wow animated zoomIn" data-wow-delay="0.6s">
                                <a href="<?php echo get_option('soc_skype_url'); ?>" target="_blank">
                                    <i class="fa fa-skype fa-3x"></i>
                                </a>
                            </li>
                        <?php endif;
                        if (get_option('soc_dribbble_url') ) : ?>
                            <li class="wow animated zoomIn" data-wow-delay="0.9s">
                                <a href="<?php echo get_option('soc_dribbble_url'); ?>" target="_blank">
                                    <i class="fa fa-dribbble fa-3x"></i>
                                </a>
                            </li>
                        <?php endif;
                        if (get_option('soc_youtube_url') ) : ?>
                            <li class="wow animated zoomIn" data-wow-delay="1.2s">
                                <a href="<?php echo get_option('soc_youtube_url'); ?>" target="_blank">
                                    <i class="fa fa-youtube fa-3x"></i>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>

                <p>Copyright &copy; 2014-2015 Design and Developed By<a href="http://www.themefisher.com">Themefisher</a> </p>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
