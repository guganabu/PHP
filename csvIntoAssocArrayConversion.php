<?php

    function parseCSV ( $filename = '' , $delimiter = ',' ) {   //pass filename with location and delimiter
            
            if ( is_null($filename) || !file_exists($filename) || !is_readable($filename) )
                return FALSE;
            
            $header = NULL;
            $arrayCSV = array();
            
            if ( $handle = fopen( $filename , 'r' ) ) { //read file
                while ( $row = fgetcsv( $handle, 1000, $delimiter ) ){  //parse row by row
                    if ( !$header ) 
                        $header = $row;
                    else
                        $arrayCSV[] = array_combine( $header, $row );
                }
                fclose($handle);
            }
        return $arrayCSV;
    }

    print_r(parseCSV('/tmp/csvFileName.csv'));
?>
