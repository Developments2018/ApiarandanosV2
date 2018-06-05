@extends('layouts.app') 
@section('content')
<!--Contenido-->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <!-- Main content -->
  <section class="content">
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
      </ul>
    </div>
    @endif
    <div class="row">
      <div class="col-lg-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title"></h3>
            <a type="button"  href="{{url('/admin/inventories')}}"><img class="l" src="{{asset('/img/l.png')}}"></a>
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

               <div class="row">
              <div style="background:#FBFCFC;border: 1px solid #E8D7EA  ;
    border-radius: 10px;-webkit-box-shadow: 8px 6px 19px 0px rgba(0,0,0,0.62);" class="col-sm-offset-1 col-sm-10">
                <div class="row">  
                  <div class="col-sm-offset-1 col-sm-5">
                    <h3 style="border-bottom : 1px solid #D2B4DE">Editar: {{ $article->nombre_articulo }}</h3>
                    </div>
                  <div class="col-sm-3">
              <img style="position:absolute;margin-left:-58px;margin-top:16px;" src="{{asset('/img/a.png')}}">
              </div>
              </div>

                <br>
                  <form class="form-horizontal" method="post" action="{{ url('/admin/inventories/'.$article->id.'/edit') }}">
                    {{ csrf_field() }}
                    <div class="row">
                    <div class="col-sm-offset-1 col-sm-2">
                        <label for="guia" class="control-label">N° Guia</label>
                      <div class="input-group">
                        <input maxlength="7" type="text" name="guia" id="guia" class="select-field-guia"  value=" {{ $article->guia }}" required>
                      </div>
                    </div>

                

                    <div class="col-sm-2">
                        <label for="min_stock" class="control-label">Stock Mínimo  <i data-toggle="tooltip" title="Genera una alerta si el stock actual es menor o igual al Stock minimo" class="fa fa-question-circle" aria-hidden="true"></i></label>
                      <div class="input-group">
                        <input maxlength="5" type="text" name="min_stock" id="min_stock" class="select-field-guia" value=" {{ $article->min_stock }}" required>
                      </div>
                    </div>

                    <div class="col-sm-2">
                        <label for="min_stock" class="control-label">Stock actual</label>
                      <div class="input-group">
                        <input maxlength="5" type="text" name="cantidad" id="min_stock" class="select-field-guia"  value=" {{ $article->cant }}" required>
                      </div>
                    </div>

                    <div id="sagg" class="col-sm-2">
                        <label for="sag" class="control-label">N° Sag </label>
                      <div class="input-group">
                        <input  maxlength="5" type="text" name="sag" id="sag" class="select-field-guia"  value=" {{ $article->sag }}">
                      </div>
                    </div>

                  <div id="reingresoo" class="col-sm">
                        <label for="reingreso" class="control-label">Periodo de reingreso</label>
                      <div class="input-group">
                        <input maxlength="30" type="text" name="reingreso" id="reingreso" class="select-field"  value=" {{ $article->reingreso }}">
                      </div>
                  </div>

                  </div>
                    
                  <div class="row">
                    <div class="col-sm-offset-1 col-lg-3">
                        <label for="fecha" class="control-label">Fecha</label>
                      <div class="input-group">
                        <input type="text" name="fecha" id="fecha" class="select-field"  value=" {{ $article->fecha }}" required>
                      </div>
                    </div>

                    <div class="col-lg-3">
                        <label for="nombre_articulo" class="control-label">Artículo</label>
                      <div class="input-group">
                        <input maxlength="30" type="text" name="nombre_articulo" id="nombre_articulo" class="select-field" value=" {{ $article->nombre_articulo }}" required>
                      </div>
                    </div>

                    <div class="col-lg-3">
                        <label for="descripcion" class="control-label">Descripción </label>
                      <div class="input-group">
                        <input maxlength="35" name="descripcion" id="descripcion" class="select-field"  value=" {{ $article->descripcion }}" required>
                      </div>
                    </div>

                    

                    <div class="col-sm-3">  
                        <label class="control-label"></label>
                      <div class="input-group">
                      </div>
                    </div>
                  </div>

                  
                  <div style="margin-left:60px"; class="col-sm-offset-1 col-sm-3">  
                      <label for="category_id" class="control-label">Categoría</label>
                      <div class="input-group">
                        <select  name="category_id" id="category" class="select-field">
                          @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if($category->id == old('category_id', $article->category_id)) selected @endif> {{ $category->categoria }}</option>
                            @endforeach
                        </select>
                      </div>
                  </div>

                  <div style="margin-left:8px"; class="col-sm-3"> 
                      <label for="article_states_id" class="control-label">Estado</label>
                      <div class="input-group">
                        <select  name="article_state_id" id="article_state_id" class="select-field">
                        @foreach ($article_states as $article_state)
                            <option value="{{ $article_state->id }}" @if($article_state->id == old('article_state_id', $article->article_state_id)) selected @endif> {{ $article_state->estado
                              }}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
              
                    <div style="margin-left:8px"; class="col-sm-3"> 
                       <div id="categoriass" class="col-sm">
                      <label for="sub_category_id" class="control-label">Sub Categoría</label>
                      <div class="input-group">
                        <select  name="sub_category_id" id="sub_category" class="select-field" >
                        <option value="">Seleccione Categoria</option>
                        @foreach ($subcategories as $subcategory)
                            <option value="{{ $subcategory->id }}" @if($subcategory->id == old('sub_category_id', $article->sub_category_id)) selected @endif> {{ $subcategory->subcategoria }}</option>
                            @endforeach
                        </select>
                      </div>
                      </div>

                    <div class="form-group hidden">
                      <div class="col-lg-2">
                        <label for="min_stock" class="control-label">User id </label>
                        <div class="input-group">
                          <span class="input-group-addon">
                            <i  class="fa fa-dot-circle-o" aria-hidden="true"></i>
                          </span>
                          <input type="text" name="user_id" id="min_stock" class="form-control" value="{{ $user->id}}" required>
                        </div>
                      </div>
                    </div>
                    </div>
                    <br>

<div class="form-group">
  <div class="col-lg-offset-7 col-sm-3">
  <label for="min_stock" class="control-label"></label>
    <div class="input-group">
  <button type="submit" class="buttonna">Actualizar articulo <i class="fa fa-floppy-o"></i></button>
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