<?php
namespace App\Kipedreiro\Controllers\Admin;

use App\Kipedreiro\Core\Session;
use App\Kipedreiro\Core\Redirect;

abstract class AuthenticatedController{
    protected Session $session;
    public function __construct(){
        $this->session = new Session();
        if (!$this->session->has('usuario_id')) {
            redirect::redirecionarComMensagem(
                'login',
                'error',
                'Você precisa estar logado para acessar a página.'
            );
        }
    }
}