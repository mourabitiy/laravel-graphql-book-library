# Laravel GraphQL API for Books

This project is a Laravel GraphQL API for retrieving books from a database. It offers a variety of queries and mutations for adding, searching, updating and deleting the books from the database.

## Installation

1. Clone the repository and install dependencies: <br>
   `git clone https://github.com/mourabitiy/laravel-graphql-book-library` <br>
   `cd laravel-graphql-book-library`<br>
   `composer install`<br>
2. Generate an app key <br>
   `php artisan key:generate` <br>
3. Set up your database credentials in the .env file<br>
<pre>
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=[YOUR_DB_NAME]
DB_USERNAME=[YOUR_DB_USERNAME]
DB_PASSWORD=[YOUR_DB_PASSWORD]
</pre>
4. Run the Server
<pre>php artisan serve</pre>
## Running the tests
5. Run the database migrations and populate it using faker
<pre>php artisan migrate:fresh --seed</pre>
6. To try out the endpoints, you can use a GraphQL client such as Postman, Insomnia or GraphiQL.

Open the client and set the endpoint to `http://127.0.0.1:8000/booksApi`.
Try out some of the available queries and mutations. For example, to retrieve
### a list of all books: ### 
<pre>{
    books {
        id
        title
        author
        language
        category
        page_count
        publisher
        isbn
    }
}</pre>
### Unique Book by id ### 
<pre>{
     book(id: 157) {
        page_count
        publisher
        isbn
    }
}
</pre>
### Books for a specific Author: ### 
<pre>{
     books(author: "Daniel") {
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
</pre>

### Books for a specific isbn, language, title, category, : ### 
Same as the Author, just change the Parameter to : isbn, language, title, category.
### Create A book: ### 
<pre>
     mutation{
            createBook(
                title: "The Book of the Dead",
                author: "John Doe",
                language: "English",
                category: "Horror",
                page_count: 200,
                publisher: "John Doe",
                isbn: "1234567890"
            ){
                title
                author
                language
                category
                page_count
                publisher
                isbn
            }
    }</pre>
### Update A book: ### 
   <pre>
   mutation{
        updateBook(
            id: 55778,
            title: "The Book of the Dead",
            description: "This is a book about the dead",
            author: "John The Writer",
            language: "En",
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
}</pre>
### Delete A book: ###
  <pre>
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
}</pre>

### Example : Get a Book by Category ###
![image](https://user-images.githubusercontent.com/65322052/210913983-7c9b7ad3-698d-4070-9a3d-fc2b92174f25.png)


