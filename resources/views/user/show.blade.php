<x-app-layout>
    <x-slot name="header">
       
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <a class="btn btn-primary" href="{{ url()->previous() }}" title="Go back"> <i class="fas fa-backward "></i> </a>
	            <h1> Username:  {{$user->username}} </h1>
                <h3> Email: {{$user->email}} </h3>
                <p class="Slug"> Password: {{$user->password}} </p>
	            
            
                
            </div>
        </div>
    </div>
    
</x-app-layout>