
@extends('layouts.web')
@section('content')


<style>
        /* Custom Styles for the Login Page */
        .contact-us {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .contact-us h4 {
            margin-bottom: 20px;
        }

        .contact-us p {
            margin-bottom: 10px;
        }

        .contact-us a {
            color: #007bff;
        }

        .login-form-container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .login-form {
            max-width: 400px;
            width: 100%;
            padding: 30px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            background-color: #fff;
        }

        footer {
            background-color: #343a40;
            color: white;
            padding: 20px 0;
        }

        footer a {
            color: #fff;
        }
    </style>


    <!-- Login Page Content -->
    <div class="container login-form-container">
        <div class="row w-100">
            <!-- Left Column: Login Form -->
            <div class="col-md-6">
                <div class="login-form">
                    <h2 class="text-center mb-4">Login</h2>
                    <form>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>
                    <p class="mt-3 text-center">
                        <a href="#">Forgot Password?</a> | <a href="register.html">Register</a>
                    </p>
                </div>
            </div>

            <!-- Right Column: Contact Us Section -->
            <div class="col-md-6">
                <div class="contact-us">
                    <h4>Contact Us</h4>
                    <p>If you have any issues or questions, feel free to reach out to us:</p>
                    <p><strong>Email:</strong> support@cricketfantasy.com</p>
                    <p><strong>Phone:</strong> +123 456 7890</p>
                    <p><strong>Address:</strong> 123 Fantasy St., Cricket City, Country</p>
                    <p>Or visit our <a href="faq.html">FAQ</a> section for more help.</p>
                </div>
            </div>
        </div>
    </div>

   

    
    @endsection
    
    

