<div class="col-md-6">
    <label for="url" class="form-label">Url</label>
    <input type="text" value="{{old('url', $site->url ?? "")}}" name="url" class="form-control @error('url') is-invalid @enderror" id="url">
    @error('url')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
