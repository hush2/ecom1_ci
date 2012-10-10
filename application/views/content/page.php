<h3>
    <?= $this->page_title ?>
</h3>

<?php if ( ! $this->session->userdata('id')): ?>

    <p class='error'>Thank you for your interest in this content. You must be a logged in as a registered user to view this page in its entirety.</p>
    <div>
        <?= $page->description ?>
    </div>

<?php else: ?>

    <?php if ($this->session->userdata('is_expired')): ?>

        <p class="error">Thank you for your interest in this content, but your account is no longer current. Please <?= anchor('renew', 'renew your account') ?> in order to view this page in its entirety</p>
        <div>
            <?= $page->description ?>
        </div>

    <? else:?>

        <?php
        $heart = img('images/heart_48.png', array('align' => 'middle'));
        $cross = img('images/cross_48.png', array('align' => 'middle'));
        ?>

        <p>
        <?php if ($this->session->flashdata('added')): ?>

            <?= $heart ?>This has been added to your favorites!<?= anchor("remove_from_favorites/$page->id", $cross ) ?>

        <?php elseif ($this->session->flashdata('removed')): ?>

            This page has been removed from your favorites!<?= $cross ?>

        <?php elseif ($is_favorite): ?>

            <?= $heart ?>This is a favorite!<?= anchor("remove_from_favorites/$page->id", $cross) ?>

        <?php else: ?>

            Make this a favorite!<?= anchor("add_to_favorites/$page->id", $heart) ?>

        <?php endif ?>
        </p>

        <div>
            <?= nl2br($page->content) ?>
        </div>

    <? endif ?>

<?php endif ?>
