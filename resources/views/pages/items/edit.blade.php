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
                            <div class="bg-gradient-dark shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3"> Configure Item Information</h6>
                            </div>
                        </div>
                        
                        <div class="card-body">
                            <form action="{{ route('update-items') }}" method="POST">
                            @csrf
                            <div class="row">       
                                
                                <input type="text" hidden name="id" class="form-control border border-2 p-2" value="{{$item->id}}">
                                <input type="text" hidden name="item_code" class="form-control border border-2 p-2" value="{{$item->item_code}}">

                                <div class="mb-3 col-md-12 text-end">
                                    <button type="submit" class="btn btn-sm btn-dark">+ Save Changes</button>
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">ITEM NAME:</label>
                                    <input type="text" name="item_name" class="form-control border border-2 p-2" value="{{$item->item_name}}">
                                </div>
                                
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">ITEM DESCRIPTION:</label>
                                    <textarea type="text" name="item_description" class="form-control border border-2 p-2" >{{$item->item_description}}</textarea>
                            
                                </div>
                            
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">ITEM PRICE:</label>
                                    <input type="number" name="item_price" class="form-control border border-2 p-2" value="{{$item->item_price}}">
                                
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">ITEM QUANTITY:</label>
                                    <input type="number" name="prev_item_quantity" hidden class="form-control border border-2 p-2" value="{{$item->item_quantity}}">
                                    <input type="number" name="item_quantity" class="form-control border border-2 p-2" value="{{$item->item_quantity}}">
                                
                                </div>
                                
                                <div class="mb-3 col-md-4">
                                    <label for="inputSelect">ITEM STATUS:</label>
                                    <select class="form-select" name="item_status" id="inputSelect">
                                        <option selected value="{{$item->item_status}}">{{$item->item_status}}</option>
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                </div>

                                <div class="mb-3 col-md-4">
                                    <label for="inputSelect">ITEM CATEGORY:</label>
                                    <select class="form-select" name="item_category" id="inputSelect">
                                        <option value="{{$item->category->id}}" selected>{{$item->category->category_name}}</option>
                                        @foreach ($categories as $category)
                                        <option value='{!!$category->id!!}'>{!!$category->category_name!!}</option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="mb-3 col-md-4">
                                    <label for="inputSelect">ITEM UNIT:</label>
                                    <select class="form-select" name="item_unit" id="inputSelect">
                                        <option selected value="{{$item->unit}}">{{$item->unit}}</option>
                                        <option value="PCS">PCS</option>
                                        <option value="WEIGHT">WEIGHT</option>
                                        <option value="BAG">BAG</option>
                                        <option value="PACK">PACK</option>
                                        <option value="METER">METER</option>
                                        <option value="YARD">YARD</option>
                                    </select>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
               
               
               
               
                </div>  
            </div>

            <div class="row">
                <div class="col-7">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-danger shadow-primary border-radius-lg pt-1 pb-1">
                                <h5 class="text-white text-capitalize ps-3">Inventory Adjustment</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th>Type</th>
                                    <th>Quantity</th>
                                    <th>Reason</th>
                                    <th>Adjusted By</th>
                                    <th>Adjusted Date</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach($adjustments as $adj)
                                    <tr>
                                        <th>{{$adj->adjustment_type}}</th>
                                        <td>{{$adj->quantity}}</td>
                                        <td>{{$adj->reason}}</td>
                                        <td>{{$adj->adjusted_by}}</td>
                                        <td>{{$adj->adjustment_date}}</td>
                                    </tr>
                                    @endforeach
                                 
                                </tbody>
                              </table>
                              {{ $adjustments->links() }}

                            
                           
                        </div>
                    </div>
                </div>  
                
                <div class="col-5">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-info shadow-primary border-radius-lg pt-1 pb-1">
                                <h5 class="text-white text-capitalize ps-3">Last Orders</h5>
                            </div>
                        </div>
                        <div class="card-body">
                                

                            
                           
                        </div>
                    </div>
                </div>  
            
            
            </div>
         
        </div>
    </main>
    <x-plugins></x-plugins>
</x-layout>
<script src="{{ asset('js/items.js') }}"></script>




