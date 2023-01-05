<?php

namespace App\GraphQL\Mutations;

use App\Models\Book;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class ModifyBookMutation extends Mutation{
    protected $attributes = [
        'name' => 'updateBook'
    ];

    public function type(): Type
    {
        return GraphQL::type('Book');
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::nonNull(Type::int()),
                'rules' => ['required']
            ],
            'title' => [
                'name' => 'title',
                'type' => Type::nonNull(Type::string()),
                'rules' => ['required']
            ],
            'author' => [
                'name' => 'author',
                'type' => Type::nonNull(Type::string()),
                'rules' => ['required']
            ],
            'language' => [
                'name' => 'language',
                'type' => Type::nonNull(Type::string()),
            ],
            'category' => [
                'name' => 'category',
                'type' => Type::nonNull(Type::string()),
            ],
            'page_count' => [
                'name' => 'page_count',
                'type' => Type::nonNull(Type::int()),
            ],
            'publisher' => [
                'name' => 'publisher',
                'type' => Type::nonNull(Type::string()),
            ],
            'isbn' => [
                'name' => 'isbn',
                'type' => Type::nonNull(Type::string()),
                'rules' => ['required']
            ],
        ];
    }

    public function resolve($root, $args)
    {
        $book = Book::find($args['id']);
        $book->title = $args['title'];
        $book->author = $args['author'];
        $book->language = $args['language'];
        $book->category = $args['category'];
        $book->page_count = $args['page_count'];
        $book->publisher = $args['publisher'];
        $book->isbn = $args['isbn'];
        $book->save();

        return $book;
    }
    /* query to return all the books
    {
        books{
            id
            title
            author
            language
            category
            page_count
            publisher
            isbn
        }
    }
    and a one to create a book
    mutation{
        createBook(
            id: 55778,
            title: "The Book of the Dead",
            author: "John Doe",
            language: "English",
            category: "Horror",
            page_count: 200,
            publisher: "John Doe",
            isbn: "1234567890"
        ){
            id
            title
            author
            language
            category
            page_count
            publisher
            isbn
        }
    }
    update a book
    mutation{
        updateBook(
            id: 55778,
            title: "The Book of the Dead",
            description: "This is a book about the dead",
            author: "John The Writer",
            language: "English",
            category: "Horror",
            page_count: 200,
            publisher: "John Doe",
            isbn: "1234567890"
        ){
            id
            title
            author
            language
            category
            page_count
            publisher
            isbn
        }
    }

    delete a book
    mutation{
        deleteBook(
            id: 55778
        ){
            id
            title
            author
            language
            category
            page_count
            publisher
            isbn
        }
    }
    get a book by id
    {
        book(id: 55778){
            id
            title
            author
            language
            category
            page_count
            publisher
            isbn
        }
    }

    */
}
