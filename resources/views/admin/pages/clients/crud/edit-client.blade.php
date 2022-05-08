<!-- Modal -->
<div class="modal fade editCompany" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Company Profile</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form action="<?= route('update.company.details') ?>" method="post" id="update-company-profile-form" enctype="multipart/form-data">
            @csrf

            <div class="modal-body">
                <div class="modal-body py-10 px-lg-17">

                    <input type="hidden" name="company_id"/>

                    <div class="row col-md-12">
                        <div class="col-md-6">
                            <label class="fs-6 fw-bold mb-2">Company Name</label>
                            <input type="text" class="form-control form-control-solid" name="company_name" value=""/>
                            <span class="text-danger error-text company_name_error"></span>
                        </div>

                        <div class="col-md-6">
                            <label class="fs-6 fw-bold mb-2">Reg No</label>
                            <input type="number" class="form-control form-control-solid" name="reg_no" value=""/>
                            <span class="text-danger error-text reg_no_error"></span>
                        </div>
                    </div>

                    <div class="row col-md-12">
                        <div class="col-md-6">
                            <label class="fs-6 fw-bold mb-2">Trade Lincence</label>
                            <input type="number" class="form-control form-control-solid" name="trade_licence_no" value=""/>
                            <span class="text-danger error-text trade_licence_no_error"></span>
                        </div>

                        <div class="col-md-6">
                            <label class="fs-6 fw-bold mb-2">Tag Line</label>
                            <input type="text" class="form-control form-control-solid" name="tagline" value=""/>
                            <span class="text-danger error-text tagline_error"></span>
                        </div>
                    </div>


                    <div class="row col-md-12">
                        <div class="col-md-6">
                            <label class="fs-6 fw-bold mb-2">Website</label>
                            <input type="text" class="form-control form-control-solid" name="website" value=""/>
                            <span class="text-danger error-text website_error"></span>
                        </div>

                        <div class="col-md-6">
                            <label class="fs-6 fw-bold mb-2">Facebook Id</label>
                            <input type="text" class="form-control form-control-solid" name="facebook_id" value=""/>
                            <span class="text-danger error-text facebook_id_error"></span>
                        </div>
                    </div>

                    <div class="row col-md-12">
                        <div class="col-md-6">
                            <label class="fs-6 fw-bold mb-2">Skype Id</label>
                            <input type="text" class="form-control form-control-solid" name="skype_id" value=""/>
                            <span class="text-danger error-text skype_id_error"></span>
                        </div>

                        <div class="col-md-6">
                            <label class="fs-6 fw-bold mb-2">Bank Account</label>
                            <input type="text" class="form-control form-control-solid" name="bank_account_name" value=""/>
                            <span class="text-danger error-text bank_account_name_error"></span>
                        </div>
                    </div>

                    <div class="row col-md-12">
                        <div class="col-md-6">
                            <label class="fs-6 fw-bold mb-2">Bank Name</label>
                            <input type="text" class="form-control form-control-solid" name="bank_name" value=""/>
                            <span class="text-danger error-text bank_name_error"></span>
                        </div>

                        <div class="col-md-6">
                            <label class="fs-6 fw-bold mb-2">Branch Name</label>
                            <input type="text" class="form-control form-control-solid" name="branch_name" value=""/>
                            <span class="text-danger error-text branch_name_error"></span>
                        </div>
                    </div>

                    <br>
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
                                    <input type="file" name="company_logo" accept=".png, .jpg, .jpeg" />
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
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>
