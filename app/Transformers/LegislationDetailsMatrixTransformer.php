<?php

namespace App\Transformers;

use App\Models\LegislationDetailMatrix;
use App\Models\State;
use League\Fractal;

class LegislationDetailsMatrixTransformer extends Fractal\TransformerAbstract
{
    public static $_states = null;

    public function __construct()
    {
        if(self::$_states === null)
        {
            $states = State::all()->toArray();
            self::$_states = array_reduce($states, function($collector, $val)
            {
                $collector[$val['id']] = [
                    'state'=>$val['state'],
                    'state_abbr'=>$val['abbreviation']
                ];
                return $collector;
            }, []);
        }
    }

    public function transform(LegislationDetailMatrix $legislationDetailMatrix)
    {
        $tmp = $legislationDetailMatrix->toArray();
        $return = [
            'id'   =>$tmp['id'],
            's_o_l'  =>$tmp['source_of_law'],
            'b_c_a' =>$tmp['because_constitutional_amendment'],
            'b_s'  =>$tmp['because_statute'],
            'b_c_l' =>$tmp['because_case_law'],
            'b_e_o' =>$tmp['because_executive_order'],
            'c_s'   => $tmp['citation_source']
        ];
        return array_merge($return, self::$_states[$tmp['state_id']]);
    }

}