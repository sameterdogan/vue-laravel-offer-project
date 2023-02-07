<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Project;




class ProjectController extends Controller
{

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


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
