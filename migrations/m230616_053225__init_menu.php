<?php


class m230616_053225__init_menu extends \app\components\db\PermissionMigration
{

    public $menu = [
        ['Администрирование', null, null, 1],
        ['Пользователи', 'Администрирование', '/user/index', 5],
        ['Роли и права', 'Администрирование', '/admin/default/index', 10],

        ['Салон', null, null, 2],
        ['Марки', 'Салон', '/brand/index', null],
        ['Автомобили', 'Салон', '/car/index', null],
        ['Сотрудники', null, '/employee/index', 3],
        ['Продажи', null, null, 4],
        ['Клиенты', 'Продажи', '/client/index', 5],
        ['Продажи', 'Продажи', '/sales/index', 10],
    ];

    public function safeUp()
    {
        foreach ($this->menu as $menu) {
            if ($menu[2]) {
                $this->createOrGetPermission($menu[2], $menu[2]);
            }

            $parentId = null;
            if ($menu[1]) {
                $parentId = (new \yii\db\Query())
                    ->from('menu')
                    ->andWhere(['name' => $menu[1]])
                    ->select('id')
                    ->scalar();
            }

            $this->insert('menu', [
                'name' => $menu[0],
                'parent' => $parentId,
                'route' => $menu[2],
                'order' => $menu[3],
            ]);
        }
    }

    public function safeDown()
    {
        $this->delete('menu');
    }
}
