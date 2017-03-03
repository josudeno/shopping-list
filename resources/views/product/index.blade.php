@extends('app')

@section('title', 'Don\'t forget...')


@section('aside')
    @parent
    <p>This is appended to the master aside.</p>
@endsection

@section('content')
    <form method="POST" action="/product/add">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label for="inputProduct">Start typing to search for products</label>
            <input type="text" class="form-control search" id="inputProduct" placeholder="Product name">
            <small id="emailHelp" class="form-text text-muted">Click on the product and will get added to the list.</small>
        </div>
    </form>
    <div class="results">

    </div>
    <div id="currentList" class="productList">
        <label>No products added yet</label>
    </div>
@endsection

@section('includes')
    @parent

    {{ Html::script('js/Util/Namespace.js') }}
    {{ Html::script('js/Util/TypeHelper.js') }}
    {{ Html::script('js/Util/Factory/HTMLElement.js') }}
    {{ Html::script('js/Util/Provider/DomElement.js') }}
    {{ Html::script('js/Search.js') }}

@endsection