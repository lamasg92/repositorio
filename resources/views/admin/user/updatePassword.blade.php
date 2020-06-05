@extends('layouts.main')

@section('content')
  <div class="container-fluid spark-screen">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">

            <div class="box box-info">

                <div class="box-header with-border">
                  <h3 class="box-title">Cambiar contraseña</h3>
                 </div>

                  <div class="box-body">
                      <p class="statusMsg"></p>

                        {!! Form::open(['route'=>'users.updateMyPassword', 'method'=>'POST'])!!}

                          <div class="form-group">
                              <label for="actualPass">Ingrese contraseña Actual</label>
                              <input type="password" class="form-control" required="true" 
                             name="actualPass" id="actualPass" />
                          </div>
                          <div class="form-group">
                              <label for="nuevaPass1">Ingrese nueva contraseña</label>
                              <input id="nuevaPass1" type="password" class="form-control" required="true" name="nuevaPass1" minlength=8  />
                          </div>
                          <div class="form-group">
                              <label for="nuevaPass2">Repita nueva contraseña</label>
                              <input id="nuevaPass2" type="password" class="form-control" required="true" name="nuevaPass2"  minlength=8  />
                          </div>
                          <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                          <input type="submit"  class="btn btn-primary" value="Actualizar">
                        </div>
                         {!! Form::close() !!}
                  </div>

              </div>

        </div>
    </div>
</div>
@endsection


    