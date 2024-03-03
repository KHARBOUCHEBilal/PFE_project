<?php

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

    'accepted' => ":attribute  doit être accepté.",
    'accepted_if' => "L' :attribute doit être accepté lorsque :autres vaut :valeur.",
    'active_url' => ":attribute n'est pas une URL valide.",
    'after' => 'Le :attribute doit être une date après :date.',
    'after_or_equal' => 'Le :attribute doit être une date postérieure ou égale à :date.',
    'alpha' => ":attribute ne doit contenir que des lettres.",
    'alpha_dash' => ":attribute ne doit contenir que des lettres, des chiffres, des tirets et des traits de soulignement.",
    'alpha_num' => ":attribute ne doit contenir que des lettres et des chiffres.",
    'array' => 'Le :attribute doit être un tableau.',
    'before' => 'Le :attribute doit être une date avant :date.',
    'before_or_equal' => 'Le :attribute doit être une date antérieure ou égale à :date.',
    'between' => [
        'array' => ":attribute  doit avoir entre : min et : max éléments.",
        'file' => 'Le :attribute doit être compris entre :min et :max kilo-octets.',
        'numeric' => 'Le :attribute doit être compris entre :min et :max.',
        'string' => 'Le :attribute doit être compris entre :min et :max caractères.',
    ],
    'boolean' => 'Le champ :attribute doit être vrai ou faux.',
    'confirmed' => 'La confirmation :attribute ne correspond pas.',
    'current_password' => 'Le mot de passe est incorrect.',
    'date' => ":attribute n'est pas une date valide.",
    'date_equals' => 'Le :attribute doit être une date égale à :date.',
    'date_format' => 'Le :attribute ne correspond pas au format :format.',
    'declined' => ":attribute doit être refusé.",
    'declined_if' => ":attribute  doit être refusé lorsque :autres vaut :valeur.",
    'different' => 'Le :attribute et :autre doivent être différents.',
    'digits' => 'Le :attribute doit être :chiffres chiffres.',
    'digits_between' => 'Le :attribute doit être compris entre :min et :max chiffres.',
    'dimensions' => ":attribute  a des dimensions d'image non valides.",
    'distinct' => 'Le champ :attribute a une valeur en double.',
    'doesnt_end_with' => "Le :attribute ne peut pas se terminer par l'un des éléments suivants : :values.",
    'doesnt_start_with' => "Le :attribute ne peut pas commencer par l'un des éléments suivants : :values.",
    'email' => ":attribute doit être une adresse e-mail valide.",
    'ends_with' => "Le :attribute doit se terminer par l'un des éléments suivants : :values.",
    'enum' => ":attribute sélectionné n'est pas valide.",
    'exists' => ":attribute sélectionné n'est pas valide.",
    'file' => 'Le :attribute doit être un fichier.',
    'filled' => 'Le champ :attribute doit avoir une valeur.',
    'gt' => [
        'array' => 'Le :attribute doit avoir plus de :éléments de valeur.',
        'file' => 'Le :attribute doit être supérieur à :valeur kilo-octets.',
        'numeric' => 'Le :attribute doit être supérieur à :valeur.',
        'string' => 'Le :attribute doit être supérieur à :valeur caractères.',
    ],
    'gte' => [
        'array' => 'Le :attribute doit avoir des éléments :valeur ou plus.',
        'file' => 'Le :attribute doit être supérieur ou égal à :valeur kilo-octets.',
        'numeric' => 'Le :attribute doit être supérieur ou égal à :valeur.',
        'string' => ":attribute  doit être supérieur ou égal aux caractères :valeur.",
    ],
    'image' => ":attribute doit être une image.",
    'in' => ":attribute sélectionné n'est pas valide.",
    'in_array' => "Le champ :attribute n'existe pas dans :autre.",
    'integer' => ":attribute doit être un entier.",
    'ip' => ":attribute doit être une adresse IP valide.",
    'ipv4' => ":attribute doit être une adresse IPv4 valide.",
    'ipv6' => ":attribute doit être une adresse IPv6 valide.",
    'json' => ":attribute doit être une chaîne JSON valide.",
    'lt' => [
        'array' => 'Le :attribute doit avoir moins de :value éléments.',
        'file' => 'Le :attribute doit être inférieur à :value kilo-octets.',
        'numeric' => 'Le :attribute doit être inférieur à :valeur.',
        'string' => 'Le :attribute doit être inférieur à :valeur caractères.',
    ],
    'lte' => [
        'array' => 'Le :attribute ne doit pas avoir plus de :éléments de valeur.',
        'file' => "Le :attribute doit être inférieur ou égal à :value kilo-octets.",
        'numeric' => 'Le :attribute doit être inférieur ou égal à :valeur.',
        'string' => 'Le :attribute doit être inférieur ou égal aux caractères :valeur.',
    ],
    'mac_address' => 'Le :attribute doit être une adresse MAC valide.',
    'max' => [
        'array' => 'Le :attribute ne doit pas avoir plus de :max éléments.',
        'file' => "L' :attribute ne doit pas être supérieur à :max kilo-octets.",
        'numeric' => 'Le :attribute ne doit pas être supérieur à :max.',
        'string' => 'Le :attribute ne doit pas être supérieur à :max caractères.',
    ],
    'mimes' => 'Le :attribute doit être un fichier de type : :valeurs.',
    'mimetypes' => 'Le :attribute doit être un fichier de type : :valeurs.',
    'min' => [
        'array' => 'Le :attribute doit avoir au moins :min éléments.',
        'file' => "L' :attribute doit être d'au moins :min kilo-octets.",
        'numeric' => 'Le :attribute doit être au moins :min.',
        'string' => 'Le :attribute doit contenir au moins :min caractères.',
    ],
    'multiple_of' => 'Le :attribute doit être un multiple de :valeur.',
    'not_in' => ":attribute sélectionné n'est pas valide.",
    'not_regex' => "Le format :attribute n'est pas valide.",
    'numeric' => 'Le :attribute doit être un nombre.',
    'password' => [
        'letters' => ":attribute doit contenir au moins une lettre.",
        'mixed' => ":attribute doit contenir au moins une lettre majuscule et une lettre minuscule.",
        'numbers' => ":attribute doit contenir au moins un nombre.",
        'symbols' => ":attribute doit contenir au moins un symbole.",
        'uncompromised' => ":attributedonné est apparu dans une fuite de données. Veuillez choisir un autre :attribute.",
    ],
    'present' => 'Le champ :attribute doit être présent.',
    'prohibited' => 'Le champ :attribute est interdit.',
    'prohibited_if' => 'Le champ :attribute est interdit lorsque :other vaut :valeurs.',
    'prohibited_unless' => 'Le champ :attribute est interdit sauf si :other est dans :values.',
    'prohibits' => 'Le champ :attribute interdit la présence de :other.',
    'regex' => "Le format :attribute n'est pas valide.",
    'required' => 'Le champ :attribute est obligatoire.',
    'required_array_keys' => 'Le champ :attribute doit contenir des entrées pour : :valeurs.',
    'required_if' => 'Le champ :attribute est obligatoire lorsque :other vaut :valeurs.',
    'required_unless' => 'Le champ :attribute est obligatoire sauf si :other est dans :valeurs.',
    'required_with' => 'Le champ :attribute est obligatoire lorsque :values ​​est présent.',
    'required_with_all' => 'Le champ :attribute est obligatoire lorsque :des valeurs sont présentes.',
    'required_without' => "Le champ :attribute est obligatoire lorsque :values ​​n'est pas présent.",
    'required_without_all' => "Le champ :attribute est obligatoire lorsqu'aucune des :valeurs n'est présente.",
    'same' => 'Le :attribute et :autre doivent correspondre.',
    'size' => [
        'array' => ":attribute  doit contenir des éléments :size.",
        'file' => 'Le :attribute doit être :size kilo-octets.',
        'numeric' => 'Le :attribute doit être :size.',
        'string' => ":attribute  doit contenir des caractères :size.",
    ],
    'starts_with' => "Le :attribute doit commencer par l'un des éléments suivants : :values.",
    'string' => 'Le :attribute doit être une chaîne.',
    'timezone' => ":attribute doit être un fuseau horaire valide.",
    'unique' => ":attribute a déjà été pris.",
    'uploaded' => "L':attribute n'a pas pu être téléchargé.",
    'url' => ":attribute doit être une URL valide.",
    'uuid' => ":attribute doit être un UUID valide.",

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
            'rule-name' => 'message personnalisé',
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
