<?php 

    // File system
    $data = readfile('readme.txt');
    echo $data;

    $file = 'readme.txt';
    // Check if file exists
    if(file_exists($file)) {
        echo readfile($file);
        // to copy file
        copy($file, 'quotes.txt');

        echo realpath($file);
        echo filesize($file);
        rename($file, 'newname.txt');
    } else {
        echo "File not found!!";
    }

    mkdir('newdir');
?>