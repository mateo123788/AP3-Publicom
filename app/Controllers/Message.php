<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Client;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Model;

class Message extends BaseController
{

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



    public function ajout(): string
    {

        $admin = auth()->user();


        $clientModel = model('client');
        $listeClients = $clientModel->findAll();


        return view('view-message/ajout-message', [
            'listeClients' => $listeClients,
            'admin' => $admin && $admin->inGroup('admin')

        ]);
    }


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
