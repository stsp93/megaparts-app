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
                                <input type="hidden" name="product_ids[]" value="{{ $product->id }}">
                                <img src="{{ $product->imageUrl }}" class="card-img-top" alt="{{ $product->imageUrl }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    {{$allProducts->links()}}
                </div>

                <!-- Slider Forms -->
                <div class="col-md-7 slider-forms">
                    <h2>Slider Forms</h2>
                    <form class="mb-4" method="post">
                        <input type="hidden" name="form_id" value="manual-form">
                        @csrf
                        <!-- Manual Slider 1 -->
                            <h4>Manual Slider</h4>
                        <ul type="none" class="slider" id="manualSlider">
                            @foreach ($manualProducts as $product)
                                <li class="card product-card">
                                    <input type="hidden" name="product_ids[]" value="{{ $product->id }}">
                                    <img src="{{ $product->imageUrl }}" class="card-img-top" alt="{{ $product->imageUrl }}">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $product->name }}</h5>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </form>
                    <form method="post">
                        <input type="hidden" name="form_id" value="auto-form">
                        @csrf
                        <!-- Auto SLider -->
                            <h4>Auto Slider</h4>
                        <ul class="slider" id="autoSlider">
                            @foreach ($autoProducts as $product)
                                <li class="card product-card">
                                    <input type="hidden" name="product_ids[]" value="{{ $product->id }}">
                                    <img src="{{ $product->imageUrl }}" class="card-img-top"
                                        alt="{{ $product->imageUrl }}">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $product->name }}</h5>
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
                // Check if the received product is already in the current slider
                const productId = ui.item.find('input[name="product_ids[]"]').val();
                const isProductInSlider = $(this).find(`input[value="${productId}"]`).length > 1;
                if (isProductInSlider) {
                    // Product is already in the current slider, so don't proceed
                    $(ui.helper).remove();
                    return;
                }

                saveSlider(this);

            }

        }).droppable({
            accept: ".product-card",
        });

        $('#trashbin').sortable({
            receive: function(event, ui) {
                if (ui.sender.attr("id") === "manualSlider" || ui.sender.attr("id") === "autoSlider") {
                    ui.item.remove();

                    saveSlider(ui.sender)
                }
            },
        }).droppable({
            accept: ".product-card",
        });


        function saveSlider(slider) {
            // Get the product IDs in the current slider and slider Id
            const sliderId = $(slider).attr('id');
            const productCards = $(slider).find('.product-card');
            const productIds = [];
            productCards.each(function(index) {
                const productId = $(this).find('input[name="product_ids[]"]').val();
                productIds.push(productId);
            });


            // Send an AJAX request to save the slider positions
            $.ajax({
                url: '/private/admin/slider',
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    productIds,
                    sliderId
                },
                success: function(response) {
                    console.log(response.message);
                },
                error: function(error) {
                    console.error('Error:', error);
                }
            });
        }
    </script>
@endsection
