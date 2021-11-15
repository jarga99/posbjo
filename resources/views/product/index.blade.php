@extends('layouts.hompage')

@section('title')
    List Product
@endsection

@section('breadcrumb')
    @parent
    <li class="active">List Product</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header with-border">
                <div class="btn-group">
                    <button onclick="addForm('{{ route('product.store') }}')" class="btn btn-success btn-xs "><i class="fas fa-plus-circle"></i> Add</button>
                    <button onclick="deleteSelected('{{ route ('product.delete_selected') }}')" class="btn btn-danger btn-xs "><i class="fas fa-trash"></i> Delete</button>
                </div>
            </div>
            <div class="card-body table-responsive">
                <form action="" method="post" class="form-product">
                    @csrf
                    <table class="table table-stiped table-bordered">
                        <thead>
                            <th width="5%">
                                <input type="checkbox" name="select_all" id="select_all">
                            </th>
                            <th width="5%">No</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Modal</th>
                            <th>Proce</th>
                            <th>Discount</th>
                            <th>Stock</th>
                            <th width="15%"><i class="fas fa-cog"></i>Action </th>
                        </thead>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>

@includeIf('product.form')
@endsection

@push('scripts')
<script>
    let table;

    $(function () {
        table = $('.table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax: {
                url: '{{ route('product.data') }}',
            },
            columns: [
                {data: 'select_all', searchable: false, sortable: false},
                {data: 'DT_RowIndex', searchable: false, sortable: false},
                {data: 'code_product'},
                {data: 'name_product'},
                {data: 'name_category'},
                {data: 'modal'},
                {data: 'price'},
                {data: 'discount'},
                {data: 'stock'},
                {data: 'aksi', searchable: false, sortable: false},
            ]
        });

        $('#modal-form').validator().on('submit', function (e) {
            if (! e.preventDefault()) {
                $.post($('#modal-form form').attr('action'), $('#modal-form form').serialize())
                    .done((response) => {
                        $('#modal-form').modal('hide');
                        table.ajax.reload();
                    })
                    .fail((errors) => {
                        alert('Tidak dapat menyimpan data');
                        return;
                    });
            }
        });

        $('[name=select_all]').on('click', function () {
            $(':checkcard').prop('checked', this.checked);
        });
    });

    function addForm(url) {
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Add Product');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=name_product]').focus();
    }

    function editForm(url) {
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Edit Product');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('put');
        $('#modal-form [name=name_product]').focus();

        $.get(url)
            .done((response) => {
                $('#modal-form [name=name_product]').val(response.name_product);
                $('#modal-form [name=id_category]').val(response.id_category);
                $('#modal-form [name=modal]').val(response.modal);
                $('#modal-form [name=price]').val(response.price);
                $('#modal-form [name=discount]').val(response.discount);
                $('#modal-form [name=stock]').val(response.stock);
            })
            .fail((errors) => {
                alert('Tidak dapat menampilkan data');
                return;
            });
    }

    function deleteData(url) {
        if (confirm('Yakin ingin menghapus data terpilih?')) {
            $.post(url, {
                    '_token': $('[name=csrf-token]').attr('content'),
                    '_method': 'delete'
                })
                .done((response) => {
                    table.ajax.reload();
                })
                .fail((errors) => {
                    alert('Tidak dapat menghapus data');
                    return;
                });
        }
    }

    function deleteSelected(url) {
        if ($('input:checked').length > 1) {
            if (confirm('Yakin ingin menghapus data terpilih?')) {
                $.post(url, $('.form-product').serialize())
                    .done((response) => {
                        table.ajax.reload();
                    })
                    .fail((errors) => {
                        alert('Tidak dapat menghapus data');
                        return;
                    });
            }
        } else {
            alert('Pilih data yang akan dihapus');
            return;
        }
    }

    
</script>
@endpush