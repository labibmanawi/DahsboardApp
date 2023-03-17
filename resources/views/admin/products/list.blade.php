<body onload="xyz()">
@extends('admin.adminLTE-dashboard')

@section('content')
<div class="table_products">
<h2>PRODUCTS LIST</h2>
<br>

<div class="row">
    <div class="col-7">
        <a href="{{url('admin/products/insert')}}" class="btn btn-primary">Insert</a>
        <!-- Button trigger modal -->
        <!-- Button trigger modal
<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal">
  Import Data
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
        
        <form action="/importexcel" method="POST" enctype="multipart/form-data">
            @csrf 
            <div class="modal-body">
                <div class="form-group">
                    <input type="file" name="file" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Import Data</button>
            </div>
            </div>
        </form>
  </div>
</div>
    </div>
    
    <div class="row col-5 d-flex justify-content-end">
        <div class="d-flex align-items-center"><div>Export to :</div></div>
        <a href="/exportpdf" class="btn btn-danger ml-3 mr-2">PDF</a>
        <a href="/exportexcel" class="btn btn-success mr-2">EXCEL</a>
        <a href="/exportcsv" class="btn btn-secondary mr-2">CSV</a>
    </div>
    
</div>

<br><br>
@if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif


    
<thead>
    <table class="table"> 
        <tr>
            <th scope="col">No</th>
            <!-- <th scope="col">Code</th> -->
            <th scope="col">Name</th>
            <th scope="col">Category ID</th>
            <th scope="col">Stock</th>
            <th scope="col">Varian</th>
            <th scope="col">description</th>
            <th scope="col">Action</th>
            <th scope="col"></th>
        </tr>
</thead>        

 <tbody>  
         <?php $i=1; ?>
        @foreach($product_list as $key => $data)

        <tr>  
            <td scope="row">{{$i}}</td>
            <!-- <td>{{ $data->code }}</td> -->
            <td>{{ $data->name }}</td>
            <td>{{ $data->category->nama }}</td>
            <td>{{ $data->stock }}</td>  
            <td>{{ $data->varian }}</td> 
            <td>{{ $data->description }}</td>
            <td><a href="{{ url('admin/products/edit/' .$data->id)}}" class="btn btn-primary">Edit</a></td>
            <td><a href="{{ url('admin/products/delete/' .$data->id)}}" class="btn btn-danger" onclick="return confirm('Yakin mau dihapus sob?')">Delete</a></td>
        </tr>
        <?php $i++; ?>
        @endforeach
       
        
       
</tbody>       

    </table>
    {{ $product_list->links() }}
</div>


<script>
        function xyz() {
            // document.getElementsByClassName("nav-link").className += " active";
            var x = document.getElementsByClassName("nav-link")[9];
            x.classList.add("active");
            
    
        };
</script>






@endsection




