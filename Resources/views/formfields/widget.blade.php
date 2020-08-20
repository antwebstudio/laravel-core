@widget($options->widget, [
	'name' => $row->field,
	'value' => isset($options->decodeJson) && $options->decodeJson ? json_decode($dataTypeContent->{$row->field}, true) : $dataTypeContent->{$row->field},
])