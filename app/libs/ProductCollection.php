<?php

namespace App\libs;

use Illuminate\Support\Collection;

class ProductCollection extends Collection
{

    protected ?DiscountManager $_discountManager = null;



    public function setDiscountManager(DiscountManager $_discountManager): static
    {
        $this->_discountManager= $_discountManager;
        return $this;
    }


    public function applyDiscount(DiscountManager $discountManager): ProductCollection
    {
        return $this->map(function($product) use ($discountManager){
            $productArray = $product->toArray();
            $discount = null;
            if($discountManager != null){
                $discount =  $discountManager->Calculate($product);
            }

            $productArray['price']['final']  = ($discount == null)
                ?$productArray['price']['original']
                :(($productArray['price']['original']/100)*$discount);

            $productArray['price']['discount_percentage']  = ($discount == null)?null:$discount."%";
            return $productArray;

        });
    }


    public function sortBy($callback, $options = SORT_REGULAR, $descending = false): ProductCollection
    {
        if(is_string($callback)){
            return parent::sortBy(function ($product) use ($callback){
                if($callback == 'price'){
                    return $product->getPrice()->getAmount();
                }
                $methodName = "get".ucfirst($callback);
                return $product->$methodName();
            }, $options, $descending);
        }else{
            return parent::sortBy($callback, $options, $descending);
        }
    }

    public function categoryIs($categoryName): ProductCollection
    {
        return $this->filter(function ($product) use ($categoryName){
            return $categoryName == $product->getCategory();
        });
    }

    public function priceLessThan($price): ProductCollection
    {
        return $this->filter(function ($product) use ($price){
            return $price >= $product->getPrice()->getAmount();
        });
    }



}
