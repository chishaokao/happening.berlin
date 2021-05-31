

<?php
/*function csv(string $file, string $delimiter = ','): array {
      $fh = fopen($file,"r+");
      $header_line = fgets($fh);
      $header_line = str_replace("\xEF\xBB\xBF", '', $header_line);
      $keys = str_getcsv($header_line);
      $csv = [];

      while ($row = fgetcsv($fh,$delimiter)) {
          $csv[] = array_combine($keys, $row);
      }

      return $csv;
      
    }
    */
    ?>