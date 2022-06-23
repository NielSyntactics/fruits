<?php

namespace App\Http\Controllers\Api;

use App\Models\Fruit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFruitRequest;
use App\Service\FruitsDatabaseService;

class FruitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FruitsDatabaseService $fruitsDatabaseService)
    {
        //
        try {
            $fruits = $fruitsDatabaseService->getAllFruitData();
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 422);
        }
        return response()->json([
            'fruits'=>$fruits
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFruitRequest $request, FruitsDatabaseService $fruitsDatabaseService)
    {
        //
        try {
            $fruit = $fruitsDatabaseService->storeFruitData($request);
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 422);
        }

        return response()->json([
            'message'   =>  "Product Save Succesfully",
            'Fruit'     =>  $fruit
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fruit  $fruit
     * @return \Illuminate\Http\Response
     */
    public function show( $id ,FruitsDatabaseService $fruitsDatabaseService )
    {
        //
        try {
            $fruit = $fruitsDatabaseService->getIndividualData($id);
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 422);
        }

        return response()->json([
            'fruit'   =>  $fruit,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fruit  $fruit
     * @return \Illuminate\Http\Response
     */
    public function edit( $id )
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fruit  $fruit
     * @return \Illuminate\Http\Response
     */
    public function update(StoreFruitRequest $request, $id, FruitsDatabaseService $fruitsDatabaseService)
    {
        //

        try {
            $fruit = $fruitsDatabaseService->updateFruitData($id, $request);
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 422);
        }

        return response()->json([
            'message'   => "fruit Updated Successfully!",
            'fruit'   =>  $fruit,
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fruit  $fruit
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id, FruitsDatabaseService $fruitsDatabaseService )
    {

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

        return response()->json([
            'message' => 'Fruits Deleted Succesfully'
        ],200);
    }
    public function search( $name, FruitsDatabaseService $fruitsDatabaseService ) {

        try {
            $fruits = $fruitsDatabaseService->searchFruitDataApi($name);
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 422);
        }

        return response()->json([
            'fruits'   =>  $fruits,
        ]);
    }
}
