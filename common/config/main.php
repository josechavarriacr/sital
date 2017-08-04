<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],

    'modules' => [//add by Scott
        'gridview' => [
            'class' => '\kartik\grid\Module'
        // enter optional module parameters below - only if you need to  
        // use your own export download action or custom translation 
        // message source
        //'downloadAction' => 'gridview/export/download',
        // 'i18n' => []
        ],
        ],
        
    'components'=>[
    	'user'=>[
    		'identityClass'=>'common\models\User',
    		'enableAutoLogin'=>true,
    	   ],

        'response' => [
            'formatters' => [
                'pdf' => [
                    'class' => 'robregonm\pdf\PdfResponseFormatter',
                    'mode' => '', // Optional
                    'format' => 'A4',  // Optional but recommended. http://mpdf1.com/manual/index.php?tid=184
                    'defaultFontSize' => 0, // Optional
                    'defaultFont' => '', // Optional
                    'marginLeft' => 15, // Optional
                    'marginRight' => 15, // Optional
                    'marginTop' => 16, // Optional
                    'marginBottom' => 16, // Optional
                    'marginHeader' => 9, // Optional
                    'marginFooter' => 9, // Optional
                    'orientation' => 'Landscape', // optional. This value will be ignored if format is a string value.
                    'options' => [
                        // mPDF Variables
                        // 'fontdata' => [
                            // ... some fonts. http://mpdf1.com/manual/index.php?tid=454
                        // ]
                    ]
                ],
            ]
        ],

        'authManager'=>[
        	'class'=>'yii\rbac\DbManager',
        		'ruleTable' => 'AuthRule', // Optional
            	'itemTable' => 'AuthItem',  // Optional
            	'itemChildTable' => 'AuthItemChild',  // Optional
            	'assignmentTable' => 'AuthAssignment',  // Optional
        	],
        ],
];
