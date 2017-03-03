@extends('app')

@section('title', 'Don\'t forget...')


@section('aside')
    @parent
    <p>This is appended to the master aside.</p>
@endsection

@section('content')
    {{--<h1>Hello, {{ $productName }}.</h1>--}}
    <form method="POST" action="/product">
        <?php echo Form::token(); ?>
        <div class="form-group">
            <label for="inputProduct">Start typing to search for products</label>
            <input type="text" class="form-control" id="inputProduct" placeholder="Product name">
            <small id="emailHelp" class="form-text text-muted">Click on the product and will get added to the list.</small>
        </div>
    </form>
    <div class="results">

    </div>
    <div id="currentList" class="productList">
        <label>No products added yet</label>
    </div>
@endsection