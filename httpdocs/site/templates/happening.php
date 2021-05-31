<?php snippet('header') ?>

<article class="happening">
  <h1 class="happening-event"><?= $page->headline() ?></h1>
  <p class="happening-artist"><?= $page->person() ?></p>
  <p class="happening-event__location"><?= $page->organizer() ?></p>
  <p class="happening-url"><?= $page->link() ?></p>
  <p class="happening-event__start">From:<?= $page->from() ?></p>
  <p class="happening-event__end">To: <?= $page->to() ?></p>
  <p class="happening-district"><?= $page->district() ?></p>
  <p class="happening-address">Street: <?= $page->street() ?></p>
  <p class="happening-plz">ZIP: <?= $page->zip() ?></p>
  <p class="happening-category"><?= $page->categories() ?></p>
  <p class="happening-tag">Tags: <?= $page->tags() ?></p>
  <div class="happening-description">
    <?= $page->description()->kt() ?>
  </div>
</article>


<?php snippet('footer') ?>