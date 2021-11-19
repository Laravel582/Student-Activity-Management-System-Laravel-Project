@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/@tailwindcss/custom-forms@0.2.1/dist/custom-forms.css" rel="stylesheet">
<div class="container">
<div class="container p-4 shadow-md rounded-md text-left bg-gray-100 flex" style="max-width: 83.333333%">
    <div class="p-4 rounded-md text-left flex-auto  " style="max-width: max-content ">
    <img class="object-scale-down h-48 w-full"  src="https://ih1.redbubble.net/image.1066412296.0216/fposter,small,wall_texture,product,750x1000.u1.jpg">
    </div>
    <div class="p-4 shadow-md rounded-md text-left bg-gray-50 flex-auto" style="max-width: max-content object-position: right">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-10">
                    @section('header', 'PROGRAMME REPORT FORM (PRF) - Create (Organization Representative Only)')<br>
                        <h5>Supporting documents</h5>
                        <h6>Please attach the following documents</h6>
                    </div>
                    <div class="col-md-2">
                        <a href="{{ route('report.create.step.2') }}" class="btn btn-md btn-success float-right"><i class="fas fa-arrow-left"></i></a>
                    </div>
                </div> 
            </div>
            <div class="card-body">
                <h3>Step 3</h3>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <hr>
                @if(isset($Report->file_path))
                    <img alt="{{$Report->file_path}}" src="/storage/app/public/file_path/{{$Report->file_path}}"/>
                @endif
                <form action="{{ route('report.post.step.3') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="name">1. At least 3 pieces of pictures </label>
                        <input type="file"{{ (!empty($Report->file_path)) ? "disabled" : ''}} class="form-control-file" name="file_path" id="file_path" aria-describedby="fileHelp">
                         <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
                        <br>
                        
                        <br>
                        <label for="name">2. Programme Schedule </label><br>
                        <label for="name">3. Organising Committee (Name/Post/Matric no.) </label><br>
                        <label for="name">4. List of participants (Name/Matric no.) </label><br>
                        <label for="name">5. Programme book, magazine, bulletin (if any)</label><br>
                        <label for="name">6. Approval letter of programme</label>
                    </div>
                    
                    <div class="p-2 flex space-x-96">
                            <div class="flex justify-start">
                                <a type="button" href="{{ route('report.create.step.2') }}" class="btn btn-warning bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded">
                                    Back
                                </a>
                            </div>

                            <div class="flex justify-end space-x-4">
                                <button type="submit" class="btn btn-primary bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                    Cancel
                                </button>
                                <button type="submit" class="btn btn-primary bg-gray-400 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
                                    Save
                                </button>
                                <button type="submit" class="btn btn-primary bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded ">
                                    Review Details
                                </button>
                            </div>
                        </div>

                </form><br/>
                
                @if(isset($Report->file_path))
                        <form action="{{ route('remove.image') }}" method="post">
                            {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Remove Image</button>
                        </form>
                        @endif

                        <div class="content" id="app">
                <div class="title m-b-md">
                    File Uploader - Dropzone
                </div>
                <report-file-uploader-component></report-file-uploader-component>
                </div>

            </div>
        </div>
    </div>
    <script src="{{asset('js/app.js') }} "></script>

@endsection   

