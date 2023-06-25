<?php
App::setLocale('hu');
return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */
    //Magyar nyelvű hibaüzenetek
    'accepted' => 'A(z) :attribute el kell legyen fogadva.',
    'accepted_if' => 'A(z) :attribute el kell legyen fogadva, ha a(z) :other értéke :value.',
    'active_url' => 'A(z) :attribute nem érvényes URL.',
    'after' => 'A(z) :attribute :date utáni dátum kell, hogy legyen.',
    'after_or_equal' => 'A(z) :attribute nem lehet korábbi dátum, mint :date.',
    'alpha' => 'A(z) :attribute kizárólag betűket tartalmazhat.',
    'alpha_dash' => 'A(z) :attribute kizárólag betűket, számokat és kötőjeleket tartalmazhat.',
    'alpha_num' => 'A(z) :attribute kizárólag betűket és számokat tartalmazhat.',
    'array' => 'A(z) :attribute egy tömb kell, hogy legyen.',
    'before' => 'A(z) :attribute :date előtti dátum kell, hogy legyen.',
    'before_or_equal' => 'A(z) :attribute nem lehet későbbi dátum, mint :date.',
    'between' => [
        'numeric' => 'A(z) :attribute :min - :max közötti szám kell, hogy legyen.',
        'file' => 'A(z) :attribute mérete :min és :max kilobájt között kell, hogy legyen.',
        'string' => 'A(z) :attribute hossza :min és :max karakter között kell, hogy legyen.',
        'array' => 'A(z) :attribute :min - :max közötti elemet kell, hogy tartalmazzon.',
    ],
    'boolean' => 'A(z) :attribute mező csak true vagy false értéket kaphat.',
    'confirmed' => 'A(z) :attribute nem egyezik a megerősítéssel.',
    'current_password' => 'A jelszó helytelen.',
    'date' => 'A(z) :attribute nem érvényes dátum.',
    'date_equals' => 'A(z) :attribute és :other egyező dátum kell, hogy legyen.',
    'date_format' => 'A(z) :attribute nem egyezik az alábbi dátum formátummal :format.',
    'declined' => 'A(z) :attribute el kell legyen utasítva.',
    'declined_if' => 'A(z) :attribute el kell legyen utasítva, ha a(z) :other értéke :value.',
    'different' => 'A(z) :attribute és :other értékei különbözőek kell, hogy legyenek.',
    'digits' => 'A(z) :attribute :digits számjegyű kell, hogy legyen.',
    'digits_between' => 'A(z) :attribute értéke :min és :max közötti számjegy lehet.',
    'dimensions' => 'A(z) :attribute felbontása nem megfelelő.',
    'distinct' => 'A(z) :attribute értékének egyedinek kell lennie.',
    'email' => 'A(z) :attribute érvényes email cím kell, hogy legyen.',
    'ends_with' => 'A(z) :attribute a következővel kell végződjön: :values.',
    'enum' => 'A kiválasztott :attribute érvénytelen.',
    'exists' => 'A(z) :attribute már létezik.',
    'file' => 'A(z) :attribute fájl kell, hogy legyen.',
    'filled' => 'A(z) atribute értékének megadása kötelező.',
    'gt' => [
        'numeric' => 'A(z) :attribute nagyobb kell, hogy legyen, mint :value.',
        'file' => 'A(z) :attribute mérete nagyobb kell, hogy legyen, mint :value kilobájt.',
        'string' => 'A(z) :attribute hosszabb kell, hogy legyen, mint :value karakter.',
        'array' => 'A(z) :attribute több, mint :value elemet kell, hogy tartalmazzon.',
    ],
    'gte' => [
        'numeric' => 'A(z) :attribute nagyobb vagy egyenlő kell, hogy legyen, mint :value.',
        'file' => 'A(z) :attribute mérete nagyobb vagy egyenlő kell, hogy legyen, mint :value kilobájt.',
        'string' => 'A(z) :attribute hosszabb vagy egyenlő kell, hogy legyen, mint :value karakter.',
        'array' => 'A(z) :attribute legalább :value elemet kell, hogy tartalmazzon.',
    ],
    'image' => 'A(z) :attribute képfájl kell, hogy legyen.',
    'in' => 'A kiválasztott :attribute érvénytelen.',
    'in_array' => 'A(z) :attribute mező nem szerepel :other -ben.',
    'integer' => 'A(z) :attribute típusa integer kell, hogy legyen.',
    'ip' => 'A(z) :attribute érvényes IP cím kell, hogy legyen.',
    'ipv4' => 'A(z) :attribute érvényes IPv4 cím kell, hogy legyen.',
    'ipv6' => 'A(z) :attribute érvényes IPv6 cím kell, hogy legyen.',
    'json' => 'A(z) :attribute érvényes JSON szöveg kell, hogy legyen.',
    'lt' => [
        'numeric' => 'A(z) :attribute kisebb kell, hogy legyen, mint :value.',
        'file' => 'A(z) :attribute mérete kisebb kell, hogy legyen, mint :value kilobájt.',
        'string' => 'A(z) :attribute rövidebb kell, hogy legyen, mint :value karakter.',
        'array' => 'A(z) :attribute kevesebb, mint :value elemet kell, hogy tartalmazzon.',
    ],
    'lte' => [
        'numeric' => 'A(z) :attribute kisebb vagy egyenlő kell, hogy legyen, mint :value.',
        'file' => 'A(z) :attribute mérete kisebb vagy egyenlő kell, hogy legyen, mint :value kilobájt.',
        'string' => 'A(z) :attribute rövidebb vagy egyenlő kell, hogy legyen, mint :value karakter.',
        'array' => 'A(z) :attribute legfeljebb :value elemet kell, hogy tartalmazzon.',
    ],
    'mac_address' => 'A(z) :attribute érvényes MAC cím kell, hogy legyen.',
    'max' => [
        'numeric' => 'A(z) :attribute nem lehet nagyobb, mint :max.',
        'file' => 'A(z) :attribute mérete nem lehet nagyobb, mint :max kilobájt.',
        'string' => 'A(z) :attribute hossza nem lehet több, mint :max karakter.',
        'array' => 'A(z) :attribute legfeljebb :max elemet tartalmazhat.',
    ],
    'mimes' => 'A(z) :attribute kizárólag az alábbi fájlformátumok egyike lehet: :values.',
    'mimetypes' => 'A(z) :attribute kizárólag az alábbi fájlformátumok egyike lehet: :values.',
    'min' => [
        'numeric' => 'A(z) :attribute legalább :min kell, hogy legyen.',
        'file' => 'A(z) :attribute mérete legalább :min kilobájt kell, hogy legyen.',
        'string' => 'A(z) :attribute hossza legalább :min karakter kell, hogy legyen.',
        'array' => 'A(z) :attribute legalább :min elemet kell, hogy tartalmazzon.',
    ],
    'multiple_of' => 'A(z) :attribute értékének többszöröse kell, hogy legyen a következőnek: :value',
    'not_in' => 'A(z) kiválasztott :attribute érvénytelen.',
    'not_regex' => 'A(z) :attribute formátuma érvénytelen.',
    'numeric' => 'A(z) :attribute szám kell, hogy legyen.',
    'password' => 'A jelszó helytelen.',
    'present' => 'A(z) :attribute mező nem található.',
    'prohibited' => 'A(z) :attribute mező tiltott.',
    'prohibited_if' => 'A(z) :attribute mező tiltott, ha :other értéke :value.',
    'prohibited_unless' => 'A(z) :attribute mező tiltott, ha :other értéke nem :values.',
    'prohibits' => 'The :attribute field prohibits :other from being present.',
    'regex' => 'A(z) :attribute formátuma érvénytelen.',
    'required' => 'A(z) :attribute megadása kötelező.',
    'required_array_keys' => 'A :attribute tömbnek tartalmaznia kell a következő értékeket: :keys',
    'required_if' => 'A(z) :attribute megadása kötelező, ha :other értéke :value.',
    'required_unless' => 'A(z) :attribute megadása kötelező, ha :other értéke nem :values.',
    'required_with' => 'A(z) :attribute megadása kötelező, ha :values értéke meg van adva.',
    'required_with_all' => 'A(z) :attribute megadása kötelező, ha :values értéke meg van adva.',
    'required_without' => 'A(z) :attribute megadása kötelező, ha :values értéke nincs megadva.',
    'required_without_all' => 'A(z) :attribute megadása kötelező, ha egyik :values érték sem került megadásra.',
    'same' => 'A(z) :attribute és :other mezőknek egyezniük kell.',
    'size' => [
        'numeric' => 'A(z) :attribute :size méretű kell, hogy legyen.',
        'file' => 'A(z) :attribute mérete :size kilobájt kell, hogy legyen.',
        'string' => 'A(z) :attribute hossza :size karakter kell, hogy legyen.',
        'array' => 'A(z) :attribute :size elemet kell tartalmazzon.',
    ],
    'starts_with' => 'A(z) :attribute a következővel kell, hogy kezdődjön: :values',
    'string' => 'A(z) :attribute karakterláncnak kell, hogy legyen.',
    'timezone' => 'A(z) :attribute nem létező időzona.',
    'unique' => 'A(z) :attribute már foglalt.',
    'uploaded' => 'A(z) :attribute feltöltése sikertelen.',
    'url' => 'A(z) :attribute érvénytelen link.',
    'uuid' => 'A(z) :attribute érvényes UUID-nak kell, hogy legyen.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
