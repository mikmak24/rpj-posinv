<x-layout bodyClass="g-sidenav-show  bg-gray-200">
        <x-navbars.sidebar activePage="orders"></x-navbars.sidebar>
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
                                    <h4 class="text-white text-capitalize ps-3"> Orders</h4>
                                </div>
                            </div>

                            <div style="display: none;" id="div-success" class="container alert alert-success alert-dismissible text-white mt-2 pl-10" role="alert">
                                <span class="text-sm">New Order has been added! </span>
                                    <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>

                            <div class="card-body" style="position: relative;">
                                <table id="dataTable">
                                        <thead>
                                            <tr>
                                                <th>Order No</th>
                                                <th>Order Date</th>
                                                <th>Order Discount</th>
                                                <th>Order Total</th>
                                                <th>Payment Method</th>
                                                <th>Payment Amount</th>
                                                <th>Payment Change</th>
                                                <th>Process By</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td>{!!$order->order_no!!}</td>
                                                <td>{!!$order->order_date!!}</td>
                                                <td>{!!$order->order_discount!!}</td>
                                                <td>{!!$order->order_total!!}</td>
                                                <td>{!!$order->payment_method!!}</td>
                                                <td>{!!$order->payment_amount!!}</td>
                                                <td>{!!$order->payment_change!!}</td>
                                                <td>{!!$order->process_by!!}</td>
                                                <td>

                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#order-{{$order->id}}" aria-expanded="false" aria-controls="order-{{$order->id}}">
                                                    <i class="material-icons">remove_red_eye</i>
                                                </button>

                                                <div id="order-{{$order->id}}" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingOne" data-bs-parent="#accordionPanelsStayOpenExample">
                                                    <div class="accordion-body">
                                                    <table class="table table-striped" id="orderItemsTable">
                                                        <thead>
                                                            <th scope="">Order Id</th>
                                                            <th scope="col">Item Code</th>
                                                            <th scope="col">Item Name</th>
                                                            <th scope="col">Item Price</th>
                                                            <th scope="col">Item Discount</th>
                                                            <th scope="col">Item Quantity</th>
                                                            <th scope="col">Item Total</th>
                                                            <th></th>

                                                        </thead>
                                                        <tbody>
                                                        @foreach ($order->items as $item)
                                                        <tr>
                                                        <td>{!!$item->id!!}</td>
                                                        <td>{!!$item->item_code!!}</td>
                                                        <td>{!!$item->item_name!!}</td>
                                                        <td>{!!$item->item_price!!}</td>
                                                        <td>{!!$item->item_discount!!}</td>
                                                        <td>{!!$item->item_quantity!!}</td>
                                                        <td>{!!$item->total!!}</td>





                                                        </tr>

                                                        @endforeach

                                                    
                                                        </tbody>
                                                    </table>
                                                    </div>
                                                </div>
                                                </td>
                                                
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                            </div>

                      

                                <!-- Modal -->
                                <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Ordered Items</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="table-responsive">

                

                                        <table class="table table-striped" id="orderItemsTable">
                                            <thead>
                                                <th scope="">Order Id</th>
                                                <th scope="col">Item Code</th>
                                                <th scope="col">Item Name</th>
                                                <th scope="col">Item Price</th>
                                                <th scope="col">Item Discount</th>
                                                <th scope="col">Item Quantity</th>
                                                <th scope="col">Item Total</th>
                                                <th></th>

                                            </thead>
                                            <tbody>
                                          
                                            </tbody>
                                        </table>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                    </div>
                                </div>
                                </div>

                        </div>
                    </div>  
                </div>      
             
            </div>
        </main>
        <x-plugins></x-plugins>
</x-layout>
<script src="{{ asset('js/orders.js') }}"></script>




