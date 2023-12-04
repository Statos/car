<?php

use yii\db\Migration;

/**
 * Class m231204_041314__init_data
 */
class m231204_041314__init_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $brand = array(
            array(
                "id" => 1,
                "name" => "BMW",
                "country" => "Германия",
                "factory" => "Немецкий завод автомобилей",
                "address" => "Берлин, Гуга 1",
            ),
            array(
                "id" => 2,
                "name" => "Mercedes-Benz",
                "country" => "Германия",
                "factory" => "Mercedes-Benz Group",
                "address" => "Германия: Штутгарт",
            ),
            array(
                "id" => 3,
                "name" => "Toyota",
                "country" => "Япония",
                "factory" => "Toyota Motor Corporation",
                "address" => "Япония: Тоёта, Айти",
            ),
            array(
                "id" => 4,
                "name" => "Ford",
                "country" => "США",
                "factory" => "Ford Motor Company, «Форд мотор компани»",
                "address" => "США: Дирборн (Мичиган)",
            ),
            array(
                "id" => 5,
                "name" => "АвтоВАЗ",
                "country" => "Россия",
                "factory" => "Волжский автомобильный завод",
                "address" => "Россия: Тольятти",
            ),
        );
        foreach ($brand as $b) {
            $this->insert('brand', $b);
        }

        $car = array(
            array(
                "id" => 1,
                "brand_id" => 1,
                "name" => "M3",
                "year" => 1994,
                "color" => "Красный",
                "category" => "Кабриолет",
                "price" => 5200000,
            ),
            array(
                "id" => 2,
                "brand_id" => 1,
                "name" => "M3",
                "year" => 1995,
                "color" => "Синий",
                "category" => "Седан",
                "price" => 3150000,
            ),
            array(
                "id" => 3,
                "brand_id" => 1,
                "name" => "X6",
                "year" => 2009,
                "color" => "Черный",
                "category" => "Кроссовер",
                "price" => 4800000,
            ),
            array(
                "id" => 4,
                "brand_id" => 5,
                "name" => "2106",
                "year" => 2001,
                "color" => "Бежевый",
                "category" => "Седан",
                "price" => 560000,
            ),
            array(
                "id" => 5,
                "brand_id" => 5,
                "name" => "Lada Granta",
                "year" => 2015,
                "color" => "Белый",
                "category" => "Седан",
                "price" => 699000,
            ),
        );

        foreach ($car as $b) {
            $this->insert('car', $b);
        }

        $client = array(
            array(
                "id" => 1,
                "last_name" => "Иванов",
                "first_name" => "Иван",
                "patronymic" => "Иванович",
                "passport" => "УВД Красноярска",
                "address" => "Мира 89, кв 12",
                "city" => "Красноярск",
                "age" => 22,
                "gender" => "М",
            ),
            array(
                "id" => 2,
                "last_name" => "Петров",
                "first_name" => "Петр",
                "patronymic" => "Петрович",
                "passport" => "УВД Ачинска",
                "address" => "Ачинск Кладовая 15, кв 1",
                "city" => "Ачинск",
                "age" => 45,
                "gender" => "М",
            ),
            array(
                "id" => 3,
                "last_name" => "Лонова",
                "first_name" => "Елена",
                "patronymic" => "Петровна",
                "passport" => "УВД Москвы",
                "address" => "Красноярск, Ленина 15 кв 92",
                "city" => "Красноярск",
                "age" => 28,
                "gender" => "Ж",
            ),
        );
        foreach ($client as $b) {
            $this->insert('client', $b);
        }

        $employee = array(
            array(
                "id" => 1,
                "last_name" => "Равин",
                "first_name" => "Виктор",
                "patronymic" => "Павлович",
                "experience" => 2,
                "salary" => 50000,
                "fio" => "Равин Виктор Павлович",
            ),
            array(
                "id" => 2,
                "last_name" => "Киселев",
                "first_name" => "Слава",
                "patronymic" => "Львов",
                "experience" => 20,
                "salary" => 100000,
                "fio" => "Киселев Слава Львов",
            ),
        );
        foreach ($employee as $b) {
            $this->insert('employee', $b);
        }

        $sales = array(
            array(
                "id" => 1,
                "car_id" => 1,
                "client_id" => 1,
                "employee_id" => 1,
                "date" => "2023-12-04",
            ),
            array(
                "id" => 2,
                "car_id" => 5,
                "client_id" => 2,
                "employee_id" => 2,
                "date" => "2023-12-06",
            ),
            array(
                "id" => 3,
                "car_id" => 3,
                "client_id" => 3,
                "employee_id" => 2,
                "date" => "2023-12-13",
            ),
        );
        foreach ($sales as $b) {
            $this->insert('sales', $b);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->truncateTable('sales');
        $this->truncateTable('employee');
        $this->truncateTable('client');
        $this->truncateTable('car');
        $this->truncateTable('brand');
    }

}
