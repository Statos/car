<?php


class m230616_043225__init_roles extends \app\components\db\PermissionMigration
{
    public $add = [
        [
            'admin',
            ['/admin/*', '/user/*', '/car/*', '/brand/*', '/client/*', '/employee/*', '/sales/*']
        ],
    ];
}
