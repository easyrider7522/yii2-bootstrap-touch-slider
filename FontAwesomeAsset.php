<?php
namespace easyrider7522\yii2btswidget;

use yii\web\AssetBundle;
use yii\helpers\FileHelper;


class FontAwesomeAsset extends AssetBundle
{
    public $sourcePath = '@vendor/fortawesome/font-awesome/';
    
	
    public $css = [
        // 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css',
        'css/font-awesome.min.css',
    ];
    
    
    public function init()
    {
        parent::init();
        
        $this->publishOptions[ 'beforeCopy' ] = function( $from, $to )
        {
            $ds = DIRECTORY_SEPARATOR;
            
            $sp = FileHelper::normalizePath( $this->sourcePath ) . $ds;
            
            $rp = str_replace( $sp, "", $from );
            
            if( !is_file( $from ))
            {
                switch( $rp )
                {
                    case 'css':
                    case 'fonts':
                        return true;
                }
            }
            else
            {
                if( $rp !== basename( $from ))                          // Exclude root folder files
                    return true;
            }
            
            return false;
        };
    }
}
