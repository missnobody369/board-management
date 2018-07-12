{{-- Logic to see errors, from postcontroller --}}
@if(count($errors) > 0)
<ul class="list-group">
    @foreach($errors->all() as $error)
        <li class="list-group-item text-danger">
            {{ $error }}
        </li>
    @endforeach
</ul>
@endif
{{-- to check if this error has data --}}
{{-- if there is data it should be outputted so user can see error --}}