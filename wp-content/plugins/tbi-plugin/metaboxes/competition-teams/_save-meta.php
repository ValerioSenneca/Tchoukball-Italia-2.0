<?php
const PARTICIPANTS_INPUT_NAME = 'tbi-competition-teams-participants';
const INFO_INPUT_NAME = 'tbi-competition-teams-info';

$competition_participants = isset($_POST[PARTICIPANTS_INPUT_NAME]) ? $_POST[PARTICIPANTS_INPUT_NAME] : [];

if (in_array(get_post_type($post_id), ['leagues', 'cups'])) {
    $participants = [];

    foreach ($competition_participants as $participant_id) {
        $participants[$participant_id] = [
            "name" => $_POST[INFO_INPUT_NAME . '-name'][$participant_id],
            "short_name" => $_POST[INFO_INPUT_NAME . '-short-name'][$participant_id],
            "code" => $_POST[INFO_INPUT_NAME . '-code'][$participant_id],
            "penalty" => $_POST[INFO_INPUT_NAME . '-penalty'][$participant_id],
            "priority" => $_POST[INFO_INPUT_NAME . '-priority'][$participant_id],
            "is_not_in_standings" => $_POST[INFO_INPUT_NAME . '-is-not-in-standings'][$participant_id]
        ];
    }

    update_post_meta($post_id, 'tbi-competitions-teams', $participants);
}