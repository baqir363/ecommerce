@extends('layouts.admin')

@section('content')
    <div class="p-6">
        <h1 class="text-lg">Create Pages</h1><br><br>

        <form method="POST" action="{{ route('page.store') }}">
            @csrf

            <!-- Name -->
            <div>
                <label>Name</label>
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>


            <div class="mt-4">
                <x-input-label for="slug" :value="__('Slug/URL')" />
                <x-text-input id="slug" class="block mt-1 w-full" type="text" name="slug" :value="old('slug')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('slug')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="content" :value="__('Content')" />
                <textarea id="editor" class="block mt-1 w-full" name="content" required autocomplete="username">{{old('content')}} </textarea>
                <x-input-error :messages="$errors->get('content')" class="mt-2" />
            </div>



            <div class="flex items-center justify-start mt-4">

               <input type="submit" value="{{ __('Create') }}">
            </div>
        </form>
    </div>

    {{-- <script src="https://cdn.ckeditor.com/skeditor5/25.0.0/classic/ckeditor.js"></script> --}}
    {{-- <script>
            ClassicEditor
            .create( document.querySelector( '#editor' ))
            .then( editor => {
                console.log( editor);
            })
            .catch( error => {
                console.error( error);
            });
    </script> --}}

            <script src="https://cdn.ckeditor.com/ckeditor5/44.1.0/ckeditor5.umd.js"></script>
           {{--  <script>
            const {
                ClassicEditor,
                Essentials,
                Bold,
                Italic,
                Font,
                Paragraph
            } = CKEDITOR;

            ClassicEditor
                .create( document.querySelector( '#editor' ), {
                    licenseKey: '<YOUR_LICENSE_KEY>', // Create a free account on https://portal.ckeditor.com/checkout?plan=free
                    plugins: [ Essentials, Bold, Italic, Font, Paragraph ],
                    toolbar: [
                        'undo', 'redo', '|', 'bold', 'italic', '|',
                        'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
                    ]
                } )
                    .then( editor => {
                        window.editor = editor;
                    } )
                    .catch( error => {
                        console.error( error );
                    } );
            </script> --}}



@endsection
