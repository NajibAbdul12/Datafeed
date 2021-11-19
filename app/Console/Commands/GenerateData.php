<?php

namespace App\Console\Commands;
use Storage;
use App\Models\Category;
use App\Models\Product;
use Str;

use Illuminate\Console\Command;

class GenerateData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:datafeed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

            
            $file = storage_path('app/data.csv'); 

            $datafile = file($file);
            $datafile = fopen($file, "r");
                while ( ($data = fgetcsv ( $datafile, 2000, ',' )) !== FALSE ) {
                    if($data [0] != 'PartModelLink' ){

                    $category = Category::firstOrCreate([
                        'name' => $data[12],
                        'slug' => Str::of($data[12])->slug('-')
                    ]);

                    $image = Str::of($data[26])->explode('|');

                    $product = Product::firstOrCreate([
                        'webName' => $data [17],
                        'category_id' => $category->id,
                        'slug' => Str::of($data[17])->slug('-'),
                        'brand' => $data [11],
                        'colour' => $data [18],
                        'retailPriceGBP' => $data [6],
                        'retailPriceEUR' => $data [7],
                        'sellPriceGBP' => $data [8],
                        'sellPriceEUR' => $data [9],
                        'fullDescription' => $data [5],
                        'description' => $data [4],
                        'visibleToCustomer' => $data [24],                     
                        'imagePath' => $image[0],
                        'weight' => $data [22],
                        'vatRate' => $data [10],
                        'barCode' => $data [3],
        
                    ]);
                }
                }
            fclose ( $datafile );

            return (202);

        return Command::SUCCESS;
    }
}
