@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <h3 class="alert-heading fs-5 fw-bold mb-1">Warning</h3>
            <div>
                {{ __('Whoops! Something went wrong.') }}
            </div>
    
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
          </div>
    </div>
@endif
