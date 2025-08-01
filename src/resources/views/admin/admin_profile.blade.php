@extends('admin.admin_master')
@section('admin')

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
                                                <form action="">
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
                                                                                <input class="form-control" type="file" name="photo" value="{{ $profileData->photo }}">
                                                                            </div>
                                                                        </div>

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

                                                                    <div class="card-body mb-0">
                                                                        <div class="form-group mb-3 row">
                                                                            <label class="form-label">Senha Atual</label>
                                                                            <div class="col-lg-12 col-xl-12">
                                                                                <input class="form-control" type="password" placeholder="Senha Atual">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group mb-3 row">
                                                                            <label class="form-label">Nova Senha</label>
                                                                            <div class="col-lg-12 col-xl-12">
                                                                                <input class="form-control" type="password" placeholder="Nova Senha">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group mb-3 row">
                                                                            <label class="form-label">Confirmar Senha</label>
                                                                            <div class="col-lg-12 col-xl-12">
                                                                                <input class="form-control" type="password" placeholder="Confirmar Senha">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <div class="col-lg-12 col-xl-12">
                                                                                <button type="submit" class="btn btn-primary">Alterar Senha</button>
                                                                                <button type="button" class="btn btn-danger">Cancelar</button>
                                                                            </div>
                                                                        </div>

                                                                    </div><!--end card-body-->
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </form> <!-- end profile_setting -->
                                        </div> <!-- end tab-content -->
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
</div>

@endsection