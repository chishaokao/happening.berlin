<!doctype html>

  <?php snippet('header') ?>

  <body>

    <div class="top-right">
      <input type="text" id="search" placeholder="Search" name="search">
    </div>


    <div id = "options">

      <!-- check location -->
      <div class= "option-set category" data-group ="category">
        <label id="all" class="filter-all "><input type ="checkbox" value ="*"  />All<img src="assets/src/cross.svg" alt="cross" class="cross"/></label>
        <label id="exhibition" class="filter-exhibition "><input type ="checkbox" value =".exhibition" />Exhibition<img src="assets/src/cross.svg" alt="cross" class="cross"/></label>
        <label id="gallery" class="filter-gallery"><input type ="checkbox" value =".gallery" />Gallery<img src="assets/src/cross.svg" alt="cross" class="cross"/></label>
        <label id="institution" class="filter-institution"><input type ="checkbox" value =".institution"  />Museum<img src="assets/src/cross.svg" alt="cross" class="cross"/></label>
        <label id="project-space" class="filter-project-space"><input type ="checkbox" value =".project-space" />Project Space<img src="assets/src/cross.svg" alt="cross" class="cross"/></label>
        <label id="private-collection" class="filter-private-collection "><input type ="checkbox" value =".private=collection" />Private Collection<img src="assets/src/cross.svg" alt="cross" class="cross"/></label>
        <label id="screening" class="filter-screening "><input type ="checkbox" value =".screening" />Screening<img src="assets/src/cross.svg" alt="cross" class="cross"/></label>
        <label id="theater" class="filter-theater "><input type ="checkbox" value =".theater" />Theater<img src="assets/src/cross.svg" alt="cross" class="cross"/></label>
        <label id="club" class="filter-club "><input type ="checkbox" value =".club" />Club<img src="assets/src/cross.svg" alt="cross" class="cross"/></label>
        <label id="opening" class="filter-opening"><input type ="checkbox" value =".opening" />Opening<img src="assets/src/cross.svg" alt="cross" class="cross"/></label>
        <label id="talk" class="filter-talk "><input type ="checkbox" value =".talk" />Talk<img src="assets/src/cross.svg" alt="cross" class="cross"/></label>
        <label id="concert" class="filter-concert"><input type ="checkbox" value =".concert" />Concert<img src="assets/src/cross.svg" alt="cross" class="cross"/></label>
         <label id="party" class="filter-party"><input type ="checkbox" value =".party" />Party<img src="assets/src/cross.svg" alt="cross" class="cross"/></label>
         <label id="star" class="filter-star "><input type ="checkbox" value =".star" /><img src="assets/src/star-6.svg"
        alt="recommand" class="star" /><img src="assets/src/cross.svg" alt="cross" class="cross"/></label>
        <label id="other" class="filter-other "><input type ="checkbox" value =".other" class="cross"/>...</label>


      </div>
      <div class= "option-set check-district" data-group ="district">
          <label class="filter"><input type ="checkbox" value =".digital" /><span class="checkmark"></span>Online</label>
          <label  class="filter"><input type ="checkbox" value =".kreuzberg" /><span class="checkmark"></span>Kreuzberg</label>
          <label  class="filter"><input type ="checkbox" value =".charlottenburg" /><span class="checkmark"></span>Charlottenburg</label>
          <label  class="filter"><input type ="checkbox" value =".neukölln" /> <span class="checkmark"></span>Neukölln</label>
          <label  class="filter"><input type ="checkbox" value =".mitte" /><span class="checkmark"></span>Mitte</label>
          <label  class="filter"><input type ="checkbox" value =".ewdding" /><span class="checkmark"></span>Wedding</label>
          <label  class="filter"><input type ="checkbox" value =".prenzlauer-Berg" /><span class="checkmark"></span>Prenzlauer Berg</label>
          <label  class="filter"><input type ="checkbox" value =".friedrichhain" /><span class="checkmark"></span>Friedrichhain</label>
         <label  class="filter"><input type ="checkbox" value =".schöneberg" /><span class="checkmark"></span>Schöneberg</label>
        </div>
    <div class= "option-set check-date" data-group ="date">

      <label><input type ="checkbox" value =".week" />This Week</label>
       <label><input type ="checkbox" value =".today" />Today</label>
       <label><input type ="checkbox" value =".now" />Now</label>

      </div>
    </div>


    <!-- event list-->
    <div class="container">
      <div class="item-list">

        <!-- each event-->


        <?php $happeninglist = $site->findPageOrDraft('happeninglist')->children()->listed()->sortBy(function($page){
              return $page->to()->toDate();});?>
        <?php $groups = $happeninglist->children()->listed()->group(function($happening) {
             if($happening->from()->toDate() <= time() && $happening->to()->toDate() >= time()) return 'now';
             if($happening->from()->toDate() > strtotime('-7 day')||$happening->to()->toDate() < strtotime('-7 day'))   return 'week';
             if($happening->from()->toDate() <= date() && $happening->to()->toDate() >= date()) return 'today';
             });
       ?>

    		<?php foreach ($happeninglist as $happening):?>




    <?php if ($happening->to()->toDate() > strtotime('-1 day')): ?>

          <?php $categories = $happening->categories() ?>
          <?php $district = $happening->district() ?>
          <div class="item <?php echo $categories. " ".$district ?>">

            <span class="list-from"><?= $happening->from()->toDate('d.m') ?> </span>
            <img class="line" src="assets/src/Line.svg" alt="line">
            <span class="list-to"><?= $happening->to()->toDate('d.m') ?> </span>
            <span class="list-venue"><?= $happening->organizer() ?></span>
            <span class="list-district"><?= $happening->district() ?></span>
            <span class="list-headline"><?= $happening->headline() ?></span>
            <span class="list-artist"><?= $happening->person() ?></span>
            <div class="list-content">
              <span class="list-description"><?= $happening->description() ?></span>
              <span class="list-meta-info"><?= $happening->metaInfo() ?></span>
              <span class="list-link"><a><?= $happening->link() ?></a></span>
              <span class="list-address"><?= $happening->street().$happening->zip()." ".$happening->district() ?></span>
            </div>
          </div>



		  <?php endif; ?>
          <?php endforeach ?>
        </div>
      </div>
    <!-- main ends here-->

    <footer>
    <div class="link">
    <span>Happening Berlin</span>
     <a id="about">About</a>
     <a id="contact">Contact</a>
     <a id="news">Newsletter</a>
     <a id="ins">instagram</a>
     <span>Last Updated: </span>
     <img src="assets/src/cross.svg" alt="cross" class="cross"/>
     </div>
<!-- Begin Mailchimp Signup Form -->
<div class="newsletter">
  <!--<img src="assets/src/cross.svg" alt="cross" class="cross"/>-->
  <link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
  <style type="text/css">
   #mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
   /* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
      We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
  </style>
  <div id="mc_embed_signup">
    <form action="https://outlook.us1.list-manage.com/subscribe/post?u=df4b2c2744e8780a374a90fd3&amp;id=5d7afa0ef1" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
      <div id="mc_embed_signup_scroll">
      <h2>Subscribe</h2>
      <div class="indicates-required"><span class="asterisk">*</span> indicates required</div>
      <div class="mc-field-group">
      <label for="mce-EMAIL">Email Address  <span class="asterisk">*</span>
      </label>
      <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
  </div>
  <div class="mc-field-group">
     <label for="mce-FNAME">First Name </label>
     <input type="text" value="" name="FNAME" class="" id="mce-FNAME">
  </div>
  <div class="mc-field-group">
     <label for="mce-LNAME">Last Name </label>
     <input type="text" value="" name="LNAME" class="" id="mce-LNAME">
  </div>
    <div class="mc-field-group size1of2">
    <label for="mce-BIRTHDAY-month">Birthday </label>
    <div class="datefield">
    <span class="subfield monthfield"><input class="birthday " type="text" pattern="[0-9]*" value="" placeholder="MM" size="2" maxlength="2" name="BIRTHDAY[month]" id="mce-BIRTHDAY-month"></span> /
    <span class="subfield dayfield"><input class="birthday " type="text" pattern="[0-9]*" value="" placeholder="DD" size="2" maxlength="2" name="BIRTHDAY[day]" id="mce-BIRTHDAY-day"></span>
    <span class="small-meta nowrap">( mm / dd )</span>
   </div>
  </div> <div id="mce-responses" class="clear">
    <div class="response" id="mce-error-response" style="display:none"></div>
    <div class="response" id="mce-success-response" style="display:none"></div>
   </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
      <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_df4b2c2744e8780a374a90fd3_5d7afa0ef1" tabindex="-1" value=""></div>
      <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
      </div>
  </form>
  </div>
  <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='ADDRESS';ftypes[3]='address';fnames[4]='PHONE';ftypes[4]='phone';fnames[5]='BIRTHDAY';ftypes[5]='birthday';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
  <!--End mc_embed_signup-->
</div>
    </footer>



  </body>
</html>
