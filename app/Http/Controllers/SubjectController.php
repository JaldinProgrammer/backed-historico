<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index(){
        $subjects = Subject::orderby('name', 'asc')->get();
        $responseArr=array();
        $responseArr['status']=true;
        $responseArr['data']=$subjects;
        $responseArr['message'] = '¡Todas las materias disponibles!';
        $responseArr['is_valid']=1;
        $responseArr['token'] = '';
        return response()->json($responseArr,Response::HTTP_OK);
    }
}
