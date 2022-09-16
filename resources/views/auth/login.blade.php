<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="shortcut icon" href={{ asset('assets/images/logo/karang-taruna.png') }} type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
<body style="background-color:#ecf9f7;">
    <!-- Section: Design Block -->
    <section class=" text-center text-lg-start p-5 mt-5">
      <style>
        .rounded-t-5 {
          border-top-left-radius: 0.5rem;
          border-top-right-radius: 0.5rem;
        }

        @media (min-width: 992px) {
          .rounded-tr-lg-0 {
            border-top-right-radius: 0;
          }

          .rounded-bl-lg-5 {
            border-bottom-left-radius: 0.5rem;
          }
        }
      </style>
      <div class="card mb-3 shadow">
        <div class="row g-0 d-flex align-items-center">
          <div class="col-lg-5 d-none d-lg-flex">
            <img src="{{ asset('assets/images/logo/alam.jpeg')}}" alt="Trendy Pants and Shoes"
              class="w-100 rounded-t-5 rounded-tr-lg-0 rounded-bl-lg-5" />
          </div>
          <div class="col-lg-7">
            <div class="card-body py-4 px-md-5 ">

              <form method="POST" need-validation action="{{ route('login') }}" class="p-5">
                @csrf
              
                <div class="text-center">
                    <h5>
                        <div class="text-center">
                            <img src="assets/images/logo/karang-taruna.png" class="avatar-xl mb-2" alt="Logo"
                                style="height:100px;width:100px;">
              
                        </div>
                        <div class="text-center mb-5">
              
                          Karang Taruna Cirendeu
                        </div>
                    </h5>
                </div>
              
              
                <div class="form-group position-relative has-icon-left mb-0">
                    <input asp-for="email" type="email" name="email"
                        class="form-control form-control-xl @error('email') is-invalid @enderror"
                        placeholder="email">
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                </div>
                @error('email')
                    <div class="mt-1">
                        <span class="text-danger" asp-validation-for="email">
                            {{ $message }}
                        </span>
                    </div>
                @enderror
                <div class="form-group position-relative has-icon-left mt-4 mb-0">
                    <input asp-for="password" type="password" name="password"
                        class="form-control form-control-xl  @error('password') is-invalid @enderror"
                        placeholder="Password">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                </div>
                @error('password')
                    <div class="mt-1">
                        <span class="text-danger" asp-validation-for="password">
                            {{ $message }}
                        </span>
                    </div>
                @enderror
                <button class="btn btn-dark btn-lg shadow-lg mt-5 w-100">Log in</button>
              </form>

            </div>
          </div>
        </div>
      </div>
    </section>
<!-- Section: Design Block -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>


