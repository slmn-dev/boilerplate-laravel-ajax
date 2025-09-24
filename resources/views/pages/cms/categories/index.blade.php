<x-layout.cms title="Category">
    <div class="container" style="margin-top: 50px">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center">LARAVEL RELATION CRUD AJAX - <a href="https://open.substack.com/pub/slmndev/p/boilerplate-laravel-ajax?utm_campaign=post&utm_medium=web">SALMAN</a></h4>
                <div class="card border-0 shadow-sm rounded-md mt-4">
                    <div class="card-body">
                        <div class="card-title"><p>CATEGORIES</p></div>
                        <a href="javascript:void(0)" class="btn btn-success mb-2" id="btn-create-category">ADD</a>

                        <table class="table table-hover ">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Created add</th>
                                    <th width="150"> </th>
                                </tr>
                            </thead>
                            <tbody id="table-categories">
                                @foreach($categories as $category)
                                <tr id="index_{{ $category->id }}">
                                    
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->created_at->diffForHumans() }}</td>
                                    <td class="text-center">
                                        <a href="javascript:void(0)" id="btn-edit-category" data-id="{{ $category->id }}" class="btn btn-primary btn-sm">EDIT</a>
                                        <a href="javascript:void(0)" id="btn-delete-category" data-id="{{ $category->id }}" class="btn btn-danger btn-sm">DELETE</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                    </div>
                </div>
            </div>
        </div>
        <x-modal-create/>
    </div>
</x-layout.cms>


@push('scripts')
    <script src="{{ asset('js/category.js') }}"></script>
@endpush
