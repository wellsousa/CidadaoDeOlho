
<?php
/*
 PARA CRIAR UM NOVO SEEDER UTLIZA O COMANDO:

    php artisan make:seed nomeSeeder

 PARA INJETAR DADOS NO BANCO USE O COMANDO:
 
    php artisan DB:seed
*/
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(PartidosSeeder::class);
        $this->call(DeputadosSeeder::class);
        $this->call(verbasIndenizatoriasSeeder::class);
    }
}
