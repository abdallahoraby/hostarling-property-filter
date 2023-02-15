<?php

    /*
    Template Name: Full-width page layout
    Template Post Type: post, page, product
    */

?>

<?php get_header(); ?>
<?php
	global $post;
    $post_id = get_the_ID();
?>

<div class="view">

    <div id="main">

        <div class="banner-liquid inner-banner2">

            <div class="inner-banner cover" style="background: url(<?php echo esc_url( get_post_meta($post_id, 'banner_banner-image', true) ); ?>)">
                <div class="container">
                    <h1> <?php echo get_the_title( $post_id );?> </h1>
                </div>
                <span class="banner-overlay"></span>
            </div></div>
        <div class="container">
            <ul class="breadcrumb hidden">
                <li class="even"><a href="<?php echo home_url() ;?>">Home</a></li>
                <li class="even">
                    <a href="<?php echo home_url() . '/projects';?>">Projects</a>
                </li><li class="odd"><span> <?php echo get_the_title( $post_id );?> </span></li></ul>            </div>
        <div class="portfolio-item-panel inner-panel cf">
            <div class="container">
                <div class="portfolio-item-page">
                    <!--<div class="portfolio-nav">
                        <a class="next" href="dxb-terminal-1.html">Next project <i class="_icon icon-arrow-nex"></i></a>
                    </div>-->
					
					<div class="row">
						<div class="col-md-12">
							<div class="portfolio-item-title">
                                <div>

                                    <?php echo $post->post_content; ?>

                                </div>
                            </div>
							
							<div class="row">
								<div class="col-md-8">
									<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">

                                    <?php
                                        $images_meta =  get_post_meta($post_id, 'project_gallery', true);
									

                                        $images = explode(",", $images_meta);

                                        if( !empty($images) ):

                                        foreach ($images as $image):

                                    ?>

                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="<?php echo esc_url( wp_get_attachment_url( $image ) );?>" alt="First slide">
                                    </div>


                                    <?php
                                        endforeach;

                                        endif;
                                    ?>

                                </div>
								<?php if( count($images) > 1 ): ?>		
                                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
										
								<?php endif; ?>
                            </div>
								</div>
								
								<div class="col-md-4">
									<div class="sector-box redish">
                                <?php
                                    $post_terms = wp_get_object_terms( $post->ID, 'projects_sectors' );
                                ?>
                                <h4>Sector</h4>
                                <h3> <?php echo $post_terms[0]->name; ?>  </h3>
                            </div>

                            <div class="key-box">
                                <h3>
                                    Key facts
                                </h3>
                                <ul>

                                    <li id="" class="odd">
                                        <strong>
                                            Developer:
                                        </strong>
                                        <?php echo get_post_meta( $post_id, 'developer', true );?>                                        </li>
                                    <li id="" class="even">
                                        <strong>
                                            Consultant:
                                        </strong>
                                        <?php echo get_post_meta( $post_id, 'consultant', true );?>                                        </li>
                                    <li id="" class="odd">
                                        <strong>
                                            Location:
                                        </strong>
                                        <?php echo get_post_meta( $post_id, 'location', true );?>                                        </li>

                                    <li id="" class="even hidden">
                                        <strong>
                                            Contract Value:
                                        </strong>
                                        <?php echo get_post_meta( $post_id, 'contract_value', true );?>                                        </li>

                                    <li id="" class="odd">
                                        <strong>
                                            BUA:
                                        </strong>
                                        <?php echo get_post_meta( $post_id, 'bua', true );?>                                        </li>

                                    <li id="" class="even hidden">
                                        <strong>
                                            Status:
                                        </strong>
                                        <?php echo get_post_meta( $post_id, 'project_status', true );?>                                        </li>

                                </ul>
                            </div>
								</div>
							</div>
							
                            

                            



                        </div>
                        
                    </div>
                </div>
            </div>


        </div>

    </div>



</div>

<?php get_footer(); ?>
