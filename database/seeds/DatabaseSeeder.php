<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Subcategory;
use App\Product;
use App\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
    Category::create([
    'name'=>'laptop',
    'slug'=>'laptop',
    'description'=>'laptop category',
    'image'=>'files/dell.jpeg',
    ]);
    Category::create([
    'name'=>'mobile phone',
    'slug'=>'mobile-phone',
    'description'=>'mobile phone category',
    'image'=>'files/oppo.jpeg',
   ]);
   Category::create([
    'name'=>'book',
    'slug'=>'book',
    'description'=>'book category',
    'image'=>'files/book2.jpeg',
   ]);
   Subcategory::create([
    'name'=>'dell pro',
    'category_id'=>1
  ]);
   Subcategory::create([
    'name'=>'hp pro',
    'category_id'=>1
  ]);
  Subcategory::create([
    'name'=>'0ppo s2',
    'category_id'=>2
  ]);
  Subcategory::create([
    'name'=>'oppo s3',
    'category_id'=>2
  ]);
  Subcategory::create([
    'name'=>'novel',
    'category_id'=>3
  ]);
  Product::create([
      'name'=>'HP Laptops',
      'image'=>'product/Laptop3.jpg',
      'price'=>rand(700,1000),
      'description'=>'This is the decsription of hp product',
      'additional_info'=>'This is additional info of hp',
      'category_id'=>rand(1,3),
      'subcategory_id'=>2
  ]);
  Product::create([
    'name'=>'DELL Laptops',
    'image'=>'product/lap1.jpg',
    'price'=>rand(800,1000),
    'description'=>'This is the decsription of dell product',
    'additional_info'=>'This is additional info of dell',
    'category_id'=>rand(1,3),
    'subcategory_id'=>1
]);
Product::create([
    'name'=>'mobile phones',
    'image'=>'product/iphone.jpeg',
    'price'=>rand(200,500),
    'description'=>'This is the decsription of iphone product',
    'additional_info'=>'This is additional info of iphone',
    'category_id'=>rand(1,3),
    'subcategory_id'=>rand(3,4)
]);
Product::create([
  'name'=>'books',
  'image'=>'product/book3.jpeg',
  'price'=>rand(20,50),
  'description'=>'This is the decsription of books product',
  'additional_info'=>'This is additional info of books',
  'category_id'=>rand(1,3),
  'subcategory_id'=>5
]);
User::create([
  'name'=>'laraAdmin',
  'email'=>'admin@gmail.com',
  'password'=>bcrypt('password123'),
  'email_verified_at'=>NOW(),
  'address'=>'Nairobi,Kenya',
  'phone_number'=>'0712688274',
  'is_admin'=>1

]);
    }
}
