<?php

namespace App\Http\Controllers;

use Request;

use App\modeles\Oeuvre;
use Illuminate\Support\Facades\Session;
use DB;
use Datatables;

class OeuvreController extends Controller
{
  public function addOeuvre() {
   DB::table('oeuvre')->insert([
      "id_oeuvre" => DB::table("oeuvre")->count()+1,
      "id_proprietaire" => Session::get('id'),
      "titre" => Request::input('titre'),
      "prix" => Request::input('prix'),
    ]);
    $success = "Oeuvre ajoutée";
    return view("formOeuvre", compact('success'));
  }

  public function listOeuvres() {
    return Datatables::of(User::query())->make(true);
  }
}
