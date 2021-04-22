Step to build : 
1. composer install
2. set database config on .env file
3. hp artisan key:generate
4. php artisan migrate
5. generate dummy data :
    -> php artisan tinker
    -> Konsumen::factory()->count(10)->create()
    -> MasterBarang::factory()->count(40)->create()