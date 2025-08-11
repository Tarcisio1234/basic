@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="content">

                    <!-- Start Content-->
                    <div class="container-xxl">

                        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                            <div class="flex-grow-1">
                                <h4 class="fs-18 fw-semibold m-0">Adicionar Avaliação</h4>
                            </div>
                        </div>

<div class="row">
                            <div class="col-12">
                                <div class="card">

                                    <div class="card-body">


                                        <ul class="nav nav-underline border-bottom pt-2" id="pills-tab" role="tablist">
                    
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link active p-2" id="setting_tab" data-bs-toggle="tab" href="#profile_setting" role="tab" aria-selected="true">
                                                    <span class="d-block d-sm-none"><i class="mdi mdi-cog"></i></span>
                                                    <span class="d-none d-sm-block">Adicionar avaliação</span>
                                                </a>
                                            </li>
                                        </ul>

                                            <div class="tab-content" id="pills-tabContent">
                                                <div class="tab-pane fade show active pt-4" id="profile_setting" role="tabpanel" aria-labelledby="setting_tab">
                                                    
                                                    <div class="row">
                                                            <div class="col-lg-6 col-xl-6">
                                                                <div class="card border mb-0">

                                                                    <div class="card-header">
                                                                        <div class="row align-items-center">
                                                                            <div class="col">                      
                                                                                <h4 class="card-title mb-0">Dados da Avaliação</h4>                      
                                                                            </div><!--end col-->                                                       
                                                                        </div>
                                                                    </div>
                                                                    <form action="{{ route('store.review') }}" method="POST" enctype="multipart/form-data">
                                                                        @csrf
                                                                    <div class="card-body">
                                                                        <div class="form-group mb-3 row">
                                                                            <label class="form-label">Nome</label>
                                                                            <div class="col-lg-12 col-xl-12">
                                                                                <input class="form-control" type="text" name="name" placeholder="Digite o nome completo" required>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group mb-3 row">
                                                                            <label class="form-label">Posição/Cargo</label>
                                                                            <div class="col-lg-12 col-xl-12">
                                                                                <input class="form-control" type="text" name="position" placeholder="Ex: CEO, Gerente, Cliente, etc." required>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group mb-3 row">
                                                                            <label class="form-label">Mensagem da Avaliação</label>
                                                                            <div class="col-lg-12 col-xl-12">
                                                                                <textarea class="form-control" rows="4" name="message" placeholder="Digite a mensagem de avaliação..." required></textarea>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group mb-3 row">
                                                                            <label class="form-label">Foto da Pessoa</label>
                                                                            <div class="col-lg-12 col-xl-12">
                                                                                <input class="form-control" type="file" name="image" id="image" accept="image/*" required>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group mb-3 row">
                                                                            <label class="form-label">Pré-visualização</label>
                                                                            <div class="col-lg-12 col-xl-12">
                                                                                <img id="showImage" src="{{ url('upload/no_image.jpg') }}" class="rounded-circle avatar-xxl img-thumbnail float-start" alt="Pré-visualização da imagem">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <div class="col-lg-12 col-xl-12">
                                                                                <button type="submit" class="btn btn-primary">Salvar Avaliação</button>
                                                                                <a href="{{ route('all.review') }}" class="btn btn-secondary">Cancelar</a>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                    </div><!--end card-body-->
                                                                </div>
</div>

                                                                    </div><!--end card-body-->
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div><!-- end profile_setting -->
                                        </div> <!-- end tab-content -->
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
</div>
<!--Função para pré-visualização da foto de perfil-->
<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(){
                $('#showImage').attr('src', reader.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        })
    })
</script>

@endsection