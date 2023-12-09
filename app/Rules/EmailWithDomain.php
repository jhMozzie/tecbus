<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class EmailWithDomain
{
    protected $domain;

    public function __construct($domain)
    {
        $this->domain = $domain;
    }

    public function passes($attribute, $value)
    {
        return strpos($value, '@' . $this->domain) !== false;
    }

    public function message()
    {
        return 'El campo :attribute debe ser una dirección de correo electrónico válida con el dominio ' . $this->domain;
    }

    public function getDomain()
    {
        return $this->domain;
    }
}
