<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MongoDB;

class HorrorController extends Controller
{
        public function Index() {
            $collection4 = (new MongoDB\Client)->MoviesMP->HorrorMovies;
            $HorrorMovies = $collection4->find();
        return view('admin/HorrorMovies/index', ["HorrorMovies" => $HorrorMovies]);
        }
    
        public function Details($id) {
            $collection4 = (new MongoDB\Client)->MoviesMP->HorrorMovies;
            $HorrorMovies = $collection4->findOne(["_id" => new \MongoDB\BSON\ObjectId($id) ]);
            return view('admin/HorrorMovies.details', [ "HorrorMovies" => $HorrorMovies ]);
        }
    
        public function Create(){
            $collection4 = (new MongoDB\Client)->MoviesMP->HorrorMovies;
            $HorrorMovies = $collection4->find();
            return view('/admin/HorrorMovies.create', ["HorrorMovies" => $HorrorMovies]);
        }
    
        public function store() {
            $HorrorMovies = [
                "film" => request("film"),
                "genre" => request("genre"),
                "grade" => request("grade"),
                "budget" => request("budget"),
                "year" => request("year"),
            ];
            $collection4 = (new MongoDB\Client)->MoviesMP->HorrorMovies;
            $insertOneResult = $collection4->insertOne($HorrorMovies);
            if ($insertOneResult->getInsertedCount() == 1)
            return redirect('/admin/HorrorMovies')->with('mssg', request('title')." was added succesfuly!")-> with('alerttype', "success");
        }
    
        public function Edit($id) {
            $collection4 = (new MongoDB\Client)->MoviesMP->HorrorMovies;
            $HorrorMovies = $collection4->findOne(["_id" => new \MongoDB\BSON\ObjectId($id) ]);
            return view('admin/HorrorMovies.edit', ["HorrorMovies" => $HorrorMovies]);
        }
    
        public function Delete($id) {
            $collection4 = (new MongoDB\Client)->MoviesMP->HorrorMovies;
            $HorrorMovies = $collection4->findOne(["_id" => new \MongoDB\BSON\ObjectId($id) ]);
            return view('admin/HorrorMovies.delete',  ["HorrorMovies" => $HorrorMovies]);
        }
    
        public function update() {
            $collection4 = (new MongoDB\Client)->MoviesMP->HorrorMovies;
            $HorrorMovies = [
                "film" => request("film"),
                "genre" => request("genre"),
                "grade" => request("grade"),
                "budget" => request("budget"),
                "year" => request("year"),
            ];
            $updateOneResult = $collection4->UpdateOne([
                "_id" => new MongoDB\BSON\ObjectId(request("movieid"))
            ],[
                '$set' => $HorrorMovies
                ]);
    
                if($updateOneResult->getModifiedCount() == 1)
                    return redirect("/admin/HorrorMovies/".request("movieid"))->with('mssg', " Updated succesfuly!")->with("alerttype", "success");;
        }
    
        public function userindex4() {
            $collection4 = (new MongoDB\Client)->MoviesMP->HorrorMovies;
            $moviesFOURcount =$collection4->count();
            $page = request("pg") == 0 ? 1 : request("pg");
            $HorrorMovies = $collection4->find([], ["limit"=> 12, "skip" => ($page - 1) * 12]);
            return view('HorrorMovies/index', ["HorrorMovies" => $HorrorMovies, "moviesFOURcount" => $moviesFOURcount]);
        }
    
        public function userdetails4($id) {
            $collection4 = (new MongoDB\Client)->MoviesMP->HorrorMovies;
            $HorrorMovies = $collection4->findOne([ "_id" => new \MongoDB\BSON\ObjectId($id) ]);
            return view('HorrorMovies/info', [ "HorrorMovies" => $HorrorMovies ]);
        }
    
        public function remove() {
            $collection4 = (new MongoDB\Client)->MoviesMP->HorrorMovies;
            $deleteOneResult = $collection4->deleteOne([
                "_id" => new \MongoDB\BSON\ObjectId(request("movieid"))
            ]);
    
            if($deleteOneResult->getDeletedCount() == 1)
            return redirect("/admin/HorrorMovies/")->with("mssg", request('title')." was deleted succesfuly.!")->with("alerttype", "success");
        }
}
