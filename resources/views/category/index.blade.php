<x-app-layout>
    <x-slot name="header">
    @if(Auth::user()->isAdmin())
		<x-nav-link :href="route('categories.create')" :active="request()->routeIs('categories.create')">
                        {{ __('Create New Category') }}
                    </x-nav-link>

		@endif
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 bg-white border-b border-gray-100">
                    <table class="table table-hover">
                        <thead>
                            <th>Category ID</th>
                            <th>Category Name</th>
                           
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td>{{$category->id}} </td>
                                <td>{{$category->name}} </td>
                                <td>
                                    <a href="{{route('categories.show',['slug' => $category->slug])}}"  title="show"> <i class="fas fa-eye text-success  fa-lg"></i> </a>
                                    @if(Auth::user()->isAdmin())
                                    <a href="{{route('categories.edit',['id' => $category->id])}}"title="edit">  <i class="fas fa-edit  fa-lg"></i> </a>
                                    <form action="{{ route('categories.destroy',$category->id) }}" method="POST">
                                        @method('DELETE')
                                        {{ csrf_field() }} 
                                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                                        <i class="fas fa-trash fa-lg text-danger"></i></button>
                                    </form>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
