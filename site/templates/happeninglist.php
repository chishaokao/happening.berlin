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
        <?php foreach ($page->children() as $happening): ?>
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
            <span class="list-description list-content"><?= $happening->description() ?></span>
            <span class="list-meta-info list-content"><?= $happening->metaInfo() ?></span>
            <span class="list-link list-content"><a><?= $happening->link() ?></a></span>
            <span class="list-address list-content"><?= $happening->street().$happening->zip()." ".$happening->district() ?></span>
          </div>
          <?php endforeach ?>
		  
        </div>
      </div>
    <!-- main ends here-->

    <footer>
    <span>Happening Berlin</span>

     <a>About</a>
     <a>Contact</a>
     <a>Newsletter</a>
     <a>instagram</a>
     <span>Last Updated: </span>


    </footer>



  </body>
</html>
