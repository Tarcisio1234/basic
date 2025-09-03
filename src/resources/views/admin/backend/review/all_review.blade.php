@extends('admin.admin_master')
@section('admin')

<div class="content">
    <!-- Start Content-->
    <div class="container-xxl">
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Todas as avaliações</h4>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Lista de Avaliações</h5>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>Numero sereal</th>
                                    <th>Nome</th>
                                    <th>Posição</th>
                                    <th>Imagem</th>
                                    <th>Mensagem</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reviews as $key=> $item)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->position}}</td>
                                    <td><img src="{{ asset($item->image)}}" style="width:70px; height:40px;"></td>
                                    <td>{{$item->message}}</td>
                                    <td><a href="{{ route('edit.review',$item->id)}}" class="btn btn-success rounded-pill">Editar</a></td>
                                    <td><a href="{{ route('delete.review',$item->id)}}" id="delete" class="btn btn-danger rounded-pill">Excluir</a></td>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#datatable').DataTable({
        responsive: true,
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/pt-BR.json'
        }
    });
});
</script>

@endsection