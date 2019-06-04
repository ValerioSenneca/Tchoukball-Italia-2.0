<?php
use TBI\Models\Competition\Team;

$post = get_post($id);
$teams_meta = get_post_meta($id, 'tbi-competition-teams', true) ?: [];
$turns_meta = get_post_meta($id, 'tbi-competition-turns', true) ?: [];
$options_meta = get_post_meta($id, 'tbi-competition-options', true) ?: [];

$this->id = $id;
$this->title = $post->post_title;
$this->excerpt = $post->post_excerpt;
$this->content = $post->post_content;
$this->type = $post->post_type; 
$this->competition = wp_get_post_terms($id, 'competitions')[0];
$this->season = wp_get_post_terms($id, 'seasons')[0];
$this->date = $options_meta['date'];
$this->are_fixtures_dates_visible = $options_meta['are_fixtures_dates_visible'] ?: false;
$this->priority = $options_meta['priority'] ?: 0;
$this->turns = $turns_meta;
$this->teams = array_map(function($team, $team_id) {
    return new Team($team_id, $team);
}, $teams_meta, array_keys($teams_meta));