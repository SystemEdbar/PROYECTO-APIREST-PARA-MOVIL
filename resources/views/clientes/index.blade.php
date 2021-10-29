<x-app-layout>
    <x-slot name="header">
        <h4 class="font-semibold text-xl text-gray-800 leading-tight">
            Bienvendio al Menu de Clientes
            @include('sweetalert::alert')
        </h4>
    </x-slot>

    <script src="{{asset("assets/js/scripts.js")}}" type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
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
                        <table class="table table-striped table-hover" id="datable">
                            <thead class='table-dark' style="height: 50px">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nit</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Telefono</th>
                                <th scope="col">Email</th>&nbsp
                                <th scope="col">Imagen</th>
                                <th scope="col">Editar</th>
                                <th scope="col">Eliminar</th>

                            </thead>
                            <tbody>
                            @foreach($clientes as $cli)
                                <tr>
                                    <td>{{$cli->cli_id}}</td>
                                    <td>{{$cli->cli_nit}}</td>
                                    <td>{{$cli->cli_nombre}}</td>
                                    <td>{{$cli->cli_telefono}}</td>
                                    <td>{{$cli->cli_email}}</td>
                                    <td>
                                        <img class="img-fluid" src="{{$cli->cli_imagen}}" width="100"/>
                                    </td>
                                    <td>
                                        <div><a href="{{route('clientes.editar', ['id'=>$cli->cli_id])}}" class="btn-accion-tabla mr-4" data-toggle="tooltip" title="Editar este registro">
                                                <i class="far fa-edit"></i></a></div>
                                    </td>
                                    <td>
                                        <div> <a href="{{route('clientes.eliminar', ['id'=>$cli->cli_id])}}" class="btn-accion-tabla eliminar-registro" data-toggle="tooltip" title="Eliminar este registro">
                                                <i class="text-danger far fa-trash-alt"></i></a></div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <script>
                            $(document).ready(function()
                            {
                                $('#datable').DataTable(
                                    {
                                        "language": {
                                            "decimal":        "",
                                            "emptyTable":     "No hay datos disponibles para la tabla",
                                            "info":           "Mostrando _START_ a _END_ de _TOTAL_ registros",
                                            "infoEmpty":      "Mostrando 0 a 0 de 0 registros",
                                            "infoFiltered":   "(filtrado de _MAX_ registros totales)",
                                            "infoPostFix":    "",
                                            "thousands":      ",",
                                            "lengthMenu":     "Mostrando _MENU_ registros por página",
                                            "loadingRecords": "Cargando...",
                                            "processing":     "Procesando...",
                                            "search":         "Búsqueda:",
                                            "zeroRecords":    "No se encontraron registros que cumplan el criterio",
                                            "paginate": {
                                                "first":      "Primero",
                                                "last":       "Último",
                                                "next":       "Siguiente",
                                                "previous":   "Previo"
                                            },
                                            "aria": {
                                                "sortAscending":  ": Activar ordenamiento ascendente",
                                                "sortDescending": ": Activar ordenamiento descendente"
                                            }
                                        }
                                    }
                                );
                            } );

                        </script>


                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

</x-app-layout>
