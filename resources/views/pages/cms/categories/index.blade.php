<x-layout.cms title="Category">
   <div class="container" style="margin-top: 50px">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center">LARAVEL CRUD AJAX - <a href="https://open.substack.com/pub/slmndev/p/boilerplate-laravel-ajax?r=6ia27r&utm_campaign=post&utm_medium=web&showWelcomeOnShare=false">SALMAN.DEV</a> </h4>
                    <div class="card border-0 shadow-sm rounded-md mt-4">
                    <div class="card-body">
                        <a href="javascript:void(0)" class="btn btn-success mb-2" id="btn-create-category">TAMBAH</a>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>name</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="table-categories">
                                @foreach($categories as $category)
                                <tr id="index_{{ $category->id }}">
                                    <td>{{ $category->name }}</td>
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
   </div>
</x-layout.cms>