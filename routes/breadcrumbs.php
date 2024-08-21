<?php

// Home
Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push('Home', route('dashboard'));
});

// Home > Secciones
Breadcrumbs::for('secciones', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Secciones', route('secciones'));
});

// Home > Equipo
Breadcrumbs::for('equipo', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Equipo', route('equipo'));
});

// Home > Parametros
Breadcrumbs::for('parametros', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Parámetros', route('parametros'));
});

// Home > Usuarios
Breadcrumbs::for('usuarios', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Usuarios', route('usuarios'));
});

// Home > Configuracion
Breadcrumbs::for('configuracion', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Configuracion', route('configuracion'));
});

// Home > Nueva seccion
Breadcrumbs::for('nueva-seccion', function ($trail) {
    $trail->parent('secciones');
    $trail->push('Nueva sección', route('nueva-seccion'));
});

// Home > Secciones > [EditarSeccion]
Breadcrumbs::for('editar-seccion', function ($trail, $id) {
    $trail->parent('secciones');
    $trail->push('Editar sección', route('editar-seccion', $id));
});

// Home > Secciones > [EditarSeccion]
Breadcrumbs::for('redactar-seccion', function ($trail, $id) {
    $trail->parent('secciones');
    $trail->push('Redactar sección', route('redactar-seccion', $id));
});

Breadcrumbs::for('tarjetas', function ($trail, $idseccion) {
    $trail->parent('secciones');
    $trail->push('Tarjetas', route('tarjetas', $idseccion));
});

Breadcrumbs::for('tarjetas-nueva', function ($trail, $idseccion) {
    $trail->parent('secciones');
    $trail->push('Nueva Tarjeta', route('tarjetas-nueva', $idseccion));
});

Breadcrumbs::for('tarjetas-editar', function ($trail, $id) {
    $trail->parent('secciones');
    $trail->push('Editar Tarjeta', route('tarjetas-editar', $id));
});

Breadcrumbs::for('notas', function ($trail, $idseccion) {
    $trail->parent('secciones');
    $trail->push('Notas', route('notas', $idseccion));
});

Breadcrumbs::for('notas-nueva', function ($trail, $idseccion) {
    $trail->parent('secciones');
    $trail->push('Nueva Nota', route('notas-nueva', $idseccion));
});

Breadcrumbs::for('notas-editar', function ($trail, $id) {
    $trail->parent('secciones');
    $trail->push('Editar Nota', route('notas-editar', $id));
});

Breadcrumbs::for('datos', function ($trail, $idseccion) {
    $trail->parent('secciones');
    $trail->push('Datos', route('datos', $idseccion));
});

Breadcrumbs::for('datos-nuevo', function ($trail, $idseccion) {
    $trail->parent('secciones');
    $trail->push('Nueo Dato', route('datos-nuevo', $idseccion));
});

Breadcrumbs::for('datos-editar', function ($trail, $id) {
    $trail->parent('secciones');
    $trail->push('Editar Dato', route('datos-editar', $id));
});

Breadcrumbs::for('integrante-nuevo', function ($trail) {
    $trail->parent('equipo');
    $trail->push('Nuevo integrante', route('integrante-nuevo'));
});

Breadcrumbs::for('integrante-editar', function ($trail, $id) {
    $trail->parent('equipo');
    $trail->push('Editar integrante', route('integrante-editar', $id));
});

Breadcrumbs::for('parametros-nuevo', function ($trail) {
    $trail->parent('parametros');
    $trail->push('Nuevo parámetro', route('parametros-nuevo'));
});

Breadcrumbs::for('parametros-editar', function ($trail, $id) {
    $trail->parent('parametros');
    $trail->push('Editar parámetro', route('parametros-editar', $id));
});

Breadcrumbs::for('usuarios-nuevo', function ($trail) {
    $trail->parent('usuarios');
    $trail->push('Nuevo usuario', route('usuarios-nuevo'));
});

Breadcrumbs::for('usuarios-editar', function ($trail, $id) {
    $trail->parent('usuarios');
    $trail->push('Editar usuario', route('usuarios-editar', $id));
});

/*
// Home > Blog > [Category]
Breadcrumbs::for('category', function ($trail, $category) {
    $trail->parent('blog');
    $trail->push($category->title, route('category', $category->id));
});

// Home > Blog > [Category] > [Post]
Breadcrumbs::for('post', function ($trail, $post) {
    $trail->parent('category', $post->category);
    $trail->push($post->title, route('post', $post->id));
});
*/
