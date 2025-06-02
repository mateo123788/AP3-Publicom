<?php

namespace App\Controllers;

use App\Models\Client;
use App\Controllers\BaseController;

class Clients extends BaseController
{
    private $clientModel;
    private $messageModel;
    private $panneauModel;
    private $userModel;

    /**
     * Constructeur de la classe Clients
    */
    public function __construct()
    {
        $this->clientModel = new Client();
        $this->messageModel = model('Message');
        $this->panneauModel = model('Panneau');
        $this->userModel = model('UserModel');
    }

    /**
     * Affiche la liste des clients
     *
     * @return string
    */

    public function client(): string
    {
        $admin = auth()->user();

        // if( ! $admin->inGroup('admin')){
        //     return redirect('view-message/gestion-messages');
        // }

        $clients = $this->clientModel->findAll();
        // $client = $this->clientModel->findJoinAll();

        return view('view-client/liste-clients', [
            'listeClients' => $clients,
            'admin' => $admin && $admin->inGroup('admin')

        ]);
    }

    /**
     * Affiche le formulaire d'ajout d'un client
     *
     * @return string
    */
    public function ajout(): string
    {
        $admin = auth()->user();

        $client = $this->clientModel->findAll();
        // $client = $this->panneauModel->findJoinAll()
        // var_dump($client);
        // die();

        return view('view-client/ajout-clients', [
            'listeClient' => $client,
            'admin' => $admin && $admin->inGroup('admin')
        ]);
    }

    /**
     * Enregistre la création d'un client  dans la base de données
     *
     * @return string
    */
    public function create()
    {
        $admin = auth()->user();

        $clientData = $this->request->getPost();
        $this->clientModel->save($clientData);

        return redirect('liste_client', [
            'admin' => $admin && $admin->inGroup('admin')
        ]);
    }

    /**
     * Affiche le formulaire de modification d'un client
     *
     * @param int $clientId
     * @return string
    */
    public function modif($clientId): string
    {

        $admin = auth()->user();

        $client = $this->clientModel->find($clientId);
        // var_dump($client);
        // die();

        return view('view-client/modif-clients', [
            'client' => $client,
            'admin' => $admin && $admin->inGroup('admin')
        ]);
    }

    /**
     * Enregistre la modification d'un client dans la base de données
     *
     * @return string
    */
    public function update()
    {
        $admin = auth()->user();

        $clientData = $this->request->getPost();
        $this->clientModel->save($clientData);

        return redirect('liste_client', [
            'admin' => $admin && $admin->inGroup('admin')
        ]);
    }

    /**
     * Supprime un client de la base de données
     *
     * @return string
    */
    public function delete()
    {
        $admin = auth()->user();

        $clientId= $this->request->getPost('ID_CLIENT');

        $this->messageModel->deleteMessage($clientId);
        $this->panneauModel->deletePanneau($clientId);
    
        $this->clientModel->delete($clientId);

        return redirect('liste_client', [
            'admin' => $admin && $admin->inGroup('admin')
        ]);

    }
}
