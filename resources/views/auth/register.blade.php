@extends('layouts.app')

@section('content')
<style>
.container {
    padding-top: 20px;
    height: fit-content;
}

.card {
    box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
    overflow: hidden;
    color: white;
}

.form-control {
    width: 15rem;
}

.imag {
    margin: auto;

}

.imageko {
    display: block;
    height: 100%;
}
</style>
<div class="container d-flex justify-content-center align-items-center">
    <div class="card w-100" style="max-width: 700px;">
        <div class="row g-0">
            <div class="imag col-md-7 p-5">
                <img class="imageko img-fluid" src="/images/signup2.svg">
            </div>
            <div class="col-md-5 bg-dark">
                <div class=" card-body">
                    <div class="text-center mt-2">
                        <h3 class="card-title text-info">SignUp Form</h3>
                        <form class="mt-5 p-2" action="{{ route('register') }}" method="post">
                            @csrf
                            <div class="mb-3 p-0">
                                <!-- <label for="username" class="form-label">Username </label> -->
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                    placeholder="Name" name="name" aria-describedby="nameHelp">
                                <div class="form-text">@error('name') {{$message}} @enderror <br>
                                </div>
                            </div>
                            <div class="mb-3 p-0">
                                <!-- <label for="email" class="form-label">Email Address</label> -->
                                <input type="email" class="form-control  @error('email') is-invalid @enderror" id="
                                    email" placeholder="Email" name="email" aria-describedby="emailHelp">
                                <div class="form-text">@error('email') {{$message}} @enderror <br>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="Role" class="form-label">Gender</label>
                                <select name="gender">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                                <label for="age">Age:</label>
                                <select id="age" name="age">
                                    <?php
                                        for ($i = 15; $i <= 90; $i++) {
                                        echo '<option value="' . $i . '">' . $i . '</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="Country" class="form-label">Select Country</label>
                                <select name="country">
                                    <option value="Australia">Australia</option>
                                    <option value="Belgium">Belgium</option>
                                    <option value="Brazil">Brazil</option>
                                    <option value="China">China</option>
                                    <option value="England">England</option>
                                    <option value="France">France</option>
                                    <option value="India">India</option>
                                    <option value="Nepal">Nepal</option>
                                    <option value="USA">USA</option>
                                    <option value="UK">UK</option>
                                </select>
                            </div>
                            <div class="mb-3 p-0">
                                <input type="password" class="form-control  @error('password') is-invalid @enderror"
                                    id=" password" placeholder="Password" name="password" required
                                    autocomplete="new-password">
                                <div class="form-text">@error('password') {{$message}} @enderror <br>
                                </div>
                            </div>
                            <div class="mb-3 p-0">
                                <!-- <label for="password" class="form-label">Password</label> -->
                                <input type="password" class="form-control  @error('password') is-invalid @enderror"
                                    id=" password-confirm" placeholder="Password Confirm" name="password_confirmation"
                                    required autocomplete="new-password">
                                <div class="form-text">@error('password') {{$message}} @enderror <br>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Register</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection