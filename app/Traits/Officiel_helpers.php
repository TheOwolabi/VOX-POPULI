<?php

namespace App\Traits;
use App\Models\Officiel;

trait Officiel_helpers
{

    public function state($t)
    {
        $officiels = Officiel::all();

        foreach ($officiels as $officiel)
        {
            if(($this->id == $officiel->user_id) & ($officiel->traker != $t ))
            {
                return "disabled";
            }
        }

           
        return "";
    }

    public function style($id,$t)
    {
        $officiels = Officiel::all();

        foreach ($officiels as $officiel)
        {
            if($officiel->traker == $t )
            {
                return "badge-warning";
            }

            if(($this->id == $officiel->user_id) & ($officiel->traker != $t ))
            {
                return "badge-secondary";
            }
        }
        
       
        return "border border-warning";
    }
    
}
