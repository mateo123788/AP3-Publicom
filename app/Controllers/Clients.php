<?php

namespace App\Controllers;

use App\Models\Client;
use App\Models\Panneau;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Clients extends BaseController
{
    private $clientModel;
    private $messageModel;
    private $panneauModel;
    private $userModel;

    public function __construct()
    {
        $this->clientModel = new Client();
        $this->messageModel = model('Message');
        $this->panneauModel = model('Panneau');
        $this->userModel = model('UserModel');
    }

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

    // Ajouter un client 
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

    public function create()
    {
        $admin = auth()->user();

        $clientData = $this->request->getPost();
        $this->clientModel->save($clientData);

        return redirect('liste_client', [
            'admin' => $admin && $admin->inGroup('admin')
        ]);
    }

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

    public function update()
    {
        $admin = auth()->user();

        $clientData = $this->request->getPost();
        $this->clientModel->save($clientData);

        return redirect('liste_client', [
            'admin' => $admin && $admin->inGroup('admin')
        ]);
    }

    public function delete()
    {
        $admin = auth()->user();

        $clientId= $this->request->getPost('ID_CLIENT');
        // $idUser = $this->userModel->getAllByIdClient($clientId);

        // $this->userModel->deleteAuthIdentities($idUser[0]->id);
        // $this->userModel->deleteAuthPermissionsUsers($idUser[0]->id);
        // $this->userModel->deleteAuthGroupsUsers($idUser[0]->id);
        // $this->userModel->deleteAuthRememberTokens($idUser[0]->id);

        $this->messageModel->deleteMessage($clientId);
        $this->panneauModel->deletePanneau($clientId);
    
        $this->clientModel->delete($clientId);

        return redirect('liste_client', [
            'admin' => $admin && $admin->inGroup('admin')
        ]);

        // return('liste_client');
    }
}
