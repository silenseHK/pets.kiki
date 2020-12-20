<?php

namespace App\Http\Controllers\Api;

use App\Http\Repository\Api\UserRepo;
use Illuminate\Http\Request;

class User extends Base
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
            return returnFail($e);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        try{
            $user = $this->getUser();
            if(!$user){
                return returnError(101,'请先登录');
            }
            return returnSuccess($user);
        }catch(\Exception $e){
            return returnFail($e);
        }
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

    public function bindMobile(){
        try{
            $messageEngine = new \App\Libraries\wx\Message();
            $messageEngine->send();
        }catch(\Exception $e){
            return returnFail($e);
        }
    }
}
