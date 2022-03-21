
<!DOCTYPE html>
<html lang="en">
  <head>
  @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <div class="ps-lg-1">
              <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white me-0"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
       @include('admin.navbar')
        <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <div class="container">
            <table class="table">
                <tr class="table-light">
                   <th scope="col">Dr Name</th>
                   <th scope="col">Dr Phone Number</th>
                   <th scope="col">Speciality</th>
                   <th scope="col">Room</th>
                   <th scope="col">Image</th>
                   <th scope="col">Delete</th>
                   <th scope="col">Update</th>

                </tr>
                @foreach ($data as $doctor)
                    
                <tr>
                    <td class="table-primary">{{ $doctor->name }}</td>
                    <td class="table-primary">{{ $doctor->number }}</td>
                    <td class="table-primary">{{ $doctor->speciality }}</td>
                    <td class="table-primary">{{ $doctor->room }}</td>
                    <td><img height="100" width="100"src="doctorimage/{{ $doctor->image }}"></td>
                    <td class="table-primary">
                        <a onclick="return confirm('are you sure want to delete')" class=" btn btn-danger" href="{{ url('deletedoctor',$doctor->id) }}">Delete</a>
                    </td>
                    <td class="table-primary">
                        <a class=" btn btn-info" href="{{ url('updatedoctor',$doctor->id) }}">Update</a>
                    </td>
         
                </tr>

                @endforeach
            </table>
        </div>
      </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
        @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>