<?php
namespace julien101\widget\tubular;

use yii\web\AssetBundle;

/**
 * @author Julien <julien.muller@gmail.com>
 */
class TubularAsset extends AssetBundle
{

	public $depends = [
		'yii\web\JqueryAsset'
	];
	/**
	 * @see \yii\web\AssetBundle::init()
	 */
	public function init()
	{
		$this->sourcePath = __DIR__.'/assets';
		$this->js = [
			'jquery.tubular.1.0'.( YII_ENV_DEV ? '.js' : '.min.js' )
		];
		return parent::init();
	}
}
