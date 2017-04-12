<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class DBController extends Controller
{
    public $db;
    public __construct()
    {
      try {
        $this->db = new PDO('mysql:host=kristoffers.com;dbname=oeuvres', "TPOeuvres", "zTVwp9cPnhAZjrjA");
      } catch (PDOException $e) {
          print "Erreur !: " . $e->getMessage() . "<br/>";
          die();
      }
    }
}
