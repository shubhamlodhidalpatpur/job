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
<style></style>
               
<!-- Trigger the modal with a button -->

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
    <h4 class="modal-header">Update Annoucement</h4>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form action="/UpdateAnnoucement" method="POST">
        @csrf
      <div class="modal-body">
        <input type="text"  name="annoucement" class="form-control" value="{{$post_annoucements->annoucement}}">
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
      </form>
    </div>

  </div>
</div>

            <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
<div class="container-fluid">
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
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
                            <h3 class="mb-0">Post Job</h3>
                        </div>
                        <div class="col text-right">
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal">Update Annoucement</button>
                            </div>
                        <div class="col text-right">
                            <a href="{{ route('Addpost') }}" class="btn btn-sm btn-primary">Add Post Job</a>
                        </div>
                    </div>
                </div>
                
                <div class="col-12">
                                        </div>

                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Category</th>
                                <th scope="col">state</th>
                                <th scope="col">department</th>
                                <th scope="col">post name</th>
                                <th scope="col">Start Date</th>
                                <th scope="col">end date</th>
                                <th scope="col">Min Age</th>
                                <th scope="col">Max Age</th>
                                <th scope="col">education eligibility</th>
                                <th scope="col">Fee</th>
                                <th scope="col">notifaction Link</th>
                                <th scope="col">apply link</th>
                                <th scope="col">No. of vacancy</th>
                                <th scope="col">action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($PostJob as $Job)
                            <tr>
                                    <td>{{$Job->category}}</td>
                                    <td>{{$Job->state}}</td>
                                    <td>{{$Job->department}}</td>
                                    <td>{{$Job->name}}</td>
                                    <td>{{$Job->start_date}}</td>
                                    <td>{{$Job->end_date}}</td>
                                    <td>{{$Job->min_age}}</td>
                                    <td>{{$Job->max_age}}</td>
                                    <td>{{$Job->eligibility}}</td>
                                    <td>{{$Job->fee}}</td>
                                    <td><a href="{{$Job->notification_link}}" title="Notification Link" target="_blank">Notification Link</a></td>
                                    <td><a href="{{$Job->apply_link}}" title="Apply Link" target="_blank">Apply Link</a></td>
                                    <td>{{$Job->no_of_vacancy}}</td>
                                    <td><div class="action-link">
                                            <a href="getPostjob/{{$Job->id}}" title="View"><i class="far fa-eye"></i></a>
                                            <a href="editPostJob/{{$Job->id}}" title="Edit"><i class="far fa-edit"></i></a>
                                            <a href="destroyPostJob/{{$Job->id}}" title="Delete"><i class="far fa-trash-alt"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
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
