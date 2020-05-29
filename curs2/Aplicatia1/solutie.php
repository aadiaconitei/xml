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
    // crează variabile din fiecare linie a fișierului CSV
    list($id, $nume, $categorie) = $line;

    // crează un element articol
    $articol = $root->addChild('articol');

    // adaugă un atribut id
    $articol->addAttribute('id', $id);

    // adaugă elementul nume
    $articol->addChild('nume', $nume);

    // adaugă elementul categorie
    $articol->addChild('categorie', $categorie);
}

// scrie documentul XML în fișierul articole.xml
$root->asXML('articole.xml');