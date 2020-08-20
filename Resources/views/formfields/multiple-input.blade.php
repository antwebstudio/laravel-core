@widget('multipleInput', [
	'name' => $row->field,
	'view' => isset($options->itemView) ? $options->itemView : '',
	'value' => is_array($dataTypeContent->{$row->field}) ? $dataTypeContent->{$row->field} : json_decode($dataTypeContent->{$row->field}, true),
	'attributes' => isset($options->itemAttributes) ? $options->itemAttributes : [],
])

@assets('current-page')
@stack('js')
@stack('css')