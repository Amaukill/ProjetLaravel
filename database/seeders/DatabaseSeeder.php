<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        $roles = [
            ['name'=>'admin'],
            ['name'=>'user'],
        ];

        $users = [
            ['login' => 'amaukill', 'password'=>Hash::make('issou'), 'role_id'=>1],
            ['login' => 'loic', 'password'=>Hash::make('loic'), 'role_id'=>1],
            ['login' => 'Brice', 'password'=>Hash::make('apps'), 'role_id'=>2],
        ];

        $categories = [
            ['name' => 'Processeur', 'created_at' => '2021-11-10 21:06:55'],
            ['name' => 'Carte graphique', 'created_at' => '2021-11-10 21:06:55'],
            ['name' => 'Carte mère', 'created_at' => '2021-11-10 21:06:55'],
            ['name' => 'HDD', 'created_at' => '2021-11-10 21:06:55'],
            ['name' => 'SSD', 'created_at' => '2021-11-10 21:06:55'],
            ['name' => 'RAM', 'created_at' => '2021-11-10 21:06:55'],
        ];

        $articles = [
            ['name' => 'Ryzen 5 5600X', 'price' => '350', 'categorie_id' => '1', 'description'=> 'Le Ryzen 5 5600X est un processeur', 'created_at' => '2021-11-10 21:06:55'],
            ['name' => 'Ryzen 5 5800X', 'price' => '450', 'categorie_id' => '1', 'description'=> 'Le Ryzen 5 5800X est un processeur', 'created_at' => '2021-11-10 21:06:55'],
            ['name' => 'RTX 3070', 'price' => '800', 'categorie_id' => '2', 'description'=> 'La RTX 3070 est une carte graphique', 'created_at' => '2021-11-10 21:06:55'],
            ['name' => 'RTX 3080', 'price' => '1500', 'categorie_id' => '2', 'description'=> 'La RTX 3080 est une carte graphique', 'created_at' => '2021-11-10 21:06:55'],
            ['name' => 'GTX 730', 'price' => '2', 'categorie_id' => '2', 'description'=> 'La GTX 730 est une carte graphique', 'created_at' => '2021-11-10 21:06:55'],
            ['name' => 'MSI B450', 'price' => '100', 'categorie_id' => '3', 'description'=> 'La MSI B450 est une carte mère', 'created_at' => '2021-11-10 21:06:55'],
            ['name' => 'WD 1To', 'price' => '50€', 'categorie_id' => '4', 'description'=> 'Un disque dur Western Digital 1To', 'created_at' => '2021-11-10 21:06:55'],
            ['name' => 'Samsung 970 EVO ', 'price' => '100', 'categorie_id' => '5', 'description'=> 'Le Samsung 970 EVO est un SSD', 'created_at' => '2021-11-10 21:06:55'],
            ['name' => 'HyperX 2x16Go', 'price' => '120', 'categorie_id' => '6', 'description'=> '2x16Go de ram de la marque HyperX', 'created_at' => '2021-11-10 21:06:55'],
        ];

        $commentaires = [
            ['commentaire' => 'commentaire 1', 'note'=> '5','user_id'=>'1', 'article_id'=>'1', 'created_at' => '2021-11-10 21:06:55'],
            ['commentaire' => 'commentaire 2', 'note'=> '5', 'user_id'=>'2', 'article_id'=>'1', 'created_at' => '2021-11-10 21:06:55'],
        ];

        DB::table('roles')->insert($roles);
        DB::table('users')->insert($users);
        DB::table('categories')->insert($categories);
        DB::table('articles')->insert($articles);
        DB::table('commentaires')->insert($commentaires);
    }
}
