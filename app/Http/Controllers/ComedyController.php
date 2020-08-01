<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MongoDB;

class ComedyController extends Controller
{
        public function Index() {
            $collection2 = (new MongoDB\Client)->MoviesMP->ComedyMovies;
            $ComedyMovies = $collection2->find();
        return view('admin/ComedyMovies/index', ["ComedyMovies" => $ComedyMovies]);
        }
    
        public function Details($id) {
            $collection2 = (new MongoDB\Client)->MoviesMP->ComedyMovies;
            $ComedyMovies = $collection2->findOne(["_id" => new \MongoDB\BSON\ObjectId($id) ]);
            return view('admin/ComedyMovies.details', [ "ComedyMovies" => $ComedyMovies ]);
        }
    
        public function Create(){
            $collection2 = (new MongoDB\Client)->MoviesMP->ComedyMovies;
            $ComedyMovies = $collection2->find();
            return view('/admin/ComedyMovies.create', ["ComedyMovies" => $ComedyMovies]);
        }
    
        public function store() {
            $ComedyMovies = [
                "film" => request("film"),
                "genre" => request("genre"),
                "grade" => request("grade"),
                "budget" => request("budget"),
                "year" => request("year"),
            ];
            $collection2 = (new MongoDB\Client)->MoviesMP->ComedyMovies;
            $insertOneResult = $collection2->insertOne($ComedyMovies);
            if ($insertOneResult->getInsertedCount() == 1)
            return redirect('/admin/ComedyMovies')->with('mssg', request('title')." was added succesfuly!")-> with('alerttype', "success");
        }
    
        public function Edit($id) {
            $collection2 = (new MongoDB\Client)->MoviesMP->ComedyMovies;
            $ComedyMovies = $collection2->findOne(["_id" => new \MongoDB\BSON\ObjectId($id) ]);
            return view('admin/ComedyMovies.edit', ["ComedyMovies" => $ComedyMovies]);
        }
    
        public function Delete($id) {
            $collection2 = (new MongoDB\Client)->MoviesMP->ComedyMovies;
            $ComedyMovies = $collection2->findOne(["_id" => new \MongoDB\BSON\ObjectId($id) ]);
            return view('admin/ComedyMovies.delete',  ["ComedyMovies" => $ComedyMovies]);
        }
    
        public function update() {
            $collection2 = (new MongoDB\Client)->MoviesMP->ComedyMovies;
            $ComedyMovies = [
                "film" => request("film"),
                "genre" => request("genre"),
                "grade" => request("grade"),
                "budget" => request("budget"),
                "year" => request("year"),
            ];
            $updateOneResult = $collection2->UpdateOne([
                "_id" => new MongoDB\BSON\ObjectId(request("movieid"))
            ],[
                '$set' => $ComedyMovies
                ]);
    
                if($updateOneResult->getModifiedCount() == 1)
                    return redirect("/admin/ComedyMovies/".request("movieid"))->with('mssg', " Updated succesfuly!")->with("alerttype", "success");;
        }
    
        public function userindex2() {
            $collection2 = (new MongoDB\Client)->MoviesMP->ComedyMovies;
            $moviesTWOcount =$collection2->count();
            $page = request("pg") == 0 ? 1 : request("pg");
            $ComedyMovies = $collection2->find([], ["limit"=> 12, "skip" => ($page - 1) * 12]);
            return view('ComedyMovies/index', ["ComedyMovies" => $ComedyMovies, "moviesTWOcount" => $moviesTWOcount]);
        }
    
        public function userdetails2($id) {
            $collection2 = (new MongoDB\Client)->MoviesMP->ComedyMovies;
            $ComedyMovies = $collection2->findOne([ "_id" => new \MongoDB\BSON\ObjectId($id) ]);
            return view('ComedyMovies/info', [ "ComedyMovies" => $ComedyMovies ]);
        }
    
        public function remove() {
            $collection2 = (new MongoDB\Client)->MoviesMP->ComedyMovies;
            $deleteOneResult = $collection2->deleteOne([
                "_id" => new \MongoDB\BSON\ObjectId(request("movieid"))
            ]);
    
            if($deleteOneResult->getDeletedCount() == 1)
            return redirect("/admin/ComedyMovies/")->with("mssg", request('title')." was deleted succesfuly.!")->with("alerttype", "success");
        }
}
