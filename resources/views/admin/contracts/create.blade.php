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
                        <a type="button" href="{{url('/admin/contracts')}}">
                            <img class="l" src="{{asset('/img/l.png')}}">
                        </a>
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
                            <div style="background:#FBFCFC;border: 1px solid #E8D7EA  ;
    border-radius: 10px;-webkit-box-shadow: 8px 6px 19px 0px rgba(0,0,0,0.62);" class="col-lg-offset-2 col-lg-7">
                                <div class="row">
                                    <div class="col-lg-offset-1 col-sm-6">
                                        <h3 style="border-bottom : 1px solid #D2B4DE">Registro de Contratos</h3>
                                    </div>
                                    <div class="col-sm-3">
                                        <img style="position:absolute;margin-left:-68px;margin-top:6px;" src="{{asset('/img/conn.png')}}">
                                    </div>
                                </div>

                                <br>
                                <form class="form-horizontal" method="post" action="{{ url('/admin/contracts') }}">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <div class=" col-sm-offset-1 col-sm-5">
                                            <label for="worker_id" class="control-label">Seleccione rut</label>
                                            <div class="input-group">
                                            <select data-live-search="true" name="worker_id" id="worker_id" class="selectpicker" >
                                                <option value="" >Seleccione rut</option>
                                                @foreach ($workers as $worker)
                                                <option value="{{ $worker->id }}"@if(old('worker_id') == $worker->id) {{ 'selected' }} @endif>{{ $worker->rut }}  </option>
                                                @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="fechacontratoi" class="control-label">Inicio contrato</label>
                                            <div class="input-group">
                                                <input value="{{old('fechacontratoi')}}" type="date" maxlength="12" name="fechacontratoi" id="fechacontratoi" class="select-field" required value="{{old('fechacontratoi')}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class=" col-sm-offset-1 col-sm-5">
                                            <label for="fechacontratot" class="control-label">Termino contrato</label>
                                            <div class="input-group">
                                                <input value="{{old('fechacontratot')}}" type="date" maxlength="12" name="fechacontratot" id="fechacontratot" class="select-field" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="correo" class="control-label">Correo electronico</label>
                                            <div class="input-group">
                                                <input   value="{{old('correo')}}" type="email" maxlength="36" name="correo" id="correo" class="select-field" required >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class=" col-sm-offset-1 col-sm-5">
                                            <label for="civil" class="control-label">Estado civil</label>
                                            <div class="input-group">
                                                <select data-live-search="true" name="civil" id="civil" class="select-field">
                                                <option value="">Seleccione estado civil</option>
                                                @foreach($civils as $civil)
                                                    <option value="{{ $civil->id }}" @if(old('civil') == $civil->id) {{ 'selected' }} @endif>{{ $civil->estado_civil }}  </option>
                                                @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="afp" class="control-label">AFP</label>
                                            <div class="input-group">
                                                <select data-live-search="true" name="afp" id="afp" class="select-field">
                                                <option value="" >Seleccione AFP</option>
                                                @foreach ($afps as $afp)
                                                <option value="{{ $afp->id }}"@if(old('afp_id') == $afp->id) {{ 'selected' }} @endif>{{ $afp->nombre_afp }}  </option>
                                                @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class=" col-sm-offset-1 col-sm-5">
                                            <label for="salud" class="control-label">Salud</label>
                                            <div class="input-group">
                                                <select data-live-search="true" name="salud" id="salud" class="select-field">
                                                    <option value="">Seleccione Salud </option>
                                
                                                    @foreach ($saluds as $salud)
                                                <option value="{{ $salud->id }}"@if(old('salud_id') == $afp->id) {{ 'selected' }} @endif>{{ $salud->nombre_salud }}  </option>
                                                @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="alergia" class="control-label">Alergico</label>
                                            <div class="input-group">
                                                <select data-live-search="true" name="alergia" id="alergia" class="select-field">
                                                    <option value="">Seleccione alergias </option>
                                                    <option value="No"@if (old('alergia') == "No") {{ 'selected' }} @endif>No</option>
                                                    <option value="Si"@if (old('alergia') == "Si") {{ 'selected' }}  @endif>Si</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class=" col-sm-offset-1 col-sm-5">
                                            <label for="contracttype" class="control-label">Tipo de contrato</label>
                                            <div class="input-group">
                                                <select data-live-search="true" name="contracttype" id="contracttype" class="select-field">
                                                <option value="">Seleccione contrato</option>
                                
                                @foreach ($contract_types as $contract_type)
                            <option value="{{ $contract_type->id }}"@if(old('nombrecontrato') == $afp->id) {{ 'selected' }} @endif>{{ $contract_type->nombrecontrato }}  </option>
                            @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="sueldo" class="control-label">Sueldo bruto</label>
                                            <div class="input-group">
                                            <input value="276000" type="text" maxlength="10" name="sueldo" id="sueldo" class="select-field" required placeholder="276.000" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class=" col-sm-offset-1 col-sm-5">
                                        <label for="tercera" class="control-label">Tercera edad</label>
                                            <div class="input-group">
                                            <select data-live-search="true" name="tercera" id="tercera" class="select-field">
                                                    <option value="">Seleccione condicion </option>
                                                    <option value="No aplica"@if (old('tercera') == "No aplica") {{ 'selected' }} @endif>No aplica</option>
                                                    <option value="Si, pensionado(a)"@if (old('tercera') == "Si, pensionado(a) y cotiza") {{ 'selected' }} @endif>Si, pensionado(a) y cotiza</option>
                                                    <option value="Si, pensionado(a)"@if (old('tercera') == "Si, pensionado(a) y no cotiza") {{ 'selected' }} @endif>Si, pensionado(a) y no cotiza</option>
                                            
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="cronica" class="control-label">Enfermedad cronica</label>
                                            <div class="input-group">
                                            <input value="{{old('cronica')}}" type="text" maxlength="35" name="cronica" id="cronica" class="select-field" required>
                                        </div>
                                    </div> </div>
                                    <div class="form-group">
                                        <div class=" col-sm-offset-1 col-sm-5">
                                        <label for="alergia" class="control-label"></label>
                                            <div class="input-group">
                                            <button type="submit" class="buttonna">Agregar Contrato <i class="fa fa-floppy-o"></i></button>
                                        </div>
                                        </div>
                                        <div class="col-lg-4">
                                        
                                    </div> </div>
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