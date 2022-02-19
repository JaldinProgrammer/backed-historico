<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Semester;
use Illuminate\Http\Response;

class SemesterController extends Controller
{

    public function index(){
        $semesters =  Semester::all();
        $responseArr=array();
        $responseArr['status']=true;
        $responseArr['data']=$semesters;
        $responseArr['message'] = '¡Todas las materias disponibles!';
        $responseArr['is_valid']=1;
        $responseArr['token'] = '';
        return response()->json($responseArr,Response::HTTP_OK);
    }      
}
