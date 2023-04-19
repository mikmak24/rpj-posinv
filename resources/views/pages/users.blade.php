<x-layout bodyClass="g-sidenav-show  bg-gray-200">
        <x-navbars.sidebar activePage="users-management"></x-navbars.sidebar>
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
                                    <h6 class="text-white text-capitalize ps-3"> User Management</h6>
                                </div>
                            </div>
                            <div class=" me-3 my-3 text-end">
                            <a class="btn bg-gradient-dark mb-0 " data-bs-toggle="modal" data-bs-target="#exampleModal" href="javascript:;">
                                <i class="material-icons text-sm">add</i>&nbsp;&nbsp;Add New User
                            </a>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg " role="document">
                                <div class="modal-content">
                                <div class="modal-header bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                    <h5 class="modal-title text-white" id="largeModalLabel">Add New Users</h5>
                                </div>

                                <div style="display: none;" id="div-success" class="container alert alert-success alert-dismissible text-white mt-2 pl-4" role="alert">
                                <span class="text-sm">New User is added Successfully!</span>
                                    <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                <form id="create-users" enctype="multipart/form-data">
                                @csrf
                                    <div class="row">       
                                        
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">NAME:</label>
                                            <input type="text" name="name" class="form-control border border-2 p-2" >
                                        </div>
                                        
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">EMAIL:</label>
                                            <input type="text" name="email" class="form-control border border-2 p-2" ></textarea>
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">LOCATION:</label>
                                            <input type="text" name="location" class="form-control border border-2 p-2" ></textarea>
                                        </div>

                                        
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">PHONE:</label>
                                            <input type="number" name="phone" value="09" class="form-control border border-2 p-2" ></textarea>
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label for="inputSelect">USER ROLE:</label>
                                            <select class="form-control" name="role" id="inputSelect">
                                                <option value="" disabled selected>Choose your option</option>
                                                @foreach ($roles as $role)
                                                <option value='{!!$role->id!!}'>{!!$role->role_name!!}</option>
                                                @endforeach

                                            </select>
                                        </div>


                                        
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Password:</label>
                                            <input type="password" name="password" value="09" class="form-control border border-2 p-2" ></textarea>
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
                                                    id
                                                </th>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Role
                                                </th>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Name
                                                </th>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Email
                                                </th>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Phone
                                                </th>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Location
                                                </th>                                             
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <p class="mb-0"> {!!$user->id!!}</p>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <p class="mb-0"> {!!$user->role->role_name!!}</p>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <p class="mb-0"> {!!$user->name!!}</p>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <p class="mb-0"> {!!$user->email!!}</p>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <p class="mb-0"> {!!$user->phone!!}</p>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <p class="mb-0"> {!!$user->location!!}</p>
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
<script src="{{ asset('js/users.js') }}"></script>




