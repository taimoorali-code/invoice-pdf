<div class="container mt-5 mb-5">
    <div class="card">
        <div class="card-header">
            {{ __('invoice.upload_json') }}
        </div>
        <div class="card-body">
            <form action="{{ url('/orders') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="json_file" class="form-label">{{ __('invoice.select_json_file') }}:</label>
                    <input type="file" id="json_file" name="json_file" accept=".json" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">{{ __('invoice.upload') }}</button>
            </form>
        </div>
    </div>
</div>