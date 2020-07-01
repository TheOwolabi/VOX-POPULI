<?php

namespace App\Traits;
use App\Models\Metier;

trait Metier_helpers
{

    public function setMetierId(Metier $metier)
    {
        $this->metier_id = $metier->id;
        $this->save();
    } 
}
