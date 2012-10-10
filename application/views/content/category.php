<h3><?= $this->page_title ?></h3>

<?php if ( ! $this->session->userdata('id')): ?>
    <p class='error'>Thank you for your interest in this content. You must be logged in as a registered user to view site content.</p>
<?php endif ?>

<?php if ($this->session->userdata('is_expired')): ?>
    <p class="error">Thank you for your interest in this content. Unfortunately your account has expired. Please <?= anchor('renew', 'renew your account') ?> in order to access site content.</p>
<?php endif ?>

<?php if (empty($titles)): ?>
    <p>There are currently no pages of content associated with this category. Please check back again!</p>
<?php else: ?>
    <?php foreach ($titles as $title): ?>
        <div>
            <h4><?= anchor("page/$title->id", $title->title) ?></h4>
            <p><?= $title->description ?></p>
        </div>
    <?php endforeach ?>
<?php endif ?>