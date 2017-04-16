<?php

namespace App\Http\Controllers;

use Request;

use App\modeles\Oeuvre;
use Illuminate\Support\Facades\Session;
use DB;

class ReservationController extends Controller
{
  public function addReservation() {
    $date = explode("/", Request::input('date_reservation'));
    $date = $date[2] . "-" . $date[1] . "-" . $date[0] . " 00:00:00";
   DB::table('reservation')->insert([
      "date_reservation" => $date,
      "id_oeuvre" => Request::input('id_oeuvre'),
      "id_adherent" => Request::input('cbAdherent'),
      'statut' => 'Attente'
    ]);
    $success = "Oeuvre ajoutée";
    return view("formReservation", compact('success'));
  }
}
