<x-app-layout>
    <x-slot name="header">
       
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 bg-white border-b border-gray-100">
                    <table class="table table-hover">
                        <thead>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Password</th>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{$user->name}} </td>
                                <td>{{$user->email}} </td>
                                <td>{{$user->password}} </td>
                                <td>
                                    <a  href="{{route('users.show',['id' => $user->id])}}" title="show"> <i class="fas fa-eye text-success  fa-lg"></i> </a>
                                    <a href="{{route('users.edit',['id' => $user->id])}}" title="edit">  <i class="fas fa-edit  fa-lg"></i> </a>
                                    <form>
                                        @method('DELETE')
                                        {{ csrf_field() }} 
                                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                                        <i class="fas fa-trash fa-lg text-danger"></i></button>
                                    </form>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
