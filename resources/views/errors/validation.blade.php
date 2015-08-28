<div class="col-md-12">
    @if($errors->all())
        <ul class="list-unstyled">
            @foreach($errors->all() as $error)
                <li class="alert alert-warning"><button type="button" class="close pull-right" data-dismiss="alert">&times;</button>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
</div>