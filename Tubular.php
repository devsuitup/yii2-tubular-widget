<?php
namespace julien101\widget\tubular;

use Yii;
use yii\base\Widget;
use yii\base\InvalidConfigException;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\JsExpression;

/**
 * This Tubular widget is a wrapper for the [jQuery Tubular Plugin]. http://www.seanmccambridge.com/tubular/
 * For documentation on the plugin option, please refer to [jquery-Tubular google code page](https://code.google.com/p/jquery-tubular/).
 *
 * @author Julien <julien.muller@gmail.com>
 *
 */
class Tubular extends Widget
{
	/**
	 * @var string JQuery selector to attach the Tubular widget to.
	 */
	public $selector = '.youtube_wrapper';
	public $youtubecode;
    public $onBefore;
	
	/**
	 * Validate initialisation properties.
	 * @see \yii\base\Object::init()
	 */
	public function init()
	{
		parent::init();

		if ( empty($this->youtubecode)) {
			throw new InvalidConfigException('The "youtubecode" property must be defined with a youtube video code.');
		}
	}
	/**
	 * @see \yii\base\Widget::run()
	 */
	public function run()
	{
		$this->registerClientScript();
	}

	/**
	 * Generate and register javascript to start the plugin
	 */
	public function registerClientScript()
	{
        $js=  '$("'.$this->selector.'")';
        $js.= '.tubular({videoId: \'' . $this->youtubecode .'\'});alert("mine!");';

        if (!is_null($this->onBefore)) {
            $js= 'if ('.$this->onBefore.') {'.$js.'}';
        }
		$view = $this->getView();
		TubularAsset::register($view);
		$view->registerJs($js);
	}
	
}
