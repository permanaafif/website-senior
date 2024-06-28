<html>
    <head>
        <title></title>
        <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="/css/style.css">
        <style>
            body{
            background-image: url('img/bgti.png');
            background-size: cover;
            background-position: center;
        color:aliceblue

            }
            #overlay {
        width: 100%;
        height: 100%;
        position: fixed;
        top: 0;
        left: 0;
        background: rgba(0, 0, 0, 0.5); /* Warna gelap dan tingkat kegelapannya */
        z-index: -1;
    }
        </style>

    </head>
    <body>
        <div id="overlay"></div>

        <div class="row justify-content-center">
            <div class="col-md-5">

                @if (session()->has('loginError'))


                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('loginError') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  @endif

                <main class="form-signin w-100 m-auto">
                    <form action="/login" method="post">
                        @csrf

                      {{-- <h1 class="h3 mt-5 mb-5 fw-normal text-center" style="font-family:Arial, Helvetica, sans-serif">L O G I N</h1> --}}
                      <div class=" mt-5 mb-4 fw-normal text-center">
                      <img  src="{{ asset('img/logoti3.png')}}" alt="logo ti" width="20%" >
                      <h3 class="h3 mt-2 mb-2 fw-normal text-center" style="font-family:Arial, Helvetica, sans-serif; -webkit-text-fill-color: black">Teknologi Informasi</h3>

                      </div>

                      <div class="form-floating">
                        <input type="text" name="nip" class="form-control" id="nip" placeholder="NIP" autofocus required>
                        <label for="nip">Nip</label>
                      </div>

                      <div class="form-floating">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                        <label for="password">Password</label>

                      </div>


                      <button class="btn btn-dark w-100 py-2"  type="submit">login</button>

                    </form>

                  </main>
            </div>

        </div>




    </body>
</html>
