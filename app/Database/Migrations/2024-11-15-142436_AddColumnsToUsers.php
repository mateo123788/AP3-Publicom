<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\Forge;

class AddColumnsToUsers extends Migration
{
    /**
     * @var string[]
     */
    private array $tables;

    public function __construct(?Forge $forge = null)
    {
        parent::__construct($forge);

        /** @var \Config\Auth $authConfig */
        $authConfig   = config('Auth');
        $this->tables = $authConfig->tables;
    }

    public function up()
    {
        $fields = [
            'ID_CLIENT' => ['type' => 'INT', 'null' => true],
        ];
        $this->forge->addColumn($this->tables['users'], $fields);
        $this->forge->addForeignKey('ID_CLIENT', 'client', 'ID_CLIENT', '', '', 'FK_ID_CLIENT');
    }

    public function down()
    {
        $fields = [
            'ID_CLIENT',
        ];
        $this->forge->dropForeignKey($this->tables['users'], 'FK_ID_CLIENT');
        $this->forge->dropColumn($this->tables['users'], $fields);
    }
}
