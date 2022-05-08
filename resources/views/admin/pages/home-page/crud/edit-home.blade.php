<!-- Modal -->
<div class="modal fade editHome" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Home Page</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form action="<?= route('update.home.details') ?>" method="post" id="update-home-form" enctype="multipart/form-data">
            @csrf

            <div class="modal-body">
                <div class="modal-body py-10 px-lg-27">

                    <input type="hidden" name="home_id"/>

                    <div class="row col-md-12">
                        <div class="col-md-6">
                            <label class="fs-6 fw-bold mb-2">Title</label>
                            <input type="text" class="form-control form-control-solid" name="title" value=""/>
                            <span class="text-danger error-text title_error"></span>
                        </div>

                        <div class="col-md-6">
                            <label class="fs-6 fw-bold mb-2">Logo Name</label>
                            <input type="text" class="form-control form-control-solid" name="logo_name" value=""/>
                            <span class="text-danger error-text trade_licence_no_error"></span>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label class="fs-6 fw-bold mb-2">Description</label>
                        <textarea type="text" class="form-control form-control-solid" name="desc" placeholder="Text Here"></textarea>
                        <span class="text-danger error-text reg_no_error"></span>
                    </div>

                    <div class="col-md-12">
                        <!--begin::Label-->
                        <label class="fs-6 fw-bold mb-2">Select image</label>
                        <div class="col-lg-8">
                     
                            <!--begin::Image input-->
                            <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url({{asset('media/avatars/blank.png')}})">
                                <!--begin::Preview existing avatar-->
                                <div class="image-input-wrapper w-80px h-80px bgi-position-center" style="background-size: 75%; background-image: url({{asset('media/svg/brand-logos/volicity-9.svg')}})"></div>
                                <!--end::Preview existing avatar-->
                                <!--begin::Label-->
                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                    <i class="bi bi-pencil-fill fs-7"></i>
                                    <!--begin::Inputs-->
                                    <input type="file" name="logo" accept=".png, .jpg, .jpeg" />
                                    <input type="hidden" name="avatar_remove" />
                                    <!--end::Inputs-->
                                </label>
                                <!--end::Label-->
                                <!--begin::Cancel-->
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                                <!--end::Cancel-->
                                <!--begin::Remove-->
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                                <!--end::Remove-->
                            </div>
                            <!--end::Image input-->
                            <!--begin::Hint-->
                            <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                            <!--end::Hint-->
                        </div>
                    </div>  

                    <br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Added</button>
                    </div>
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>
