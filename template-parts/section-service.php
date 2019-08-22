<!-- Service section -->
<section id="service">
    <div class="container">
        <div class="row">

            <div class="sec-title text-center">
                <h2 class="wow animated bounceInLeft">Service</h2>
                <p class="wow animated bounceInRight">The Key Features of our Job</p>
            </div>
            <?php
            $args = array(
                'post_type' => 'blueone_services',
                'post_status' => 'publish',
                'posts_per_page' => 4
            );
            $count_serv = 0;
            $data_wow_delay = 0.3;
            $loop_services = new WP_Query( $args );
            while ( $loop_services->have_posts() ) : $loop_services->the_post();
                $count_serv++;
                if($count_serv == 1) : ?>
                    <div class="col-md-3 col-sm-6 col-xs-12 text-center wow animated zoomIn">
                <?php else : ?>
                    <div class="col-md-3 col-sm-6 col-xs-12 text-center wow animated zoomIn" data-wow-delay="<?php echo $data_wow_delay; ?>s">
                <?php
                $data_wow_delay += 0.3;
                endif; ?>
                    <div class="service-item">
                        <div class="service-icon">
                            <i class="fa <?php the_field('services_post_icon'); ?> fa-3x"></i>

                        </div>
                        <h3><?php the_title(); ?></h3>
                        <?php the_content(); ?>
                    </div>
                </div>
                <?php
            endwhile;
            ?>

        </div>
    </div>
</section>
<!-- end Service section -->