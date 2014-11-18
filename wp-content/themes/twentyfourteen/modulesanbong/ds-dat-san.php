<?php
/**
 * Tạo posttype Quản lý danh sách lịch đặt sân
 *
 * @author Nguyễn Đình Hiếu - ndhieu8x@gmail.com
 *
 * */
function ndh_lichdat_post_type() {

    // Post Type Labels
    $labels = array(
        'name' => _x('Quản lý Lịch đặt', 'post type general name', ''),
        'singular_name' => _x('Lịch đặt', 'post type singular name', ''),
        'menu_name' => _x('Module Đặt Sân - Quản lý Lịch đặt', 'admin menu', ''),
        'name_admin_bar' => _x('Quản Lý Lịch đặt', 'add new on admin bar', ''),
        'add_new' => _x('Tạo Mới Lịch đặt', 'sanbong', ''),
        'add_new_item' => __('Tạo Mới Lịch đặt', ''),
        'new_item' => __('Tạo Mới', ''),
        'edit_item' => __('Sửa', ''),
        'view_item' => __('Xem', ''),
        'all_items' => __('Tất Cả Lịch đặt', ''),
        'search_items' => __('Tìm', ''),
        'parent_item_colon' => __('Parent:', ''),
        'not_found' => __('Không có dữ liệu.', ''),
        'not_found_in_trash' => __('Không có dữ liệu trong Thùng rác.', ''),
    );


    // Remove front from rewrites.
    $rewrites = array('with_front' => true);


    // Main post-type arguments
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'taxonomies' => array(),
        'query_var' => true,
        'rewrite' => $rewrites,
        'capability_type' => 'post',
        'hierarchical' => false,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt')
    );


    // Register post-type with args
    register_post_type('lichdat', $args);
}

// Hook into Init and register post type
add_action('init', 'ndh_lichdat_post_type', 2);

// Thêm Custom field
add_action('add_meta_boxes', 'boot_add_lichdat_customfield_meta');
function boot_add_lichdat_customfield_meta()
{
    add_meta_box('san', 'Thông tin đặt sân', 'show_san_meta', 'lichdat');
}
// Hiện chọn Loại sân trong admin
function show_san_meta()
{
    global $post;
    $options = array();
    $type = 'sanbong';
    $args=array(
        'post_type' => $type,
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'caller_get_posts'=> 1,
        'orderby ' => 'ID',
        'order'    => 'ASC'
    );
    $sanbongQuery = new WP_Query($args);
    $sans = $sanbongQuery->posts;
    if(count($sans)>0):
        foreach($sans as $postsan):
            $options[] = array('value' => $postsan->ID, 'text' => $postsan->post_title);
        endforeach;
    endif;
    $sanV = get_post_meta($post->ID, 'san', true);
    echo '<table style="width: 80%;">';
    echo '<tr>';
    // Offer precent
    echo '<td style="width:20%;"><label for="san">';
    _e('Sân: ', 'myplugin_textdomain');
    echo '</label></td>';
    echo '<td>';
    echo '<select name="san" id="san">';
    foreach ($options as $option) {
        if($option['value']==$sanV){
            echo '<option selected value="' . $option['value'] . '">' . $option['text'] . '</option>';
        }else{
            echo '<option value="' . $option['value'] . '">' . $option['text'] . '</option>';
        }
    }
    echo '</select>';
    echo '</td>';
    echo '</tr>';
    echo '</table>';

}
// Lưu loại sân khi save
add_action('save_post', 'boot_save_san_meta');
function boot_save_san_meta($post_id)
{
    global $post;
    // Prevent saving Post Meta on Autosaves.
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post->ID;
    }
    // Update Each Post Meta Key
    if($post){
        update_post_meta($post->ID, 'san', $_POST["san"]);
    }
}