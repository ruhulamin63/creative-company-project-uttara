<!-- Modal -->
<div class="modal fade editCareer" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Job Context</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('update.career.details') }}" method="post" id="update-career-form">
                @csrf

                <div class="modal-body">
                    <div class="modal-body py-10 px-lg-17">

                        <input type="hidden" name="c_id"/>

                        <div class="col-md-12">
                            <label class="fs-6 fw-bold mb-2">Position Name</label>

                            <input type="text" class="form-control form-control-solid" name="position_name" value=""/>
                            <span class="text-danger error-text position_name_error"></span>
                        </div>

                        <div class="col-md-12">
                            <label class="fs-6 fw-bold mb-2">Company Name</label>

                            <input type="text" class="form-control form-control-solid" name="company_name" value=""/>
                            <span class="text-danger error-text company_name_error"></span>
                        </div>

                        <div class="col-md-12">
                            <label class="fs-6 fw-bold mb-2">Vacancy</label>

                            <input type="text" class="form-control form-control-solid" name="vacancy" value=""/>
                            <span class="text-danger error-text vacancy_name_error"></span>
                        </div>

                        <div class="col-md-12">
                            <label class="fs-6 fw-bold mb-2">Job Type</label>

                            <input type="text" class="form-control form-control-solid" name="job_type" value=""/>
                            <span class="text-danger error-text job_type_error"></span>
                        </div>

                        <div class="col-md-12">
                            <label class="fs-6 fw-bold mb-2">Apply Date</label>

                            <input type="date" class="form-control form-control-solid" name="apply_date" value=""/>
                            <span class="text-danger error-text apply_date_error"></span>
                        </div>

                        <div class="col-md-12">
                            <label class="fs-6 fw-bold mb-2">Job Context</label>

                            <textarea type="text" class="form-control form-control-solid" name="job_context" placeholder="Text here..."></textarea>
                            <span class="text-danger error-text job_context_error"></span>
                        </div>

                        <div class="col-md-12">
                            <label class="fs-6 fw-bold mb-2">Job Nature</label>

                            <input type="text" class="form-control form-control-solid" name="job_nature" value=""/>
                            <span class="text-danger error-text job_nature_error"></span>
                        </div>

                        <div class="col-md-12">
                            <label class="fs-6 fw-bold mb-2">Edu Requirement</label>

                            <textarea type="text" class="form-control form-control-solid" name="edu_requirment" placeholder="Text here..."></textarea>
                            <span class="text-danger error-text edu_requirment_error"></span>
                        </div>

                        <div class="col-md-12">
                            <label class="fs-6 fw-bold mb-2">Job Location</label>

                            <input type="text" class="form-control form-control-solid" name="job_location" value=""/>
                            <span class="text-danger error-text job_location_error"></span>
                        </div>

                        <div class="col-md-12">
                            <label class="fs-6 fw-bold mb-2">Salary Range</label>

                            <input type="text" class="form-control form-control-solid" name="salary_range" value=""/>
                            <span class="text-danger error-text salary_range_error"></span>
                        </div>

                        <div class="col-md-12">
                            <label class="fs-6 fw-bold mb-2">Other Benefit</label>

                            <input type="text" class="form-control form-control-solid" name="other_benefit" value=""/>
                            <span class="text-danger error-text other_benefit_error"></span>
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

