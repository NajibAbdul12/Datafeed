<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Product') }}
        </h2>
    </x-slot>
    @if(Auth::user()->isAdmin())
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>WebName: </strong>
                    <input type="text" name="webName" value="{{ $product->webName }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Slug: </strong>
                    <input type="text" name="slug" value="{{ $product->slug }}" class="form-control" placeholder="Slug">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Brand: </strong>
                    <input type="text" name="brand" value="{{ $product->brand }}" class="form-control" placeholder="Brand">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Colour:</strong>
                <select name="colour" id="colours">
                    <option value="Black">Black</option>
                    <option value="White">White</option>
                    <option value="Yellow">Yellow</option>
                    <option value="Green">Green</option>
                    <option value="Silver">Silver</option>
                    <option value="Blue">Blue</option>
                    <option value="Red">Red</option>
                    <option value="Orange">Orange</option>
                    <option value="Purple">Purple</option>
                    <option value="Pink">Pink</option>
                    <option value="Grey">Grey</option>
                </select>
            </div>
        </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Full Description:</strong>
                    <input type="text" name="fullDescription" value="{{ $product->fullDescription }}" class="form-control" placeholder="Full Description">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <input type="text" name="description" value="{{ $product->description }}" class="form-control" placeholder="Description">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Category_ID:</strong>
                    <select name="category_id" id="category_id">
                        @foreach($itemlist as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>imagePath:</strong>
                    <input type="text" name="imagePath" value="{{ $product->imagePath }}" class="form-control" placeholder="ImagePath">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>VisibleToCustomer:</strong>
                    <input type="text" name="visibleToCustomer" value="{{ $product->visibleToCustomer }}" class="form-control" placeholder="VisibleToCustomer">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>retailPriceGBP:</strong>
                    <input type="text" name="retailPriceGBP" value="{{ $product->retailPriceGBP }}" class="form-control" placeholder="retailPriceGBP">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>retailPriceEUR:</strong>
                    <input type="text" name="retailPriceEUR" value="{{ $product->retailPriceEUR }}" class="form-control" placeholder="retailPriceEUR">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>sellPriceGBP:</strong>
                    <input type="text" name="sellPriceGBP" value="{{ $product->sellPriceGBP }}" class="form-control" placeholder="sellPriceGBP">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>sellPriceEUR:</strong>
                    <input type="text" name="sellPriceEUR" value="{{ $product->sellPriceEUR }}" class="form-control" placeholder="sellPriceEUR">
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Weight: </strong>
                    <input type="text" name="weight" value="{{ $product->weight }}" class="form-control" placeholder="Weight">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>VATRATE:</strong>
                    <input type="text" name="vatRate" value="{{ $product->vatRate }}" class="form-control" placeholder="VATRATE">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>BarCode:</strong>
                    <input type="text" name="barCode" value="{{ $product->barCode }}" class="form-control" placeholder="BarCode">
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
            </div>
        </div>
    </div>
    @endif
</x-app-layout>