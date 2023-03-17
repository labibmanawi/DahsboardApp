<body onload="xyz()">
@extends('admin.adminLTE-dashboard')

@section('content')



<div class="table_products">
    <h3>Insert Product</h3> 
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

    <form method="post" action="{{url('admin/products/insert-post')}}">

        @csrf

        <div class="mb-3">
            <label for="code" class="form-label">Code</label>
            <input name="code"type="text" class="form-control" id="code" value="{{ $last_code }}" readonly>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input name="name"type="text" class="form-control" id="name" value="{{ old('name') }}">
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Category</label><br>
            <select name="category_id" class="form-select form-control">
            <option value="" selected disabled>---Select your category---</option>
                @foreach($category as $row)
                <option value="{{$row->id}}">{{$row->nama}}</option>
                @endforeach
            </select>
        </div>
        
        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input name="stock"type="number" class="form-control" id="stock" value="{{ old('stock') }}">
        </div>

        <div class="mb-3">
            <label for="varian" class="form-label">Varian</label>
            <input name="varian"type="text" class="form-control" id="varian" value="{{ old('varian') }}">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input name="description"type="text" class="form-control" id="description" value="{{ old('description') }}">
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
        


</script>



@endsection




