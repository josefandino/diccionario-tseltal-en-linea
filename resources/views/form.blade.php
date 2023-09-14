@extends('layouts.app')

@section('css')
    <link href="{{ asset('/css/dropzone.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="container">
        <div class="row"    >
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Multi Subida de Audios
                </div>
                <div class="panel-body">

                    <form method="post" action="{{ route('file.store') }}" files="true" id="my-dropzone" class="dropzone">
                            {{csrf_field()}}
                            <div class="dz-message" style="height:200px;">
                                Arrastra los audios
                            </div>
                            <div class="dropzone-previews"></div>
                    </form>

                </div>
            </div>
        </div>



@endsection
@section('scripts')

{{-- <script src="{{ asset('js/dropzone.js') }}"></script> --}}


    <script>
        Dropzone.options.myDropzone = {
            autoProcessQueue: true,
            uploadMultiple: true,
            maxFilezise: 10,
            maxFiles: 10000,

            init: function() {
                var submitBtn = document.querySelector("#submit");
                myDropzone = this;

                submitBtn.addEventListener("click", function(e){
                    e.preventDefault();
                    e.stopPropagation();
                    myDropzone.processQueue();
                });


                this.on("complete", function(file) {
                    myDropzone.removeFile(file);
                });

                this.on("success",
                    myDropzone.processQueue.bind(myDropzone)
                );
            }
        };
    </script>
@endsection
