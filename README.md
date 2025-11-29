Dokumentacja dostępna pod:
http://url_porjektu/docs/api

Można również wgrać kolekcję postmana z wszystkimi endpointami z pliku
[v1.postman_collection.json](v1.postman_collection.json)

Krótki opis:
Udało mi się zrealizować wszystkie podpunkty, endpoint "info"
również jest objęty autoryzacją. Z cachowaniem poszedłem na "łatwiznę" i cachuje sobie po prostu na godzinę.

Setup

```
$ composer install
$ cp .env.example .env // Uzupełnić env o bazę danych
$ php artisan key:generate
$ php artisan migrate
$ php artisan serve
```

Ścieżki

```
  GET|HEAD        api/v1/banned ............................................................................................................................................................... banned.index › BanController@index
  POST            api/v1/banned ............................................................................................................................................................... banned.store › BanController@store
  DELETE          api/v1/banned/{banned} .................................................................................................................................................. banned.destroy › BanController@destroy
  GET|HEAD        api/v1/info ............................................................................................................................................................... info.index › PokemonController@index
  POST            api/v1/pokemon ......................................................................................................................................................... pokemon.store › PokemonController@store
  GET|HEAD        api/v1/pokemon/{pokemon} ................................................................................................................................................. pokemon.show › PokemonController@show
  PUT|PATCH       api/v1/pokemon/{pokemon} ............................................................................................................................................. pokemon.update › PokemonController@update
  DELETE          api/v1/pokemon/{pokemon} ........................................................................................................................................... pokemon.destroy › PokemonController@destroy
  GET|HEAD        docs/api ...................................................................................................................................................................................... scramble.docs.ui
  GET|HEAD        docs/api.json ........................................................................................................................................................................... scramble.docs.document
  GET|HEAD        sanctum/csrf-cookie .......................................................................................................................... sanctum.csrf-cookie › Laravel\Sanctum › CsrfCookieController@show
  GET|HEAD        storage/{path} ................................................................................................................................................................................... storage.local
```
