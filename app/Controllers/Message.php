<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Message extends BaseController
{

    /**
     * Constructeur de la classe Message
    */
    public function message(): string
    {
        $admin = auth()->user();
        // if( ! $admin->inGroup('admin')){
        //     return redirect('view-message/gestion-messages');
        // }

        $messageModel = new \App\Models\Message();

        $messages = $messageModel->findJoinAll();

        return view('view-message/liste-message', [
            'listeMessage' => $messages,
            'admin' => $admin && $admin->inGroup('admin')
        ]);
    }

    /**
     * Affiche le formulaire d'ajout d'un message
     *
     * @return string
    */
    public function ajout(): string
    {

        $admin = auth()->user();		

	$clientModel  = model('Client'); 
        $listeClients = $clientModel->findAll();

    $quartierModel = model('Quartier');
    $listeQuartiers = $quartierModel->findAll();

        return view('view-message/ajout-message', [
            'listeClients' => $listeClients,
            'listeQuartiers' => $listeQuartiers,
            'admin' => $admin && $admin->inGroup('admin')

        ]);
    }

    /**
     * Enregistre un message dans la base de données
     *
     * @return string
    */
    public function create()
    {

        // $clientModel = new \App\Models\Client();;
        // $clientModel = model('client');
        // $clientModel->find($clientId);
        $messageModel = model('Message');
        $message = $this->request->getPost();

        $etatMessage = $this->request->getPost('ETAT_MESSAGE');
        // si l'utilisateur a coché la case => ça existe et ça contient 'on'
        // si l'utilisateur n'a pas coché la case => ça n'existe pas (null)
        $message['ETAT_MESSAGE'] = isset($etatMessage) ? 1 : 0;
                
        
        $messageModel->save($message);

        return redirect('liste-message');
    }

    /**
     * Affiche le formulaire de modification d'un message
     *
     * @param int $messageId
     * @return string
    */
    public function modif($messageId): string
    {

        $admin = auth()->user();

        $messageModel = model('Message');
        $message = $messageModel->find($messageId);
        
        return view('view-message/modif-message', [
            'message' => $message,
            'admin' => $admin && $admin->inGroup('admin')

        ]);
    }

    /**
     * Enregistre la modification d'un message dans la base de données
     *
     * @return string
    */
    public function update()
    {
        $admin = auth()->user();

        $messageModel = model('Message');
        $message = $this->request->getPost();

        $etatMessage = $this->request->getPost('ETAT_MESSAGE');
        // si l'utilisateur a coché la case => ça existe et ça contient 'on'
        // si l'utilisateur n'a pas coché la case => ça n'existe pas (null)
        $message['ETAT_MESSAGE'] = isset($etatMessage) ? 1 : 0;

        $message = $messageModel->save($message);
        return redirect('liste-message',[
            'admin' => $admin && $admin->inGroup('admin')

        ]);
    }

    /**
     * Supprime un message de la base de données
     *
     * @param int $messageId
     * @return string
    */
    public function delete($message)
    {

        $admin = auth()->user();

        $messageModel = model('Message');
        $messageModel->delete($message);
        return redirect('liste-message',[
            'admin' => $admin && $admin->inGroup('admin')

        ]);
    }

}
