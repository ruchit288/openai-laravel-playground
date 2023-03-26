@extends('app')

@section('content')
<head>
    <style>
        .input-group{
            width: 90% !important;
            padding-left:10%;
        }
    </style>
</head>
<body>
    <div class="container">
        <h5 class="text text-center mt-4">
            Playground
        </h5>
        <div class="mt-5">
            <table class="table table-borderless" id ="tab">
                <thead class="table">
                    <tr class="text-center border border-1 border-dark">
                        <th style="width:33.33%">Examples</th>
                        <th style="width:33.33%">Input</th>
                        <th style="width:33.33%">Output</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    {{--Row 1--}}
                    <tr class="table">
                        <td class="text-left" scope="row" id="label" >Text Completion</td>
                        <td class="text-center" style="vertical-align: middle;">
                            <div class="input-group mb-3" >
                                <input type="text" class="form-control" id="text-completion-input" aria-describedby="button-addon2">
                                <button class="btn btn-outline-primary click-btn" data-action-url="{{route('text-completion')}}" data-operation="text-completion" type="button" id="button-addon2">Click here</button>
                            </div>
                        </td>
                        <td style="vertical-align: middle;">
                            <p id="text-completion-output" style="font-size:25px"></p>
                        </td>
                    </tr>
                    {{--Row 2--}}
                    <tr class="table">
                        <td class="text-left" scope="row" id="label">Spelling Correction</td>
                        <td class="text-center" style="vertical-align: middle;">
                            <div class="input-group mb-3" >
                                <input type="text" class="form-control" id="spell-check-input" aria-describedby="button-addon2">
                                <button class="btn btn-outline-primary click-btn " data-action-url="{{route('spell-check')}}" data-operation="spell-check" type="button"  id="button-addon2">Click here</button>
                            </div>
                        </td>
                        <td class="text-center" style="vertical-align: middle;">
                            <p id="spell-check-output" style="font-size:25px"></p>
                        </td>
                    </tr>
                    {{--Row 3--}}
                    <tr class="table ">
                        <td class="text-left" scope="row" id="label">Text Moderation</td>
                        <td class="text-center" style="vertical-align: middle;">
                            <div class="input-group mb-3" >
                                <input type="text" class="form-control" id="text-moderation-input" aria-describedby="button-addon2">
                                <button class="btn btn-outline-primary click-btn" data-action-url="{{route('text-moderation')}}" data-operation="text-moderation" type="button" id="button-addon2">Click here</button>
                            </div>
                        </td>
                        <td class="text-center" style="vertical-align: middle;" >
                            <p id="text-moderation-output" style="font-size:25px"></p>
                        </td>
                    </tr>
                    {{--Row 4--}}
                    <tr class="table" style="height:270px">
                        <td class="text-left" scope="row" id="label" style="vertical-align: middle;">Image Generation</td>
                        <td style="vertical-align: middle;">
                            <div class="input-group mb-3 text-center" >
                                <input type="text" class="form-control" id="image-generation-input" aria-describedby="button-addon2">
                                <button class="btn btn-outline-primary click-btn" data-action-url="{{route('image-generation')}}" data-operation="image-generation" type="button" id="button-addon2">Click here</button>
                            </div>
                        </td>
                        <td class="text-center" style="vertical-align: middle;" >
                             <img id="image-generation-output" src="" alt="">
                        </td>
                    </tr>
                    {{--Row 5--}}
                    <tr class="table" style="height:270px">
                        <td class="text-left" scope="row" id="label" style="vertical-align: middle;">Image Variation</td>
                        <td style="vertical-align: middle;">
                            <div class="input-group mb-3 text-center" >
                                <form method="POST" action="{{route('image-variation')}}" enctype="multipart/form-data" id="image-variation-form">
                                    @csrf
                                    <input type="file" name="image" class="form-control" id="image-variation-input" aria-describedby="button-addon2">
                                    <button class="btn btn-outline-primary click-btn-variation" data-action-url="{{route('image-variation')}}" data-operation="image-variation" type="submit" id="button-addon2">Click here</button>
                                </form>
                            </div>
                        </td>
                        <td class="text-center" style="vertical-align: middle;" >
                             <img id="image-generation-output" src="" alt="">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
@endsection
@section('footer-script')
<script>
    $('.click-btn').click(function(){
        var operation = $(this).data('operation')

        var input = $("#"+operation + "-input").val()
        if(operation == 'image-generation') {
            $("#"+operation + "-output").attr('src','')
        } else {
            $("#"+operation + "-output").text(null)
        }

        $.ajax({
                type: 'POST',
                url:$(this).data('action-url'),
                data: {
                    input: input,
                },
                dataType: 'json',
                success: function (data) {
                    if(operation == 'image-generation') {
                        $("#"+operation + "-output").attr('src',data.output)
                    } else {
                        $("#"+operation + "-output").text(data.output)
                    }
                },
                error: function(data) {
                    alert("Error !")
                }
        });
    })

    /*$('#image-variation-form').submit(function(event){
        event.preventDefault();
        var formData = new FormData(this);
        $.ajax({
                type: 'POST',
                url:"{{route('image-variation')}}",
                data: {
                    input: formData
                },
                cache:false,
                contentType: 'multipart/form-data',
                processData: false,
                dataType: 'json',
                success: function (data) {
                        $("#image-variation-output").attr('src',data.output)
                },
                error: function(data) {
                    alert("Error !")
                }
        });
    })*/

</script>
@endsection
