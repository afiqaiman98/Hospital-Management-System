<div class="page-section">
    <div class="container">
      <h1 class="text-center mb-5 wow fadeInUp">Our Doctors</h1>

      
      <div class="owl-carousel wow fadeInUp" id="doctorSlideshow">
        @foreach ($doctor as $doctors)
        <div class="item">
          <div class="card-doctor">
            <div class="header">
              <img  height="300px"src="/doctorimage/{{ $doctors->image }}" alt="doctor">
              <div class="meta">
                <a href="#"><span class="mai-call"></span></a>
                <a href="#"><span class="mai-logo-whatsapp"></span></a>
              </div>
            </div>
            <div class="body">
              <p class="text-xl mb-0">Name:{{ $doctors->name }}</p>
              <p class="text-xl mb-0">Phone:{{ $doctors->number }}</p>
              <p class="text-xl mb-0">Room:{{ $doctors->room }}</p>
              <p class="text-xl mb-0">Speciality:{{ $doctors->speciality }}</p>
            </div>
            
          </div>
        </div>
        @endforeach
      </div>

