@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">

        <div class="col-lg-10">
            <div class="card">
                <div class="card-title pr">
                    <h4>All Services</h4>
                    @if (Session::has('msg'))
                        <p class="alert alert-info">{{ Session::get('msg') }}</p>
                    @endif
                </div>
                <div class="card-title text-right">
                    <a href="{{ route('services.create') }}" class="btn btn-sm btn-success">Add Service</a>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table student-data-table m-t-20">
                            <thead>
                                <tr>
                                    <th>SN.</th>
                                    <th>Service Name</th>
                                    <th>Slug</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($services as $service)
                                    <tr>
                                        <td>#{{ $loop->iteration }}</td>
                                        <td>
                                            {{ $service->service_name }}
                                        </td>
                                        <td>
                                            {{ $service->service_slug }}
                                        </td>
                                        <td><span id="status-btn{{ $service->id }}">
                                            <button class="btn btn-sm {{ $service->status == 1 ? 'btn-primary' : 'btn-danger' }}"  onclick="changeStatus('{{ $service->service_slug }}', {{ $service->id }})" >
                                                {{ $service->status == 1 ? 'Active' : 'Disabled' }}
                                            </button>
                                        </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('services.edit', $service->service_slug) }}"><i
                                                    class="ti-pencil btn btn-sm btn-primary"></i></a>
                                            <form method="POST"
                                                action="{{ route('services.destroy', $service->service_slug) }}"
                                                class="action-icon">
                                                @csrf
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button type="submit"
                                                    class="btn btn-sm btn-danger  delete-icon show_confirm"
                                                    data-toggle="tooltip" title='Delete'>
                                                    <i class="ti-trash"></i>
                                                </button>
                                            </form>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('script')
    <script>
        function changeStatus(slug, id) {
            $.ajax({
                type: "POST",
                url: "{{ route('service.status') }}",
                data: {
                    'service_slug': slug,
                    '_token': '{{ csrf_token() }}'
                },
                dataType: "JSON",
                success: function(response) {
                    if (response.status) {
                        $("#status-btn"+ id).load(window.location.href + " #status-btn"+ id);
                        swal('Status updated');
                    }else {
                        swal('Some Error occur, relode the page');
                    }
                }
            });
        }
    </script>
@endsection
