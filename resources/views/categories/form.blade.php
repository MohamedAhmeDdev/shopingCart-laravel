<div class="card-body">
    <div class="form-group">
      <label for="exampleInputEmail1">Category name</label>
      <input type="text" name="category_name" value="{{ old('category_name', $category->category_name) }}" class="form-control" id="exampleInputEmail1" placeholder="Enter category">
    </div>
  </div>
  <!-- /.card-body -->
  <div class="card-footer">
    <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
    <input type="submit" class="btn btn-primary" value="{{ $category->exists ? 'Update' : 'Save' }}" > {{-- this check if the button type save or update --}}
  </div>