<?php

namespace Ant\Core\FormFields;

use TCG\Voyager\FormFields\AbstractHandler;

class WidgetField extends AbstractHandler
{
    protected $codename = 'widget';

    public function createContent($row, $dataType, $dataTypeContent, $options)
    {
        return view('core::formfields.widget', [
            'row' => $row,
            'options' => $options,
            'dataType' => $dataType,
            'dataTypeContent' => $dataTypeContent
        ]);
    }
}