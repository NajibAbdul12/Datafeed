<x-app-layout>
    <x-slot name="header">
           
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <a class="btn btn-primary" href="{{ url()->previous() }}" title="Go back"> <i class="fas fa-backward "></i> </a>
	            <h1> Product_ID:  {{$product->id}} </h1>
                <h3> WebName: {{$product->webName}} </h3>
                <p class="Slug"> Slug: {{$product->slug}} </p>
	            <p class="brand"> Brand of Product: {{$product->brand}} </p>
                <p class="colour"> Colour of Product: {{$product->colour}} </p>
                <p class="description"> Description Of Product: {{$product->description}} </p>
                <strong><p class="retailPrice"> retail Price Of Product (GBP £): {{$product->retailPriceGBP}} </p></strong>
                <!-- <p class="description"> Full Description Of Product: {{$product->fullDescription}} </p> -->
                <p class="colour"> Category of Product: {{$product->category->name}} </p>
                @if(empty($product->imagePath))
                <img class="img"  src="https://media.istockphoto.com/vectors/no-image-available-sign-vector-id936182806?k=20&m=936182806&s=612x612&w=0&h=pTQbzaZhCTxWEDhnJlCS2gj65S926ABahbFCy5Np0jg=">
                @endif
                @if(!empty($product->imagePath))
                <img width="500" height="600" src="{{$product->imagePath}}" >
                @endif
                @if(Auth::user()->isAdmin())
                <p class="colour"> Visible To Customer: {{$product->visibleToCustomer}} </p>
                <p class="colour"> Weight: {{$product->weight}} </p>
                <p class="colour"> VAT RATE: {{$product->vatRate}} </p>
                <p class="colour"> BarCode of Product: {{$product->barCode}} </p>
                <p class="colour"> Category Name: {{$product->category->name}} </p>
                @endif
                <button type="submit" class="klaviyo_submit_button">
                    <span>Order Now!! </span></button>
            </div>
        </div>
    </div>
    
</x-app-layout>