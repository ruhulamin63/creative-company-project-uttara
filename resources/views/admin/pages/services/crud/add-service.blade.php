<!-- Modal -->
<div class="modal fade addService" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Added Service</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form action="{{ route('admin.add.service.post') }}" method="post" id="add-service-form">
                @csrf

                <div class="modal-body">
                    <div class="modal-body py-10 px-lg-27">

                        <div class="row col-md-12">
                            <input type="hidden" name="s_id"/>

                            <div class="col-md-6">
                                <label class="fs-6 fw-bold mb-2">Service Name</label>

                                <input type="text" class="form-control form-control-solid" name="service_name" value=""/>
                                <span class="text-danger error-text service_name_error"></span>
                            </div>

                            <div class="col-md-6">
                                <label class="fs-6 fw-bold mb-2">Description</label>
                                <textarea type="text" class="form-control form-control-solid" name="service_desc" >Text Here...</textarea>
                                <span class="text-danger error-text description_error"></span>
                            </div>
                        </div>

                        <br>
                        <div class="row col-md-12">
                            <!--begin::Label-->
                            <label class="fs-6 fw-bold mb-2">Select image:</label>
                            <!--end::Label-->
                            <input type="file" id="img" name="service_image" accept="image/*">
                           
                            <!--begin::Hint-->
                            <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                            <!--end::Hint-->
                            <br>
                        </div>

                        <br>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Added</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

