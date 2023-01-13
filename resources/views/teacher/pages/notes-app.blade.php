@section('pageTitle','Halaman Catatan Harian')
@extends('template.pages.teacher.inc.app')
@section('content')
@livewire('teacher.pages.notes-app')
@endsection

@push('js')
<script>
    $( window ).on( 'hidden.bs.modal', function () {
                Livewire.emit( 'resetForms' );
            } );
            window.addEventListener( 'hideModal', function ( event ) {
                $( '#addData' ).modal( 'hide' )
            } )
            window.addEventListener( 'showModalEdit', function ( event ) {
                $( '#editData' ).modal( 'show' )
            } )
            window.addEventListener( 'hideModalEdit', function ( event ) {
                $( '#editData' ).modal( 'hide' )
            } )
            window.addEventListener( 'showModalDelete', function ( event ) {
                $( '#deleteData' ).modal( 'show' )
            } )
            window.addEventListener( 'hideModalDelete', function ( event ) {
                $( '#deleteData' ).modal( 'hide' )
            } )

</script>
@endpush
