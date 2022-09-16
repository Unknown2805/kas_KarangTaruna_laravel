<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href={{ asset('assets/css/main/app.css') }}>
    <link rel="stylesheet" href={{ asset('assets/css/main/app-dark.css') }}>
    <link rel="shortcut icon" href={{ asset('assets/images/logo/karang-taruna.png') }} type="image/png">
    <link rel="stylesheet" href={{ asset('assets/css/shared/iconly.css') }}>
  </head>
  <body style="background-color:#ecf9f7;">      

    {{-- <nav class="navbar navbar-expand-lg">
      <b class="text-dark" style="font-size:22px">Kas kartar</b>
      <div class="container">
        
          <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link text-dark" href="/login" style="font-size:20px"><b>Login</b></a>
              </li>
            </ul>
          </div>
      </div>


      <a class="navbar-toggler" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"></span>
      </a>
    </nav> --}}

    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand text-dark" href="#"><b>Kas KarTar</b></a>
        
      <a class="nav-item text-secondary" href="/login" style="font-size:20px">login </a>        
      
    </nav>
      
  <section class="row ms-1 ml-1 mb-2 mt-0">
    
            <div class="row">
              <div class="col-12 col-md-6">
                <div class="col-12 col-md-12">

                  @if (!isset($data2[0]->kartar))
  
                    <div class="card-group">
                          
                      <div class="card mb-4 shadow bg-light">
                        <div class="row">
  
                          <div class="col-12 col-md-12">
                            <img src="assets/images/faces/masjidsamping.jpg" class="card-img" style="height:215px;"/>
                          </div>
  
                          <div class="col-12 col-md-12 mt-2">
                            <div class="judul" style="font-size:20rem ;">
                              <div class="text-center">
                                <h5 class="card-title">Nama KarTar</h5>
                              </div>
                            </div>
                          </div>
                        
                        </div>
                      </div>
  
                    </div>
                      
                  @else
  
                    @foreach($data2 as $e)
                      <div class="card-group" style="height:284px;">
                        
                        <div class="card mb-4 shadow bg-light ">
                          <div class="row">
  
                            <div class="col-12 col-md-12">
                              <img src={{ asset('/storage/kartar/' .$e->image) }} class="card-img" style="height:215px;"/>
                            </div>
  
                            <div class="col-12 col-md-12 mt-2">
                              <div class="judul" style="font-size:20rem ;">
                                <div class="text-center">
                                  <h5 class="card-title">{{ $e->kartar }}</h5>
                                </div>
                              </div>
                            </div>
                          
                          </div>
                        </div>
  
                      </div>
                    @endforeach
                      
                  @endif
  
                    
                </div>
              </div>
              <div class="col-12 col-md-6">
                <div class="col-12 col-md-12">
                  <div class="card-group" style="height:250px;margin-bottom:30px;">
                    <div class="card mb-4 shadow" style="height:260px;">
  
                        <div class="card-header">
                          <h4>Saldo Kas Karang Taruna saat ini</h4>
                          <h5>Saldo: Rp.@money((float)"$rek_t")<h5>
                        </div>
                          
                      
                      <div class="card-body">
                          <div class="row">
                              
                              
                              <div class="col-6 col-md-7">
                                <div class="text-center ms-2 mb-3" style="height: 125px;width:140px;">
                                  <canvas id="d_land_kartar"></canvas>
                                </div>
                              </div>
  
                              <div class="col-6 col-md-5">
                                  <i class="bi bi-circle-fill" style="color:#435EBE;"></i> Pemasukan
                                  <br>
                                  <i class="bi bi-circle-fill" style="color:#43beaf;"></i> Pengeluaran 
  
                              </div>
                          </div>
                          
                      </div>
  
                    </div>
                  </div>
  
                </div>
  
                <div class="col-12 col-md-12 mb-4">
  
                  
                  <div class="card-group" style="height:250px;">
                    <div class="card shadow bg-light" style="height:260px;">
  
                        <div class="card-header">
                          <h4>Saldo Kas Sosial saat ini</h4>
                          <h5>Saldo: Rp.@money((float)"$rek_s")<h5>
                        </div>
                          
                      
                      <div class="card-body">
                          <div class="row">
                              
                              
                              <div class="col-6 col-md-7">
                                  <div class="text-center ms-2 mb-3" style="height: 125px;width:140px;">
                                      <canvas id="d_land_sosial"></canvas>
                                  </div>
                              </div>
                              <div class="col-6 col-md-5">
                                  <i class="bi bi-circle-fill" style="color:#435EBE;"></i> Pemasukan
                                  <br>
                                  <i class="bi bi-circle-fill" style="color:#43beaf;"></i> Pengeluaran 
  
                              </div>
                          </div>
                          
                      </div>
  
                   </div>
                  </div>
  
                </div>
              </div>
              

              

              

            </div>
            
            

          
            

              
            

  </section>

        <script src="assets/js/extensions/ui-chartjs.js"></script>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        {{-- CHART Masjid --}}
        <script>
            const land_kartar = {
               labels: [
                'Jumlah',
                'Jumlah'
            ],
                datasets: [{
                    label: '',
                    data: ["{{ $tot_in_t }}","{{ $tot_out_t }}" ],
                    backgroundColor: [
                        '#435EBE' ,
                        '#43beaf'
                    ],
                    hoverOffset: 4
                }]
            };
    
            const land_kartarr = {
                type: 'doughnut',
                data: land_kartar,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'end',
                        },
                    }
                },
            };
    
            const chartland_kartar = new Chart(
                document.getElementById('d_land_kartar'),
                land_kartarr
            );
        </script>
    
        <script>
            const land_sosial = {
              labels: [
                'Jumlah',
                'Jumlah'
              ],
                datasets: [{
                    label: '',
                    data: ["{{$tot_in_s }}","{{ $tot_out_s }}"],
                    backgroundColor: [
                        '#435EBE' ,
                        '#43beaf'
                    ],
                    hoverOffset: 4
                }]
            };
    
            const land_sosiall = {
                type: 'doughnut',
                data: land_sosial,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'end',
                        },
                    }
                },
            };
    
            const chartland_sosial = new Chart(
                document.getElementById('d_land_sosial'),
                land_sosiall
            );
        </script>
  </body>
</html>
