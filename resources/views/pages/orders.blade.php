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
                                                <th>Items Ordered</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td>{!!$order->order_no!!}</td>
                                                <td>{!!$order->order_date!!}</td>
                                                <td>{!!$order->order_discount!!}</td>
                                                <td>{!!$order->order_total!!}</td>
                                                <td>{!!$order->payment->payment_method!!}</td>
                                                <td>{!!$order->payment->payment_amount!!}</td>
                                                <td>{!!$order->payment->payment_change!!}</td>
                                                <td>{!!$order->process_by!!}</td>
                                                <td>

                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#order-{{$order->id}}" aria-expanded="false" aria-controls="order-{{$order->id}}">
                                                    <i class="material-icons">arrow_drop_down_circle</i>
                                                </button>

                                                <div id="order-{{$order->id}}" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingOne" data-bs-parent="#accordionPanelsStayOpenExample">
                                                    <div class="accordion-body">
                                                    <table class="table table-striped" id="orderItemsTable">
                                                        <thead>
                                                            <th></th>
                                                            <th scope="">Item Id</th>
                                                            <th scope="col">Name</th>
                                                            <th scope="col">Quantity</th>
                                                            <th scope="col">Price</th>
                                                            <th scope="col">Discount</th>
                                                            <th scope="col">Total</th>
                                                            <th></th>

                                                        </thead>
                                                        <tbody>
                                                        @foreach ($order->items as $item)
                                                        <tr>
                                                        <td>
                                                           
                                                            <button id="btn-refund" type="button" class="btn btn-info btn-link"
                                                                data-original-title="" title="">
                                                                <i class="material-icons">assignment_returned</i>
                                                                <div class="ripple-container"></div>
                                                            </button>

                                                            <button id="btn-refund-proceed" style="display:none" type="button" class="btn btn-success btn-link"
                                                                data-original-title="" title="">
                                                                <i class="material-icons">add</i>
                                                                <div class="ripple-container"></div>
                                                            </button>

                                                            <button id="btn-refund-close" style="display:none" type="button" class="btn btn-danger btn-link"
                                                                data-original-title="" title="">
                                                                <i class="material-icons">close</i>
                                                                <div class="ripple-container"></div>
                                                            </button>

                                                        </td>
                                                        <td id="refund-item-paymentId" style="display: none;">{!!$order->payment->id!!}</td>
                                                        <td id="refund-item-orderId" style="display: none;">{!!$item->order_id!!}</td>
                                                        <td id="refund-item-orderItemId" style="display: none;">{!!$item->id!!}</td>

                                                        <td id="refund-item-code">{!!$item->item_code!!}</td>
                                                        <td>{!!$item->item_name!!}</td>
                                                        <td>
                                                            <input id="refund-item-qty" type="number" readonly value='{!!$item->item_quantity!!}'></input>
                                                        </td>
                                                        <td>{!!$item->item_price!!}</td>
                                                        <td>{!!$item->item_discount!!}</td>
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
                                <div class="modal fade" id="view-modal-refunded-type" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Select Refund Type</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form id="create-refund">
                                    @csrf
                                    <div class="modal-body">
                                    <select id="refundType" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                        <option selected>Open this select menu</option>
                                        <option value="return">Return</option>
                                        <option value="replacement">Replacement</option>
                                    </select>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button id="btn-refund-save" type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                    </form>
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




