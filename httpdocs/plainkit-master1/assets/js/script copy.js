// date format

$(document).ready(function() {
  
  var $elements
  for (var i = 0; i < list.length; i++) {
    newElement = $('<div>')
      .addClass('item')
      .addClass(list[i].Category)
      .addClass(list[i].Tag)
    	.addClass(list[i].District)
    if ($elements) {
      $elements = $($elements).add(newElement)
    } else {
      $elements = $().add(newElement)
    }
    $('.item-list').append($elements)
  }

  $('.item').each(function(i) {
    var title = "<h1 class ='list-event'>" + list[i].Event + '</h1>'
    var date = "<h3 class= 'list-date' type='date'>" + list[i].Event__date + '</h3>'

    var location =
      "<h1 class = 'list-venue'>" +
      list[i].Event__location +
      '</h1><h3 class = list-district>' +
      list[i].District +
      '</h3>'

    var author = "<h2 class = 'list-artist'>" + list[i].Artist + '</h2>'
    var content =
      "<h2 class = 'list-description, list-content'>" +
      list[i].Description +
      "</h2><h3 class = 'list-opening, list-content'>" +
      list[i].Opening +
      "</h3><h3 class = 'list-address, list-content'>" +
      list[i].Address +
      "</h3><a class = 'list-url, list-content' target = '_blank' href='" +
      list[i].URL +
      "'>" +
      list[i].URL +
      '</a>'

    $(this)
      .append(title)
      .append(date)
      .append(location)
      .append(author)
      .append(content)
  })

  // category filtering

  // init Isotope
  var $list = $('.item-list').isotope({
    itemSelector: '.item',
  
  })
  
  // store filter for each group
  var filters = []
    // filter isotope
    // group filters together, inclusive
    $list.isotope({filter: filters.join(',')})

  function addFilter(filter) {
    if (filters.indexOf(filter) == -1) {
      filters.push(filter)
    }
  }
  function removeFilter(filter) {
    var index = filters.indexOf(filter)
    if (index != -1) {
      filters.splice(index, 1)
    }
  }
  
var $filterDisplay = $('#filter-display');
  filters={}
$list.isotope();
  $("#options").on("change", function(event){
    var checkbox = event.target
    var $checkbox = $(checkbox)
    var group = $checkbox.parents(".option-set").attr("data-group")
    var filterGroup = filters[group]
    if(!filterGroup) {
      filterGroup = filters[group] =[]
    }
    
    if(checkbox.checked){
      //add filter
      filterGroup.push(checkbox.value)
    }else{
      //remove filter
      var index = filterGroup.indexOf(checkbox.value)
      filterGroup.splice(index, 1)
    }
    var comboFilter = getComboFilter();
  $list.isotope({ filter: comboFilter });
  $filterDisplay.text( comboFilter );
});



function getComboFilter() {
  var combo = [];
  for ( var prop in filters ) {
    var group = filters[ prop ];
    if ( !group.length ) {
      // no filters in group, carry on
      continue;
    }
    // add first group
    if ( !combo.length ) {
      combo = group.slice(0);
      continue;
    }
    // add additional groups
    var nextCombo = [];
    // split group into combo: [ A, B ] & [ 1, 2 ] => [ A1, A2, B1, B2 ]
    for ( var i=0; i < combo.length; i++ ) {
      for ( var j=0; j < group.length; j++ ) {
        var item = combo[i] + group[j];
        nextCombo.push( item );
      }
    }
    combo = nextCombo;
  }
  var comboFilter = combo.join(' , ');
  return comboFilter;
}
  
  
  // filter buttons change color

 
  $(".category label").change(1000,function (){
    $(this).toggleClass("active")
   $(this).find(".cross").toggle()
  })

  $(".check-date label").change(1000,function(){
    $(this).toggleClass("time-range")
  })
 
  
  // card slide down
  $('.item').click(function() {
    $(this)
      .addClass('current')
      .slideDown('slow', function() {
        $('.current .list-content').toggle('slow')
      })
    $(this).removeClass('current')
  })
  
  // quick search regex
var qsRegex;

// init Isotope
var $list = $('.item-list').isotope({
  itemSelector: '.item',
 
  filter: function() {
    return qsRegex ? $(this).text().match( qsRegex ) : true;
  }
});

// use value of search field to filter
var $quicksearch = $('#search').keyup( debounce( function() {
  qsRegex = new RegExp( $quicksearch.val(), 'gi' );
  $list.isotope();
}, 200 ) );

// debounce so filtering doesn't happen every millisecond
function debounce( fn, threshold ) {
  var timeout;
  threshold = threshold || 100;
  return function debounced() {
    clearTimeout( timeout );
    var args = arguments;
    var _this = this;
    function delayed() {
      fn.apply( _this, args );
    }
    timeout = setTimeout( delayed, threshold );
  }
}
$("body").scroll(function(){
  alert("yes")
  $("footer").hide()
})
  $('html').ripples({
	resolution: 512,
	dropRadius: 20,
	perturbance: 0.04,
})
  //$('html').ripples("drop", x, y, radius, strength)
  
 
  
  })


