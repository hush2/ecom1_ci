<h3>PDF Guides</h3>

<?php if ( ! $this->session->userdata('id')): ?>

    <p class='error'>Thank you for your interest in this content. You must be logged in as a registered user to view any of the PDFs listed below.</p>

<?php elseif ($this->session->userdata('is_expired')): ?>

    <p class='error'>Thank you for your interest in this content. Unfortunately your account has expired. Please <?= anchor('renew', 'renew your account') ?> in order to view any of the PDFs listed below.</p>

<?php endif ?>


<?php if (empty($titles)): ?>

    <p>There are currently no PDFs available to view. Please check back again!</p>

<? else: ?>

    <?php foreach ($titles as $title): ?>

    <div>
    <h4><?= anchor("view_pdf/$title->tmp_name", $title->title) ?> (<?= $title->size ?> kb)</h4>
        <p><?= $title->description ?></p>
    </div>

    <?php endforeach ?>

<?php endif ?>
