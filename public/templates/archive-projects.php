<?php get_header(); ?>

<div id="main">

    <input type="hidden" value="<?php echo home_url();?>" id="home_url" >

    <div class="banner-liquid">
        <div class="inner-banner cover" style="background-image: url(<?php echo get_option('pro_filter')['banner_image_url']; ?>)">
            <div class="container">
                <h1> <?php echo get_option('pro_filter')['projects_title'] ?> </h1>
            </div>
            <span class="banner-overlay"></span>
        </div>
    </div>
    <div class="container">

        <p class="projects_desc">
            <?php echo get_option('pro_filter')['projects_archive_desc'] ?>
        </p>

        <ul class="breadcrumb hidden">
            <li><a href="<?php echo home_url(); ?>">Home</a></li>
            <li>
                <a href="#">Projects</a>
            </li>
        </ul>
    </div>
    <div class="inner-panel cf">
        <div class="container">
            <div class="prt-cnt">

            </div>
        </div>
    </div>
    <div id="widget">

        <div class="inner-panel cf">
            <div class="what-we-do-inner portfolio-page">
                <div class="container">

                    <div class="top-row cf">
                        <div class="Sectors cf"><span class="label">Sector</span>
                            <div class="checkbox-panel" id="txtSector">

                                <?php
                                    if( empty($_GET['term']) ){
                                        $all_active = 'active_sector';
                                    } else {
                                        $all_active = '';
                                    }
                                ?>

                                <div class="o-checkbox get_sector">

                                    <a href="<?php echo home_url() ;?>/projects">
                                        <label for="my-checkbox" class="redish <?php echo $all_active;?>">
                                            All </label>
                                    </a></div>

                                <?php

                                $sectors = get_terms( array(
                                    'taxonomy' => 'projects_sectors',
                                    'hide_empty' => false,
                                ) );

                                $colors = [
                                    'rose',
                                    'orange',
                                    'cyan',
                                    'cyan-drk',
                                    'coffy-drk',
                                    'green',
                                    'dark-orange',
                                    'red',
                                    'dark-b'
                                ];

                                $index = 0;

                                foreach ($sectors as $sector):

                                    if( !empty($_GET['term']) ):

                                        if( (int) $_GET['term'] === (int) $sector->term_id ):
                                            $current_sector = 'active_sector';
                                        else:
                                            $current_sector = '';
                                        endif;

                                    endif;


                                ?>

                                <div class="o-checkbox get_sector" data-sector-id="<?php echo $sector->term_id;?>">

                                    <a href="?term=<?php echo $sector->term_id;?>">
                                        <label for="my-checkbox" class="redish <?php echo $current_sector; ?>">
                                            <?php echo $sector->name;?> </label>
                                    </a></div>

                                <?php
                                        $index++;
                                    endforeach;
                                ?>


                            </div>
                        </div>
                        <div class="filter-box cf">
                            <label>Filter</label>
                            <div class="row">
                                <div class="col-md-3 col-sm-5">


                                    <div class="box">
                                        <select name="select" class="select_developer">
                                            <option value="All">All Developers</option>
                                            <?php
                                                // get all developers
                                                $args = array(
                                                    'post_type' => 'developers',
                                                    'post_status' => array( 'publish' ),
                                                    'posts_per_page' => -1,
                                                    'orderby' => 'date',
                                                    'order' => 'DESC'
                                                );
                                                $developers_query = new WP_Query( $args );

                                                $developers_posts = $developers_query->posts;
                                                foreach ($developers_posts as  $developers_post):
                                                    if( (int) $_GET['developer'] === (int) $developers_post->ID ){
                                                        $selected = 'selected';
                                                    } else {
                                                        $selected = '';
                                                    }
                                            ?>

                                                        <option <?php echo $selected;?> value="<?php echo $developers_post->ID ;?> "><?php echo $developers_post->post_title ;?> </option>

                                            <?php
                                                endforeach;
                                            ?>

                                        </select>
                                    </div>


                                </div>

                                <div class="col-md-3 col-sm-5">


                                    <div class="box">
                                        <select name="select" class="select_location">
                                            <option value="All">All Locations</option>
                                            <?php
                                            // get all developers
                                            $args_locations = array(
                                                'post_type' => 'locations',
                                                'post_status' => array( 'publish' ),
                                                'posts_per_page' => -1,
                                                'orderby' => 'date',
                                                'order' => 'DESC'
                                            );
                                            $locations_query = new WP_Query( $args_locations );

                                            $locations_posts = $locations_query->posts;
                                            foreach ($locations_posts as  $locations_post):
                                                if( (int) $_GET['location'] === (int) $locations_post->ID ){
                                                    $selected = 'selected';
                                                } else {
                                                    $selected = '';
                                                }
                                                ?>

                                                <option <?php echo $selected;?> value="<?php echo $locations_post->ID ;?> "><?php echo $locations_post->post_title ;?> </option>

                                            <?php
                                            endforeach;
                                            ?>

                                        </select>
                                    </div>


                                </div>



                                <div class="col-md-5 col-sm-6"><a class="clear-filter" href="<?php echo home_url() . '/projects';?>"><span class="redish-color">X</span> Clear Selection</a></div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="portfolio-list listing-liquid">
                    <div class="container">
                        <div class="portfolio-filters wow-panel">
                            <div class="list-01">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="prt-cnt">
                                            <p>
                                                <?php
                                                if( isset($_GET['term']) && is_numeric($_GET['term']) ):
                                                      echo get_term_by('id', $_GET['term'], 'projects_sectors')->description;
                                                endif;
                                                ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>


                                <div class="row" id="txtProjects">
                                    <div class="grid">

                                        <?php

                                        $term_id = !empty($_GET['term']) ? $_GET['term'] : '';
                                        if( !empty($term_id) ){
                                            $tax_query =  array(
                                                array(
                                                    'taxonomy' => 'projects_sectors',
                                                    'field' => 'term_id',
                                                    'terms' => $term_id,
                                                )
                                            );
                                        } else {
                                            $tax_query = '';
                                        }

                                        $developer_id = !empty($_GET['developer']) ? $_GET['developer'] : '';

                                        if( !empty($developer_id) ){
                                            $developer = get_the_title($developer_id);
                                            $developer_meta = array(
                                                'key' => 'developer',
                                                'value' => $developer,
                                                'compare' => 'LIKE'
                                            );
                                        } else {
                                            $developer_meta = '';
                                        }


                                        $location_id = !empty($_GET['location']) ? $_GET['location'] : '';

                                        if( !empty($location_id) ){
                                            $location = get_the_title($location_id);
                                            $location_meta = array(
                                                'key' => 'location',
                                                'value' => $location,
                                                'compare' => 'LIKE'
                                            );
                                        } else {
                                            $location_meta = '';
                                        }

                                        $meta_query = array(
                                            'relation' => 'AND', /* <-- here */
                                            $developer_meta,
                                            $location_meta
                                        );


                                        $page = !empty( $_GET['page'] ) ? $_GET['page'] : 1;
                                        $per_page = 9;

                                        $all_projects = get_posts(
                                            array(
                                                'posts_per_page' => -1,
                                                'post_type' => 'projects',
                                                'status' => 'publish',
                                                'orderby' => 'date',
                                                'order' => 'DESC',
                                            )
                                        );

                                            $projects = get_posts(
                                                array(
                                                    'posts_per_page' => $per_page,
                                                    'paged' => $page,
                                                    'post_type' => 'projects',
                                                    'status' => 'publish',
                                                    'orderby' => 'date',
                                                    'order' => 'DESC',
                                                    'tax_query' => $tax_query,
                                                    'meta_query' => $meta_query,
                                                )
                                            );


                                            foreach ($projects as $project):
                                                $project_id = $project->ID;
                                                $project_sector_term = get_the_terms($project_id, 'projects_sectors');
                                                if( !empty($project_sector_term) ){
                                                    $project_sector = $project_sector_term[0]->name;
                                                } else {
                                                    $project_sector = '';
                                                }
                                        ?>

                                        <div class="grid-sizer col-sm-4 grid-item">
                                            <div class="item wow fadeIn" data-wow-delay=".35s"><a
                                                        href="<?php echo get_the_permalink($project_id) ?>">
                                                    <figure class="item-img imgLiquidFill"><img
                                                                src="<?php echo get_the_post_thumbnail_url($project_id);?>"
                                                                alt="Creek Edge"></figure>
                                                    <figcaption>
                                                        <h3>
                                                            <?php echo get_the_title($project_id);?> </h3>
                                                    </figcaption>
                                                    <span class="label redish">
                        <?php echo $project_sector;?>                      </span>
                                                </a></div>
                                        </div>

                                        <?php
                                            endforeach;
                                        ?>

                                    </div>
                                    <div align="center" style="display:none;"><img src="loader.gif"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pagination projects">
                        <ul class="pagination"><span class="disabled">&nbsp;</span>

                    <?php

                        if( !empty($_GET['location']) || !empty($_GET['developer']) ){
                            $projects_count = count( $projects );
                        } else {
                            $projects_count = count( $all_projects );
                        }

                        $pages =  ceil( $projects_count / $per_page );
							
							if( $pages > 1 ):

								for ( $i=1; $i<=$pages; $i++ ):
									if( !empty($page) && (int) $page === (int) $i  ){
										$active = 'selected';
									} else if ( empty($page) ) {
										$first_page = 'selected_first';
									} else {
										$active = '';
										$first_page = '';
									}

                    ?>
                            <li><a class="<?php echo $active . ' ' . $first_page; ?>" href="<?php echo home_url() . '/projects?page=' . $i;?>"> <?php echo $i; ?> </a></li>
                    <?php
                        		endfor;
							endif;
                    ?>


                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="BelowWidget">
        <div class="inner-panel cf">
            <div class="contact-page">
                <div class="container">
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
