<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Products1Migration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'=>[
                'type' => 'INT',
                'constraint' => 6,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'product_id'=>[
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'product'=>[
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'category'=>[
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'price'=>[
                'type' => 'INT',
            ],
            'sku'=>[
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'model'=>[
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
        ]);
        $this->forge->addKey('product_id', true);
        $this->forge->addForeignKey('category_id', 'category', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('products');
    }

    public function down()
    {
        $this->forge->dropTable('products');
    }
}
