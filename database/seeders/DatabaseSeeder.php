<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\User;
use App\Models\Post;

use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // truncate stops the duplication of the models:

        // running seeds with truncate() will trigger a constraint violation if foreign key checks is not disabled.
        // so first, before truncate must disable foreign key and after truncat must enable back the foreign key, else
        // we will have an error like this: "Syntax error or access violation: 1701 Cannot truncate a table referenced in a foreign key constraint..."
        Schema::disableForeignKeyConstraints();
        User::truncate();
        Category::truncate();
        Post::truncate();
        Schema::enableForeignKeyConstraints();

        // this is for creating seeds with factory method-more efficient (just creating a post with factory,
        // will automatically create a user and a category too):

        $user = User::factory()->create([
            'name' => 'Admin Joe',
            'username' => 'AdminJoe',
            'email' => 'admin.joe@gmail.com',
            'password' => 'password'
        ]);

        Post::factory(15)->create([
            'user_id' => $user->id
        ]);



        // // this is for hardcoding seed:
        // $user = User::factory()->create();

        // $personal = Category::create([
        //     'name' => 'Personal',
        //     'slug' => 'personal'
        // ]);

        // $family = Category::create([
        //     'name' => 'Family',
        //     'slug' => 'family'
        // ]);

        // $work = Category::create([
        //     'name' => 'Work',
        //     'slug' => 'work'
        // ]);

        // Post::create([
        //     'user_id' => $user->id,
        //     'category_id'=> $family->id,
        //     'title'=> 'My family post',
        //     'slug' => 'my-family-post',
        //     'excerpt' => '<p>This is a lorem ipsum post for work</p>',
        //     'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ultrices odio orci, vel egestas ante tristique nec. Quisque erat nisl, malesuada ut aliquet quis, interdum ac nulla. Duis cursus massa in felis laoreet aliquam. Fusce ac orci sit amet nibh venenatis hendrerit quis vitae nisi. Suspendisse mollis mi massa, sed egestas tellus molestie sed. Nulla consectetur leo enim, in dapibus mauris efficitur eu. Quisque vitae velit orci. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>',

        // ]);

        // Post::create([
        //     'user_id' => $user->id,
        //     'category_id'=> $work->id,
        //     'title'=> 'My work post',
        //     'slug' => 'my-work-post',
        //     'excerpt' => '<p>This is a lorem ipsum post for work</p>',
        //     'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ultrices odio orci, vel egestas ante tristique nec. Quisque erat nisl, malesuada ut aliquet quis, interdum ac nulla. Duis cursus massa in felis laoreet aliquam. Fusce ac orci sit amet nibh venenatis hendrerit quis vitae nisi. Suspendisse mollis mi massa, sed egestas tellus molestie sed. Nulla consectetur leo enim, in dapibus mauris efficitur eu. Quisque vitae velit orci. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>',

        // ]);

    }
}
