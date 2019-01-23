<?php
$meta_teams = get_post_meta($post->ID, 'tbi-competitions-teams', true) ?: [];
$all_teams = array_map(function($team) use($meta_teams) {
    $team->is_selected = in_array($team->id, $meta_teams);
    return $team;
}, TBI\Models\Team::get_all_teams()); ?>

<div class="competitions-metaboxes__teams">
    <ul class="competitions-metaboxes__teams__filters">
        <li class="competitions-metaboxes__teams__filters__field">
            <label class="competitions-metaboxes__teams__filters__field__label">Mostra solo squadre attive</label>
            <?php TBI\Render::switch_checkbox(null, null, true); ?>
        </li>
        <li class="competitions-metaboxes__teams__filters__field">
            <label class="competitions-metaboxes__teams__filters__field__label">Mostra solo squadre selezionate</label>
            <?php TBI\Render::switch_checkbox(null, null, false); ?>
        </li>
    </ul>
    <hr/>
    <tbi-teams-list inline-template :teams_input='<?= htmlspecialchars(json_encode($all_teams), ENT_QUOTES) ?>'>
        <ul class="competitions-metaboxes__teams__participants">
            <li v-for="team in teams" class="competitions-metaboxes__teams__participants__item">
                <input
                    v-model="team.is_selected"
                    class="competitions-metaboxes__teams__participants__item__checkbox"
                    type="checkbox"
                    :name="'tbi-metaboxes-competitions-teams-participants[' + team.id + ']'"
                    :value="team.id"
                />
                <div class="competitions-metaboxes__teams__participants__item__checkbox-interface dashicons dashicons-yes"></div>
                <div class="competitions-metaboxes__teams__participants__item__emblem">
                    <img class="competitions-metaboxes__teams__participants__item__emblem__image" :src="team.emblem" />
                </div>
                <label class="competitions-metaboxes__teams__participants__item__name">{{ team.title }}</label>
            </li>
        </ul>
    </tbi-teams-list>
</div>