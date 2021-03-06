<?php
/**
 * Author: gzzhaoxi@gmail.com
 */

namespace cmscore\components;

use cmscore\assets\CaptchaAsset;
use yii\helpers\Json;

class Captcha extends \yii\captcha\Captcha
{
    public function registerClientScript()
    {
        $options = $this->getClientOptions();
        $options = empty($options) ? '' : Json::htmlEncode($options);
        $id = $this->imageOptions['id'];
        $view = $this->getView();
        CaptchaAsset::register($view);
        $view->registerJs("jQuery('#$id').yiiCaptcha($options);");
    }

}