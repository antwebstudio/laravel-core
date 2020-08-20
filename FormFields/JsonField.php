<?php

namespace Ant\Core\FormFields;

use TCG\Voyager\FormFields\AbstractHandler;

class JsonField extends AbstractHandler
{
    protected $codename = 'json';

    public function createContent($row, $dataType, $dataTypeContent, $options)
    {
        return view('core::formfields.json', [
            'row' => $row,
            'options' => $options,
            'dataType' => $dataType,
            'dataTypeContent' => $dataTypeContent
        ]);
    }
}