<div class="btn-group-vertical col-sm-1 align-self-start" style="width: 19.8rem;">
    <div class="container mb-2">
        <form action="{{route('createProduct')}}" method="get">
            @csrf
            <button type="submit" class="btn btn-secondary">
                Create new Product
            </button>
        </form>
    </div>
    <div class="container mb-2">
        <form action="{{route('productsPdf')}}" method="get">
            @csrf
            <button type="submit" class="btn btn-secondary">
                Download Stock PDF
            </button>
        </form>
    </div>
    <div class="container mb-2">
        <form action="{{route('tagMenu')}}" method="get">
            @csrf
            <button type="submit" class="btn btn-secondary">
                Create new Tag
            </button>
        </form>
    </div>
</div>
