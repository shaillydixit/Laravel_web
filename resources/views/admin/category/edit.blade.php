<x-app-layout>
    <x-slot name="header">
       Edit Category
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">


                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header">Edit Category</div>
                            <form action="{{ url('category/update/'.$categories->id) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="form-label">Category Name</label>
                                    <input type="text" name="category_name" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{$categories->category_name}}">
                                    @error('category_name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
