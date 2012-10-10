<?php if ($this->session->flashdata('logout')): ?>

    <h3>Logged Out</h3>
    <p>Thank you for visiting. You are now logged out. Please come back soon!</p>

<?php else: ?>
    
    <h3>Welcome</h3>
    <p>Welcome to Knowledge is Power, a site dedicated to keeping you up to date on the Web security and programming information you need to know.</p>

    <h3>Most Popular Pages</h3>
    <p>
    <ol>
        <? foreach($popular as $page): ?>
            <li><h4><?= anchor("page/{$page->id}", $page->title) ?></h4></li>
        <? endforeach ?>
    </ol>
    </p>

<?php endif ?>