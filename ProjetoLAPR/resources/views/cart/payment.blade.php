@extends('layouts.app')

@section('title')
    Allegro | Homepage
@endsection

@section('content')
    @include('includes._wraperBarFilters')
    @php
        $stripe_key = 'pk_test_51I5Dt8DEl3s6wuZgqzkTgTcV9FFwDhJ0FBSLmotczFvSHyFqax5sLObASJD6STRDlnu09xztKyQ6x7DRCGNQJWl40059RewApr'
    @endphp
    <div class="container">
        <div class="row justify-content-center" style="margin-top:25px">
            <div class="col-md-8 col-md-offset-2">
                <h2 class="mx-auto">Please fill the form and proceed to Payment</h2>
            </div>
        </div>
        <div class="row justify-content-center" style="margin-top:20px">
            <div class="col-md-5 col-md-offset-4">
                <form action="{{route('payment')}}" method="post" id="payment-form">
                    @csrf
                    <label for="email"
                           class="col-md-4 col-form-label text-md-right">{{ __('Enter your E-mail') }}</label>

                    <div class="mb-3">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                               name="email" value="{{old('email')}}" placeholder="example@email.com" required
                               autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <label for="name"
                           class="col-md-4 col-form-label text-md-right">{{ __('Enter your name') }}</label>

                    <div class="mb-3">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                               name="name" value="{{old('name')}}" placeholder="Full name" required
                               autocomplete="name">

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <label for="adress"
                           class="col-md-8 col-form-label text-md-right">{{ __('Enter your adress') }}</label>

                    <div class="mb-3">
                        <textarea id="adress" class="form-control @error('adress') is-invalid @enderror"
                                  name="adress" required autocomplete="adress">{{ old('adress') }}</textarea>

                        @error('adress')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <label for="zip"
                           class="col-md-4 col-form-label text-md-right">{{ __('Enter your zip-code') }}</label>

                    <div class="mb-3">
                        <input id="zip" type="text" class="form-control @error('zip') is-invalid @enderror"
                               name="zip" value="{{old('zip')}}" placeholder="1234-123" autocomplete="zip">

                        @error('zip')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="card">
                        <div class="form-group">
                            <div class="card-header">
                                <label for="card-element">
                                    Enter your credit card information
                                </label>
                            </div>
                            <div class="card-body w-1/2">
                                <div id="card-element">
                                    <!-- A Stripe Element will be inserted here. -->
                                </div>
                                <!-- Used to display form errors. -->
                                <div id="card-errors" role="alert"></div>
                                <input type="hidden" name="plan" value=""/>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button
                                id="card-button"
                                class="btn btn-dark"
                                type="submit"
                            > Pay
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)
        var style = {
            base: {
                color: '#32325d',
                lineHeight: '18px',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };

        const stripe = Stripe('{{ $stripe_key }}', {locale: 'en'}); // Create a Stripe client.
        const elements = stripe.elements(); // Create an instance of Elements.
        const cardElement = elements.create('card', {style: style}); // Create an instance of the card Element.
        const cardButton = document.getElementById('card-button');

        cardElement.mount('#card-element'); // Add an instance of the card Element into the `card-element` <div>.

        // Handle real-time validation errors from the card Element.
        cardElement.addEventListener('change', function (event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        // Handle form submission.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function (event) {
            event.preventDefault();

            stripe.createToken(cardElement).then(function (result) {
                if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Send the token to your server.
                    stripeTokenHandler(result.token);
                }
            });
        });

        // Submit the form with the token ID.
        function stripeTokenHandler(token) {
            // Insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);

            // Submit the form
            form.submit();
        }
    </script>
@endsection
