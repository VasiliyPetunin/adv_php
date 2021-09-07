<?php

class Page extends Model {
    protected static $table = 'pages';
    
    protected static function setProperties()
    {
        self::$properties['name'] = [
            'type' => 'varchar',
            'size' => 512
        ];

        self::$properties['url'] = [
            'type' => 'varchar',
            'size' => 512
        ];
    }
}