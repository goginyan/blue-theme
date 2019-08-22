<!-- portfolio section -->
<section id="portfolio">
    <div class="container">
        <div class="row">

            <div class="sec-title text-center wow animated fadeInDown">
                <h2>FEATURED PROJECTS</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>


            <ul class="project-wrapper wow animated fadeInUp">
                <?php
                $args = array(
                    'post_type' => 'blueone_projects',
                    'post_status' => 'publish',
                    'posts_per_page' => 6
                );
                $loop_projets = new WP_Query( $args );
                while ( $loop_projets->have_posts() ) : $loop_projets->the_post();
                    $thumb_alt = get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true );
                    $thumb_title = get_the_title( get_post_thumbnail_id());
                    ?>
                    <li class="portfolio-item">
                        <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="img-responsive" alt="<?php echo $thumb_alt; ?>">
                        <figcaption class="mask">
                            <h3><?php the_title(); ?></h3>
                            <?php the_content(); ?>
                        </figcaption>
                        <ul class="external">
                            <li>
                                <a class="fancybox" title="<?php echo $thumb_title; ?>" data-fancybox-group="works" href="<?php echo get_the_post_thumbnail_url(); ?>">
                                    <i class="fa fa-search"></i>
                                </a>
                            </li>
                            <li>
                                <a href=""><i class="fa fa-link"></i></a>
                            </li>
                        </ul>
                    </li>
                    <?php
                endwhile;
                ?>
            </ul>

        </div>
    </div>
</section>
<!-- end portfolio section -->