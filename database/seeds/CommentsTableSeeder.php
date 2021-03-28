<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Comment;
use App\User;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker) {
       
        $users = User::all();

        foreach ($users as $user) {

                $title = $faker->text(10);

                $newComment = new Comment; //creazione dell'istanza dopo l'importazione del modello
    
                $newComment->user_id = $user->id;
               
                $newComment->body = $faker->paragraph();
                $newComment->title = $title;
                $newComment->slug= Str::slug($title, '-');
          
                $newComment->save(); //salvataggio dei dati
           
        }

     

    }        
}


