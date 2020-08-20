<?php
namespace Ant\Core\Helpers;

class Json {
	public static function encode($value, $options = 320)
    {
        $expressions = [];
        $value = static::processData($value, $expressions, uniqid('', true));
		
        $json = json_encode($value, $options);

        return $expressions === [] ? $json : strtr($json, $expressions);
    }
	
	protected static function processData($data, &$expressions, $expPrefix)
    {
        if (is_object($data)) {
            if ($data instanceof JsExpression) {
                $token = "!{[$expPrefix=" . count($expressions) . ']}!';
                $expressions['"' . $token . '"'] = $data->expression;

                return $token;
            }
			
			$result = [];
			foreach ($data as $name => $value) {
				$result[$name] = $value;
			}
			$data = $result;

            if ($data === []) {
                return new \stdClass();
            }
        }

        if (is_array($data)) {
            foreach ($data as $key => $value) {
                if (is_array($value) || is_object($value)) {
                    $data[$key] = static::processData($value, $expressions, $expPrefix);
                }
            }
        }

        return $data;
    }
}