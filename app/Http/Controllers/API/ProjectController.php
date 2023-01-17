<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Project;
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $projects = Project::all();
      $success=[
        "success"=>true,
        "message"=>"Projeler başarıyla listelendi",
        "projects"=>$projects
      ];
      return response()->json($success,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

            $validator= Validator::make($request->all(),[
                'name' => 'required',
            ]);
            if($validator->fails()){
                $response=[
                    'success'=>false,
                    'message'=>$validator->errors()
                ];
                return response()->json($response,400);
            }
            $input['user_id']=Auth::user()->id;
            $input['name']=trim(strtolower($request->name));
            $project = Project::create($input);

             $response=[
                'success'=>true,
                'message'=>'Proje başarıyla oluşturuldu.',
                'project'=>$project
             ];

             return response()->json($response,201);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
              $project = Project::find($id)->first();
              $success=[
                "success"=>true,
                "message"=>"Proje bilgileri başarıyla listelendi",
                "project"=>$project
              ];
              return response()->json($success,200);
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
