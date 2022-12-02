<div>
    <div class="py-3 py-md-4 checkout">
        <div class="container">
            <h4>Checkout</h4>
            <hr>
            @if (session()->has('message'))
            <div class="toast-container position-fixed top-auto end-0 p-3">
                <div id="liveToast" class="toast show border-0" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <div class="bg-info rounded me-2 shadow-sm" style="padding: 11px;"></div>
                        <strong class="me-auto">GoodFance Bag</strong>
                        {{-- <small>11 mins ago</small> --}}
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body bg-white rounded">
                        {{ session('message') }}
                    </div>
                </div>
            </div>
            @endif

            @if ($this->totalProductAmount != '0')
            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="shadow bg-white p-3">
                        <h4 class="text-primary">
                            Item Total Amount :
                            <span class="float-end">${{$this->totalProductAmount}}</span>
                        </h4>
                        <hr>
                        {{-- <small>* Items will be delivered in 3 - 5 days.</small>
                        <br />
                        <small>* Tax and other charges are included ?</small> --}}
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="shadow bg-white p-3">
                        <h4 class="text-primary">
                            Basic Information
                        </h4>
                        <hr>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Full Name</label>
                                <input type="text" wire:model.defer="fullname" id="fullname" class="form-control"
                                    placeholder="Enter Full Name" />
                                @error('fullname') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Phone Number</label>
                                <input type="number" wire:model.defer="phone" id="phone" class="form-control"
                                    placeholder="Enter Phone Number" />
                                @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Email Address</label>
                                <input type="email" wire:model.defer="email" id="email" class="form-control"
                                    placeholder="Enter Email Address" />
                                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Pin-code (Zip-code)</label>
                                <input type="number" wire:model.defer="pincode" id="pincode" class="form-control"
                                    placeholder="Enter Pin-code" />
                                @error('pincode') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Full Address</label>
                                <textarea wire:model.defer="address" id="address" class="form-control"
                                    rows="2"></textarea>
                                @error('address') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-md-12 mb-3" wire:ignore>
                                <label>Select Payment Mode: </label>
                                <div class="d-md-flex align-items-start">
                                    <div class="nav col-md-3 flex-column nav-pills me-3" id="v-pills-tab" role="tablist"
                                        aria-orientation="vertical">
                                        <button wire:loading.attr="disabled" class="nav-link active fw-semibold text-black"
                                            id="cashOnDeliveryTab-tab" data-bs-toggle="pill"
                                            data-bs-target="#cashOnDeliveryTab" type="button" role="tab"
                                            aria-controls="cashOnDeliveryTab" aria-selected="true">Cash on
                                            Delivery</button>
                                        <button wire:loading.attr="disabled" class="nav-link fw-semibold text-black"
                                            id="onlinePayment-tab" data-bs-toggle="pill" data-bs-target="#onlinePayment"
                                            type="button" role="tab" aria-controls="onlinePayment"
                                            aria-selected="false">Online Payment</button>
                                        <button wire:loading.attr="disabled" class="nav-link fw-semibold text-black"
                                            id="gatewayPayment-tab" data-bs-toggle="pill"
                                            data-bs-target="#gatewayPayment" type="button" role="tab"
                                            aria-controls="gatewayPayment" aria-selected="false">Gateway
                                            Payment</button>
                                    </div>
                                    <div class="tab-content col-md-9" id="v-pills-tabContent">
                                        <div class="tab-pane active show fade" id="cashOnDeliveryTab" role="tabpanel"
                                            aria-labelledby="cashOnDeliveryTab-tab" tabindex="0">
                                            <h6>Cash on Delivery Mode</h6>
                                            <hr />
                                            <button type="button" wire:loading.attr="disabled" wire:click="codOrder"
                                                class="btn btn-primary">
                                                <span wire:loading.remove wire:target="codOrder">
                                                    Place Order (Cash on Delivery)
                                                </span>
                                                <span wire:loading wire:target="codOrder">
                                                    Placing Order
                                                </span>
                                            </button>

                                        </div>
                                        <div class="tab-pane fade" id="onlinePayment" role="tabpanel"
                                            aria-labelledby="onlinePayment-tab" tabindex="0">
                                            <h6>Online Payment Mode</h6>
                                            <hr />
                                            {{-- <button type="button" wire:loading.attr="disabled" class="btn btn-warning">Pay Now (Online Payment)</button> --}}
                                            {{-- Paypal Button Payment --}}
                                            <div>
                                                <!-- Set up a container element for the button -->
                                                <div class="btn" id="paypal-button-container"></div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="gatewayPayment" role="tabpanel"
                                            aria-labelledby="gatewayPayment-tab" tabindex="0">
                                            <h6>Gateway Payment Mode</h6>
                                            <hr />
                                            <div>
                                                <button id="pay-button" type="button"
                                                    class="btn btn-primary center-block">Pay!</button>

                                                    <form action="{{ url('checkout') }}" id="submit" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="json" id="json_callback">
                                                    </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
            @else
            <div class="card card-body shadow text-center">
                <h4>No items in cart to checkout</h4>
                <a href="{{ url('collections') }}" class="btn btn-warning">Shop now</a>
            </div>
            @endif

        </div>
    </div>
</div>

@push('scripts')

<!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="SB-Mid-client-CZJ26fQcrg8ZDkNT"></script>
<script type="text/javascript">
    // For example trigger on button clicked, or any time you need
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
        window.snap.pay('{{ $snap_token }}', {
            onSuccess: function (result) {
                /* You may add your own implementation here */
                console.log(result);
                send_response_to_form(result);
            },
            onPending: function (result) {
                /* You may add your own implementation here */
                console.log(result);
                send_response_to_form(result);
            },
            onError: function (result) {
                /* You may add your own implementation here */
                console.log(result);
                send_response_to_form(result);
            },
            onClose: function () {
                /* You may add your own implementation here */
                alert('you closed the popup without finishing the payment');
            }
        })
    });

    function send_response_to_form(result) {
        document.getElementById('json_callback').value = JSON.stringify(result);
        $('#submit_form').submit();
    }

</script>

<!-- Replace "test" with your own sandbox Business account app client ID -->
<script
    src="https://www.paypal.com/sdk/js?client-id=AT2BH_LkDLh-OXJxeL77KYhC6RTm2w1guMwaLrJTUWgeD6CePyl9bxmer_XFg6Ow2CBQ3BKOFib6l3Xm&currency=USD">
</script>

<script>
    paypal.Buttons({
        // onClick is called when the button is clicked
        onClick: function () {
            // Show a validation error if the checkbox is not checked
            if (!document.getElementById('fullname').value ||
                !document.getElementById('phone').value ||
                !document.getElementById('email').value ||
                !document.getElementById('pincode').value ||
                !document.getElementById('address').value
            ) {
                Livewire.emit('validationForAll');
                return false;
            } else {
                @this.set('fullname', document.getElementById('fullname').value);
                @this.set('email', document.getElementById('email').value);
                @this.set('phone', document.getElementById('phone').value);
                @this.set('pincode', document.getElementById('pincode').value);
                @this.set('address', document.getElementById('address').value);
            }
        },
        // Sets up the transaction when a payment button is clicked
        createOrder: (data, actions) => {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: "{{ $this->totalProductAmount }}" // Can also reference a variable or function
                    }
                }]
            });
        },
        // Finalize the transaction after payer approval
        onApprove: (data, actions) => {
            return actions.order.capture().then(function (orderData) {
                // Successful capture! For dev/demo purposes:
                console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                const transaction = orderData.purchase_units[0].payments.captures[0];
                if (transaction.status == "COMPLETED") {
                    Livewire.emit('transactionEmit', transaction.id);
                }
                // alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);

            });
        }
    }).render('#paypal-button-container');

</script>

@endpush
