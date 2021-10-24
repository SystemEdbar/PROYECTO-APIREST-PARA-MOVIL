<x-app-layout>
    <x-slot name="header">
        <h4 class="font-semibold text-xl text-gray-800 leading-tight">
            Bienvendio al Menu de Clientes
        </h4>
    </x-slot>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="card card-outline card-success">
                    <div class="card-header">
                        <h3 class="card-title"><strong>Registrar un Nuevo Cliente</strong></h3>
                        <div class="card-tools">
                            <div style: align="right"><a href="{{route('clientes')}}" class="btn btn-block btn-sm" style="background-color: #4CABCC ">
                                    Regresar al Listado <i class="fas fa-arrow-circle-left pl-1"></i></a>
                            </div>
                        </div>
                    </div>
<br>
                    <form action="{{route('clientes.guardar')}}" id="form-general" class="form-horizontal" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body text-center">
                            <div class="form-group row">
                                <label for="per_nit" class="col-sm-12 col-lg-3 control-label text-sm-right text-lg-right requerido">Nombre</label>
                                <div class="col-sm-12 col-lg-8">
                                    <input name="cli_nit" value="{{old('cch_nombre')}}"type="text" class="form-control" id="exampleInputPassword1" maxlengt="25"  required>
                                </div>
                            </div><br>
                            <div class="form-group row">
                                <label for="per_nit" class="col-sm-12 col-lg-3 control-label text-sm-right text-lg-right requerido">Apellido</label>
                                <div class="col-sm-12 col-lg-8">
                                    <input name="cli_nombre" value="{{old('cch_nombre')}}"type="text" class="form-control" id="exampleInputPassword1" maxlengt="25" required>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="per_nit" class="col-sm-12 col-lg-3 control-label text-sm-right text-lg-right requerido">Telefono</label>
                                <div class="col-sm-12 col-lg-8">
                                    <input name="cli_telefono" value="{{old('cch_nombre')}}"type="text" class="form-control" id="exampleInputPassword1" maxlengt="25" placeholder="########" required>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="per_nit" class="col-sm-12 col-lg-3 control-label text-sm-right text-lg-right requerido">Email</label>
                                <div class="col-sm-12 col-lg-8">
                                    <input name="cli_email" value="{{old('cch_nombre')}}"type="text" class="form-control" id="exampleInputPassword1" maxlengt="25" placeholder="ejemplo@correo.com" required>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="per_nit" class="col-sm-12 col-lg-3 control-label text-sm-right text-lg-right requerido">Domicilio</label>
                                <div class="col-sm-12 col-lg-8">
                                    <input name="cli_imagen" value="{{old('cch_nombre')}}"type="file" class="form-control" id="exampleInputPassword1" maxlengt="25" required>
                                </div>
                            </div>
                            <br>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-lg-4"></div>
                                <div class="col-lg-4 text-center">
                                    @include('includes.boton-form-crear')
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
