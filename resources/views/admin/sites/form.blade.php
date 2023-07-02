<div class="col-md-6">
    <label for="url" class="form-label" style="top: 3.5rem; position: initial;">Url</label>
    <input type="text" value="{{old('url', $site->url ?? "")}}" name="url" class="form-control @error('url') is-invalid @enderror" id="url">
    @error('url')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
