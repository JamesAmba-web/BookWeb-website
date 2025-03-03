<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    public function run()
    {
        $books = [
            [
                'title' => 'Think Python: How to Think Like a Computer Scientist',
                'author' => 'John Smith',
                'description' => 'A comprehensive guide to Python programming language...',
                'price' => 29.99,
                'category' => 'technology',
                'stock' => 50,
                'image_path' => '/images/Think-Python.png',
            ],
            [
                'title' => 'Gordon Ramsay Ultimate Home Cooking',
                'author' => 'Sarah Johnson',
                'description' => 'Delicious and simple recipes from one of Britain greatest chefs...',
                'price' => 34.99,
                'category' => 'cooking',
                'stock' => 45,
                'image_path' => '/images/gordon.jpg',
            ],
            [
                'title' => 'Adulthood is a Myth Gift!',
                'author' => 'Sarah Andersen',
                'description' => 'With new and classic Sarah Scribbls comics...',
                'price' => 24.99,
                'category' => 'non-fiction',
                'stock' => 30,
                'image_path' => '/images/adult.jpg',
            ],
            [
                'title' => 'How to Win at Chess',
                'author' => 'Levy Rozman',
                'description' => 'Understanding the key to be the best chess player...',
                'price' => 39.99,
                'category' => 'strategy',
                'stock' => 25,
                'image_path' => '/images/chess.jpg',
            ],
            [
                'title' => 'Best of Bridge Comfort Food',
                'author' => 'Emily Richards',
                'description' => 'Collection of nutritious and delicious recipes...',
                'price' => 19.99,
                'category' => 'cooking',
                'stock' => 40,
                'image_path' => '/images/bridge.jpg',
            ],
            [
                'title' => 'Marketing Strategy',
                'author' => 'Steven P. Schnaars',
                'description' => 'Modern approaches to digital marketing...',
                'price' => 27.99,
                'category' => 'business',
                'stock' => 35,
                'image_path' => '/images/market.jpg',
            ],
            [
                'title' => 'Electrical Engineering',
                'author' => 'Knowledge Flow',
                'description' => 'Introduction to Electrical Engineering...',
                'price' => 44.99,
                'category' => 'nonfiction',
                'stock' => 20,
                'image_path' => '/images/electric.jpg',
            ],
            [
                'title' => 'Dr.Stone Vol.12',
                'author' => 'Riichiro Inagaki',
                'description' => 'Discover the truth behind the petrification of all humans...',
                'price' => 32.99,
                'category' => 'manga',
                'stock' => 30,
                'image_path' => '/images/stone.jpg',
            ],
            [
                'title' => 'Fortnite From Zero To Hero',
                'author' => 'Epic Games',
                'description' => 'From Zero to World Cup Winner...',
                'price' => 21.99,
                'category' => 'Gaming',
                'stock' => 45,
                'image_path' => '/images/fortnite.jpg',
            ],
            [
                'title' => 'Dinosaur',
                'author' => 'John Woodward',
                'description' => 'Dinosaur Hardcover...',
                'price' => 36.99,
                'category' => 'Animal History',
                'stock' => 25,
                'image_path' => '/images/dino.jpg',
            ]
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}