<h3><?= $this->page_title ?></h3>

<?php if ( ! $this->session->userdata('id')): ?>

    <p class='error'>Thank you for your interest in this content. You must be logged in as a registered user to view any of the PDFs listed below.</p>

<?php endif ?>

<?php if ($this->session->userdata('is_expired')): ?>

    <p class='error'>Thank you for your interest in this content. Unfortunately your account has expired. Please <?= anchor('renew', 'renew your account') ?> in order to access this file.</p>

<?php endif ?>

<div><?= $description ?></div>
