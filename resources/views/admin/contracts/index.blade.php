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
            <a type="button"  href="{{url('/admin/contracts')}}"><i class="fa fa-refresh" aria-hidden="true"></i></a>&nbsp&nbsp&nbsp
           <b> Se encontraron {{ $contracts->count() }}  Resultados.</b>
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
          <div class="box-body">
            <div class="workers">
              <div class="col-lg-offset-1 col-lg-8">
                <h2>Contratos</h2>
              </div>
              <div class="row">
                <div class="col-lg-offset-1 col-lg-8">
                  <form method="get" action="{{ url('/searchcon') }}">
                    <div class="input-group">
                
                      <div class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                          <i class="fa fa-search"></i>
                        </button>
                      </div>
                      <input name="query" type="text" class="select-field-search" placeholder="Buscar Contrato">
              
                      </div>
                </form>
              </div>
            </div><br>
                <div class="row">
                <div class="col-lg-offset-1 col-lg-12">
              
                    <a href="{{ url('admin/contracts/create') }}"  class="buttonn" class="btn btn-success btn-sm">Nuevo Contrato&nbsp;&nbsp;
                      <i class="fa fa-plus"></i>
                    </a>
              
                    <a class="buttonn" target="_blanck" id="btnGenerarPdfcontrato" class="btn btn-success btn-sm">Genenerar PDF&nbsp;&nbsp;
                      <i class="fa fa-file-pdf-o"></i>
                    </a>
    
                    <a class="buttonn"  class="btn btn-success btn-sm">Genenerar Excel&nbsp;&nbsp;
                    <i class="fa fa-file-excel-o"></i>
                  </a>
              
                </div>
              </div>
            
<br>
              <div class="row">
                <div class="col-lg-offset-1 col-lg-10">
                  <table class="table table-hover ">
                    <thead>
                      <tr>
                        <th class="hidden">ID</th>
                        <th>Rut</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>C. Inicio</th>
                        <th>C. Termino</th>
                        <th>Contrato</th>
                        <th>AFP</th>
                        <th>Salud</th>
                        <th>Salario</th>
                        <th>Opciones</th>
                      </tr>
                    </thead>
                    <tbody>
  
                    @if(count($contracts)>0)
                      @foreach ($contracts as $contract)
                      <tr>
                      <td class="hidden">{{ $contract->id }}</td>
                        <td>{{ $contract->worker_rut }}</td>
                        <td>{{ $contract->worker_nombre }}</td>
                        <td>{{ $contract->worker_apellidos }}</td>
                        <td>{{ $contract->fechacontratoi }}</td>
                        <td>{{ $contract->fechacontratot }}</td>
                        <td>{{ $contract->contract_type_nombrecontrato }}</td>
                        <td>{{ $contract->afp_nombre_afp }}</td>
                        <td>{{ $contract->salud_nombre_salud }}</td>
                        <td>{{ $contract->sueldo }}</td>
                        <td class="td-actions">
                       
                          <a  href="" class="buttonnd-sm" title="Detalle del contrato" data-toggle="tooltip">
                            <i class="fa fa-eye"></i>
                          </a>
                    
                          <a href="{{ url('/admin/contracts/'.$contract->id.'/edit') }}" class="buttonne-sm" data-toggle="tooltip" title="editar contrato">
                          <i class="fa fa-pencil"></i>
                        </a>
                     
                          <form style="display:inline-block;"method="post" action="{{ url('/admin/contracts/'.$contract->id.'/delete') }}">
                          {{ csrf_field() }}
                  
                          <button  data-toggle="tooltip" class="buttonnde-sm" title="eliminar contrato">
                            <i class="fa fa-trash"></i>
                          </button>
               
                          </form>
                        </td>
                      </tr>
                    </tbody>
                    @endforeach
                    @else
                    <div style="position:absolute;visibility:visible z-index:1;top:-190px;left:722px;border-radius: 10px;opacity:0.8;"  class="buttonn">
                    <i class="fa fa-exclamation"></i> No se encontraron resultados! 
                    </div>
                    @endif 
                  </table>

                  {{ $contracts->links() }}

                </div>
              </div>
            </div>
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