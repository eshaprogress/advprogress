<?php

namespace App\Models;

use Konekt\Enum\Enum;

class SourceOfLawEnum extends Enum {

    CONST STATUTE = 'statute';
    CONST CONSTITUTIONAL_AMENDMENT = 'constitutional_amendment';
    CONST EXECUTIVE_ORDER = 'executive_order';
    CONST CASE_LAW = 'case_law';

}