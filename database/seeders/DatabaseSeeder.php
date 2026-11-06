<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@brewhaven.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'phone' => '+1 (555) 123-4567',
            'address' => '123 Coffee Street, New York, NY 10001',
        ]);

        // Create test customers
        User::create([
            'name' => 'John Doe',
            'email' => 'customer@brewhaven.com',
            'password' => Hash::make('password'),
            'role' => 'customer',
            'phone' => '+1 (555) 234-5678',
            'address' => '456 Oak Avenue, Brooklyn, NY 11201',
        ]);

        User::create([
            'name' => 'Jane Smith',
            'email' => 'jane@brewhaven.com',
            'password' => Hash::make('password'),
            'role' => 'customer',
            'phone' => '+1 (555) 345-6789',
            'address' => '789 Main Street, Queens, NY 11354',
        ]);

        // Create categories
        $hotCoffee = Category::create([
            'name' => 'Hot Coffee',
            'description' => 'Delicious hot coffee beverages perfect for any time of day',
        ]);

        $coldCoffee = Category::create([
            'name' => 'Cold Coffee',
            'description' => 'Refreshing cold coffee drinks ideal for hot weather',
        ]);

        $desserts = Category::create([
            'name' => 'Desserts',
            'description' => 'Sweet treats to complement your coffee',
        ]);

        $snacks = Category::create([
            'name' => 'Snacks',
            'description' => 'Savory and sweet snacks',
        ]);

        // Create products for Hot Coffee
        Product::create([
            'category_id' => $hotCoffee->id,
            'name' => 'Espresso',
            'description' => 'A single shot of rich, concentrated espresso coffee. Bold and smooth.',
            'price' => 3.99,
            'stock' => 50,
            'rating' => 4.8,
            'sales_count' => 156,
        ]);

        Product::create([
            'category_id' => $hotCoffee->id,
            'name' => 'Cappuccino',
            'description' => 'Creamy cappuccino with perfectly steamed milk and a layer of foam.',
            'price' => 4.99,
            'stock' => 45,
            'rating' => 4.9,
            'sales_count' => 203,
        ]);

        Product::create([
            'category_id' => $hotCoffee->id,
            'name' => 'Latte',
            'description' => 'Smooth and creamy latte made with espresso and steamed milk.',
            'price' => 4.99,
            'stock' => 40,
            'rating' => 4.7,
            'sales_count' => 189,
        ]);

        Product::create([
            'category_id' => $hotCoffee->id,
            'name' => 'Americano',
            'description' => 'Strong and bold Americano with hot water and espresso shots.',
            'price' => 3.49,
            'stock' => 55,
            'rating' => 4.6,
            'sales_count' => 142,
        ]);

        Product::create([
            'category_id' => $hotCoffee->id,
            'name' => 'Mocha',
            'description' => 'Delicious mocha combining espresso, steamed milk, and chocolate.',
            'price' => 5.49,
            'stock' => 35,
            'rating' => 4.9,
            'sales_count' => 178,
        ]);

        Product::create([
            'category_id' => $hotCoffee->id,
            'name' => 'Macchiato',
            'description' => 'Espresso "marked" with a splash of steamed milk.',
            'price' => 4.49,
            'stock' => 42,
            'rating' => 4.7,
            'sales_count' => 128,
        ]);

        // Create products for Cold Coffee
        Product::create([
            'category_id' => $coldCoffee->id,
            'name' => 'Cold Brew',
            'description' => 'Smooth and refreshing cold brew coffee, less acidic than hot coffee.',
            'price' => 4.49,
            'stock' => 60,
            'rating' => 4.8,
            'sales_count' => 167,
        ]);

        Product::create([
            'category_id' => $coldCoffee->id,
            'name' => 'Iced Latte',
            'description' => 'Creamy iced latte with espresso and cold milk over ice.',
            'price' => 5.49,
            'stock' => 50,
            'rating' => 4.8,
            'sales_count' => 195,
        ]);

        Product::create([
            'category_id' => $coldCoffee->id,
            'name' => 'Iced Cappuccino',
            'description' => 'Refreshing iced cappuccino with foam and cold milk.',
            'price' => 5.49,
            'stock' => 48,
            'rating' => 4.7,
            'sales_count' => 156,
        ]);

        Product::create([
            'category_id' => $coldCoffee->id,
            'name' => 'Iced Mocha',
            'description' => 'Delicious iced mocha with espresso, milk, and chocolate.',
            'price' => 5.99,
            'stock' => 40,
            'rating' => 4.9,
            'sales_count' => 172,
        ]);

        // Create products for Desserts
        Product::create([
            'category_id' => $desserts->id,
            'name' => 'Chocolate Croissant',
            'description' => 'Buttery croissant filled with rich dark chocolate.',
            'price' => 3.99,
            'stock' => 30,
            'rating' => 4.8,
            'sales_count' => 98,
        ]);

        Product::create([
            'category_id' => $desserts->id,
            'name' => 'Vanilla Cheesecake',
            'description' => 'Creamy vanilla cheesecake with a graham cracker crust.',
            'price' => 6.99,
            'stock' => 25,
            'rating' => 4.9,
            'sales_count' => 87,
        ]);

        Product::create([
            'category_id' => $desserts->id,
            'name' => 'Tiramisu',
            'description' => 'Classic Italian tiramisu with mascarpone and cocoa.',
            'price' => 7.99,
            'stock' => 20,
            'rating' => 5.0,
            'sales_count' => 76,
        ]);

        // Create products for Snacks
        Product::create([
            'category_id' => $snacks->id,
            'name' => 'Bagel with Cream Cheese',
            'description' => 'Toasted bagel with creamy cream cheese spread.',
            'price' => 4.49,
            'stock' => 40,
            'rating' => 4.6,
            'sales_count' => 112,
        ]);

        Product::create([
            'category_id' => $snacks->id,
            'name' => 'Sandwich',
            'description' => 'Fresh sandwich with turkey, cheese, and vegetables.',
            'price' => 7.99,
            'stock' => 35,
            'rating' => 4.7,
            'sales_count' => 89,
        ]);

        Product::create([
            'category_id' => $snacks->id,
            'name' => 'Blueberry Muffin',
            'description' => 'Fresh blueberry muffin with a crispy top and moist interior.',
            'price' => 3.49,
            'stock' => 45,
            'rating' => 4.8,
            'sales_count' => 134,
        ]);

        // Create initial settings
        Setting::create(['key' => 'shop_name', 'value' => 'Brew Haven']);
        Setting::create(['key' => 'shop_email', 'value' => 'info@brewhaven.com']);
        Setting::create(['key' => 'shop_phone', 'value' => '+1 (212) 555-BREW']);
        Setting::create(['key' => 'shop_address', 'value' => '123 Coffee Street, New York, NY 10001']);
        Setting::create(['key' => 'about_us', 'value' => 'We serve freshly roasted coffee beans from around the world. Founded in 2023, Brew Haven has been committed to bringing the finest coffee experience to our community. Every cup is carefully crafted by our expert baristas using premium beans sourced directly from sustainable farms.']);
        Setting::create(['key' => 'facebook', 'value' => 'https://facebook.com/brewhaven']);
        Setting::create(['key' => 'twitter', 'value' => 'https://twitter.com/brewhaven']);
        Setting::create(['key' => 'instagram', 'value' => 'https://instagram.com/brewhaven']);
    }
}
