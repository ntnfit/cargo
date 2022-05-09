<html>
    <body>
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Something went wrong.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif
@if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{session('success')}}
    </div>
    @endif
        <form action="{{route('postre')}}" method="POST" id="add-sender">
        @csrf
          <div class="form-group">
          <input type="text" id="name-sender" name="customer_id" class="custom-inp" required/>
          <label>Name</label>
          <input type="text" id="name-sender" name="name" class="custom-inp" required/>
          </div>
          
          <div class="form-group">
          <label>Mobile</label>
          <input type="text" id="phone-sender"  name="phone" class="custom-inp" required />
          </div>
          <div class="form-group">
          <label>Address</label>
          <textarea id="address-sender" name="address"class="custom-inp-txt" required></textarea>
          </div>
          
          <div class="">

          <button type="submit" class="btn btn-success" id="btn-save-sender" value="addsender">Save
          </button>
          </div>
	     </form>
    </body>
</html>