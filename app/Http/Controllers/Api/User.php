<?php

namespace App\Http\Controllers\Api;

use App\Http\Repository\Api\UserRepo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class User extends Controller
{

    protected $repo;

    public function __construct(UserRepo $repo)
    {

        $this->repo = $repo;

    }

    public function login(){
        try{
            if(!$data = $this->repo->login()){
                return returnError(100,$this->repo->getError());
            }
            return returnSuccess($data);
        }catch(\Exception $e){
//            return returnError(0,$e->getMessage())
            echo $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        echo $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        echo 123;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
