<style>
	.imgdiv{
    width:500px;
    border:2px solid grey ;
    text-align:center;
    height:520px;
    vertical-align:middle;
    padding:10px;
    float:left
}
.img{display:block; 
	margin:0 auto;
	width:300px;
	height:350px
}

	</style>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Products For {{$category->name}}
        </h2>
		@if(Auth::user()->isAdmin())
		<x-nav-link :href="route('products.create')" :active="request()->routeIs('products.create')">
                        {{ __('Create New Product') }}
                    </x-nav-link>

		@endif
    </x-slot>

    <div class="py-12">
        <div class="col-md-12 mb-3">
            <span class="font-weight-bold sort-font"> Sort By : </span>
            <a href="{{URL::current()}}" class="sort-font">All</a>
            <a href="{{URL::current()}}"style="color:black"> High to low</a>
        </div>

        <div class="max-w-10x10 mx-auto sm:px-6 lg:px-10">
								@foreach($category->products as $product)
								<div class="imgdiv">
                                    @if(empty($product->imagePath))
                                    <a href="{{route('products.show',['id' => $product->id])}}"><img class="img"  src="https://media.istockphoto.com/vectors/no-image-available-sign-vector-id936182806?k=20&m=936182806&s=612x612&w=0&h=pTQbzaZhCTxWEDhnJlCS2gj65S926ABahbFCy5Np0jg="></a>
                                    <br>
                                    <a href="{{route('products.show',['id' => $product->id])}}"/>
                                    <strong> Retail Price (GBP) : £{{$product->retailPriceGBP}}</strong>
                                    <p>{{$product->description}}</p>
                                    @endif
                                    @if(!empty($product->imagePath))
                                    <a href="{{route('products.show',['id' => $product->id])}}"><img class="img"  src="{{$product->imagePath}}"></a>
									<br>
                                    <a href="{{route('products.show',['id' => $product->id])}}">
                                    <strong> Retail Price (GBP) : £{{$product->retailPriceGBP}}</strong>
                                    <p>{{$product->description}}</p></a>
                                    
                                    @endif
                                    <button class="px-4 py-2 text-white bg-blue-800 rounded">Add To Cart</button>
                                    @if(Auth::user()->isAdmin())
                                    <a href="{{route('products.edit',['id' => $product->id])}}" type="button">Edit</a>
                                    <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                                        @method('DELETE')
                                        {{ csrf_field() }} 
                                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                                        <i class="fas fa-trash fa-lg text-danger"></i></button>
                                    </form>

                                    @endif
									<br>
								</div> 
                    			@endforeach			
        </div>
    </div>
</x-app-layout>

