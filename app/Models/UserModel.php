<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Shield\Models\UserModel as ShieldUserModel;

class UserModel extends ShieldUserModel
{
    protected function initialize(): void
    {
        parent::initialize();

        $this->allowedFields = [
            ...$this->allowedFields,
            'ID_CLIENT',
            // 'first_name',
        ];
    }

    // public function getAllByIdClient($ID_CLIENT) //pour index utilisateur
    // {
    //     return $this->select('client.NOM_COMMUNE, auth_identities.secret AS user_mail, users.id, users.ID_CLIENT')
    //         ->join('auth_identities', 'users.id = auth_identities.user_id')
    //         ->join('auth_groups_users', 'users.id = auth_groups_users.user_id AND auth_groups_users.group <> "admin"')
    //         ->join('client', 'users.ID_CLIENT = client.ID_CLIENT')
    //         ->where('users.ID_CLIENT', $ID_CLIENT)
    //         ->findAll();
    // }

    // Méthode qui permet de supprimer l'authentification d'un utilisateur en fonction de l'id de l'utilisateur
    public function deleteAuthIdentities($idUser)
    {
        $db = \Config\Database::Connect(); // Connexion à la base de données
        $builder = $db->table('auth_identities'); // Création d'un builder pour la table auth_identities
        $builder->where('auth_identities.user_id', $idUser); // Requete pour l'id de l'utilisateur
        $builder->delete(); // Suppression 
    }

    // Méthode qui permet de supprimer les permissions d'un utilisateur en fonction de l'id de l'utilisateur
    public function deleteAuthPermissionsUsers($idUser)
    {
        $db = \Config\Database::Connect();
        $builder = $db->table('auth_permissions_users');
        $builder->where('auth_permissions_users.user_id', $idUser);
        $builder->delete();
    }

    // Méthode qui permet de supprimer les groupes d'un utilisateur en fonction de l'id de l'utilisateur
    public function deleteAuthGroupsUsers($idUser)
    {
        $db = \Config\Database::Connect();
        $builder = $db->table('auth_groups_users');
        $builder->where('auth_groups_users.user_id', $idUser);
        $builder->delete();
    }

    // Méthode qui permet de supprimer les tokens d'un utilisateur en fonction de l'id de l'utilisateur
    public function deleteAuthRememberTokens($idUser)
    {
        $db = \Config\Database::Connect();
        $builder = $db->table('auth_remember_tokens');
        $builder->where('auth_remember_tokens.user_id', $idUser);
        $builder->delete();
    }

    // Méthode qui permet de supprimer les utilisateurs en fonction de l'id du client
    public function deleteUsers($ID_CLIENT)
    {
        $db = \Config\Database::Connect();
        $builder = $db->table('users');
        $builder->where('users.ID_CLIENT', $ID_CLIENT);
        $builder->delete();
    }
}
