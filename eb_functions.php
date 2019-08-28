<?php

if( function_exists( 'acf_add_local_field_group' ) ):
        acf_add_local_field_group(
            array( 
                'key' => 'group_1',
                'title' => 'Global Teacher Video Information',
                'fields' => array(
                    array(
                        'key' => 'field_1',
                        'label' => 'Video Link',
                        'name' => 'video_link',
                        'type' => 'text',
                        'instructions' => 'Enter the Link to the YouTube Video',
                        'required' => 1,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => ','
                        ),
                        'default_value' => '',
                        'placeholder' => 'https://youtube.com/watch?v=',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                        'readonly' => 0,
                        'disabled' => 0,
                    ),
		    array(
                        'key' => 'field_2',
                        'label' => 'Video Author',
                        'name' => 'video_author',
                        'type' => 'text',
                        'instructions' => 'Enter the Name of the Author of the Video',
                        'required' => 1,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => ','
                        ),
                        'default_value' => '',
                        'placeholder' => 'Author',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                        'readonly' => 0,
                        'disabled' => 0,
                    ),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'yt_videos',
				),
			),
		),
    )
);
endif;

function eb_register_yt_post_type() {
	register_post_type(
		'yt_videos',
		array(
			'labels' => array(
				'name' => __('Global Teacher Videos', 'cmrubinworld'),
				'singular_name' => __('Global Teacher Video', 'cmrubinworld'),
				'add_new' => __('Add New', 'cmrubinworld'),
				'add_new_item' => __('Add New Global Teacher Video', 'cmrubinworld'),
				'edit_item'             => __( 'Edit Global Teacher Video', 'cmrubinworld' ),
                		'new_item'              => __( 'New Global Teacher Video', 'cmrubinworld' ),
                		'all_items'             => __( 'All Global Teacher Videos', 'cmrubinworld' ),
                		'view_item'             => __( 'View Global Teacher Video', 'cmrubinworld' ),
                		'search_items'          => __( 'Search Global Teacher Videos', 'cmrubinworld' ),
                		'not_found'             => __( 'No Global Teacher Videos Found', 'cmrubinworld' ),
                		'not_found_in_trash'    => __( 'No Global Teacher Videos Found in Trash', 'cmrubinworld' ),
                		'menu_name'             => __( 'Global Teacher Videos', 'cmrubinworld' ),
                		'set_featured_image'    => __( 'Add Image', 'cmrubinworld' ),
                		'featured_image'        => __( 'Featured Image', 'cmrubinworld' ),
                		'remove_featured_image' => __( 'Remove Featured Image', 'cmrubinworld' ),
                		'use_featured_image'    => __( 'Use Featured Image', 'cmrubinworld' ),
            		),
            		'menu_icon'           => 'dashicons-video-alt3',
            		'query_var'           => true,
            		'publicly_queryable'  => true,
            		'exclude_from_search' => true,
            		'hierarchical'        => false,
            		'show_in_menu'        => true,
            		'public'              => true,
            		'show_in_rest'        => true,
            		'rest_base'           => 'yt-videos',
            		'show_ui'             => true,
            		'rewrite'             => false,
            		'has_archive'         => false,
            		'map_meta_cap'        => true,
            		'supports'            => array( 'title', 'thumbnail' ),
		)
	);
}

wp_enqueue_style( 'eb-yt-videos', get_template_directory_uri() . '/css/eb_yt_videos.css' );

add_action('init', 'eb_register_yt_post_type' );