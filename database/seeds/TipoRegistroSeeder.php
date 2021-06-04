<?php

use Illuminate\Database\Seeder;

class TipoRegistroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('tipo_registros')->insert([
          'name' => 'article',
          'description' => 'Un artículo en una publicación seriada periódica. Incluye artículos en revistas de investigación, periódicos y boletines, entre otros. Los artículos no tienen necesariamente que haber sido revisados por pares. Puede ser un artículo publicado en un medio electrónico.',
          'label' => 'Artículo'
      ]);
      DB::table('tipo_registros')->insert([
          'name' => 'book_section',
          'description' => 'Un capítulo o sección de un libro. No incluye trabajos presentados en congresos que hayan sido publicados en el libro de actas. Para estos trabajos, seleccione la opción "Contribución en actas de congresos".',
          'label' => 'Sección/Capítulo de libro'
      ]);
      DB::table('tipo_registros')->insert([
          'name' => 'edited_book',
          'description' => 'Un libro compuesto de capítulos con diferentes autores. El libro debe tener uno o más editores e ISBN. Los capítulos deben tener un rango de páginas en el que se ubican dentro del libro.',
          'label' => 'Libro editado'
      ]);
      DB::table('tipo_registros')->insert([
          'name' => 'book',
          'description' => 'Un libro publicado. Incluye libros editados y actas de congresos, entre otros. Puede ser un libro publicado en medio electrónico (como CD) siempre que tenga un ISBN asignado.',
          'label' => 'Libro'
      ]);
      DB::table('tipo_registros')->insert([
          'name' => 'thesis',
          'description' => 'Una tesis de licenciatura o posgrado.',
          'label' => 'Tesís'
      ]);
      DB::table('tipo_registros')->insert([
          'name' => 'acta_congreso',
          'description' => 'Un documento publicado en un libro de actas de congresos. El libro de actas debe tener ISBN asignado y editores. En caso contrario, seleccione la opción "Conferencia, Comunicación, Cartel, Taller, Curso o Participación en Mesa Redonda.',
          'label' => 'Contribución a actas de congreso'
      ]);
      DB::table('tipo_registros')->insert([
          'name' => 'conference',
          'description' => 'El documento de una conferencia, comunicación, taller, cartel, curso o participación en una mesa redonda realizados en algún evento o institución. Si usted tiene únicamente el o los archivos de PowerPoint (u otro formato) de su presentación, puede crear el registro con esos archivos sin necesidad de incluir archivos adicionales. Si el documento de la conferencia ha sido publicado en las actas del congreso o en un libro editado con isbn, editores y rango de páginas para el documento, utilice alguna de las secciones anteriores (aquí puede incluir los archivos de la presentación).',
          'label' => 'Conferencia, Comunicación, Cartel, Taller, Curso o Participación en Mesa Redonda'
      ]);
      DB::table('tipo_registros')->insert([
          'name' => 'monograph',
          'description' => 'Un documento que no ha sido publicado. Aquí se incluyen los trabajos de título de grado.',
          'label' => 'Documento no publicado'
      ]);
      DB::table('tipo_registros')->insert([
          'name' => 'teaching_resource',
          'description' => 'Actividades de enseñanza: apuntes, ejercicios, exámenes o curso de los programas.',
          'label' => 'Recursos de enseñanza'
      ]);

      DB::table('tipo_registros')->insert([
          'name' => 'image',
          'description' => 'Fotografía digital o una imagen o figura en formato electrónico.',
          'label' => 'Imagen'
      ]);
      DB::table('tipo_registros')->insert([
          'name' => 'video',
          'description' => 'Un video digital',
          'label' => 'Video'
      ]);
      DB::table('tipo_registros')->insert([
          'name' => 'audio',
          'description' => 'Una grabación de sonido digital.',
          'label' => 'Audio'
      ]);
      DB::table('tipo_registros')->insert([
          'name' => 'dataset',
          'description' => 'Una colección limitada de datos cuantitativos (por ejemplo, hoja de cálculo o archivo de datos XML).',
          'label' => 'Dataset'
      ]);
      DB::table('tipo_registros')->insert([
          'name' => 'experiment',
          'description' => 'Los datos experimentales con los análisis intermedios y el resumen de los resultados.',
          'label' => 'Experimento'
      ]);
      DB::table('tipo_registros')->insert([
          'name' => 'other',
          'description' => 'Algo dentro del ámbito del repositorio, pero que no está cubierto en las otras categorías.',
          'label' => 'Otro'
      ]);
    }
}
