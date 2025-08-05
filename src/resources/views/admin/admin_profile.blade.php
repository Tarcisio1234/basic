@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="content">

                    <!-- Start Content-->
                    <div class="container-xxl">

                        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                            <div class="flex-grow-1">
                                <h4 class="fs-18 fw-semibold m-0">Perfil</h4>
                            </div>
                        </div>

<div class="row">
                            <div class="col-12">
                                <div class="card">

                                    <div class="card-body">

                                        <div class="align-items-center">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ !empty($profileData->photo) ? url('upload/user_images/' .$profileData->photo) : url('upload/no_image.jpg') }}" class="rounded-circle avatar-xxl img-thumbnail float-start" alt="image profile">

                                                <div class="overflow-hidden ms-4">
                                                    <h4 class="m-0 text-dark fs-20">{{ $profileData->name }}</h4>
                                                    <p class="my-1 text-muted fs-16">{{ $profileData->email }}</p>
                                                </div>
                                            </div>
                                        </div>

                                        <ul class="nav nav-underline border-bottom pt-2" id="pills-tab" role="tablist">
                    
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link active p-2" id="setting_tab" data-bs-toggle="tab" href="#profile_setting" role="tab" aria-selected="true">
                                                    <span class="d-block d-sm-none"><i class="mdi mdi-cog"></i></span>
                                                    <span class="d-none d-sm-block">Configurações</span>
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
                                                                                <h4 class="card-title mb-0">Informações Pessoais</h4>                      
                                                                            </div><!--end col-->                                                       
                                                                        </div>
                                                                    </div>
                                                                    <form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data">
                                                                        @csrf
                                                                    <div class="card-body">
                                                                        <div class="form-group mb-3 row">
                                                                            <label class="form-label">Nome</label>
                                                                            <div class="col-lg-12 col-xl-12">
                                                                                <input class="form-control" type="text" name="name" value="{{ $profileData->name }}">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group mb-3 row">
                                                                            <label class="form-label">Endereço de E-mail</label>
                                                                            <div class="col-lg-12 col-xl-12">
                                                                                <div class="input-group">
                                                                                    <span class="input-group-text"><i class="mdi mdi-email"></i></span>
                                                                                    <input type="email" class="form-control" value="{{ $profileData->email }}" name="email" aria-describedby="basic-addon1">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group mb-3 row">
                                                                            <label class="form-label">Telefone</label>
                                                                            <div class="col-lg-12 col-xl-12">
                                                                                <input class="form-control" type="text" name="phone" value="{{ $profileData->phone }}">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group mb-3 row">
                                                                            <label class="form-label">Endereço</label>
                                                                            <div class="col-lg-12 col-xl-12">
                                                                                <textarea class="form-control" rows="3" name="address">{{ $profileData->address }}</textarea>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group mb-3 row">
                                                                            <label class="form-label">Foto do Perfil</label>
                                                                            <div class="col-lg-12 col-xl-12">
                                                                                <input class="form-control" type="file" name="photo" id="image" value="{{ $profileData->photo }}">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group mb-3 row">
                                                                            <label class="form-label"></label>
                                                                            <div class="col-lg-12 col-xl-12">
                                                                                <img id="showImage" src="{{ !empty($profileData->photo) ? url('upload/user_images/' .$profileData->photo) : url('upload/no_image.jpg') }}" class="rounded-circle avatar-xxl img-thumbnail float-start" alt="image profile">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <div class="col-lg-12 col-xl-12">
                                                                                <button type="submit" class="btn btn-primary">Atualizar Perfil</button>
                                                                                <button type="button" class="btn btn-secondary">Cancelar</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                    </div><!--end card-body-->
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6 col-xl-6">
                                                                <div class="card border mb-0">

                                                                    <div class="card-header">
                                                                        <div class="row align-items-center">
                                                                            <div class="col">                      
                                                                                <h4 class="card-title mb-0">Alterar Senha</h4>                      
                                                                            </div><!--end col-->                                                       
                                                                        </div>
                                                                    </div>

                                                                    <form action="{{ route('admin.passoword.updatePassword') }}" method="POST">
                                                                        @csrf
                                                                    <div class="card-body mb-0">
                                                                        <div class="form-group mb-3 row">
                                                                            <label class="form-label">Senha Atual</label>
                                                                            <div class="col-lg-12 col-xl-12">
                                                                                <input class="form-control @error('old_password') is-invalid @enderror" type="password" placeholder="Senha Atual" id="old_password" name="old_password" required>
                                                                                @error('old_password')
                                                                                <span class="text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group mb-3 row">
                                                                            <label class="form-label">Nova Senha</label>
                                                                            <div class="col-lg-12 col-xl-12">
                                                                                <input class="form-control @error('new_password') is-invalid @enderror" type="password" placeholder="Nova Senha" id="new_password" name="new_password" required>
                                                                                @error('new_password')
                                                                                <span class="text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group mb-3 row">
                                                                            <label class="form-label">Confirmar Senha</label>
                                                                            <div class="col-lg-12 col-xl-12">
                                                                                <input class="form-control @error('new_password_confirmation') is-invalid @enderror" id="new_password_confirmation" type="password" name="new_password_confirmation" placeholder="Confirmar Senha" required>
                                                                                @error('new_password_confirmation')
                                                                                <span class="text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <div class="col-lg-12 col-xl-12">
                                                                                <button type="submit" class="btn btn-primary">Alterar Senha</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>

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