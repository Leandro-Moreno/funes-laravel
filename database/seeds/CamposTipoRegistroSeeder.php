<?php

use Illuminate\Database\Seeder;

class CamposTipoRegistroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      /*
      $table->id();
      $table->foreignId('tipo_registro_id')->references('id')->on('tipo_registros');
      $table->integer("orden");
      $table->string("tipo_campo");
      $table->boolean("requerido");
      $table->string("label");
      $table->string("name");
      $table->text('description');
      $table->integer('rows')->nullable();
      $table->integer('cols')->nullable();
      $table->integer('min')->nullable();
      $table->integer('max')->nullable();
      $table->json('option')->nullable();*/
      DB::table('registro_tipo_campos')->insert([
          'tipo_registro_id' => '1',
          'orden' => '1',
          'tipo_campo' => 'textarea',
          'requerido' => true,
          'label' => 'Título',
          'name' => 'title',
          'description' => 'El título del documento. El título no debe terminar con un punto, pero puede terminar con un signo de interrogación. No es posible poner texto en cursiva. Por favor, introdúzcalo normalmente. Si el documento tiene un subtítulo, deberá ir precedido de un signo de dos puntos [:]. Use mayúsculas sólo para la primera letra de la primera palabra del título, de los nombres de las disciplinas y de los nombres propios.
Ejemplo: Los organizadores del currículo de matemáticas
Ejemplo: Formación inicial del profesorado de educación secundaria: reflexiones para un nuevo modelo
Ejemplo: Sobre el análisis de los problemas multiplicativos relacionados con la división de fracciones',
          'rows' => 3,
          'cols' => 60
      ]);
    }
}
