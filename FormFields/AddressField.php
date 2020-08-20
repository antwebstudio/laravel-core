<?php

namespace Ant\Core\FormFields;

use TCG\Voyager\FormFields\AbstractHandler;

class AddressField extends AbstractHandler
{
    protected $codename = 'address';

    public function createContent($row, $dataType, $dataTypeContent, $options)
    {
        return view('core::formfields.address', [
            'row' => $row,
            'options' => $options,
            'dataType' => $dataType,
            'dataTypeContent' => $dataTypeContent
        ]);
    }
}