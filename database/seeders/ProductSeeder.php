<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::insert([
            [
                "id" => 1,
                "name" => "MOLTING",
                "image" => "/storage/images/profile/629c359a857ef.jpg",
                "summary" => "udang tawar 1",
                "description" => "hallo guys welcome di ufang ungan hiya, hallo guys welcome di ufang ungan hiya, hallo guys welcome di ufang ungan hiya,hallo guys welcome di ufang ungan hiya",


            ],
            [
                "id" => 2,
                "name" => "fresh",
                "image" => "/storage/images/profile/629c35c4cfb4d.jpg",
                "summary" => "udang air laut",
                "description" => "hallo guys welcome di ufang ungan hiya, hallo guys welcome di ufang ungan hiya, hallo guys welcome di ufang ungan hiya,hallo guys welcome di ufang ungan hiya",


            ],
            [
                "id" => 3,
                "name" => "TRIPLE",
                "image" => "/storage/images/profile/629c3608883c1.jpg",
                "summary" => "Udang Triple",
                "description" => "hallo guys welcome di ufang ungan hiya, hallo guys welcome di ufang ungan hiya, hallo guys welcome di ufang ungan hiya,hallo guys welcome di ufang ungan hiyahallo guys welcome di ufang ungan hiya, hallo guys welcome di ufang ungan hiya, hallo guys welcome di ufang ungan hiya,hallo guys welcome di ufang ungan hiya",


            ],
            [
                "id" => 4,
                "name" => "HALLO",
                "image" => "/storage/images/profile/629c362251cb2.jpeg",
                "summary" => "Udang Merah",
                "description" => "hallo guys welcome di ufang ungan hiya, hallo guys welcome di ufang ungan hiya, hallo guys welcome di ufang ungan hiya,hallo guys welcome di ufang ungan hiya",


            ],
            [
                "id" => 5,
                "name" => "DIVOA",
                "image" => "/storage/images/profile/629c36424d0ad.jpg",
                "summary" => "BAUAYND GE",
                "description" => "hallo guys welcome di ufang ungan hiya, hallo guys welcome di ufang ungan hiya, hallo guys welcome di ufang ungan hiya,hallo guys welcome di ufang ungan hiya",


            ],
            [
                "id" => 6,
                "name" => "KECIL",
                "image" => "/storage/images/profile/629c36594d29b.png",
                "summary" => "UDANG AIR GEDE",
                "description" => "hallo guys welcome di ufang ungan hiya, hallo guys welcome di ufang ungan hiya, hallo guys welcome di ufang ungan hiya,hallo guys welcome di ufang ungan hiya",


            ],
            [
                "id" => 7,
                "name" => "LOBSTRER",
                "image" => "/storage/images/profile/629c366f08cec.jfif",
                "summary" => "LOBSTEREA",
                "description" => "hallo guys welcome di ufang ungan hiya, hallo guys welcome di ufang ungan hiya, hallo guys welcome di ufang ungan hiya,hallo guys welcome di ufang ungan hiya",


            ],
        ]);

        ProductDetail::insert([
            [
                "id" => 1,
                "product_id" => 1,
                "size" => 30,
                "price" => 30000.0,
                "stock" => 200,


            ],
            [
                "id" => 2,
                "product_id" => 1,
                "size" => 50,
                "price" => 40000.0,
                "stock" => 10,


            ],
            [
                "id" => 3,
                "product_id" => 1,
                "size" => 60,
                "price" => 90000.0,
                "stock" => 300,


            ],
            [
                "id" => 4,
                "product_id" => 2,
                "size" => 10,
                "price" => 40000.0,
                "stock" => 100,


            ],
            [
                "id" => 5,
                "product_id" => 2,
                "size" => 30,
                "price" => 50000.0,
                "stock" => 400,


            ],
            [
                "id" => 6,
                "product_id" => 2,
                "size" => 80,
                "price" => 60000.0,
                "stock" => 80,


            ],
            [
                "id" => 7,
                "product_id" => 3,
                "size" => 60,
                "price" => 70000.0,
                "stock" => 70,


            ],
            [
                "id" => 8,
                "product_id" => 3,
                "size" => 90,
                "price" => 100000.0,
                "stock" => 30,


            ],
            [
                "id" => 9,
                "product_id" => 3,
                "size" => 100,
                "price" => 90000.0,
                "stock" => 300,


            ],
            [
                "id" => 10,
                "product_id" => 4,
                "size" => 80,
                "price" => 70000.0,
                "stock" => 30,


            ],
            [
                "id" => 11,
                "product_id" => 4,
                "size" => 50,
                "price" => 40000.0,
                "stock" => 500,


            ],
            [
                "id" => 12,
                "product_id" => 4,
                "size" => 60,
                "price" => 60000.0,
                "stock" => 500,


            ],
            [
                "id" => 13,
                "product_id" => 5,
                "size" => 50,
                "price" => 70000.0,
                "stock" => 20,


            ],
            [
                "id" => 14,
                "product_id" => 5,
                "size" => 60,
                "price" => 80000.0,
                "stock" => 300,


            ],
            [
                "id" => 15,
                "product_id" => 5,
                "size" => 80,
                "price" => 90000.0,
                "stock" => 100,


            ],
            [
                "id" => 16,
                "product_id" => 6,
                "size" => 60,
                "price" => 80000.0,
                "stock" => 300,


            ],
            [
                "id" => 17,
                "product_id" => 6,
                "size" => 50,
                "price" => 40000.0,
                "stock" => 55,


            ],
            [
                "id" => 18,
                "product_id" => 6,
                "size" => 90,
                "price" => 110000.0,
                "stock" => 500,


            ],
            [
                "id" => 19,
                "product_id" => 7,
                "size" => 30,
                "price" => 50000.0,
                "stock" => 70,


            ],
            [
                "id" => 20,
                "product_id" => 7,
                "size" => 60,
                "price" => 70000.0,
                "stock" => 40,


            ],
            [
                "id" => 21,
                "product_id" => 7,
                "size" => 50,
                "price" => 80000.0,
                "stock" => 90,


            ],
        ]);
    }
}
