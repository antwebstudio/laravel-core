<?php

namespace Ant\Core\FormFields;

use TCG\Voyager\FormFields\AbstractHandler;

class StateField extends AbstractHandler
{
    protected $codename = 'state';

    public function createContent($row, $dataType, $dataTypeContent, $options)
    {
        return view('core::formfields.state', [
            'row' => $row,
            'options' => $options,
            'dataType' => $dataType,
            'dataTypeContent' => $dataTypeContent
        ]);
    }
}