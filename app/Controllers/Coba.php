<?php

namespace App\Controllers;

class Coba extends BaseController //Class coba ini extends ke BaseController (parent). Apapun properti yang ada di parent bisa diakses dari Class manapun selama class tsb extends ke BaseController
{

    public function about($nama) //method about didalam kurung diberi params $nama untuk menangkap data dari url. $nama adalah data dari url. http://localhost:8080/coba/about/wahyudi
    {
        echo "Nama saya $nama";
    }
    public function about2()
    {
        echo " umurnya $this->umur"; //localhost:8080/coba/about2 ,$this->umur adalah properti dari BaseController
    }
    // karakter lain dari parameter
    public function about3($nama, $umur, $asal, $default = '')
    {
        echo "Ini terdiri dari 3 parameter, namaku $nama, umurku $umur, asalku $asal Kita bisa kasih default $default"; //http://localhost:8080/coba/about3/wahyudi/35/temanggung
    }
}
