<?php
namespace TBI\Post_Type;

Class Competitions {
    public function __construct() { require '__construct.php'; }
    public function register_post_type() { require '_register-post-type.php'; }
    public function update_competition_term($post_id, $post) { require '_update-competition-term.php'; }
}

new Competitions();