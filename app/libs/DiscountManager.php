<?php
namespace App\Libs;

use App\Libs\DiscountRule\DiscountRuleAbstract;
use phpDocumentor\Reflection\Types\Null_;

class DiscountManager{
    protected array $_rules = [];
    public function addRule( string $rule): static
    {
            $this->_rules[] = $rule;
            return $this;
    }

    public function Calculate(Product $product, $currency = null): float{

        /**
         * @var DiscountRuleAbstract selectedRule
         */

        $selectedRule = null;
        foreach($this->_rules as $rule){
            /**
             * @var DiscountRuleAbstract $ruleClass
             */
            $testRule = new $rule($product);
            if($selectedRule == null){
                $selectedRule = $testRule;
            }else{
                if($selectedRule->calculate() <  $testRule->calculate()){
                    $selectedRule = $testRule;
                }
            }
        }
        return ($selectedRule == null)?0:$selectedRule->calculate();

    }
}
