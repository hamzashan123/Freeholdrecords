@extends('layouts.admin')
@section('styles')
    <link rel="stylesheet" href="{{ asset('backend/vendor/select2/css/select2.min.css') }}">
@endsection
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><b>Assign Forms</b></div>
                <div class="card-body">
                <form action="{{ route('admin.userform.create') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="permissions"><b>Select Client </b></label>
                                    <select name="user_id" id="user_id" class="form-control" >
                                       <option value="0" selected disabled>  Select </option>
                                       @if(isset($users)) 
                                       @foreach($users as $user)
                                           
                                            <option value="{{ $user->id }}">{{ $user->username }} </option>
                                        @endforeach
                                        @endif
                                    </select>
                                    
                                </div>
                              
                            </div>
                            <div class="col-6">
                                
                                <div class="form-group">
                                    <label for="permissions"><b>Select Forms </b> </label>
                                    <select name="form_ids[]" id="permissions" class="form-control select2" multiple="multiple">
                                        
                                         
                                            <option value="1"> Form 360</option>
                                            <option value="2"> Employer Form</option>
                                          

                                        
                                    </select>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="form-group" style="text-align:right">
                            <button type="submit" class="btn btn-primary">Assign Form</button>
                        </div>
                </form>
                </div>
                
            </div>
        </div>
          <br>
          <hr>
        <div class="col-12">
            <div class="card">
                <div class="card-header"><b>Client Forms List</b></div>
                <div class="card-body">
            
                        <div class="row">
                            <div class="col-12">
                            <div class="table-responsive">
                <table class="table table-content table-hover">
                    <thead>
                        <tr>
                            <th>Client Name</th>
                            <th>Client Email</th>
                            <th>Total Forms Assigned</th>
                            <th>Action</th>
                        </tr>
                       
                    </thead>
                    <tbody>
                  
                    </tbody>
                    
                </table>
            </div>
                            </div>
                        </div>
                       
              
                </div>
                
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script src="{{ asset('backend/vendor/select2/js/select2.full.min.js') }}"></script>
    <script>
        $(function () {
            // select2
            function matchStart(params, data) {
                // If there are no search terms, return all of the data
                if ($.trim(params.term) === '') {
                    return data;
                }

                // Skip if there is no 'children' property
                if (typeof data.children === 'undefined') {
                    return null;
                }

                // `data.children` contains the actual options that we are matching against
                var filteredChildren = [];
                $.each(data.children, function (idx, child) {
                    if (child.text.toUpperCase().indexOf(params.term.toUpperCase()) == 0) {
                        filteredChildren.push(child);
                    }
                });

                // If we matched any of the timezone group's children, then set the matched children on the group
                // and return the group object
                if (filteredChildren.length) {
                    var modifiedData = $.extend({}, data, true);
                    modifiedData.children = filteredChildren;

                    // You can return modified objects from here
                    // This includes matching the `children` how you want in nested data sets
                    return modifiedData;
                }

                // Return `null` if the term should not be displayed
                return null;
            }

            $(".select2").select2({
                tags: true,
                closeOnSelect: false,
                minimumResultsForSearch: Infinity,
                matcher: matchStart
            });
        })
    </script>
@endsection
