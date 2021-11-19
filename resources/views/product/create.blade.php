<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Category') }}
        </h2>
    </x-slot>

    @if(Auth::user()->isAdmin())
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('products.store') }}"   method="POST">
                @csrf
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>WebName:</strong>
                                <input type="text" name="webName" class="form-control" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Slug:</strong>
                                <input class="form-control" name="slug" placeholder="Slug">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Brand:</strong>
                                <input class="form-control" name="brand" placeholder="Brand">
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
                                <input class="form-control" name="fullDescription" placeholder="Full Description Of Product">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Description:</strong>
                                <input class="form-control" name="description" placeholder="Short Description">
                            </div>
                        </div>
                        
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Category_id:</strong>
                                <select name="category_id" id="category_id">
                                @foreach($itemlist as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>ImagePath:</strong>
                                <input class="form-control" name="imagePath" placeholder="ImagePath">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>VisibleToCustomer:</strong>
                                <input class="form-control" name="visibleToCustomer" placeholder="VisibleToCustomer">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>retailPriceGBP:</strong>
                                <input class="form-control" name="retailPriceGBP" placeholder="retailPriceGBP">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>retailPriceEUR:</strong>
                                <input class="form-control" name="retailPriceEUR" placeholder="retailPriceEUR">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>sellPriceGBP:</strong>
                                <input class="form-control" name="sellPriceGBP" placeholder="sellPriceGBP">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>sellPriceEUR:</strong>
                                <input class="form-control" name="sellPriceEUR" placeholder="sellPriceEUR">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>weight:</strong>
                                <input class="form-control" name="weight" placeholder="weight">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>VatRate:</strong>
                                <input class="form-control" name="vatRate" placeholder="VatRate">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>BarCode:</strong>
                                <input class="form-control" name="barCode" placeholder="barCode">
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