
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>SEQSA | Register account</title>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

<link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">

<link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">

<link rel="stylesheet" href="../../dist/css/adminlte.min.css?v=3.2.0">
 <!-- Google Font: Source Sans Pro -->
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
 <!-- Font Awesome -->
 <link rel="stylesheet" href="{{ asset('asset/plugins/fontawesome-free/css/all.min.css') }}">
 <link rel="stylesheet" href="{{ asset('asset/plugins/fontawesome-free/css/brands.css') }}">
 <!-- Theme style -->
 <link rel="stylesheet" href="{{ asset('asset/dist/css/adminlte.min.css') }}">
 <link rel="stylesheet" href="{{ asset('asset/plugins/sweetalert2/sweetalert2.css') }}">
 <link rel="stylesheet" href="{{ asset('css/app.css') }}">
 <link rel="stylrsheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
 <!-- jQuery -->
 <script src="{{ asset('asset/plugins/jquery/jquery.min.js') }}"></script>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
 <!-- Bootstrap 4 -->
<script src="{{ asset('asset/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('asset/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('asset/dist/js/demo.js') }}"></script>
{{-- Custom Js --}}
<script src="{{ asset('asset/js/custom.js') }}" type="text/javascript" charset="utf-8"></script>
{{-- <script src="{{ asset('asset/js/other.js') }}" type="text/javascript" charset="utf-8"></script> --}}
{{-- SweetAlert2 --}}
<script src="{{ asset('asset/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

<script nonce="e7300e2d-abde-4cf6-93a4-0e53d064319b">(function(w,d){!function(a,b,c,d){a[c]=a[c]||{};a[c].executed=[];a.zaraz={deferred:[],listeners:[]};a.zaraz.q=[];a.zaraz._f=function(e){return function(){var f=Array.prototype.slice.call(arguments);a.zaraz.q.push({m:e,a:f})}};for(const g of["track","set","debug"])a.zaraz[g]=a.zaraz._f(g);a.zaraz.init=()=>{var h=b.getElementsByTagName(d)[0],i=b.createElement(d),j=b.getElementsByTagName("title")[0];j&&(a[c].t=b.getElementsByTagName("title")[0].text);a[c].x=Math.random();a[c].w=a.screen.width;a[c].h=a.screen.height;a[c].j=a.innerHeight;a[c].e=a.innerWidth;a[c].l=a.location.href;a[c].r=b.referrer;a[c].k=a.screen.colorDepth;a[c].n=b.characterSet;a[c].o=(new Date).getTimezoneOffset();if(a.dataLayer)for(const n of Object.entries(Object.entries(dataLayer).reduce(((o,p)=>({...o[1],...p[1]})))))zaraz.set(n[0],n[1],{scope:"page"});a[c].q=[];for(;a.zaraz.q.length;){const q=a.zaraz.q.shift();a[c].q.push(q)}i.defer=!0;for(const r of[localStorage,sessionStorage])Object.keys(r||{}).filter((t=>t.startsWith("_zaraz_"))).forEach((s=>{try{a[c]["z_"+s.slice(7)]=JSON.parse(r.getItem(s))}catch{a[c]["z_"+s.slice(7)]=r.getItem(s)}}));i.referrerPolicy="origin";i.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(a[c])));h.parentNode.insertBefore(i,h)};["complete","interactive"].includes(b.readyState)?zaraz.init():a.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,"zarazData","script");})(window,document);</script>
<style>
img {
  max-width: 30%;
  height: auto;
}
</style>
</head>

<body class="hold-transition login-page">
    <img src="{{asset('asset/dist/img/amtis-logo.png')}}" >
<div class="login-box">

    <div class="card">
        <div class="card-body login-card-body">
        <p class="login-box-msg">Register you account</p>

        <form action="{{route('userprofile.store')}}" method="POST">
            @csrf
            <div class="input-group mb-3">
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Name" value="{{old('name')??($user_detail->name??'')}}" />
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror

            </div>
           
            <div class="form-group">
                <select {{$show??""==1?"disabled":""}} name="user_role" id="user_role" class="form-control @error('user_role') is-invalid @enderror" {{$disabled??''}}>
                    <option selected>User Role</option>
                    @foreach ($user_role as $item )

                    <option value="{{$item->name}}"  @selected(($file->file_type??'') ==  $item->name) >{{$item->name}}</option>
                        
                    @endforeach
                </select>
                @error('user_role')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
           
            <div class="input-group mb-3">
                <input type="email" class="form-control @error('user_email') is-invalid @enderror" id="user_email" name="user_email" aria-describedby="emailHelp"placeholder="www@gmail.com" value='{{old('user_email')??($user_detail->user_email??'')}}' >
                @error('user_email')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
      
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control @error('user_name') is-invalid @enderror" id="user_name" name="user_name" placeholder="username" value='{{old('user_name')??($user_detail->user_name??'')}}' >
                @error('user_name')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
          
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control @error('user_password') is-invalid @enderror" id="user_password" name="user_password" placeholder="password" value='{{old('user_password')??($user_detail->user_password??'')}}' >
                    @error('user_password')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                   
            </div>
            <button type="submit" class="btn btn-success" onclick="insert()">Submit</button>
            <a class="btn btn-primary" href="{{route('index')}}">Back</a>
        </form>
        </div>
    </div>
    <script>
    function insert(){
    //     event.preventDefault();
    //     Swal.fire({
    //       title: 'Are you sure?',
    //       text: 'Your account will be created',
    //       icon: 'warning',
    //       showDenyButton: true,
    //       confirmButtonColor: '#3085d6',
    //       denyButtonColor: '#d33',
    //       denyButtonText: 'No',
    //       confirmButtonText: 'Yes',
    //       reverseButtons: true
    //   }).then((result) => {
    //       if (result.isConfirmed) {
    //       // disable the button to prevent multiple clicks
    //       $(this).attr('disabled', true);
          
    //       var name = $("#name").val();
    //       var user_role = $("#user_role").val();
    //       var user_email = $("#user_email").val(); 
    //       var user_name = $("#user_name").val();
    //       var user_password = $("#user_password").val(); 
    //       // submit the form using AJAX
    //       $.ajax({
    //         type: "post",
    //         url: "{{ url('/userprofile/store') }}/" + id,
    //         data: {
    //             "_token": "{{ csrf_token() }}",
    //             "name" : name,
    //             "user_role" : user_role,
    //             "user_email" : user_email,
    //             "user_name" : user_name,
    //             "user_password" : user_password
                
    //         },
    //         success: function(response) {
    //           // show the success message
    //           Swal.fire(
    //             'Successfull',
    //             'Project have been update',
    //             'success'
    //           );
              
    //           // reload the page after a short delay
    //           setTimeout(function() {
    //             // location.reload();
    //             $(".btn-close").click();
    //             read();
    //             read();
    //           }, 2000);
    //         },
    //         error: function(xhr) {
    //           // show an error message
    //           Swal.fire(
    //             'Error',
    //             'The form could not be submitted',
    //             'error'
    //           );
              
    //           // re-enable the button
    //           $(this).attr('disabled', false);
    //         }
    //       });
    //       } else if (result.isDenied) {
    //           Swal.fire(
    //           'Tindakan Dibatalkan',
    //           'Tiada tindakan dilakukan',
    //           'error'
    //           )
    //       }
    //   })
     }
</script>

<script src="../../plugins/jquery/jquery.min.js"></script>

<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="../../dist/js/adminlte.min.js?v=3.2.0"></script>

</body>
</html>




