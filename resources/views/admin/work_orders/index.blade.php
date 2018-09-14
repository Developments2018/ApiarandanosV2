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
            <a type="button"  href="{{url('/admin/workers')}}"><i class="fa fa-refresh" aria-hidden="true"></i></a>&nbsp&nbsp&nbsp
           <b> Se encontraron  {{ $work_orders->count() }} Resultados.</b>
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
                <h2>Ordenes de Trabajo</h2>
              </div>
              <div class="row">
                <div class="col-lg-offset-1 col-lg-8">
                  <form method="get" action="{{ url('/search') }}">
                    <div class="input-group">
                    @can('workers.show')
                      <div class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                          <i class="fa fa-search"></i>
                        </button>
                      </div>
                      <input name="query" type="text" class="select-field-search" placeholder="Buscar Orden de Trabajo">
                      @endcan
                      </div>
                </form>
              </div>
            </div><br>
                <div class="row">
                <div class="col-lg-offset-1 col-lg-12">
                  @can('workers.create')
                    <a class="buttonn" href="{{ url('admin/work_orders/create') }}" class="btn btn-success btn-sm">Nuevo OT&nbsp;&nbsp;
                      <i class="fa fa-plus"></i>
                    </a>
                    @endcan
                    @can('workers.gpdf')
                    <a class="buttonn" target="_blanck" id="btnGenerarPdf" class="btn btn-success btn-sm">Genenerar PDF&nbsp;&nbsp;
                      <i class="fa fa-file-pdf-o"></i>
                    </a>
    
                    <a class="buttonn" href="{{ route('workers.excelw') }}" class="btn btn-success btn-sm">Genenerar Excel&nbsp;&nbsp;
                    <i class="fa fa-file-excel-o"></i>
                  </a>
                  @endcan
                </div>
              </div>
            
<br>
              <div class="row">
                <div class="col-lg-offset-1 col-lg-10">
                  <table class="table table-hover ">
                    <thead>
                      <tr>
                        <th class="hidden">ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Cliente Id</th>
                        <th>Opciones</th>
                      </tr>
                    </thead>
                    <tbody>
                    @if(count($work_orders)>0)
                      @foreach ($work_orders as $work_order)
                      <tr>
                        <td class="hidden">{{ $work_order->id }}</td>
                        <td>{{ $work_order->nombre }}</td>
                        <td>{{ $work_order->descripcion }}</td>
                        <td>{{ $work_order->cliente_id }}</td>
                        <td>
                        @can('workers.edit')
                          <a href="{{ url('/admin/work_orders/'.$work_order->id.'/edit') }}" class="buttonne-sm" data-toggle="tooltip" title="editar OT">
                            <i class="fa fa-pencil"></i>
                          </a>
                          @endcan
                          <form style="display:inline-block;" method="post" action="{{ url('/admin/work_orders/'.$work_order->id.'/delete') }}">
                          {{ csrf_field() }}
                          @can('workers.destroy')
                          <button  data-toggle="tooltip" class="buttonnde-sm" title="eliminar OT">
                            <i class="fa fa-trash"></i>
                          </button>
                          @endcan
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

                  {{ $work_orders->links() }}

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