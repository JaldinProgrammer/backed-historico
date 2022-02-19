<?php

namespace App\Http\Controllers;

use App\Models\Enrolled;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class EnrolledController extends Controller
{

    public function getPpa(){
        $materias = Enrolled::where('user_id',Auth()->user()->id)->get();
        $sumGrade = 0;
        $sumCredit = 0;
        foreach($materias as $materia){
            $materia->load('subject');
            $sumGrade+=$materia->grade*$materia->subject->credit;
            $sumCredit+= $materia->subject->credit;
        }
        $responseArr=array();
        $responseArr['status']=true;
        $responseArr['data']=round($sumGrade/$sumCredit,2);
        $responseArr['message'] = '¡El ppa del usuario '.Auth()->user()->name;
        $responseArr['is_valid']=1;
        $responseArr['token'] = '';
        return response()->json($responseArr,Response::HTTP_OK);
    }

    public function index(){
        $items = Enrolled::where('user_id',Auth()->user()->id)->get();
        $enrolled =array();
        //$index = 1;
        foreach($items as $item){
            $item->load('subject');
            $item->load('semester');
            $item->load('user');
            $datos = array(
                "id" => $item->id,
                "year" => $item->year,
                "grade" => $item->grade,
                "subject_id" => $item->subject->name,
                "semester_id" => $item->semester->period,
                "user_id" => $item->user->name
            );
            array_push($enrolled,$datos);
           // $index++;
        }
        $responseArr=array();
        $responseArr['status']=true;
        $responseArr['data']=$enrolled;
        $responseArr['message'] = '¡Todas las materias del usuario '.Auth()->user()->name;
        $responseArr['is_valid']=1;
        $responseArr['token'] = '';
        return response()->json($responseArr,Response::HTTP_OK);
    }

    public function store(Request $request){
        $validator = \Validator::make($request->all(), [
            'year' => 'required',
            'grade' => 'required',
            'subject_id' => 'required',
            'semester_id' => 'required',
            'user_id' => 'required',
        ]);
        $responseArr=array();
        if ($validator->fails()) {
            $responseArr['status']=false;
            $responseArr['data']=[];
            $responseArr['message'] = $validator->messages()->first();
            $responseArr['is_valid']=0;
            $responseArr['token'] = '';
            return response()->json($responseArr,Response::HTTP_BAD_REQUEST);
        }

        $data=[
            'year'=>$request->year,
            'grade'=>$request->grade,
            'subject_id'=>$request->subject_id,
            'semester_id'=>$request->semester_id,
            'user_id'=>$request->user_id,
        ];
        $enrroled = Enrolled::create($data);
        $responseArr['status']=true;
        $responseArr['data']=$enrroled;
        $responseArr['message'] = '¡La nota se ha creado correctamente!';
        $responseArr['is_valid']=1;
        $responseArr['token'] = '';
        return response()->json($responseArr,Response::HTTP_OK);
    }

    public function update(Request $request){
        $validator = \Validator::make($request->all(), [
            'year' => 'required',
            'grade' => 'required',
            'semester_id' => 'required',
            'enrolled_id' => 'required',
        ]);
        $responseArr=array();
        if ($validator->fails()) {
            $responseArr['status']=false;
            $responseArr['data']=[];
            $responseArr['message'] = $validator->messages()->first();
            $responseArr['is_valid']=0;
            $responseArr['token'] = '';
            return response()->json($responseArr,Response::HTTP_BAD_REQUEST);
        }
        $enrolled = Enrolled::findOrFail($request->enrolled_id);
        $data=[
            'year'=>$request->year,
            'grade'=>$request->grade,
            'subject_id'=>$request->subject_id,
            'semester_id'=>$request->semester_id,
        ];
        $enrolled->update($data);

        $responseArr['status']=true;
        $responseArr['data']=$enrolled;
        $responseArr['message'] = '¡La materia se ha actualizado correctamente!';
        $responseArr['is_valid']=1;
        $responseArr['token'] = '';

        return response()->json($responseArr,Response::HTTP_OK);
    }

    public function destroy(Request $request)
    {
        $enrolled = Enrolled::findOrFail((int) $request->enrolled_id);
        $enrolled->delete();
        $responseArr['status']=true;
        $responseArr['data']=[];
        $responseArr['message'] = '¡La materia se ha eliminado correctamente!';
        $responseArr['is_valid']=1;
        $responseArr['token'] = '';
        return response()->json($responseArr,Response::HTTP_OK);
    }

}
