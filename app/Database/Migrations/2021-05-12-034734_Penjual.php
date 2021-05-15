<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Penjual extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'nama'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'alamat' => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'kontak' => [
				'type'       => 'VARCHAR',
				'constraint' => '20',
			],
			'created_at' => [
				'type'       => 'DATETIME',
				'null' => TRUE
			],
			'updated_at' => [
				'type'       => 'DATETIME',
				'null' => TRUE
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('penjual');
	}

	public function down()
	{
		$this->forge->dropTable('penjual');
	}
}
