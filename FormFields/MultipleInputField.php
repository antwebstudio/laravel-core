<?php

namespace Ant\Core\FormFields;

use TCG\Voyager\FormFields\AbstractHandler;

class MultipleInputField extends AbstractHandler
{
    protected $codename = 'multiple-input';

    public function createContent($row, $dataType, $dataTypeContent, $options)
    {
        return view('core::formfields.multiple-input', [
            'row' => $row,
            'options' => $options,
            'dataType' => $dataType,
            'dataTypeContent' => $dataTypeContent
        ]);
    }
}