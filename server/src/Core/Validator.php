<?php 

/* 
    EXAMPLES 
    use App\Core\Validator;

    public function create($data)
    {
        $data = Validator::validate($data, [
            'name' => 'required|string|min:3|max:50',
            'price' => 'required|numeric',
            'email' => 'email'
        ]);

        return $this->repository->create($data);
    }

    Validator::validate($data, [
        'name' => 'required|min:3'
    ], [
        'name.required' => 'El nombre es obligatorio',
        'name.min' => 'Debe tener mínimo 3 caracteres'
    ]);

    // ===== REQUIRED =====
    // ===== STRING =====
    // ===== NUMERIC =====
    // ===== MIN =====
    // ===== MAX =====
    // ===== EMAIL =====
    // ===== BOOLEAN =====



    // ===== SANITIZACIÓN =====
            if (is_string($value)) {
                $value = trim($value);
            }

            // Cast automático
            if (in_array('numeric', $rulesArray) && is_numeric($value)) {
                $value = $value + 0;
            }

            $cleanData[$field] = $value;
        }

        if (!empty($errors)) {
            throw new HttpException(
                'Validation error',
                422,
                $errors
            );
        }

        return $cleanData;
*/

namespace App\Core;

class Validator {

    /* 
        $data = Validator::validate($data, [
            'name' => 'required|string|min:3|max:50',
            'price' => 'required|numeric',
            'email' => 'email'
        ]);

        Validator::validate($data, [
            'name' => 'required|min:3'
        ], [
            'name.required' => 'El nombre es obligatorio',
            'name.min' => 'Debe tener mínimo 3 caracteres'
        ]);
        
    */

    public static function validate(
        array $data,
        array $rules,
        array $messages = []
    ):void {
        
        $errors = [];
        $cleanData = [];


        //var_dump($data);
        //var_dump($rules);
        //var_dump($messages);

        foreach ($rules as $field => $rulesString) {
            echo "$field = $rulesString\n\n";
            //echo "value = $data[$field]\n\n";

            $rulesArray = explode("|", $rulesString);
            //var_dump($rulesArray);
            //echo "\n\n";

            if (!array_key_exists($field, $data) && !in_array("required", $rulesArray)) continue;


            if (in_array("required", $rulesArray)) self::validateRequired($field, $data[$field]);
            if (in_array("string", $rulesArray)) self::validateString($field);
            if (in_array("numeric", $rulesArray)) self::validateNumeric($field);
            if (in_array("boolean", $rulesArray)) self::validateBoolean($field);
            if (in_array("email", $rulesArray)) self::validateEmail($field);
            if (in_array("min:", $rulesArray)) self::validateMin($field);
            if (in_array("max:", $rulesArray)) self::validateMax($field);

        }
    }

    private static function validateRequired($field, $value) {
        //echo "HOLAAAAAA AMIGOOOO POR FAVOR AAAAA $field\n";
        echo "$field => $value";

        if ($value ) return;
    }

    private static function validateString($field) {
        
    }

    private static function validateNumeric($field) {
        
    }

    private static function validateBoolean($field) {
        
    }

    private static function validateEmail($field) {
        
    }

    private static function validateMin($field) {
        
    }

    private static function validateMax($field) {
        
    }
}