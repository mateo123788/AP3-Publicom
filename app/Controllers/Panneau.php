<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Panneau extends BaseController
{
    private $panneauModel;
    private $clientModel;
    private $messageModel;

    public function __construct()
    {
        $this->panneauModel = model('Panneau');
        $this->clientModel = model('Client');
        $this->messageModel = model('Message');
    }

    //methode pour afficher la liste des panneaux
    public function panneau(): string
    {

        $admin = auth()->user();

        $listClient = $this->clientModel->findAll();
        $panneaux = $this->panneauModel->findAll();
        return view('view-panneau/liste-panneau', [
            'listePanneau' => $panneaux,
            'listClient' => $listClient,
            'admin' => $admin && $admin->inGroup('admin')
        ]);
    }

    //methode pour ajouter 
    public function ajout(): string
    {
        $admin = auth()->user();

        $panneaux = $this->panneauModel->findAll();
        $listClient = $this->clientModel->findAll();
        return view('view-panneau/ajout-panneau', [
            'listePanneau' => $panneaux,
            'listClient' => $listClient,
            'admin' => $admin && $admin->inGroup('admin')
        ]);
    }

    //POST
    public function create()
    {
        $admin = auth()->user();

        $panneaux = $this->request->getPost();
        $this->panneauModel->save($panneaux);
        return redirect('liste-panneau', [
            'admin' => $admin && $admin->inGroup('admin')
        ]);
    }
    //---------------------------------------------------------------------
    //get
    
    // public function modif($panneauxId)
    // {
    //     // $client = $this->clientModel->finJoinAll1($clientID);
    //     $panneau = $this->panneauModel->find($panneauxId);
    //     return view('view-panneau/modif-panneau', ['panneau' => $panneau]);
    // }

    public function modif($panneauxId)
    {
        $admin = auth()->user();

        $panneaux = $this->panneauModel->findJoinIdClient($panneauxId);
        return view('view-panneau/modif-panneau', [
            'panneau' => $panneaux,
            'admin' => $admin && $admin->inGroup('admin')

        ]);
    }
    //POST
    public function update()
    {
        $admin = auth()->user();

        $panneaux = $this->request->getPost();
        // var_dump($_POST);
        // die();
        $this->panneauModel->save($panneaux);
        return redirect('liste-panneau', [
            'admin' => $admin && $admin->inGroup('admin')

        ]);
    }

    //fonction de supression pour le D du CRUD
    //Get
    
    // public function delete($panneauxId)
    // {
    //     $admin = auth()->user();

    //     $this->panneauModel->delete($panneauxId);
    //     return redirect()->route('liste-panneau', [
    //         'admin' => $admin && $admin->inGroup('admin')

    //     ]);
    // }

    //fonction de supression du CRUD
    //Post
    public function delete()
    {
        $admin = auth()->user();
        $panneauId = $this->request->getPost('ID_CLIENT');
        $this->panneauModel->delete($panneauId);
        return redirect()->route('liste-panneau', [
            'admin' => $admin && $admin->inGroup('admin')

        ]);
    }
}
