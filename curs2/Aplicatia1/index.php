<?php

$csv = "articole.csv";

if (!file_exists($csv)) {
    fwrite(STDERR, "Fisierul $csv nu exista");
    exit(1);
}

if (!is_readable($csv)) {
    fwrite(STDERR, "Fisierul $csv nu poate fi citit");
    exit(1);
}

$handle = fopen($csv, "r");

if (false === $handle) {
    fwrite(STDERR, "Fisierul $csv nu a putut fi deschis");
    exit(1);
}

$root = new SimpleXMLElement('<catalog/>');

while ($line = fgetcsv($handle, 1000, ';')) {
    // construiește documentul XML aici
}

// scrie documentul XML din memorie într-un fișier pe disk aici