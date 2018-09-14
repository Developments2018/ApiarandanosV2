@extends('layouts.app') @section('content')
<!--Contenido-->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <!-- Main content -->
  <section class="content">

    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title"></h3>
            <a type="button"  href="{{url('/admin/workers')}}" ><img class="l" src="{{asset('/img/l.png')}}"></a>
            <div class="box-tools pull-right">
            
              <button class="btn btn-box-tool" data-widget="collapse">
                <i class="fa fa-minus"></i>
              </button>

              <button class="btn btn-box-tool" data-widget="remove">
                <i class="fa fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.box-header -->
          <div  class="box-body">
               @if ($errors->any())
                <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                  </ul>
                </div>
                @endif
                
            <div  class="row">
              <div style="background:#FBFCFC;border: 1px solid #E8D7EA  ;
    border-radius: 10px;-webkit-box-shadow: 8px 6px 19px 0px rgba(0,0,0,0.62);" class="col-lg-offset-2 col-lg-7">
                <div class="row">
              <div class="col-lg-offset-1 col-sm-11">
              <h3>Registro de Ordenes de Trabajo</h3>
              </div>
              </div>

                <br>
                <form  class="form-horizontal" method="post" action="{{ url('/admin/workers') }}">
                  {{ csrf_field() }}
                  <div  class="form-group">
                    <div class="col-sm-offset-1 col-sm-5">
                      <label for="rut" class="control-label">Identificador</label>
                      <div class="input-group">
                        <input type="text" name="rut" id="rut" class="select-field" required value="{{old('rut')}}">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-1  col-sm-5">
                      <label for="nombres" class="control-label">Seleccione Cliente</label>
                      <div class="input-group">
                        <input  type="text" name="nombre" id="nombres" class="select-field" required value="{{old('nombre')}}">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <label for="apellidos" class="control-label">Estado</label>
                      <div class="input-group">
                        <input type="text" name="apellidos" class="select-field" id="apellidos" required value="{{old('apellidos')}}">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-7  col-sm-5">
                    <label for="direccion" class="control-label"></label>
                      <div class="input-group">
                    <button type="submit" class="buttonna">Agregar Trabajador <i class="fa fa-floppy-o"></i></button>
                    </div>
                    </div>
                  </div>


                </form>

              </div>
            </div>

          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!--Fin-Contenido-->
@endsection