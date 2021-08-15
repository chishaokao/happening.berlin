
<?php

$file_path = "/var/www/vhosts/happening.berlin/httpdocs/csv/happeninglist.csv";

$csvdata = array_map('str_getcsv', file($file_path));


//echo '<pre>';
//print_r($csvdata);
//echo '</pre>';


$counter = 0;
$text='0_';

foreach ($csvdata as &$value) {

//    if ($counter == 5) {
//        break;
//    }

//    echo '<pre>';
//    print_r($value);
//    echo '</pre>';


    if ($counter > 0) {
// Event,Artist,Event__location,Description,URL,Event__start,Event__end,District,Address,PLZ,Category,Tag
        $content = [
          'title' =>$value[0],
		  'headline'=> $value[0],
          'person' => $value[1],
          'organizer' => $value[2],
          'description'  => $value[3],
          'link'  => $value[4],
          'from' => $value[5],
          'to' => $value[6],
          'district' => $value[7],
          'street' => $value[8],
          'zip' => $value[9],
          'categories' => $value[10],
          'tags' => $value[11],
		  'fromt' => $value[12],
		  'tot' => $value[13],
	    ];


        print_r($content);

        $page->createChild([
          'content'  => $content,
          'template' => 'happening',
           'draft' => false
        ]);



    }

    $counter++;
}
