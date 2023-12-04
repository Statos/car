<?php

use yii\db\Migration;

/**
 * Class m230602_033041__init
 */
class m230602_033041__init extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('client', [
            'id' => $this->primaryKey(),
            'last_name' => $this->string(255)->notNull(),
            'first_name' => $this->string(255)->notNull(),
            'patronymic' => $this->string(255)->notNull(),
            'passport' => $this->text()->defaultValue(null),
            'address' => $this->text()->defaultValue(null),
            'city' => $this->string(255)->defaultValue(null),
            'age' => $this->smallInteger()->defaultValue(null),
            'gender' => $this->string(1)->defaultValue(null)
        ]);
        $this->addColumn('client', 'fio',
            'VARCHAR(1024) GENERATED ALWAYS AS (CONCAT(last_name, " ", first_name, " ", patronymic)) VIRTUAL'
        );

        $this->createTable('employee', [
            'id' => $this->primaryKey(),
            'last_name' => $this->string(255)->notNull(),
            'first_name' => $this->string(255)->notNull(),
            'patronymic' => $this->string(255)->notNull(),
            'experience' => $this->smallInteger()->defaultValue(0),
            'salary' => $this->integer()->notNull(),
        ]);
        $this->addColumn('employee', 'fio',
            'VARCHAR(1024) GENERATED ALWAYS AS (CONCAT(last_name, " ", first_name, " ", patronymic)) VIRTUAL'
        );

        $this->createTable('brand', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'country' => $this->string(255)->notNull(),
            'factory' => $this->text()->defaultValue(null),
            'address' => $this->text()->defaultValue(null),
        ]);

        $this->createTable('car', [
            'id' => $this->primaryKey(),
            'brand_id' => $this->integer()->notNull(),
            'name' => $this->string(255)->notNull(),
            'year' => $this->smallInteger()->notNull(),
            'color' => $this->string(255)->defaultValue(null),
            'category' => $this->string(255)->defaultValue(null),
            'price' => $this->integer()->notNull(),
        ]);
        $this->addForeignKey('car_brand_id',
            'car', 'brand_id',
            'brand', 'id', 'RESTRICT', 'CASCADE'
        );

        $this->createTable('sales', [
            'id' => $this->primaryKey(),
            'car_id' => $this->integer()->notNull()->unique(),
            'client_id' => $this->integer()->notNull(),
            'employee_id' => $this->integer()->notNull(),
            'date' => $this->date()->notNull(),
        ]);
        $this->addForeignKey('sales_car_id',
            'sales', 'car_id',
            'car', 'id', 'RESTRICT', 'CASCADE'
        );
        $this->addForeignKey('sales_client_id',
            'sales', 'client_id',
            'client', 'id', 'RESTRICT', 'CASCADE'
        );
        $this->addForeignKey('sales_employee_id',
            'sales', 'employee_id',
            'employee', 'id', 'RESTRICT', 'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('sales');
        $this->dropTable('car');
        $this->dropTable('brand');
        $this->dropTable('employee');
        $this->dropTable('client');
    }

}
