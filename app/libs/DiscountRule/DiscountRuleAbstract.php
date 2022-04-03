<?php
namespace App\Libs\DiscountRule;

use App\Libs\Product;

abstract class DiscountRuleAbstract{

    public function __construct(
        protected Product $_product
    )
    {

    }

    abstract public function calculate() : float;
}
