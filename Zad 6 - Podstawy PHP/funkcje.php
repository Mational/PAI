<?php
    function test_input($data) {
        $data = trim($data);                // usuwa białe znaki z początku i końca ciągu
        $data = stripslashes($data);        // usuwa z ciągu znaki typu \
        $data = htmlspecialchars($data);    // zamienia znaki specjalne html na odpowiedniki np. "<" na "&lt"
        return $data;
    }

    // deklaracja klasy Osoba
    class Osoba {
        public $login;
        public $haslo;
        public $imieNazwisko;
    }

    // tworzenie osoby1
    $osoba1 = new Osoba;
    $osoba1->login = "adam";
    $osoba1->haslo = "adam2020";
    $osoba1->imieNazwisko = "Adam Kowalski";

    // tworzenie osoby2
    $osoba2 = new Osoba;
    $osoba2->login = "agata";
    $osoba2->haslo = "2020agata";
    $osoba2->imieNazwisko = "Agata Nowak";
?>