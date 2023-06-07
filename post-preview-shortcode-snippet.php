function post_preview_shortcode($atts) {
    $post_id = $atts['id'];
    $post = get_post($post_id);
    $title = $post->post_title;
    $content = $post->post_content;
    $content = get_extended($post->post_content)['main'];
    $image = get_the_post_thumbnail($post_id, 'large'); 
    $custom_field_value = get_post_meta($post_id, 'your_custom_field', true); 

    return '<div class="post-preview"><div class="preview-title"><h3><a href="' . get_permalink($post_id) . '">' . $title . '</a></h3></div><div class="preview-img">' . $image . '</div><div class="preview-excerpt"><p>' . $content . '...</p></div><div class="preview-customfield">' . $custom_field_value . '</div><div class="preview-readmore"><a href="' . get_permalink($post_id) . '">Read more</a></div></div>';
}
add_shortcode('post_preview', 'post_preview_shortcode');
