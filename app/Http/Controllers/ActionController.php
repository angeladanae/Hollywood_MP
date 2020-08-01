<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MongoDB;

class ActionController extends Controller
{
        public function Index() {
            $collection = (new MongoDB\Client)->MoviesMP->ActionMovies;
            $ActionMovies = $collection->find();
        return view('admin/ActionMovies/index', ["ActionMovies" => $ActionMovies]);
        }
    
        public function Details($id) {
            $collection = (new MongoDB\Client)->MoviesMP->ActionMovies;
            $ActionMovies = $collection->findOne(["_id" => new \MongoDB\BSON\ObjectId($id) ]);
            return view('admin/ActionMovies.details', [ "ActionMovies" => $ActionMovies ]);
        }
    
        public function Create(){
            $collection = (new MongoDB\Client)->MoviesMP->ActionMovies;
            $ActionMovies = $collection->find();
            return view('/admin/ActionMovies.create', ["ActionMovies" => $ActionMovies]);
        }
    
        public function store() {
            $ActionMovies = [
                "film" => request("film"),
                "genre" => request("genre"),
                "grade" => request("grade"),
                "budget" => request("budget"),
                "year" => request("year"),
            ];
            $collection = (new MongoDB\Client)->MoviesMP->ActionMovies;
            $insertOneResult = $collection->insertOne($ActionMovies);
            if ($insertOneResult->getInsertedCount() == 1)
            return redirect('/admin/ActionMovies')->with('mssg', request('title')." was added succesfuly!")-> with('alerttype', "success");
        }
    
        public function Edit($id) {
            $collection = (new MongoDB\Client)->MoviesMP->ActionMovies;
            $ActionMovies = $collection->findOne(["_id" => new \MongoDB\BSON\ObjectId($id) ]);
            return view('admin/ActionMovies.edit', ["ActionMovies" => $ActionMovies]);
        }
    
        public function Delete($id) {
            $collection = (new MongoDB\Client)->MoviesMP->ActionMovies;
            $ActionMovies = $collection->findOne(["_id" => new \MongoDB\BSON\ObjectId($id) ]);
            return view('admin/ActionMovies.delete',  ["ActionMovies" => $ActionMovies]);
        }
    
        public function update() {
            $collection = (new MongoDB\Client)->MoviesMP->ActionMovies;
            $ActionMovies = [
                "film" => request("film"),
                "genre" => request("genre"),
                "grade" => request("grade"),
                "budget" => request("budget"),
                "year" => request("year"),
            ];
            $updateOneResult = $collection->UpdateOne([
                "_id" => new MongoDB\BSON\ObjectId(request("movieid"))
            ],[
                '$set' => $ActionMovies
                ]);
    
                if($updateOneResult->getModifiedCount() == 1)
                    return redirect("/admin/ActionMovies/".request("movieid"))->with('mssg', " Updated succesfuly!")->with("alerttype", "success");;
        }
    
        public function userindex1() {
            $collection = (new MongoDB\Client)->MoviesMP->ActionMovies;
            $moviesONEcount =$collection->count();
            $page = request("pg") == 0 ? 1 : request("pg");
            $ActionMovies = $collection->find([], ["limit"=> 12, "skip" => ($page - 1) * 12]);
            return view('ActionMovies/index', ["ActionMovies" => $ActionMovies, "moviesONEcount" => $moviesONEcount]);
        }
    
        public function userdetails1($id) {
            $collection = (new MongoDB\Client)->MoviesMP->ActionMovies;
            $ActionMovies = $collection->findOne([ "_id" => new \MongoDB\BSON\ObjectId($id) ]);
            return view('ActionMovies/info', [ "ActionMovies" => $ActionMovies ]);
        }
    
        public function remove() {
            $collection = (new MongoDB\Client)->MoviesMP->ActionMovies;
            $deleteOneResult = $collection->deleteOne([
                "_id" => new \MongoDB\BSON\ObjectId(request("movieid"))
            ]);
    
            if($deleteOneResult->getDeletedCount() == 1)
            return redirect("/admin/ActionMovies/")->with("mssg", request('title')." was deleted succesfuly.!")->with("alerttype", "success");
        }
}
