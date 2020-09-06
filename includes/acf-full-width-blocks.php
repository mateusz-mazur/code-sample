<?php

	add_action( 'acf/init', 'sense_acf_blocks_init' );

	function sense_acf_blocks_init() {

		// Check function exists.
		if( function_exists('acf_register_block_type') ) {

			/*
			 * BLock Offer CTA.
			 * */
			$name      = "Oferta CTA";
			$slug_name = "Offer CTA";
			$slug      = create_slug($slug_name);

			acf_register_block_type(array(
				'name'              => $slug,
				'title'             => __($name),
				'description'       => __('Blok '. $name),
				'render_template'   => 'template-parts/blocks/offer-cta/'.$slug.'.php',
				'enqueue_assets'    => function() {

					/* ~~~~~ Styles ~~~~~ */

					$block_styles_uri = 'dist/block_offer_cta.css';
					$block_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . '../' . $block_styles_uri));

					wp_enqueue_style('offer-cta-block-styles', get_stylesheet_directory_uri() . '/' . $block_styles_uri, false, $block_styles_ver);

				},
				'icon'              => 'editor-justify',
				'mode'              => 'edit',
				'supports'          => array( 'align' => false ),
				'category'          => 'sense-blocks',
				'keywords'          => array('oferta', 'cta'),
			));

            /*
             * BLock description.
             * */
            $name      = "Opis";
            $slug_name = "Description";
            $slug      = create_slug($slug_name);

            acf_register_block_type(array(
                'name'              => $slug,
                'title'             => __($name),
                'description'       => __('Blok '. $name),
                'render_template'   => 'template-parts/blocks/description/'.$slug.'.php',
                'enqueue_assets'    => function() {

                    /* ~~~~~ Styles ~~~~~ */

                    $block_styles_uri = 'dist/block_description.css';
                    $block_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . '../' . $block_styles_uri));

                    wp_enqueue_style('description-block-styles', get_stylesheet_directory_uri() . '/' . $block_styles_uri, false, $block_styles_ver);

                    /* ~~~~~ Scripts ~~~~~ */

                    $block_scripts_uri = 'dist/block_description.bundle.js';
                    $block_scripts_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__).'../'. $block_scripts_uri));

                    wp_enqueue_script('description-block-scripts', get_stylesheet_directory_uri() . '/'. $block_scripts_uri, array('jquery'), $block_scripts_ver, true);

                },
                'icon'              => 'editor-justify',
                'mode'              => 'edit',
                'supports'          => array( 'align' => false ),
                'category'          => 'sense-blocks',
                'keywords'          => array('opis', 'description', 'zdjęcie', 'tekst'),
            ));

            /*
             * BLock Benefits.
             * */
            $name      = "Kafelki z korzyściami";
            $slug_name = "Benefits";
            $slug      = create_slug($slug_name);

            acf_register_block_type(array(
                'name'              => $slug,
                'title'             => __($name),
                'description'       => __('Blok '. $name),
                'render_template'   => 'template-parts/blocks/benefits/'.$slug.'.php',
                'enqueue_assets'    => function() {

                    /* ~~~~~ Styles ~~~~~ */

                    $block_styles_uri = 'dist/block_benefits.css';
                    $block_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . '../' . $block_styles_uri));

                    wp_enqueue_style('benefits-block-styles', get_stylesheet_directory_uri() . '/' . $block_styles_uri, false, $block_styles_ver);

                    /* ~~~~~ Scripts ~~~~~ */

                    $block_scripts_uri = 'dist/block_benefits.bundle.js';
                    $block_scripts_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__).'../'. $block_scripts_uri));

                    wp_enqueue_script('benefits-block-scripts', get_stylesheet_directory_uri() . '/'. $block_scripts_uri, array('jquery'), $block_scripts_ver, true);

                },
                'icon'              => 'editor-justify',
                'mode'              => 'edit',
                'supports'          => array( 'align' => false ),
                'category'          => 'sense-blocks',
                'keywords'          => array('benefity', 'najważniejsze', 'korzyści', 'cechy'),
            ));

            /*
             * BLock Contact Maps.
             * */
            $name      = "Mapy z kontaktami";
            $slug_name = "Contact Maps";
            $slug      = create_slug($slug_name);

            acf_register_block_type(array(
                'name'              => $slug,
                'title'             => __($name),
                'description'       => __('Blok '. $name),
                'render_template'   => 'template-parts/blocks/contact-maps/'.$slug.'.php',
                'enqueue_assets'    => function() {

                    /* ~~~~~ Styles ~~~~~ */

                    $block_styles_uri = 'dist/block_contact_maps.css';
                    $block_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . '../' . $block_styles_uri));

                    wp_enqueue_style('contact-maps-block-styles', get_stylesheet_directory_uri() . '/' . $block_styles_uri, false, $block_styles_ver);

                    /* ~~~~~ Scripts ~~~~~ */

                    $block_scripts_uri = 'dist/block_contact_maps.bundle.js';
                    $block_scripts_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__).'../'. $block_scripts_uri));

                    wp_enqueue_script('contact-maps-block-scripts', get_stylesheet_directory_uri() . '/'. $block_scripts_uri, array('jquery'), $block_scripts_ver, true);

                },
                'icon'              => 'editor-justify',
                'mode'              => 'edit',
                'supports'          => array( 'align' => false ),
                'category'          => 'sense-blocks',
                'keywords'          => array('mapa', 'kontakt'),
            ));

            /*
             * BLock Offer.
             * */
            $name      = "Nasza oferta";
            $slug_name = "Offer";
            $slug      = create_slug($slug_name);

            acf_register_block_type(array(
                'name'              => $slug,
                'title'             => __($name),
                'description'       => __('Blok '. $name),
                'render_template'   => 'template-parts/blocks/offer/'.$slug.'.php',
                'enqueue_assets'    => function() {

                    /* ~~~~~ Styles ~~~~~ */

                    $block_styles_uri = 'dist/block_offer.css';
                    $block_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . '../' . $block_styles_uri));

                    wp_enqueue_style('offer-block-styles', get_stylesheet_directory_uri() . '/' . $block_styles_uri, false, $block_styles_ver);

                    /* ~~~~~ Scripts ~~~~~ */

//                    $block_scripts_uri = 'dist/js/block_offer.bundle.js';
//                    $block_scripts_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__).'../'. $block_scripts_uri));
//
//                    wp_enqueue_script('offer-block-scripts', get_stylesheet_directory_uri() . '/'. $block_scripts_uri, array('jquery'), $block_scripts_ver, true);

                },
                'icon'              => 'admin-page',
                'mode'              => 'edit',
                'supports'          => array( 'align' => false ),
                'category'          => 'sense-blocks',
                'keywords'          => array('nasza', 'oferta', 'offer'),
            ));

            /*
             * BLock About Us.
             * */
            $name      = "O nas";
            $slug_name = "About Us";
            $slug      = create_slug($slug_name);

            acf_register_block_type(array(
                'name'              => $slug,
                'title'             => __($name),
                'description'       => __('Blok '. $name),
                'render_template'   => 'template-parts/blocks/about-us/'.$slug.'.php',
                'enqueue_assets'    => function() {

                    /* ~~~~~ Styles ~~~~~ */

                    $block_styles_uri = 'dist/block_about_us.css';
                    $block_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . '../' . $block_styles_uri));

                    wp_enqueue_style('about-us-block-styles', get_stylesheet_directory_uri() . '/' . $block_styles_uri, false, $block_styles_ver);

                },
                'icon'              => 'admin-page',
                'mode'              => 'edit',
                'supports'          => array( 'align' => false ),
                'category'          => 'sense-blocks',
                'keywords'          => array('o', 'nas', 'about', 'us'),
            ));


            /*
             * BLock Blog.
             * */
            $name      = "Blog";
            $slug_name = "Blog";
            $slug      = create_slug($slug_name);

            acf_register_block_type(array(
                'name'              => $slug,
                'title'             => __($name),
                'description'       => __('Blok '. $name),
                'render_template'   => 'template-parts/blocks/blog/'.$slug.'.php',
                'enqueue_assets'    => function() {

                    /* ~~~~~ Styles ~~~~~ */

                    $block_styles_uri = 'dist/block_blog.css';
                    $block_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . '../' . $block_styles_uri));

                    wp_enqueue_style('blog-block-styles', get_stylesheet_directory_uri() . '/' . $block_styles_uri, false, $block_styles_ver);

                },
                'icon'              => 'welcome-write-blog',
                'mode'              => 'edit',
                'supports'          => array( 'align' => false ),
                'category'          => 'sense-blocks',
                'keywords'          => array('blog', 'aktualności', 'news'),
            ));


            /*
             * Block Contact For More.
             * */
            $name      = "Skontaktuj się po więcej";
            $slug_name = "Contact For More";
            $slug      = create_slug($slug_name);

            acf_register_block_type(array(
                'name'              => $slug,
                'title'             => __($name),
                'description'       => __('Blok '. $name),
                'render_template'   => 'template-parts/blocks/contact-for-more/'.$slug.'.php',
                'enqueue_assets'    => function() {

                    /* ~~~~~ Styles ~~~~~ */

                    $block_styles_uri = 'dist/block_contact_for_more.css';
                    $block_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . '../' . $block_styles_uri));

                    wp_enqueue_style('contact-for-more-block-styles', get_stylesheet_directory_uri() . '/' . $block_styles_uri, false, $block_styles_ver);

                },
                'icon'              => 'email-alt',
                'mode'              => 'edit',
                'supports'          => array( 'align' => false ),
                'category'          => 'sense-blocks',
                'keywords'          => array('więcej', 'kontakt', 'contact', 'more'),
            ));


            /*
             * Block Projects.
             * */
            $name      = "Realizacje";
            $slug_name = "Projects";
            $slug      = create_slug($slug_name);

            acf_register_block_type(array(
                'name'              => $slug,
                'title'             => __($name),
                'description'       => __('Blok '. $name),
                'render_template'   => 'template-parts/blocks/projects/'.$slug.'.php',
                'enqueue_assets'    => function() {

                    /* ~~~~~ Styles ~~~~~ */

                    $block_styles_uri = 'dist/block_projects.css';
                    $block_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . '../' . $block_styles_uri));

                    wp_enqueue_style('projects-block-styles', get_stylesheet_directory_uri() . '/' . $block_styles_uri, false, $block_styles_ver);

                    /* ~~~~~ Scripts ~~~~~ */

                    $block_scripts_uri = 'dist/block_projects.bundle.js';
                    $block_scripts_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__).'../'. $block_scripts_uri));

                    wp_enqueue_script('projects-block-scripts', get_stylesheet_directory_uri() . '/'. $block_scripts_uri, array('jquery'), $block_scripts_ver, true);

                },
                'icon'              => 'admin-page',
                'mode'              => 'edit',
                'supports'          => array( 'align' => false ),
                'category'          => 'sense-blocks',
                'keywords'          => array('projekty', 'realizacje'),
            ));


            /*
             * BLock Video.
             * */
            $name      = "Video";
            $slug_name = "Video";
            $slug      = create_slug($slug_name);

            acf_register_block_type(array(
                'name'              => $slug,
                'title'             => __($name),
                'description'       => __('Blok '. $name),
                'render_template'   => 'template-parts/blocks/video/'.$slug.'.php',
                'enqueue_assets'    => function() {

                    /* ~~~~~ Styles ~~~~~ */

                    $block_styles_uri = 'dist/block_video.css';
                    $block_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . '../' . $block_styles_uri));

                    wp_enqueue_style('video-block-styles', get_stylesheet_directory_uri() . '/' . $block_styles_uri, false, $block_styles_ver);

                    /* ~~~~~ Scripts ~~~~~ */

                    $block_scripts_uri = 'dist/block_video.bundle.js';
                    $block_scripts_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__).'../'. $block_scripts_uri));

                    wp_enqueue_script('video-block-scripts', get_stylesheet_directory_uri() . '/'. $block_scripts_uri, array('jquery'), $block_scripts_ver, true);

                },
                'icon'              => 'format-video',
                'mode'              => 'edit',
                'supports'          => array( 'align' => false ),
                'category'          => 'sense-blocks',
                'keywords'          => array('video', 'wideo', 'filmy', 'youtube'),
            ));


            /*
             * Block Page Submenu.
             * */
            $name      = "Submenu";
            $slug_name = "Page Submenu";
            $slug      = create_slug($slug_name);

            acf_register_block_type(array(
                'name'              => $slug,
                'title'             => __($name),
                'description'       => __('Blok '. $name),
                'render_template'   => 'template-parts/blocks/page-submenu/'.$slug.'.php',
                'enqueue_assets'    => function() {

                    /* ~~~~~ Styles ~~~~~ */

                    $block_styles_uri = 'dist/block_page_submenu.css';
                    $block_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . '../' . $block_styles_uri));

                    wp_enqueue_style('page-submenu-block-styles', get_stylesheet_directory_uri() . '/' . $block_styles_uri, false, $block_styles_ver);

                },
                'icon'              => 'menu',
                'mode'              => 'edit',
                'supports'          => array( 'align' => false ),
                'category'          => 'sense-blocks',
                'keywords'          => array('page', 'submenu', 'podmenu', 'kategorie'),
            ));


            /*
             * Block Logos.
             * */
            $name      = "Logotypy";
            $slug_name = "Logos";
            $slug      = create_slug($slug_name);

            acf_register_block_type(array(
                'name'              => $slug,
                'title'             => __($name),
                'description'       => __('Blok '. $name),
                'render_template'   => 'template-parts/blocks/logos/'.$slug.'.php',
                'enqueue_assets'    => function() {

                    /* ~~~~~ Styles ~~~~~ */

                    $block_styles_uri = 'dist/block_logos.css';
                    $block_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . '../' . $block_styles_uri));

                    wp_enqueue_style('logos-block-styles', get_stylesheet_directory_uri() . '/' . $block_styles_uri, false, $block_styles_ver);

                    /* ~~~~~ Scripts ~~~~~ */

                    $block_scripts_uri = 'dist/block_logos.bundle.js';
                    $block_scripts_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__).'../'. $block_scripts_uri));

                    wp_enqueue_script('logos-block-scripts', get_stylesheet_directory_uri() . '/'. $block_scripts_uri, array('jquery'), $block_scripts_ver, true);

                },
                'icon'              => 'format-gallery',
                'mode'              => 'edit',
                'supports'          => array( 'align' => false ),
                'category'          => 'sense-blocks',
                'keywords'          => array('logo'),
            ));


            /*
             * Block Projects Categories.
             * */
            $name      = "Kategorie projektów, zastosowania";
            $slug_name = "Projects Categories";
            $slug      = create_slug($slug_name);

            acf_register_block_type(array(
                'name'              => $slug,
                'title'             => __($name),
                'description'       => __('Blok '. $name),
                'render_template'   => 'template-parts/blocks/projects-categories/'.$slug.'.php',
                'enqueue_assets'    => function() {

                    /* ~~~~~ Styles ~~~~~ */

                    $block_styles_uri = 'dist/block_projects_categories.css';
                    $block_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . '../' . $block_styles_uri));

                    wp_enqueue_style('projects-categories-block-styles', get_stylesheet_directory_uri() . '/' . $block_styles_uri, false, $block_styles_ver);

                    /* ~~~~~ Scripts ~~~~~ */

                    $block_scripts_uri = 'dist/block_projects_categories.bundle.js';
                    $block_scripts_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__).'../'. $block_scripts_uri));

                    wp_enqueue_script('projects-categories-block-scripts', get_stylesheet_directory_uri() . '/'. $block_scripts_uri, array('jquery'), $block_scripts_ver, true);

                },
                'icon'              => 'format-gallery',
                'mode'              => 'edit',
                'supports'          => array( 'align' => false ),
                'category'          => 'sense-blocks',
                'keywords'          => array('kategorie', 'projekty', 'realizacje', 'zastosowania'),
            ));


            /*
             * Block Board.
             * */
            $name      = "Zarząd";
            $slug_name = "Board";
            $slug      = create_slug($slug_name);

            acf_register_block_type(array(
                'name'              => $slug,
                'title'             => __($name),
                'description'       => __('Blok '. $name),
                'render_template'   => 'template-parts/blocks/board/'.$slug.'.php',
                'enqueue_assets'    => function() {

                    /* ~~~~~ Styles ~~~~~ */

                    $block_styles_uri = 'dist/block_board.css';
                    $block_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . '../' . $block_styles_uri));

                    wp_enqueue_style('board-block-styles', get_stylesheet_directory_uri() . '/' . $block_styles_uri, false, $block_styles_ver);

                    /* ~~~~~ Scripts ~~~~~ */

                    $block_scripts_uri = 'dist/block_board.bundle.js';
                    $block_scripts_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__).'../'. $block_scripts_uri));

                    wp_enqueue_script('board-block-scripts', get_stylesheet_directory_uri() . '/'. $block_scripts_uri, array('jquery'), $block_scripts_ver, true);

                },
                'icon'              => 'admin-users',
                'mode'              => 'edit',
                'supports'          => array( 'align' => false ),
                'category'          => 'sense-blocks',
                'keywords'          => array('zarząd', 'board'),
            ));


            /*
             * Block Testimonials.
             * */
            $name      = "Referencje z logotypami";
            $slug_name = "Testimonials";
            $slug      = create_slug($slug_name);

            acf_register_block_type(array(
                'name'              => $slug,
                'title'             => __($name),
                'description'       => __('Blok '. $name),
                'render_template'   => 'template-parts/blocks/testimonials/'.$slug.'.php',
                'enqueue_assets'    => function() {

                    /* ~~~~~ Styles ~~~~~ */

                    $block_styles_uri = 'dist/block_testimonials.css';
                    $block_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . '../' . $block_styles_uri));

                    wp_enqueue_style('testimonials-block-styles', get_stylesheet_directory_uri() . '/' . $block_styles_uri, false, $block_styles_ver);

                    /* ~~~~~ Scripts ~~~~~ */

                    $block_scripts_uri = 'dist/block_testimonials.bundle.js';
                    $block_scripts_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__).'../'. $block_scripts_uri));

                    wp_enqueue_script('testimonials-block-scripts', get_stylesheet_directory_uri() . '/'. $block_scripts_uri, array('jquery'), $block_scripts_ver, true);

                },
                'icon'              => 'admin-comments',
                'mode'              => 'edit',
                'supports'          => array( 'align' => false ),
                'category'          => 'sense-blocks',
                'keywords'          => array('referencje', 'opinie', 'logo'),
            ));


            /*
             * Block Team.
             * */
            $name      = "Zespół";
            $slug_name = "Team";
            $slug      = create_slug($slug_name);

            acf_register_block_type(array(
                'name'              => $slug,
                'title'             => __($name),
                'description'       => __('Blok '. $name),
                'render_template'   => 'template-parts/blocks/team/'.$slug.'.php',
                'enqueue_assets'    => function() {

                    /* ~~~~~ Styles ~~~~~ */

                    $block_styles_uri = 'dist/block_team.css';
                    $block_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . '../' . $block_styles_uri));

                    wp_enqueue_style('team-block-styles', get_stylesheet_directory_uri() . '/' . $block_styles_uri, false, $block_styles_ver);

                },
                'icon'              => 'admin-users',
                'mode'              => 'edit',
                'supports'          => array( 'align' => false ),
                'category'          => 'sense-blocks',
                'keywords'          => array('zespół', 'personel'),
            ));


            /*
             * Block History.
             * */
            $name      = "Kalendarium";
            $slug_name = "History";
            $slug      = create_slug($slug_name);

            acf_register_block_type(array(
                'name'              => $slug,
                'title'             => __($name),
                'description'       => __('Blok '. $name),
                'render_template'   => 'template-parts/blocks/history/'.$slug.'.php',
                'enqueue_assets'    => function() {

                    /* ~~~~~ Styles ~~~~~ */

                    $block_styles_uri = 'dist/block_history.css';
                    $block_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . '../' . $block_styles_uri));

                    wp_enqueue_style('history-block-styles', get_stylesheet_directory_uri() . '/' . $block_styles_uri, false, $block_styles_ver);

                    /* ~~~~~ Scripts ~~~~~ */

                    /*                    $block_scripts_uri = 'dist/js/block_board.bundle.js';
                                        $block_scripts_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__).'../'. $block_scripts_uri));

                                        wp_enqueue_script('board-block-scripts', get_stylesheet_directory_uri() . '/'. $block_scripts_uri, array('jquery'), $block_scripts_ver, true);*/

                },
                'icon'              => 'calendar',
                'mode'              => 'edit',
                'supports'          => array( 'align' => false ),
                'category'          => 'sense-blocks',
                'keywords'          => array('kalendarium', 'historia'),
            ));

		}
	}
