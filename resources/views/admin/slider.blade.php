@extends('admin.app')

@section('content')
    <h2>Slider Management</h2>

    <div>
        <div class="container-fluid">
            <div class="row">
                <!-- Product Grid -->
                <div class="col-md-2">
                    <h2>Product List</h2>
                    <ul class="row" id="product-list" type="none">

                        <li class="card product-card">
                            <img src="https://images.unsplash.com/photo-1520209759809-a9bcb6cb3241?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8aW1nfGVufDB8fDB8fHww&w=1000&q=80"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title 1</h5>
                            </div>
                        </li>
                        <li class="card product-card">
                            <img src="https://images.unsplash.com/photo-1520209759809-a9bcb6cb3241?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8aW1nfGVufDB8fDB8fHww&w=1000&q=80"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title 2</h5>
                            </div>
                        </li>
                        <li class="card product-card">
                            <img src="https://images.unsplash.com/photo-1520209759809-a9bcb6cb3241?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8aW1nfGVufDB8fDB8fHww&w=1000&q=80"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title 3</h5>
                            </div>
                        </li>
                        <li class="card product-card">
                            <img src="https://images.unsplash.com/photo-1520209759809-a9bcb6cb3241?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8aW1nfGVufDB8fDB8fHww&w=1000&q=80"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title 4</h5>
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- Slider Forms -->
                <div class="col-md-10">
                    <h2>Slider Forms</h2>
                    <form id="slider-form1" class="mb-4">

                        <!-- Slider 1 -->
                        <h4>Manual Slider</h4>
                        <ul type="none" class="slider" id="manualSlider">

                        </ul>
                    </form>
                    <form id="slider-form">
                        <!-- Slider 2 -->
                        <h4>Auto Slider</h4>
                        <ul class="slider" id="autoSlider">
                            
                        </ul>
                    </form>
                    <h5>&darr; Drop redundant items here</h5>
                    <div  id="trashbin">
                        <img src="{{ asset('img/recycle-bin.svg') }}" alt="recycle bin">
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
            if (ui.sender.attr("id") === "manualSlider" ||ui.sender.attr("id") === "autoSlider" ) {
                ui.item.remove()
            }
        },
    }).droppable({
        accept: ".product-card",
    });;



    </script>
@endsection
