
@extends('layout.navbar.navbar')
<?php 
	$title= "Registration";
?>

@section('content')

  <section id="registration">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">

          @include('alert-message.success-error-show')

          <div class="card text-left">
            <div class="agriculture_form">
              <div class="card text-left">
                  <h4 class="card-title text-center">নিবন্ধন ফরম</h4>
                  <div class="form-content">

                    <form action="{{ route('register.post')}}" enctype="multipart/form-data" method="POST">
                      @csrf

                     <div class="input-group-1">
                      <label for="name">নাম</label>
                      <div class="input-group">
                        <input id="name" name="name" type="text" class="form-control" required>
                      </div>
                     </div>

                     <div class="input-group-1">
                      <label for="name">পিতা/স্বামী</label>
                      <div class="input-group">
                        <input id="name" name="father_name" type="text" class="form-control" required>
                      </div>
                     </div>

                     <div class="input-group-1">
                      <label for="name">মাতা</label>
                      <div class="input-group">
                        <input id="name" name="mother_name" type="text" class="form-control" required>
                      </div>

                     </div>
                     <div class="input-group-1">
                      <label for="name">ঠিকানা</label>
                      <div class="input-group">
                        <input id="name" name="address" type="text" class="form-control" required>
                      </div>
                    </div>

                     <div class="input-groupp">
                        <label for="panelist_day_of_birth" class="d-block text-start date-of">জন্ম তারিখ</label>
                        <div class="input-group2 d-flex">
                          <input class="date_of_dirthinput" required="" id="panelist_day_of_birth " name="dob_day" type="number" min="1" max="31" maxlength="2" placeholder="১১" autocomplete="bday-day"  class="form-control  form-control-gray " value="">
                          <!-- DD -->
                          <input class="date_of_dirthinput" required="" id="panelist_month_of_birth" name="dob_month" type="number" min="1" max="12" maxlength="2" placeholder="০১" autocomplete="bday-month"  class="form-control  form-control-gray " value="">
                          <!-- MM -->
                          <input class="date_of_dirthinput" required="" id="panelist_year_of_birth" name="dob_year" type="number" min="1922" max="2009" maxlength="4" minlength="4" placeholder="১৯৮০" autocomplete="bday-year"class="form-control  form-control-gray " value="">
                        </div>
                      </div>

                      <div class="input-group-1">
                        <label for="name">জাতীয় পরিচয় পএ নাং</label>
                        <div class="input-group">
                          <input id="name" type="number" name="nid" class="form-control" required>
                        </div>
                      </div>

                      <div class="input-group-1">
                        <label for="file-upload" class="custom-file-upload">
                          <i class="fa fa-cloud-upload"></i> ছ‌বি আপ‌লোড দিন
                        </label>
                        <input id="file-upload" name='image' type="file">
                      </div>

                      <div class="input-group-1">
                        <label for="file-upload" class="custom-file-upload">
                          <i class="fa fa-cloud-upload"></i> ভোটার আই‌ডি প্রথম অংশ আপ‌লোড দিন
                        </label>
                        <input id="file-upload" name='nid_front_side_image' type="file">
                      </div>

                      <div class="input-group-1">
                        <label for="file-upload" class="custom-file-upload">
                          <i class="fa fa-cloud-upload"></i> ভোটার আই‌ডি ২য় অংশ আপ‌লোড দিন
                        </label>
                        <input id="file-upload" name='nid_back_side_image' type="file">
                      </div>

                      <div class="input-group-1">
                        <label for="name">মোবাইল</label>
                        <div class="input-group">
                          <input id="name" type="number" name="contact_number" class="form-control" required>
                        </div>
                      </div>

                      <div class="input-group-1">
                        <label for="passwrd">পাসওয়ার্ড</label>
                        <div class="input-group">
                          <input id="passwrd" type="password" name="password" class="form-control" required>
                        </div>
                      </div>

                      <div class="input-group">
                        <input style="text-transform: uppercase;" class="btnn" type="submit" value="জমা দিন">
                      </div>

                    </form>
                  </div>
              </div>
            </div>
        </div>
        </div>
      </div>
    </div>
  </section>
  
@endsection

   