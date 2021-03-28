@extends('layouts.master')
@section('title', 'İletişim')
@section('banner')
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/contact-bg.jpg')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="mx-auto col-lg-8 col-md-10">
                    <div class="page-heading">
                        <h1>Contact Me</h1>
                        <span class="subheading">Have questions? I have answers.</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection
@section('content')
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="mx-auto col-lg-8 col-md-10">
                <p>Want to get in touch? Fill out the form below to send me a message and I will get back to you as soon as
                    possible!</p>
                <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
                <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
                <!-- To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
                <form method="post" action="{{ route('contact.post') }}" name="sentMessage" id="contactForm" novalidate>
                    @csrf
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label for="name">Ad</label>
                            <input type="text" name="name" class="form-control" placeholder="Ad" id="name" required
                                data-validation-required-message="Please enter your name.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label for="email">Email Addres</label>
                            <input type="email" name="email" class="form-control" placeholder="Email Addres" id="email"
                                required data-validation-required-message="Please enter your email address.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label for="phone">Telefon Numarası</label>
                            <input type="tel" name="phone" class="form-control" placeholder="Telefon Numarası" id="phone"
                                required data-validation-required-message="Please enter your phone number.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label for="message">Mesaj</label>
                            <textarea rows="5" name="message" class="form-control" placeholder="Mesaj" id="message" required
                                data-validation-required-message="Please enter a message."></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <button type="submit" class="btn btn-primary" id="sendMessageButton">Gönder</button>
                </form>
            </div>
        </div>
    </div>
@endsection
