<x-layout bodyClass="g-sidenav-show  bg-gray-200">
        <x-navbars.sidebar activePage="categories"></x-navbars.sidebar>
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- Navbar -->
            <x-navbars.navs.auth titlePage="Tables"></x-navbars.navs.auth>
            <!-- End Navbar -->
            <div class="container-fluid py-4">
                <div class="row">
                    <div class="col-12">
                        <div class="card my-4">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-dark shadow-primary border-radius-lg pt-4 pb-3">
                                    <h6 class="text-white text-capitalize ps-3"> Categories</h6>
                                </div>
                            </div>
                            <div class=" me-3 my-3 text-end">
                            <a class="btn bg-gradient-dark mb-0 " data-bs-toggle="modal" data-bs-target="#exampleModal" href="javascript:;">
                                <i class="material-icons text-sm">add</i>&nbsp;&nbsp;Add New Category
                            </a>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg " role="document">
                                <div class="modal-content">
                                <div class="modal-header bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                    <h5 class="modal-title text-white" id="largeModalLabel">Add New Category</h5>
                                </div>

                                <div style="display: none;" id="div-success" class="container alert alert-success alert-dismissible text-white mt-2 pl-4" role="alert">
                                <span class="text-sm">New Item is added Successfully! Reloading the page...</span>
                                    <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                <form id="create-categories" enctype="multipart/form-data">
                                @csrf
                                    <div class="row">       
                                        
                                        <div class="mb-3 col-md-12">
                                            <label class="form-label">Category Name</label>
                                            <input type="text" id="cname" required name="category_name" class="form-control border border-2 p-2" >
                                        </div>
                                        
                                        <div class="mb-3 col-md-12">
                                            <label class="form-label">Category Description</label>
                                            <textarea type="text" id="cdesc" required name="category_description" class="form-control border border-2 p-2" ></textarea>
                                        </div>
                                    
                                    </div>
                                        <button type="submit" class="btn bg-gradient-dark">Submit</button>
                                </form>
                                </div>
                                </div>
                            </div>
                            </div>

                            <div class="card-body">
                                <div class="">
                                    <table id="dataTable">
                                        <thead>
                                            <tr>
                                                <th>Category Name</th>
                                                <th>Category Description</th>   
                                                <th></th>
                                                <th></th>                                           
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($categories as $category)
                                        <tr>
                                            <td>{!!$category->category_name!!}</td>
                                            <td>{!!$category->category_description!!}</td>    
                                            <td><i class="material-icons ">update</i></td>
                                            <td><i class="material-icons">remove_circle</i></td>                                       
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
<script src="{{ asset('js/categories.js') }}"></script>




