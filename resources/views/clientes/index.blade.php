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
                @include('includes.mensaje')
                                <div class="card card-outline card-success">
                                    <div class="card-header">
                                        <h4 class="font-semibold text-xl text-gray-800 leading-tight">
                                            Clientes
                                        </h4>
                                        <div class="card-tools">
                                            <div style: align="right">
                                                <a href="{{route('clientes.crear')}}" class="btn btn-block btn-success btn-sm">
                                                    Registrar un Cliente nuevo <i class="fa fa-fw fa-plus-circle pl-1"></i></a>
                                            </div>
                                        </div>
                                    </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class='thead-dark '>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Telefono</th>
                                <th scope="col">Email</th>&nbsp
                                <th scope="col">Domicilio</th>
                                <th scope="col">Editar</th>
                                <th scope="col">Eliminar</th>

                            </thead>
                            <tbody>
                            @foreach($clientes as $cli)
                                <tr>
                                    <td>{{$cli->cli_id}}</td>
                                    <td>{{$cli->cli_name}}</td>
                                    <td>{{$cli->cli_apellido}}</td>
                                    <td>{{$cli->cli_telefono}}</td>
                                    <td>{{$cli->cli_email}}</td>
                                    <td>{{$cli->cli_domicilio}}</td>
                                    <td>
                                        <div><a href="" class="btn-accion-tabla mr-4" data-toggle="tooltip" title="Editar este registro">
                                                <i class="far fa-edit"></i></a></div>
                                    </td>
                                    <td>
                                        <div> <a href="" class="btn-accion-tabla eliminar-registro" data-toggle="tooltip" title="Eliminar este registro">
                                                <i class="text-danger far fa-trash-alt"></i></a></div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                                </div>


            </div>
        </div>
    </div>
</x-app-layout>
