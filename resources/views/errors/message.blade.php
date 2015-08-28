@if(Session::get('success') || Session::get('error'))
    <div class="col-md-12">
        <ul class="list-unstyled">
            @if(Session::get('success'))
                <li class="alert alert-success">{{ Session::get('success') }} <button type="button" class="close" data-dismiss="alert">&times;</button></li>
            @elseif(Session::get('error'))
                <li class="alert alert-success">{{ Session::get('error') }} <button type="button" class="close" data-dismiss="alert">&times;</button></li>
            @endif
        </ul>
    </div>
@endif