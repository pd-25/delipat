@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-title">
                    <h4>Edit Content</h4>
                    @if (Session::has('msg'))
                        <p class="alert alert-info">{{ Session::get('msg') }}</p>
                    @endif
                </div>
                {{-- <div class="card-body">
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
                    </div> --}}
            </div>
            <div class="card">
                <div class="card-title">
                    <h4>Top Content</h4>
                    @if (Session::has('msgTop'))
                        <p class="alert alert-info">{{ Session::get('msgTop') }}</p>
                    @endif
                </div>
                <form action="{{ route('editContent', $services_content['topContent']) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row d-flex">

                        <input type="hidden" name="type" value="msgTop">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Image</label>

                                @if (isset($services_content['topContent']->image) &&
                                        !empty(
                                            $services_content['topContent']->image &&
                                                File::exists(public_path('storage/Content/' . $services_content['topContent']->image))
                                        ))
                                    <img style="max-width: 244px;" src="{{ asset('storage/Content/' . $services_content['topContent']->image) }}"
                                        alt="">
                                @else
                                    <img style="max-width: 244px;" src="{{ asset('noimg.png') }}" alt="Image not found">
                                @endif
                                <input type="file" class="form-control" name="image">

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" placeholder="title" name="title"
                                    value="{{ $services_content['topContent']->title }}" required>

                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" placeholder="Description" name="description" cols="30" rows="10" required>{{ $services_content['topContent']->description }}</textarea>

                            </div>
                        </div>
                        <button class="btn btn-sm btn-success" type="submit">Update</button>


                    </div>
                </form>
            </div>
            <div class="card">

                <div class="card-title">
                    <h4>Middle Card Content</h4>
                    @if (Session::has('msgMiddle'))
                        <p class="alert alert-info">{{ Session::get('msgMiddle') }}</p>
                    @endif
                </div>

                <div class="row" id="middle-content">
                    @foreach ($services_content['middleCardContent'] as $item)
                        <div class="col-md-6">
                            <form action="{{ route('editContent', $item->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="type" value="msgMiddle">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control" placeholder="title"
                                        name="title" value="{{ $item->title }}" required>

                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" placeholder="Description" name="description" cols="30"
                                        rows="10" required>{{ $item->description }}</textarea>

                                </div>

                                <div class="form-group">
                                    <label>Image</label>
                                    @if (isset( $item->image) &&
                                            !empty(
                                                 $item->image &&
                                                    File::exists(public_path('storage/Content/' .  $item->image))
                                            ))
                                        <img style="max-width: 244px;" src="{{ asset('storage/Content/' .  $item->image) }}"
                                            alt="">
                                    @else
                                        <img style="max-width: 244px;" src="{{ asset('noimg.png') }}" alt="Image not found">
                                    @endif
                                    <input type="file" class="form-control" name="image"
                                        value="{{ $item->image }}">
                                </div>
                                <button class="btn btn-sm btn-success" type="submit">Update</button>
                            </form>
                        </div>
                    @endforeach

                    {{-- <div class="col-lg-6" id="addbutton">
                            <div class="text-center m-5 ">
                                <button type="button" class="btn-primary btn-circle" onclick="addMoremiddleContent(0)">
                                    Add more</button>

                            </div>
                        </div> --}}

                </div>
            </div>

            <div class="card">
                <div class="card-title">
                    <h4>After Middle Content Header</h4>
                    @if (Session::has('msgAfMiddleH'))
                        <p class="alert alert-info">{{ Session::get('msgAfMiddleH') }}</p>
                    @endif
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <form action="{{ route('editContent', $services_content['middleContentHeader']->id) }}"
                            method="post">
                            @csrf
                            <input type="hidden" name="type" value="msgAfMiddleH">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" placeholder="title"
                                    name="title"
                                    value="{{ $services_content['middleContentHeader']->title }}" required>

                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" placeholder="Description" name="description" cols="30" rows="10"
                                    required>{{ $services_content['middleContentHeader']->description }}</textarea>

                            </div>
                            <button class="btn btn-sm btn-success" type="submit">Update</button>

                        </form>
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
                    @foreach ($services_content['afterMiddleContentt'] as $afterMiddleContentt)
                        <div class="col-md-6">
                            <form action="{{ route('editContent', $afterMiddleContentt->id) }}" method="post">
                                @csrf
                                <input type="hidden" name="type" value="msgTt">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control" placeholder="title"
                                        name="title" value="{{ $afterMiddleContentt->title }}"
                                        required>

                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" placeholder="Description" name="description" cols="30"
                                        rows="30" required>{{ $afterMiddleContentt->description }}</textarea>

                                </div>
                                <button class="btn btn-sm btn-success" type="submit">Update</button>
                            </form>
                        </div>
                    @endforeach
                    {{-- <div class="col-lg-6" id="addbuttonafter">
                            <div class="text-center m-5 ">
                                <button type="button" class="btn-primary btn-circle"
                                    onclick="addMoreAftermiddleContent(0)">
                                    Add more</button>

                            </div>
                        </div> --}}
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
                    @foreach ($services_content['faqContent'] as $faqContent)
                        <div class="col-md-6">
                            <form action="{{ route('editContent', $faqContent->id) }}" method="post">
                                @csrf
                                <input type="hidden" name="type" value="msgFaq">
                                <div class="form-group">
                                    <label>Question</label>
                                    <input type="text" class="form-control" placeholder="title" name="title"
                                        value="{{ $faqContent->title }}" required>

                                </div>
                                <div class="form-group">
                                    <label>Answer</label>
                                    <textarea class="form-control" placeholder="Description" name="description" cols="30" rows="10" required>{{ $faqContent->description }}</textarea>

                                </div>
                                <button class="btn btn-sm btn-success" type="submit">Update</button>
                            </form>
                        </div>
                    @endforeach
                    {{-- <div class="col-lg-6" id="addbuttonFaq">
                            <div class="text-center m-5 ">
                                <button type="button" class="btn-primary btn-circle" onclick="addMoreFaqContent(0)">
                                    Add more</button>

                            </div>
                        </div> --}}
                </div>
            </div>






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
