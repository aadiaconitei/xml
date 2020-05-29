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

$doc = new DOMDocument();
$doc->formatOutput = true;
$doc->loadXML('<catalog/>');

$root = $doc->documentElement;

while ($line = fgetcsv($handle, 1000, ';')) {
    // crează variabile din fiecare linie a fișierului CSV
    list($id, $nume, $categorie) = $line;

    // crează elementul nume
    $nume = $doc->createElement('nume', $nume);

    // crează elementul categorie
    $categorie = $doc->createElement('categorie', $categorie);

    // crează elementul articol
    $articol = $doc->createElement('articol');

    // crează atributul id
    $idAttr = $doc->createAttribute('id');
    // asignăm valoarea atributului
    $idAttr->nodeValue = $id;

    // adaugă atributul id
    $articol->appendChild($idAttr);

    // apendează elementul nume
    $articol->appendChild($nume);

    // apendează elementul categorie
    $articol->appendChild($categorie);

    // apendează elementul articol
    $root->appendChild($articol);
}

// scrie documentul XML în fișierul articole.xml
$doc->save('articole2.xml');