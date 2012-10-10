<h3>Add a PDF</h3>

<?php if ($this->session->flashdata('success')): ?>
    <h4 class='success'>The PDF has been added!</h4>
<?php endif ?>

<?= form_open_multipart('add_pdf') ?>

	<input type="hidden" name="MAX_FILE_SIZE" value="1048576" />

	<fieldset><legend>Fill out the form to add a PDF to the site:</legend>
    <p>
    <?= form_label('Title', 'title') ?><br />
    <?= create_form_input('title') ?>
    </p>
    <p>
    <?= form_label('Description', 'decription') ?><br />
    <?= create_form_input('description', 'textarea')  ?>
    </p>
    <p>
    <?= form_label('PDF', 'pdf') ?><br />
    <?= form_upload('pdf', 'upload') ?>
    <?= isset($failed) ? $failed : '' ?><small> PDF only, 1MB Limit</small>
    </p>
    <input type="submit" name="submit" value="Add This PDF" id="submit_button" class="formbutton" /></p>

	</fieldset>
<?php form_close() ?>

