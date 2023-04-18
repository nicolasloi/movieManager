<h1 align="center"> Movie Manager </h1>

This project is a movie manager that allows users to store the movies they have watched and rate them on a scale of 1 to 5 stars, as well as leave a comment. Users can log in, log out, and register to access their movie list.

## Features

The features of this application are:

- Add a movie: Users can add a movie to their list.
- Give a rating: Users can rate a movie on a scale of 1 to 5 stars.
- Add a comment: Users can leave a comment on each movie.
- Log in / Log out / Register: Users can log in, log out, and register to access their movie list.
- Search movies: Users can search for movies by title.
- A homepage with Trending movies.

## Tools

The tools used to develop this application are:

- Laravel: The Laravel framework is used to develop the application.
- Blade: The Blade template engine is used to generate HTML pages.
- DaisyUI: The DaisyUI style library is used for design.
- Tailwind CSS: Tailwind CSS is used for layout and component design.
- TMDB: TMDB (The Movie Database) is used to obtain information about movies.
- Meilisearch: Meilisearch is used to power the movie search functionality.

## Installation Guide

### Prerequisites

- PHP 8.1
- Composer
- Node.js
- TMDB API Key (available at https://www.themoviedb.org/)

##### For Meilisearch:

 - Download Meilisearch from https://docs.meilisearch.com/learn/getting_started/quick_start.html.
   - Once downloaded in run this command : 
    ```bash
   $ meilisearch --master-key=YOUR_MASTER_KEY
   ```

### Steps

1. Clone the Git repository:

   ```bash
   $ git clone git@github.com:nicolasloi/movieList.git
   $ cd movie-list
    ```
2. Install PHP dependencies with Composer:

    ```bash
    $ composer install
    ````
3. Copy the .env.example file to create the .env file:

    ```bash
    $ cp .env.example .env
    ```

4. Generate an application key:
   
    ```bash
   $ php artisan key:generate
    ```
   
5. Configure the database information in the .env file. For example:
   
    ```bash 
    DB_CONNECTION=pgsql
    DB_HOST=127.0.0.1
    DB_PORT=5432
    DB_DATABASE=movie_list
    DB_USERNAME=USERNAME
    DB_PASSWORD=PASSWORD
   ```

##### Make sure to replace USERNAME and PASSWORD with your own database credentials.


6. Install JavaScript dependencies with npm:

    ```bash
    $ npm install
    ```
7. Install daisyUI  with npm:
    ```bash
   $ npm install daisyui
    ```
   
7. Compile CSS and JavaScript files with Laravel Mix:

    ```bash
    $ npm run dev
    ```
8. Create the database and run the migrations:

    ```bash
    $ php artisan migrate
    ```
9. Populate the database with movies from TMDB by running the following command:

    ```bash
    $ php artisan movies:load
    ```
10. Start the development server:

    ```bash
    $ php artisan serve
    ```
##### You can now access the application at <http://localhost:8000>.

11. Make sure to configure your TMDB API key in the .env file:

    ```bash
    TMDB_API_KEY=YOUR_API_KEY_HERE
    ```
##### Replace YOUR_API_KEY_HERE with your TMDB API key.

## Author

nicolasloi

## License

This project is licensed under the [MIT](https://opensource.org/licenses/MIT) license.
