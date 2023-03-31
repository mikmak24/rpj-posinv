<x-layout bodyClass="g-sidenav-show  bg-gray-200">
        <x-navbars.sidebar activePage="items"></x-navbars.sidebar>
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
                                    <h6 class="text-white text-capitalize ps-3"> ITEMS</h6>
                                </div>
                            </div>
                            <div class=" me-3 my-3 text-end">
                            <a class="btn bg-gradient-dark mb-0 " data-bs-toggle="modal" data-bs-target="#exampleModal" href="javascript:;">
                                <i class="material-icons text-sm">add</i>&nbsp;&nbsp;Add New Items
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
                                <form id="create-items" enctype="multipart/form-data">
                                @csrf
                                    <div class="row">       
                                        
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Item Name</label>
                                            <input type="text" name="item_name" class="form-control border border-2 p-2" >
                                        </div>
                                        
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Item Description</label>
                                            <textarea type="text" name="item_description" class="form-control border border-2 p-2" ></textarea>
                                    
                                        </div>
                                    
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Item Price</label>
                                            <input type="number" name="item_price" class="form-control border border-2 p-2">
                                        
                                        </div>
                                        
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Item Quantity</label>
                                            <input type="number" name="item_quantity" class="form-control border border-2 p-2">
                                        
                                        </div>
                                        
                                        <div class="mb-3 col-md-6">
                                            <label for="inputSelect">Item Status</label>
                                            <select class="form-control" name="item_status" id="inputSelect">
                                                <option value="" disabled selected>Choose your option</option>
                                                <option value="Active">Active</option>
                                                <option value="Inactive">Inactive</option>
                                            </select>
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label for="inputSelect">Item Category</label>
                                            <select class="form-control" name="item_category" id="inputSelect">
                                                <option value="" disabled selected>Choose your option</option>
                                                <option value="1">Electrical</option>
                                                <option value="2">Hand Tools</option>
                                            </select>
                                        </div>
                                        
                                        <div class="mb-3 col-md-12">
                                            <label class="form-label">Item Image</label>
                                            <input type="file" name="item_image" class="form-control border border-2 p-2">
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
                                                <th></th>
                                                <th>Item Code</th>
                                                <th>Item Name</th>
                                                <th>Item Description</th>
                                                <th>Item Price</th>
                                                <th>Item Quantity</th>
                                                <th>Item Status</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($items as $item)
                                        <tr>
                                            <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <img src="{{ asset('storage/images/' . $item->item_image ) }}"
                                                    class="avatar avatar-sm me-3 border-radius-lg"
                                                    alt="user1">
                                                </div>
                                                      
                                            </div>
                                            </td>
                                            <td>{!!$item->item_code!!}</td>
                                            <td>{!!$item->item_name!!}</td>
                                            <td>{!!$item->item_description!!}</td>
                                            <td>{!!$item->item_price!!}</td>
                                            <td>{!!$item->item_quantity!!}</td>
                                            <td>{!!$item->item_status!!}</td>
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
<script src="{{ asset('js/items.js') }}"></script>




