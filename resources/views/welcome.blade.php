@extends('layouts.home')

@section('content')



<section class="hero">
  <img src="{{ asset('/public/uploads/pics/' . $home->background_picture) }}" class="bg" alt="background picture">

  <div class="content">
    <div class="child1">
      <h1>{{ $home->title1 }}</h1>
      <p>{{ $home->title1_content }}</p>
    </div>

<div class="child2">



  <div class="info-card">
    <div class="number" data-count="{{ $totalUsers }}">0</div>
    <div class="label">Users</div>
  </div>


  </div>
</section>




<script>
  document.addEventListener("DOMContentLoaded", function () {
    const counters = document.querySelectorAll(".number");
    const speed = 200; // Lower is faster

    counters.forEach(counter => {
      const updateCount = () => {
        const target = +counter.getAttribute("data-count");
        const count = +counter.innerText;

        const inc = Math.ceil(target / speed);

        if (count < target) {
          counter.innerText = count + inc;
          setTimeout(updateCount, 15);
        } else {
          counter.innerText = target + "+";
        }
      };

      updateCount();
    });
  });
</script>


  <section class="section_1">
    <div class="content">
      <h1>{{ $home->title2 }}</h1>
      <p>{{ $home->title2_content }}</p>

      <div class="button">
          <a href="{{$home->button1_url}}">
             <!-- #endregion --><i class="fas fa-plus mr-2"></i> {{$home->button1_name}}
          </a>
      </div>

    </div>
  </section>




<section class="section_3">
  <div class="content">
    <div class="text-block">
      <h1>{{ $home->title1 }}</h1>
      <p>{{ $home->title1 }}</p>
    </div>

    <div class="image-container">
      <img src="" alt="picture" class="animated-image" id="main-image" />
    </div>

    <div class="features">


  @foreach($home_table1 as $table)
      <div class="feature" data-image="{{ asset('/public/uploads/pics/' . $table->picture) }}">
        <h4>{{ $table->title1}}</h4>
        <p>{{ $table->title1_content}}</p>
         <small style="color: #888;">{{ $table->title1_small_text}}</small>
      </div>
  @endforeach

    </div>
  </div>
</section>


  <section class="section_2">
  <img src="{{ asset('/public/uploads/pics/' . $home->background_picture2) }}" class="bg" alt="background picture">
      <div class="content">
             <p>{{ $home->title3 }}</p>
      <h1>{{ $home->title3_content }}</h1>

       <div class="button">
          <a href="{{$home->button1_url}}">
             <!-- #endregion --><i class="fas fa-plus mr-2"></i> {{$home->button1_name}}
          </a>
      </div>
      </div>
      
  </section>

  
  <section class="section_4">
      <div class="content">
        <h1>{{$home->title5}}</h1>
              <div class="button">
          <a href="{{$home->button2_url}}">
             <!-- #endregion --><i class="fas fa-plus mr-2"></i> {{$home->button2_name}}
          </a>
      </div>
      </div>
  </section>



<div class="opportunities-container">
  @foreach($opportunities as $index => $opportunity)
    <section class="opportunity-card" onclick="openOverlay('overlay-{{ $opportunity->id }}')">
      <img src="{{ asset('public/' . $opportunity->image) }}" class="bg" alt="background picture">
      <div class="overlay">
        <div class="content">
          <h2>{{ $opportunity->title }}</h2>
          <p>{{ $opportunity->summary }}</p>
          <a href="#" class="read-more">Read more</a>
        </div>
      </div>
    </section>
  @endforeach
</div>

@foreach($opportunities as $opportunity)
  <div id="overlay-{{ $opportunity->id }}" class="fullscreen-overlay">
    <div class="overlay-inner" style="background-image: url('{{ asset('public/' . $opportunity->image) }}');">
      <button onclick="closeOverlay()" class="close-btn">&times;</button>
      <div class="overlay-text">
        <h2>{{ $opportunity->title }}</h2>
        <p>{{ $opportunity->overlay_intro }}</p>
        <div class="more-content">
          <p>{{ $opportunity->overlay_details }}</p>
        </div>
        <button class="expand-btn" onclick="event.stopPropagation(); toggleMore(this)">Read more</button>
      </div>
    </div>
  </div>
@endforeach


 <!-- this is for full screen overlay when clicked -->
<script>
function openOverlay(id) {
  document.getElementById(id).classList.add('active');
  document.body.style.overflow = 'hidden';
}

function closeOverlay() {
  document.querySelectorAll('.fullscreen-overlay').forEach(el => el.classList.remove('active'));
  document.body.style.overflow = '';
}

function toggleMore(button) {
  const moreContent = button.previousElementSibling;
  moreContent.classList.toggle('active');
  button.textContent = moreContent.classList.contains('active') ? 'Show less' : 'Read more';
}
</script>



  

 <!-- this gets -->


<script>
  const features = document.querySelectorAll('.feature');
  const mainImage = document.getElementById('main-image');

  let currentIndex = 0;
  let autoSlide = true;
  let slideInterval;

  function activateFeature(index) {
    const feature = features[index];
    const image = feature.getAttribute('data-image');

    // Start fade-out
    mainImage.classList.add('fade-out');

    setTimeout(() => {
      // Change image source after fade-out
      mainImage.src = image;

      // Reapply fade-in
      mainImage.classList.remove('fade-out');
    }, 400); // Half of the transition duration

    // Update active class
    features.forEach(f => f.classList.remove('active'));
    feature.classList.add('active');
  }

  function startSlideshow() {
    slideInterval = setInterval(() => {
      if (!autoSlide) return;
      currentIndex = (currentIndex + 1) % features.length;
      activateFeature(currentIndex);
    }, 4000);
  }

  features.forEach((feature, index) => {
    feature.addEventListener('click', function () {
      autoSlide = false; // Stop auto slideshow
      activateFeature(index);
    });
  });

  // Start
  activateFeature(currentIndex);
  startSlideshow();
</script>

@endsection
