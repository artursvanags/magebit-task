@extends('layout.default')

@section('content')
<div class="m-4">
@if (session('success'))
    <div class="bg-green-500 text-white p-4" role="alert">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="bg-red-500 text-white p-4" role="alert">
        {{ session('error') }}
    </div>
@endif

@if ($errors->any())
    <div class="bg-red-500 text-white p-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div>

<div class="container grid lg:grid-cols-2 grid-cols-1 gap-4">
    
    <div>
        <h1 class="text-gray-900 page-title title-font">
            <span class="base" data-ui-id="page-title-wrapper">
                Customer Login
            </span>
        </h1>
        <div id="customer-login-container" class="login-container">
            <div class="w-full card mr-4">
                <div aria-labelledby="block-customer-login-heading">
                    <form class="form form-login" action="{{ url('login') }}" novalidate method="post"
                        id="customer-login-form">
                        <fieldset class="fieldset login">
                            <legend class="mb-3">
                                <h2 class="text-xl font-medium title-font text-primary">
                                    Login
                                </h2>
                            </legend>
                            <div class="text-secondary-darker mb-8">
                                If you have an account, sign in with your email address.
                            </div>
                            <div class="field">
                                <label class="label" for="email">
                                    <span>Email</span>
                                </label>
                                <div class="control">
                                    <input data-test="login-email" name="email" class="form-input" value=""
                                        autocomplete="off" id="email" type="email" title="Email">
                                </div>
                            </div>
                            <div class="field">
                                <label for="pass" class="label">
                                    <span>Password</span>
                                </label>
                                <div class="control flex items-center">
                                    <input data-test="login-password" name="password" class="form-input"
                                        autocomplete="off" id="pass" title="Password" type="password">
                                </div>
                            </div>
                            <div class="actions-toolbar flex justify-between pt-6 pb-2 items-center">
                                <button data-test="login-submit" type="submit"
                                    class="btn btn-primary disabled:opacity-75" name="send">
                                    <span>Sign In</span>
                                </button>
                                <a class="underline text-[#6D6D6D]" href="#">
                                    <span>Forgot Your Password?</span>
                                </a>
                            </div>
                        </fieldset>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" /> 
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div>
        <h1 class="text-gray-900 page-title title-font">
            <span class="base" data-ui-id="page-title-wrapper">
                Create new customer account
            </span>
        </h1>
        <div id="customer-login-container" class="login-container">
            <div class="w-full card mr-4">
                <div aria-labelledby="block-customer-registration-heading">
                    <form class="form form-registration" action="{{ url('register') }}" novalidate method="post"
                        id="customer-registration-form">
                        @csrf

                        <fieldset class="fieldset registration">
                            <legend class="mb-3">
                                <h2 class="text-xl font-medium title-font text-primary">
                                    Customer Registration
                                </h2>
                            </legend>
                            <div class="field">
                                <label class="label" for="firstName">
                                    <span>First Name</span>
                                </label>
                                <div class="control">
                                    <input data-test="register-firstName" name="firstName" class="form-input"
                                        autocomplete="off" id="firstName" type="text" title="First Name">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label" for="lastName">
                                    <span>Last Name</span>
                                </label>
                                <div class="control">
                                    <input data-test="register-lastName" name="lastName" class="form-input"
                                        autocomplete="off" id="lastName" type="text" title="Last Name">
                                </div>
                            </div>
                            <legend class="mb-3 mt-6">
                                <h2 class="text-xl font-medium title-font text-primary">
                                    Sign-in information
                                </h2>
                            </legend>
                            <div class="field">
                                <label class="label" for="email">
                                    <span>Email</span>
                                </label>
                                <div class="control">
                                    <input data-test="register-email" name="email" class="form-input" autocomplete="off"
                                        id="email" type="email" title="Email">
                                </div>
                            </div>
                            <div class="field">
                                <label for="pass" class="label">
                                    <span>Password</span>
                                </label>
                                <div class="control flex items-center">
                                    <input data-test="register-password" name="password" class="form-input"
                                        autocomplete="off" id="pass" title="Password" type="password">
                                </div>
                            </div>
                            <div class="field">
                                <label for="passConfirm" class="label">
                                    <span>Confirm Password</span>
                                </label>
                                <div class="control flex items-center">
                                <input data-test="register-passwordConfirm" name="password_confirmation" class="form-input" autocomplete="off" id="passConfirm" title="Confirm Password" type="password"></div>
                            </div>
                            <div class="field pt-3">
                                <div class="field flex items-center">
                                <input data-test="register-newsletter" name="subscribed" class="form-checkbox" type="checkbox" id="newsletter">
                                    <label class="label m-0 ml-2" for="newsletter">
                                        Sign up for newsletter
                                    </label>
                                </div>
                            </div>
                            <div class="actions-toolbar flex justify-between pt-6 pb-2 items-center">
                                <button data-test="register-submit" type="submit"
                                    class="btn btn-primary disabled:opacity-75" name="send">
                                    <span>Create an Account</span>
                                </button>
                            </div>
                        </fieldset>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" /> 
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@stop