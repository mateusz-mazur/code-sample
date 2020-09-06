<?php
/**
 * AJAX More Projects.
 *
 * @package Sense
 * @author  webstroke.pl
 * @link    https://www.webstroke.pl
 */

namespace sense;

/**
 * AJAX More Projects.
 */
class Ajax_More_Projects {

    /**
     * Constructor.
     */
    public function __construct() {

        $this->init_hooks();

    }

    /**
     * Init.
     */
    public function init_hooks() {

        add_action('wp_ajax_get_more_projects', [ $this, 'get_more_projects' ] );
        add_action('wp_ajax_nopriv_get_more_projects', [ $this, 'get_more_projects' ] );

    }

    public function returnTeasers($id = '') {
        ob_start();
        new Teaser_Project( $id );

        return ob_get_clean();
    }

    public function get_more_projects(){
        $more_projects = $_POST['moreProjects'];
        $more_projects_arr = explode(',', $more_projects);
        $projects = '';

        foreach ($more_projects_arr as $project) {
            $id = (int)$project;

            $projects .= '<article class="l-cols__col block-projects__item" data-aos="zoom-in" data-aos-once="true">' . $this->returnTeasers( $id ) . '</article>';
        }

        $api_response_body['more_projects'] = $projects;

        wp_send_json_success([ $api_response_body, $_REQUEST ]);
    }
}
new Ajax_More_Projects();
