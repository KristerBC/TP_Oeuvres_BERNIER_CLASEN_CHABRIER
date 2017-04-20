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
    $date = $date[2] . "-" . $date[0] . "-" . $date[1] . " 00:00:00";
    DB::table('reservation')->insert([
      "date_reservation" => $date,
      "id_oeuvre" => Request::input('id_oeuvre'),
      "id_adherent" => Request::input('cbAdherent'),
      'statut' => 'Attente'
    ]);
    $success = "Oeuvre réservé";
    return view("listeOeuvres", compact('success'));
  }

  public function confirmReservation() {
    DB::table('reservation')
            ->where([
            ['id_oeuvre', '=', Request::input('id_oeuvre')],
            ['date_reservation', '=', Request::input('date_reservation')],
        ])
            ->update([
              'statut' => "Confirmée",
            ]);
    $success = "Reservation confirmée";
    return view('listeReservations', compact('success'));
  }
}
