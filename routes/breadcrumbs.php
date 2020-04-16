<?php
// Home
Breadcrumbs::for('home', function ($trail) {
  $trail->push("Home", route('home'));
});
 
// Home > [Dpto]
Breadcrumbs::for('dpto.carreras', function ($trail,$dpto) {
  $trail->parent('home');
  $trail->push($dpto->nombre_dpto, route('dpto.carreras', $dpto->slug_dpto));
});
 
// Home > [Dpto] > [Carrera]
Breadcrumbs::for('dpto.materias', function ($trail,$dpto, $carrera) {
  $trail->parent('dpto.carreras',$dpto);
  $trail->push($carrera->nombre_carrera, route('dpto.materias',[$dpto->slug_dpto, $carrera->slug_carrera]));
});
 
// Home > [Dpto] > [Carrera] > [Materia]
Breadcrumbs::for('dpto.apuntes', function ($trail,$dpto, $carrera, $materia) {
    $trail->parent('dpto.materias', $dpto, $carrera);
    $trail->push($materia->nombre_materia, route('dpto.apuntes',[$dpto->slug_dpto, $carrera->slug_carrera,$materia->slug_materia]));
});

// Home > [Dpto] > [Carrera] > [Materia] > apunte
Breadcrumbs::for('show.apunte', function ($trail,$dpto, $carrera, $materia, $apunte) {
    $trail->parent('dpto.apuntes', $dpto, $carrera,$materia);
    $trail->push($apunte->nombre_apunte, route('dpto.apuntes',[$dpto->slug_dpto, $carrera->slug_carrera,$materia->slug_materia, $apunte->nombre_apunte]));
}); 