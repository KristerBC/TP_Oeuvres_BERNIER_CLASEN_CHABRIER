<?php

namespace App\modeles;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use DB;

class Utilisateur extends Model
{
    /**
    * Authentifie l'utilisateur sur son login et Mdp
    * Si c'est OK, son id est engregistré dans la session
    * Cela lui donne accès au menu général (voir page master)
    * @param string $login : Login de l'Utilisateur
    * @param string $pwd : MdP de l'utilisateur
    * @return boolean : True or false
    */

    public function login($login , $pwd) {
      $connected = false;
      $user = DB::table('proprietaire')
        ->select()
        ->where('login', '=', $login)
        ->first();
      if($user) {
        // Si le mdp saisi est identique au mdp enregistré
        if($user->pwd == $pwd) {
          Session::put('id', $user->id_proprietaire);
          $connected = true;
        }
      }
      return $connected;
    }

    /**
    * Délogue l'utilisateur en supprimant son Id
    * de la session => le menu n'est plus accessible
    */
    public function logout() {
      Session::forget('id');
    }
}
