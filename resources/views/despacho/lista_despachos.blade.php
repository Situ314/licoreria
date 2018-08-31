@extends('roles_login.Admin')

@section('cuerpo')
<script>
$(document).ready(function(){
    $("tbody tr").each(function(){
        $(this).children("td").each(function(){
            switch ($(this).html()) {
                case 'Asignado':
                    $("tbody tr").css("background-color", "#ECEEEB");
                break;
                case 'Entregado':
                    $("tbody tr").css("background-color", "#CBF5C1");
                break;
                case 'Dirección mal':
                    $(this).css("background-color", "#FFA5A5");
                break;
                case 'Sin cliente':
                    $(this).css("background-color", "#FFFFA5");
                break;
            }
        })
    })
});
</script>


<section id='tools'>
    <ul class='breadcrumb' id='breadcrumb'>
      <li class='title'>Despachos</li>
    </ul>
</section>
<div id='content'>
    <div>    
        <table border="1" class="table table-bordered table-hover table-responsive" id="mi-tabla" style="border-color: #8A0401;">
            <thead style="background-color: #8A0401;color: #fff;">
                <tr> 
                    <th> Nª </th>
                    <th> Despachador </th>
                    <th> Repartidor </th>
                    <th> Fecha </th>
                    <th> Estado </th>
                    <th> Acción </th>
                </tr> 
            </thead>
            <tbody>
                <?php $cont = 0;?>
                @forelse($despachos as $despacho) 
                <?php $cont++;?>
                <tr>
                    <td><?php echo $cont;?></td>
                    @foreach($usuarios as $usuario)
                        @if($despacho->CodDespachador == $usuario->id)
                        <td>{{$usuario->Nombre}}</td>
                        @endif
                    @endforeach
                    @foreach($usuarios as $usuario)
                        @if($despacho->CodRepartidor == $usuario->id)
                        <td>{{$usuario->Nombre}}</td>
                        @endif
                    @endforeach
                    <td>{{$despacho->created_at}}</td>
                    @foreach($estados as $estado)
                        @if($despacho->CodEstado == $estado->CodEstado)
                        <td>{{$estado->Nombre}}</td>
                        @endif
                    @endforeach
                    <td style="text-align: center;">
                        <a href="{{route('Despacho.show', $despacho->CodDespacho)}}" title="Ver registro" class="btn btn-danger"><i class="fa fa-eye" aria-hidden="true"></i></a>                              
                    </td>  
                </tr>
                @empty
                <p>No existen despachos registrados!</p>
                @endforelse
            </tbody>            
        </table>
    </div>
    <div class="row">
        {{$despachos->links()}} 
    </div>
</div>
@endsection