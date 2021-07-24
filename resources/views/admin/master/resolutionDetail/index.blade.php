@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Resolution Detail</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right"> 
                </ol>
            </div>
        </div> 
        <div class="card card-info"> 
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="{{ route('admin.Master.resolution.detail.store') }}" method="post" class="add_form" no-reset="true" reset-input-text="resolution_no,resolution_date" select-triger="village_select_box"> 
                            <div class="row"> 
                            <div class="col-lg-3 form-group">
                            <label for="exampleInputEmail1">States</label>
                            <span class="fa fa-asterisk"></span>
                            <select name="states" id="state_id" class="form-control select2" onchange="callAjax(this,'{{ route('admin.Master.stateWiseDistrict') }}','district_select_box')">
                            <option selected disabled>Select States</option>
                            @foreach ($States as $State)
                            <option value="{{ $State->id }}">{{ $State->code }}--{{ $State->name_e }}</option>  
                            @endforeach
                            </select>
                            </div>
                            <div class="col-lg-3 form-group">
                            <label for="exampleInputEmail1">District</label>
                            <span class="fa fa-asterisk"></span>
                            <select name="district" class="form-control select2" id="district_select_box" onchange="callAjax(this,'{{ route('admin.Master.DistrictWiseBlock') }}','block_select_box')">
                            <option selected disabled>Select District</option>
                            </select>
                            </div>
                            <div class="col-lg-3 form-group">
                            <label for="exampleInputEmail1">Block MCS</label>
                            <span class="fa fa-asterisk"></span>
                            <select name="block" class="form-control select2" id="block_select_box" onchange="callAjax(this,'{{ route('admin.Master.BlockWiseVillage') }}'+'?id='+this.value+'&district_id='+$('#district_select_box').val(),'village_select_box')">
                                <option selected disabled>Select Block MCS</option> 
                            </select>
                            </div>
                            <div class="col-lg-3 form-group">
                                <label for="exampleInputEmail1">Village</label>
                                <span class="fa fa-asterisk"></span>
                                <select name="village" class="form-control select2" id="village_select_box" select2="true" onchange="callAjax(this,'{{ route('admin.Master.resolution.table.show') }}','table_show_div')">
                                    <option selected disabled>Select Village</option>
                                    
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label>Resolution No.</label>
                                <input type="text" name="resolution_no" id="resolution_no" class="form-control" maxlength="50"> 
                            </div>
                            <div class="col-lg-6">
                                <label>Resolution Date</label>
                                <input type="date" name="resolution_date" id="resolution_date" class="form-control"> 
                            </div>
                            <div class="col-lg-12 form-group">
                             <input type="submit" class="form-control btn btn-primary" value="Save" style="margin-top: 30px">
                            </div>
                            <div class="col-lg-12" style="margin-top: 20px"> 
                            
                             </div>
                            </div>
                        </form>  
                    <div id="table_show_div">
                        
                    </div> 
                    </div>
                </div>
            </div> 
        </div> 
    </section>
    @endsection
    @push('scripts')
    <script type="text/javascript"> 
        $('#district_datatable').DataTable();
    </script>
    @endpush 

