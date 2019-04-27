<?php
return [
    'class'=>'yii\web\UrlManager',
    'enablePrettyUrl'=>true,
    'showScriptName'=>false,
    'rules'=> [
        '<controller:\w+>/<action:[\w-]+>/<id:\d+>' => '<controller>/<action>',
        '<module:\w+>/<controller:\w+>/<id:\d+>' => '<module>/<controller>/<action>',
        '<api:\w+>/<controller:\w+>/<id:\d+>' => '<api>/<controller>',
    ]
];