<?php

namespace Processton\ProcesstonCurrency;
use Illuminate\Database\Eloquent\Collection;
use Processton\ProcesstonCurrency\Models\Currency;

class ProcesstonCurrency
{
    public static function getCountires(
        $with = []
    ) : Collection
    {
        if(empty($with)){
            return Currency::all();
        }else{
            return Currency::with($with)->get();
        }
       
    }


    public static function getCourrencies(
        $with = []
    ) : Collection
    {
        if(empty($with)){
            return Currency::all();
        }else{
            return Currency::with($with)->get();
        }
       
    }
}
