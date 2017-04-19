<?php

namespace App\Http\Controllers;

use Request;

use App\modeles\Utilisateur;

class UtilisateurController extends Controller
{
    /**
    * Initialise le formulaire d'authentification
    * @return Vue formLogin
    */
    public function getLogin() {
      $erreur = "";
      return view('formLogin', compact('error'));
    }

    /**
    * Authentifie l'utilisateur
    * @return Vue formLogin ou home
    */
    public function signIn() {
      $login = Request::input('login');
      $pwd = Request::input('pwd');
      $utilisateur = new Utilisateur();
      $connected = $utilisateur->login($login, $pwd);
      if ($connected) {
        return view('home');
      } else {
        $erreur = "Login ou mot de passe inconnu !";
        return view('formLogin', compact('erreur'));
      }
    }

    /**
    * Déconnecte le visiteur authentifié
    * @return Vue home
    */
    public function signOut() {
      $utilisateur = new Utilisateur();
      $utilisateur->logout();
      return view('formLogin');
    }
}
