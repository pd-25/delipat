@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <form action="{{ route('createContent') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="card">
                    <div class="card-title">
                        <h4>Create Content</h4>
                        @if (Session::has('msg'))
                            <p class="alert alert-info">{{ Session::get('msg') }}</p>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="basic-form">

                            <div class="row justify-content-center">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Service Name</label>
                                        <select name="service_id" class="form-control" required>
                                            <option value="">select service</option>
                                            @foreach ($services as $item)
                                                <option value="{{ $item->id }}">{{ $item->service_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('service_id')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ 'Service name is required' }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-title">
                        <h4>Top Content</h4>
                        @if (Session::has('msgTop'))
                            <p class="alert alert-info">{{ Session::get('msgTop') }}</p>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" class="form-control" name="topContent[image]" required>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" placeholder="title" name="topContent[title]"
                                    value="{{ old('title') }}" required>

                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" placeholder="Description" name="topContent[description]" cols="30" rows="10"
                                    required>{{ old('description') }}</textarea>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">

                    <div class="card-title">
                        <h4>Middle Card Content</h4>
                        @if (Session::has('msgMiddle'))
                            <p class="alert alert-info">{{ Session::get('msgMiddle') }}</p>
                        @endif
                    </div>

                    <div class="row" id="middle-content">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" placeholder="title"
                                    name="middleContent[0][title]" value="{{ old('title') }}" required>

                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" placeholder="Description" name="middleContent[0][description]" cols="30"
                                    rows="10" required>{{ old('description') }}</textarea>

                            </div>

                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" class="form-control" name="middleContent[0][image]" required>
                            </div>
                        </div>
                        <div class="col-lg-6" id="addbutton">
                            <div class="text-center m-5 ">
                                <button type="button" class="btn-primary btn-circle" onclick="addMoremiddleContent(0)">
                                    Add more</button>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="card">
                    <div class="card-title">
                        <h4>After Middle Content</h4>
                        
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" placeholder="title"
                                    name="afterMiddleContent_title" value="{{ old('title') }}" required>

                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" placeholder="Description" name="afterMiddleContent_desc" cols="30" rows="10"
                                    required>{{ old('description') }}</textarea>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-title">
                        <h4>After Middle Content</h4>
                        @if (Session::has('msgTt'))
                            <p class="alert alert-info">{{ Session::get('msgTt') }}</p>
                        @endif
                    </div>
                    <div class="row" id="after-middle-content">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" placeholder="title"
                                    name="afterMiddleContentt[0][title]" value="{{ old('title') }}" required>

                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" placeholder="Description" name="afterMiddleContentt[0][description]" cols="30"
                                    rows="10" required>{{ old('description') }}</textarea>

                            </div>
                        </div>
                        <div class="col-lg-6" id="addbuttonafter">
                            <div class="text-center m-5 ">
                                <button type="button" class="btn-primary btn-circle"
                                    onclick="addMoreAftermiddleContent(0)">
                                    Add more</button>

                            </div>
                        </div>
                    </div>
                </div>


                {{-- faq --}}
                <div class="card">
                    <div class="card-title">
                        <h4>FAQ</h4>
                        @if (Session::has('msgFaq'))
                            <p class="alert alert-info">{{ Session::get('msgFaq') }}</p>
                        @endif
                    </div>
                    <div class="row" id="faq-content">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Question</label>
                                <input type="text" class="form-control" placeholder="title"
                                    name="faqContent[0][title]" value="{{ old('title') }}" required>

                            </div>
                            <div class="form-group">
                                <label>Answer</label>
                                <textarea class="form-control" placeholder="Description" name="faqContent[0][description]" cols="30"
                                    rows="10" required>{{ old('description') }}</textarea>

                            </div>
                        </div>
                        <div class="col-lg-6" id="addbuttonFaq">
                            <div class="text-center m-5 ">
                                <button type="button" class="btn-primary btn-circle" onclick="addMoreFaqContent(0)">
                                    Add more</button>

                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-default">Submit</button>


            </form>

        </div>
    </div>
@endsection

@section('script')
    <script>
        var formNo = 1;

        function addMoremiddleContent(i) {
            // alert(i);
            ++formNo;
            newI = ++i;
            // alert(i);
            var newForm =
                ' <div class="col-lg-6" id="middleContent' + formNo +
                '"><div class="form-group"><label>Title</label><input type="text" class="form-control" placeholder="title" name="middleContent[' +
                i +
                '][title]" value="{{ old('title') }}">@error('title')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span> @enderror </div><div class="form-group"><label>Description</label><textarea class="form-control" placeholder="Description" name="middleContent[' +
                i +
                '][description]" cols="30" rows="10">{{ old('description') }}</textarea>@error('description')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>@enderror</div><div class="form-group"><label>Image</label><input type="file" class="form-control" name="middleContent[' +
                i +
                '][image]"></div><div class="text-center"><button class="btn btn-danger btn-sm" type="button" onclick="removeSubEvent(' +
                formNo +
                ')">Remove</button></div> </div></div></div></div><div class="col-lg-6" id="addbutton"><div class="text-center m-5 "><button type="button" class="btn-primary btn-circle" onclick="addMoremiddleContent(' +
                newI + ')">Add more</button></div></div></div>';
            document.getElementById("addbutton").remove();
            document.getElementById("middle-content").innerHTML += newForm;
            // i++;
        }

        function removeSubEvent(subevent_id) {
            const element = document.getElementById('middleContent' + subevent_id).remove();
        }



        function addMoreAftermiddleContent(i) {
            // alert(i);
            ++formNo;
            newI = ++i;
            // alert(i);
            var newForm =
                ' <div class="col-lg-6" id="aftermiddleContent' + formNo +
                '"><div class="form-group"><label>Title</label><input type="text" class="form-control" placeholder="title" name="afterMiddleContentt[' +
                i +
                '][title]" value="{{ old('title') }}">@error('title')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span> @enderror </div><div class="form-group"><label>Description</label><textarea class="form-control" placeholder="Description" name="afterMiddleContentt[' +
                i +
                '][description]" cols="30" rows="10">{{ old('description') }}</textarea> @error('description') <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>  @enderror </div><div class="text-center"><button class="btn btn-danger btn-sm" type="button" onclick="removeAfterMiddle(' +
                formNo +
                ')">Remove</button></div> </div></div></div></div><div class="col-lg-6" id="addbuttonafter"><div class="text-center m-5 "><button type="button" class="btn-primary btn-circle" onclick="addMoreAftermiddleContent(' +
                newI + ')">Add more</button></div></div></div>';
            document.getElementById("addbuttonafter").remove();
            document.getElementById("after-middle-content").innerHTML += newForm;
            // i++;
        }

        function removeAfterMiddle(card_id) {
            const element = document.getElementById('aftermiddleContent' + card_id).remove();
        }

        //faq

        function addMoreFaqContent(i) {
            // alert(i);
            ++formNo;
            newI = ++i;
            // alert(i);
            var newForm =
                ' <div class="col-lg-6" id="faq_content' + formNo +
                '"><div class="form-group"><label>Title</label><input type="text" class="form-control" placeholder="title" name="faqContent[' +
                i +
                '][title]" value="{{ old('title') }}">@error('title')<span class="text-danger" role="alert"><strong>{{ $message }}</strong></span> @enderror </div><div class="form-group"><label>Description</label><textarea class="form-control" placeholder="Description" name="faqContent[' +
                i +
                '][description]" cols="30" rows="10">{{ old('description') }}</textarea> @error('description') <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>  @enderror </div><div class="text-center"><button class="btn btn-danger btn-sm" type="button" onclick="removefaq(' +
                formNo +
                ')">Remove</button></div> </div></div></div></div><div class="col-lg-6" id="addbuttonFaq"><div class="text-center m-5 "><button type="button" class="btn-primary btn-circle" onclick="addMoreFaqContent(' +
                newI + ')">Add more</button></div></div></div>';
            document.getElementById("addbuttonFaq").remove();
            document.getElementById("faq-content").innerHTML += newForm;
            // i++;
        }

        function removefaq(faq_id) {
            const element = document.getElementById('faq_content' + faq_id).remove();
        }
    </script>
@endsection
