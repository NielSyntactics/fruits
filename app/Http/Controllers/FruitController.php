<?php

namespace App\Http\Controllers;

use App\Models\Fruit;
use Illuminate\Http\Request;
use App\Service\FruitsDatabaseService;
use App\Http\Requests\FruitPostRequest;
use App\Http\Requests\StoreFruitRequest;

class FruitController extends Controller
{
    //

    public function index(FruitsDatabaseService $fruitsDatabaseService) {
        try {
            $fruits = $fruitsDatabaseService->getAllFruitData();
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 422);
        }

        return view('Fruits.index')->with('fruits',$fruits);
    }

    public function create() {
        return view('Fruits.create');
    }

    public function store( FruitPostRequest $request, FruitsDatabaseService $fruitsDatabaseService) {

        try {
            $fruitsDatabaseService->storeFruitData($request);
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 422);
        }

        return redirect()->route('fruits.index')->with('success', 'Fruits Added');

    }

    public function show( $id ) {

    }

    public function edit( $id , FruitsDatabaseService $fruitsDatabaseService) {

        try {
            $fruit = $fruitsDatabaseService->getIndividualData($id);
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 422);
        }

        if(!$fruit) {
            return abort(404);
        }

        return view('Fruits.edit')->with('fruit',$fruit);
    }

    public function update( StoreFruitRequest $request, $id, FruitsDatabaseService $fruitsDatabaseService ) {

        try {
            $fruitsDatabaseService->updateFruitData($id, $request);
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 422);
        }
        return redirect()->route('fruits.index')->with('update', 'Fruits Updated');
    }

    public function destroy( $id, FruitsDatabaseService $fruitsDatabaseService ) {
        try {
            $fruit = $fruitsDatabaseService->getIndividualData($id);
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception], 422);
        }

        if(!$fruit) {
            return abort(404);
        }

        try {
            $fruitsDatabaseService->deleteFruitData($fruit);
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception], 422);
        }


        return redirect()->route('fruits.index')->with('delete', 'Fruits Deleted');
    }

    public function search( Request $request, FruitsDatabaseService $fruitsDatabaseService  ) {

        try {
            $fruits = $fruitsDatabaseService->searchFruitData($request);
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 422);
        }

        return view('Fruits.index')->with('fruits',$fruits);
    }
}
