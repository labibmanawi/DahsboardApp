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

    <form method="post" action="{{url('admin/orders/insertOrder')}}">

        @csrf
        <div class="mb-3">
            <label for="user_id" class="form-label">name</label><br>
            <select name="user_id" class="form-select form-control">
            <option value="" selected disabled>---Select your user---</option>
                @foreach($users as $usr)
                <option value="{{$usr->id}}">{{'('.$usr->id.')'.$usr->name}}</option>
                @endforeach
            </select>
        </div>
        
        <div class="mb-3">
            <label for="tanggal_order" class="form-label">Tanggal Order</label>
            <input name="tanggal_order" type="date" class="form-select form-control" id="tanggal_order" value="">
        </div>

       
      
        <input type="submit" name="submit" class="btn btn-primary">
    </form>


</div>

<script>
        function xyz() {
          
            var x = document.getElementsByClassName("nav-link")[11];
            x.classList.add("active");
            
    
        };
        

       
</script>



@endsection




