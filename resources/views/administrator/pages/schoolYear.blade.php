@section('pageTitle', 'School Year')
@extends('template.pages.app')
@section('content')
    @livewire('administrator.pages.school-year')
@endsection

@push('js')
    <script>
        $(window).on('hidden.bs.modal', function() {
            $('#isActive').select2({
                width: '100%'
            });
            Livewire.emit('resetForms');
        });

        window.addEventListener('hideModal', function(event) {
            $('#addData').modal('hide')
        })
        window.addEventListener('showModalEdit', function(event) {
            $('#editData').modal('show')
        })
        window.addEventListener('hideModalEdit', function(event) {
            $('#editData').modal('hide')
        })
        window.addEventListener('showModalDelete', function(event) {
            $('#deleteData').modal('show')
        })
        window.addEventListener('hideModalDelete', function(event) {
            $('#deleteData').modal('hide')
        })
    </script>
@endpush
