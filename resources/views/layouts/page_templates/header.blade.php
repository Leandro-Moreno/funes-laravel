<section class="featured clearfix pt-5 pb-5">
{{--    <h2>Página inicial de Funes</h2>--}}
    <div class="container">
        <div class="featured-grid">
            <div class="featured-content featured-content-text">

                <div class="featured-content-text-span">
                    <p class="main">{{env('APP_NAME')}}</p>
                    <p class="phrase">Repositorio Digital de Documentos de Educación Matemática</p>
                    <div class="featured-content-text-span-second">
                        <p class="phrase phrase-second">Contamos con 20.500 documentos</p>
                        <p class="phrase phrase-second">4500 usuarios</p>
                        <div class="border-top my-3"></div>
                        <p class="phrase phrase-second">Somos el 5 repositorio en Colombia</p>
                    </div>
                    <x-search.index></x-search.index>
                </div>
            </div>
            <div class="featured-content">


                <div class="featured-content-img">
                    <img src="https://uniandes.edu.co/sites/default/files/premios-alejandro-angel-d-izq.jpg"/>
                </div>
                <div class="featured-content-info">
                    <h3 class="title">
                        Registros recientes
                    </h3>
                    <p>
                        La Fundación Alejandro Ángel Escobar (FAAE) otorgó Mención de Honor a Juan Pablo Ramos-Bonilla, de
                        la Facultad de Ingeniería, y a Pablo Roberto Stevenson Díaz, de la Facultad de Ciencias.
                    </p>
                    <a href="a" class="btn btn-outline-primary">
                        Ver más
                    </a>
                </div>
            </div>
            <div class="featured-content">


                <div class="featured-content-img">
                    <img src="https://uniandes.edu.co/sites/default/files/premios-alejandro-angel-d-izq.jpg"/>
                </div>
                <div class="featured-content-info">
                    <h3 class="title">
                        Búsqueda Avanzada
                    </h3>
                    <p>
                        La Fundación Alejandro Ángel Escobar (FAAE) otorgó Mención de Honor a Juan Pablo Ramos-Bonilla, de
                        la Facultad de Ingeniería, y a Pablo Roberto Stevenson Díaz, de la Facultad de Ciencias.
                    </p>
                    <a href="a" class="btn btn-outline-primary">
                        Ver más
                    </a>
                </div>
            </div>
            <div class="featured-content">


                <div class="featured-content-img">
                    <img src="https://uniandes.edu.co/sites/default/files/premios-alejandro-angel-d-izq.jpg"/>
                </div>
                <div class="featured-content-info">
                    <h3 class="title">
                        Estructura de Funes por Términos Claves
                    </h3>
                    <p>
                        La Fundación Alejandro Ángel Escobar (FAAE) otorgó Mención de Honor a Juan Pablo Ramos-Bonilla, de
                        la Facultad de Ingeniería, y a Pablo Roberto Stevenson Díaz, de la Facultad de Ciencias.
                    </p>
                    <a href="a" class="btn btn-outline-primary">
                        Ver más
                    </a>
                </div>
            </div>
            <div class="featured-content">


                <div class="featured-content-img">
                    <img src="https://uniandes.edu.co/sites/default/files/premios-alejandro-angel-d-izq.jpg"/>
                </div>
                <div class="featured-content-info">
                    <h3 class="title">
                        Acerca de {{env('APP_NAME')}}
                    </h3>
                    <p>
                    </p>
                    <a href="a" class="btn btn-outline-primary">
                        Ver más
                    </a>
                </div>
            </div>
        </div>
    </div>

</section>
@push('header')
    <script>
        $(".search-bar input")
            .focus(function () {
                $(".featured").addClass("wide");
            })
            .blur(function () {
                $(".featured").removeClass("wide");
            });
    </script>
@endpush()
