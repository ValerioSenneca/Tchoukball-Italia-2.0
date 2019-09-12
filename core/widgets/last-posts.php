<?php
namespace TBI\Widgets;

class Last_Posts extends \WP_Widget {
    public function __construct() {
        $widget_options = [
            'classname' => 'tbi_widget_last_posts',
            'description' => 'Articoli recenti',
        ];

        parent::__construct('tbi_widget_last_posts', 'TBIIII - Articoli recenti', $widget_options);
    }

    public function form($instance) {
        $instance_title = !empty($instance['title']) ? $instance['title'] : 'News';
        $title_field_id = esc_attr($this->get_field_id('title'));
        $title_field_name = esc_attr($this->get_field_name('title'));

        $instance_categories = $instance['categories'] ?: [];
        $all_categories = get_categories();
        $category_field_name = esc_attr($this->get_field_name('categories'));

        include get_template_directory() . '/views/admin/widgets/last-posts.php';
    }

    public function widget($args, $instance) { }

    public function update($new_instance, $old_instance) {
        var_dump($new_instance);
        $instance = [];
        $instance['title'] = !empty($new_instance['title']) ? sanitize_text_field($new_instance['title']) : 'News';
        $instance['categories'] = !empty($new_instance['categories']) ? $new_instance['categories'] : null;

        return $instance;
    }
}

add_action('widgets_init', function() {
    register_widget('\TBI\Widgets\Last_Posts');
});