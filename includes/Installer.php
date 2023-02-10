<?php

namespace Give_Kindness;

/**
 * Installer class
 */
class Installer {

    /**
     * Run the installer
     *
     * @return void
     */
    public function run() {
        $this->add_version();
    }

    /**
     * Add time and version on DB
     */
    public function add_version() {
        $installed = get_option( 'give_kindness_installed' );

        if ( ! $installed ) {
            update_option( 'give_kindness_installed', time() );
        }

        update_option( 'give_kindness_version', GIVE_KINDNESS_VERSION );
    }


    /**
     * Setup all pages for directia
     *
     * @return void
     */
    public function setup_pages() {
        $meta_key = '_wp_page_template';

        // return if pages were created before
        $page_created = get_option( 'give_kindness_pages_created', false );

        if ( $page_created ) {
            return;
        }

        $pages = [
            [
                'post_title' => __( 'Give Kindness Dashboard', 'give-kindness' ),
                'slug'       => 'give-kindness-dashboard',
                'page_id'    => 'give_kindness_dashboard',
                'content'    => '[give_kindness_dashboard]',
            ]
        ];

        $directia_page_settings = [];

        if ( $pages ) {
            foreach ( $pages as $page ) {
                $page_id = $this->create_page( $page );

                if ( $page_id ) {
                    $directia_page_settings[ $page['page_id'] ] = $page_id;

                    if ( isset( $page['child'] ) && count( $page['child'] ) > 0 ) {
                        foreach ( $page['child'] as $child_page ) {
                            $child_page_id = $this->create_page( $child_page );

                            if ( $child_page_id ) {
                                $directia_page_settings[ $child_page['page_id'] ] = $child_page_id;

                                wp_update_post(
                                    [
										'ID'          => $child_page_id,
										'post_parent' => $page_id,
									]
                                );
                            }
                        }
                    }
                }
            }
        }

        update_option( 'give_kindness_pages', $directia_page_settings );
        update_option( 'give_kindness_pages_created', true );
    }

    /**
     * Create all listing pages
     *
     * @return void
     */
    public function create_page( $page ) {
        $meta_key = '_wp_page_template';
        $page_obj = get_page_by_path( $page['post_title'] );

        if ( ! $page_obj ) {
            $page_id = wp_insert_post(
                [
					'post_title'     => $page['post_title'],
					'post_name'      => $page['slug'],
					'post_content'   => $page['content'],
					'post_status'    => 'publish',
					'post_type'      => 'page',
					'comment_status' => 'closed',
				]
            );

            if ( $page_id && ! is_wp_error( $page_id ) ) {
                if ( isset( $page['template'] ) ) {
                    update_post_meta( $page_id, $meta_key, $page['template'] );
                }

                return $page_id;
            }
        }

        return false;
    }
}
