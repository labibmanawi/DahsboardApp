<body onload="xyz()">
@extends('admin.adminLTE-dashboard')

@section('content')



<div class="table_products">
    <h3>Insert User</h3> 
    <br>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

    <form method="post" action="{{url('admin/user/insertUser-post')}}">

        @csrf

        <div class="mb-3">
            <label for="id" class="form-label">Id</label>
            <input name="id" type="text" class="form-control" id="id" value="{{ $last_id }}" readonly>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input name="name" type="text" class="form-control" id="name" value="{{ old('name') }}">
        </div>
        
        <!-- <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="number" class="form-control" id="email" value="{{ old('email') }}">
        </div> -->

        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" value="{{ old('email') }}">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input name="password" type="password" class="form-control" id="password"value="{{ old('password') }}">
        </div>

       
        <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
        <input type="submit" name="submit" class="btn btn-primary">
    </form>


</div>

<script>
        function xyz() {
            // document.getElementsByClassName("nav-link").className += " active";
            var x = document.getElementsByClassName("nav-link")[10];
            x.classList.add("active");
            
    
        };
        

        // var aktif = document.querySelectorAll('.nav-item .nav-link:nth-child(3)');
        // aktif.classList.add("active");
  
    
  
  // if (window.location.href == '/admin/user/list2') {
  //   document.querySelectorAll('.nav .nav-link').foreach(function(ele, idx){
  //     ele.classList.add('active');
  //   });
  // };

  
  // var list2 = document.querySelectorAll('.nav .nav-link');

  // if (window.location.href == "http://127.0.0.1:8000/admin/products/list") {

  //   list2[i].addClass(" active");
      
  // }




  // for (var i = 0; i < list2.length; i++) {
  //     list2[i].addEventListener("click", function() {
  //     var current = document.getElementsByClassName("active");
  //     if (current.length > 0) { 
  //       current[0].className = current[0].className.replace(" active", "");
  //     }
  //     this.className += " active";
  //     });
  //   }
  

//    $(".nav .nav-link").on("click", function(){
//    $(".nav").find(".active").removeClass("active");
//    $(this).addClass("active");
//    });

</script>



@endsection




