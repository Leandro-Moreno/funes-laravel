<?php

namespace App\Registry;

class RegistryService
{
    protected $publicationTypes = [
        'magazine',
        'video',
        'photos',
    ];

    protected $publicationRules = [];

    public function __construct()
    {
        // initialize the rules for each publication type
        foreach ($this->publicationTypes as $type) {
            $methodName = $type . 'Rules';
            if (method_exists($this, $methodName)) {
                $this->publicationRules[$type] = $this->$methodName();
            }
        }
    }

    public function getPublicationRules($type)
    {
        if (isset($this->publicationRules[$type])) {
            return $this->publicationRules[$type];
        }
        return [];
    }

    public function articleRules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'authors' => 'required|array|min:1',
            'authors.*.name' => 'required|string|max:255',
            'authors.*.lastname' => 'required|string|max:255',
            'publication' => 'required|string|max:255',
            'date' => 'required|date_format:Y-m-d',
            'date_type' => 'nullable|string|max:50',
            'volume' => 'required|string|max:50',
            'pagerange' => 'required|string|max:50',
            'refereed' => 'nullable|boolean',
            'publisher' => 'required|string|max:255',
            'official_url' => 'nullable|url|max:255',
            'issn' => 'nullable|string|max:50',
            'number' => 'nullable|string|max:50',
            'place_of_pub' => 'nullable|string|max:255',
            'series' => 'nullable|string|max:255',
            'authors_institutional.*.name' => 'nullable|string|max:255',
            'authors_institutional.*.acronym' => 'nullable|string|max:50',
            'authors_institutional.*.country' => 'nullable|string|max:50',
            'arbitrado' => 'required|boolean',
            'estado_id' => 'required|integer|min:1|max:4',
            'tipo_de_publicacion' => 'nullable|string|max:255',
            'issn' => 'nullable|string|max:255',
            'editor' => 'nullable|string|max:255',
            'url_oficial' => 'nullable|url|max:255',
            'volumen' => 'nullable|string|max:255',
            'numero_serie' => 'nullable|integer|min:1',
            'pagina_de' => 'nullable|integer|min:0',
            'pagina_hasta' => 'nullable|integer|min:1',
            'año_publicacion' => 'nullable|integer|min:1900|max:' . date('Y'),
            'mes_publicacion' => 'nullable|integer|min:1|max:12',
        ];
    }

    public function bookRules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'refereed' => 'required|boolean',
            'publication_date' => 'required|date',
            'publication_date_type' => 'nullable|string|max:255',
            'location' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'pages' => 'nullable|string|max:255',
            'volume' => 'nullable|string|max:255',
            'series' => 'nullable|string|max:255',
            'number' => 'required|string|max:255',
            'isbn' => 'nullable|string|max:255',
            'official_url' => 'nullable|url|max:255',
            'related_url' => 'nullable|url|max:255',
            'edition_date' => 'nullable|date',
            'edition_date_type' => 'nullable|string|max:255',
            'authors' => 'required|array|min:1',
            'authors.*.name' => 'required|string|max:255',
            'authors.*.last_name' => 'nullable|string|max:255',
            'authors.*.email' => 'nullable|email|max:255',
            'authors.*.institution' => 'nullable|string|max:255',
            'authors.*.orc_id' => 'nullable|string|max:255',
            'authors_institutional' => 'nullable|array',
            'authors_institutional.*.institution' => 'required|string|max:255',
            'authors_institutional.*.authors' => 'required|array|min:1',
            'authors_institutional.*.authors.*.name' => 'required|string|max:255',
            'authors_institutional.*.authors.*.last_name' => 'nullable|string|max:255',
            'authors_institutional.*.authors.*.email' => 'nullable|email|max:255',
            'authors_institutional.*.authors.*.orc_id' => 'nullable|string|max:255',
            'arbitrado' => 'required|boolean',
            'estado_id' => 'required|integer|min:1|max:4',
            'tipo_de_publicacion' => 'nullable|string|max:255',
            'issn' => 'nullable|string|max:255',
            'editor' => 'nullable|string|max:255',
            'url_oficial' => 'nullable|url|max:255',
            'volumen' => 'nullable|string|max:255',
            'numero_serie' => 'nullable|integer|min:1',
            'pagina_de' => 'nullable|integer|min:0',
            'pagina_hasta' => 'nullable|integer|min:1',
            'anio_publicacion' => 'nullable|integer|min:1900|max:' . date('Y'),
            'mes_publicacion' => 'nullable|integer|min:1|max:12',
        ];
    }

    // add more publication type rules functions here
}
