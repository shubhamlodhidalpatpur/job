<html lang="en"><head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Argon Dashboard') }}</title>
    <!-- Favicon -->
    <link href="{{ asset('argon') }}/img/brand/favicon.png" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
    <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <!-- Argon CSS -->
    <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.0.0" rel="stylesheet">
           <!-- Extra details for Live View on GitHub Pages -->
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://www.creative-tim.com/product/argon-dashboard-laravel" />
    <!--  Social tags      -->
    <meta name="keywords" content="dashboard, bootstrap 4 dashboard, bootstrap 4 design, bootstrap 4 system, bootstrap 4, bootstrap 4 uit kit, bootstrap 4 kit, argon, argon ui kit, creative tim, html kit, html css template, web template, bootstrap, bootstrap 4, css3 template, frontend, responsive bootstrap template, bootstrap ui kit, responsive ui kit, argon dashboard">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="Argon - Free Dashboard for Bootstrap 4 by Creative Tim">
    <meta itemprop="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta itemprop="image" content="https://s3.amazonaws.com/creativetim_bucket/products/96/original/opt_ad_thumbnail.jpg">
    <!-- Twitter Card data -->
    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@creativetim">
    <meta name="twitter:title" content="Argon - Free Dashboard for Bootstrap 4 by Creative Tim">
    <meta name="twitter:description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="twitter:creator" content="@creativetim">
    <meta name="twitter:image" content="https://s3.amazonaws.com/creativetim_bucket/products/96/original/opt_ad_thumbnail.jpg">
    <!-- Open Graph data -->
    <meta property="fb:app_id" content="655968634437471">
    <meta property="og:title" content="Argon - Free Dashboard for Bootstrap 4 by Creative Tim" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="https://demos.creative-tim.com/argon-dashboard/index.html" />
    <meta property="og:image" content="https://s3.amazonaws.com/creativetim_bucket/products/96/original/opt_ad_thumbnail.jpg" />
    <meta property="og:description" content="Start your development with a Dashboard for Bootstrap 4." />
    <meta property="og:site_name" content="Creative Tim" />
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-NKDMSK6');
    </script>
    <!-- End Google Tag Manager -->
</head>
<body class="clickup-chrome-ext_installed">
@extends('layouts.app')

@section('content')

               

            <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
<div class="container-fluid">
    <div class="alert alert-danger" role="alert">
        <strong>Post Job !</strong>
      </div>
    <div class="header-body">
        <!-- Card stats -->
    </div>
</div>
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0"> Update Visitor User</h3>
                        </div>
                    </div>
                </div>
                
                <div class="col-12">
                                        </div>
                                        <div class="table-responsive">
                                @foreach ($visiter_user as $item)
                                <form action="/updatevisitoruser/{{$item->id}}" method="POST">
                                    @csrf
                                    <table class="table align-items-center table-flush">
                                           
                                        <tr>
                                            <th scope="col"> First Name</th>
                                            <td> <input type="text" name="first_name" value ="{{$item->fname}}"class="form-control"></td>

                                        </tr>
                                        <tr>
                                            <th scope="col"> Password</th>
                                            <td> <input type="password" name="password" class="form-control" value="{{$item->password}}"></td>

                                        </tr>
                                        
                                        <tr>
                                            <th scope="col">state</th>
                                            <td> <select class="select2 form-control" name="state">
                                                    <option value="">Select state</option>
                                                    @foreach($state as $stat)
                                                    <option value="{{$stat->id}}" @if ($item->state ==$stat->id) selected @endif>{{$stat->name}}</option>
                                                    @endforeach
                                                </select>
                                            </td>

                                        </tr>

                                        <tr>
                                            <th scope="col"> Date Of Birth</th>
                                            <td> <input type="date" name="date_of_birth" value="{{$item->date_of_birth}}" class="form-control"></td>

                                        </tr>
                                        <tr>
                                            <th scope="col">Age</th>
                                            <td> <input type="number" name="age" value="{{$item->age}}" class="form-control"></td>

                                        </tr>
                                        <tr>
                                            <th scope="col">Category</th>
                                            <td> <select class="select2 form-control" name="category">
                                                    
                                                    <option value="general" @if ($item->category =='general') selected @endif>General</option>
                                                    <option value="obc" @if ($item->category =='obc') selected @endif>OBC</option>
                                                    <option value="sc" @if ($item->category =='sc') selected @endif>SC</option>
                                                    <option value="st" @if ($item->category =='st') selected @endif>ST</option>                                                 
                                                </select>
                                            </td>

                                        </tr>
                                        <tr>
                                            <th scope="col">Mobile Number</th>
                                            <td> <input type="text" name="mobile_number" value="{{$item->mobile_number}}"class="form-control"></td>

                                        </tr>
                                       @endforeach

                                        <tr>
                                            <td colspan="4" align="center"> <button type="submit" class="btn btn-outline-primary"> Submit</button></td>
                                        </tr>

                                    </table>
                                </form>
                            </div>
                            </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        
                    </nav>
                </div>
            </div>
        </div>
    </div>
   </div>
 </div>
    @include('layouts.footers.auth')

    @endsection
    
    
    <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    
            
    <!-- Argon JS -->
    <script src="{{ asset('argon') }}/js/argon.js?v=1.0.0"></script>
</body></html>
