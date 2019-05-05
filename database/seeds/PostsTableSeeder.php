<?php

use App\Post;
use App\Category;
use App\Tag;
use App\User;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category_1 = Category::create([
            'name' => 'Business',
            'content' => 'Some info about the category'
        ]);
        $category_2 = Category::create([
            'name' => 'Finance',
            'content' => 'Some info about the category'
        ]);
        $category_3 = Category::create([
            'name' => 'Politics',
            'content' => 'Some info about the category'
        ]);
        $category_4 = Category::create([
            'name' => 'Technology',
            'content' => 'Some info about the category'
        ]);
        $category_5 = Category::create([
            'name' => 'Fashion',
            'content' => 'Some info about the category'
        ]);
        $category_6 = Category::create([
            'name' => 'Learning',
            'content' => 'Some info about the category'
        ]);
        $category_7 = Category::create([
            'name' => 'Lifestyle',
            'content' => 'Some info about the category'
        ]);
        $category_8 = Category::create([
            'name' => 'Health',
            'content' => 'Some info about the category'
        ]);
        $category_9 = Category::create([
            'name' => 'Travel',
            'content' => 'Some info about the category'
        ]);
        $category_10 = Category::create([
            'name' => 'Sport',
            'content' => 'Some info about the category'
        ]);

        $author_1 = User::create([
            'name' => 'John Smith',
            'email' => 'jsmith@fake.com',
            'password' => Hash::make('password'),
            'role' => 'writer',
            'superadmin' => 0
        ]);

        $author_2 = User::create([
            'name' => 'Robert E. Lee',
            'email' => 'rlee@fake.com',
            'password' => Hash::make('password'),
            'role' => 'writer',
            'superadmin' => 0
        ]);

        $author_3 = User::create([
            'name' => 'Andrew Miller',
            'email' => 'amiller@fake.com',
            'password' => Hash::make('password'),
            'role' => 'writer',
            'superadmin' => 0
        ]);

        $author_4 = User::create([
            'name' => 'Kaddy Steve',
            'email' => 'ksteve@fake.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'superadmin' => 0
        ]);

        $author_5 = User::create([
            'name' => 'Dembe Raymond',
            'email' => 'draymond@fake.com',
            'password' => Hash::make('password'),
            'role' => 'writer',
            'superadmin' => 0
        ]);




        $post_1 = $author_5->posts()->create([
            'title' => 'APC adopts Gbajabiamila as Speaker',

            'category_id' => $category_3->id,

            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',

            'content' => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable.', 

            'slug' => 'APC_adopts_Gbajabiamila_as_Speaker',
            
            'image_link' => 'storage/posts/post-1.jpg'
        ]);

        $post_2 = $author_2->posts()->create([
            'title' => 'NBA: Lou Williams, Clippers shock Warriors',

            'category_id' => $category_1->id,

            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',

            'content' => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable.',  
            
            'slug' => 'APC_adopts_Gbajabiamila_as_Speaker',
            
            'image_link' => 'storage/posts/post-2.jpg'
        ]);

        $post_3 = $author_3->posts()->create([
            'title' => 'World Bank chief unopposed for 2nd term',

            'category_id' => $category_2->id,

            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',

            'content' => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable.',

            'slug' => 'APC_adopts_Gbajabiamila_as_Speaker',
            
            'image_link' => 'storage/posts/post-3.jpg'
        ]);

        $post_4 = $author_5->posts()->create([
            'title' => 'Video: Biden for US President, says America’s core values at stake',

            'category_id' => $category_6->id,

            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',

            'content' => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable.', 

            'slug' => 'APC_adopts_Gbajabiamila_as_Speaker',
            
            'image_link' => 'storage/posts/post-4.jpg'
        ]);

        $post_5 = $author_1->posts()->create([
            'title' => 'Buhari to dissolve cabinet May 22 – Lai Mohammed',

            'category_id' => $category_8->id,

            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',

            'content' => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable.',  

            'slug' => 'APC_adopts_Gbajabiamila_as_Speaker',
            
            'image_link' => 'storage/posts/post-5.jpg'
        ]);

        $post_6 = $author_4->posts()->create([
            'title' => 'NNPC shifts 40 billion oil reserves target to 2025',

            'category_id' => $category_10->id,

            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',

            'content' => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable.',  
            
            'slug' => 'APC_adopts_Gbajabiamila_as_Speaker',
            
            'image_link' => 'storage/posts/post-6.jpg'
        ]);

        $post_7 = $author_5->posts()->create([
            'title' => 'CBN issues 5 new banking licences',

            'category_id' => $category_5->id,

            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',

            'content' => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable.',

            'slug' => 'APC_adopts_Gbajabiamila_as_Speaker',
            
            'image_link' => 'storage/posts/post-7.jpg'
        ]);

        $post_8 = $author_3->posts()->create([
            'title' => 'FEC approves N9.2bn for model schools, roads, HIV/AIDs control',

            'category_id' => $category_3->id,

            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',

            'content' => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable.', 

            'slug' => 'APC_adopts_Gbajabiamila_as_Speaker',
            
            'image_link' => 'storage/posts/post-8.jpg'
        ]);

        $post_9 = $author_1->posts()->create([
            'title' => '19 firms shut, 250,000 jobs threatened by WEMPCO crisis',

            'category_id' => $category_1->id,

            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',

            'content' => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable.',  

            'slug' => 'APC_adopts_Gbajabiamila_as_Speaker',
            
            'image_link' => 'storage/posts/post-9.jpg'
        ]);

        $post_10 = $author_3->posts()->create([
            'title' => 'Man United fail to qualify for Champions League',

            'category_id' => $category_10->id,

            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',

            'content' => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable.', 

            'slug' => 'APC_adopts_Gbajabiamila_as_Speaker',
            
            'image_link' => 'storage/posts/post-10.jpg'
        ]);

        $tag_1 = Tag::create([
            'tag' => 'nigeria'
        ]);
        $tag_2 = Tag::create([
            'tag' => 'buhari'
        ]);
        $tag_3 = Tag::create([
            'tag' => 'atiku'
        ]);
        $tag_4 = Tag::create([
            'tag' => 'tinubu'
        ]);
        $tag_5 = Tag::create([
            'tag' => 'usa'
        ]);
        $tag_6 = Tag::create([
            'tag' => 'africa'
        ]);
        $tag_7 = Tag::create([
            'tag' => 'lagos'
        ]);
        $tag_8 = Tag::create([
            'tag' => 'food'
        ]);
        $tag_9 = Tag::create([
            'tag' => 'vitamins'
        ]);
        $tag_10 = Tag::create([
            'tag' => 'soccer'
        ]);

        $post_1->tags()->attach([$tag_1->id, $tag_10->id, $tag_5->id, $tag_2->id]);

        $post_2->tags()->attach([$tag_9->id, $tag_4->id, $tag_5->id]);

        $post_6->tags()->attach([$tag_2->id, $tag_7->id, $tag_3->id, $tag_2->id]);

        $post_8->tags()->attach([$tag_2->id, $tag_4->id, $tag_7->id]);

        $post_10->tags()->attach([$tag_2->id]);



    }
}
