<!-- Testimonial section -->
<section id="testimonials" class="parallax">
    <div class="overlay">
        <div class="container">
            <div class="row">

                <div class="sec-title text-center white wow animated fadeInDown">
                    <h2>What people say</h2>
                </div>

                <div id="testimonial" class=" wow animated fadeInUp">
                    <?php
                    $args = array(
                        'post_type' => 'testimonials',
                        'post_status' => 'publish',
                        'posts_per_page' => -1
                    );
                    $loop_work = new WP_Query( $args );
                    while ( $loop_work->have_posts() ) : $loop_work->the_post();
                        ?>
                        <div class="testimonial-item text-center">
                            <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="Our Clients">
                            <div class="clearfix">
                                <span><?php the_title(); ?></span>
                                <?php the_content(); ?>
                            </div>
                        </div>
                        <?php
                    endwhile;
                    ?>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- end Testimonial section -->