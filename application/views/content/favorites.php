<h3><?= $this->page_title ?></h3>

<?php if (empty($titles)): ?>

    <p>There are currently no pages of content available. Please check back again!</p>

<?php else: ?>

    <?php foreach ($titles as $title): ?>

        <div>
            <h4><?= anchor("page/{$title->id}", html_escape($title->title)) ?></h4>
            <p><?= html_escape($title->description) ?></p>
        </div>

    <?php endforeach ?>

<?php endif ?>
