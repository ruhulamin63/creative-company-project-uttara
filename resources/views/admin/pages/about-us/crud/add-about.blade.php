<!-- Modal -->
<div class="modal fade addAbout" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Added About</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('admin.add.about.post') }}" method="post" id="add-about-form" enctype="multipart/form-data">
                @csrf

                <div class="modal-body">
                    <div class="modal-body py-10 px-lg-17">

                        <input type="hidden" name="c_id"/>

                        <div class="row col-md-12">
                            <div class="col-md-6">
                                <label class="fs-6 fw-bold mb-2">Title</label>
                                <input type="text" class="form-control form-control-solid" name="title" value=""/>
                                <span class="text-danger error-text title_error"></span>
                            </div>
                            <div class="col-md-6">
                                <label class="fs-6 fw-bold mb-2">Mission Title</label>
                                <input type="text" class="form-control form-control-solid" name="mission_title" value=""/>
                                <span class="text-danger error-text mission_title_error"></span>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label class="fs-6 fw-bold mb-2">Difference Title</label>
                            <input type="text" class="form-control form-control-solid" name="difference_title" value=""/>
                            <span class="text-danger error-text difference_title_error"></span>
                        </div>

                        <div class="col-md-12">
                            <label class="fs-6 fw-bold mb-2">Desciption</label>
                            <textarea type="text" class="form-control form-control-solid" name="desc" placeholder="Text here..."></textarea>
                            <span class="text-danger error-text desc_error"></span>
                        </div>

                        
                        <div class="col-md-12">
                            <label class="fs-6 fw-bold mb-2">Mission Desc</label>
                            <textarea type="text" class="form-control form-control-solid" name="mission_desc" placeholder="Text here..."></textarea>
                            <span class="text-danger error-text mission_desc_error"></span>
                        </div>

                        <div class="col-md-12">
                            <label class="fs-6 fw-bold mb-2">Difference Desc</label>
                            <textarea type="text" class="form-control form-control-solid" name="difference_desc" placeholder="Text here..."></textarea>
                            <span class="text-danger error-text difference_desc_error"></span>
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

