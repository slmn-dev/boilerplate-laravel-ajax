<x-layout.cms title="Category">
    
    <div class="container" style="margin-top: 50px">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center">LARAVEL RELATION CRUD AJAX - <a href="https://open.substack.com/pub/slmndev/p/boilerplate-laravel-ajax?utm_campaign=post&utm_medium=web">SALMAN</a></h4>
                <div class="card border-0 shadow-sm rounded-md mt-4">
                    <div class="card-body">
                        <div class="card-title"><p>CATEGORIES</p></div>
                        <a href="javascript:void(0)" class="btn btn-success mb-2" id="btn-create-category">ADD</a>
                            <div id="table-container">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Created add</th>
                                        <th width="150"> </th>
                                    </tr>
                                </thead>
                                <tbody id="table-categories">
                                    @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->created_at->diffForHumans() }}</td>
                                        <td class="text-center">
                                            <a href="javascript:void(0)" data-id="{{ $category->id }}" class="btn btn-primary btn-sm btn-edit-category">EDIT</a>
                                            <a href="javascript:void(0)" data-id="{{ $category->id }}" class="btn btn-danger btn-sm btn-delete-category">DELETE</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- pagination --}}
                                <div class="mt-3">
                                    {{ $categories->links() }}
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- include modal --}}
        {{-- create --}}
        <x-modal id="modal-create" title="Create Category" size="modal-lg">
              <div class="form-group">
                    <label for="name" class="control-label">Category Name</label>
                    <input autofocus type="text" class="form-control" id="category-name" >
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-name"></div>
                </div>
            <x-slot:footer>
                <button type="button" id="close-btn" class="btn btn-secondary" data-bs-dismiss="modal">TUTUP</button>
                <button type="button" class="btn btn-primary" id="store">SIMPAN</button>
            </x-slot:footer>
        </x-modal>
        {{-- update --}}
        <x-modal id="modal-edit" title="Edit Category" size="modal-lg">     
                <input type="hidden" id="category_id">
                <div class="form-group">
                    <label for="name" class="control-label">Title</label>
                    <input type="text" class="form-control" id="category-name-update">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title-edit"></div>
                </div>
                <x-slot:footer>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CLOSE</button>
                    <button type="button" class="btn btn-primary" id="update">UPDATE</button>
                </x-slot:footer>
        </x-modal>
        @push('scripts')
            @vite('resources/js/cms/categories/index.js')
        @endpush  
    </div>
</x-layout.cms>




