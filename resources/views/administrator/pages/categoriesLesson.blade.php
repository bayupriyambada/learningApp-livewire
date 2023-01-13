@section('pageTitle','Categories Lesson')
@extends('template.pages.app')
@section('content')
@livewire('administrator.pages.categories-lesson')
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
