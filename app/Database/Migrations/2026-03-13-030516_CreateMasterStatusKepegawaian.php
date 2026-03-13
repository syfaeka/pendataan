<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMasterStatusKepegawaian extends Migration
{
    public function up(): void
    {
        $this->forge->addField([
            'id'   => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => false],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('status_kepegawaian');
    }

    public function down(): void
    {
        $this->forge->dropTable('status_kepegawaian');
    }
}
