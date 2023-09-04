<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <ul class="nav justify-content-center">
      <li class="nav-item">
          <a class="nav-link active" href="{{url('/')}}">Home</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="{{url('/customer')}}">Add customer</a>
      </li>
      <li class="nav-item">
          <a class="nav-link disabled" href="{{url('/customer/view')}}">View customers</a>
      </li>
  </ul>
  <a name="" id="" class="btn btn-primary" href="{{route('customer-create')}}" role="button">Add customer</a>
  <a name="" id="" class="btn btn-primary" href="{{route('customer-trash')}}" role="button">Check trash</a>
      <table class="table">
        <thead>
            <tr>
                <th> Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Address</th>
                <th>State</th>
                <th>City</th>
                <th>dob</th>
                <th>states</th>
                <th>point</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          
          @foreach($customers as $customer)
            <tr>
                <td>{{$customer->name}}</td>
                <td>{{$customer->email}}</td>
                <td>
                  @if($customer->gender==='M')
                  Male
                  @elseif($customer->gender==='F') 
                  Female
                  @else
                  Other
                  @endif </td>
                <td>{{$customer->address}}</td>
                <td>{{$customer->state}}</td>
                <td>{{$customer->city}}</td>
                <td>{{$customer->dob}}</td>
                <td>
                  @if($customer->status === 1 )
                  <span class="badge badge-success">
                  Active
                  </span>
                  @else 
                  <span class="badge badge-danger">
                  Deactive
                </span>
                  @endif
                  {{$customer->states}}</td>
                <td>{{$customer->point}}</td>
<td>
  <a href="{{route('customer-delete',['id'=>$customer->customer_id])}}">
  <button type="button" class="badge badge-danger">Trash </button>
  </a>
  <a href="{{route('customer-edit',['id'=>$customer->customer_id])}}">
    <button type="button" class="badge">Update </button>
    </a>
</td>
            </tr>
            @endforeach
            <tr>
                <td scope="row"></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
      </table>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>