@extends('layouts.dashboard_layout')
@section('custom_style')
    <link href="{{ asset('/plugins/tables/css/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection


@section('content')
    <div class="container">
        <div class="main-body">

            {{-- <button class="btn btn-primary text-right mb-2">Download Profile</button> --}}
            <a class="btn btn-primary text-right mb-2" href="{{ route('pdf_student_profile', [$student_data->id]) }}"
                role="button">Download PDF</a>


            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin"
                                    class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <h4>{{ $student_data->name }}</h4>
                                    <p class="text-secondary mb-1">Scholarship Candidate</p>
                                    <p class="text-muted font-size-sm">Student ID: {{ $student_data->sid }}</p>
                                    {{-- <button class="btn btn-primary">Download Profile</button> --}}
                                    {{-- <button class="btn btn-outline-primary">Message</button> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><i class="fas fa-phone pr-2"></i>Phone </h6>
                                <span class="text-secondary">{{ $student_data->phone }}</span>
                            </li>

                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><i class="far fa-envelope pr-2"></i>Email</h6>
                                <span class="text-secondary">{{ $student_data->email }}</span>
                            </li>


                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><i class="fas fa-user-tie pr-2"></i>Date of Birth</h6>
                                <span
                                    class="text-secondary">{{ (new DateTime($student_data->dob))->format('d-M-Y') }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><i class="far fa-building pr-2"></i>Gender</h6>
                                <span class="text-secondary">{{ $student_data->gender }}</span>
                            </li>
                            @forelse($documents as $document)
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><i class="far fa-building pr-2"></i>{{ $document->type }}</h6>
                                {{-- <span class="text-secondary">{{ $student_data->aim_in_life }}</span> --}}
                                <a href="{{ url('storage/uploaded_file/student_document/' . $document->document_url) }}" target="_blank">View/Download</a>
                            </li>
                            @empty
                            @endforelse


                        </ul>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <h4 class="text-center mt-3 text-bold text-info">Educational information</h4>
                        <hr>
                        <div class="col-md-12">
                            <div class="row">

                                <div class="col-md-6">
                                    <table class="table table-borderless table-sm">

                                        <tbody>
                                            <tr>
                                                <th scope="row">Education Level:</th>
                                                <td>{{ $academic_data->level }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Institution:</th>
                                                <td>{{ $academic_data->institution }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Class/Degree:</th>
                                                <td>{{ $academic_data->class_degree }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Semester:</th>
                                                <td>{{ $academic_data->semester }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Marks/GPA/CGPA:</th>
                                                <td>{{ $academic_data->marks_cgpa }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Class Position/ID:</th>
                                                <td>{{ $academic_data->position }}</td>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>

                                @if($academic_data->ssc_gpa || $academic_data->hsc_gpa)
                                <div class="col-md-6">
                                    <table class="table table-borderless table-sm">

                                        <tbody>
                                            <tr>
                                                <th scope="row">SSC Passing Year :</th>
                                                <td>{{ $academic_data->ssc_year }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">SSC Institution Name :</th>
                                                <td>{{ $academic_data->ssc_institution }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">SSC GPA :</th>
                                                <td>{{ $academic_data->ssc_gpa }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">HSC Passing Year :</th>
                                                <td>{{ $academic_data->hsc_year }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">HSC Institution Name :</th>
                                                <td>{{ $academic_data->hsc_institution }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">HSC GPA :</th>
                                                <td>{{ $academic_data->hsc_gpa }}</td>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>
                                @endif
                                <div class="col-md-10">
                                    <table class="table table-borderless table-sm">

                                        <tbody>
                                            @forelse ($achievements as $achievement)
                                                @if ($achievement->achievement != null)
                                                    <tr>
                                                        <th scope="row">Achievement {{ $loop->index + 1 }} :</th>
                                                        <td class="text-left">{{ $achievement->achievement }}</td>
                                                    </tr>
                                                @endif
                                            @empty
                                            @endforelse                                            
                                            <tr>
                                                <th scope="row">Ain in Life :</th>
                                                <td class="text-left">{{ $student_data->aim_in_life }}</td>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <h4 class="text-center mt-3 text-bold text-info">Personal information</h4>
                        <hr>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-10">
                                    <table class="table table-borderless table-sm">

                                        <tbody>
                                            <tr>
                                                <th scope="row">Father's Name:</th>
                                                <td>{{ $student_data->father_name }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Father's Profession:</th>
                                                <td>{{ $student_data->father_profession }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Mother's Name:</th>
                                                <td>{{ $student_data->mother_name }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Mother's Profession:</th>
                                                <td>{{ $student_data->mother_profession }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Siblings and their status :</th>
                                                <td>{{ $student_data->siblings }}</td>
                                            </tr>

                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <h4 class="text-center mt-3 text-bold text-info">Reference information</h4>
                        <hr>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-borderless table-sm">

                                        <tbody>
                                            <tr>
                                                <th scope="row">Reference Name:</th>
                                                <td>{{ $student_data->reference_name }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Reference Profession:</th>
                                                <td>{{ $student_data->reference_profession }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Reference Contact No.</th>
                                                <td>{{ $student_data->reference_phone }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Reason:</th>
                                                <td>{{ $student_data->reason }}</td>
                                            </tr>  

                                        </tbody>

                                    </table>
                                </div>

                                <div class="col-md-10">
                                    <table class="table table-borderless table-sm">

                                        <tbody>



                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <h4 class="text-center mt-3 text-bold text-info">Financial information</h4>
                        <hr>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-borderless table-sm">

                                        <tbody>
                                            <tr>
                                                <th scope="row">Family Income (Tk. Monthly):</th>
                                                <td>{{ $student_data->family_income }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Income Source:</th>
                                                <td>{{ $student_data->income_source }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Other Scholarship:</th>
                                                <td>{{ $student_data->other_scholarship }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Reason:</th>
                                                <td>{{ $student_data->reason }}</td>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>

                                <div class="col-md-10">
                                    <table class="table table-borderless table-sm">

                                        <tbody>



                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <h4 class="text-center mt-3 text-bold text-info">Address</h4>
                        <hr>
                        <div class="col-md-12">
                            <div class="row">


                                <div class="col-md-6">
                                    <table class="table table-borderless table-sm">

                                        <tbody>
                                            <tr>
                                                <th scope="row">Present Division:</th>
                                                <td>{{ $addresses_present->division }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Present District:</th>
                                                <td>{{ $addresses_present->district }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Present Upazila:</th>
                                                <td>{{ $addresses_present->upazila }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Present Area:</th>
                                                <td>{{ $addresses_present->area }}</td>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>

                                @if($addresses_present->same_as_present)
                                <div class="col-md-6">
                                    <table class="table table-borderless table-sm">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Permanent Address:</th>
                                                <td>Same as Present Address</td>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>
                                @else
                                <div class="col-md-6">
                                    <table class="table table-borderless table-sm">

                                        <tbody>
                                            <tr>
                                                <th scope="row">Permanent Division:</th>
                                                <td>{{ $addresses_permanent->division }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Permanent District:</th>
                                                <td>{{ $addresses_permanent->district }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Permanent Upazila:</th>
                                                <td>{{ $addresses_permanent->upazila }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Permanent Area:</th>
                                                <td>{{ $addresses_permanent->area }}</td>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>






                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Education Level</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $academic_data->level }}
                                </div>
                            </div>
                            {{-- <hr> --}}
                            <br>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Institution</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $academic_data->institution }}
                                </div>
                            </div>
                            {{-- <hr> --}}
                            <br>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Class/Degree</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $academic_data->class_degree }}<br>
                                    {{ $academic_data->semester }} semester

                                </div>
                            </div>
                            {{-- <hr> --}}
                            <br>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Marks/GPA/CGPA
                                    </h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $academic_data->marks_cgpa }}
                                </div>
                            </div>
                            {{-- <hr> --}}
                            <br>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Class Position/Roll/ID</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $academic_data->marks_cgpa }}
                                </div>
                            </div>
                            {{-- <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <a class="btn btn-info " target="__blank"
                                        href="https://www.bootdey.com/snippets/view/profile-edit-data-and-skills">Edit</a>
                                </div>
                            </div> --}}
                        </div>
                    </div>

                    <div class="row gutters-sm">
                        <div class="col-sm-6 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="d-flex align-items-center mb-3"><i
                                            class="material-icons text-info mr-2">assignment</i>Project Status</h6>
                                    <small>Web Design</small>
                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 80%"
                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <small>Website Markup</small>
                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 72%"
                                            aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <small>One Page</small>
                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 89%"
                                            aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <small>Mobile Template</small>
                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 55%"
                                            aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <small>Backend API</small>
                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 66%"
                                            aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="d-flex align-items-center mb-3"><i
                                            class="material-icons text-info mr-2">assignment</i>Project Status</h6>
                                    <small>Web Design</small>
                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 80%"
                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <small>Website Markup</small>
                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 72%"
                                            aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <small>One Page</small>
                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 89%"
                                            aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <small>Mobile Template</small>
                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 55%"
                                            aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <small>Backend API</small>
                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 66%"
                                            aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection

@section('extra_js')
    <script src="{{ asset('/plugins/tables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/plugins/tables/js/datatable/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/plugins/tables/js/datatable-init/datatable-basic.min.js') }}"></script>
@endsection
