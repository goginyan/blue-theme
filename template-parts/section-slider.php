<!--
        Home Slider
 ==================================== -->

<section id="home-slider">
    <div id="slider" class="sl-slider-wrapper">

        <div class="sl-slider">
            <?php
            $args = array(
                'post_type' => 'blueone_slides',
                'post_status' => 'publish',
                'posts_per_page' => 3
            );
            $data_orientation = "horizontal";
            $data_slice1orientation = "-25";
            $data_slice2orientation = "-25";
            $data_slice1_scale = "2";
            $data_slice2_scale = "2";
            $count = 0;
            $loop = new WP_Query( $args );
            while ( $loop->have_posts() ) : $loop->the_post();
                $count++;
                if($count == 2){
                    $data_orientation = "vertical";
                    $data_slice1orientation = "10";
                    $data_slice2orientation = "-15";
                    $data_slice1_scale = "1.5";
                    $data_slice2_scale = "1.5";
                }
                if($count == 3){
                    $data_orientation = "horizontal";
                    $data_slice1orientation = "3";
                    $data_slice2orientation = "3";
                    $data_slice1_scale = "2";
                    $data_slice2_scale = "1";
                }
                ?>
                <div class="sl-slide" data-orientation="<?php echo $data_orientation ?>" data-slice1-rotation="<?php echo $data_slice1orientation ?>"
                     data-slice2-rotation="<?php echo $data_slice2orientation ?>" data-slice1-scale="<?php echo $data_slice1_scale ?>"
                     data-slice2-scale="<?php echo $data_slice2_scale ?>">
                    <?php
                    if( has_post_thumbnail() ) : ?>
                        <div class="bg-img bg-img-<?php echo $count ?>" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>')"></div>
                    <?php else : ?>
                        <div class="bg-img bg-img-<?php echo $count ?>"></div>
                    <?php endif; ?>
                    <div class="slide-caption">
                        <div class="caption-content">
                            <?php if($count == 1) : ?>
                                <h2 class="animated fadeInDown"><?php the_title(); ?></h2>
                                <?php the_content(); ?>
                            <?php else : ?>
                                <h2><?php the_title(); ?></h2>
                                <?php the_content(); ?>
                            <?php endif; ?>
                            <a href="<?php the_field('home_slider_btn_link'); ?>" class="btn btn-blue btn-effect"><?php the_field('home_slider_btn_txt'); ?></a>
                        </div>
                    </div>

                </div>
                <?php
            endwhile;
            ?>
        </div><!-- /sl-slider -->

        <!--
        <nav id="nav-arrows" class="nav-arrows">
            <span class="nav-arrow-prev">Previous</span>
            <span class="nav-arrow-next">Next</span>
        </nav>
        -->

        <nav id="nav-arrows" class="nav-arrows hidden-xs hidden-sm visible-md visible-lg">
            <a href="javascript:;" class="sl-prev">
                <i class="fa fa-angle-left fa-3x"></i>
            </a>
            <a href="javascript:;" class="sl-next">
                <i class="fa fa-angle-right fa-3x"></i>
            </a>
        </nav>

        <nav id="nav-dots" class="nav-dots visible-xs visible-sm hidden-md hidden-lg">
            <span class="nav-dot-current"></span>
            <span></span>
            <span></span>
        </nav>

    </div><!-- /slider-wrapper -->
</section>

<!--
End Home SliderEnd
==================================== -->