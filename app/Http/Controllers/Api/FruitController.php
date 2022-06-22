<?php

namespace App\Http\Controllers\Api;

use App\Models\Fruit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFruitRequest;

class FruitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $fruits = Fruit::all();
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
    public function store(StoreFruitRequest $request)
    {
        //
        $fruit = Fruit::create($request->all());

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
    public function show( $id )
    {
        //
        $fruit = Fruit::find($id);
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
    public function update(Request $request, $id)
    {
        //
        $fruit = Fruit::find($id);
        $fruit->update($request->all());

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
    public function destroy( $id )
    {
        $fruit = Fruit::find($id);
        $fruit->delete();

        return response()->json([
            'message' => 'Fruits Deleted Succesfully'
        ],200);
    }
    public function search( $name ) {

        $searchTerm = $name;
        $fruits = Fruit::where('name','like','%'.$searchTerm.'%')->get();

        return response()->json([
            'fruits'   =>  $fruits,
        ]);
    }
}
