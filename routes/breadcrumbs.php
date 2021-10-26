<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use App\Models\Subject;
use App\Models\author;
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('inicio', function (BreadcrumbTrail $trail) {
    $trail->push('Inicio', route('inicio'));
});
Breadcrumbs::for('year', function (BreadcrumbTrail $trail) {
    $trail->parent('inicio');
    $trail->push('Registros por Años', route('year'));
});

Breadcrumbs::for('year.show', function (BreadcrumbTrail $trail, String $year) {
    $trail->parent('year');
    $trail->push($year, route('year.show', ['year'=>$year]));
});

Breadcrumbs::for('subject.index', function (BreadcrumbTrail $trail) {
    $trail->parent('inicio');
    $trail->push('Registros por Tematicas', route('subject.index'));
});

Breadcrumbs::for('subject.show', function (BreadcrumbTrail $trail, Subject $subject) {
    $trail->parent('subject.index');
    $trail->push($subject->name, route('subject.show', $subject));
});

Breadcrumbs::for('author.index', function (BreadcrumbTrail $trail) {
    $trail->parent('inicio');
    $trail->push('Registros por Autores', route('author.index'));
});
Breadcrumbs::for('author.show', function (BreadcrumbTrail $trail, Author $author) {
    $trail->parent('author.index');
    $trail->push($author->given.' '.$author->family, route('author.show', $author));
});
Breadcrumbs::for('registro.index', function (BreadcrumbTrail $trail) {
    $trail->parent('inicio');
    $trail->push('Registros', route('registro.index'));
});
Breadcrumbs::for('Registrolatest', function (BreadcrumbTrail $trail) {
    $trail->parent('registro.index');
    $trail->push('Ultimos registros', route('Registrolatest'));
});
