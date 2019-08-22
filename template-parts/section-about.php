<!-- about section -->
<section id="about" >
    <div class="container">
        <div class="row">
            <div class="col-md-4 wow animated fadeInLeft">
                <div class="recent-works">
                    <h3>Recent Works</h3>
                    <div id="works">
                        <?php
                        $args = array(
                            'post_type' => 'blueone_works',
                            'post_status' => 'publish',
                            'posts_per_page' => -1
                        );
                        $loop_work = new WP_Query( $args );
                        while ( $loop_work->have_posts() ) : $loop_work->the_post();
                            ?>
                            <div class="work-item">
                                <?php the_content(); ?>
                            </div>
                            <?php
                        endwhile;
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-7 col-md-offset-1 wow animated fadeInRight">
                <div class="welcome-block">
                    <h3>Welcome To Our Site</h3>
                    <div class="message-body">
                        <?php
                        $frontpage_id = get_option( 'page_on_front' );
                        $image = get_field('about_section_img', $frontpage_id);
                        if( !empty($image) ): ?>
                            <img src="<?php echo $image['url']; ?>" class="pull-left" alt="member" />
                        <?php endif;
                         the_field('about_section_description', $frontpage_id);
                         ?>
                    </div>
                    <a href="#" class="btn btn-border btn-effect pull-right">Read More</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end about section -->