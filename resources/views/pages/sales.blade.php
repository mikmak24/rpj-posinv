<x-layout bodyClass="g-sidenav-show  bg-gray-200">
        <x-navbars.sidebar activePage="sales"></x-navbars.sidebar>
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
                                    <h4 class="text-white text-capitalize ps-3"> SALES</h4>
                                </div>
                            </div>

                            <div class=" me-3 my-3 text-end">
                            <a class="btn bg-gradient-dark mb-0 " data-bs-toggle="modal" data-bs-target="#exampleModal" href="javascript:;">
                                <i class="material-icons text-sm">add</i>&nbsp;&nbsp;Add Items
                            </a>
                            </div>


                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg " role="document">
                                <div class="modal-content">
                                <div class="modal-header bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                    <h5 class="modal-title text-white" id="largeModalLabel">View Items</h5>
                                </div>

                                <div class="modal-body">
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
                                            <td><button class="btn-details"  data-item="{{ $item }}" ><i class="material-icons ">add</i></button></td>
                                            
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                </div>
                            </div>
                            </div>

                            <div class="card-body">
                                <table id="sales-table" class="striped table mb-0">
                                        <thead>
                                            <tr>
                                                <th>Item Code</th>
                                                <th>Item Name</th>
                                                <th>Item Price</th>
                                                <th>Item Discount</th>
                                                <th>Quantity</th>
                                                <th>Total</th>
                                                <th class="text-secondary opacity-7"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                        </tbody>
                                    </table>
                                 
                            </div>

                            <div class=" me-3 my-3 text-end">
                                <button id="proceed" class="btn bg-gradient-dark mb-0" href="javascript:;">
                                    <i class="material-icons text-sm">arrow_forward</i>&nbsp;&nbsp;Proceed
                                </button>
                            </div>


                        </div>
                    </div>  
                </div>

                <div class="col-lg-4 col-md-6 mt-4 mb-4" style="display: none;" id="payment_summary">
                    <div class="card z-index-2 ">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                            <div class="bg-gradient-info shadow-primary border-radius-lg py-3 pe-1">
                            <h5 class="text-white text-capitalize ps-3"> Payment Summary:</h5>
                            </div>
                        </div>
                        <div class="card-body">
                        <div style="display: none;" id="div-success" class="container alert alert-success alert-dismissible text-white  pl-10" role="alert">
                                <span class="text-sm">New Order has been added! Reloading the page...</span>
                                    <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>

                            <h6 class="mb-0 ">Order No: <input id="order_no" type="text" readonly class="form-control border border-2 p-2" ></h6>
                            <hr class="dark horizontal">

                            <h6 class="mb-0 ">Order Discount: <input type="text" class="form-control border border-2 p-2"  id="order_discount"></h6>
                            <hr class="dark horizontal">

                            <h6 class="mb-0 ">Order Date: <input type="text" readonly class="form-control border border-2 p-2"  id="order_date"></h6>
                            <hr class="dark horizontal">

                            <h6 class="mb-0 ">Order Total: <input type="text" readonly class="form-control border border-2 p-2"  id="order_total"></h6>
                            <hr class="dark horizontal">

                            <hr style="background-color:red;">

                            <div style="display: none;" id="payment_change_error" class="container alert alert-danger alert-dismissible text-white mt-2 pl-4" role="alert">
                                <span class="text-sm">Payment change must not be negative!</span>
                                    <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                            <h6 class="mb-0 ">Payment Amount: <input type="text" class="form-control border border-2 p-2"  id="payment_amount"></h6>
                            <hr class="dark horizontal">

                            <h6 class="mb-0 ">Payment Change: <input type="text" class="form-control border border-2 p-2"  id="payment_change"></h6>
                            <hr class="dark horizontal">
                            <meta name="csrf-token" content="{{ csrf_token() }}">

                            <div class=" me-3 my-3 text-end">
                                <button id="bill" class="btn bg-gradient-dark mb-0" href="javascript:;">
                                    <i class="material-icons text-sm">arrow_forward</i>&nbsp;&nbsp;Bill
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
         
             
            </div>
        </main>
        <x-plugins></x-plugins>
</x-layout>
<script src="{{ asset('js/sales.js') }}"></script>




