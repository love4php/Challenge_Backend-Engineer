<?php
namespace App\Libs\DiscountRule;
class DiscountByCategory extends DiscountRuleAbstract{

    public function calculate(): float
    {
        if($this->_product->getCategory() == 'boots'){
            return 30.0;
        }
        return 0.0;
    }

}
