<?php
namespace App\Libs;

class Product{


    public function __construct(protected array $properties = [])
    {
        if(isset($this->properties['price']) && is_numeric($this->properties['price'])){
            $this->properties['price'] = new Price($this->properties['price']);
        }
    }

    /**
     *
     * @throws \Exception
     */
    function __call(string $name, array $arguments)
    {
        if(str_starts_with($name, 'get')){
            $property_name = lcfirst(substr($name, 3));
            if(in_array( $property_name, array_keys($this->properties))){
                return $this->properties[$property_name];
            }
        }
        throw  new \Exception('Call to undefined method '.self::class."::".$name );
    }


    /**
     * @throws \Exception
     */
    public function toArray(): array
    {
        $result = [];
        foreach ($this->properties as $key => $property){
            if(is_object($property)){
                if (method_exists($property, 'toArray')){
                    $result[$key] = $property->toArray();
                }else{
                    throw new \Exception('dont exists "toArray" method in '.get_class($property));
                }
            }else{
                $result[$key] = $property;
            }
        }
        return $result;
    }

}
