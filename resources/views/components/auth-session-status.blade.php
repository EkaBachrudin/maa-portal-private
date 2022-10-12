@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'font-medium text-sm text-green-600']) }}>
        
        <div class="alert alert-primary alert-dismissible" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <h3 class="alert-heading fs-5 fw-bold mb-1">Done</h3>
            <p class="mb-0">
                {{ $status }}
            </p>
          </div>
    </div>
@endif
