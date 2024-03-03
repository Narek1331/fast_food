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
    'wrong_password' => 'Սխալ գաղտնաբառ',
    'verified_email' => 'Ձեր էլփոստի հասցեն պետք է հաստատվի:',
    'custom_phone_number_validation' => 'Հեռախոսահամարը պետք է լինի +374{որևէ 8 համար} կամ 0{ցանկացած 8 համար} ձևաչափով:',
    'accepted' => 'Ընդունված պետք է լինի :attribute դաշտը։',
    'accepted_if' => 'Ընդունված պետք է լինի :attribute դաշտը, երբ :other-ը :value է։',
    'active_url' => ':attribute դաշտը պետք է լինի վավեր URL։',
    'after' => ':attribute դաշտը պետք է լինի ամսաթիվը :date-ից հետո։',
    'after_or_equal' => ':attribute դաշտը պետք է լինի ամսաթիվը :date կամ հավասար։',
    'alpha' => ':attribute դաշտը պետք է պարունակի միայն տառեր։',
    'alpha_dash' => ':attribute դաշտը պետք է պարունակի միայն տառեր, թվեր, գծեր և գծիկներ։',
    'alpha_num' => ':attribute դաշտը պետք է պարունակի միայն տառեր և թվեր։',
    'array' => ':attribute դաշտը պետք է լինի զանգված։',
    'ascii' => ':attribute դաշտը պետք է պարունակի միայն մեկբառային ASCII նիշեր և նշաններ։',
    'before' => ':attribute դաշտը պետք է լինի ամսաթիվը :date-ից առաջ։',
    'before_or_equal' => ':attribute դաշտը պետք է լինի ամսաթիվը :date կամ նրանից հավասար։',
    'between' => [
        'array' => ':attribute դաշտը պետք է ունենա միջակայք :min-ից :max տարր։',
        'file' => ':attribute դաշտը պետք է լինի :min-ից :max կիլոբայթ։',
        'numeric' => ':attribute դաշտը պետք է լինի :min-ից :max թիվ։',
        'string' => ':attribute դաշտը պետք է լինի :min-ից :max նիշ։',
    ],
    'boolean' => ':attribute դաշտը պետք է լինի true կամ false։',
    'can' => ':attribute դաշտը պարտադիր է։',
    'confirmed' => ':attribute դաշտի հաստատումը չի համապատասխանում։',
    'current_password' => 'Գաղտնաբառը սխալ է։',
    'date' => ':attribute դաշտը պետք է լինի վավեր ամսաթիվ։',
    'date_equals' => ':attribute դաշտը պետք է լինի :date-ին հավասար ամսաթիվ։',
    'date_format' => ':attribute դաշտը չի համապատասխանում :format ձևաչափին։',
    'decimal' => ':attribute դաշտը պետք է ունենա :decimal ստորակետ։',
    'declined' => ':attribute դաշտը պետք է հրաժարված լինի։',
    'declined_if' => 'Երբ :other-ը :value է, :attribute դաշտը պետք է հրաժարված լինի։',
    'different' => ':attribute դաշտը և :other պետք են տարբեր լինել։',
    'digits' => ':attribute դաշտը պետք է լինի :digits թիվ։',
    'digits_between' => ':attribute դաշտը պետք է լինի :min-ից :max թվեր։',
    'dimensions' => ':attribute դաշտը սխալ պահանջված չէ պատկերի չափերով։',
    'distinct' => ':attribute դաշտը ունի կրկնօրինակ արժեք։',
    'doesnt_end_with' => ':attribute դաշտը չի վերջակետվում :values-ից մեկով։',
    'doesnt_start_with' => ':attribute դաշտը չի սկսվում :values-ից մեկով։',
    'email' => ':attribute դաշտը պետք է լինի վավեր էլ․ հասցե։',
    'ends_with' => ':attribute դաշտը պետք է վերջվի մեկովը :values-ից։',
    'enum' => 'Ընտրված :attribute-ը անվավեր է։',
    'exists' => 'Ընտրված :attribute-ը անվավեր է։',
    'extensions' => ':attribute դաշտը պետք է ունենա հետևյալ տեսակի ֆայլերի ընդլայնումները։',
    'file' => ':attribute դաշտը պետք է լինի ֆայլ։',
    'filled' => ':attribute դաշտը պետք է ունենա արժեք։',
    'gt' => [
        'array' => ':attribute դաշտը պետք է ունենա ավելի քան :value տարր։',
        'file' => ':attribute դաշտը պետք է լինի :value կիլոբայթից մեծ։',
        'numeric' => ':attribute դաշտը պետք է լինի :value-ից մեծ։',
        'string' => ':attribute դաշտը պետք է լինի :value նիշերից մեծ։',
    ],
    'gte' => [
        'array' => ':attribute դաշտը պետք է ունենա :value տարր կամ ավել համար։',
        'file' => ':attribute դաշտը պետք է լինի :value կիլոբայթից կամ հավասար։',
        'numeric' => ':attribute դաշտը պետք է լինի :value-ից մեծ կամ հավասար։',
        'string' => ':attribute դաշտը պետք է լինի :value նիշերից մեծ կամ հավասար։',
    ],
    'hex_color' => ':attribute դաշտը պետք է լինի վավեր հեքսադեցիմալ գույն։',
    'image' => ':attribute դաշտը պետք է լինի պատկեր։',
    'in' => 'Ընտրված :attribute-ը անվավեր է։',
    'in_array' => ':attribute դաշտը պետք է լինի :other-ում։',
    'integer' => ':attribute դաշտը պետք է լինի ամբողջ թիվ։',
    'ip' => ':attribute դաշտը պետք է լինի վավեր IP հասցե։',
    'ipv4' => ':attribute դաշտը պետք է լինի վավեր IPv4 հասցե։',
    'ipv6' => ':attribute դաշտը պետք է լինի վավեր IPv6 հասցե։',
    'json' => ':attribute դաշտը պետք է լինի վավեր JSON տող։',
    'lowercase' => ':attribute դաշտը պետք է լինի փոքրատառերով։',
    'lt' => [
        'array' => ':attribute դաշտը պետք է ունենա պակաս :value տարրից։',
        'file' => ':attribute դաշտը պետք է լինի :value կիլոբայթից փոքր։',
        'numeric' => ':attribute դաշտը պետք է լինի :value-ից փոքր։',
        'string' => ':attribute դաշտը պետք է լինի :value նիշերից փոքր։',
    ],
    'lte' => [
        'array' => ':attribute դաշտը չի կարող ունենա :value-ից ավել տարրեր։',
        'file' => ':attribute դաշտը պետք է լինի :value կիլոբայթից փոքր կամ հավասար։',
        'numeric' => ':attribute դաշտը պետք է լինի փոքր կամ հավասար :value-ին։',
        'string' => ':attribute դաշտը պետք է լինի փոքր կամ հավասար :value նիշերին:',
    ],
    'mac_address' => 'Տվյալ :attribute դաշտը պետք է լինի վավեր MAC հասցե։',
    'max' => [
        'array' => 'Տվյալ :attribute դաշտը չպետք է ունենա ավելի քան :max տարր։',
        'file' => 'Տվյալ :attribute դաշտը չպետք է լինի մեծ քան :max կիլոբայթ։',
        'numeric' => 'Տվյալ :attribute դաշտը չպետք է լինի մեծ քան :max։',
        'string' => 'Տվյալ :attribute դաշտը չպետք է լինի ավելի քան :max նիշ։',
    ],
    'max_digits' => 'Տվյալ :attribute դաշտը չպետք է ունենա ավելի քան :max թվանշան։',
    'mimes' => 'Տվյալ :attribute դաշտը պետք է լինի տեսակի ֆայլ: :values։',
    'mimetypes' => 'Տվյալ :attribute դաշտը պետք է լինի տեսակի ֆայլ: :values։',
    'min' => [
        'array' => 'Տվյալ :attribute դաշտը պետք է ունենա առնչվածներ առավելագույնը :min։',
        'file' => 'Տվյալ :attribute դաշտը պետք է լինի առնչվածը :min կիլոբայթ։',
        'numeric' => 'Տվյալ :attribute դաշտը պետք է լինի առնչվածը :min։',
        'string' => 'Տվյալ :attribute դաշտը պետք է լինի առնչվածը :min նիշ։',
    ],
    'min_digits' => 'Տվյալ :attribute դաշտը պետք է ունենա առնչվածը :min թվանշան։',
    'missing' => 'Տվյալ :attribute դաշտը պետք է բացասական լինի։',
    'missing_if' => 'Տվյալ :attribute դաշտը պետք է բացասական լինի, երբ :other-ը :value է։',
    'missing_unless' => 'Տվյալ :attribute դաշտը պետք է բացասական լինի, մինչև :other-ը :value է։',
    'missing_with' => 'Տվյալ :attribute դաշտը պետք է բացասական լինի, երբ :values համար առկա է։',
    'missing_with_all' => 'Նշված :attribute դաշտը պետք է բացակայի, երբ :values-ները հաստատված են։',
    'multiple_of' => ':attribute դաշտը պետք է լինի :value-ի բազմապատկեր։',
    'not_in' => 'Ընտրված :attribute-ն անվավեր է։',
    'not_regex' => ':attribute դաշտի ձևաչափը սխալ է։',
    'numeric' => ':attribute դաշտը պետք է լինի թիվ։',
    'password' => [
        'letters' => ':attribute դաշտը պետք է պարունակի առնվազն մեկ տառ։',
        'mixed' => ':attribute դաշտը պետք է պարունակի առնվազն մեկ մեծատառ և մեկ փոքրատառ։',
        'numbers' => ':attribute դաշտը պետք է պարունակի առնվազն մեկ թիվ։',
        'symbols' => ':attribute դաշտը պետք է պարունակի առնվազն մեկ նշան։',
        'uncompromised' => 'Տրված :attribute-ը առաջացել է տվյալների ձեւմաներում։ Խնդրում ենք ընտրել այլ :attribute։',
    ],
    'present' => ':attribute դաշտը պետք է լինի առկացված։',
    'present_if' => ':attribute դաշտը պետք է լինի առկացված, երբ :other-ը :value է։',
    'present_unless' => ':attribute դաշտը պետք է լինի առկացված, եթե :other-ը :value չէ։',
    'present_with' => ':values-ն առկա էր, պետք է :attribute դաշտը լինի առկացված։',
    'present_with_all' => ':values-ները առկա են, պետք է :attribute դաշտը լինի առկացված։',
    'prohibited' => ':attribute դաշտը արգելված է։',
    'prohibited_if' => ':other-ը :value է, :attribute դաշտը արգելված է։',
    'prohibited_unless' => ':other-ը պետք է լինի :values-ի մեջ, :attribute դաշտը արգելված է։',
    'prohibits' => ':attribute դաշտը արգելում է :other-ը առկա լինելուց։',
    'regex' => ':attribute դաշտի ձևաչափը սխալ է։',
    'required' => ':attribute դաշտը պարտադիր է։',
    'required_array_keys' => ':attribute դաշտը պարտադիր է պարտադիր մուտքագրել :values-ի համար։',
    'required_if' => ':other-ը :value է, :attribute դաշտը պարտադիր է։',
    'required_if_accepted' => ':other-ը ընդունված է, :attribute դաշտը պարտադիր է։',
    'required_unless' => ':other-ը :values-ի մեջ չէ, :attribute դաշտը պարտադիր է։',
    'required_with' => ':values-ը առկա է, :attribute դաշտը պարտադիր է։',
    'required_with_all' => ':values-ները առկա են, :attribute դաշտը պարտադիր է։',
    'required_without' => ':values-ը առկա չէ, :attribute դաշտը պարտադիր է։',
    'required_without_all' => ':values-ները չկան, :attribute դաշտը պարտադիր է։',
    'same' => ':attribute դաշտը պետք է համապատասխանի :other-ից։',
    'size' => [
        'array' => ':attribute դաշտը պետք է պարունակի :size տարր։',
        'file' => ':attribute դաշտը պետք է լինի :size կիլոբայթ։',
        'numeric' => ':attribute դաշտը պետք է լինի :size։',
        'string' => ':attribute դաշտը պետք է լինի :size նիշ։',
    ],
    'starts_with' => ':attribute դաշտը պետք է սկսվի հետևյալից մեկով՝ :values։',
    'string' => ':attribute դաշտը պետք է լինի տեքստ։',
    'timezone' => ':attribute դաշտը պետք է լինի վավեր ժամային գումար։',
    'unique' => ':attribute-ը արդեն զբաղված է։',
    'uploaded' => ':attribute-ը վերբեռնված չէ։',
    'uppercase' => ':attribute դաշտը պետք է լինի վերջին գործածության մեծատառ։',
    'url' => ':attribute դաշտը պետք է լինի վավեր URL։',
    'ulid' => ':attribute դաշտը պետք է լինի վավեր ULID։',
    'uuid' => ':attribute դաշտը պետք է լինի վավեր UUID։',


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
