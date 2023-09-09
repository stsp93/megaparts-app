@extends('admin.app')

@section('content')
    <h2>Slider Management</h2>

    <div>
        <div class="container-fluid">
            <div class="row">
                <!-- Product Grid -->
                <div class="col-md-5">
                    <h2>Product List</h2>
                    <ul class="row" id="product-list" type="none">
                        @foreach ($allProducts as $product)
                        <li class="card product-card">
                            <input type="hidden" name="product_ids[]" value="{{$product->id}}">
                            <img src="{{$product->imageUrl}}"
                                class="card-img-top" alt="{{$product->imageUrl}}">
                            <div class="card-body">
                                <h5 class="card-title">{{$product->name}}</h5>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Slider Forms -->
                <div class="col-md-7 slider-forms">
                    <h2>Slider Forms (Save them one by one)</h2>
                    <form class="mb-4" method="post">
                        <input type="hidden" name="form_id" value="manual-form">
                        @csrf
                        <!-- Manual Slider 1 -->
                        <div class="d-flex">
                            <h4>Manual Slider</h4>
                            <input type="submit" class="btn btn-success saveForm col-2 mx-4"
                            value="&#10004; Save">
                        </div>
                        <ul type="none" class="slider" id="manualSlider">
                            @foreach ($manualProducts as $product)
                            <li class="card product-card">
                                <input type="hidden" name="product_ids[]" value="{{$product->id}}">
                                <img src="{{$product->imageUrl}}"
                                    class="card-img-top" alt="{{$product->imageUrl}}">
                                <div class="card-body">
                                    <h5 class="card-title">{{$product->name}}</h5>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </form>
                    <form method="post">
                        <input type="hidden" name="form_id" value="auto-form">
                        @csrf
                        <!-- Auto SLider -->
                        <div class="d-flex">
                            <h4>Auto Slider</h4>
                            <input type="submit" class="btn btn-success saveForm col-2 mx-4"
                            value="&#10004; Save">
                        </div>
                        <ul class="slider" id="autoSlider">
                            @foreach ($autoProducts as $product)
                            <li class="card product-card">
                                <input type="hidden" name="product_ids[]" value="{{$product->id}}">
                                <img src="{{$product->imageUrl}}"
                                    class="card-img-top" alt="{{$product->imageUrl}}">
                                <div class="card-body">
                                    <h5 class="card-title">{{$product->name}}</h5>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </form>
                    <h5>&darr; Drop redundant items here</h5>
                    <div class="row">
                        <div id="trashbin" class="col-2 mx-5">
                            <img src="{{ asset('img/recycle-bin.svg') }}" class="img-fluid" alt="recycle bin">
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
        $("#product-list .product-card").draggable({
            helper: "clone",
            connectToSortable: "#manualSlider, #autoSlider",
        });

        // Make the sliders droppable and sortable
        $("#manualSlider, #autoSlider").sortable({
            connectWith: "#manualSlider, #autoSlider,#trashbin",
            receive: function(event, ui) {
                if (ui.sender.attr("id") === "product-list") {
                    const productClone = ui.helper.clone();
                    $(this).append(productClone);
                }
            },
        }).droppable({
            accept: ".product-card",
        });

        $('#trashbin').sortable({
            receive: function(event, ui) {
                if (ui.sender.attr("id") === "manualSlider" || ui.sender.attr("id") === "autoSlider") {
                    ui.item.remove()
                }
            },
        }).droppable({
            accept: ".product-card",
        });


    </script>
@endsection
