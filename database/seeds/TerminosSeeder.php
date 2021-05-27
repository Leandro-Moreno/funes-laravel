<?php

use Illuminate\Database\Seeder;

class TerminosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('terminos')->insert([
            'nombre' => 'Sistema educativo'
        ]);
      DB::table('terminos')->insert(
        [
            'nombre' => 'Centro educativo'
        ]);
      DB::table('terminos')->insert(
        [
            'nombre' => 'Aula'
        ]);
      DB::table('terminos')->insert(
        [
            'nombre' => 'Alumno'
        ]);
      DB::table('terminos')->insert(
        [
            'nombre' => 'Profesor'
        ]);
      DB::table('terminos')->insert(
        [
            'nombre' => 'Aprendizaje'
        ]);
      DB::table('terminos')->insert(
        [
            'nombre' => 'Enseñanza'
        ]);
      DB::table('terminos')->insert(
        [
            'nombre' => 'Evaluación'
        ]);
      DB::table('terminos')->insert(
        [
            'nombre' => 'Currículo'
        ]);
      DB::table('terminos')->insert(
        [
            'nombre' => 'Otras nociones de Educación Matemática'
        ]);
      DB::table('terminos')->insert(
        [
            'nombre' => 'Educación Matemática y otras disciplinas'
        ]);
      DB::table('terminos')->insert(
        [
            'nombre' => 'Investigación e innovación en Educación Matemático'
        ]);
      DB::table('terminos')->insert(
        [
            'nombre' => 'Matemáticas escolares'
        ]);
      DB::table('terminos')->insert(
        [
            'nombre' => 'Matemáticas superiores'
        ]);
      DB::table('terminos')->insert([
            'nombre' => 'Otros términos clave específicos no incluidos en las secciones anteriores',
            'anadir' => FALSE
        ]);
      DB::table('terminos')->insert([
            'nombre' => 'Acceso a diferentes niveles educativos',
            'termino_id' => 1
        ]);
      DB::table('terminos')->insert([
            'nombre' => 'Documentos curriculares',
            'termino_id' => 1
        ]);
      DB::table('terminos')->insert([
            'nombre' => 'Gestión y Calidad',
            'termino_id' => 1
        ]);
      DB::table('terminos')->insert([
            'nombre' => 'Legislación educativa',
            'termino_id' => 1
        ]);
      DB::table('terminos')->insert([
            'nombre' => 'Política educativa',
            'termino_id' => 1
        ]);
      DB::table('terminos')->insert([
            'nombre' => 'Otro (sistema educativo)',
            'termino_id' => 1
        ]);
      DB::table('terminos')->insert([
            'nombre' => 'Gestión y organización del centro',
            'termino_id' => 2
        ]);
      DB::table('terminos')->insert([
            'nombre' => 'Recursos',
            'termino_id' => 2
        ]);
      DB::table('terminos')->insert([
            'nombre' => 'Relaciones del centro',
            'termino_id' => 2
        ]);
      DB::table('terminos')->insert([
          'nombre' => 'Otro (centro educativo)',
          'termino_id' => 2
      ]);
      /**/
      DB::table('terminos')->insert([
          'nombre' => 'Departamentos de Matemáticas',
          'termino_id' => 22
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Otro (gestión y organización del centro)',
          'termino_id' => 22
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Otros departamentos',
          'termino_id' => 22
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Proyecto educativo de centro',
          'termino_id' => 22
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Disponibilidad de materiales y recursos didácticos',
          'termino_id' => 23
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Financieros',
          'termino_id' => 23
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Infraestructura',
          'termino_id' => 23
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Personal',
          'termino_id' => 23
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Otro (recursos)',
          'termino_id' => 23
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Administraciones públicas',
          'termino_id' => 24
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Otros centros educativos',
          'termino_id' => 24
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Otros organismos',
          'termino_id' => 24
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Padres de familia',
          'termino_id' => 24
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Otro (relaciones del centro)',
          'termino_id' => 24
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Gestión del aula',
          'termino_id' => 2
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Recursos didácticos',
          'termino_id' => 4
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Relaciones interpersonales',
          'termino_id' => 2
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Otro (aula)',
          'termino_id' => 2
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'El discurso',
          'termino_id' => 40
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Gestión del comportamiento de los alumnos',
          'termino_id' => 40
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Normas socio-culturales',
          'termino_id' => 40
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Otro (gestión del aula)',
          'termino_id' => 40
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Libros de texto',
          'termino_id' => 41
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Materiales manipulativos',
          'termino_id' => 41
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Medios audiovisuales',
          'termino_id' => 41
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Recursos informáticos',
          'termino_id' => 41
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Otro (recursos didácticos)',
          'termino_id' => 41
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Calculadoras',
          'termino_id' => 51
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Computadores',
          'termino_id' => 51
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Internet',
          'termino_id' => 51
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Software',
          'termino_id' => 51
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Otro (recursos informáticos)',
          'termino_id' => 51
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Entre estudiantes',
          'termino_id' => 42
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Profesor-estudiantes',
          'termino_id' => 42
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Otro (relaciones interpersonales)',
          'termino_id' => 42
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Diversidad',
          'termino_id' => 4
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Necesidades especiales',
          'termino_id' => 4
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Otro (alumno)',
          'termino_id' => 4
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Aspectos socioeconómicos',
          'termino_id' => 61
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Cultura-religión',
          'termino_id' => 61
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Género',
          'termino_id' => 61
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Lengua materna',
          'termino_id' => 61
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Origen étnico-raza',
          'termino_id' => 61
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Urbano-rural',
          'termino_id' => 61
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Otro (diversidad)',
          'termino_id' => 61
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Alumnos con dificultades de aprendizaje',
          'termino_id' => 62
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Alumnos con talento matemático',
          'termino_id' => 62
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Alumnos discapacitados',
          'termino_id' => 62
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Otro (necesidades especiales)',
          'termino_id' => 62
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Otro (necesidades especiales)',
          'termino_id' => 42
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Agrupaciones asociaciones federaciones',
          'termino_id' => 5
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Desarrollo del profesor',
          'termino_id' => 5
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'El papel del profesor',
          'termino_id' => 5
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Estatus',
          'termino_id' => 5
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Formación de profesores',
          'termino_id' => 42
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Relaciones entre profesores',
          'termino_id' => 42
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Otro (profesor)',
          'termino_id' => 42
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Continua-Permanente',
          'termino_id' => 80
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Inicial',
          'termino_id' => 80
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Otro (formación de profesores)',
          'termino_id' => 80
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Aspectos afectivos',
          'termino_id' => 42
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Cognición',
          'termino_id' => 42
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Otro (aprendizaje)',
          'termino_id' => 42
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Procesos cognitivos',
          'termino_id' => 86
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Actitud',
          'termino_id' => 86
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Ansiedad',
          'termino_id' => 86
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Creencia',
          'termino_id' => 86
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Motivación',
          'termino_id' => 86
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Otro (aspectos afectivos)',
          'termino_id' => 86
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Otro (relaciones interpersonales)',
          'termino_id' => 42
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Otro (relaciones interpersonales)',
          'termino_id' => 42
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Otro (relaciones interpersonales)',
          'termino_id' => 42
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Otro (relaciones interpersonales)',
          'termino_id' => 42
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Otro (relaciones interpersonales)',
          'termino_id' => 42
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Otro (relaciones interpersonales)',
          'termino_id' => 42
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Otro (relaciones interpersonales)',
          'termino_id' => 42
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Otro (relaciones interpersonales)',
          'termino_id' => 42
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Otro (relaciones interpersonales)',
          'termino_id' => 42
      ]);
      DB::table('terminos')->insert([
          'nombre' => 'Otro (relaciones interpersonales)',
          'termino_id' => 42
      ]);
    }
}
