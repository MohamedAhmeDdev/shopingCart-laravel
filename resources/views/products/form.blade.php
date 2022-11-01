<div class="card-body">
    <div class="form-group">
      <label for="exampleInputEmail1">Product name</label>
      <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" placeholder="Enter product name" value="{{ old('product_name', $product->product_name) }}">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Product price</label>
      <input type="number" name="product_price" class="form-control" id="exampleInputEmail1" placeholder="Enter product price" min="1" value="{{ old('product_price', $product->product_price) }}">
    </div>
    <div class="form-group">
      <label>Product category</label>
      <select class="form-control select2" style="width: 100%;" name="category_id" value="{{ old('product_category', $product->product_category) }}">
        @foreach($categories as $category)
        <option value="{{$category->id}}" selected="selected">{{$category->category_name}}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Product description</label>
        <input type="text" name="product_description" class="form-control" id="exampleInputEmail1" placeholder="Enter product description" value="{{ old('product_description', $product->product_description) }}">
      </div>

    <label for="exampleInputFile">Product image</label>
    <div class="input-group">
      <div class="custom-file">
        <input type="file" class="custom-file-input" id="exampleInputFile" name="product_image" value="{{ old('product_image', $product->product_image) }}">
        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
      </div>
      <div class="input-group-append">
        <span class="input-group-text">Upload</span>
      </div>
    </div>
  </div>
  <!-- /.card-body -->
  <div class="card-footer">
    <!-- <button type="submit" class="btn btn-success">Submit</button> -->
    <input type="submit" class="btn btn-success" value="{{ $product->exists ? 'Update' : 'Save' }}">
  </div>




