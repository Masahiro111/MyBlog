<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Role;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // ロール名の初期設定
        $role1 = Role::query()->create([
            'name' => 'user',
        ]);
        $role2 = Role::query()->create([
            'name' => 'author',
        ]);
        $role3 = Role::query()->create([
            'name' => 'admin',
        ]);

        // タグ名の初期設定
        $tag1 = Tag::query()->create([
            'name' => 'php',
        ]);
        $tag2 = Tag::query()->create([
            'name' => 'c++',
        ]);
        $tag3 = Tag::query()->create([
            'name' => 'ruby',
        ]);
        // カテゴリ名の初期設定
        $category = Category::create([
            'name' => 'Education',
            'slug' => 'education'
        ]);
        // ユーザー情報の登録
        $user = $role2->users()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'status' => 1,
        ]);
        // 記事情報の登録
        $post = $user->posts()->create([
            'title' => 'This is title',
            'slug' => 'This is slug',
            'excerpt' => 'This is excerpt',
            'body' => 'This is content',
            'category_id' => 1,
        ]);

        $post->comments()->create([
            'the_comment' => '1st subaru',
            'user_id' => $user->id,
        ]);

        $post->comments()->create([
            'the_comment' => '2st subaru',
            'user_id' => $user->id,
        ]);

        $post->image()->create([
            'name' => 'random file',
            'extension' => 'jpg',
            'path' => '/image/random_file.jpg',
        ]);

        // タグと記事のリレーション設定
        $post->tags()->attach([
            $tag1->id, $tag2->id, $tag3->id
        ]);
    }
}
