<?php

$collection = (new MongoDB\Client)->MoviesMP->ComedyMovies;
        $ActionMovies = $collection->find([]);
        print_r($ActionMovies);