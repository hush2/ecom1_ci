<h3>Add a Site Content Page</h3>

<?php if ($this->session->flashdata('success')): ?>

    <h4 class='success'>The page has been added!</h4>

<?php endif ?>

<?= form_open('add_page') ?>

	<fieldset><legend>Fill out the form to add a page of content:</legend>

    <p><?= form_label('Title', 'title') ?><br/><?= create_form_input('title') ?></p>
    <p><?= form_label('Category', 'category') ?><br />

    <?php
    $options = array('none' => 'Select One');
    foreach ($categories as $category) {
        $options[$category->id] = $category->category;
    }
    $selected = isset($this->success) ? 'none' : array();
    echo form_dropdown('category_id', $options, $selected);
    echo form_error('category_id');
    ?>

	<p><?= form_label('Description', 'description') ?><br /><?= create_form_input('description', 'textarea') ?></p>
    <p><?= form_label('Content', 'content') ?><br /><?= create_form_input('content', 'textarea', array('id' => 'tinyeditor')) ?></p>

    <p><?= form_submit(array('name' => 'submit', 'class' => 'formbutton', 'id' => 'submit'), 'Add This Page') ?></p>

	</fieldset>

<?= form_close() ?>

<?php include '_editor.php' ?>