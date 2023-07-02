
<div class="col-md-6 mt-2">
    <label for="endpoint" class="form-label" style="top: 3.5rem; position: initial;">Endpoint</label>
    <input type="text" value="{{old('endpoint', $site->endpoint ?? "")}}" name="endpoint" class="form-control @error('endpoint') is-invalid @enderror" id="endpoint">
    @error('endpoint')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="col-md-6 mt-2">
    <label for="frequency" class="form-label" style="top: 3.5rem; position: initial;">Frequêcia</label>
    <input type="text" value="{{old('frequency', $site->frequency ?? "")}}" name="frequency" class="form-control @error('frequency') is-invalid @enderror" id="frequency">
    @error('frequency')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
