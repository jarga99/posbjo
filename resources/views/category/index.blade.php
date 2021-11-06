@extends('layouts.hompage')

@section('title')
    Category
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Category</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header with-border">
                <button onclick="addForm()" class="btn btn-success btn-xs" ><i class="fas fa-plus"></i> Add</button>
            </div>
            <div class="card-body table-responsive">
                <table class="table">
                    <thead class="thead">
                        <th width="5%" >NO</th>
                        <th >Category</th>
                        <th width="15%" ><i class="fas fa-cog"></i> Action</th>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@includeIf('category.form')
@endsection

@push('scripts')
<script>
    let table;

    $(function () {
        table = $('.table').DataTable({
            processing: true,
            autoWidth:false,
            // ajax: {
            //     url: '{{ route ('category.data') }} ',
            // }
        });
    });

    function addForm() {
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Add Category');
    }

</script>
@endpush