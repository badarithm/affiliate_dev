@extends('templates.form')

@section('action', route('affiliate.filtered-list'))

@section('form-input')
    <div class="mb-3">
        <label for="affiliate-file" class="form-label">Affiliate File</label>
        <input name="affiliate_file" class="form-control" type="file" id="affiliate-file">
        @if(isset($errors) && $errors->has('affiliate_file'))
            <label for="affiliate-file">
            @foreach($errors->get('affiliate_file') as $errorMessage)
                {{$errorMessage}}
            @endforeach
            </label>
        @endif
    </div>
@endsection
