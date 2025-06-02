<?php

namespace App\Models;

use CodeIgniter\Model;

class Panneau extends Model
{
    protected $table            = 'panneau';
    protected $primaryKey       = 'ID_PANNEAU';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'ID_CLIENT',
        'DISPONIBILITE',
        'MESSAGE',
        'GEOLOCALISATION'
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    // Méthode qui fait une requete qui permet de recuperer tous les panneaux en faisant une jointure avec la table client et la table message
    // et recupère les champs de la table client et message
    public function findJoinAll()
    {
        return $this
            ->select('client.NOM_COMMUNE, panneau.ID_PANNEAU,panneau.MESSAGE,panneau.GEOLOCALISATION,message.LIBELLE')
            ->join('client', 'panneau.ID_CLIENT = client.ID_CLIENT')
            ->join('message', 'panneau.ID_MESSAGE = message.ID_MESSAGE')
            ->findAll();
    }

    // Méthode qui fait une requete qui permet de recuperer tous les panneaux en faisant une jointure avec la table client en identifiant le panneau
    public function findJoinIdClient($panneauId)
    {
        return $this
            ->select('client.NOM_COMMUNE,panneau.GEOLOCALISATION,panneau.ID_PANNEAU')
            ->join('client', 'panneau.ID_CLIENT = client.ID_CLIENT')
            ->find($panneauId);
    }

    // Fonction qui permet supprimer idclient du panneau
    public function deletePanneau($ID_CLIENT)
    {
        $this->where('panneau.ID_CLIENT', $ID_CLIENT)
            ->delete();
    }
}
