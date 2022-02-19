<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('subjects')->insert([
            [ //1sem
                'credit' => '5',
                'name' => 'calculo I',
            ],
            [
                'credit' => '5',
                'name' => 'Estructura Discreta',
            ],
            [
                'credit' => '5',
                'name' => 'Introduccion a la informatica',
            ],
            [
                'credit' => '6',
                'name' => 'Fisica I',
            ],
            [
                'credit' => '4',
                'name' => 'Ingles Tecnico I',
            ],
            [ //2sem
                'credit' => '5',
                'name' => 'Calculo II',
            ],
            [
                'credit' => '5',
                'name' => 'Algebra Lineal',
            ],
            [
                'credit' => '5',
                'name' => 'programacion I',
            ],
            [
                'credit' => '6',
                'name' => 'Fisica II',
            ],
            [
                'credit' => '4',
                'name' => 'Ingles Tecnico II',
            ],
            [ //3sem
                'credit' => '5',
                'name' => 'Arquitectura de Computadoras',
            ],
            [
                'credit' => '5',
                'name' => 'programacion II',
            ],
            [
                'credit' => '5',
                'name' => 'Ecuaciones diferenciales',
            ],
            [
                'credit' => '4',
                'name' => 'Administracion',
            ],
            [
                'credit' => '6',
                'name' => 'Fisica III',
            ],
            [ //4sem
                'credit' => '5',
                'name' => 'Probabilidades y estadisticas I',
            ],
            [
                'credit' => '5',
                'name' => 'programacion Ensamblador',
            ],
            [
                'credit' => '5',
                'name' => 'Metodos numericos',
            ],
            [
                'credit' => '5',
                'name' => 'Estructura de Datos I',
            ],
            [
                'credit' => '4',
                'name' => 'Contabilidad',
            ],
            [ //5sem
                'credit' => '5',
                'name' => 'Base de datos I',
            ],
            [
                'credit' => '5',
                'name' => 'Economia para la gestion',
            ],
            [
                'credit' => '5',
                'name' => 'Organizacion y metodos',
            ],
            [
                'credit' => '5',
                'name' => 'Estructura de Datos II',
            ],
            [
                'credit' => '3',
                'name' => 'Administracion de recursos humanos',
            ],
            [ //6sem
                'credit' => '5',
                'name' => 'Sistemas operativos I',
            ],
            [ 
                'credit' => '5',
                'name' => 'Base de datos II',
            ],
            [ 
                'credit' => '5',
                'name' => 'Investiagion operativa I',
            ],
            [ 
                'credit' => '5',
                'name' => 'Finanzas para la empresa',
            ],
            [ 
                'credit' => '5',
                'name' => 'Sistemas de informacion I',
            ],
            [ 
                'credit' => '3',
                'name' => 'Produccion y marketing',
            ],
            [ //7sem
                'credit' => '5',
                'name' => 'Redes I',
            ],
            [ 
                'credit' => '5',
                'name' => 'Sistemas operativos II',
            ],
            [ 
                'credit' => '5',
                'name' => 'Investigacion operativa II',
            ],
            [ 
                'credit' => '5',
                'name' => 'Sistemas de informacion II',
            ],
            [ 
                'credit' => '3',
                'name' => 'Benchmarking',
            ],
            [ //8sem
                'credit' => '5',
                'name' => 'Redes II',
            ],
            [ 
                'credit' => '5',
                'name' => 'Preparacion y evaluacion de proyectos',
            ],
            [ 
                'credit' => '5',
                'name' => 'Auditoria informatica',
            ],
            [ 
                'credit' => '5',
                'name' => 'Ingenieria de Software I',
            ],
            [ 
                'credit' => '4',
                'name' => 'Sistemas informacion geografica',
            ],
            [ 
                'credit' => '3',
                'name' => 'Legislacion',
            ],
            [  //9sem
                'credit' => '5',
                'name' => 'Taller de grado I',
            ],
            [ 
                'credit' => '5',
                'name' => 'Ingenieria de software II',
            ],
            [ 
                'credit' => '5',
                'name' => 'Tecnologia Web',
            ],
            [ 
                'credit' => '4',
                'name' => 'Arquitectura de software',
            ],
        ]);
    }
}
