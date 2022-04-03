<?php

namespace App\Console\Commands;

use App\Libs\DiscountManager;
use App\Libs\DiscountRule\DiscountByCategory;
use App\Libs\DiscountRule\DiscountBySKU;
use App\libs\ProductCollection;
use Illuminate\Console\Command;
use App\Libs\Price;
use App\Libs\Product;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

class ShopController extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'shop:index';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $productsArray = Storage::disk('local')
            ->exists('db.json') ? json_decode(Storage::disk('local')->get('db.json'), true)
            : [];

        $discounManager = new DiscountManager();
        $discounManager
            ->addRule(DiscountByCategory::class)
            ->addRule(DiscountBySKU::class)
        ;

        $collection = new ProductCollection();
        if(isset($productsArray['products'])){
            foreach ($productsArray['products'] as $pr){
                $product = new Product(
                    sku : $pr['sku'],
                    name : $pr['name'],
                    category: $pr['category'],
                    price : new Price($pr['price'],));
//                $product->setDiscountManager($discounManager);
                $collection->push($product);
            }
        }
//        var_dump($product->getDiscountedPrice());

        return 0;
    }
}
