<body onload="xyz()">
@extends('admin.adminLTE-dashboard')

@section('content')



<div class="table_products">
    <h3>Edit Product</h3> 
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

    <form method="post" action="{{url('admin/products/editProduct-post/'.$id)}}">

        @csrf

        <div class="mb-3">
            <label for="code" class="form-label">Code</label>
            <input name="code"type="text" class="form-control" id="code" value="{{ old('code',$prodEdit->code) }}" readonly>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input name="name"type="text" class="form-control" id="name" value="{{ old('name',$prodEdit->name) }}">
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label><br>
            <select name="category_id" class="form-select form-control">
            <option value="" selected disabled>---Select your category---</option>
                @foreach($category as $row)
                <option value="{{$row->id}}"
                
                {{$prodEdit->category_id == $row->id ? 'selected' : '' }}

                   >{{$row->nama}}</option>
                @endforeach
            </select>
        </div>
        
        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input name="stock"type="number" class="form-control" id="stock" value="{{ old('stock',$prodEdit->stock) }}">
        </div>

        <div class="mb-3">
            <label for="varian" class="form-label">Varian</label>
            <input name="varian"type="text" class="form-control" id="varian" value="{{ old('varian',$prodEdit->varian) }}">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input name="description"type="text" class="form-control" id="description" value="{{ old('description',$prodEdit->description) }}">
        </div>
       
     
        <input type="submit" name="submit" class="btn btn-primary">
    </form>


</div>

<script>
        function xyz() {
            // document.getElementsByClassName("nav-link").className += " active";
            var x = document.getElementsByClassName("nav-link")[9];
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




