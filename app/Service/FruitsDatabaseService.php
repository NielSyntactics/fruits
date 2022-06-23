<?php
namespace App\Service;
use App\Models\Fruit;

class FruitsDatabaseService {

    public function getAllFruitData() {
        return Fruit::all();
    }

    public function storeFruitData($request) {
        $fruit = new Fruit;

        $fruit->name = $request->name;
        $fruit->status = '1';

        $fruit->save();

        return $fruit;

    }

    public function getIndividualData($id) {
        return  Fruit::find($id);
    }

    public function updateFruitData ($id, $request) {
        $fruit = Fruit::find($id);
        $fruit->name = $request->name;
        $fruit->save();
        return $fruit;
    }

    public function deleteFruitData ( $fruit ) {
        $fruit->delete();
    }

    public function searchFruitData ($request) {
        return Fruit::where('name','like','%'.$request->name.'%')->get();
    }

    public function searchFruitDataApi ($name) {
        return Fruit::where('name','like','%'.$name.'%')->get();
    }

}
