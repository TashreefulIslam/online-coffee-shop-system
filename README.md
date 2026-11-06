# Brew Haven - Online Coffee Shop Management System

Brew Haven is a Laravel 12-based online coffee shop management system for selling coffee and related products, handling customer orders, and managing the store from an admin panel. It includes public-facing pages, authentication, customer ordering workflows, and administrative tools for day-to-day shop operations.

## What This Project Does

This application provides a complete coffee shop experience:

- Visitors can browse featured coffees and the full menu.
- Registered customers can add products to a cart, place orders, and track order history.
- Customers can also manage their profile details and save favorite items in a wishlist.
- Admins can manage products, categories, orders, customers, and shop settings.

## What It Offers

Brew Haven is organized around two major experiences:

### Customer Experience

- Landing page with hero section, about section, featured coffees, testimonials, contact information, and footer.
- Authentication with register, login, logout, forgot password, and reset password.
- Coffee menu with category browsing and search.
- Product detail pages with description, price, rating, category, add-to-cart, and wishlist actions.
- Shopping cart with quantity management and item removal.
- Checkout flow with customer details and cash on delivery payment.
- Order history and order details pages.
- Profile management for updating name, email, phone, address, and password.

### Admin Experience

- Admin dashboard with sales and order statistics.
- Product CRUD.
- Category CRUD.
- Order management with status updates.
- Customer management.
- Website settings management for shop identity and contact details.

## Tech Stack

### Frontend

- HTML5
- CSS3
- Tailwind CSS via CDN
- JavaScript

### Backend

- PHP 8.2+
- Laravel 12

### Database

- MySQL

### Authentication

- Laravel Breeze

## Main Features

### Public Website

- Home page with coffee-themed branding
- Featured products section
- Why choose us section
- Testimonials section
- Contact section
- Footer with quick links and social links

### User Panel

- Dashboard-ready ordering workflow
- Browse products by category
- Search products by name
- Product details page
- Cart management
- Checkout and order placement
- Order tracking
- Wishlist support
- Profile editing

### Admin Panel

- Total products, orders, customers, and revenue overview
- Recent orders table
- Category management
- Product management
- Order status management
- Customer management
- Sales and revenue reporting fields
- Store settings management

## Roles

### Customer Role

Customers are regular users of the system. They can:

- Register and log in.
- Browse coffee products.
- Add items to the cart.
- Update item quantities or remove items.
- Checkout using cash on delivery.
- View their order history.
- Open order details.
- Update profile information.
- Save favorite products to a wishlist.

### Admin Role

Admins control the shop backend. They can:

- Access the admin dashboard.
- Create, edit, and delete product categories.
- Create, edit, and delete products.
- View all orders.
- Open order details.
- Change order status to pending, processing, completed, or cancelled.
- View customers and remove customer accounts if needed.
- Manage website settings such as shop name, phone, address, about text, and social links.

## Database Structure

The project uses the following core tables:

- `users` - stores customer and admin accounts
- `categories` - product categories such as hot coffee and cold coffee
- `products` - coffee items, desserts, and snacks
- `carts` - user cart records
- `cart_items` - products inside a cart
- `orders` - customer orders and status data
- `order_items` - products within an order
- `wishlists` - saved favorite products
- `settings` - shop configuration values

## How To Use

### 1. Install Dependencies

```bash
composer install
npm install
```

### 2. Configure Environment

Copy the example environment file if needed and update your database credentials in `.env`.

```bash
php artisan key:generate
```

Set these database values to match your MySQL setup:

- `DB_DATABASE=coffee_shop`
- `DB_USERNAME=root`
- `DB_PASSWORD=`

### 3. Run Migrations and Seed Data

```bash
php artisan migrate --force
php artisan db:seed
```

### 4. Build Frontend Assets

```bash
npm run build
```

### 5. Start the Application

```bash
php artisan serve
```

Then open the app in your browser at the local Laravel URL.

## Default Demo Accounts

The seeder creates sample accounts for testing:

- Admin: `admin@brewhaven.com` / `password`
- Customer: `customer@brewhaven.com` / `password`
- Customer: `jane@brewhaven.com` / `password`

## Notes

- Cash on delivery is implemented for the checkout flow.
- The project is structured so payment gateways such as SSLCommerz, bKash, and Nagad can be added later.
- Images are stored through Laravel's public storage disk.
- The admin area is protected by role-based access.

## License

This project is built for learning and demo purposes and follows the Laravel MIT licensing model for the framework components used here.
