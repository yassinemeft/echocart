@extends('layouts.register')

@section('title', 'payement')

<!-- Custom styles -->
@section('style')
<style>
        .form-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .btn-custom {
            background-color: #343a40;
            color: white;
        }
        .btn-custom:hover {
            background-color: #495057;
        }
        .card-icons {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 20px;
        }
        .card-icons img {
            width: 50px;
            height: auto;
        }
        .payment-option {
            margin-bottom: 20px;
        }
        .payment-option input {
            margin-right: 10px;
        }
    </style>
@endsection
<!-- Custom styles end -->

@section('content')
<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="form-container">
                    <h3 class="text-center">Payment</h3>
                    <div class="card-icons">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/0/04/Visa.svg" alt="Visa">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/a/a4/Mastercard_2019_logo.svg" alt="MasterCard">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/b/b7/PayPal_Logo_Icon_2014.svg" alt="PayPal">
                    </div>
                    <form>
                        <!-- Payment Options -->
                        <h5 class="mb-3">Choose Payment Method:</h5>
                        <div class="payment-option">
                            <input type="radio" name="paymentMethod" id="creditCard" value="Credit Card" checked>
                            <label for="creditCard">Credit/Debit Card</label>
                        </div>
                        <div class="payment-option">
                            <input type="radio" name="paymentMethod" id="paypal" value="PayPal">
                            <label for="paypal">PayPal</label>
                        </div>
                        <div class="payment-option">
                            <input type="radio" name="paymentMethod" id="cashOnDelivery" value="Cash on Delivery">
                            <label for="cashOnDelivery">Cash on Delivery</label>
                        </div>

                        <!-- Card Payment Fields -->
                        <div id="cardFields">
                            <div class="mb-3">
                                <label for="cardNumber" class="form-label">Card Number</label>
                                <input type="text" class="form-control" id="cardNumber" placeholder="1234 5678 9012 3456" required>
                            </div>
                            <div class="mb-3">
                                <label for="cardHolder" class="form-label">Cardholder Name</label>
                                <input type="text" class="form-control" id="cardHolder" placeholder="John Doe" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="expiryDate" class="form-label">Expiry Date</label>
                                    <input type="text" class="form-control" id="expiryDate" placeholder="MM/YY" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="cvv" class="form-label">CVV</label>
                                    <input type="text" class="form-control" id="cvv" placeholder="123" required>
                                </div>
                            </div>
                        </div>

                        <!-- PayPal Note -->
                        <div id="paypalNote" class="d-none">
                            <p class="text-muted">You will be redirected to PayPal to complete your payment.</p>
                        </div>

                        <!-- Cash on Delivery Note -->
                        <div id="cashNote" class="d-none">
                            <p class="text-muted">You have chosen Cash on Delivery. Please ensure you have the exact amount at delivery.</p>
                        </div>

                        <button type="submit" class="btn btn-custom w-100 mt-3">Confirm Payment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // JavaScript to handle payment method selection
        document.querySelectorAll('input[name="paymentMethod"]').forEach((radio) => {
            radio.addEventListener('change', function () {
                document.getElementById('cardFields').classList.add('d-none');
                document.getElementById('paypalNote').classList.add('d-none');
                document.getElementById('cashNote').classList.add('d-none');

                if (this.value === "Credit Card") {
                    document.getElementById('cardFields').classList.remove('d-none');
                } else if (this.value === "PayPal") {
                    document.getElementById('paypalNote').classList.remove('d-none');
                } else if (this.value === "Cash on Delivery") {
                    document.getElementById('cashNote').classList.remove('d-none');
                }
            });
        });
    </script>
@endsection