<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## About Ecommerce Online Shop

Laravel Ecommerce Online Shop Website

- [Product, Category, Slider, Coupon, Customer, Dashboard]
- For Online Shop Ecommerce website, requirements are

## Learning Laravel, Tailwin css, Bootstrap, Livewire (Laravel Framework)
For Frontend design template , 
                              HTML, CSS, Bootstrap, Tailwind css use.

## Learning Laravel, Tailwin css, Bootstrap, Livewire (Laravel Framework)
For Frontend design template , 
                              HTML, CSS, Bootstrap, Tailwind css use.

For Backend ,
             Laravel, Livewire

## Project Setup Requirements for this project

- "php": "^8.1"
- "laravel/framework": "^10.10" (v10.19.0)
-  "livewire/livewire": "*"(v2.12.6)
  
<p align="center">
    <a href="https://laravel.com"><img alt="Laravel v10.x" src="https://img.shields.io/badge/Laravel-v10.x-FF2D20?style=for-the-badge&logo=laravel"></a>
    <a href="https://filamentadmin.com/docs/2.x/admin/installation">
        <img alt="FILAMENT 8.x" src="https://img.shields.io/badge/FILAMENT-2.x-EBB304?style=for-the-badge">
    </a>
    <a href="https://php.net"><img alt="PHP 8.2" src="https://img.shields.io/badge/PHP-8.1-777BB4?style=for-the-badge&logo=php"></a>
</p>
## Requirements

The following tools are required in order to start the installation and run the project locally.
-   PHP 8.1
-   [Composer](https://getcomposer.org/download/)
## Installation
### Using Sail
> Make sure you have [Sail](https://laravel.com/docs/10.x/sail) installed.
1. Clone this repo
    ```sh
    git clone https://github.com/compass-mobility/uma-oshi-backend.git
    ```
2. Go into the project root directory
    ```sh
    cd uma-oshi-backend
    ```
3. Copy .env.example file to .env file
    ```sh
    cp .env.example .env
    ```
4. Install PHP dependencies
    ```sh
    composer install --ignore-platform-reqs
    ```
5. Boot Sail
    ```sh
    sail up -d
    ```
6. Generate app key
    ```sh
    sail php artisan key:generate
    ```
7. Install NPM dependencies
    ```sh
    sail npm install
    ```
8. Database migration
    ```sh
    sail artisan migrate:fresh --seed
    ```
### Including Plugins
10. Filament Shield
    ```sh
    sail artisan shield:install
    ```
### Before you push to gitHub
11. Run
    ```sh
    sail .vendor/bin/pint
    ```




