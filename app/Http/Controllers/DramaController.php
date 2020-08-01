<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MongoDB;

class DramaController extends Controller
{
        public function Index() {
            $collection3 = (new MongoDB\Client)->MoviesMP->DramaMovies;
            $DramaMovies = $collection3->find();
        return view('admin/DramaMovies/index', ["DramaMovies" => $DramaMovies]);
        }
    
        public function Details($id) {
            $collection3 = (new MongoDB\Client)->MoviesMP->DramaMovies;
            $DramaMovies = $collection3->findOne(["_id" => new \MongoDB\BSON\ObjectId($id) ]);
            return view('admin/DramaMovies.details', [ "DramaMovies" => $DramaMovies ]);
        }
    
        public function Create(){
            $collection3 = (new MongoDB\Client)->MoviesMP->DramaMovies;
            $DramaMovies = $collection3->find();
            return view('/admin/DramaMovies.create', ["DramaMovies" => $DramaMovies]);
        }
    
        public function store() {
            $DramaMovies = [
                "film" => request("film"),
                "genre" => request("genre"),
                "grade" => request("grade"),
                "budget" => request("budget"),
                "year" => request("year"),
            ];
            $collection3 = (new MongoDB\Client)->MoviesMP->DramaMovies;
            $insertOneResult = $collection3->insertOne($DramaMovies);
            if ($insertOneResult->getInsertedCount() == 1)
            return redirect('/admin/DramaMovies')->with('mssg', request('title')." was added succesfuly!")-> with('alerttype', "success");
        }
    
        public function Edit($id) {
            $collection3 = (new MongoDB\Client)->MoviesMP->DramaMovies;
            $DramaMovies = $collection3->findOne(["_id" => new \MongoDB\BSON\ObjectId($id) ]);
            return view('admin/DramaMovies.edit', ["DramaMovies" => $DramaMovies]);
        }
    
        public function Delete($id) {
            $collection3 = (new MongoDB\Client)->MoviesMP->DramaMovies;
            $DramaMovies = $collection3->findOne(["_id" => new \MongoDB\BSON\ObjectId($id) ]);
            return view('admin/DramaMovies.delete',  ["DramaMovies" => $DramaMovies]);
        }
    
        public function update() {
            $collection3 = (new MongoDB\Client)->MoviesMP->DramaMovies;
            $DramaMovies = [
                "film" => request("film"),
                "genre" => request("genre"),
                "grade" => request("grade"),
                "budget" => request("budget"),
                "year" => request("year"),
            ];
            $updateOneResult = $collection3->UpdateOne([
                "_id" => new MongoDB\BSON\ObjectId(request("movieid"))
            ],[
                '$set' => $DramaMovies
                ]);
    
                if($updateOneResult->getModifiedCount() == 1)
                    return redirect("/admin/DramaMovies/".request("movieid"))->with('mssg', " Updated succesfuly!")->with("alerttype", "success");;
        }
    
        public function userindex3() {
            $collection3 = (new MongoDB\Client)->MoviesMP->DramaMovies;
            $moviesTHREEcount =$collection3->count();
            $page = request("pg") == 0 ? 1 : request("pg");
            $DramaMovies = $collection3->find([], ["limit"=> 12, "skip" => ($page - 1) * 12]);
            return view('DramaMovies/index', ["DramaMovies" => $DramaMovies, "moviesTHREEcount" => $moviesTHREEcount]);
        }
    
        public function userdetails3($id) {
            $collection3 = (new MongoDB\Client)->MoviesMP->DramaMovies;
            $DramaMovies = $collection3->findOne([ "_id" => new \MongoDB\BSON\ObjectId($id) ]);
            return view('DramaMovies/info', [ "DramaMovies" => $DramaMovies ]);
        }
    
        public function remove() {
            $collection3 = (new MongoDB\Client)->MoviesMP->DramaMovies;
            $deleteOneResult = $collection3->deleteOne([
                "_id" => new \MongoDB\BSON\ObjectId(request("movieid"))
            ]);
    
            if($deleteOneResult->getDeletedCount() == 1)
            return redirect("/admin/DramaMovies/")->with("mssg", request('title')." was deleted succesfuly.!")->with("alerttype", "success");
        }
}
