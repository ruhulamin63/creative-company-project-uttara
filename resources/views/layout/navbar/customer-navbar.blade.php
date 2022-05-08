  <!-- ======= Header ======= -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="{{route('index.show')}}"><img src="{{asset('media/fabric icon/navbar-logo.png')}}" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav  mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link {{request()->is('/')?'active':''}}" aria-current="page" href="{{route('index.show')}}">HOME</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{request()->is('about-us')?'active':''}}" href="{{route('index.about')}}">ABOUT US</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{request()->is('portfolio')?'active':''}}" href="{{route('index.portfolio')}}">PORTFOLIO</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{request()->is('service')?'active':''}}" href="{{route('index.service')}}">SERVICE</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{request()->is('client')?'active':''}}" href="{{route('index.client')}}">CLIENT</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{request()->is('team')?'active':''}}" href="{{route('index.team')}}">TEAM</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{request()->is('product')?'active':''}}" href="{{route('index.product')}}">OUR PRODUCTS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{request()->is('career')?'active':''}}" href="{{route('index.career')}}">CAREERS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{request()->is('contact-us')?'active':''}}" href="{{route('index.contact')}}">CONTACT US</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{request()->is('company-profile')?'active':''}}" href="{{route('index.company')}}">Company Profile</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- ======= Hero Section ======= -->