<?php
namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class CalendarAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
    	'design/fullcalendar/lib/main.css',
    ];
    public $js = [
	    'design/fullcalendar/lib/main.js',
	    'design/fullcalendar/lib/locales/pt-br.js',
		'design/moment.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}