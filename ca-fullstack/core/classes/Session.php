<?php

namespace Core;

use App\App;
use App\Users\User;

class Session
{
    /** @var User su userio duomenim*/
    private $user;

    /**
     * FileDB constructorius kviecia login metoda
     * @param  string $file_name
     */
    public function __construct()
    {
        //Tik nuo sitos vietos, super global session turime. Siunciame session cookie useriui, kad pasiliktu toks koks yra serveryje.
        //ties sita vieta serveris pasiziuri ar atejes session id sutampa su serveriu, tada grazina is serveryje gulinciu duomenu session superglobau masyva
        session_start();
        $this->loginFromCookie();
    }

    /**
     * Jei pries tai buvo irasyti su situo cookie ir bootloaderyje apdare session start, reiskia susigrazinom ta pati superglobalu masyva, ir jame jau yra email, password.
     * 
     */
    public function loginFromCookie()
    {
        return $this->login($_SESSION['email'] ?? '', $_SESSION['password'] ?? '');
    }

    /**
     * Login metodas
     *
     * @param string $email
     * @param string $password
     * @return boolean
     */
    public function login(string $email, string $password): bool
    {
        $userData = \App\Users\Model::getWhere([
            'email' => $email,
            'password' => $password
        ]);
        if ($userData) {
            $user = $userData[0];
            $_SESSION['email'] = $user->email;
            $_SESSION['password'] = $user->password;
            $this->user = $user;

            return true;
        }
        return false;
    }

    /**
     * Grazina duomenu masyva
     *
     *
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Logout metodas
     *
     * @param string $redirect
     *
     */
    public function logOut(string $redirect = null)
    {
        $_SESSION = [];

        setcookie(session_name(), null, time() - 1, '/');

        session_destroy();

        $this->user = null;

        if ($redirect) {
            header("Location: $redirect");
        }
    }
}
