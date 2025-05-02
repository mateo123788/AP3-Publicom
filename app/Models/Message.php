<?php

namespace App\Models;

use CodeIgniter\Model;

class Message extends Model
{
    protected $table            = 'message';
    protected $primaryKey       = 'ID_MESSAGE';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['ID_CLIENT', 'LIBELLE', 'ETAT_MESSAGE', 'COULEUR'];

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

    public function findJoinAll()
    {
        return $this
            ->select(
                '
        message.ID_CLIENT,
        message.ID_MESSAGE,
        message.LIBELLE,
        message.ETAT_MESSAGE,
        message.COULEUR,
        client.NOM_COMMUNE,
        client.ID_CLIENT,
        client.NOM_RESPONSABLE,
        client.DESCRIPTION'
            )
            ->join('client', 'message.ID_CLIENT=client.ID_CLIENT')
            ->findAll();
    }

    // Fonction qui permet supprimer idclient du message
    public function deleteMessage($ID_CLIENT)
    {
        $this->where('message.ID_CLIENT', $ID_CLIENT)
            ->delete();
    }
}
