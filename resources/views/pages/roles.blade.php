<x-layout bodyClass="g-sidenav-show  bg-gray-200">
        <x-navbars.sidebar activePage="roles"></x-navbars.sidebar>
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- Navbar -->
            <x-navbars.navs.auth titlePage="Tables"></x-navbars.navs.auth>
            <!-- End Navbar -->
            <div class="container-fluid py-4">
                <div class="row">
                    <div class="col-12">
                        <div class="card my-4">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                    <h6 class="text-white text-capitalize ps-3"> Roles Management</h6>
                                </div>
                            </div>
                            <div class=" me-3 my-3 text-end">
                            <a class="btn bg-gradient-dark mb-0 " data-bs-toggle="modal" data-bs-target="#exampleModal" href="javascript:;">
                                <i class="material-icons text-sm">add</i>&nbsp;&nbsp;Add New Role
                            </a>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg " role="document">
                                <div class="modal-content">
                                <div class="modal-header bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                    <h5 class="modal-title text-white" id="largeModalLabel">Add New Items</h5>
                                </div>

                                <div style="display: none;" id="div-success" class="container alert alert-success alert-dismissible text-white mt-2 pl-4" role="alert">
                                <span class="text-sm">New Item is added Successfully!</span>
                                    <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                <form id="create-roles" enctype="multipart/form-data">
                                @csrf
                                    <div class="row">       
                                        
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">ROLE NAME:</label>
                                            <input type="text" name="role_name" class="form-control border border-2 p-2" >
                                        </div>
                                        
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">ROLE DESCRIPTION:</label>
                                            <textarea type="text" name="role_description" class="form-control border border-2 p-2" ></textarea>
                                    
                                        </div>
                                    
                                    </div>
                                        <button type="submit" class="btn bg-gradient-dark">Submit</button>
                                </form>
                                </div>
                                </div>
                            </div>
                            </div>

                                <div class="card-body px-0 pb-2">
                                <div class="table-responsive p-0">
                                    <table class="table align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Id
                                                </th>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Role Name
                                                </th>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Role Description
                                                </th>                                              
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($roles as $role)
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <p class="mb-0"> {!!$role->id!!}</p>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <p class="mb-0"> {!!$role->role_name!!}</p>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <p class="mb-0"> {!!$role->role_description!!}</p>
                                                        </div>
                                                    </div>
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
        </main>
        <x-plugins></x-plugins>
</x-layout>
<script src="{{ asset('js/roles.js') }}"></script>




