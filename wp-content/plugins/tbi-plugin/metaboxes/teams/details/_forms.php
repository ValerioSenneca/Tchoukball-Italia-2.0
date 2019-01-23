<?php
$details_meta = get_post_meta($post->ID, 'tbi-teams-details', true) ?: []; ?>

<div class="teams-metaboxes__details">
    <div class="teams-metaboxes__details__field">
        <label class="teams-metaboxes__details__field__label">Nome breve</label>
        <input class="teams-metaboxes__details__field__input" type="text" value="<?= $details_meta['short-name'] ?: '' ?>" name="tbi-metaboxes-teams-details-short-name" />
    </div>
    <div class="teams-metaboxes__details__field teams-metaboxes__details__field--narrow">
        <label class="teams-metaboxes__details__field__label">Sigla</label>
        <input class="teams-metaboxes__details__field__input" type="text" value="<?= $details_meta['team-code'] ?: '' ?>" name="tbi-metaboxes-teams-details-team-code" />
    </div>
    <div class="teams-metaboxes__details__field teams-metaboxes__details__field--checkbox">
        <label class="teams-metaboxes__details__field__label">Non più in attivit&agrave;</label>
        <?php TBI\Render::switch_checkbox(true, "tbi-metaboxes-teams-details-is-inactive", $details_meta['is-inactive']); ?>
    </div>
</div>